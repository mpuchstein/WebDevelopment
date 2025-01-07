<main class="container mt-2 mb-2">
    <div class="card border-primary">
        <div class="card-header bg-black text-white">
            <h1><?= isset($task) ? 'Task Bearbeiten' : 'Neuer Task' ?></h1>
        </div>
        <div class="card-body">
            <form action="<?=base_url('tasks/' . (isset($task) ? 'update/' . $task['id'] : 'create'))?>" method="post">
                <div class="form-floating mb-3">
                    <input type="text" id="task" class="form-control" placeholder="Task Name" value="<?= isset($task) ? esc($task['task']) : '' ?>" required>
                    <label for="task" class="">Task Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" id="taskartenid" class="form-control" placeholder="Taskarten ID" value="<?= isset($task) ? esc($task['taskartenid']) : '' ?>" required>
                    <label for="taskartenid" class="">Taskarten ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" id="personenid" class="form-control" placeholder="Person ID" value="<?= isset($task) ? esc($task['personenid']) : '' ?>" required>
                    <label for="personenid" class="">Person ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" id="spaltenid" class="form-control" placeholder="Spalten ID" value="<?= isset($task) ? esc($task['spaltenid']) : '' ?>" required>
                    <label for="spaltenid">Spalten ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="datetime-local" id="erinnerungsdatum" class="form-control" value="<?= isset($task) ? esc($task['erinnerungsdatum']) : '' ?>" required>
                    <label for="erinnerungsdatum">Erinnerungsdatum</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea id="notizen" class="form-control" placeholder="Notiz"><?= isset($task) ? esc($task['notizen']) : '' ?></textarea>
                    <label for="notizen" class="">Notiz</label>
                </div>
                <div class="row mt-3">
                    <div class="col-5"></div>
                    <div class="col-auto">
                        <button type="reset" class="bg-danger rounded">
                            <i class="fa-solid fa-broom"></i> Abbrechen
                        </button>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="bg-success rounded">
                            <i class="fa-solid fa-floppy-disk"></i> Speichern
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>