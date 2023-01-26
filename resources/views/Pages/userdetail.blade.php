@extends("layouts.app")
@section("content")
{{-- <div class="main-panel">
    <div class="content-wrapper">


    <div>
        @if (session('message'))
          <p class="text-success">{{session('message')}}</p>
        @endif
    </div>

        <div class="row mt-3">
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card bg-green">
                    <div class="card-body">
                        <h4 class="card-title">Fiche du personnel</h4>
                        <p class="card-description">

                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-bold text-uppercase">
                                        <th>#</th>
                                        <th>valeur</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-bold">nom</td>
                                        <td>{{ $data->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">role</td>
                                        <td>{{ $data->role->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">email/phone</td>
                                        <td>
                                         @if ($data->email != null)
                                             {{$data->email}}
                                         @else
                                         {{$data->phone}}
                                         @endif   
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold">genre</td>
                                        <td>{{ $data->sexe }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Historique de service  du jour</h4>
                        <p class="card-description">

                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>produit</th>
                                        <th>quantité</th>
                                        <th>Montant</th>
                                    </tr>
                                </thead>
                                <tbody>
                           @if (!empty($precommandes))
                           @foreach ($precommandes as $key => $item)
                           <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$item->name}}</td>
                               <td>{{$item->quantity_commande}}</td>
                               <td>{{$item->price * $item->quantity_commande}} fc</td>
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
</div> --}}



<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>utilisateur detail</h4>
            </div>
            
            {{-- <div class="page-btn">
                <a data-bs-toggle="modal" data-bs-target="#quantity" class="btn btn-success"><img src="{{asset('assets/img/icons/plus.svg')}}" alt="img" class="me-1">MàJ de la quantité</a>
            </div>
            <div class="page-btn">
                <a data-bs-toggle="modal" data-bs-target="#price" class="btn btn-added"><img src="{{asset('assets/img/icons/plus.svg')}}" alt="img" class="me-1">Màj du prix de vente</a>
            </div> --}}
        </div>
        <!-- /add -->
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="bar-code-view">
                           
                            <a class="printimg">
                              
                            </a>
                        </div>
                        <div class="productdetails">
                            <ul class="product-bar">
                                <li>
                                    <h4>nom</h4>
                                    <h6>{{ $data->name }}	</h6>
                                </li>
                                <li>
                                    <h4>email/phone</h4>
                                    <h6> 
                                   @if ($data->email != null)
                                        {{$data->email}}
                                    @else
                                    {{$data->phone}}
                                    @endif  </h6>
                                </li>
                                <li>
                                    <h4>role</h4>
                                    <h6>@if($data->role_id == App\Enums\RoleEnum::SERVER)
                                        server
                                        @elseif($data->role_id == App\Enums\RoleEnum::ADMIN)
                                        administrateur
                                        @else
                                        Gerant
                                        @endif
                                    </h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12" wire:ignore>
                <div class="card">
                    <div class="card-body">
                        <div class="slider-product-details">
                            <div class="owl-carousel owl-theme product-slide">
                                <div class="slider-product">
                                    <div class="dash-imgs">
                                        <i data-feather="user-check"></i>
                                    </div>
                                    <h4>{{$data->name}}</h4>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      @if($data->role_id == App\Enums\RoleEnum::SERVER)
      <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-path">

                    </div>
                    <div class="search-input">
                        <a class="btn btn-searchset"><img src="{{asset('assets/img/icons/search-white.svg')}}" alt="img"></a>
                    </div>
                </div>
                <div class="wordset">
                    <ul>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{asset('assets/img/icons/pdf.svg')}}" alt="img"></a>
                        </li>

                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{asset('assets/img/icons/printer.svg')}}" alt="img"></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            </th>
                            <th>code</th>
                            <th>quantité</th>
                            <th>sous-total</th>
                            <th>date</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($precommandes as $key => $item)
                        <tr>
                            <td>
                                {{$item->code}}
                            </td>
                            
                            <td>
                                {{$item->quantity_commande}}
                            </td>
                            <td>
                                {{ $item->quantity_commande * $item->produit->price }} $
                            </td>
                            <td>{{$item->precommande->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
      @endif
            
        <!-- /add -->
    </div>


</div>


@endsection
