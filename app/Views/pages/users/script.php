<?php echo view('templates/components/modalUsers'); ?>

<script>
    const TABLE_BODY_ID = 'usersTableBody';
    const MODAL_ID = '#usersModal';
    const MODAL_FORM_ID = 'usersForm';
    const MODAL_HEADLINE_ID = 'formUsersHeadline';
    const MODAL_SUBMIT_ID= 'modalUsersSubmit'
    const MODAL_FORMFIELDS_ID = 'modalUsersFormFields';
    const MODAL_FORMFIELDS_NAMES = ['username', 'plevel', 'vorname', 'name', 'email'];

    const modalUsers= new bootstrap.Modal(MODAL_ID);

    document.getElementById('btn_add_user').addEventListener('click', ()=>{
        showModal(modalUsers, MODE_NEW, -1);
    })
    createTable('users', modalUsers);
    genModalForm('users', modalUsers);
</script>
