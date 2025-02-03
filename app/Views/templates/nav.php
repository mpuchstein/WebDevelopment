<!-- Navigation to task 1 -->
<body class="container-fluid d-flex flex-column h-100" data-bs-theme="dark">
<!-- HEADER: MENU + HEROE SECTION -->
<header class="container-fluid sticky-top bg-header">
    <div class="container">
        <div class="container m-1 col-md-2">
            <a href="<?= base_url('/tasks') ?>">
                <!-- Logo is included -->
                <img src="<?= base_url('assets/images/07_-_WE-Logo.svg') ?>" alt="Webentwicklung"
                     style="width: 128px;height: 64px;" class="logo"/>
            </a>
        </div>
        <div class="container-fluid p-2 col-md">
            <nav class="navbar-toggler p-md-3 p-1">
                <a href="<?= base_url('tasks') ?>" class="btn btn-outline-light btn-dark">Tasks</a>
                <a href="<?= base_url('tasks/table') ?>" class="btn btn-outline-light btn-dark">TasksTable</a>
                <a href="<?= base_url('boards') ?>" class="btn btn-outline-light btn-dark">Boards</a>
                <a href="<?= base_url('columns') ?>" class="btn btn-outline-light dark btn-dark">Spalten</a>
                <a href="<?= base_url('users') ?>" class="btn btn-outline-light dark btn-dark">Personen</a>
            </nav>
        </div>
    </div>
</header>
