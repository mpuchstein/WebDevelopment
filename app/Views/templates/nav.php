<body data-bs-theme="dark">
<!-- HEADER: MENU + HEROE SECTION -->
<header>
    <nav class="navbar navbar-expand-sm fixed-top bg-header">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('/tasks') ?>">
                <img src="<?= base_url('assets/images/07_-_WE-Logo.svg') ?>" alt="Webentwicklung"
                     width="128px"
                     height="64px"
                     class="logo"/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-pills me-auto mb-2 mb-sm-0">
                    <?php foreach ($navElems as $navElem) : ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?= isset($navElem['active']) ? esc(' active') : '' ?>"
                               href="<?= esc($navElem['link']) ?>">
                                <?= esc($navElem['name']) ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                    <li class="nav-item">
                        <hr>
                    </li>
                    <?php foreach ($menuElems as $menuElem) : ?>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link ps-2"
                               href="<?= esc($menuElem['link']) ?>"><?= esc($menuElem['name']) ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
                <div class="navbar-text dropdown d-none d-sm-block align-self-end">
                    <button class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <?php foreach ($menuElems as $menuElem) : ?>
                            <li><a class="dropdown-item"
                                   href="<?= esc($menuElem['link']) ?>"><?= esc($menuElem['name']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>