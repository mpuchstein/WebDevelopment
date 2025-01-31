<!--code for modal form gets echoed by codeigniter here-->

<!-- table view for users -->
<main class="bg-dark-subtle container pt-2">
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
                <th>Username</th>
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
    const theadids = ['id', 'username', 'plevel', 'vorname', 'name', 'email']
    const tablebodyid = 'userTableBody'
    const modenew = 'new'
    const modeedit = 'edit'
    const modedelete = 'delete'
    const requrljson = '<?=base_url('users/json')?>'
    const requrlnew = '<?=base_url('users/new')?>'
    const requrledit = '<?=base_url('users/edit')?>'
    const requrldelete = '<?=base_url('users/delete')?>'
    const modalid = '#modal'
    const modalformid = 'modalForm'
    const modalheadlineid = 'modalHeadline'
    const modalsubmitid= 'formSubmit'
    const modalformfieldsid = 'modalFormFields'

    document.getElementById('btn_add').addEventListener('click', ()=>{showModal(requrlnew, modenew, -1)})
    updateTable()
    genModalForm()
</script>