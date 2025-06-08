 @extends('layouts.guest')
 @section('content')
     
 <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="px-0 content-wrapper d-flex align-items-center auth">
        <div class="mx-0 row w-100">
          <div class="mx-auto col-lg-4">
            <div class="px-4 py-5 text-left auth-form-light px-sm-5">

              <h4 class="center">Creer un compte</h4>
              <form class="pt-3" method="POST" action="{{route('register')}}">
                @csrf
                <div class="form-group">
                  <input type="text" name="company_name" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="nom de la societe">
                </div>
                 @error('company_name')
                 <small class="mb-5 ml-5 text-danger  " id="emailError">{{$message}}</small>
                 @enderror
                 <div class="form-group">
                  <input type="text" name="name" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Nom du proprietaire">
                </div>
                 @error('name')
                 <small class="mb-5 ml-5 text-danger  " id="emailError">{{$message}}</small>
                 @enderror
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="email">
                </div>
                 @error('email')
                 <small class="mb-5 ml-5 text-danger  " id="emailError">{{$message}}</small>
                 @enderror
                
                <div class="form-group mt-5">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                @error('password')
                <small class="ml-5 text-danger " id="passwordError">{{$message}}</small>
                @enderror
                
                <div class="mt-3">
                  <input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="login">
                </div>

              </form>
            </div>
            <a href="{{ route("login") }}" class="text-success font-weight-medium" >Vous avez un compte? connetez vous</a>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 @endsection
