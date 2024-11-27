<main class="container mt-2">
    <div class="card">
        <div class="card-header bg-black text-light">
            <h1>Spalten</h1>
        </div>
        <div class="card-body bg-dark text-light">
<!--            <button type="button" class="" onclick="location.href='<?=base_url('index.php/spalten/formular')?>'">Erstellen</button>
-->
            <a href="<?=base_url('index.php/spalten/formular')?>" class="btn btn-outline-light mb-2">Erstellen</a>
<!--        </div>
        <div class="card-footer">
-->
            <table class="table table-bordered rounded">
                <tr>
                    <th>ID</th>
                    <th>Board</th>
                    <th>Sortid</th>
                    <th>Spalte</th>
                    <th>Spaltenbeschreibung</th>
                    <th>Bearbeiten</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Allgemeine Todos</td>
                    <td>100</td>
                    <td>Zu Besprechen</td>
                    <td>Noch zu besprechende Todos</td>
                    <td><i class="fa-solid fa-pen-to-square" title="Bearbeiten"></i> <i class="fa-solid fa-eraser" title="Löschen"></i></td>
                </tr>
                <tr>
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