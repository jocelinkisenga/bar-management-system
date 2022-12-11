{{-- <nav class="flex-row p-0 navbar col-lg-12 col-12 fixed-top d-flex">
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
{{-- @if (Auth::user()->role_id == 1) --}}
{{-- <li class="nav-item">
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
</li> --}}

{{-- @endif --}}


{{--      
      <li class="nav-item">
        <form action="{{route('logout')}}" method="POST">
          @csrf
         
          <span class="menu-title"> <input type="submit" value="se deconnecter" class="text-white bg-danger nav-link"></span>
    

        </form>

      </li>

    </ul>
  </nav> --}} 

  <div class="header">
			
    <!-- Logo -->
     <div class="header-left active">
      <a href="index.html" class="logo">
        <img src="{{asset('assets/img/logo.png')}}"  alt="">
      </a>
      <a href="index.html" class="logo-small">
        <img src="{{asset('assets/img/logo-small.png')}}"  alt="">
      </a>
      <a id="toggle_btn" href="javascript:void(0);">
      </a>
    </div>
    <!-- /Logo -->
    
    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
      <span class="bar-icon">
        <span></span>
        <span></span>
        <span></span>
      </span>
    </a>
    
    <!-- Header Menu -->
    <ul class="nav user-menu">
    
      <!-- Search -->
      <li class="nav-item">
        <div class="top-nav-search">
          
          <a href="javascript:void(0);" class="responsive-search">
            <i class="fa fa-search"></i>
        </a>
          <form action="#">
            <div class="searchinputs">
              <input type="text" placeholder="Search Here ...">
              <div class="search-addon">
                <span><img src="{{asset('assets/img/icons/closes.svg')}}" alt="img"></span>
              </div>
            </div>
            <a class="btn"  id="searchdiv"><img src="{{asset('assets/img/icons/search.svg')}}" alt="img"></a>
          </form>
        </div>
      </li>
      <!-- /Search -->
    
      <!-- Flag -->
      <li class="nav-item dropdown has-arrow flag-nav">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
          <img src="assets/img/flags/us1.png" alt="" height="20">
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="javascript:void(0);" class="dropdown-item">
            <img src="assets/img/flags/us.png" alt="" height="16"> English
          </a>
          <a href="javascript:void(0);" class="dropdown-item">
            <img src="assets/img/flags/fr.png" alt="" height="16"> French
          </a>
          <a href="javascript:void(0);" class="dropdown-item">
            <img src="assets/img/flags/es.png" alt="" height="16"> Spanish
          </a>
          <a href="javascript:void(0);" class="dropdown-item">
            <img src="assets/img/flags/de.png" alt="" height="16"> German
          </a>
        </div>
      </li>
      <!-- /Flag -->
    
      <!-- Notifications -->
      <li class="nav-item dropdown">
        <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
          <img src="{{asset('assets/img/icons/notification-bing.svg')}}"   alt="img"> <span class="badge rounded-pill">4</span>
        </a>
        <div class="dropdown-menu notifications">
          <div class="topnav-dropdown-header">
            <span class="notification-title">Notifications</span>
            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
          </div>
          <div class="noti-content">
            <ul class="notification-list">
              <li class="notification-message">
                <a href="activities.html">
                  <div class="media d-flex">
                    <span class="flex-shrink-0 avatar">
                      <img alt="" src="assets/img/profiles/avatar-02.jpg">
                    </span>
                    <div class="media-body flex-grow-1">
                      <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                      <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </div>
          <div class="topnav-dropdown-footer">
            <a href="activities.html">View all Notifications</a>
          </div>
        </div>
      </li>
      <!-- /Notifications -->
      
      <li class="nav-item dropdown has-arrow main-drop">
        <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
          <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="">
          <span class="status online"></span></span>
        </a>
        <div class="dropdown-menu menu-drop-user">
          <div class="profilename">
            <div class="profileset">
              <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="">
              <span class="status online"></span></span>
              <div class="profilesets">
                <h6>John Doe</h6>
                <h5>Admin</h5>
              </div>
            </div>
            <hr class="m-0">
            <a class="dropdown-item" href="profile.html"> <i class="me-2"  data-feather="user"></i> My Profile</a>
            <a class="dropdown-item" href="generalsettings.html"><i class="me-2" data-feather="settings"></i>Settings</a>
            <hr class="m-0">
            <a class="pb-0 dropdown-item logout" href="signin.html"><img src="assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
          </div>
        </div>
      </li>
    </ul>
    <!-- /Header Menu -->
    
    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
      <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="profile.html">My Profile</a>
        <a class="dropdown-item" href="generalsettings.html">Settings</a>
        <a class="dropdown-item" href="signin.html">Logout</a>
      </div>
    </div>
    <!-- /Mobile Menu -->
        </div>
  