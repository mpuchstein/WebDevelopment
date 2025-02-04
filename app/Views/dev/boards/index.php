<!-- main frame for boards -->
<main class="card-body">
    <div class="row justify-content-between align-content-center">
        <h1 class="col-auto"><?= $headline ?></h1>
        <div class="col-auto">
            <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-target="#boardsForm"
                    onclick="fillForm('<?= base_url('boards/') ?>','new',-1)">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </div>
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                <tr class="table-primary">
                    <?php foreach ($theader as $thead): ?>
                        <th><?= $thead ?></th>
                    <?php endforeach ?>
                    <th></th>
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
</main>