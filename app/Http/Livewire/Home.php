<?php

namespace App\Http\Livewire;

use App\Enums\RoleEnum;
use App\Http\Repositorie\CommandeRepositorie;
use App\Http\Repositorie\ProduitRepository;
use App\Http\Repositorie\ReductionRepositorie;
use App\Http\Services\CategoryService;
use App\Http\Services\PrecommandeService;
use App\Http\Services\ProductService;
use App\Http\Services\TableService;
use App\Http\Services\UserService;
use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Precommande;
use App\Models\Produit;
use App\Models\Serveur;
use App\Models\Table;
use App\Models\User;
use Flasher\Laravel\Facade\Flasher;
use Flasher\Noty\Prime\NotyInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use SebastianBergmann\Type\NullType;

class Home extends Component
{
    public $categories;
    public $serveurs;
    public $produits;
    public $servers;
    public $server_id;
    public $last_commande = null;
    public $quantity_commande = 1;
    public $produit_id;
    public $commandes;
    public $precommandes;
    public $facture;
    public $invoce, $reductions;
    public $todays;
    public $tables;
    public $table_id;
    protected $commande_repo, $reduction_repo, $produit_repo;
    protected $tableService, $productService, $categoryService, $userService, $precommandeService;
    protected $listeners = ["reduced" => 'render', 'reduction-confirmed' => 'render'];
    public function __construct()
    {
        $this->commande_repo = new CommandeRepositorie;
        $this->reduction_repo = new ReductionRepositorie;
        $this->produit_repo = new ProduitRepository;
        $this->tableService = new TableService;
        $this->productService = new ProductService;
        $this->categoryService = new CategoryService;
        $this->userService = new UserService;
        $this->precommandeService = new PrecommandeService;
    }

    public function render()
    {
        if ($this->last_commande) {
            $this->invoce = $this->commande_repo->facture($this->last_commande->id);
            $this->commandes = $this->commande_repo->all_commandes($this->last_commande->id);
        }

        $this->categories = $this->categoryService->category_with_products();
        $this->produits = $this->productService->product_by_company();
        $this->precommandes = $this->commande_repo->all_precommandes();
        $this->reductions = $this->reduction_repo->reductions();
        $this->todays = $this->commande_repo->todays();
        $this->tables = $this->tableService->table_with_precommandes();
        $this->serveurs = $this->userService->servers();

        return view('livewire.home');
    }

    //cree une commande
    public function store()
    {
        $code = '#' . date('Y-m-d') . rand(1, 1000);
        $table = $this->tableService->table_by_id($this->table_id);

        if (session()->has($table->name)) {
        } else {
            Session::put($table->name, $table->name);
            //creation de la precommande
            $precommande = $this->precommandeService->store_precommande($this->server_id, $code, $this->table_id);

            $this->facture = $this->commande_repo->facture($precommande->id);
            $this->last_commande = $this->commande_repo->last_commande($this->table_id);

            $this->vider_commande_form();

            $this->dispatchBrowserEvent('close-modal');
        }
    }

    // reduction des donnees
    public function reduction($commandeId)
    {
        $this->reduction_repo->store($commandeId);
    }

    //Ajout des produits a la commande
    public function ajouter(int $produitId)
    {

        // $this->produit_repo->store($produitId); 
        $this->produit_id = $produitId;
        $produit = $this->commande_repo->produit_by_id($this->produit_id);

        if ($produit and $this->last_commande != null) {

            $commandeById = $this->commande_repo->commande_by_id($this->last_commande->id, $this->produit_id);

            if (empty($commandeById)) {
                $this->commande_repo->store_command($this->last_commande->id, $this->produit_id, $this->quantity_commande);
                $this->facture = $this->commande_repo->facture($this->last_commande->id);
            } else {
                $this->commande_repo->update_quantity($this->last_commande->id, $this->produit_id, $this->quantity_commande);
                $this->facture = $this->commande_repo->facture($this->last_commande->id);
            }
        } else {

        }
    }

    //retranche la quantite des produits de la commande
    public function reduire($orderId, $productId)
    {
        $this->commande_repo->reduire_quantity($orderId, $productId);
        $this->facture = $this->commande_repo->facture($orderId);
    }

    //annule efface le produit de la commande
    public function annuler($commandId, $produitId, $quantity)
    {
        $result = $this->commande_repo->delete_commande($commandId, $produitId, $quantity);
        $this->facture = $this->commande_repo->facture($commandId);
    }

    //confirme la reduction de la facture
    public function reduction_facture($commandeId)
    {
        return $this->facture = $this->commande_repo->facture($commandeId);
        $this->emit('reduced');
    }

    //selectionne la commande pour y ajouter des produits
    public function edit(int $id)
    {
        if ($id !== 0) {
            $this->facture = $this->commande_repo->facture($id);
            return $this->last_commande = $this->commande_repo->last_commande($id);
            // $this->emit('categorieStore');
            $this->dispatchBrowserEvent('close-modal');
        } else {
            dd("commandes n'existe pas");
        }
    }

    //confirme la commande et genere une facture
    public function invoice($precommandeId)
    {
        $this->precommandeService->invoice_precommande($precommandeId);
    }

    //confirme la commande
    public function confirmer(int $id)
    {
        $this->commande_repo->confirm($id);
        $this->facture = $this->commande_repo->facture($id);
        $this->dispatchBrowserEvent('close-modal');
    }

    //confirme la reduction
    public function confirm_reduction(int $id)
    {
        $precommande_id = $this->reduction_repo->confirm($id);
        return $this->facture = $this->commande_repo->facture($precommande_id);
        $this->emit("reduction-confirmed");
    }

    //mise a jour du status de la table
    private function vider_commande_form()
    {
        $this->server_id = "";
        $this->table_id = "";
    }
}