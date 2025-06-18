<div>
    @php
        use App\Models\produit;
        global $total_item;
        global $facture_total;
        global $pourcentage;
    @endphp

    <div class="main-wrappers" style="background-color: #f6f1f1;">
        <div class="header border border-primary">
            <!-- Logo -->
            <div class="border-0 header-left ">
                <a href="" class="logo">
                    <img src="assets/img/logo.png" alt="">
                </a>
                <a href="index.html" class="logo-small">
                    <img src="assets/img/logo-small.png" alt="">
                </a>
            </div>
            <!-- /Logo -->

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
                                    <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                </div>
                            </div>
                            <a class="btn" id="searchdiv"><img src="assets/img/icons/search.svg" alt="img"></a>
                        </form>
                    </div>
                </li>
                <!-- /Search -->

                <!-- Flag -->
                <!-- /Flag -->

                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <img src="assets/img/icons/notification-bing.svg" alt="img"> <span
                            class="badge rounded-pill">
                            <livewire:components.reduced>
                        </span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">

                                @foreach ($reductions as $item)
                                    <li class="notification-message">
                                        <a>
                                            <div class="media d-flex">
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details">{{ $item->precommande->code }} <span
                                                            class="noti-title"> </span>
                                                        {{--  --}}
                                                        <span class="noti-title"> <strong>{{ $item->pourcentage }}
                                                                %</strong> reduction
                                                            <button class="btn btn-success btn-sm"
                                                                data-bs-toggle="modal" data-bs-target="#commandeFacture"
                                                                wire:click="reduction_facture({{ $item->precommande->id }})">voir
                                                                plus</button> </span>
                                                    </p>
                                                    <p class="noti-time"><span class="notification-time"></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="">voir toutes les notifications</a>
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
                                    <h6>{{ Auth::user()->name }}</h6>
                                    <h5>Admin</h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <span class="dropdown-item"><a href="{{ route('dashboard') }}"
                                    class="text-white bg-success nav-link">tableau de bord</a></span>
                            {{-- <span class="dropdown-item"><a data-bs-toggle="modal" data-bs-target="#allcommandes" class="text-white bg-success nav-link">rapport
                                    des commandes</a></span> --}}
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <span class="dropdown-item logout"> <input type="submit" value="se deconnecter"
                                        class="text-white bg-danger nav-link"></span>


                            </form>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- /Header Menu -->

            <!-- Mobile Menu -->
            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">Mon Profil</a>
                    <a class="dropdown-item" href="generalsettings.html">Paramètres</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <span class="dropdown-item"> <input type="submit" value="se deconnecter"
                                class="text-white bg-danger nav-link"></span>


                    </form>
                </div>
            </div>
            <!-- /Mobile Menu -->
        </div>

        <div class="page-wrapper ms-0">
            <div class="content">
                <div class="row justify-content-center">
                    <div class="row ml-4">
                        <div class="d-flex gap-4 ml-4 mt-2 ">
                            @if (!empty($precommandes))
                                @foreach ($tables as $table)
                                    <form>
                                        <button
                                            class="btn @if ($table->status == true) btn-danger
                                            @else
                                            btn-success @endif"
                                            wire:click.prevent="edit({{ $table->id }})">{{ $table->name }}</button>
                                    </form>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <div class="col-lg-8 bg-white  col-sm-12 tabs_wrapper border  rounded-2xl mt-2">
                        <div class="page-header ">
                            <div class="page-title">
                                <h4></h4>
                            </div>
                        </div>

                        <ul class="border-0 mt-0 tabs owl-carousel owl-theme owl-product" wire:ignore>
                            @foreach ($categories as $item)
                                <li class="" id="{{ $item->id }}">
                                    <div class="product-details border border-danger">
                                        <img src="assets/img/product/product62.png" alt="img">
                                        <h6>{{ $item->name }}</h6>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tabs_container">

                            @foreach ($categories as $item)
                                <div class="tab_content active" data-tab="{{ $item->id }}">
                                    <div class="row ">
                                        @foreach (Produit::whereCategorie_id($item->id)->get() as $produit)
                                            <div class="col-3 col-md-2 border border-primary m-2 rounded-2xl"
                                                wire:click.prevent="ajouter( {{ $produit->id }})"
                                                @if ($produit->quantity <= 0) onClick="Swal.fire(
                                                    'oups !!',
                                                    'la quantité ne suffit pas pour ajouter à la commande!',
                                                    'danger'
                                                  )" @endif>
                                                <div class="productset flex-fill ">
                                                    <div class="productsetimg">
                                                        <img src="{{ asset('storage/uploads/' . $produit->path) }}"
                                                            alt="img">
                                                        <h6>Qty: {{ $produit->quantity }}</h6>
                                                        <div class="check-product">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="productsetcontent">
                                                        <h5>{{ $produit->categorie->name }}</h5>
                                                        <h4>{{ $produit->name }}</h4>
                                                        <h6>{{ $produit->price }} $</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="p-3 ml-4  bg-white border border-primary shadow-sm col-lg-4 col-sm-12 rounded-2xl">
                        <div class="col-12">
                            <a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal"
                                data-bs-target="#create"><i class="fa fa-plus me-2"></i>créer une commande</a>
                        </div>
                        <div class="setvaluecash">
                            <ul class="m-1">
                                <li>
                                    <button class="btn btn-success text-bold text-white" data-bs-toggle="modal" data-bs-target="#recents" >
                                      COMMANDES
                                    </button>
                                </li>
                                @if (!empty($last_commande) and $last_commande->status == false)
                                    <li>
                                        <button class="paymentmethod btn btn-danger text-bold text-white"
                                            wire:click="confirmer({{ $last_commande->id }})">

                                            PAYER CASH
                                        </button>
                                    </li>
                                @endif
                                @if (!empty($last_commande) and $last_commande->status == false)
                                    <li>
                                        <button class=" btn btn-success text-bold text-white" data-bs-toggle="modal" data-bs-target="#dette">
                                            PAR CREDIT
                                        </button>
                                    </li>
                                @endif

                            </ul>


                            <div class="btn-totallabel">
                                <h5></h5>
                                <h6></h6>
                            </div>

                            <ul>
                                @if (!empty($last_commande) and $last_commande->status == false)
                                    <li>
                                        <button class="btn btn-sm btn-success text-bold text-white" data-bs-toggle="modal" data-bs-target="#facture">
                                            {{-- <img src="assets/img/icons/purchase1.svg" alt="img" class="me-2"> --}}
                                            FACTURE
                                        </button>
                                    </li>
                                    <li>
                                        <button class="btn btn-sm btn-primary text-bold text-white" data-bs-toggle="modal" data-bs-target="#coupon"class="">
                                            {{-- <img src="assets/img/icons/purchase.svg" alt="img" class="me-2"> --}}
                                           COUPON
                                        </button>
                                    </li>
                                    <li>
                                        <button class="btn btn-sm btn-primary text-bold text-white" data-bs-toggle="offcanvas" data-bs-target="#panierOffcanvas" aria-controls="panierOffcanvas">
                                            {{-- <img src="assets/img/icons/purchase.svg" alt="img" class="me-2"> --}}
                                         🛒   PANIER <span class="badge rounded bg-danger text-white">{{ $commandes->count() }}</span>
                                        </button>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        {{-- off canvas --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@include("livewire.modals.panier")
@include("livewire.modals.edit")
{{-- modal creer une commande --}}
@include("livewire.modals.create")
{{-- end modal creer une commande --}}

{{-- modal debt --}}
@include("livewire.modals.debt")
{{-- end modal debt --}}

{{-- Recent commande --}}
@include("livewire.modals.recents")
{{-- end recent commande --}}

{{-- facture component --}}
@include("livewire.modals.facture")
{{-- end facture component --}}

{{-- coupon  --}}
@include("livewire.modals.coupon")
{{-- end coupon --}}

{{-- commandeReduction facture --}}
@include("livewire.modals.factureReduction")
{{-- end reduction facture  --}}

{{-- reduction component --}}
@include("livewire.modals.factureReduction")
{{-- end reduction component --}}
</div>