<body class="d-flex flex-column h-100 bg-black text-light">
<!-- HEADER: MENU + HEROE SECTION -->
<header class="container bg-black sticky-top">
    <div class="bg-header m-1 p-1 ps-3">
        <a href="<?=base_url('/')?>">
            <img src="<?= base_url('assets/images/07_-_WE-Logo.svg')?>" alt="Webentwicklung" style="width: 128px;height: 64px;"  class="logo"/>
        </a>
    </div>
    <nav class="navbar-toggler bg-light-subtle m-1 p-2 ps-3">
        <a href="<?=base_url('index.php')?>" class="btn btn-outline-dark">Tasks</a>
        <a href="<?=base_url('index.php/boards')?>" class="btn btn-outline-dark">Boards</a>
        <a href="<?=base_url('index.php/spalten')?>" class="btn btn-outline-dark">Spalten</a>
    </nav>
</header>
