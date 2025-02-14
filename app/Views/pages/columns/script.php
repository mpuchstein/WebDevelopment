<?php echo view('templates/components/modalColumns'); ?>

<script>
    const TABLE_BODY_ID = 'columnsTableBody';
    const MODAL_ID = '#modalColumns';
    const MODAL_FORM_ID = 'modalColumnsForm';
    const MODAL_HEADLINE_ID = 'modalColumnsHeadline';
    const MODAL_SUBMIT_ID= 'formColumnsSubmit';
    const MODAL_FORMFIELDS_ID = 'modalColumnsFormFields';
    const MODAL_FORMFIELDS_NAMES = ['spalte', 'spaltenbeschreibung', 'sortid', 'boardsid'];

    const modalColumns = new bootstrap.Modal(MODAL_ID);

    document.getElementById('btn_add_column').addEventListener('click', () => {
        showModal(modalColumns, MODE_NEW, -1);
    })
    createTable('columns', modalColumns);
    genModalForm('columns', modalColumns);
</script>
