<main>
    <div class="container mt-2">
        <div class="d-flex flex-column-reverse flex-md-row justify-content-md-evenly gap-2 gap-md-4">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-img ms-3">
                        <img src="<?= base_url('assets/images/07_-_WE-Logo.svg') ?>" alt="Webentwicklung"
                             style="width: 128px;height: 64px;" class="logo"/>
                    </div>
                    <div class="card-header card-title">
                        <h2>Testnutzer</h2>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Max Mustermann:
                                <ul>
                                    <li>mmustermann</li>
                                    <li>Pa$$word0</li>
                                </ul>
                            </li>
                            <li>Moni Mittermeier:
                                <ul>
                                    <li>mmittermeier</li>
                                    <li>Pa$$word1</li>
                                    <li>Erweiterte Privilegien</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card align-content-center">
                    <div class="card-header">
                        <h1>Login</h1>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text"
                                       class="form-control<?= isset($errors['username']) ? ' is-invalid' : '' ?>"
                                       id="username" name="username" autocomplete="username" value="<?=esc($username ?? '') ?>">
                                <label for="username">Nutzername:</label>
                                <?= isset($errors['username']) ? '<div class="invalid-feedback">' . $errors['username'] . '</div>' : '' ?>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password"
                                       class="form-control <?= isset($errors['password']) ? ' is-invalid' : '' ?>"
                                       id="password" name="password" autocomplete="current-password">
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