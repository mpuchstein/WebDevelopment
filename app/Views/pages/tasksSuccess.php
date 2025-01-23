<div class="modal fade" id="successDialog" tabindex="-1" aria-labelledby="formHeadline" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-content border-success">
                <p class="text-center my-auto">
                    Task mit ID
                    <?= esc($id) ?>
                    <?= $type == 'new' ? 'erfolgreich hinzugefügt.' : '' ?>
                    <?= $type == 'edit' ? 'erfolgreich bearbeitet.' : '' ?>
                    <?= $type == 'delete' ? 'erfolgreich gelöscht.' : '' ?>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    function hide(){
        const successModal = $('#successDialog')
        successModal.modal('hide')
        window.location.replace(BASE_URL)
    }
    window.onload = function () {
        const successModal = $('#successDialog')
        successModal.modal('show')
        setTimeout(hide, 2000)
    }
</script>
