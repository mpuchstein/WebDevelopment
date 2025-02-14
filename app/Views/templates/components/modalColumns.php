<div class="modal fade" id="modalColumns" tabindex="-1" aria-labelledby="formHeadline" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalColumnsHeadline" class="modal-title">
                    Placeholder
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="modalColumnsForm" method="post" data-mode="" data-type="columns">
                    <input type="hidden" name="id" id="id">
                    <div id="id_invalid" class="invalid-feedback text-center"></div>
                    <fieldset id="modalColumnsFormFields">
                        <div class="form-floating mb-3">
                            <input type="text" name="spalte" id="spalte" class="form-control"
                                   placeholder="Spaltenbezeichnung">
                            <label for="spalte" class="">Spaltenbezeichnung</label>
                            <div id="spalte_invalid" class="invalid-feedback"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="spaltenbeschreibung" id="spaltenbeschreibung" class="form-control"
                                      placeholder="Spaltenbeschreibung"></textarea>
                            <label for="spaltenbeschreibung" class="">Spaltenbeschreibung</label>
                            <div id="spaltenbeschreibung_invalid" class="invalid-feedback"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="sortid" id="sortid" class="form-control" placeholder="Sortier-ID">
                            <label for="sortid" class="">Sortid</label>
                            <div id="sortid_invalid" class="invalid-feedback"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <select type="number" name="boardsid" id="boardsid" class="form-select">
                                <?php foreach ($boards as $board): ?>
                                    <option value="<?= $board['id'] ?>">
                                        <?= $board['board'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <label for="boardsid" class="">Board auswählen:</label>
                            <div id="boardsid_invalid" class="invalid-feedback"></div>
                        </div>
                    </fieldset>
                    <div class="row mt-1 me-3 mb-3 align-content-end justify-content-end">
                        <div class="col-auto">
                            <button type="submit" id="formColumnsSubmit" class="btn">
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
</div>
