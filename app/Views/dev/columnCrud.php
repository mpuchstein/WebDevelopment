<!-- Formulare from task 4 -->
<main class="container mt-2 mb-2">
    <div class="card border-primary">
        <div class="card-header border-primary bg-black">
            <h1><?=$headline?></h1>
        </div>
        <!-- Form elements with floating labels -->
        <div class="card-body">
            <form action="<?=base_url('columns/'.$mode) ?>" method="post">
                <input type="hidden" name="id" id="id" <?=isset($columns) ? 'value="'.$columns['id'].'"' : 'disabled'?>>
                <div class="form-floating mb-3">
                    <input
                            type="text"
                            name="spalte"
                            id="spalte"
                            class="form-control"
                            placeholder="Spaltenbezeichnung"
                           value="<?=isset($columns) ? $columns['spalte'] : ''?>"
                            <?= $mode=='delete' ? 'disabled' : '' ?>
                            required>
                    <label for="spalte" class="">Spaltenbezeichnung</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea
                            name="spaltenbeschreibung"
                            id="spaltenbeschreibung"
                            class="form-control"
                            placeholder="Spaltenbeschreibung"
                            style="height: 100px"
                            <?=$mode=='delete' ? 'disabled' :'' ?>
                    ><?=isset($columns) ? $columns['spaltenbeschreibung'] : '' ?></textarea>
                    <label for="spaltenbeschreibung" class="">Spaltenbeschreibung</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" name="sortid" id="sortid" class="form-control" placeholder="Sortier-ID"
                            value="<?=isset($columns) ? $columns['sortid'] : ''?>"
                            <?= $mode=='delete' ? 'disabled' :'' ?> required>
                    <label for="sortid" class="">Sortid</label>
                </div>
                <div class="form-floating mb-3">
                    <select type="number" name="boardsid" id="boardsid" class="form-select"<?=($mode=='delete')?' disabled':''?>>
                        <?=isset($columns)?'':'<option selected>Select Board</option>'?>
                        <?php foreach($boards as $board): ?>
                        <option value="<?=$board['id']?>" <?=isset($columns) && ($board['id']==$columns['boardsid']) ? 'selected' : ''?>>
                            <?=$board['board']?>
                        </option>
                        <?php endforeach?>
                    </select>
                    <label for="boardsid" class="">Board auswählen:</label>
                </div>
                <!-- Two buttons for saving and canceling the form -->
                <div class="row mt-3 justify-content-end align-content-end">
                    <div class="col-auto">
                        <button type="reset" class="btn bg-dark-subtle rounded"><i class="fa-solid fa-broom"></i> Reset
                        </button>
                    </div>
                    <div class="col-auto">
                        <a href="<?=base_url('columns')?>" class="btn bg-dark-subtle rounded"><i class="fa-solid fa-x"></i> Abbrechen
                        </a>
                    </div>
                    <?= $mode == 'delete' ?
                        '<div class="col-auto">
                            <button type="submit" class="btn bg-danger rounded"><i class="fa-solid fa-floppy-disk"></i>
                                Löschen
                            </button>
                        </div>' :
                        '<div class="col-auto">
                            <button type="submit" class="btn bg-success rounded"><i class="fa-solid fa-floppy-disk"></i>
                                Speichern
                            </button>
                        </div>'
                    ?>
                </div>
            </form>
        </div>
    </div>
</main>