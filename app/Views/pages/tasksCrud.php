<main class="container mt-2 mb-2">
    <div class="card">
        <div class="card-header bg-black text-white">
            <h1><?= esc($headline) ?></h1>
        </div>
        <div class="card-body">
            <form action="<?= base_url('tasks/') . $mode ?>" method="post">
                <input type="hidden" name="id"
                       id="id" <?= isset($tasks['id']) ? 'value="' . $tasks['id'] . '"' : 'disabled' ?>>
                <div class="form-floating mb-3">
                    <input type="text" name="task" id="task"
                           class="form-control<?= isset($error['task']) ? ' is-invalid' : '' ?>" placeholder="Task Name"
                           value="<?= isset($tasks) ? esc($tasks['task']) : '' ?>"
                        <?= $mode == 'delete' ? 'disabled' : '' ?>>
                    <label for="task" class="">Task Name</label>
                    <?= isset($error['task']) ? '<div class="invalid-feedback">' . $error['task'] . '</div>' : '' ?>
                </div>
                <div class="form-floating mb-3">
                    <select type="number" name="taskartenid" id="taskartenid"
                            class="form-select<?= isset($error['taskartenid']) ? ' is-invalid' : '' ?>"
                        <?= ($mode == 'delete') ? ' disabled' : '' ?>>
                        <?= isset($tasks['id']) ? '' : '<option selected value="">Select Typ</option>' ?>
                        <?php foreach ($taskType as $type): ?>
                            <option value="<?= $type['id'] ?>" <?= isset($tasks['taskartenid']) && ($type['id'] == $tasks['taskartenid']) ? 'selected' : '' ?>>
                                <?= $type['taskart'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <label for="taskartenid" class="">Taskart auswählen</label>
                    <?= isset($error['taskartenid']) ? '<div class="invalid-feedback">' . $error['taskartenid'] . '</div>' : '' ?>
                </div>
                <div class="form-floating mb-3">
                    <select type="number" name="spaltenid" id="spaltenid"
                            class="form-select<?= isset($error['spaltenid']) ? ' is-invalid' : '' ?>"
                        <?= ($mode == 'delete') ? ' disabled' : '' ?>>
                        <?= isset($tasks['id']) ? '' : '<option selected value="">Select Spalte</option>' ?>
                        <?php foreach ($columns as $column): ?>
                            <option value="<?= $column['id'] ?>" <?= isset($tasks['spaltenid']) && ($column['id'] == $tasks['spaltenid']) ? 'selected' : '' ?>>
                                <?= $column['spalte'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <label for="spaltenid" class="">Spalte auswählen:</label>
                    <?= isset($error['spaltenid']) ? '<div class="invalid-feedback">' . $error['spaltenid'] . '</div>' : '' ?>
                </div>
                <div class="form-floating mb-3">
                    <select type="number" name="personenid" id="personenid"
                            class="form-select<?= isset($error['personenid']) ? ' is-invalid' : '' ?>"
                        <?= ($mode == 'delete') ? ' disabled' : '' ?>>
                        <?= isset($tasks['id']) ? '' : '<option selected value="">Select Person</option>' ?>
                        <?php foreach ($personen as $person): ?>
                            <option value="<?= $person['id'] ?>" <?= isset($tasks['personenid']) && ($person['id'] == $tasks['personenid']) ? 'selected' : '' ?>>
                                <?= $person['vorname'] . ' ' . $person['name'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <label for="personenid" class="">Person auswählen:</label>
                    <?= isset($error['personenid']) ? '<div class="invalid-feedback">' . $error['personenid'] . '</div>' : '' ?>
                </div>
                <div class="form-floating mb-3">
                    <input type="datetime-local" name="deadline" id="deadline"
                           class="form-control<?= isset($error['deadline']) ? ' is-invalid' : '' ?>"
                           value="<?= isset($tasks) ? $tasks['deadline'] : '' ?>"
                        <?= $mode == 'delete' ? 'disabled' : '' ?>>
                    <label for="deadline">Deadline</label>
                    <?= isset($error['deadline']) ? '<div class="invalid-feedback">' . $error['deadline'] . '</div>' : '' ?>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" name="erinnerung" id="erinnerung"
                           class="form-check-input<?= isset($error['erinnerung']) ? ' is-invalid' : '' ?>" <?= isset($tasks) && ($tasks['erinnerung'] == 1) ? 'checked' : '' ?>
                        <?= $mode == 'delete' ? 'disabled' : '' ?>>
                    <label class="form-check-label" for="erinnerung">Erinnerung</label>
                    <?= isset($error['erinnerung']) ? '<div class="invalid-feedback">' . $error['erinnerung'] . '</div>' : '' ?>
                </div>
                <div class="form-floating mb-3">
                    <input type="datetime-local" name="erinnerungsdatum" id="erinnerungsdatum"
                           class="form-control<?= isset($error['erinnerungsdatum']) ? ' is-invalid' : '' ?>"
                           value="<?= isset($tasks) ? $tasks['erinnerungsdatum'] : '' ?>"
                        <?= $mode == 'delete' ? 'disabled' : '' ?>>
                    <label for="erinnerungsdatum">Erinnerungsdatum</label>
                    <?= isset($error['erinnerungsdatum']) ? '<div class="invalid-feedback">' . $error['erinnerungsdatum'] . '</div>' : '' ?>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="notizen" id="notizen"
                              class="form-control<?= isset($error['notizen']) ? ' is-invalid' : '' ?>"
                              placeholder="Notiz" <?= $mode == 'delete' ? 'disabled' : '' ?>>
                        <?= isset($tasks) ? $tasks['notizen'] : '' ?></textarea>
                    <label for="notizen">Notiz</label>
                    <?= isset($error['notizen']) ? '<div class="invalid-feedback">' . $error['notizen'] . '</div>' : '' ?>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" name="erledigt"
                           id="erledigt<?= isset($error['erledigt']) ? ' is-invalid' : '' ?>"
                           class="form-check-input" <?= isset($tasks) && ($tasks['erledigt'] == 1) ? 'checked' : '' ?>
                        <?= $mode == 'delete' || $mode == 'new' ? 'disabled' : '' ?>>
                    <label class="form-check-label" for="erledigt">erledigt</label>
                    <?= isset($error['erledigt']) ? '<div class="invalid-feedback">' . $error['erledigt'] . '</div>' : '' ?>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" name="geloescht" id="geloescht"
                           class="form-check-input<?= isset($error['geloescht']) ? ' is-invalid' : '' ?>" <?= isset($tasks) && ($tasks['geloescht'] == 1) ? 'checked' : '' ?>
                           disabled>
                    <label class="form-check-label" for="geloescht">gelöscht</label>
                    <?= isset($error['geloescht']) ? '<div class="invalid-feedback">' . $error['geloescht'] . '</div>' : '' ?>
                </div>
                <div class="row mt-3 justify-content-end">
                    <div class="col-auto">
                        <a href="<?= base_url() ?>" class="btn bg-dark-subtle rounded"><i class="fa-solid fa-x"></i>
                            Abbrechen
                        </a>
                    </div>
                    <?= $mode == 'delete' ? '<div class="col-auto">
                            <button type="submit" class="btn bg-danger rounded"><i class="fa-solid fa-floppy-disk"></i>
                                Löschen
                            </button>
                        </div>' : '<div class="col-auto">
                            <button type="submit" class="btn bg-success rounded"><i class="fa-solid fa-floppy-disk"></i>
                                Speichern
                            </button>
                        </div>' ?>
                </div>
            </form>
        </div>
    </div>
</main>