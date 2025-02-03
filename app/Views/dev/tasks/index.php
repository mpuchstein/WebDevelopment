<main class="container bg-dark-subtle pt-2">
    <div class="row justify-content-between align-content-center">
        <div class="col-auto">
            <div class="form-floating mb-2">
                <select type="number" name="boardSelector" id="boardSelector" class="form-select">
                    <?php foreach ($boards as $board): ?>
                        <option value="<?= esc($board['id']) ?>"><?= esc($board['board']) ?></option>
                    <?php endforeach ?>
                </select>
                <label for="boardSelector">Board:</label>
            </div>
        </div>
        <div class="col-auto">
            <button type="button" id="btn_add" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="container table-responsive">
    <table class="table table-borderless table-striped-columns">
        <tr id="tasksContainer">
            <!-- tasks are going to be placed here -->
        </tr>
    </table>
    </div>
</main>

<script>
    const TABLE_BODY_ID = 'tasksContainer'
    const REQ_URL_JSON = '<?=base_url('tasks/json')?>'
    const REQ_URL_NEW = '<?=base_url('tasks/new')?>'
    const REQ_URL_EDIT = '<?=base_url('tasks/new')?>'
    const REQ_URL_DELETE = '<?=base_url('tasks/new')?>'

    const MODAL_FORM_ID = 'tasksForm'

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


    updateTaskCards()
</script>