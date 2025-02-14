<!-- table view for users -->
<main class="card-body">
    <div class="row justify-content-between align-content-center">
        <h1 class="col-auto">Nutzerverwaltung</h1>
        <div class="col-auto">
            <button type="button" id="btn_add_user" class="btn btn-primary">
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
            <tbody id="usersTableBody">
            <tr id="templateRow" hidden aria-hidden="true">
                <td data-table-bind="id"></td>
                <td data-table-bind="username"></td>
                <td data-table-bind="plevel"></td>
                <td data-table-bind="vorname"></td>
                <td data-table-bind="name"></td>
                <td data-table-bind="email"></td>
                <td data-table-action="buttons"></td>
            </tr>
            </tbody>
        </table>
    </div>
</main>