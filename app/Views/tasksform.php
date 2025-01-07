<main class="container mt-2 mb-2">
    <div class="card border-primary">
        <div class="card-header bg-black text-white">
            <h1><?= isset($task) ? 'Task Bearbeiten' : 'Neuer Task' ?></h1>
        </div>
        <div class="card-body">
            <form action="<?= base_url('tasks/' . (isset($task) ? 'update/' . $task->id : 'create')) ?>" method="post">
                <div class="form-floating mb-3">
                    <input type="text" id="taskname" class="form-control" placeholder="Task Name"
                           value="<?= isset($task) ? $task->task_name : '' ?>" required>
                    <label for="taskname" class="">Task Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" id="taskid" class="form-control" placeholder="Task ID"
                           value="<?= isset($task) ? $task->task_type_id : '' ?>" required>
                    <label for="taskid" class="">Task ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" id="personid" class="form-control" placeholder="Person ID"
                           value="<?= isset($task) ? $task->person_id : '' ?>" required>
                    <label for="personid" class="">Person ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" id="column_id" class="form-control" placeholder="Column ID"
                           value="<?= isset($task) ? $task->column_id : '' ?>" required>
                    <label for="column_id">Column ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="datetime-local" id="erinnerung" class="form-control"
                           value="<?= isset($task) ? $task->reminder_date : '' ?>" required>
                    <label for="erinnerung">Erinnerungsdatum</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea id="notiz" class="form-control"
                              placeholder="Notiz"><?= isset($task) ? $task->note : '' ?></textarea>
                    <label for="notiz" class="">Notiz</label>
                </div>
                <div class="row mt-3">
                    <div class="col-5"></div>
                    <div class="col-auto">
                        <button type="reset" class="bg-danger rounded"><i class="fa-solid fa-broom"></i> Abrechen
                        </button>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="bg-success rounded"><i class="fa-solid fa-floppy-disk"></i>
                            Speichern
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>