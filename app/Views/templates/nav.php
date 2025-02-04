<body class="container-fluid d-flex flex-column h-100" data-bs-theme="dark">
<!-- HEADER: MENU + HEROE SECTION -->
<header class="container-fluid sticky-top bg-header">
    <div class="row justify-content-between">
        <div class="col-auto">
            <a href="<?= base_url('/tasks') ?>">
                <!-- Logo is included -->
                <img src="<?= base_url('assets/images/07_-_WE-Logo.svg') ?>" alt="Webentwicklung"
                     style="width: 128px;height: 64px;" class="logo"/>
            </a>
        </div>
        <div class="col-auto align-self-end my-auto">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <ul class="dropdown-menu">
                    <?php foreach ($menuElems as $menuElem) : ?>
                        <li><a class="dropdown-item" href="<?=esc($menuElem['link'])?>"><?=esc($menuElem['name'])?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- Example single danger button -->
        </div>
    </div>
</header>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <nav class="nav">
                <ul class="col nav nav-tabs card-header-tabs">
                    <?php foreach ($navElems as $navElem) : ?>
                        <li class="nav-item">
                            <a class="nav-link<?= isset($navElem['active']) ? esc(' active') : '' ?>"
                               href="<?= esc($navElem['link']) ?>">
                                <?= esc($navElem['name']) ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </nav>
        </div>

