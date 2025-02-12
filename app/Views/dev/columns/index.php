<!-- table view for columns -->
<main class="card-body">
    <div class="row justify-content-between align-content-center">
        <h1 class="col-auto">Spaltenverwaltung</h1>
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
                <th>Spalte</th>
                <th>Spaltenbeschreibung</th>
                <th>Board</th>
                <th>SortID</th>
                <th>Aktionen</th>
            </tr>
            </thead>
            <tbody id="columnTableBody">
            </tbody>
        </table>
    </div>
</main>

<script>
    const THEAD_IDS = ['id', 'spalte', 'spaltenbeschreibung', 'board', 'sortid']
    const TABLE_BODY_ID = 'columnTableBody'
    const TEMPLATE_UD_BTN = 'TEMPLATE_UD_BTN'
    const REQ_URL_JSON = '<?=base_url('columns/json')?>'
    const REQ_URL_NEW = '<?=base_url('columns/new')?>'
    const REQ_URL_EDIT = '<?=base_url('columns/edit')?>'
    const REQ_URL_DELETE = '<?=base_url('columns/delete')?>'
    const MODAL_ID = '#modal'
    const MODAL_FORM_ID = 'modalColumnsForm'
    const MODAL_HEADLINE_ID = 'modalHeadline'
    const MODAL_SUBMIT_ID= 'formSubmit'
    const MODAL_FORMFIELDS_ID = 'modalFormFields'
    const MODAL_FORMFIELDS_NAMES = ['spalte', 'spaltenbeschreibung', 'sortid', 'boardsid']

    document.getElementById('btn_add').addEventListener('click', ()=>{showModal(REQ_URL_NEW, MODE_NEW, -1)})
    function updateSite(){updateTable()}
    updateSite()
    genModalForm()
</script>