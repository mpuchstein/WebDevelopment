<!-- main for boards -->
<main class="card-body">
    <div class="row justify-content-between align-content-center">
        <h1 class="col-auto">Boardverwaltung</h1>
        <div class="col-auto">
            <button type="button" id="btn_add_board" class="btn btn-primary">
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
            <tr id="templateRow" hidden aria-hidden="true">
                <td data-table-bind="id"></td>
                <td data-table-bind="board"></td>
                <td data-table-action="buttons"></td>
            </tr>
            </tbody>
        </table>
    </div>
</main>
