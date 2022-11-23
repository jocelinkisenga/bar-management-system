<div class="main-panel" id="page">
    <div class="content-wrapper">
        <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <p class="card-description">
                            <button type="button" class="ml-7 btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal" data-whatever="@mdo">Ajouter un personnel</button>


                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#createProduct" data-whatever="@mdo">Créer un role</button>

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
                                                <input type="text" wire:model="role_name" class="form-control"
                                                    id="recipient-name">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary"
                                                    wire:click.prevent="store_role()">créer</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un personnel</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <div class="form-group">
                                                <label for="">un role <span
                                                        class="text-danger">*</span>:</label>
                                                <select class="form-control" wire:model="role_id" id="">
                                                    <option selected>selectionner un role</option>
                                                    @foreach ($roles as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach


                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">nom <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" wire:model="name" class="form-control"
                                                    id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">telephone <span
                                                        class="text-danger">*</span>
                                                    :</label>
                                                <input type="number" wire:model="phone" class="form-control"
                                                    id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="">sexe <span class="text-danger">*</span>:</label>
                                                <select class="form-control" wire:model="sexe" id="">
                                                    <option selected>selectionner le sexe</option>
                                                    <option value="homme">Homme</option>
                                                    <option value="femme">Femme</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">mot de passe
                                                    :</label>
                                                <input type="text" wire:model="password" class="form-control"
                                                    id="recipient-name">
                                            </div>

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">email
                                                    :</label>
                                                <input type="text" wire:model="email" class="form-control"
                                                    id="recipient-name">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary"
                                                    wire:click.prevent="ajouter()">créer</button>
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
                                              
                                                <tr class="uppercase table-info ">
                                                    <th>
                                                    #
                                                    </th>
                                                    <th class="">
                                                       nom
                                                    </th>
                                                    <th>
                                                        email/phone
                                                    </th>

                                                    <th>
                                                       role
                                                    </th>
                                                    <th>
                                                       sexe
                                                    </th>
                                                                                                        <th>
                                                       detail
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $key =>$item )
                                                <tr>
                                                    <td>  {{$key+1}}</td>
                                                    <td>
                                                        {{$item->name}}
                                                    </td>
                                                    <td>
                                                        @if ($item->email != null)
                                                            {{$item->email}}
                                                        @else
                                                        {{$item->phone}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{$item->role}}
                                                    </td>
                                                    

                                                    <td>
                                                        {{$item->sexe}}
                                                    </td>
                                                    <td>
                                                       <a class="btn btn-success btn-sm" href="{{route('user-detail',['id'=>$item->id])}}">voir plus</a>
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
