<?php echo view('templates/components/modalTasks')?>

<script>
    const BOARDS_ID = <?= session('boardsid')?>

    const MODAL_ID = '#modal'
    const MODAL_FORM_ID = 'modalTasksForm'
    const MODAL_HEADLINE_ID = 'modalHeadline'
    const MODAL_SUBMIT_ID = 'formSubmit'
    const MODAL_FORMFIELDS_ID = 'modalFormFields'
    const MODAL_FORMFIELDS_NAMES = ['task', 'taskartenid', 'spaltenid', 'personenid', 'deadline', 'erinnerung', 'erinnerungsdatum', 'notizen', 'erledigt', 'geloescht']

    const drake = dragula();
    drake.on('drop', (el, target, source, sibling)=>{
        console.log(el);
        console.log(target);
        console.log(source);
        console.log(sibling);
        if(sibling !== null) {
            el.dataset.sortId = String(Number(sibling.dataset.sortId) + 1);
        } else {
            el.dataset.sortId = '1';
        }
        console.log(el);
        console.log(target);
        console.log(source);
        console.log(sibling);
        sortTasks(target);
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

    document.getElementById('btn_add').addEventListener('click', () => {
        showModal_new(MODE_NEW, -1)
    })

    createTaskView();
    genModalForm_new();
</script>
