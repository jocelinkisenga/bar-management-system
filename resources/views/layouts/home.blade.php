<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>SELLIT</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- animation CSS -->
    <link rel="stylesheet" href="assets/css/animate.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="assets/plugins/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/owlcarousel/owl.theme.default.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">


    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/flasher/flasher.min.css') }}">


    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
     <style>
    body {
      background-color: #f8f9fa;
    }
    .category {
      background-color: #dff0d8;
      border-radius: 0.5rem;
      padding: 0.5rem 1rem;
      margin-right: 0.5rem;
      white-space: nowrap;
    }
    .product-card {
      border-radius: 0.5rem;
      padding: 1rem;
      color: white;
      height: 100%;
    }
    .product-1 { background-color: #6f42c1; }
    .product-2 { background-color: #20c997; }
    .product-3 { background-color: #fd7e14; }
    .product-4 { background-color: #0d6efd; }
    .product-5 { background-color: #dc3545; }
  </style>
    @livewireStyles

</head>

<body style="background-color: hsl(0, 47%, 41%));">
    @include('flash::message')


    @yield('content')

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    @livewireScripts
    {{-- @yield('script') --}}
    <!-- jQuery -->

    <script src="{{ asset('js/printThis.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="assets/js/feather.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Datatable JS -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <!-- Select2 JS -->
    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <!-- Owl JS -->
    <script src="assets/plugins/owlcarousel/owl.carousel.min.js"></script>

    <!-- Sweetalert 2 -->
    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    <script>
        window.addEventListener('closeModal', event => {
            $('#dette').modal('hide');
             $('#create').modal('hide');
        });

    </script>
    <script>
        $("#facture-commande").click(function() {
            $("#fac").printThis({
                debug: false,
                importCSS: true,
                importStyle: false,
                printContainer: true,
                loadCSS: "",
                pageTitle: "UTOPIAN PRINT",
                removeInline: false,
                printDelay: 1,
                header: null,
                footer: null,
                base: false,
                formValues: true,
                canvas: false,
                doctypeString: "",
                removeScripts: false,
                copyTagClasses: false
            });
        });
    </script>
    <script>
        $('#flash-overlay-modal')
    </script>

</body>

</html>
