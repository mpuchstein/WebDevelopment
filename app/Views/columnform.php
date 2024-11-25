<main class="container mt-2 mb-2">
    <div class="card">
        <div class="card-header">
            <h1>Spalte erstellen</h1>
        </div>
        <div class="card-body">
            <form class="">
                <div class="row">
                    <label for="columnlabel" class="col-3">Spaltenbezeichnung:</label>
                    <input type="text" id="columnlabel" class="col-4">
                </div>
                <div class="row">
                    <label for="columndesc" class="col-3">Spaltenbeschreibung:</label>
                    <textarea id="columndesc" class="col-4"></textarea>
                </div>
                <div class="row">
                    <label for="sortid" class="col-3">Spaltenbezeichnung:</label>
                    <input type="text" id="sortid" class="col-4">
                </div>
                <div class="row">
                    <label for="board" class="col-3">Board auswählen:</label>
                    <select id="board" name="board" class="col-4">
                        <option value="general">Allgemeine Todos</option>
                        <option value="special">Spezielle Todos</option>
                    </select>
                </div>
                <div class="row mt-3">
                    <div class="col-5"></div>
                    <div class="col-auto"><button type="reset" class="bg-danger"><i class="fa-solid fa-broom"></i> Reset</button></div>
                    <div class="col-auto"><button type="submit" class="bg-success"><i class="fa-solid fa-floppy-disk"></i> Speichern</button></div>
                </div>
            </form>
        </div>
    </div>
</main>