<div class="modal fade" style="" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true"
    role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Edit Wali Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_form" method="POST" action="{{ route('walikelas.update', 'ID_PLACEHOLDER') }}">
                @csrf
                @method('put')

                <div class="modal-body">
                    <div class="row">
                        <input id="edit_id" type="hidden" value="">
                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Nama Kelas</label>
                            <div><input type="text" class="form-control" name="id" id="edit_id" disabled>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-12"><label class="col-form-label">Wali Kelas</label>

                            <div><input type="text" class="form-control" name="id_guru" id="edit_id_guru">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
