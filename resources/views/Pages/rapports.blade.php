@extends('layouts.app')
@section('content')
    <div class="main-panel" id="page">
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
                                                                   @if (( $item->solde + $item->entries - $item->outputs ) > 0)
                                                                   {{ $item->solde + $item->entries - $item->outputs }}
                                                                   @else
                                                                     --  
                                                                   @endif
                                                                   
                                                                </td>

                                                                <td>
                                                                    {{ $item->vente }} fc
                                                                </td>
                                                                <td>
                                                                    @if (($item->vente * $item->outputs) > 0)
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
