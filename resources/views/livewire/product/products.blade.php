<div class="main-panel" id="page">
    <div class="content-wrapper">

        <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <p class="card-description">
                            <button type="button" class="btn btn-success text-uppercase" data-toggle="modal"
                                data-target="#createProduct" data-whatever="@mdo">Créer un produit</button>


                        <div wire:ignore.self class="modal fade" id="createProduct" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un produit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">nom:</label>
                                                <input type="text" wire:model="name" class="form-control"
                                                    id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">prix de
                                                    vente:</label>
                                                <input type="text" wire:model="price" class="form-control" 
                                                    id="recipient-name">
                                            </div>


                                            <div class="form-group">
                                                <label for="">categorie :</label>
                                                <select class="form-control" wire:model="categorie_id" id="">
                                                    <option selected>selectionner une categorie</option>
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary"
                                                    wire:click.prevent="store()">créer</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </p>


                        <div class="col-lg-12 stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    <h4 class="card-title">Mes produits </h4><input type="text" id="myInput"
                                        class="" onkeyup="myFunction()" placeholder="Search for names..">
                                    <p class="card-description">
                                    </p>
                                    <div class="pt-3 table-responsive">
                                        <table class="table table-bordered" id="myTable">
                                            <thead class="uppercase">
                                                <tr class="text-uppercase table-info ">
                                                    <th>
                                                        #
                                                    </th>
                                                    <th class="">
                                                        nom
                                                    </th>
                                                    <th>
                                                        quantité
                                                    </th>

                                                    <th>
                                                        prix de vente
                                                    </th>
                                                    <th>
                                                      categorie
                                                    </th>
                                                    <th>
                                                        detail
                                                      </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($this->data as $key => $produit)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>
                                                            {{ $produit->name }}
                                                        </td>
                                                        <td>
                                                            {{ $produit->quantity }}
                                                        </td>
                                                        <td>
                                                            {{ $produit->price }} 
                                                        </td>

                                                        <td>
                                                            {{ $produit->categorie->name }} 
                                                        </td>


                                                        <td>
                                                            <a href="{{route('product-detail',['id'=>$produit->id])}}" class="btn btn-success btn-sm"> voir plus</a>
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
    </div>
</div>
