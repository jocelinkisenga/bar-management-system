@extends("layouts.app")
@section("content")
<div class="main-panel">
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
</div>

@endsection
