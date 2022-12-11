<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="active">
          <a href="{{route('dashboard')}}" ><img src="{{asset('assets/img/icons/dashboard.svg')}}" alt="img"><span> Dashboard</span> </a>
        </li>
        <li class="submenu">
          <a><img src="{{asset('assets/img/icons/product.svg')}}" alt="img"><span> catégories</span></a>
          <ul>
            <li><a href="{{route('categories')}}">liste des categories </a></li>
          </ul>

        </li>
        
        <li class="submenu">
          <a ><img src="{{asset('assets/img/icons/product.svg')}}" alt="img"><span> produits</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="{{route('products')}}">liste des produits </a></li>
          </ul>
        </li>
        <li class="submenu">
          <a ><img src="{{asset('assets/img/icons/product.svg')}}" alt="img"><span> commandes</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="{{route('commandes')}}">liste des commandes </a></li>
          </ul>
        </li>
        <li class="submenu">
          <a ><img src="{{asset('assets/img/icons/product.svg')}}" alt="img"><span> depenses</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="{{route('depenses')}}">liste des depense </a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/product.svg')}}" alt="img"><span> reductions</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="{{route('reductions')}}">liste des reductions </a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/product.svg')}}" alt="img"><span> rapport</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="{{route('rapports')}}">rapport </a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/product.svg')}}" alt="img"><span> personnel</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="{{route('users')}}">liste du personnel </a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>