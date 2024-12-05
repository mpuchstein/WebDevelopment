<!-- Bootstrap tables from task 3 -->
<main class="container mt-2">
    <div class="card border-primary">
        <div class="card-header bg-black text-light border-primary">
            <h1>Spalten</h1>
        </div>
        <div class="card-body bg-dark text-light">
            <a href="<?=base_url('spalten/formular')?>" class="btn btn-outline-light">Erstellen</a>
        </div>
        <div class="card-footer table-responsive bg-dark text-light">
            <table class="table table-dark table-bordered rounded">
                <tr>
                    <th>ID</th>
                    <th>Board</th>
                    <th>Sortid</th>
                    <th>Spalte</th>
                    <th class="d-none d-sm-block">Spaltenbeschreibung</th>
                    <th>Bearbeiten</th>
                </tr>
                <tr>
                    <!-- one row -->
                    <td>1</td>
                    <td>Allgemeine Todos</td>
                    <td>100</td>
                    <td>Zu Besprechen</td>
                    <td>Noch zu besprechende Todos</td>
                    <td><i class="fa-solid fa-pen-to-square" title="Bearbeiten"></i> <i class="fa-solid fa-eraser" title="Löschen"></i></td>
                </tr>
                <tr>
                    <!-- two row -->
                    <td>3</td>
                    <td>Allgemeine Todos</td>
                    <td>200</td>
                    <td>In Bearbeitung</td>
                    <td>Todos die aktuell bearbeitet werden</td>
                    <td><i class="fa-solid fa-pen-to-square" title="Bearbeiten"></i> <i class="fa-solid fa-eraser" title="Löschen"></i></td>
                </tr>
            </table>
        </div>
    </div>
</main>