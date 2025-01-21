<!-- main frame for boards -->
<main class="container mt-2">
    <div class="card">
        <div class="card-header">
            <h1><?= $headline ?></h1>
        </div>
        <div class="card-body">
            <table class="table-responsive">
                <table class="table table-bordered rounded"
                <thead>
                <tr>
                    <?php foreach ($theader as $thead): ?>
                        <td><?= $thead ?></td>
                    <?php endforeach ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tdata as $trow): ?>
                <tr>
                    <td>
                        <?=($trow['id']) ?>
                    </td>
                    <td>
                        <?=($trow['board']) ?>
                    </td>
                    <td>
                        <button
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</main>