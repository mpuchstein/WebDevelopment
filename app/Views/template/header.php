<!DOCTYPE html>
<html lang="de" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KanBan Team 17</title>

    <!-- load font awesome from cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
          integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- load jquery from cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- lokale version von bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css') ?>"/>
    <script src="<?= base_url('assets/s/bootstrap.js') ?>"></script>
    <!-- import bootstrap so you can use it in js -->
    <script type="module">
        import * as bootstrap from ''

        window.bootstrap = bootstrap;
    </script>

    <!-- lokale CSS Einbindung -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>"/>
    <?= isset($scriptfile) ? '<script src="' . $scriptfile . '"></script>' : '<!-- kein Javascript File -->' ?>
</head>
