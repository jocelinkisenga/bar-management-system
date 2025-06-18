    <div wire:ignore.self class="modal fade" id="reductions" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Les reductions</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tabs-sets">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="purchase" role="tabpanel"
                                aria-labelledby="purchase-tab">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a onkeyup="myFunction()" id="myinput" class="btn btn-searchset"><img
                                                    src="assets/img/icons/search-white.svg" alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="pdf"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="excel"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="print"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table datanew" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>code</th>
                                                <th>pourcentage</th>
                                                <th class="">detail</th>
                                                <th class="text-end">confirmation</th>
                                        </thead>
                                        <tbody>

                                            @foreach ($reductions as $item)
                                                <tr>
                                                    <td>{{ $item->precommande->code }}</td>
                                                    <td>{{ $item->pourcentage }} %</td>
                                                    <td>
                                                        <button class="me-3" data-bs-toggle="modal"
                                                            data-bs-target="#commandeFacture"
                                                            wire:click="reduction_facture({{ $item->precommande->id }})">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </button>


                                                    </td>
                                                    <td>


                                                        <button class="btn btn-warning btn-sm"
                                                            wire:click="confirm_reduction({{ $item->id }})">confirmer</button>

                                                    </td>
                                                </tr>
                                            @endforeach
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