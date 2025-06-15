    <div wire:ignore.self class="modal fade" id="create" tabindex="-1" aria-labelledby="create"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">CREER UNE COMMANDE</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <form wire:submit.prevent="store()">
                                <div class="form-group">
                                    <label for="">SELECTIONNER UN SERVEUR :</label>
                                    <select class="form-control" wire:model.defer="server_id" id="">
                                        <option selected>selectionner un serveur</option>
                                        @foreach ($serveurs as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">SELECTIONNER UNE TABLE :</label>
                                    <select class="form-control" wire:model.defer="table_id" id="">
                                        <option selected>selectionner un serveur</option>
                                        @foreach ($tables as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-submit me-2 ">créer la commande</button>
                    </div>
                    </form>
                    {{-- onclick="Swal.fire(
                            'Good job!',
                            'commande créée  avec succés! clicker sur le bouton commandes pour ajouter vos produits',
                            'success'
                          )" --}}
                </div>
            </div>
        </div>
    </div>