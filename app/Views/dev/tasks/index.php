<main class="card-body">
    <div class="row justify-content-between align-content-center">
        <div class="col-auto">
            <div class="input-group">
                <div class="input-group-text">
                    <label for="boardSelector">Board:</label>
                </div>
                <select type="number" name="boardSelector" id="boardSelector" class="form-select">
                    <?php foreach ($boards as $board): ?>
                        <option value="<?= esc($board['id']) ?>"><?= esc($board['board']) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="col-auto">
            <button type="button" id="btn_add" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-borderless">
            <tr id="tasksContainer">
                <!-- tasks are going to be placed here -->
            </tr>
        </table>
    </div>
</main>

<script>
    const TABLE_BODY_ID = 'tasksContainer'

    const MODE_NEW = 'new'
    const MODE_EDIT = 'edit'
    const MODE_DELETE = 'delete'

    const REQ_URL_JSON = '<?=base_url('tasks/json')?>'
    const REQ_URL_NEW = '<?=base_url('tasks/new')?>'
    const REQ_URL_EDIT = '<?=base_url('tasks/edit')?>'
    const REQ_URL_DELETE = '<?=base_url('tasks/delete')?>'

    const MODAL_ID = '#modal'
    const MODAL_FORM_ID = 'modalTasksForm'
    const MODAL_HEADLINE_ID = 'modalHeadline'
    const MODAL_SUBMIT_ID = 'formSubmit'
    const MODAL_FORMFIELDS_ID = 'modalFormFields'
    const MODAL_FORMFIELDS_NAMES = ['task', 'taskartenid', 'spaltenid', 'personenid', 'deadline', 'erinnerung', 'erinnerungsdatum', 'notizen', 'erledigt', 'geloescht']

    const REQ_TASK_HEADER = new Request(
        '<?=base_url('tasks/json')?>',
        {
            method: "POST",
            headers: {
                "Content-Type": "application\json",
            }
        }
    )

    const TEMPLATE_CARD_COLUMN = 'TEMPLATE_CARD_COLUMN'
    const TEMPLATE_CARD_TASK = 'TEMPLATE_CARD_TASK'
    const TEMPLATE_UD_BTN = 'TEMPLATE_UD_BTN'

    document.getElementById('btn_add').addEventListener('click', () => {
        showModal(REQ_URL_NEW, MODE_NEW, -1)
    })

    function updateSite() {
        updateTaskCards()
    }

    updateSite()
    genModalForm()
</script>