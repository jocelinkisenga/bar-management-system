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
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="dash-widget">
								<div class="dash-widgetimg">
									<span><img src="assets/img/icons/dash1.svg" alt="img"></span>
								</div>
								<div class="dash-widgetcontent">
									<h5 >$<span class="counters" data-count="307144.00">$307,144.00</span></h5>
									<h6>Total Purchase Due</h6>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="dash-widget dash1">
								<div class="dash-widgetimg">
									<span><img src="assets/img/icons/dash2.svg" alt="img"></span>
								</div>
								<div class="dash-widgetcontent">
									<h5 >$<span class="counters" data-count="4385.00">$4,385.00</span></h5>
									<h6>Total Sales Due</h6>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="dash-widget dash2">
								<div class="dash-widgetimg">
									<span><img src="assets/img/icons/dash3.svg" alt="img"></span>
								</div>
								<div class="dash-widgetcontent">
									<h5 >$<span class="counters" data-count="385656.50">385,656.50</span></h5>
									<h6>Total Sale Amount</h6>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="dash-widget dash3">
								<div class="dash-widgetimg">
									<span><img src="assets/img/icons/dash4.svg" alt="img"></span>
								</div>
								<div class="dash-widgetcontent">
									<h5 >$<span class="counters" data-count="40000.00">400.00</span></h5>
									<h6>Total Sale Amount</h6>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count">
								<div class="dash-counts">
									<h4>100</h4>
									<h5>Customers</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="user"></i> 
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das1">
								<div class="dash-counts">
									<h4>100</h4>
									<h5>Suppliers</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="user-check"></i> 
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das2">
								<div class="dash-counts">
									<h4>100</h4>
									<h5>Purchase Invoice</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="file-text"></i>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das3">
								<div class="dash-counts">
									<h4>105</h4>
									<h5>Sales Invoice</h5>
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
											<th>Product Code</th>
											<th>Product Name</th>
											<th>Brand Name</th>
											<th>Category Name</th>
											<th>Expiry Date</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td><a href="javascript:void(0);">IT0001</a></td>
											<td class="productimgname">
												<a class="product-img" href="productlist.html">
													<img src="assets/img/product/product2.jpg" alt="product">
												</a>
												<a href="productlist.html">Orange</a>
											</td>
											<td>N/D</td>
											<td>Fruits</td>
											<td>12-12-2022</td>
										</tr>
										<tr>
											<td>2</td>
											<td><a href="javascript:void(0);">IT0002</a></td>
											<td class="productimgname">
												<a class="product-img" href="productlist.html">
													<img src="assets/img/product/product3.jpg" alt="product">
												</a>
												<a href="productlist.html">Pineapple</a>
											</td>
											<td>N/D</td>
											<td>Fruits</td>
											<td>25-11-2022</td>
										</tr>
										<tr>
											<td>3</td>
											<td><a href="javascript:void(0);">IT0003</a></td>
											<td class="productimgname">
												<a class="product-img" href="productlist.html">
													<img src="assets/img/product/product4.jpg" alt="product">
												</a>
												<a href="productlist.html">Stawberry</a>
											</td>
											<td>N/D</td>
											<td>Fruits</td>
											<td>19-11-2022</td>
										</tr>
										<tr>
											<td>4</td>
											<td><a href="javascript:void(0);">IT0004</a></td>
											<td class="productimgname">
												<a class="product-img" href="productlist.html">
													<img src="assets/img/product/product5.jpg" alt="product">
												</a>
												<a href="productlist.html">Avocat</a>
											</td>
											<td>N/D</td>
											<td>Fruits</td>
											<td>20-11-2022</td>
										</tr>
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