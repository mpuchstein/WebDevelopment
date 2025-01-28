<!-- modal form for editing boards> -->
<div class="modal fade" id="boardsForm" tabindex="-1" aria-labelledby="formHeadline" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="formHeadline" class="modal-title">
                    Placeholder
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="modalForm" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-floating mb-3">
                        <input type="text" name="board" id="board" class="form-control" placeholder="Board Name">
                        <label for="board">Board Name</label>
                    </div>
                    <div class="row mt-3 align-content-end justify-content-end">
                        <div class="col-auto">
                            <button type="submit" id="formSubmit" class="btn btn-dark btn-outline-light">
                                Placeholder
                            </button>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-dark btn-outline-light" data-bs-dismiss="modal"
                                    aria-label="Abbrechen">
                                <i class="fa-solid fa-x"></i> Abbrechen
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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