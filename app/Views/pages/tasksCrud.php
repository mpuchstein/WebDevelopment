<main class="container mt-2 mb-2">
    <div class="card border-primary">
        <div class="card-header bg-black text-white">
            <h1><?= esc($headline) ?></h1>
        </div>
        <div class="card-body">
            <form action="<?= base_url('tasks/crud/' . $mode) ?>" method="post">
                <div class="form-floating mb-3">
                    <input type="number" id="id" class="form-control" placeholder="Task ID"
                           value="<?= isset($tasks) ? $tasks['id'] : '' ?>" readonly>
                    <label for="taskid" class="">Task ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="taskname" class="form-control" placeholder="Task Name"
                           value="<?= isset($tasks) ? $tasks['task'] : '' ?>"
                           <?= $mode=='delete' ? 'readonly' : '' ?> required>
                    <label for="taskname" class="">Task Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" id="personid" class="form-control" placeholder="Person ID"
                           value="<?= isset($tasks) ? $tasks['personenid'] : '' ?>"
                            <?= $mode=='delete' ? 'readonly' : '' ?> required>
                    <label for="personid" class="">Person ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" id="spaltenid" class="form-control" placeholder="Column ID"
                           value="<?= isset($tasks) ? $tasks['spaltenid'] : '' ?>"
                           <?= $mode=='delete' ? 'readonly' : '' ?> required>
                    <label for="spaltenid">Column ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" id="sortid" class="form-control" placeholder="Sort ID"
                           value="<?= isset($tasks) ? $tasks['sortid'] : '' ?>"
                        <?= $mode=='delete' ? 'readonly' : '' ?> required>
                    <label for="sortid">Sort ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="datetime-local" id="deadline" class="form-control"
                           value="<?= isset($tasks) ? $tasks['deadline'] : '' ?>"
                        <?= $mode=='delete' ? 'readonly' : '' ?> required>
                    <label for="deadline">Deadline</label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" id="erinnerung"
                           class="form-check-input" <?= isset($tasks) && ($tasks['erinnerung'] == 1) ? 'checked' : '' ?>
                           required>
                    <label class="form-check-label" for="erinnerung">Erinnerung</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="datetime-local" id="erinnerungsdatum" class="form-control"
                           value="<?= isset($tasks) ? $tasks['erinnerungsdatum'] : '' ?>"
                        <?= $mode=='delete' ? 'readonly' : '' ?> required>
                    <label for="erinnerungsdatum">Erinnerungsdatum</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea id="notiz" class="form-control" placeholder="Notiz" <?= $mode=='delete' ? 'readonly' : '' ?>>
                        <?= isset($tasks) ? $tasks['notizen'] : '' ?></textarea>
                    <label for="notiz" class="">Notiz</label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" id="erledigt"
                           class="form-check-input" <?= isset($tasks) && ($tasks['erledigt'] == 1) ? 'checked' : '' ?>
                           required>
                    <label class="form-check-label" for="erledigt">erledigt</label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" id="geloescht"
                           class="form-check-input" <?= isset($tasks) && ($tasks['geloescht'] == 1) ? 'checked' : '' ?>
                           disabled required>
                    <label class="form-check-label" for="geloescht">gelöscht</label>
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