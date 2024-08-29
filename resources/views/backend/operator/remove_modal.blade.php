<div class="modal fade" style="" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title font-weight-bold" id="removeModalLabel">Konfirmasi</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div>
                    <p class="d-flex justify-content-center" style="font-size:17px ">Apakah anda yakin ingin menghapus
                        guru dari operator?</p>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="d-flex justify-content-end" style="gap: 10px">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form id="remove-form" method="POST" action="{{ route('operator.destroy', 'ID_PLACEHOLDER') }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary">Remove</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function removeUser(id_user) {
        const form = document.getElementById('remove-form');
        form.action = form.action.replace('ID_PLACEHOLDER', id_user);
    }
</script>
