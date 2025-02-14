<!-- main for columns -->
<main class="card-body">
    <div class="row justify-content-between align-content-center">
        <h1 class="col-auto">Spaltenverwaltung</h1>
        <div class="col-auto">
            <button type="button" id="btn_add_column" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="table-responsive text-center">
        <table class="table table-striped table-borderless">
            <!-- table head -->
            <thead>
            <tr class="table-info">
                <th>#</th>
                <th>Spaltenname</th>
                <th class="d-none d-md-table-cell">Spaltenbeschreibung</th>
                <th>Board</th>
                <th class="d-none d-md-table-cell">Sortierwert</th>
                <th>Aktionen</th>
            </tr>
            </thead>
            <tbody id="columnsTableBody">
            <tr id="templateRow" hidden aria-hidden="true">
                <td data-table-bind="id"></td>
                <td data-table-bind="spalte"></td>
                <td class="d-none d-md-table-cell" data-table-bind="spaltenbeschreibung"></td>
                <td data-table-bind="board"></td>
                <td class="d-none d-md-table-cell" data-table-bind="sortid"></td>
                <td data-table-action="buttons"></td>
            </tr>
            </tbody>
        </table>
    </div>
</main>
