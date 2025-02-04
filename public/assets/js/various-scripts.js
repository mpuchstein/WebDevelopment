
function updateTaskCards() {
    let columns = ''
    const itemButtons = document.getElementById(TEMPLATE_UD_BTN).innerHTML.replaceAll('%FORM_ID%', MODAL_FORM_ID)
    const boardId = document.getElementById('boardSelector').value
    fetch(REQ_TASK_HEADER, {
        body: JSON.stringify({boardId: boardId})
    }).then((response) => {
        return response.json()
    }).then((data) => {
        for(const columnId in data) {
            let taskCards = ''
            for(const task of data[columnId]['tasks']) {
                taskCards += document.getElementById(TEMPLATE_CARD_TASK).innerHTML
                    .replaceAll('%TASK_ID%', task['id'])
                    .replaceAll('%TASK_HEADING%', task['task'])
                    .replaceAll('%TASK_ICON%', task['icon'])
                    .replaceAll('%REMINDER_DATE%', task['erinnerungsdatum'])
                    .replaceAll('%USER%', task['username'])
                    .replaceAll('%UD_BTN%', itemButtons.replaceAll('%ID%', task['id']))
            }
            columns += '<td>\n'
            columns += document.getElementById(TEMPLATE_CARD_COLUMN).innerHTML
                .replaceAll('%COLUMN_ID%', columnId)
                .replaceAll('%COLUMN_HEADING%', data[columnId]['columnName'])
                .replaceAll('%TASK_CARDS%', taskCards)
            columns += '</td>\n'
        }
        document.getElementById(TABLE_BODY_ID).innerHTML = columns
        for(const columnId in data) {
            for(const task of data[columnId]['tasks']){
                const taskId= task['id']
                const editId = 'edit_' + taskId
                const delId = 'delete_' + taskId
                const editBtn = document.getElementById(editId)
                const delBtn = document.getElementById(delId)
                editBtn.addEventListener('click', () => {
                    showModal(REQ_URL_EDIT, MODE_EDIT, taskId)
                })
                delBtn.addEventListener('click', () => {
                    showModal(REQ_URL_DELETE, MODE_DELETE, taskId)
                })
            }
        }
    })
}

function updateTable() {
    let tableRows = ''
    const rowButtons = document.getElementById(TEMPLATE_UD_BTN).innerHTML.replaceAll('%FORM_ID%', MODAL_FORM_ID)
    fetch(REQ_URL_JSON).then((response) => {
        return response.json()
    }).then((data) => {
        for (const row of data) {
            tableRows += '<tr>'
            for (const tid of THEAD_IDS) {
                tableRows += '<td>' + row[tid] + '</td>'
            }
            tableRows += '<td>'
            tableRows += rowButtons.replaceAll('%ID%', row['id']);
            tableRows += '</td>'
            tableRows += '</tr>'
        }
        document.getElementById(TABLE_BODY_ID).innerHTML = tableRows
        for (const row of data) {
            const elemid = row['id']
            const editid = 'edit_' + elemid
            const delid = 'delete_' +elemid
            const editBtn = document.getElementById(editid)
            const delBtn = document.getElementById(delid)
            editBtn.addEventListener('click', () => {
                showModal(REQ_URL_EDIT, MODE_EDIT, elemid)
            })
            delBtn.addEventListener('click', () => {
                showModal(REQ_URL_DELETE, MODE_DELETE, elemid)
            })
        }
    })
}

function genModalForm() {
    document.forms[MODAL_FORM_ID].addEventListener('submit', (event) => {
        event.preventDefault();
        // TODO do something here to show user that form is being submitted
        fetch(event.target.action, {
            method: 'POST',
            body: new URLSearchParams(new FormData(event.target)) // event.target is the form
        }).then((response) => {
            if (!response.ok) {
                console.log(response)
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json(); // or response.text() or whatever the server sends
        }).then((data) => {
            if (data['success'] === true) {
                updateSite()
                $(MODAL_ID).modal('hide')
            } else {
                MODAL_FORMFIELDS_NAMES.forEach(formField => {
                    document.getElementById(formField).classList.toggle('is-invalid', formField in data['errors'])
                    document.getElementById(formField + '_invalid').innerText = data['errors'][formField]
                })
            }
        }).catch((error) => {
            // TODO handle error
            console.log(error)
        });
    });
}
function showModal(requrl, mode, elemid) {
    const modalHeadline = document.getElementById(MODAL_HEADLINE_ID)
    const modalForm = document.getElementById(MODAL_FORM_ID)
    const formButton = document.getElementById(MODAL_SUBMIT_ID)
    const formFields = document.getElementById(MODAL_FORMFIELDS_ID)
    formFields.disabled = false
    MODAL_FORMFIELDS_NAMES.forEach(formField => {
        document.getElementById(formField).classList.toggle('is-invalid', false)
        document.getElementById(formField+'_invalid').innerText = ''
    })
    modalForm.reset()
    modalForm.action = requrl

    switch (mode) {
        case MODE_NEW:
            modalHeadline.innerText = 'Neu'
            formButton.className = 'btn btn-success'
            formButton.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Speichern'
            break
        case MODE_EDIT:
            modalHeadline.innerText = 'Bearbeiten'
            formButton.className = 'btn btn-info'
            formButton.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Editieren'
            break;
        case MODE_DELETE:
            modalHeadline.innerText = 'Löschen'
            formButton.className = 'btn btn-danger'
            formButton.innerHTML = '<i class="fa-solid fa-eraser"></i> Löschen'
            formFields.disabled = true
            break;
    }
    if (elemid > 0) {
        fetch(REQ_URL_JSON + '/' + elemid).then((response) => {
            return response.json()
        }).then((data) => {
            Object.entries(data).forEach(entry => {
                const inputField = document.getElementById(entry[0])
                if (inputField) {
                    inputField.value = entry[1]
                }
            })
        })
    }

    $(MODAL_ID).modal('show');
}