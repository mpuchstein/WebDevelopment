<div class="modal fade" id="usersModal" tabindex="-1" aria-labelledby="formUsersHeadline" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="formUsersHeadline" class="modal-title">
                    Placeholder
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="usersForm" method="post" data-mode="" data-type="users">
                    <input type="hidden" name="id" id="id">
                    <div id="id_invalid" class="invalid-feedback text-center"></div>
                    <fieldset id="modalUsersFormFields">
                        <div class="form-floating mb-3">
                            <input type="text" name="username" id="username" class="form-control">
                            <label for="username">Nutzername</label>
                            <div id="username_invalid" class="invalid-feedback"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="plevel" id="plevel" class="form-control" value="1000">
                            <label for="plevel">Privilegien</label>
                            <div id="plevel_invalid" class="invalid-feedback"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="vorname" id="vorname" class="form-control">
                            <label for="vorname">Vorname</label>
                            <div id="vorname_invalid" class="invalid-feedback"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="name" id="name" class="form-control">
                            <label for="name">Name</label>
                            <div id="name_invalid" class="invalid-feedback"></div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="email" id="email" class="form-control">
                            <label for="email">E-Mail</label>
                            <div id="email_invalid" class="invalid-feedback"></div>
                        </div>
                    </fieldset>
                    <div class="row mt-3 align-content-end justify-content-end">
                        <div class="col-auto">
                            <button type="submit" id="modalUsersSubmit" class="btn">
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