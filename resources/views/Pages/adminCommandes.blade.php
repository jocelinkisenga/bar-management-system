@extends('layouts.new')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>listes des commandes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">commandes</li>
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
                <h3 class="card-title">liste des commandes </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>

                  <tr>
                
               
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

@section('scripto')

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
@endsection
