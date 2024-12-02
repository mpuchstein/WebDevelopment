<main class="container mt-2 mb-2">
    <div class="card border-primary">
        <div class="card-header bg-black text-light border-primary">
            <h1>Spalte erstellen</h1>
        </div>
        <div class="card-body bg-dark text-light">
            <form class="">
                <div class="form-floating mb-3">
                    <!--<label for="columnlabel" class="col-3">Spaltenbezeichnung:</label>-->
                    <!--<input type="text" id="columnlabel" class="col-4">-->
                    <input type="text" id="columnlabel" class="form-control bg-dark text-white" placeholder="Spaltenbezeichnung">
                    <label for="columnlabel" class="">Spaltenbezeichnung</label>
                </div>
                <div class="form-floating mb-3">
                    <!--<label for="columndesc" class="col-3">Spaltenbeschreibung:</label>-->
                    <!--<textarea id="columndesc" class="col-4"></textarea>-->
                    <textarea id="columndesc" class="form-control bg-dark text-white" placeholder="Spaltenbeschreibung" style="height: 100px"></textarea>
                    <label for="columndesc" class="">Spaltenbeschreibung</label>
                </div>
                <div class="form-floating mb-3">
                    <!--<label for="sortid" class="col-3">Spaltenbezeichnung:</label>-->
                    <!--<input type="text" id="sortid" class="col-4">-->
                    <input type="text" id="sortid" class="form-control bg-dark text-white" placeholder="Sortier-ID">
                    <label for="sortid" class="">Sortier-ID</label>
                </div>
                <div class="row">
                    <label for="board" class="col-3 text-light rounded">Board auswählen:</label>
                    <select id="board" name="board" class="col-4 bg-dark text-white">
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