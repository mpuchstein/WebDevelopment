<main class="container d-flex flex-column bg-dark-subtle p-2">
    <div class="row justify-content-between align-content-center">
        <div class="col-auto">
            <div class="input-group">
                <div class="input-group-text">
                    <label for="boardSelector">Board:</label>
                </div>
                <select type="number" name="boardSelector" id="boardSelector" class="form-select">
                    <?php foreach ($boards as $board): ?>
                        <option value="<?= esc($board['id']) ?>"<?= $boardsId == $board['id'] ? 'selected' : '' ?>>
                            <?= esc($board['board']) ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="col-auto">
            <button type="button" id="btn_add_task" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </div>
    <div id="tasksContainer" class="mt-3 container-fluid flex-grow-1 align-self-stretch align-items-stretch
     overflow-x-scroll d-flex gap-3">
        <!-- tasks are going to be placed here -->
    </div>
</main>