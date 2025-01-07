<main class="container-fluid mt-2 mb-2 p-3">
    <div class="card h-100 border-primary">
        <div class="card-header border-primary bg-black">
            <h1><?= esc($headline) ?></h1> <!-- Headline -->
        </div>
        <div class="card-body border-primary">
            <a href="<?=base_url('tasks/form')?>" class="btn btn-primary">Neu</a>
        </div>
        <div class="card-body bg-dark text-light border-primary table-responsive">
            <p></p>
            <table class="table table-dark table-striped table-bordered w-100">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">PersonenID</th>
                    <th scope="col">SpaltenID</th>
                    <th scope="col">TaskartenID</th>
                    <th scope="col">SortID</th>
                    <th scope="col">Task</th>
                    <th scope="col">Notizen</th>
                    <th scope="col">Erstelldatum</th>
                    <th scope="col">Erinnerungsdatum</th>
                    <th scope="col">Erinnerung</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Erledigt</th>
                    <th scope="col">Gelöschte</th>
                    <th scope="col">Bearbeiten</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['id']) ?></td>
                        <td><?= esc($task['personenid']) ?></td>
                        <td><?= esc($task['spaltenid']) ?></td>
                        <td><?= esc($task['taskartenid']) ?></td>
                        <td><?= esc($task['sortid']) ?></td>
                        <td><?= esc($task['task']) ?></td>
                        <td><?= esc($task['notizen']) ?></td>
                        <td><?= esc($task['erstelldatum']) ?></td>
                        <td><?= esc($task['erinnerungsdatum']) ?></td>
                        <td><?= esc($task['erinnerung']) ?></td>
                        <td><?= esc($task['deadline']) ?></td>
                        <td><?= esc($task['erledigt']) ?></td>
                        <td><?= esc($task['geloeschte']) ?></td>
                        <td>
                            <a href="<?=base_url('tasks/form/' . esc($task['id']))?>" class="fa-solid fa-pen-to-square" title="Bearbeiten"></a>
                            <a href="<?=base_url('tasks/delete/' . esc($task['id']))?>" class="fa-solid fa-eraser" title="Löschen"></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>