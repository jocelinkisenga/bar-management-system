@extends('layouts.app')
@section('content')
    {{-- <div class="main-panel" id="page">
        <div class="content-wrapper">


            <div class="row">

                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">filtrer par date</h4>
                            <div class="template-demo">
                                <form action="{{ route('search') }}" method="POST">
                                    @csrf
                                    <div class="input-group input-daterange">
                                        <input name="date_from" type="date" class="mr-2 form-control datepicker"
                                            placeholder="Due Date" autocomplete="off" data-provide="datepicker"
                                            data-date-autoclose="true" data-date-format="yyyy/mm/dd"
                                            data-date-today-highlight="true">
                                        <div class="uppercase input-group-addon">Au</div>
                                        <input name="date_to" type="date" class="ml-2 form-control datepicker"
                                            placeholder="Due Date" autocomplete="off" data-provide="datepicker"
                                            data-date-autoclose="true" data-date-format="yyyy/mm/dd"
                                            data-date-today-highlight="true">
                                        <button type="submit" class="ml-2 btn btn-success btn-sm"
                                            wire:click.prevent="search()"><i class="icon-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <p class="card-description">
                                <button type="button" class="btn btn-success" onclick="generatePDF()" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo">Télécharger le rapport</button>
                                    <button type="button" class="btn btn-primary" onclick="printDiv()" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo">Imprimer le rapport</button>
                            </p>

                            <div id="printdivcontent">

                                <div class="col-lg-12 stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Rapport de stock</h4>
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
                                                                produit
                                                            </th>
                                                            <th>
                                                                Entées
                                                            </th>
                                                            <th>
                                                                Sorties
                                                            </th>
                                                            <th>
                                                                solde
                                                            </th>

                                                            <th>
                                                                PV
                                                            </th>
                                                            <th>
                                                                vente total
                                                            </th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $key => $item)
                                                            <tr>
                                                                <td>
                                                                    {{ $key + 1 }}
                                                                </td>
                                                                <td>
                                                                    {{ $item->name }}
                                                                </td>
                                                                <td>
                                                                    @if (!empty($item->entries))
                                                                        {{ $item->entries }}
                                                                    @else
                                                                        --
                                                                    @endif


                                                                </td>
                                                                <td>
                                                                    @if (!empty($item->outputs))
                                                                        {{ $item->outputs }}
                                                                    @else
                                                                        --
                                                                    @endif


                                                                </td>
                                                                <td>
                                                                   @if ($item->solde + $item->entries - $item->outputs > 0)
                                                                   {{ $item->solde + $item->entries - $item->outputs }}
                                                                   @else
                                                                     --  
                                                                   @endif
                                                                   
                                                                </td>

                                                                <td>
                                                                    {{ $item->vente }} fc
                                                                </td>
                                                                <td>
                                                                    @if ($item->vente * $item->outputs > 0)
                                                                    {{ $item->vente * $item->outputs }} $
                                                                    @else
                                                                    --
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
                    </div>
                </div>
            </div>
        </div>
    </div> --}}




    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4></h4>
                    <h6></h6>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">filtrer par date</h4>
                        <div class="template-demo">
                            <form action="{{ route('search') }}" method="POST">
                                @csrf
                                <div class="input-group input-daterange">
                                    <input name="date_from" type="date" class="mr-2 form-control datepicker"
                                        placeholder="Due Date" autocomplete="off" data-provide="datepicker"
                                        data-date-autoclose="true" data-date-format="yyyy/mm/dd"
                                        data-date-today-highlight="true">
                                    <div class="uppercase input-group-addon">Au</div>
                                    <input name="date_to" type="date" class="ml-2 form-control datepicker"
                                        placeholder="Due Date" autocomplete="off" data-provide="datepicker"
                                        data-date-autoclose="true" data-date-format="yyyy/mm/dd"
                                        data-date-today-highlight="true">
                                    <button type="submit" class="ml-2 btn btn-success btn-sm"
                                        wire:click.prevent="search()"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="page-btn">
                    {{-- <a data-bs-toggle="modal" data-bs-target="#create" class="btn btn-added"><img
                            src="assets/img/icons/plus.svg" alt="img" class="me-1">Ajouter un produit</a> --}}
                </div>
            </div>


            <!-- /product list -->
            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="assets/img/icons/filter.svg" alt="img">
                                    <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                        alt="img"></a>
                            </div>
                        </div>
                        <div class="wordset">
                            <ul>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                            src="assets/img/icons/pdf.svg" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                            src="assets/img/icons/excel.svg" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                            src="assets/img/icons/printer.svg" alt="img"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="mb-0 card" id="filter_inputs">
                        <div class="pb-0 card-body">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Choose Product</option>
                                                    <option>Macbook pro</option>
                                                    <option>Orange</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Choose Category</option>
                                                    <option>Computers</option>
                                                    <option>Fruits</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Choose Sub Category</option>
                                                    <option>Computer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Brand</option>
                                                    <option>N/D</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12 ">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Price</option>
                                                    <option>150.00</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-sm-6 col-12">
                                            <div class="form-group">
                                                <a class="btn btn-filters ms-auto"><img
                                                        src="assets/img/icons/search-whites.svg" alt="img"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    </th>
                                    <th>N°</th>
                                    <th>produit</th>
                                    <th>entrées</th>
                                    <th>sorties</th>
                                    <th>solde</th>
                                    <th>prix de vente</th>
                                    <th>vente total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            @if (!empty($item->entries))
                                                {{ $item->entries }}
                                            @else
                                                --
                                            @endif

                                        </td>
                                        <td>
                                            @if (!empty($item->outputs))
                                                {{ $item->outputs }}
                                            @else
                                                --
                                            @endif

                                        </td>
                                        <td>
                                            @if ($item->solde + $item->entries - $item->outputs > 0)
                                                {{ $item->solde + $item->entries - $item->outputs }}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>{{ $item->vente }} $</td>
                                        <td>
                                            @if ($item->vente * $item->outputs > 0)
                                                {{ $item->vente * $item->outputs }} $
                                            @else
                                                --
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>

        {{-- modal create --}}

        {{-- end modal create --}}
    </div>


    <script>
        function generatePDF() {
            //nom du fichier | file name
            var nom_fichier = prompt("Nom du fichier PDF :");
            //generer le pdf
            var element = document.getElementById('text');
            var opt = {
                margin: 0.5,
                filename: `${nom_fichier}.pdf`,
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };
            if (nom_fichier != null) {
                html2pdf().set(opt).from(element).save()
            } else {
                alert("Veuillez choisir un nom ")
            }
        }
    </script>
    <script type="text/javascript">
        function printDiv() {
            var divContents = document.getElementById("printdivcontent").innerHTML;
            var printWindow = window.open('', '', 'height=200,width=400');
            printWindow.document.write('<html><head><title>rapport</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
@endsection
