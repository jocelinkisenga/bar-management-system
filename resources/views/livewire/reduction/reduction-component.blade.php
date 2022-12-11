
<div class="main-panel" id="page">
    @php
       global $total;
       use App\Enums\PercentEnum;
    @endphp
    <div class="content-wrapper">

        <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <p class="card-description">

                        </p>


                        <div class="col-lg-12 stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">commande </h4>
                                    <p class="card-description">
                                        <button type="button" class="btn btn-success text-uppercase" data-toggle="modal"
                                        data-target="#exampleModal" data-whatever="@mdo">REDUIRE</button>
        
                                <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">REDUIRE</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                       
                                                        <div class="form-group">
                                                          <label for="">pourcentage </label>
                                                          <select class="form-control" wire:model="percent">
                                                            <option selected> selectionner un pourcentage</option>
                                                            @foreach (PercentEnum::PERCENT as $percent)
                                                            <option value="{{$percent}}">{{$percent}} %</option>
                                                            @endforeach
                                                           
                                                          </select>
                                                        </div>
                                                    </div>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary"
                                                            wire:click.prevent="update({{$reduction_id}})">réduire</button>
                                                    </div>
                                                </form>
                                            </div>
        
                                        </div>
                                    </div>
                                </div>
                                    </p>
                                
                                    <div class="pt-3 table-responsive">
                                        <table class="table table-bordered" id="myTable">
                                            <thead class="uppercase">
                                                <tr class="text-uppercase table-info ">
                                                    <th>
                                                        #
                                                    </th>
                                                    <th class="">
                                                        nom
                                                    </th>
                                                      <th>
                                                        quantité
                                                      </th>
                                                      <th>
                                                        sous-total
                                                      </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($reduction as $key => $item )
                                            <tr>
                                                <td>
                                                    {{$key+1}}
                                                </td>
                                                <td>
                                                    {{$item->name}}
                                                </td>
                                                <td>
                                                    {{$item->qty}}
                                                </td>
                                                <td>
                                                    {{ $item->qty * $item->price }} $
                                                </td>
                                                @php
                                                    $total += $item->qty * $item->price; 
                                                @endphp
    
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

