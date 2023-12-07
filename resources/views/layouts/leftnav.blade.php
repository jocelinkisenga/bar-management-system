@php
    use App\Enums\RoleEnum;
@endphp
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/img/icons/dashboard.svg') }}"
                            alt="img"><span> Dashboard</span> </a>
                </li>
                <li class="">
                    <a href="{{ route('categories') }}"><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span>
                            catégories</span><span class="menu-arrow"></span></a>

                </li>

                <li class="">
                    <a  href="{{ route('products') }}"><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span> produits</span>
                        <span class="menu-arrow"></span></a>

                </li>
                <li class="">
                    <a href="{{ route('admin-commande') }}"><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span> commandes</span>
                        <span class="menu-arrow"></span></a>

                </li>
                <li class="">
                    <a href="{{ route('depenses') }}"><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span> depenses</span>
                        <span class="menu-arrow"></span></a>

                </li>
                @if (Auth::user()->role_id == RoleEnum::ADMIN)
                    <li class="">
                        <a href="{{ route('reductions') }}"><img src="{{ asset('assets/img/icons/product.svg') }}"
                                alt="img"><span> reductions</span> <span class="menu-arrow"></span></a>

                    </li>
                    <li class="">
                        <a href="{{ route('rapports') }}"><img src="{{ asset('assets/img/icons/product.svg') }}"
                                alt="img"><span> rapport</span> <span class="menu-arrow"></span></a>

                    </li>
                    <li class="">
                        <a href="{{ route('users') }}"><img src="{{ asset('assets/img/icons/product.svg') }}"
                                alt="img"><span> personnel</span> <span class="menu-arrow"></span></a>

                    </li>
                @else
                    <li class="text-white bg-warning">
                        <a href="{{ route('commandes') }}"><img src="{{ asset('assets/img/icons/dashboard.svg') }}"
                                alt="img"><span> rentrer à l'acceuil</span> </a>
                    </li>
                @endif



            </ul>
        </div>
    </div>
</div>
