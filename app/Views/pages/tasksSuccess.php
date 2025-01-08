<p class="card bg-success text-center">
    <?= $type == 'new' ? 'Added new task with id' : '' ?>
    <?= $type == 'edit' ? 'Edited task with id' : '' ?>
    <?= $type == 'delete' ? 'Deleted task with id' : '' ?>
    <?= esc($id) ?>
    successfully.
</p>