<script>
    window.onload = function(){
        toggleRemember();
    }
    function showCrud(type, id){
        if(type === "new") {
            document.getElementById("crudTitle").innerHTML = "Neu";
        } else if(type === "edit"){
            document.getElementById("crudTitle").innerHTML = "Bearbeiten";
        } else if(type === "delete"){
            document.getElementById("crudTitle").innerHTML = "Löschen";
        }
        document.getElementById("crud").showModal();
    }

    function closeCrud(){
        document.getElementById("crudform").reset();
        document.getElementById("crud").close();
    }

    function submitCrud(){
        document.getElementById("crudform").submit();
    }

    function resetCrud(){
        document.getElementById("crudform").reset();
    }

    function toggleRemember(){
        const remembertoggle = document.getElementById("erinnerung");
        const rememberelem = document.getElementById("erinnerungsdatumcontainer");
        if(remembertoggle.checked){
            rememberelem.style.display = "block"
        } else {
            rememberelem.style.display = "none";
        }
    }

</script>

<dialog id="crud">
    <div class="card">
        <div class="card-header">
            <h2 id="crudTitle" class="card-title"></h2>
        </div>
        <div class="card-body">
            <form id="crudform" action="<?= base_url('tasks/')?>" method="post">
                <input type="hidden" name="id" id="id">
                <div class="form-floating mb-3">
                    <input type="text" name="task" id="task" class="form-control" placeholder="Task Name">
                    <label for="task">Task Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="taskartenid" id="taskartenid" class="form-control" placeholder="Taskarten ID">
                    <label for="taskartenid">Taskart ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="personenid" id="personenid" class="form-control" placeholder="Personen ID">
                    <label for="personenid">Personen ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="spaltenid" id="spaltenid" class="form-control" placeholder="Spalten ID">
                    <label for="spaltenid">Spalten ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="datetime-local" name="deadline" id="deadline" class="form-control" placeholder="Deadline">
                    <label for="personenid">Taskart ID</label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" name="erinnerung" id="erinnerung" class="form-check-input" onchange="toggleRemember()">
                    <label for="erinnerung">Erinnerung</label>
                </div>
                <div id="erinnerungsdatumcontainer" class="form-floating mb-3">
                    <input type="datetime-local" name="erinnerungsdatum" id="erinnerungsdatum" class="form-control">
                    <label for="erinnerungsdatum">Erinnerungsdatum</label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" name="erledigt" id="erledigt" class="form-check-input">
                    <label class="form-check-label" for="erledigt">gelöscht</label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" name="geloescht" id="geloescht" class="form-check-input">
                    <label class="form-check-label" for="geloescht">gelöscht</label>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button onclick="submitCrud()" class="btn btn-dark col-auto">Submit</button>
            <button onclick="resetCrud()" class="btn btn-dark col-auto">Reset</button>
            <button onclick="closeCrud()" class="btn btn-dark col-auto">Schließen</button>
        </div>
    </div>
</dialog>