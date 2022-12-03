@extends('layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">

                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Mes produits</h4>
                            <p class="card-description">
                            </p>
                            <div class="pt-3 table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="table-info">
                                          <th>
                                            #
                                          </th>
                                            <th>
                                                nom
                                            </th>
                                            <th>
                                                quantité
                                            </th>
                                            <th>
                                                prix
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($produits  as $key => $item )
                                      <tr>
                                        <td>
                                          {{$key+1}}
                                        </td>

                                        <td>
                                          {{$item->name}}
                                        </td>

                                        <td>
                                            {{$item->quantity}}
                                        </td>

                                        <td>
                                            {{$item->price}} fc
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
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">

        </footer>
        <!-- partial -->
    </div>
@endsection
