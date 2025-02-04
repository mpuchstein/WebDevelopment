<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="formHeadline" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalHeadline" class="modal-title">
                    Placeholder
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="modalTasksForm" method="post">
                    <input type="hidden" name="id" id="id">
                    <fieldset id="modalFormFields">
                        <div class="form-floating mb-3">
                            <input type="text" name="task" id="task" class="form-control">
                            <label for="task">Bezeichnung</label>
                            <div id="task_invalid" class="invalid-tooltip"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <select type="number" name="taskartenid" id="taskartenid" class="form-select">
                                <?php foreach ($taskTypes as $type) : ?>
                                <option value="<?=esc($type['id'])?>"><?=esc($type['taskart'])?></option>
                                <?php endforeach?>
                            </select>
                            <label for="taskartenid">Taskart auswählen</label>
                            <div id="taskartenid_invalid" class="invalid-tooltip"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <select type="number" name="spaltenid" id="spaltenid" class="form-select">
                                <?php foreach ($columns as $column) : ?>
                                    <option value="<?=esc($column['id'])?>"><?=esc($column['spalte'])?></option>
                                <?php endforeach?>
                            </select>
                            <label for="spaltenid">Spalte auswählen</label>
                            <div id="spaltenid_invalid" class="invalid-tooltip"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <select type="number" name="personenid" id="personenid" class="form-select">
                                <?php foreach ($users as $user) : ?>
                                    <option value="<?=esc($user['id'])?>"><?=esc($user['username'])?></option>
                                <?php endforeach?>
                            </select>
                            <label for="personenid">Person auswählen</label>
                            <div id="personenid_invalid" class="invalid-tooltip"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="datetime-local" name="deadline" id="deadline" class="form-control">
                            <label for="deadline">Deadline</label>
                            <div id="deadline_invalid" class="invalid-tooltip"></div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="erinnerung" id="erinnerung" class="form-check-input">
                            <label for="erinnerung" class="form-check-label">Erinnerung</label>
                            <div id="erinnerung_invalid" class="invalid-tooltip"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="datetime-local" name="erinnerungsdatum" id="erinnerungsdatum"
                                   class="form-control">
                            <label for="erinnerungsdatum">Erinnerungsdatum</label>
                            <div id="erinnerungsdatum_invalid" class="invalid-tooltip"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="notizen" id="notizen" class="form-control"></textarea>
                            <label for="notizen">Notiz</label>
                            <div id="notizen_invalid" class="invalid-tooltip"></div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="erledigt" id="erledigt" class="form-check-input">
                            <label for="erledigt" class="form-check-label">erledigt</label>
                            <div id="erledigt_invalid" class="invalid-tooltip"></div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="geloescht" id="geloescht" class="form-check-input">
                            <label for="geloescht" class="form-check-label">geloescht</label>
                            <div id="geloescht_invalid" class="invalid-tooltip"></div>
                        </div>
            </div>
            </fieldset>
            <div class="row mt-1 me-3 mb-3 align-content-end justify-content-end">
                <div class="col-auto">
                    <button type="submit" id="formSubmit" class="btn">
                        Placeholder
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-dark btn-outline-light" data-bs-dismiss="modal"
                            aria-label="Abbrechen">
                        <i class="fa-solid fa-x"></i> Abbrechen
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
