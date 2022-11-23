<div class="main-panel">
    <div class="content-wrapper">

        <button type="button" class="ml-4  btn btn-success text-uppercase " data-toggle="modal" data-target="#exampleModal"
            data-whatever="@mdo">Ajouter la quantité</button>
            <button type="button" class="ml-4  btn btn-success text-uppercase " data-toggle="modal" data-target="#quantite"
            data-whatever="@mdo">modifier le prix de vente</button>

        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter la quantité</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">


                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">prix d'achat:</label>
                                <input type="text" wire:model="prix_achat" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">quantité :</label>
                                <input type="number" wire:model="produit_quantity" class="form-control"
                                    id="recipient-name">
                            </div>


                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success"
                                    wire:click.prevent="ajouter({{ $data->id }})">ajouter</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div wire:ignore.self class="modal fade" id="quantite" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter la quantité</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">


                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">prix d'achat:</label>
                            <input type="text" wire:model="prix" class="form-control" id="recipient-name">
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"
                                wire:click.prevent="modifier_prix({{ $data->id }})">modifier</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div>
        @if (session('message'))
          <p class="text-success">{{session('message')}}</p>
        @endif
    </div>

        <div class="row mt-3">
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card bg-green">
                    <div class="card-body">
                        <h4 class="card-title">Fiche du produit</h4>
                        <p class="card-description">

                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-bold text-uppercase">
                                        <th>#</th>
                                        <th>valeur</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-bold">nom</td>
                                        <td>{{ $data->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">categorie</td>
                                        <td>{{ $data->categorie->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">quantité</td>
                                        <td>{{ $data->quantity }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">prix de vente</td>
                                        <td>{{ $data->price }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Historique d'entréé du jour</h4>
                        <p class="card-description">

                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Quantité</th>
                                        <th>prix d'achat.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entries as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->qte}}</td>
                                        <td>{{$item->achat}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Historique des commandes du jour</h4>
                        <p class="card-description">

                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Table</th>
                                        <th>quantité</th>
                                        <th>serveur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($commandes))
                                        
                                 
                                    @foreach ($commandes as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->quantity_commande}}</td>
                                        <td>{{$item->serveur}}</td>
                                       
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
