<div class="main-panel" id="page">
    <div class="content-wrapper">
        <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <p class="card-description">
                            <button type="button" class="btn btn-success text-uppercase" data-toggle="modal"
                                data-target="#exampleModal" data-whatever="@mdo">Ajouter une table</button>

                        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter une table</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">béneficiare:</label>
                                                <input type="text" wire:model="user_name" class="form-control"
                                                    id="recipient-name">
                                            </div>
                                            @error('user_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">motif:</label>
                                                <input type="text" wire:model="motif" class="form-control"
                                                    id="recipient-name">
                                            </div>
                                            @error('motif')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">motant:</label>
                                                <input type="text" wire:model="montant" class="form-control"
                                                    id="recipient-name">
                                            </div>
                                            @error('motif')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary"
                                                    wire:click.prevent="store()">créer</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </p>


                        <div class="col-lg-12 stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Les depenses</h4>
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">{{ session('message') }}</div>
                                    @endif
                                    <p class="card-description">
                                    </p>
                                    <div class="pt-3 table-responsive">
                                        <table class="table table-bordered" id="myTable">
                                            <thead>
                                                <tr class="table-info text-uppercase">
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        béneficiare
                                                    </th>
                                                    <th>
                                                        montant
                                                    </th>
                                                    <th>
                                                        motif
                                                    </th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($depenses as $key => $item)
                                                    <tr>
                                                        <td>
                                                            {{ $key + 1 }}
                                                        </td>
                                                        <td>
                                                            {{ $item->user_name }}
                                                        </td>
                                                        <td>
                                                            {{ $item->montant }}
                                                        </td>
                                                        <td>
                                                            {{ $item->motif }}
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
<script>
    window.live.on('categorieStore', () => {
        $('#exampleModal').modal('hidden');
    })
</script>
