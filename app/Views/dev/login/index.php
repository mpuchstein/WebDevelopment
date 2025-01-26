<main>
    <div class="container mt-3">
        <div class="row">
            <div class="container col-sm w-auto h-auto">
                <div class="img-fluid align-self-center my-auto">
                    <img src="<?= base_url('assets/images/07_-_WE-Logo.svg') ?>" alt="Webentwicklung"
                         style="width: 128px;height: 64px;" class="logo"/>
                </div>
            </div>
            <div class="container col-sm w-25 h-25">
                <div class="card align-content-center">
                    <div class="card-header">
                        <h1>Login</h1>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text"
                                       class="form-control<?= isset($errors['username']) ? ' is-invalid' : '' ?>"
                                       id="username" name="username"/>
                                <label for="username">Username:</label>
                                <?= isset($errors['username']) ? '<div class="invalid-feedback">' . $errors['username'] . '</div>' : '' ?>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password"
                                       class="form-control<?= isset($errors['password']) ? ' is-invalid' : '' ?>
                                       id=" password" name="password"/>
                                <label for="password">Passwort:</label>
                                <?= isset($errors['password']) ? '<div class="invalid-feedback">' . $errors['password'] . '</div>' : '' ?>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>