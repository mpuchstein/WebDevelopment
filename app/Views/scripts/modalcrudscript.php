<script>
    function showCrud(){
        document.getElementById("crud").showModal();
    }

    function closeCrud(){
        document.getElementById("crud").close();
    }

</script>

<dialog id="crud">
    <div class="card">
        <div class="card-body">
            This will be the edit Window!<br />
        </div>
        <div class="card-footer">
            <button onclick="closeCrud()" class="btn btn-light align-self-center">Close</button>
        </div>
    </div>
</dialog>