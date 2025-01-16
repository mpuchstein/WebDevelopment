<main class="container mt-2 mb-2">
    <div class="card border-primary">
        <div class="card-header bg-black text-white">
            <h1><?= esc($headline) ?></h1>
        </div>
        <div class="card-body">
            <form action="<?= base_url('tasks/') . $mode ?>" method="post">
                <input type="hidden" name="id" id="id" value="<?= isset($tasks) ? $tasks['id'] : '' ?>">
                <div class="form-floating mb-3">
                    <input type="text" name="task" id="task" class="form-control" placeholder="Task Name"
                           value="<?= isset($tasks) ? $tasks['task'] : '' ?>"
                           <?= $mode=='delete' ? 'readonly' : '' ?> required>
                    <label for="task" class="">Task Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" name="taskartenid" id="taskartenid" class="form-control" placeholder="Taskarten ID"
                           value="<?= isset($tasks) ? $tasks['taskartenid'] : '' ?>"
                        <?= $mode=='delete' ? 'readonly' : '' ?> required>
                    <label for="taskartenid">Tasktyp ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" name="personenid" id="personenid" class="form-control" placeholder="Person ID"
                           value="<?= isset($tasks) ? $tasks['personenid'] : '' ?>"
                            <?= $mode=='delete' ? 'readonly' : '' ?> required>
                    <label for="personenid" class="">Person ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" name="spaltenid" id="spaltenid" class="form-control" placeholder="Spalten ID"
                           value="<?= isset($tasks) ? $tasks['spaltenid'] : '' ?>"
                           <?= $mode=='delete' ? 'readonly' : '' ?> required>
                    <label for="spaltenid">Column ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="datetime-local" name="deadline" id="deadline" class="form-control"
                           value="<?= isset($tasks) ? $tasks['deadline'] : '' ?>"
                        <?= $mode=='delete' ? 'readonly' : '' ?> required>
                    <label for="deadline">Deadline</label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" name="erinnerung" id="erinnerung"
                           class="form-check-input" <?= isset($tasks) && ($tasks['erinnerung'] == 1) ? 'checked' : '' ?>
                           <?= $mode == 'delete' ? 'disabled' : '' ?>>
                    <label class="form-check-label" for="erinnerung">Erinnerung</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="datetime-local" name="erinnerungsdatum" id="erinnerungsdatum" class="form-control"
                           value="<?= isset($tasks) ? $tasks['erinnerungsdatum'] : '' ?>"
                        <?= $mode=='delete' ? 'readonly' : '' ?>>
                    <label for="erinnerungsdatum">Erinnerungsdatum</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="notizen" id="notizen" class="form-control" placeholder="Notiz" <?= $mode=='delete' ? 'readonly' : '' ?>>
                        <?= isset($tasks) ? $tasks['notizen'] : '' ?></textarea>
                    <label for="notizen" >Notiz</label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" name="erledigt" id="erledigt"
                           class="form-check-input" <?= isset($tasks) && ($tasks['erledigt'] == 1) ? 'checked' : '' ?>
                           <?= $mode=='delete' || $mode=='new' ? 'disabled' : '' ?>>
                    <label class="form-check-label" for="erledigt">erledigt</label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" name="geloescht" id="geloescht"
                           class="form-check-input" <?= isset($tasks) && ($tasks['geloescht'] == 1) ? 'checked' : '' ?>
                           disabled>
                    <label class="form-check-label" for="geloescht">gelöscht</label>
                </div>
                <div class="row mt-3">
                    <div class="col-5"></div>
                    <div class="col-auto">
                        <button type="reset" class="btn bg-dark-subtle rounded"><i class="fa-solid fa-broom"></i> Reset
                        </button>
                    </div>
                    <div class="col-auto">
                        <a href="<?=base_url()?>" class="btn bg-dark-subtle rounded"><i class="fa-solid fa-x"></i> Abbrechen
                        </a>
                    </div>
                    <?= $mode == 'delete' ?
                        '<div class="col-auto">
                            <button type="submit" class="btn bg-danger rounded"><i class="fa-solid fa-floppy-disk"></i>
                                Löschen
                            </button>
                        </div>' :
                        '<div class="col-auto">
                            <button type="submit" class="btn bg-success rounded"><i class="fa-solid fa-floppy-disk"></i>
                                Speichern
                            </button>
                        </div>'
                    ?>
                </div>
            </form>
        </div>
    </div>
</main>