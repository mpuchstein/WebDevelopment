<main class="container-fluid mt-2 mb-2 p-3">
    <div class="card h-100 border-primary">
        <div class="card-header  bg-black text-light border-primary">
            <h1><?= esc($headline) ?></h1> <!-- Headline -->
        </div>
        <div class="card-body bg-dark text-light border-primary">
            <p></p>
            <table class="table-dark table-striped table-bordered w-100">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">vorname</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($personen as $person): ?>
                    <tr>
                        <td> <?= esc($person['id']) ?>      </td>
                        <td> <?= esc($person['vorname']) ?> </td>
                        <td> <?= esc($person['name']) ?>    </td>
                        <td> <?= esc($person['email']) ?>   </td>
                    </tr
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>