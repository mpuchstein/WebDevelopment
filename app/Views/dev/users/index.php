<!-- table view for users -->
<main class="card-body">
    <div class="row justify-content-between align-content-center">
        <h1 class="col-auto">User Management</h1>
        <div class="col-auto">
            <button type="button" id="btn_add" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="table-responsive text-center">
        <table class="table table-striped table-borderless">
            <!-- table head -->
            <thead>
            <tr class="table-primary">
                <th>#</th>
                <th>Nutzername</th>
                <th>Privilegien</th>
                <th>Vorname</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Aktionen</th>
            </tr>
            </thead>
            <tbody id="userTableBody">
            </tbody>
        </table>
    </div>
</main>

<script>
    const THEAD_IDS = ['id', 'username', 'plevel', 'vorname', 'name', 'email']
    const TABLE_BODY_ID = 'userTableBody'
    const TEMPLATE_UD_BTN = 'TEMPLATE_UD_BTN'
    const REQ_URL_JSON = '<?=base_url('users/json')?>'
    const REQ_URL_NEW = '<?=base_url('users/new')?>'
    const REQ_URL_EDIT = '<?=base_url('users/edit')?>'
    const REQ_URL_DELETE = '<?=base_url('users/delete')?>'
    const MODAL_ID = '#modal'
    const MODAL_FORM_ID = 'modalForm'
    const MODAL_HEADLINE_ID = 'modalHeadline'
    const MODAL_SUBMIT_ID= 'formSubmit'
    const MODAL_FORMFIELDS_ID = 'modalFormFields'
    const MODAL_FORMFIELDS_NAMES = ['username', 'plevel', 'vorname', 'name', 'email']

    document.getElementById('btn_add').addEventListener('click', ()=>{showModal(REQ_URL_NEW, MODE_NEW, -1)})
    function updateSite(){updateTable()}
    updateSite()
    genModalForm()
</script>