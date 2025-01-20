<!DOCTYPE html>
<html lang="de" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"-->
<!--            integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="-->
<!--            crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"-->
<!--          integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="-->
<!--          crossorigin="anonymous" referrerpolicy="no-referrer"/>-->

    <!-- load font awesome from cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
          integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- load jquery from cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- lokale version von bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css')?>"/>
<!--    <script src="--><?php //=base_url('assets/s/bootstrap.js')?><!--"></script>-->
    <script src="<?=base_url('assets/s/bootstrap.js')?>"></script>

    <script type="module">
        import * as bootstrap from '<?=base_url('assets/s/bootstrap.js')?>'
        window.bootstrap = bootstrap;
    </script>

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>"/>
    <!-- lokale CSS Einbindung -->
    <?= isset($scriptfile) ? '<script src="' . $scriptfile . '"></script>' : '<!-- kein Javascript File -->' ?>
</head>
