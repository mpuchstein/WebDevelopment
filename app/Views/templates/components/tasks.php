<div hidden="hidden" id="TEMPLATE_CARD_COLUMN">
    <div class="card columnContainer overflow-y-scroll">
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
            <ul>
                <li>%REMINDER_DATE%</li>
                <li>%USER%</li>
            </ul>
        </div>
        <div class="card-footer text-center">
            %UD_BTN%
        </div>
    </div>
</div>
