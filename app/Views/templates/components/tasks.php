<div hidden="hidden" id="TEMPLATE_CARD_COLUMN">
    <div class="card columnContainer h-75 overflow-y-scroll">
        <div class="card-header card-title text-center" id="column_%COLUMN_ID%">%COLUMN_HEADING%</div>
        <div class="card-body">
            %TASK_CARDS%
        </div>
    </div>
</div>

<div hidden="hidden" id="TEMPLATE_CARD_TASK">
    <div class="card mb-2" draggable="true">
        <div class="card-header card-title" id="%TASK_ID%">%TASK_ICON% %TASK_HEADING%</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between">
                    <i class="fa-solid fa-bell align-self-center" title="Erinnerungsdatum"></i> <span class="align-self-center">%REMINDER_DATE%</span>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <i class="fa-solid fa-clock align-self-center" title="Deadline"></i> <span class="align-self-center">%DEADLINE%</span>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <i class="fa-solid fa-user align-self-center" title="Nutzer"></i> <span class="align-self-center">%USER%</span>
                </li>
            </ul>
        </div>
        <div class="card-footer text-center">
            %UD_BTN%
        </div>
    </div>
</div>
