{{-- <div class="main-panel" id="page">
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
                                    <h4 class="card-title">Le personnel </h4><input type="text" id="myInput"
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
                                                @foreach ($users as $key => $item)
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
</div> --}}

{{-- <div class="main-panel" id="page">
    <div class="content-wrapper">
        <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <p class="card-description">
                            <button type="button" class="btn btn-success text-uppercase" data-toggle="modal"
                                data-target="#exampleModal" data-whatever="@mdo">Ajouter une categorie</button>

                        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter une categorie</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">nom:</label>
                                                <input type="text" wire:model="name" class="form-control"
                                                    id="recipient-name">
                                            </div>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
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
                                    <h4 class="card-title">Mes categories</h4>
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">{{ session('message') }}</div>
                                    @endif
                                    <p class="card-description">
                                    </p>
                                    <div class="pt-3 table-responsive">
                                        <table class="table rounded-sm table-bordered" id="myTable">
                                            <thead>
                                                <tr class="table-success text-uppercase">
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        nom
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $item)
                                                    <tr>
                                                        <td>
                                                            {{ $key + 1 }}
                                                        </td>
                                                        <td>
                                                            {{ $item->name }}
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-success btn-sm"
                                                                data-toggle="modal" data-target="#Editer"
                                                                data-whatever="@mdo">Editer</button>

                                                            <div wire:ignore.self class="modal fade" id="Editer"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Editer
                                                                                categorie</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form>
                                                                                <div class="form-group">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">nom:</label>
                                                                                    <input type="text"
                                                                                        wire:model="name"
                                                                                        class="form-control"
                                                                                        id="recipient-name"
                                                                                        value="{{ $item->name }}">
                                                                                </div>
                                                                                @error('name')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                                <div class="modal-footer">
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary"
                                                                                        wire:click.prevent="modifier({{ $item->id }})">modifier</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
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
<script>
    window.live.on('categorieStore', () => {
        $('#exampleModal').modal('hidden');
    })
</script> --}}

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Liste du personnel</h4>
                <h6></h6>
            </div>
            <div class="page-btn">
                <a data-bs-toggle="modal" data-bs-target="#create" class="btn btn-added"><img
                        src="assets/img/icons/plus.svg" alt="img" class="me-1">Ajouter un utilisateur</a>
            </div>
        </div>


        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <img src="assets/img/icons/filter.svg" alt="img">
                                <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                            </a>
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                    alt="img"></a>
                        </div>
                    </div>
                    <div class="wordset">
                        <ul>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                        src="assets/img/icons/pdf.svg" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                        src="assets/img/icons/excel.svg" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                        src="assets/img/icons/printer.svg" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                </th>
                                <th>N°</th>
                                <th>nom</th>
                                <th>email / telephone</th>
                                <th>role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $item)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>{{ $item->email ?? $item->phone }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>
                                        <a class="me-3" href="{{route('user-detail',['id'=>$item->id])}}">
                                            <img src="assets/img/icons/edit.svg" alt="img">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>

    {{-- modal create --}}
    <div wire:ignore.self class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un personnel</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>nom</label>
                                <input type="text" wire:model="name">
                            </div>
                        </div>

                    
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="">un role <span class="text-danger">*</span>:</label>
                            <select class="form-control" wire:model="role_id" id="">
                                <option selected>selectionner un role</option>
                                @foreach ($roles as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach


                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">telephone <span
                                    class="text-danger">*</span>
                                :</label>
                            <input type="number" wire:model="phone" class="form-control" id="recipient-name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="">sexe <span class="text-danger">*</span>:</label>
                            <select class="form-control" wire:model="sexe" id="">
                                <option selected>selectionner le sexe</option>
                                <option value="homme">Homme</option>
                                <option value="femme">Femme</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">mot de passe
                                :</label>
                            <input type="text" wire:model="password" class="form-control" id="recipient-name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">email
                                :</label>
                            <input type="text" wire:model="email" class="form-control" id="recipient-name">
                        </div>
                    </div>
                </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2"wire:click.prevent="ajouter()" onclick="Swal.fire(
                            'Good job!',
                            'produit créé avec succès',
                            'success'
                          )">enregistrer </a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">annuler</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal create --}}
</div>
