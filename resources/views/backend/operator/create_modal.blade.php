<div class="modal fade" style="" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Operator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('operator.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="form-group col-sm-12 col-md-12"><label class="col-form-label">Nama Guru</label>

                            <div><select class="form-control" name="user_id">
                                    <option value="">-- Pilih Guru--</option>
                                    @foreach ($data_guru as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->ref_guru->gelar_depan }}
                                            {{ $item->name }} {{ $item->ref_guru->gelar_belakang }}
                                            ({{ $item->email }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
