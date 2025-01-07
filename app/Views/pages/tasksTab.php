<main class="container-fluid mt-2 mb-2 p-3">
    <div class="card h-100 border-primary">
        <div class="card-header  bg-black text-light border-primary">
            <h1><?= esc($headline) ?></h1> <!-- Headline -->
</div>
<div class="card-body bg-dark text-light border-primary table-responsive">
    <p></p>
    <table class="table-dark table-striped table-bordered w-100">
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
            </tr
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</main>
