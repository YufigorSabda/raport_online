<div class="modal fade" style="" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('teacher.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="form-group col-sm-12 col-md-12"><label class="col-form-label">Nama Guru</label>
                            <div><input type="text" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-12"><label class="col-form-label">NIK</label>

                            <div><input type="text" class="form-control" name="nik">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Email</label>

                            <div><input type="text" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Password</label>

                            <div><input type="text" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Jenis Kelamin</label>

                            <div><select class="form-control" name="id_gender">
                                    @foreach ($referensi['ref_gender'] as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama_gender }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">PTK</label>

                            <div><select class="form-control" name="id_ptk">
                                    @foreach ($referensi['ref_ptk'] as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama_ptk }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Gelar Depan</label>

                            <div><input type="text" class="form-control" name="gelar_depan">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Gelar Belakang</label>

                            <div><input type="text" class="form-control" name="gelar_belakang">
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
