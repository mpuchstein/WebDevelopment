<main class="container-fluid mt-2 mb-2 p-3">
<div class="card h-100 border-primary">
    <div class="card-header border-primary d-flex justify-content-between align-content-center">
        <h1 class="my-auto"><?= esc($headline) ?></h1>
        <a href="<?= base_url('tasks/crud/new') ?>"
           class="btn btn-primary my-auto fs-4 fa-solid fa-plus-square"></a>
    </div>
    <div class="card-body bg-dark text-light border-primary table-responsive">
    <table class="table table-dark table-striped table-bordered w-100">
            <thead>
                <tr>
                    <?php foreach ($tasks[0] as $key => $value) : ?>
                        <th scope="col"><?= esc($key) ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <?php foreach ($task as $key => $value): ?>
                        <td> <?= esc($value) ?>      </td>
                    <?php endforeach; ?>
                    <td>
                        <a href="<?= base_url('tasks/crud/edit/' . esc($task['id'])) ?>" class="fa-solid fa-pen-to-square"
                           title="Bearbeiten"></a>
                        <a href="<?= base_url('tasks/crud/delete/' . esc($task['id'])) ?>" class="fa-solid fa-eraser"
                           title="Löschen"></a>
                    </td>
                </tr
            <?php endforeach; ?>
            </tbody>
    </table>
    </div>
</div>
</main>
