<main class="container-fluid mt-2 mb-2 p-3">
    <div class="card h-100 border-primary">
        <div class="card-header border-primary d-flex bg-black justify-content-between align-content-center">
            <h1 class="my-auto"><?= esc($headline) ?></h1>
<a href="<?=base_url('tasks/crud/new')?>" class="btn btn-primary my-auto fs-4 fa-solid fa-plus-square"></a>
</div>
<div class="card-body bg-dark text-light border-primary">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-auto justify-content-between align-content-center">
        <?php foreach ($tasks as $task): ?>
            <div class = "card bg-dark-subtle col w-auto p-1 m-1 border-success">
                <h2 class="card-title"> <?= esc($task['task']) ?> </h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> Notizen: <?= esc($task['notizen']) ?> </li>
                    <li class="list-group-item"> Erstellt: <?= esc($task['erstelldatum']) ?> </li>
                    <li class="list-group-item"> Erinnerung: <?= esc($task['erinnerungsdatum']) ?> </li>
                    <li class="list-group-item"> Deadline: <?= esc($task['deadline']) ?> </li>
                </ul>
                <div class="card-footer text-center">
                    <a href="<?= base_url('tasks/crud/edit/' . esc($task['id'])) ?>"
                       class="fa-solid fa-pen-to-square" title="Bearbeiten"></a>
                    <a href="<?= base_url('tasks/crud/delete/' . esc($task['id'])) ?>" class="fa-solid fa-eraser"
                       title="Löschen"></a>
                    <button onclick="showCrud()">Edit!</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
</main>