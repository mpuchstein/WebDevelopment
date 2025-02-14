<!-- modal form for editing boards> -->
<div class="modal fade" id="boardsModal" tabindex="-1" aria-labelledby="formHeadline" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="formBoardsHeadline" class="modal-title">
                    Placeholder
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="boardsForm" method="post" data-mode="" data-type="boards">
                    <input type="hidden" name="id" id="id">
                    <div id="id_invalid" class="invalid-feedback text-center"></div>
                    <fieldset id="modalBoardsFormFields">
                        <div class="form-floating mb-3">
                            <input type="text" name="board" id="board" class="form-control" placeholder="Board Name">
                            <label for="board">Board Name</label>
                            <div id="board_invalid" class="invalid-feedback"></div>
                        </div>
                    </fieldset>
                    <div class="row mt-3 align-content-end justify-content-end">
                        <div class="col-auto">
                            <button type="submit" id="formBoardsSubmit" class="btn btn-dark btn-outline-light">
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
