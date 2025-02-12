<main class="container d-flex flex-column bg-dark-subtle p-2">
    <div class="row justify-content-between align-content-center">
        <div class="col-auto">
            <div class="input-group">
                <div class="input-group-text">
                    <label for="boardSelector">Board:</label>
                </div>
                <select type="number" name="boardSelector" id="boardSelector" class="form-select">
                    <?php foreach ($boards as $board): ?>
                        <option value="<?= esc($board['id']) ?>"<?= $boardsId == $board['id'] ? 'selected' : '' ?>>
                            <?= esc($board['board']) ?>
                        </option>
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
    <div id="tasksContainer" class="mt-3 container-fluid flex-grow-1 align-self-stretch align-items-stretch
     overflow-x-scroll d-flex gap-3">
        <!-- tasks are going to be placed here -->
    </div>
</main>

<?php echo view('templates/components/modalTasks')?>

<script>
    const BOARDS_ID = <?= $boardsId ?>

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
                "Content-Type": "application/json"
            }
        }
    )

    document.getElementById('boardSelector').addEventListener('change', () => {
        console.log(document.getElementById('boardSelector').value)
        setBoard('<?=esc(base_url('boards'))?>', document.getElementById('boardSelector').value)
    })

    document.getElementById('btn_add').addEventListener('click', () => {
        showModal(REQ_URL_NEW, MODE_NEW, -1)
    })

    createTaskView();
    genModalForm_new()
</script>