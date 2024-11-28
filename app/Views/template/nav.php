<body class="container-fluid d-flex flex-column h-100">
<!-- HEADER: MENU + HEROE SECTION -->
<header class="container-fluid sticky-top">
    <div class="container-fluid bg-header">
        <div class="container-fluid m-1 col-md-2">
            <a href="<?=base_url('/')?>">
                <img src="<?= base_url('assets/images/07_-_WE-Logo.svg')?>" alt="Webentwicklung" style="width: 128px;height: 64px;"  class="logo"/>
            </a>
        </div>
        <div class="container-fluid p-2 col-md">
            <nav class="navbar-toggler p-md-3 p-1">
                <a href="<?=base_url('')?>" class="btn btn-outline-dark btn-light">Tasks</a>
                <a href="<?=base_url('boards')?>" class="btn btn-outline-dark btn-light">Boards</a>
                <a href="<?=base_url('spalten')?>" class="btn btn-outline-dark btn-light">Spalten</a>
            </nav>
        </div>
    </div>
</header>
