<!-- Template HTML for Update and Delete buttons for CRUD functionality -->
<div hidden="hidden" id="TEMPLATE_UD_BTN">
    <div class="btn-group">
        <button type="button" id="edit_%ID%" class="btn btn-sm btn-info" data-bs-target="#%FORM_ID%">
            <i class="fa-solid fa-pen-to-square"></i>
        </button>
        <button type="button" id="delete_%ID%" class="btn btn-sm btn-danger" data-bs-target="#%FORM_ID%">
            <i class="fa-solid fa-eraser"></i>
        </button>
    </div>
</div>