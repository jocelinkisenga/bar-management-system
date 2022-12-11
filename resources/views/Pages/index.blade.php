{{-- @extends('layouts.app')
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
                                            {{$item->price}} $
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
@endsection --}}

@extends('layouts.app')
@section('content')

			<div class="page-wrapper">
				<div class="content">
					<div class="row">
					
						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count">
								<div class="dash-counts">
									<h4>{{App\Models\Produit::count()}}</h4>
									<h5>PRODUITS</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="user"></i> 
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das1">
								<div class="dash-counts">
									<h4>{{App\Models\Categorie::count()}}</h4>
									<h5>CATEGORIES</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="user-check"></i> 
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das2">
								<div class="dash-counts">
									<h4>{{App\Models\user::count()}}</h4>
									<h5>PERSONNEL</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="file-text"></i>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das3">
								<div class="dash-counts">
									<h4>{{App\Models\Precommande::count()}}</h4>
									<h5>COMMANDES</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="file"></i>  
								</div>
							</div>
						</div>
					</div>
					<!-- Button trigger modal -->


					<div class="mb-0 card">
						<div class="card-body">
							<h4 class="card-title">Expired Products</h4>
							<div class="table-responsive dataview">
								<table class="table datatable ">
									<thead>
										<tr>
											<th>SNo</th>
											
											<th>nom</th>
											<th>categorie</th>
											<th>quantité</th>
											<th>prix</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($produits as $key => $item )
										<tr>
											<td>{{$key+1}}</td>
											<td class="productimgname">
												<a class="product-img" href="productlist.html">
													<img src="assets/img/product/product2.jpg" alt="product">
												</a>
												<a href="productlist.html">{{$item->name}}</a>
											</td>
											<td>{{$item->categorie->name}}</td>
											<td>{{$item->quantity}}</td>
											<th>{{$item->price}} $</th>
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
		<!-- /Main Wrapper -->
		
@endsection