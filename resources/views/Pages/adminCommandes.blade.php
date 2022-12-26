@extends('layouts.new')
@section('content')
    {{-- <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Liste des commandes</h4>
                    <h6></h6>
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
                            <div class="col-sm-12 col-md-6">
                                <div class="dt-buttons btn-group flex-wrap">
                                    <button
                                        class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1"
                                        type="button"><span>Print</span></button>
                                   
                                </div>
                            </div>
                            {{-- <ul>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
                            </li>
                            <li>
                                <button type="button" id="print" data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></button>
                            </li>
                        </ul> --}
                        </div>
                    </div>



                    <div class="table-responsive">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    </th>
                                    <th>N°</th>
                                    <th>code</th>

                                    <th>quantité</th>
                                    <th>sous-total</th>
                                    <th>reduction</th>
                                    <th>prix total</th>
                                    <th>date</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($commandes as $key => $item)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $item->precommande->code }}
                                        </td>


                                        <td>{{ $item->quantity_commande }}</td>
                                        <td>{{ $item->quantity_commande * $item->produit->price }} $</td>
                                        <td>
                                            @if (!empty($item->reduction->pourcentage))
                                                {{ $item->reduction->pourcentage }} %
                                            @else
                                                Aucune
                                            @endif
                                        </td>
                                        <td>
                                            @if (!empty($item->reduction))
                                                {{ $item->quantity_commande * $item->produit->price - ($item->quantity_commande * $item->produit->price * $item->reduction->pourcentage) / 100 }}
                                                $
                                            @else
                                                {{ $item->quantity_commande * $item->produit->price }} $
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        @if ($item->precommande->status == true)
                                            <td><span class="bg-success btn-sm text-white p-2 rounded-sm">confirmé</span>
                                            </td>
                                        @else
                                            <td><span class="bg-warning btn-sm text-white p-2 rounded-sm">en cours</span>
                                            </td>
                                        @endif
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
        {{-- <div wire:ignore.self class="modal fade" id="create" tabindex="-1" aria-labelledby="create"  aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                     <h5 class="modal-title" >Ajouter un produit</h5>
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
                                <label>prix de vente</label>
                                <input type="text" wire:model="price">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>image</label>
                                <input type="file" wire:model="photo">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                          
                               
                                <div class="form-group">
                                    <label for="my-select">Text</label>
                                    <select id="my-select" class="form-control" wire:model="categorie_id">
                                        <option selected>selectionner une categorie</option>
                                        @foreach ($categories as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2" wire:click.prevent="store()"     onclick="Swal.fire(
                            'Good job!',
                            'produit créé avec succès',
                            'success'
                          )">Submit</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
        {{-- end modal create --
    </div> --}}



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
         
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                </th>
               
                <th>code</th>

                <th>quantité</th>
                <th>sous-total</th>
                <th>reduction</th>
                <th>prix total</th>
                <th>date</th>
                <th>status</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($commandes as $item)
                    <tr>
                        <td>{{$item->precommande->code}}</td>
                        <td>{{$item->quantity_commande}}
                        </td>
                        <td>{{ $item->quantity_commande * $item->produit->price }} $</td>
                        <td>                                            
                         @if (!empty($item->reduction->pourcentage))
                            {{ $item->reduction->pourcentage }} %
                        @else
                            Aucune
                        @endif
                    </td>
                        <td>   @if (!empty($item->reduction))
                            {{ $item->quantity_commande * $item->produit->price - ($item->quantity_commande * $item->produit->price * $item->reduction->pourcentage) / 100 }}
                            $
                        @else
                            {{ $item->quantity_commande * $item->produit->price }} $
                        @endif</td>
                        <td>{{ $item->created_at }}</td>
                        @if ($item->precommande->status == true)
                        <td><span class="bg-success btn-sm text-white p-2 rounded-sm">confirmé</span>
                        </td>
                    @else
                        <td><span class="bg-warning btn-sm text-white p-2 rounded-sm">en cours</span>
                        </td>
                    @endif
                      </tr>    
                    @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>




@endsection

@section('script')
    <script>
        $(function() {
            $("#example").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            })

        });
    </script>
@endsection
