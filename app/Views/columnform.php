<main class="container mt-2 mb-2">
    <div class="card">
        <div class="card-header bg-black text-light">
            <h1>Spalte erstellen</h1>
        </div>
        <div class="card-body bg-dark">
            <form class="">
                <div class="form-floating mb-3">
                    <!--<label for="columnlabel" class="col-3">Spaltenbezeichnung:</label>-->
                    <label for="columnlabel">Spaltenbezeichnung</label>
                    <!--<input type="text" id="columnlabel" class="col-4">-->
                    <input type="text" id="columnlabel" class="form-control" placeholder="Spaltenbezeichnung">
                </div>
                <div class="form-floating mb-3">
                    <!--<label for="columndesc" class="col-3">Spaltenbeschreibung:</label>-->
                    <label for="columndesc">Spaltenbeschreibung</label>
                    <!--<textarea id="columndesc" class="col-4"></textarea>-->
                    <textarea id="columndesc" class="form-control" placeholder="Spaltenbeschreibung" style="height: 100px"></textarea>
                </div>
                <div class="form-floating mb-3">
                    <!--<label for="sortid" class="col-3">Spaltenbezeichnung:</label>-->
                    <label for="sortid">Sortier-ID</label>
                    <!--<input type="text" id="sortid" class="col-4">-->
                    <input type="text" id="sortid" class="form-control" placeholder="Sortier-ID">
                </div>
                <div class="row">
                    <label for="board" class="col-3 text-light rounded">Board auswählen:</label>
                    <select id="board" name="board" class="col-4">
                        <option value="general">Allgemeine Todos</option>
                        <option value="special">Spezielle Todos</option>
                    </select>
                </div>
                <div class="row mt-3">
                    <div class="col-5"></div>
                    <div class="col-auto"><button type="reset" class="bg-danger rounded"><i class="fa-solid fa-broom"></i> Reset</button></div>
                    <div class="col-auto"><button type="submit" class="bg-success rounded"><i class="fa-solid fa-floppy-disk"></i> Speichern</button></div>
                </div>
            </form>
        </div>
    </div>
</main>