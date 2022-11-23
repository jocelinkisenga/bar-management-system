 @extends('layouts.guest')
 @section('content')
     
 <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="px-0 content-wrapper d-flex align-items-center auth">
        <div class="mx-0 row w-100">
          <div class="mx-auto col-lg-4">
            <div class="px-4 py-5 text-left auth-form-light px-sm-5">

              <h4 class="center">se connecter</h4>
              <form class="pt-3" method="POST" action="{{route('login')}}">
                @csrf
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <small class="ml-5 text-red-800 " id="emailError"></small>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <small class="ml-5 text-red-800 " id="passwordError"></small>
                <div class="mt-3">
                  <input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="login">
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 @endsection
