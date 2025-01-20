<div id="crudModal" class="modal fade" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-labelledby="crudModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="crudTitle" class="modal-title">Placeholder</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="crudForm" action="<?= base_url('tasks/') ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-floating mb-3">
                        <input type="text" name="task" id="task" class="form-control" placeholder="Task Name">
                        <label for="task">Task Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="taskartenid" id="taskartenid" class="form-control"
                               placeholder="Taskarten ID">
                        <label for="taskartenid">Taskart ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="personenid" id="personenid" class="form-control"
                               placeholder="Personen ID">
                        <label for="personenid">Personen ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="spaltenid" id="spaltenid" class="form-control"
                               placeholder="Spalten ID">
                        <label for="spaltenid">Spalten ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="datetime-local" name="deadline" id="deadline" class="form-control"
                               placeholder="Deadline">
                        <label for="personenid">Taskart ID</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" name="erinnerung" id="erinnerung" class="form-check-input"
                               onchange="toggleRemember()">
                        <label for="erinnerung">Erinnerung</label>
                    </div>
                    <div id="erinnerungsdatumcontainer" class="form-floating mb-3">
                        <input type="datetime-local" name="erinnerungsdatum" id="erinnerungsdatum" class="form-control">
                        <label for="erinnerungsdatum">Erinnerungsdatum</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" name="erledigt" id="erledigt" class="form-check-input">
                        <label class="form-check-label" for="erledigt">gelöscht</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" name="geloescht" id="geloescht" class="form-check-input">
                        <label class="form-check-label" for="geloescht">gelöscht</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="submitCrud()" class="btn btn-dark col-auto">Submit</button>
                <button onclick="resetCrud()" class="btn btn-dark col-auto">Reset</button>
                <button onclick="closeCrud()" class="btn btn-dark col-auto">Schließen</button>
            </div>
        </div>
    </div>
</div>

<main class="container-fluid mt-2 mb-2 p-3">
    <div class="card h-100 border-primary">
        <div class="card-header border-primary d-flex bg-black justify-content-between align-content-center">
            <h1 class="my-auto"><?= esc($headline) ?></h1>
            <a href="<?= base_url('tasks/crud/new') ?>"
               class="btn btn-primary my-auto fs-4 fa-solid fa-plus-square"></a>
        </div>
        <div class="card-body bg-dark text-light border-primary">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-auto justify-content-between align-content-center">
                <?php foreach ($tasks as $task): ?>
                    <div class="card bg-dark-subtle col w-auto p-1 m-1 border-success">
                        <h2 class="card-title"> <?= esc($task['task']) ?> </h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> Notizen: <?= esc($task['notizen']) ?> </li>
                            <li class="list-group-item"> Erstellt: <?= esc($task['erstelldatum']) ?> </li>
                            <li class="list-group-item"> Erinnerung: <?= esc($task['erinnerungsdatum']) ?> </li>
                            <li class="list-group-item"> Deadline: <?= esc($task['deadline']) ?> </li>
                        </ul>
                        <div class="card-footer text-center">
                            <a href="<?= base_url('tasks/crud/edit/' . esc($task['id'])) ?>"
                               class="fa-solid fa-pen-to-square" title="Bearbeiten"></a>
                            <a href="<?= base_url('tasks/crud/delete/' . esc($task['id'])) ?>"
                               class="fa-solid fa-eraser"
                               title="Löschen"></a>
                            <button id="<?= esc('editBtn_' . $task['id']) ?>"
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-tartget="#crudModal"
                                    onclick="fillCrud('<?=base_url('/json/task/')?>', 'edit', <?= esc($task['id']) ?>)">
                                Edit!
                            </button>
                            <button type="button" class="btn"
                                    onclick="fillCrud('<?= base_url('/json/task/') ?>', 'edit', <?= esc($task['id']) ?>)">
                                Edit?
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>