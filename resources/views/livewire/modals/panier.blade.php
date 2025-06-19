  <div wire:wire:ignore class="offcanvas offcanvas-end" tabindex="-1" id="panierOffcanvas" aria-labelledby="panierLabel">
      <div class="offcanvas-header">
          <h5 class="offcanvas-title text-success" id="panierLabel">🛒 Panier</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Fermer"></button>
      </div>
      <div class="offcanvas-body d-flex flex-column justify-content-between">
          <div class="row">
              @if (!empty($last_commande) and $last_commande->status == false)
                  <div class="order-list">
                      <div class="orderid">
                          @if (!empty($last_commande) and $last_commande->status == false)
                              <h4>votre commande</h4>
                              <h5>Code:

                                  <span class="text-strong"> {{ $last_commande->code }} </span>

                              </h5>
                          @endif
                      </div>
                      @if (!empty($commandes))
                          <div class="totalitem">
                              <h4>Total items : {{ $commandes->count() }}</h4>
                             
                          </div>
                          <div class="actionproducts">

                          </div>
                  </div>
                  <div class="table-responsive">
                      <table class="table ">
                          <thead>
                              <tr>
                                  <th scope="col">Nom</th>
                                  <th scope="col">Quantite</th>
                                  <th>T.U</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($commandes as $commande)
                                  <tr class="">
                                      <td scope="row">{{ $commande->produit->name }}</td>
                                      <td>
                                          <div class="increment-decrement">
                                              <div class="input-groups">
                                                  <input type="button" value="-"
                                                      wire:click="reduire({{ $last_commande->id }},{{ $commande->produit->id }})"
                                                      class="button-minus dec button">
                                                  <input type="text" name="child"
                                                      value="{{ $commande->quantity_commande }}" class="quantity-field">
                                                  <input type="button" value="+" class="button-plus inc button "
                                                      wire:click.prevent="ajouter( {{ $commande->produit->id }})"
                                                      @if ($commande->produit->quantity <= 0) onClick="Swal.fire(
                                                                            'oups !!',
                                                                            'la quantité ne suffit pas pour ajouter à la commande!',
                                                                            'danger'
                                                                          )" @endif>
                                              </div>
                                          </div>
                                      </td>
                                      <td> <?php $total_item += $commande->quantity_commande * $commande->produit->price; ?>
                                          {{ $commande->quantity_commande * $commande->produit->price }}
                                      </td>
                                      <td>
                                          @if (!empty($last_commande))
                                              <li><a class="confirm"
                                                      wire:click="annuler({{ $last_commande->id }},{{ $commande->produit->id }}, {{ $commande->quantity_commande }})"><img
                                                          src="assets/img/icons/delete-2.svg" alt="img"></a>
                                              </li>
                                          @endif
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
                  @endif

                                    <div class="split-card">
                  </div>
                  <div class="pt-0 pb-2 card-body">
                      <div class="setvalue">
                          <ul>
                              @if (!empty($last_commande))
                                  <li class="total-value">
                                      <h5>sous total </h5>
                                      <h6><?= $total_item ?> $</h6>
                                  </li>
                                  <li class="total-value">
                                      <h5>TVA </h5>
                                      <h6>{{ ($total_item / 100) * 16 }} $</h6>
                                  </li>
                                  <li class="total-value">
                                      <h5>Total </h5>
                                      <h6><?= $total_item + ($total_item / 100) * 16 ?> $</h6>
                                  </li>
                              @endif
                          </ul>
                      </div>
                      <div class="col-12">
                      </div>
                  </div>
             @endif
          </div>

      </div>
  </div>
