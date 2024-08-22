<div class="modal fade" style="" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title font-weight-bold" id="createModalLabel">Konfirmasi</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div>
                    <p class="d-flex justify-content-center" style="font-size:17px ">Apakah anda yakin ingin menghapus
                        data siswa?</p>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="d-flex justify-content-end" style="gap: 10px">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form id="delete-form" method="POST" action="{{ route('student.destroy', 'ID_PLACEHOLDER') }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(id_student) {
        const form = document.getElementById('delete-form');
        form.action = form.action.replace('ID_PLACEHOLDER', id_student);
    }
</script>
