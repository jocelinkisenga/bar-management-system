    @if (!empty($last_commande) and $last_commande->status == false)
    <div wire:ignore  class="modal fade" id="dette" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Paiement Par dette </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  
                        <form wire:submit.prevent="storeDette({{ $last_commande->id }})">

                        <div class="mb-3">
                            <label for="" class="form-label">Noms du client </label>
                            <input
                                type="text"
                                class="form-control"
                                wire:model.defer="clientName"
                                id=""
                                aria-describedby=""
                                placeholder=""
                            />
                            
                        </div>
                         <div class="mb-3">
                            <label for="" class="form-label">Numero de telephone </label>
                            <input
                                type="text"
                                class="form-control"
                                wire:model.defer="clientPhone"
                                id=""
                                aria-describedby=""
                                placeholder=""
                            />
                            
                        </div>
                                                <div class="mb-3">
                            <label for="" class="form-label">Montant d'avance (optionnel) </label>
                            <input
                                type="number"
                                class="form-control"
                                wire:model.defer="advance"
                                id=""
                                aria-describedby=""
                                placeholder=""
                            />
                            
                        </div>
                        
                    
                    <div class="text-center col-lg-12">
                        <button type="submit" class="btn btn-danger me-2" >Confirmer</button>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Annuler</a>
                    </div>
                    </form>
                </div>
      
            </div>
        </div>
    </div>
      @endif