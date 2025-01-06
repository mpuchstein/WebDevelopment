<!-- Future Kanban board from task 1 -->
<main class="container-fluid mt-2 mb-2 p-3">
    <div class="card h-100 border-primary">
        <div class="card-header  border-primary bg-black">
            <h1>Tasks</h1> <!-- Headline -->
        </div>
        <div class="card-body  border-primary">
            <a href="<?=base_url('tasks/form')?>" class="btn btn-primary">Neu</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">Personid</th>
                    <th scope="col">spaltenid</th>
                    <th scope="col">taskid</th>
                    <th scope="col">sortid</th>
                    <th scope="col">task</th>
                    <th scope="col">notizen</th>
                    <th scope="col">erstelldatum</th>
                    <th scope="col">erinnerung</th>
                    <th scope="col">deadline</th>
                    <th scope="col">erledigt</th>
                    <th scope="col">geloescht</th>
                    <th>Bearbeiten</th>
                </tr>
                </thead>
                <tbody>
                   <tr>
                       <!-- one row -->
                       <td>1</td>
                       <td>2</td>
                       <td>1</td>
                       <td>1</td>
                       <td>100</td>
                       <td>Folien für Vortrag</td>
                       <td></td>
                       <td>2025-01-06 00:00:00</td>
                       <td>1</td>
                       <td>2025-01-15 00:00:00</td>
                       <td>0</td>
                       <td>0</td>
                       <td>
                       <td>
                           <a href="<?=base_url('tasks/form/')?>" class="fa-solid fa-pen-to-square" title="Bearbeiten"></a>
                           <a href="<?=base_url('tasks/delete/')?>" class="fa-solid fa-eraser" title="Löschen"></a>
                       </td>
                   </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>