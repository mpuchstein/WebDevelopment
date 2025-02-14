<?php echo view('templates/components/modalBoards')?>

<script>
    const TABLE_BODY_ID = 'boardsTableBody';
    const MODAL_ID = '#boardsModal'
    const MODAL_FORM_ID = 'boardsForm'
    const MODAL_HEADLINE_ID = 'formBoardsHeadline'
    const MODAL_SUBMIT_ID = 'formBoardsSubmit'
    const MODAL_FORMFIELDS_ID = 'modalBoardsFormFields'
    const MODAL_FORMFIELDS_NAMES = ['board']

    const modalBoard = new bootstrap.Modal(MODAL_ID);
    const REQ_HEADER = new Request(
        '<?=base_url('boards/json')?>',
        {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            }
        }
    )
    document.getElementById('btn_add_board').addEventListener('click', () => {
        showModal(modalBoard, MODE_NEW, -1)
    })
    createTable('boards', modalBoard);
    genModalForm('boards', modalBoard);
</script>
