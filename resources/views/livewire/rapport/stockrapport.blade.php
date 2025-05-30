<div class="row">




</div>

<div class="row">



    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-description">
                    <button type="button" class="btn btn-success" onclick="generatePDF()" data-toggle="modal"
                        data-target="#exampleModal" data-whatever="@mdo">Télécharger le rapport</button>

                </p>
                <div id="text">

                    <div class="col-lg-12 stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <p class="card-description">
                                </p>
                                
                                <div class="pt-3 table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="table-info">

                                                <th>
                                                    produit
                                                </th>
                                                <th>
                                                    entrées
                                                </th>
                                                <th>
                                                    sorties
                                                </th>
                                                <th>
                                                    soldes
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       @if ($data != null)
                                          
                                       @foreach ($data as $item)
                                       
                                       <tr>

                                           <td>
                                              
                                            
                                           </td>
                                           <td>
                                        
                                            @endforeach
                                          
                                           </td>
                                           <td>
                                               ikk
                                           </td>
                                           <td>

                                           </td>
                                       </tr>


                                       @endforeach
                                    
                                       @endif
                                        
                                           

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
