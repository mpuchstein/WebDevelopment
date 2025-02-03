<main class="container-fluid mt-2 mb-2 p-3">
    <div class="card h-100 border-primary">
        <div class="card-header primary d-flex bg-black justify-content-between align-content-center">
            <h1 class="my-auto"><?= esc($headline) ?></h1>
            <a href="<?= base_url('tasks/crud/new') ?>"><i
                        class="btn btn-primary btn-lg fs-3 p-3 pt-0 pb-0 fa-solid fa-plus"></i></a>
        </div>
        <div class="card-body d-flex gap-4">
            <?php foreach ($columns as $column) : ?>
                <div class="col col-3 flex-fill">
                    <div class="card">
                        <div class="card-header mb-3">
                            <p class="fs-2"><?= esc($column['spalte']) ?></p>
                        </div>
                        <?php foreach ($tasks as $task): ?>
                            <?= $column['id'] == $task['spaltenid'] ? '<div draggable="true" class="card p-1 m-1' . ($task['erledigt'] == 1 ? ' border-success' : '') . '"> 
                                    <div class="card-header text-center">
                                        <p class="card-title fs-3"> ' . $task['icon'] . ' ' . esc($task['task']) . '</p>
                                    </div>
                                    <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Nutzer: ' . esc($task['vorname'] . ' ' . $task['name']) . '</li>
                                        <li class="list-group-item">Email: ' . esc($task['email']) . '</li>
                                        <li class="list-group-item">Notizen: ' . esc($task['notizen']) . '</li>
                                        <li class="list-group-item">Deadline: ' . esc($task['deadline']) . '</li>' . ($task['erinnerung'] == '1' ? '<li class="list-group-item">Erinnerung:' . esc($task['erinnerungsdatum']) . '</li>' : '') . '<li class="list-group-item">Erstellt: ' . esc($task['erstelldatum']) . ' </li>
                                    </ul>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="' . base_url('tasks/crud/edit/' . esc($task['id'])) . '"
                                           class="fa-solid fa-pen-to-square" title="Bearbeiten"></a>
                                        <a href="' . base_url('tasks/crud/delete/' . esc($task['id'])) . '"
                                           class="fa-solid fa-eraser" title="Löschen"></a>
                                    </div>
                                </div>
                            ' : "" ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
