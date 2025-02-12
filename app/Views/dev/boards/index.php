<!-- main frame for boards -->
<!-- table view for columns -->
<main class="card-body">
    <div class="row justify-content-between align-content-center">
        <h1 class="col-auto">Boardverwaltung</h1>
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
                <th>Board</th>
                <th>Aktionen</th>
            </tr>
            </thead>
            <tbody id="boardsTableBody">
            </tbody>
        </table>
    </div>
</main>

<script>
    const THEAD_IDS = ['id', 'board']
    const TABLE_BODY_ID = 'boardsTableBody'
    const TEMPLATE_UD_BTN = 'TEMPLATE_UD_BTN'
    const REQ_URL_JSON = '<?=base_url('boards/json')?>'
    const REQ_URL_NEW = '<?=base_url('boards/new')?>'
    const REQ_URL_EDIT = '<?=base_url('boards/edit')?>'
    const REQ_URL_DELETE = '<?=base_url('boards/delete')?>'
    const MODAL_ID = '#boardsModal'
    const MODAL_FORM_ID = 'boardsForm'
    const MODAL_HEADLINE_ID = 'formHeadline'
    const MODAL_SUBMIT_ID= 'formSubmit'
    const MODAL_FORMFIELDS_ID = 'boardsFormFields'
    const MODAL_FORMFIELDS_NAMES = ['board']

    document.getElementById('btn_add').addEventListener('click', ()=>{showModal(REQ_URL_NEW, MODE_NEW, -1)})
    function updateSite(){updateTable()}
    updateSite()
    genModalForm()
</script>