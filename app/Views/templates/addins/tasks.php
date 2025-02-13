<?php echo view('templates/components/modalTasks')?>

<script>
    const BOARDS_ID = <?= session('boardsid')?>

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

    dragula(document.querySelectorAll('.columnContainer'))
</script>
