
<!-- main frame for boards -->
<main class="container mt-2">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-content-center">
            <h1 class="my-auto"><?= $headline ?></h1>
            <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-target="#boardsForm"
                    onclick="fillForm('<?= base_url('boards/') ?>','new',-1)"
            >
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <?php foreach ($theader as $thead): ?>
                            <td><?= $thead ?></td>
                        <?php endforeach ?>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tdata as $trow): ?>
                        <tr>
                            <td>
                                <?= ($trow['id']) ?>
                            </td>
                            <td>
                                <?= ($trow['board']) ?>
                            </td>
                            <td class="text-end">
                                <div class="btn-group">
                                    <button
                                            type="button"
                                            class="btn btn-sm btn-info"
                                            data-bs-target="#boardsForm"
                                            onclick="fillForm('<?= base_url('boards/') ?>','edit',<?= $trow['id'] ?>)"
                                    >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button
                                            type="button"
                                            class="btn btn-sm btn-danger"
                                            data-bs-target="#boardsForm"
                                            onclick="fillForm('<?= base_url('boards/') ?>','delete',<?= $trow['id'] ?>)"
                                    >
                                        <i class="fa-solid fa-eraser"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
        </div>
    </div>
    </div>
</main>