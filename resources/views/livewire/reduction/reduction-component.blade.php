@php
global $total;
use App\Enums\PercentEnum;
@endphp


{{-- 
<div class="main-panel" id="page">

    <div class="content-wrapper">

        <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <p class="card-description">

                        </p>


                        <div class="col-lg-12 stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">commande </h4>
                                    <p class="card-description">
                                        <button type="button" class="btn btn-success text-uppercase" data-toggle="modal"
                                        data-target="#exampleModal" data-whatever="@mdo">REDUIRE</button>
        
                                <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">REDUIRE</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                       
                                                        <div class="form-group">
                                                          <label for="">pourcentage </label>
                                                          <select class="form-control" wire:model="percent">
                                                            <option selected> selectionner un pourcentage</option>
                                                            @foreach (PercentEnum::PERCENT as $percent)
                                                            <option value="{{$percent}}">{{$percent}} %</option>
                                                            @endforeach
                                                           
                                                          </select>
                                                        </div>
                                                    </div>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary"
                                                            wire:click.prevent="update({{$reduction_id}})">réduire</button>
                                                    </div>
                                                </form>
                                            </div>
        
                                        </div>
                                    </div>
                                </div>
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
                                                        sous-total
                                                      </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($reduction as $key => $item )
                                            <tr>
                                                <td>
                                                    {{$key+1}}
                                                </td>
                                                <td>
                                                    {{$item->name}}
                                                </td>
                                                <td>
                                                    {{$item->qty}}
                                                </td>
                                                <td>
                                                    {{ $item->qty * $item->price }} $
                                                </td>
                                                @php
                                                    $total += $item->qty * $item->price; 
                                                @endphp
    
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
                <h4>Liste des categories</h4>
                <h6></h6>
            </div>
            <div class="page-btn">
                <a data-bs-toggle="modal" data-bs-target="#create" class="btn btn-added"><img src="{{asset('assets/img/icons/plus.svg')}}" alt="img" class="me-1">faites une reduction</a>
            </div>
        </div>
        

        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <img src="{{asset('assets/img/icons/filter.svg')}}" alt="img">
                                <span><img src="{{asset('assets/img/icons/closes.svg')}}" alt="img"></span>
                            </a>
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="{{asset('assets/img/icons/search-white.svg')}}" alt="img"></a>
                        </div>
                    </div>
                </div>
                <!-- /Filter -->

                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                </th>
                                <th>N°</th>
                                <th>nom</th>
                                <th>quantité</th>
                                <th>sous-total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reduction as $key => $item)
                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td >
                                    {{$item->name}}
                                </td>
                                <td>{{$item->qty}}</td>
                                <td> {{ $item->qty * $item->price }} $</td>
                              
                                   
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
    <div wire:ignore.self class="modal fade" id="create" tabindex="-1" aria-labelledby="create"  aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                     <h5 class="modal-title" >REDUIRE</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            
                                <div class="form-group">
                                    <label for="">pourcentage </label>
                                    <select class="form-control" wire:model="percent">
                                      <option selected> selectionner un pourcentage</option>
                                      @foreach (PercentEnum::PERCENT as $percent)
                                      <option value="{{$percent}}">{{$percent}} %</option>
                                      @endforeach
                                     
                                    </select>
                                  
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2" wire:click.prevent="update({{$reduction_id}})">confirmer</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal create --}}
</div>