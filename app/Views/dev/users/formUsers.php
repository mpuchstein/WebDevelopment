<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="formHeadline" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="formHeadline" class="modal-title">
                    Placeholder
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formUsers" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-floating mb-3">
                        <input type="text" name="username" id="username" class="form-control">
                        <label for="username">Nutzername</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select type="text" name="role" id="role" class="form-select">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="forename" id="forename" class="form-control">
                        <label for="forename">Vorname</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" id="name" class="form-control">
                        <label for="name">Nachname</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="email" id="email" class="form-control">
                        <label for="email">Email</label>
                    </div>
                    <div class="row mt-3 align-content-end justify-content-end">
                        <div class="col-auto">
                            <button type="submit" id="formSubmit" class="btn btn-dark btn-outline-light">
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