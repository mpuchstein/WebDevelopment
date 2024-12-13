<main class="container-fluid mt-2 mb-2 p-3">
    <div class="card h-100 border-primary">
        <div class="card-header  bg-black text-light border-primary">
            <h1>Tasks</h1> <!-- Headline -->
        </div>
        <div class="card-body bg-dark text-light border-primary">
            <p><? $test ?></p>
            <table class="table-dark "
                   <thead>
                   <tr>
                       <th scope="col">id</th>
                       <th scope="col">vorname</th>
                       <th scope="col">namen</th>
                       <th scope="col">email</th>
                   </tr>
                   </thead>
                   <tbody>
                   <?php foreach ($personen as $person): ?>
                   <tr>
                       <td><?= $person['id'] ?></td>
                       <td><?= $person['vornamen'] ?></td>
                       <td><?= $person['namen'] ?></td>
                       <td><?= $person['email'] ?></td>
                   </tr>
                   </tbody>
            </table>
        </div>
    </div>
</main>
