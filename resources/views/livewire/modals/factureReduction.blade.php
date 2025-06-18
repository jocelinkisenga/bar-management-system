    @if (!empty($last_commande) and $last_commande->status == false)

        <div wire:ignore.self class="modal fade" id="commandeFacture" tabindex="-1" aria-labelledby="facture"
            role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Facture</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs" id="myTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " class="btn btn-primary" onclick="printDiv()"
                                    id="purchase-tab" data-bs-toggle="tab" data-bs-target="#purchase" type="button"
                                    aria-controls="purchase" aria-selected="true" role="tab">imprimer</button>
                            </li>
                        </ul>
                        <div class="justify-center row" id="printDiv">
                            <div class="mt-4 wrapper ml-9 col-12">
                                <div id="printdivcontent">
                                    <div class="card">
                                        <div class="card-header ">
                                            <a class="pt-2 ">The king</a>
                                            <div class="float-right">
                                                <strong> Fax:</strong> 2233455 <br>
                                                <strong>avenue :</strong> square 23,67 <br>
                                                <strong>contact :</strong> +243 994 445 56 <br>
                                                <strong>code :</strong>

                                                @if (empty($facture))
                                                @else
                                                    {{ $facture[0]->code ?? 'Aucun' }}
                                                @endif
                                                <br>
                                                <h3 class="mb-0"></h3>


                                            </div>
                                            <div class="float-right">
                                                <strong>Date:</strong> <?= date('Y/m/d') ?>
                                            </div>
                                        </div>
                                        <div class="card-body" id="elem">
                                            <div class="mb-4 row">
                                            </div>
                                            <div class="table-responsive-sm">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>

                                                            <th>produit</th>
                                                            <th class="right">quantité</th>
                                                            <th class="right">sous-total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (!empty($facture))
                                                       
                                                            @foreach ($facture as $item)
                                                                <tr>

                                                                    <td class="left strong text-uppercase">
                                                                        {{ $item->name }}
                                                                    </td>
                                                                    <td class="right">{{ $item->qty }}</td>
                                                                    <td class="right">{{ $item->qty * $item->price }}
                                                                        $
                                                                    </td>
                                                                    <?php $facture_total += $item->qty * $item->price; ?>
                                                                    @php
                                                                        // $pourcentage = $item->reduction;
                                                                    @endphp

                                                                </tr>
                                                            @endforeach


                                                        @endif


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-white card-footer">
                                        <p class="mb-0"><span class="text-uppercase font-weight-bold">reduction :
                                                @if ($facture != null)
                                                    {{ ($facture_total / 100) * $facture[0]->pourcentage }} $
                                                @endif
                                            </span></p>
                                    </div>
                                    <div class="bg-white card-footer">
                                        <p class="mb-0"><span class="text-uppercase font-weight-bold">Total :
                                                @if ($facture != null and $facture[0]->pourcentage != 0)
                                                    <?= $facture_total - ($facture_total / 100) * $facture[0]->pourcentage ?>
                                                    $
                                                @else
                                                    {{ $facture_total }} $
                                                @endif
                                            </span></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif