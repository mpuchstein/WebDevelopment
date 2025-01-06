<!-- Formulare from task 4 -->
<main class="container mt-2 mb-2">
    <div class="card border-primary">
        <div class="card-header border-primary bg-black">
            <h1>Spalte erstellen</h1>
        </div>
        <!-- Form elements with floating labels -->
        <div class="card-body">
            <form class="">
                <div class="form-floating mb-3">
                    <input type="text" id="taskname" class="form-control" placeholder="Task Name">
                    <label for="taskname" class="">Task Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" id="taskid" class="form-control" placeholder="Task ID">
                    <label for="taskid" class="">Task ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" id="personid" class="form-control" placeholder="Person ID">
                    <label for="personid" class="">Person ID</label>
                </div>
                <!-- ID der Spalte (passend zum Board) -->
                <div class="form-floating mb-3">
                    <input type="date" id="erinnerungdate" class="form-control" placeholder="Erinnerungsdatum">
                    <label for="erinnerungdate" class="">Erinnerungsdatum</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="datetime-local" id="erinnerung" class="form-control" placeholder="Erinnerung setzen">
                    <label for="erinnerung">Erinnerungsdatum</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea id="notiz" class="form-control" placeholder="Notiz " style="height: 100px"></textarea>
                    <label for="notiz" class="">Notiz</label>
                </div>
                <!-- Two buttons for saving and canceling the form -->
                <div class="row mt-3">
                    <div class="col-5"></div>
                    <div class="col-auto"><button type="reset" class="bg-danger rounded"><i class="fa-solid fa-broom"></i> Reset</button></div>
                    <div class="col-auto"><button type="submit" class="bg-success rounded"><i class="fa-solid fa-floppy-disk"></i> Speichern</button></div>
                </div>
            </form>
        </div>
    </div>
</main>