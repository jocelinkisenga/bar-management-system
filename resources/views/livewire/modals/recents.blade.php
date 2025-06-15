    <div wire:ignore.self class="modal fade" id="recents"aria-labelledby="recents" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Commandes recentes</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tabs-sets">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="purchase-tab">
                                <div class="table-top">
                                    <div wire:ignore class="search-set">
                                        <div class="">
                                            <input id="myInput" placeholder="entrer le code de la commande"
                                                class=" search-input form-control" onkeyup="commande_search()">
                                        </div>
                                    </div>

                                </div>
                                <div class="table">
                                    <table class="table" id="myTable">
                                        <thead>
                                            <tr>

                                                <th>commande</th>
                                                <th>serveur</th>
                                                <th>status</th>
                                                <th>confirmer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($precommandes))
                                                @foreach ($precommandes as $item)
                                                    <tr>

                                                        <td>
                                                            <form>
                                                                <button class="btn btn-success"
                                                                    wire:click.prevent="edit({{ $item->table_id }})">{{ $item->code }}</button>
                                                            </form>
                                                        </td>
                                                        <td>{{ $item->server->name }}</td>
                                                        <td>
                                                            @if ($item->invoiced == false)
                                                                <span class="text-white p-2 tex-bold bg-warning"> non
                                                                    facturé</span>
                                                            @else
                                                                <span class="text-success"> facturé</span>
                                                            @endif
                                                        </td>
                                                        <td><button class="btn btn-danger btn-sm"
                                                                wire:click="confirmer({{ $item->id }})">confirmer</button>
                                                        </td>
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
    </div>