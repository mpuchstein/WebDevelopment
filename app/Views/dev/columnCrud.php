<!-- Formulare from task 4 -->
<main class="container mt-2 mb-2">
    <div class="card border-primary">
        <div class="card-header border-primary bg-black">
            <h1><?=$headline?></h1>
        </div>
        <!-- Form elements with floating labels -->
        <div class="card-body">
            <form action="<?=base_url('columns/'.$mode) ?>" method="post">
                <input type="hidden" name="id" id="id" value="<?=isset($columns) ? $columns['id'] : ''?>">
                <input type="hidden" name="boardsid" id="boardsid" value="1">
                <div class="form-floating mb-3">
                    <input
                            type="text"
                            name="spalte"
                            id="spalte"
                            class="form-control"
                            placeholder="Spaltenbezeichnung"
                           value="<?=isset($columns) ? $columns['spalte'] : ''?>"
                            <?= $mode=='delete' ? 'readonly' : '' ?>
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
                            <?=$mode=='delete' ? 'readonly' :'' ?>
                    ><?=isset($columns) ? $columns['spaltenbeschreibung'] : '' ?></textarea>
                    <label for="columndesc" class="">Spaltenbeschreibung</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" name="sortid" id="sortid" class="form-control" placeholder="Sortier-ID"
                            value="<?=isset($columns) ? $columns['sortid'] : ''?>"
                            <?= $mode=='delete' ? 'readonly' :'' ?> required>
                    <label for="sortid" class="">Sortid</label>
                </div>
                <div class="row">
                    <label for="board" class="col-3 rounded">Board auswählen:</label>
                    <select id="board" name="board" class="col-4">
                        <option value="general">Allgemeine Todos</option>
                        <option value="special">Spezielle Todos</option>
                    </select>
                </div>
                <!-- Two buttons for saving and canceling the form -->
                <div class="row mt-3">
                    <div class="col-5"></div>
                    <div class="col-auto">
                        <button type="reset" class="btn bg-dark-subtle rounded"><i class="fa-solid fa-broom"></i> Reset
                        </button>
                    </div>
                    <div class="col-auto">
                        <a href="<?=base_url()?>" class="btn bg-dark-subtle rounded"><i class="fa-solid fa-x"></i> Abbrechen
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