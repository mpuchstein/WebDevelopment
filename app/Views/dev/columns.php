<!-- Bootstrap tables from task 3 -->
<main class="container mt-2">
    <div class="card border-primary">
        <div class="card-header border-primary bg-black">
            <h1>Spalten</h1>
        </div>
        <div class="card-header">
            <a href="<?=base_url('columns/form')?>" class="btn btn-outline-light">Erstellen</a>
            <!-- Altenative zu Erstellen -> "Neu", "Neue Spalte" -->
        </div>
        <div class="card-body table-responsive">
            <table class="table table-dark table-bordered rounded">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Board</th>
                    <th>Sortid</th>
                    <th>Spalte</th>
                    <th class="d-none d-sm-block">Spaltenbeschreibung</th>
                    <th>Bearbeiten</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($columns as $column): ?>
                <tr>
                    <td><?= esc($column['id']) ?></td>
                    <td><?= esc($column['boardsid']) ?></td>
                    <td><?= esc($column['sortid']) ?></td>
                    <td><?= esc($column['spalte']) ?></td>
                    <td><?= esc($column['spaltenbeschreibung']) ?></td>

                    <td>
                        <i class="fa-solid fa-pen-to-square" title="Bearbeiten"></i>
                        <i class="fa-solid fa-eraser" title="Löschen"></i>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>