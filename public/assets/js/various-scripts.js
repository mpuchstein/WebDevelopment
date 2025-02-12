function updateTaskCards() {
    let columns = ''
    const itemButtons = document.getElementById(TEMPLATE_UD_BTN).innerHTML.replaceAll('%FORM_ID%', MODAL_FORM_ID)
    const boardId = document.getElementById('boardSelector').value
    fetch(REQ_TASK_HEADER, {
        body: JSON.stringify({boardId: boardId})
    }).then((response) => {
        return response.json()
    }).then((data) => {
        for (const columnId in data) {
            let taskCards = ''
            for (const task of data[columnId]['tasks']) {
                taskCards += document.getElementById(TEMPLATE_CARD_TASK).innerHTML
                    .replaceAll('%TASK_ID%', task['id'])
                    .replaceAll('%TASK_HEADING%', task['task'])
                    .replaceAll('%TASK_ICON%', task['icon'])
                    .replaceAll('%REMINDER_DATE%', task['erinnerungsdatum'])
                    .replaceAll('%DEADLINE%', task['deadline'])
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
        for (const columnId in data) {
            for (const task of data[columnId]['tasks']) {
                const taskId = task['id']
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

function createTask(taskData) {
    const task = document.createElement('div');
    task.id = 'task_' + taskData['id'];
    task.classList.add('card', 'mb-2')
    const taskHeader = document.createElement('div');
    task.appendChild(taskHeader);
    taskHeader.classList.add('card-header', 'd-flex', 'justify-content-between', 'align-items-center');
    const taskTitle = document.createElement('span');
    taskHeader.appendChild(taskTitle);
    taskTitle.classList.add('card-title', 'fs-4', 'col-md-10');
    taskTitle.name = 'taskTitle';
    taskTitle.innerHTML = taskData['icon'] + '<span class="ms-4">' + taskData['task'] + '</span>';
    const taskTitleDropdown = document.createElement('div');
    const taskTitleDrpBtn = document.createElement('button');
    taskHeader.appendChild(taskTitleDropdown);
    taskTitleDropdown.appendChild(taskTitleDrpBtn);
    taskTitleDropdown.classList.add('dropdown', 'my-auto', 'd-none', 'd-md-block');
    taskTitleDrpBtn.type = 'button';
    taskTitleDrpBtn.classList.add('btn', 'btn-sm', 'btn-outline-light', 'dropdown-toggle');
    const taskTitleDrpMenu = document.createElement('ul');
    taskTitleDropdown.appendChild(taskTitleDrpMenu);
    taskTitleDrpMenu.classList.add('dropdown-menu');
    taskTitleDrpMenu.id = 'drpMen_' + taskData['id'];
    taskTitleDrpBtn.dataset.bsToggle = 'dropdown';
    const editDrpLi = document.createElement('li');
    const delDrpLi = document.createElement('li');
    const editDrpBtn = document.createElement('a');
    const delDrpBtn = document.createElement('a');
    taskTitleDrpMenu.appendChild(editDrpLi);
    taskTitleDrpMenu.appendChild(delDrpLi);
    editDrpLi.className = 'dropdown-item';
    delDrpLi.className = 'dropdown-item';
    editDrpLi.appendChild(editDrpBtn);
    delDrpLi.appendChild(delDrpBtn);
    editDrpBtn.role = 'button';
    delDrpBtn.role = 'button';
    editDrpBtn.dataset.bsTarget = MODAL_FORM_ID;
    delDrpBtn.dataset.bsTarget = MODAL_FORM_ID;
    editDrpBtn.innerText = 'Bearbeiten';
    delDrpBtn.innerHTML = 'Löschen';
    editDrpLi.addEventListener('click', () => {
        showModal(REQ_URL_EDIT, MODE_EDIT, taskData['id']);
    })
    delDrpLi.addEventListener('click', () => {
        showModal(REQ_URL_DELETE, MODE_DELETE, taskData['id']);
    })
    const taskBody = document.createElement('div');
    task.appendChild(taskBody);
    taskBody.classList.add('card-body');
    const taskBodyList = document.createElement('ul');
    taskBody.appendChild(taskBodyList);
    taskBodyList.classList.add('list-group', 'list-group-flush');
    const listElemTemp = document.createElement('li');
    listElemTemp.classList.add('list-group-item');
    const rowIcon = document.createElement('i');
    rowIcon.classList.add('fa-solid', 'me-4');
    const reminder = listElemTemp.cloneNode(true);
    taskBodyList.appendChild(reminder);
    const reminderIcon = rowIcon.cloneNode(true);
    const reminderText = document.createElement('span');
    reminder.appendChild(reminderIcon);
    reminder.appendChild(reminderText);
    reminderIcon.title = 'Erinnerungsdatum';
    if (taskData['erinnerung'] === '1') {
        reminderIcon.classList.add('fa-bell');
        reminderText.innerText = taskData['erinnerungsdatum']
        if (Date.parse(taskData['erinnerungsdatum']) - DATE_NOW < 24 * 3600) {
            reminder.classList.add('bg-danger');
        }
    } else {
        reminderIcon.classList.add('fa-bell-slash');
        reminderText.innerText = 'Keine Erinnerung';
    }
    const deadline = listElemTemp.cloneNode(true);
    taskBodyList.appendChild(deadline);
    const deadlineIcon = rowIcon.cloneNode(true);
    const deadlineText = document.createElement('span');
    deadline.appendChild(deadlineIcon);
    deadline.appendChild(deadlineText);
    deadlineIcon.classList.add('fa-clock');
    deadlineIcon.title = 'Deadline';
    deadlineText.innerText = taskData['deadline'];
    if (Date.parse(taskData['deadline']) - DATE_NOW < 0) {
        deadline.classList.add('bg-danger-subtle');
    } else if (Date.parse(taskData['deadline']) - DATE_NOW < 24 * 3600) {
        deadline.classList.add('bg-danger');
    }
    const user = listElemTemp.cloneNode(true);
    taskBodyList.appendChild(user);
    const userIcon = rowIcon.cloneNode(true);
    const userText = document.createElement('span');
    user.appendChild(userIcon);
    user.appendChild(userText);
    userIcon.classList.add('fa-user');
    userIcon.title = 'User';
    userText.innerText = taskData['username'];
    const taskFooter = document.createElement('div');
    task.appendChild(taskFooter);
    taskFooter.classList.add('card-footer', 'text-center');
    const editBtn = document.createElement('button');
    const delBtn = document.createElement('button');
    const btnGrp = document.createElement('div');
    btnGrp.appendChild(editBtn);
    btnGrp.appendChild(delBtn);
    taskFooter.appendChild(btnGrp);
    btnGrp.classList.add('btn-group', 'd-md-none');
    editBtn.type = 'button';
    delBtn.type = 'button';
    editBtn.classList.add('btn', 'btn-sm', 'btn-info')
    delBtn.classList.add('btn', 'btn-sm', 'btn-danger')
    editBtn.dataset.bsTarget = MODAL_FORM_ID;
    delBtn.dataset.bsTarget = MODAL_FORM_ID;
    editBtn.innerHTML = '<i class="fa-solid fa-pen-to-square"></i>';
    delBtn.innerHTML = '<i class="fa-solid fa-eraser"></i>';
    editBtn.addEventListener('click', () => {
        showModal(REQ_URL_EDIT, MODE_EDIT, taskData['id']);
    })
    delBtn.addEventListener('click', () => {
        showModal(REQ_URL_DELETE, MODE_DELETE, taskData['id']);
    })
    return task;
}

function crudColumn(columnId, columnData) {
    const boardView = document.getElementById('tasksContainer');
    const column = document.getElementById('column_' + columnId)
    if (!column) {
        const column = document.createElement('div');
        boardView.appendChild(column);
        column.id = 'column_' + columnId;
        column.classList.add('card', 'columnContainer', 'overflow-y-scroll');
        const columnTitle = document.createElement('div');
        columnTitle.classList.add('card-header', 'card-title', 'text-center', 'fs-4');
        columnTitle.innerText = columnData['columnName'];
        column.appendChild(columnTitle);
        const taskContainer = document.createElement('div');
        column.appendChild(taskContainer);
        taskContainer.id = 'taskContainerColumn_' + columnId;
        taskContainer.classList.add('card-body');
        for (const taskData of columnData['tasks']) {
            const task = document.getElementById('task_' + taskData['id']);
            if (!task) {
                taskContainer.appendChild(createTask(taskData));
            } else {
                updateTask(task, taskData);
            }
        }
        const columnFooter = document.createElement('div');
        column.appendChild(columnFooter);
        columnFooter.classList.add('card-footer', 'text-center');
        const colFootBtn = document.createElement('button');
        columnFooter.appendChild(colFootBtn);
        columnFooter.classList.add('btn', 'btn-primary');
        columnFooter.innerHTML = '<i class="fa-solid fa-plus"></i>';
        columnFooter.addEventListener('click', () => {
            showModal(REQ_URL_NEW, MODE_NEW, -1);
        })
    } else {
       for (const taskData of columnData['tasks']) {
            const task = document.getElementById('task_' + taskData['id']);
            const taskContainer = document.getElementById('column_' + columnId);
            if (!task) {
                taskContainer.appendChild(createTask(taskData));
            } else {
                taskContainer.removeChild(task);
                taskContainer.appendChild(createTask(taskData));
            }
        }
    }
}

function createTaskView() {
    const boardId = document.getElementById('boardSelector').value
    fetch(REQ_TASK_HEADER, {
        body: JSON.stringify({boardId: boardId})
    }).then((response) => {
        return response.json()
    }).then((data) => {
        for (const columnId in data) {
            crudColumn(columnId, data[columnId]);
        }
    });
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
            const delid = 'delete_' + elemid
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
        document.getElementById(formField + '_invalid').innerText = ''
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

function setBoard(url, id) {
    fetch(url, {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({boardId: id})
    }).then((response) => {
        return response.json()
    }).then((data) => {
        if (data['success'] !== true) {
            console.log('Board does not exist')
        }
        location.reload()
    })
}