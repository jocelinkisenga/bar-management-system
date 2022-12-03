@extends("layouts.app")
@section("content")
<div class="main-panel" id="page">
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
                                    <h4 class="card-title">listes des reductions </h4><input type="text" id="myInput"
                                        class="" onkeyup="myFunction()" placeholder="Search for names..">
                                    <p class="card-description">
                                    </p>
                                    <div class="pt-3 table-responsive">
                                        <table class="table table-bordered" id="myTable">
                                            <thead class="uppercase">
                                                <tr class="text-uppercase table-info ">
                                                    <th>
                                                        #
                                                    </th>
                                                    <th class="">
                                                        code
                                                    </th>
                                                    <th>
                                                        detail
                                                      </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                           @foreach ($reductions as $key => $item)
                                               
                                           <tr>
                                            <td>
                                                {{$key+1}}
                                            </td>
                                            <td>
                                                {{$item->precommande->code}}
                                            </td>
                                            <td>
                                             <a href="{{route('reduction-detail',['id'=>$item->precommande->id])}}">details</a>
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

@endsection