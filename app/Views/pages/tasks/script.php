<?php echo view('templates/components/modalTasks')?>

<script>
    const BOARDS_ID = <?= session('boardsid')?>

    const MODAL_ID = '#modal'
    const MODAL_FORM_ID = 'modalTasksForm'
    const MODAL_HEADLINE_ID = 'modalHeadline'
    const MODAL_SUBMIT_ID = 'formSubmit'
    const MODAL_FORMFIELDS_ID = 'modalFormFields'
    const MODAL_FORMFIELDS_NAMES = ['task', 'taskartenid', 'spaltenid', 'personenid', 'deadline', 'erinnerung',
        'erinnerungsdatum', 'notizen', 'erledigt', 'geloescht']

    const drake = dragula();
    drake.on('drop', (el, target, source, sibling)=>{
        moveTask(target, el, sibling);
    })

    const modalTask = new bootstrap.Modal(MODAL_ID);

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

    document.getElementById('btn_add_task').addEventListener('click', () => {
        showModal(modalTask, MODE_NEW, -1)
    })

    createTaskView();
    genModalForm();
</script>
