<div class="modal fade" style="" id="resetpwModal" tabindex="-1" aria-labelledby="resetpwModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title font-weight-bold" id="resetpwModalLabel">Konfirmasi</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div>
                    <p class="d-flex justify-content-center" style="font-size:17px ">Apakah anda yakin ingin mereset
                        password?</p>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="d-flex justify-content-end" style="gap: 10px">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form id="resetpass-form" method="POST" action="{{ route('teacher.reset', 'ID_PLACEHOLDER') }}">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-primary">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function resetPassword(id_user) {
        const form = document.getElementById('resetpass-form');
        form.action = form.action.replace('ID_PLACEHOLDER', id_user);
    }
</script>
