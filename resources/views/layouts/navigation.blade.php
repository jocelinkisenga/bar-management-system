<nav class="flex-row p-0 navbar col-lg-12 col-12 fixed-top d-flex">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="mr-5 navbar-brand brand-logo" href="../../index.html"><img src="../../images/logo.svg" class="mr-2" alt="logo"/></a>
    <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../images/logo-mini.svg" alt="logo"/></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav mr-lg-2">
      <li class="nav-item nav-search d-none d-lg-block">
        <div class="input-group">
          <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
            <span class="input-group-text" id="search">
              <i class="icon-search"></i>
            </span>
          </div>
          <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
        </div>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">

      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <i class="icon-bell"></i> <span class="text-danger">
            @isset($notifications)
            {{$notifications->count()}} 
            @endisset

          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item">
            <i class="ti-edit text-primary"></i>
            toutes les reductions
          </a>
          @isset($notifications)
          @foreach ($notifications as $item)
          <a class="dropdown-item">
            <i class="ti-edit text-primary"></i>
            {{$item->precommande->code}}
          </a>
          @endforeach
          @endisset




        </div>
      </li>
      <li class="nav-item nav-settings d-none d-lg-flex">
        <a class="nav-link" href="#">
          <i class="icon-ellipsis"></i>
        </a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:../../partials/_settings-panel.html -->
  <div class="theme-setting-wrapper">
    <div id="settings-trigger"><i class="ti-settings"></i></div>
    <div id="theme-settings" class="settings-panel">
      <i class="settings-close ti-close"></i>
      <p class="settings-heading">Personnaliser l'écran</p>
      <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="mr-3 border img-ss rounded-circle bg-light"></div>blanc</div>
      <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="mr-3 border img-ss rounded-circle bg-dark"></div>noir</div>
      <p class="mt-2 settings-heading">Entête</p>
      <div class="px-4 mx-0 color-tiles">
        <div class="tiles success"></div>
        <div class="tiles warning"></div>
        <div class="tiles danger"></div>
        <div class="tiles info"></div>
        <div class="tiles dark"></div>
        <div class="tiles default"></div>
      </div>
    </div>
  </div>

  <!-- partial -->
  <!-- partial:../../partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="/dashboard">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('products')}}"  >
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Produits</span>
          
        </a>
       
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('tables')}}"  >
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">tables</span> 
        </a> 
      </li> --}}
      
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('commandes')}}"  >
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">commandes</span> 
        </a> 
      </li> --}}
@if (Auth::user()->role_id == 1)
<li class="nav-item">
  <a class="nav-link" href="{{route('categories')}}"  >
    <i class="icon-layout menu-icon"></i>
    <span class="menu-title">categorie</span>
    
  </a>
 
</li>

<li class="nav-item">
  <a class="nav-link" href="{{route('depenses')}}"  >
    <i class="icon-layout menu-icon"></i>
    <span class="menu-title">Depenses</span> 
  </a> 
</li>
<li class="nav-item">
  <a class="nav-link" href="{{route('rapports')}}"  >
    <i class="icon-layout menu-icon"></i>
    <span class="menu-title">rapports</span> 
  </a> 
</li>
<li class="nav-item">
  <a class="nav-link" href="{{route('users')}}"  >
    <i class="icon-layout menu-icon"></i>
    <span class="menu-title">personnel</span> 
  </a> 
</li>
<li class="nav-item">
  <a class="nav-link" href="{{route('reductions')}}"  >
    <i class="icon-layout menu-icon"><span class="text-danger">
      @isset ($notifications)
      {{$notifications->count()}}
    @endisset </span></i>
    <span class="menu-title">reduction</span> 
  </a> 
</li>

@endif
     
      <li class="nav-item">
        <form action="{{route('logout')}}" method="POST">
          @csrf
         
          <span class="menu-title"> <input type="submit" value="se deconnecter" class="text-white bg-danger nav-link"></span>
    

        </form>

      </li>

    </ul>
  </nav>