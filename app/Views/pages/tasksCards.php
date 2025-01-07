<main class="container-fluid mt-2 mb-2 p-3">
    <div class="card h-100 border-primary">
        <div class="card-header  bg-black text-light border-primary">
            <h1><?= esc($headline) ?></h1> <!-- Headline -->
        </div>
        <div class="card-body bg-dark text-light border-primary">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-auto">
                <?php foreach ($tasks as $task): ?>
                <div class = "card col w-auto p-1 m-1 border-success">
                    <h2 class="card-title"> <?= esc($task['task']) ?> </h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> Notizen: <?= esc($task['notizen']) ?> </li>
                        <li class="list-group-item"> Erstellt: <?= esc($task['erstelldatum']) ?> </li>
                        <li class="list-group-item"> Erinnerung: <?= esc($task['erinnerungsdatum']) ?> </li>
                        <li class="list-group-item"> Deadline: <?= esc($task['deadline']) ?> </li>
                    </ul>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>
