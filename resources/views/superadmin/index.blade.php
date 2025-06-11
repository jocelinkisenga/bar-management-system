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
									<i data-feather="file-text"></i> 
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
						
						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das2">
								<div class="dash-counts">
									<h4>{{App\Models\user::whereCompany_id(Auth::user()->company_id)->count()}}</h4>
									<h5>PERSONNEL</h5>
								</div>
							
								<div class="dash-imgs">
									<i data-feather="user-check"></i>
								</div>
							</div>
						</div>
					</div>
					<!-- Button trigger modal -->


					<div class="mb-0 card">
						<div class="card-body">
							<h4 class="card-title">listes des produits</h4>
							<div class="table-responsive dataview">
								<table class="table datatable ">
									<thead>
										<tr>
											<th>SNo</th>
											
											<th>Societe</th>
											<th>Administrateur</th>
											<th>status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($clients as $key => $item )
										<tr>
											<td>{{$key+1}}</td>
											<td>
												<a >{{$item->company_name}}</a>
											</td>
											<td> {{$item->name}}</td>
											<td>
                                                @if ($item->elligible == false)
                                                    Non elligible
                                                @else
                                                    Elligible
                                                @endif
                                            </td>
											<td>
                                                @if ($item->elligible == false)
													<a href="{{ route("superadmin.activate", ['user_id' => $item->id]) }}" class="btn bg-primary btn-sm text-white">Activer</a>
												@else
													<a href="{{ route("superadmin.deactivate", ['user_id' => $item->id]) }}" class="btn btn-danger btn-sm text-white">Desactiver</a>
												@endif
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
		<!-- /Main Wrapper -->
		
@endsection