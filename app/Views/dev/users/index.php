<!--code for modal form gets echoed by codeigniter here-->

<!-- table view for users -->
<main class="bg-dark-subtle container pt-2">
    <div class="row justify-content-between align-content-center">
        <h1 class="col-auto">User Management</h1>
        <div class="col-auto">
            <button type="button" class="btn btn-primary">
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
                <th>Privilegierung</th>
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
    const actionButtons =
        '<td>' +
        '<div class="btn-group">' +
        '<button type="button" id="%id%_delete"class="btn btn-sm btn-info" data-bs-target="%formid%"' +
        '><i class="fa-solid fa-pen-to-square"></i>' +
        '</button>' +
        '<button type="button" id="%id%_delete" class="btn btn-sm btn-danger" data-bs-target="%formid%"' +
        '><i class="fa-solid fa-eraser"></i>' +
        '</button>' +
        '</div>' +
        '</td>'
    function fillTable(data) {
        let tableRows = ''
        const rowButtons = actionButtons.replaceAll('%formid%', '#modal')
        for (const row of data) {
            tableRows += '<tr>'
            tableRows += '<td>' + row['id'] + '</td>'
            tableRows += '<td>' + row['username'] + '</td>'
            tableRows += '<td>' + row['plevel'] + '</td>'
            tableRows += '<td>' + row['vorname'] + '</td>'
            tableRows += '<td>' + row['name'] + '</td>'
            tableRows += '<td>' + row['email'] + '</td>'
            tableRows += rowButtons.replaceAll('%id%', row['id']);
            tableRows += '</tr>'
        }
        document.getElementById('userTableBody').innerHTML = tableRows
        for(const row of data) {
            //TODO: add onclick listener to all buttons
        }
    }

    let tableData = getData('<?=base_url('users/json')?>').then((value) => {
        fillTable(value)
    })
</script>