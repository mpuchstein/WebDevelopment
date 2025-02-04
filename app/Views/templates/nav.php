<!-- Navigation to task 1 -->
<body class="container-fluid d-flex flex-column h-100" data-bs-theme="dark">
<!-- HEADER: MENU + HEROE SECTION -->
<header class="container-fluid sticky-top bg-header">
    <div class="container">
        <div class="row">
            <div class="container m-1 col-md-2">
                <a href="<?= base_url('/tasks') ?>">
                    <!-- Logo is included -->
                    <img src="<?= base_url('assets/images/07_-_WE-Logo.svg') ?>" alt="Webentwicklung"
                         style="width: 128px;height: 64px;" class="logo"/>
                </a>
            </div>
        </div>
    </div>
</header>
<div class="container-fluid p-2 col-md">
    <div class="card">
        <div class="card-header">
            <nav>
                <ul class="nav nav-tabs card-header-tabs">
                    <?php foreach ($navElems as $navElem) : ?>
                        <li class="nav-item">
                            <a class="nav-link<?= isset($navElem['active']) ? esc(' active') : '' ?>"
                               href="<?= esc($navElem['link']) ?>">
                                <?=esc($navElem['name']) ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                    <li class="nav-item">
                        <a href="<?= base_url('logout') ?>" class="nav-link">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>

