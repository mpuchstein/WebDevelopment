<main class="container-fluid mt-2 mb-2 p-3">
    <div class="card h-100 border-primary">
        <div class="card-header  bg-black text-light border-primary">
            <h1><?= esc($headline) ?></h1> <!-- Headline -->
</div>
<!--<div class="card-body bg-dark text-light border-primary">
    <p></p>
    <div id="toolbar" >
        <a href="<?=base_url('/spalten/crud/new')?>">
            <button class="btn btn-primary mb-2" type="button" name="btnNeu" id="btnNeu">
                <i class="btn btn-primary"></i> Neu</button>
        </a>
    </div>

    <table class="table table-dark table-striped table-bordered w-100">
           data-show-columns="true"
           showColumnsToggleAll="true"
           data-show-toggle="true"
           data-toggle="table"
           data-search="true"
           data-sort-stable="true"
           data-toolbar="#toolbar">
        <thead align="left">
        <tr>
            <th data-sortable="true">ID</th>
            <th >sortid</th>
            <th data-sortable="true">spalten</th>
            <th data-sortable="true">spaltenbeschreibung</th>
            <th class="text-right">Bearbeiten</th>
        </tr>
        </thead>
        <tbody>
        <? foreach( $spalten as $item ): ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['boardid'] ?></td>
                <td><?= $item['sortid'] ?></td>
                <td><?= $item['spalten'] ?></td>
                <td><?= $item['spaltenbeschreibung'] ?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?=base_url('tasks/crud/edit/' . esc($task['id']))?>" class="fa-solid fa-pen-to-square" title="Bearbeiten"></a>
                        <a href="<?=base_url('tasks/crud/delete/' . esc($task['id']))?>" class="fa-solid fa-eraser" title="Löschen"></a>
                    </div>
                </td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
</div>-->
</div>
</main>