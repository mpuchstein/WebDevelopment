<!-- Future Kanban board from task 1 -->
<main class="container-fluid mt-2 mb-2 p-3">
    <div class="card h-100 border-primary">
        <div class="card-header  border-primary bg-black">
            <h1>Tasks</h1> <!-- Headline -->
        </div>
        <div class="card-body  border-primary">
            <a href="<?=base_url('tasks/form')?>" class="btn btn-outline-light">Neu</a>
            <!-- Alternative zu Neu -> "neu Task", "Erstellen" -->
            <p></p>
            <table class="table-dark table-striped table-bordered w-100">
                <thead>
                <tr>
                    <th scope="col">Task Name</th>
                    <!-- <th scope="col">Person</th> -->
                    <!-- <th scope="col">board</th> -->
                    <th scope="col">Erinnerungsdatum</th>
                    <th scope="col">Notiz </th>
                    <th>Bearbeiten</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <!-- one row -->
                    <td> test</td>
                    <td> 2024-12-12 00:00:00</td>
                    <td> test</td>
                    <td> <a href="<?=base_url('tasks/form')?>" class="btn"><i class="fa-solid fa-pen-to-square" title="Bearbeiten"></i></a>
                         <a href="<?=base_url('tasks/form')?>" class="btn"><i class="fa-solid fa-eraser" title="Löschen"></i></a></td>
                </tr>
                <!--<?php foreach ($tabele as $tabele): ?>
                    <tr>
                        <td> <?= esc($tabele['']) ?>      </td>
                        <td> <?= esc($tabele['']) ?> </td> -->
                <!-- <td> <?= esc($tabele['']) ?> </td> -->
                <!-- <td> <?= esc($tabele['']) ?> </td> --> <!--
                        <td> <?= esc($tabele['']) ?>    </td>
                        <td> <?= esc($tabele['']) ?>   </td>
                        <td> <a href="<?=base_url('tasks/form')?>" class="btn"><i class="fa-solid fa-pen-to-square" title="Bearbeiten"></i></a>
                             <a href="<?=base_url('tasks/form')?>" class="btn"><i class="fa-solid fa-eraser" title="Löschen"></i></a></td>
                    </tr
                <?php endforeach; ?> -->
                </tbody>
            </table>
        </div>
    </div>
</main>