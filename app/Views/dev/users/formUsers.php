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
                <form id="modalForm" method="post">
                    <input type="hidden" name="id" id="id">
                    <fieldset id="modalFormFields">
                        <div class="form-floating mb-3">
                            <input type="text" name="username" id="username" class="form-control">
                            <label for="username">Nutzername</label>
                            <div id="username_invalid" class="invalid-tooltip"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="plevel" id="plevel" class="form-control" value="1000">
                            <label for="plevel">Privilegien</label>
                            <div id="plevel_invalid" class="invalid-tooltip"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="vorname" id="vorname" class="form-control">
                            <label for="vorname">Vorname</label>
                            <div id="vorname_invalid" class="invalid-tooltip"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="name" id="name" class="form-control">
                            <label for="name">Name</label>
                            <div id="name_invalid" class="invalid-tooltip"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="email" id="email" class="form-control">
                            <label for="email">Email</label>
                            <div id="email_invalid" class="invalid-tooltip"></div>
                        </div>
                    </fieldset>
                    <div class="row mt-3 align-content-end justify-content-end">
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
</div>