const MODE_NEW = 'new'
const MODE_EDIT = 'edit'
const MODE_DELETE = 'delete'
const MODE_QUERY = 'query'
const MODE_MOVE = 'move'

const REQ_HEADER_TASKS = new Request(
    BASE_URL + 'tasks/json',
    {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        }
    }
)
const REQ_HEADER_BOARDS = new Request(
    BASE_URL + 'boards/json',
    {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        }
    }
)
const REQ_HEADER_COLUMNS = new Request(
    BASE_URL + 'columns/json',
    {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        }
    }
)

function getReqHeader(type) {
    switch (type) {
        case 'tasks':
            return REQ_HEADER_TASKS;
        case 'columns':
            return REQ_HEADER_COLUMNS;
        case 'boards':
            return REQ_HEADER_BOARDS;
    }
}

function createQueryRequestBody(type, elemId) {
    switch (type) {
        case 'tasks':
            return JSON.stringify({
                taskId: elemId,
                mode: MODE_QUERY
            })
        case 'boards':
            return JSON.stringify({
                boardId: elemId,
                mode: MODE_QUERY
            })
        case 'users':
            return JSON.stringify({
                userId: elemId,
                mode: MODE_QUERY
            })
    }
}

function moveTask(taskContainer, task, before) {
    const columnId = taskContainer.dataset.columnId;
    const taskId = task.dataset.taskId;
    const beforeId = before !== null ? before.dataset.taskId : null;
    fetch(REQ_HEADER_TASKS, {
        body: JSON.stringify({
            taskId: taskId,
            mode: MODE_MOVE,
            columnId: columnId,
            beforeId: beforeId
        })
    }).then((response) => {
        if (!response.ok) {
            console.log(response)
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    }).then((data) => {
        if (data['success'] === true) {
            Object.entries(data['tasks']).forEach(entry => {
                document.getElementById('task_' + entry[1]['taskId']).dataset.sortId = entry[1]['sortid'];
            });
        } else {
            if (confirm('Drag and Drop fehlgeschlagen. Seite neuladen?')) {
                window.location.reload();
            }

        }
    }).catch((error) => {
        console.log(error);
    });
}

function sortIdComperatorASC(a, b) {
    if (a.dataset.sortId < b.dataset.sortId)
        return -1;
    if (a.dataset.sortId > b.dataset.sortId)
        return 1;
    return 0;
}

function sortIdComperatorDESC(a, b) {
    if (a.dataset.sortId < b.dataset.sortId)
        return 1;
    if (a.dataset.sortId > b.dataset.sortId)
        return -1;
    return 0;
}

function sortTasks(taskContainer) {
    const tasksArray = Array.from(taskContainer.querySelectorAll('[data-sort-id]'));
    let sorted = tasksArray.sort(sortIdComperatorDESC);
    sorted.forEach(e =>
        taskContainer.appendChild(e)
    );
}

function removeTask(taskId) {
    const task = document.getElementById('task_' + taskId);
    if (task) {
        task.remove();
    }
}

function updateTask(taskElem, taskData) {
    taskElem.dataset.taskId = taskData['id'];
    taskElem.dataset.sortId = taskData['sortid'];
    const taskTitle = taskElem.querySelector('.card-header').querySelector('[title="Taskname"]');
    const reminder = taskElem.querySelector('[title="reminder"]');
    const reminderIcon = taskElem.querySelector('[title="Erinnerung"]');
    const reminderText = taskElem.querySelector('[title="Erinnerungsdatum"]');
    const deadline = taskElem.querySelector('[title="Deadline"]');
    const deadlineText = taskElem.querySelector('[title="Deadlinedatum"]');
    const userText = taskElem.querySelector('[title="Username"]');
    taskTitle.innerHTML = taskData['icon'] + '<span class="ms-4">' + taskData['task'] + '</span>';
    userText.innerText = taskData['username'];
    if (taskData['erledigt'] === '0') {
        deadline.hidden = false;
        taskElem.classList.toggle('bg-success-subtle', false);
        reminder.classList.toggle('bg-success-subtle', false);
        reminderIcon.classList.toggle('fa-check', false);
        if (taskData['erinnerung'] === '1') {
            reminderIcon.classList.toggle('fa-bell', true);
            reminderIcon.classList.toggle('fa-bell-slash', false);
            reminderText.innerText = taskData['erinnerungsdatum']
            if (Date.parse(taskData['erinnerungsdatum']) - DATE_NOW < 24 * 3600 * 1000) {
                reminder.classList.toggle('bg-success', true);
                reminder.classList.toggle('bg-danger', false);
            } else if (Date.parse(taskData['erinnerungsdatum']) - DATE_NOW < 0) {
                reminder.classList.toggle('bg-success', false);
                reminder.classList.toggle('bg-danger', true);
            } else {
                reminder.classList.toggle('bg-success', false);
                reminder.classList.toggle('bg-danger', false);
            }
        } else {
            reminderIcon.classList.toggle('fa-bell', false);
            reminderIcon.classList.toggle('fa-bell-slash', true);
            reminderText.innerText = 'Keine Erinnerung';
        }
        deadlineText.innerText = taskData['deadline'];
        if (Date.parse(taskData['deadline']) - DATE_NOW < 0) {
            deadline.classList.toggle('bg-danger-subtle', true);
            deadline.classList.toggle('bg-danger', false);
        } else if (Date.parse(taskData['deadline']) - DATE_NOW < 24 * 3600 * 1000) {
            deadline.classList.toggle('bg-danger-subtle', false);
            deadline.classList.toggle('bg-danger', true);
        }
    } else {
        deadline.hidden = true;
        taskElem.classList.toggle('bg-success-subtle', true);
        reminder.classList.toggle('bg-success-subtle', true);
        reminderIcon.classList.toggle('fa-check', true);
        reminderText.innerText = 'Erledigt';
    }
}

function createTask(taskData) {
    const task = document.createElement('div');
    //generate task header
    const taskHeader = document.createElement('div');
    const taskTitle = document.createElement('span');
    const taskTitleDropdown = document.createElement('div');
    const taskTitleDrpBtn = document.createElement('button');
    const taskTitleDrpMenu = document.createElement('ul');
    const editDrpLi = document.createElement('li');
    const delDrpLi = document.createElement('li');
    const editDrpBtn = document.createElement('a');
    const delDrpBtn = document.createElement('a');
    task.appendChild(taskHeader);
    taskHeader.appendChild(taskTitle);
    taskHeader.appendChild(taskTitleDropdown);
    taskTitleDropdown.appendChild(taskTitleDrpBtn);
    taskTitleDropdown.appendChild(taskTitleDrpMenu);
    taskTitleDrpMenu.appendChild(editDrpLi);
    taskTitleDrpMenu.appendChild(delDrpLi);
    editDrpLi.appendChild(editDrpBtn);
    delDrpLi.appendChild(delDrpBtn);

    // set task id and title so you can query for the elements
    task.id = 'task_' + taskData['id'];
    taskTitle.title = 'Taskname';

    task.classList.add('card', 'mb-2');
    taskHeader.classList.add('card-header', 'd-flex', 'justify-content-between', 'align-items-center');
    taskTitle.classList.add('card-title', 'fs-4', 'col-md-10');
    taskTitle.innerHTML = taskData['icon'] + '<span class="ms-4">' + taskData['task'] + '</span>';
    taskTitleDropdown.classList.add('dropdown', 'my-auto', 'd-none', 'd-md-block');
    taskTitleDrpBtn.type = 'button';
    taskTitleDrpBtn.classList.add('btn', 'btn-sm', 'btn-outline-light', 'dropdown-toggle');
    taskTitleDrpMenu.classList.add('dropdown-menu');
    taskTitleDrpMenu.id = 'drpMen_' + taskData['id'];
    taskTitleDrpBtn.dataset.bsToggle = 'dropdown';
    editDrpLi.className = 'dropdown-item';
    delDrpLi.className = 'dropdown-item';
    editDrpBtn.role = 'button';
    delDrpBtn.role = 'button';
    editDrpBtn.dataset.bsTarget = MODAL_FORM_ID;
    delDrpBtn.dataset.bsTarget = MODAL_FORM_ID;
    editDrpBtn.innerText = 'Bearbeiten';
    delDrpBtn.innerHTML = 'Löschen';
    editDrpLi.addEventListener('click', () => {
        showModal(modalTask, MODE_EDIT, taskData['id']);
    })
    delDrpLi.addEventListener('click', () => {
        showModal(modalTask, MODE_DELETE, taskData['id']);
    })
    // generate task body
    const taskBody = document.createElement('div');
    const taskBodyList = document.createElement('ul');
    const reminderText = document.createElement('span');
    const deadlineText = document.createElement('span');
    const userText = document.createElement('span');
    const listElemTemp = document.createElement('li');
    const rowIcon = document.createElement('i');
    // set template values for list element and row icon so they can easily be cloned
    listElemTemp.classList.add('list-group-item');
    rowIcon.classList.add('fa-solid', 'me-4');
    const reminder = listElemTemp.cloneNode(true);
    const reminderIcon = rowIcon.cloneNode(true);
    const deadline = listElemTemp.cloneNode(true);
    const deadlineIcon = rowIcon.cloneNode(true);
    const user = listElemTemp.cloneNode(true);
    const userIcon = rowIcon.cloneNode(true);
    task.appendChild(taskBody);
    taskBody.appendChild(taskBodyList);
    reminder.appendChild(reminderIcon);
    reminder.appendChild(reminderText);
    taskBodyList.appendChild(reminder);
    taskBodyList.appendChild(deadline);
    deadline.appendChild(deadlineIcon);
    deadline.appendChild(deadlineText);
    taskBodyList.appendChild(user);
    user.appendChild(userIcon);
    user.appendChild(userText);

    // set titles so you can query for the elements
    reminder.title = 'reminder';
    reminderIcon.title = 'Erinnerung';
    reminderText.title = 'Erinnerungsdatum';
    deadline.title = 'Deadline';
    deadlineText.title = 'Deadlinedatum';
    userIcon.title = 'User';
    userText.title = 'Username';

    taskBody.classList.add('card-body');
    taskBodyList.classList.add('list-group', 'list-group-flush');
    deadlineIcon.classList.add('fa-clock');
    deadlineIcon.title = 'Deadline';
    userIcon.classList.add('fa-user');
    userText.innerText = taskData['username'];
    // generate task footer
    const taskFooter = document.createElement('div');
    const editBtn = document.createElement('button');
    const delBtn = document.createElement('button');
    const btnGrp = document.createElement('div');
    task.appendChild(taskFooter);
    btnGrp.appendChild(editBtn);
    btnGrp.appendChild(delBtn);
    taskFooter.appendChild(btnGrp);
    taskFooter.classList.add('card-footer', 'text-center');
    btnGrp.classList.add('btn-group', 'd-md-none');
    editBtn.type = 'button';
    delBtn.type = 'button';
    editBtn.classList.add('btn', 'btn-sm', 'btn-info')
    delBtn.classList.add('btn', 'btn-sm', 'btn-danger')
    editBtn.innerHTML = '<i class="fa-solid fa-pen-to-square"></i>';
    delBtn.innerHTML = '<i class="fa-solid fa-eraser"></i>';
    editBtn.addEventListener('click', () => {
        showModal(modalTask, MODE_EDIT, taskData['id']);
    })
    delBtn.addEventListener('click', () => {
        showModal(modalTask, MODE_DELETE, taskData['id']);
    })
    // fill task with data
    updateTask(task, taskData);
    return task;
}

function updateTasksOfContainer(taskContainer, taskDataArray) {
    for (const taskData of taskDataArray) {
        const task = document.getElementById('task_' + taskData['id']);
        if (!task) {
            taskContainer.appendChild(createTask(taskData));
        } else {
            updateTask(task, taskData);
            taskContainer.appendChild(task);
        }
    }
    sortTasks(taskContainer);
}

function createColumn(columnData) {
    const column = document.createElement('div');
    const columnTitle = document.createElement('div');
    const taskContainer = document.createElement('div');
    const columnFooter = document.createElement('div');
    const colFootBtn = document.createElement('button');
    column.appendChild(columnTitle);
    column.appendChild(taskContainer);
    column.appendChild(columnFooter);
    columnFooter.appendChild(colFootBtn);
    // set column id, task container id and columnTitle so you can query them easily
    column.id = 'column_' + columnData['columnId'];
    taskContainer.id = 'tasksContainerColumn_' + columnData['columnId'];
    columnTitle.title = 'Spaltenname';


    column.classList.add('card', 'columnContainer', 'overflow-y-scroll');
    columnTitle.classList.add('card-header', 'card-title', 'text-center', 'fs-4');
    columnTitle.innerText = columnData['columnName'];

    columnFooter.classList.add('card-footer', 'text-center');
    columnFooter.classList.add('btn', 'btn-primary');
    columnFooter.innerHTML = '<i class="fa-solid fa-plus"></i>';
    columnFooter.addEventListener('click', () => {
        showModal(modalTask, MODE_NEW, columnData['columnId']);
    })
    taskContainer.classList.add('card-body');
    taskContainer.dataset.columnId = columnData['columnId'];
    drake.containers.push(taskContainer);
    return column;
}

function updateColumn(columnData) {
    const boardView = document.getElementById('tasksContainer');
    if (!document.getElementById('column_' + columnData['columnId'])) {
        boardView.appendChild(createColumn(columnData));
    }
    const taskContainer = document.getElementById('tasksContainerColumn_' + columnData['columnId']);
    updateTasksOfContainer(taskContainer, columnData['tasks']);
    sortTasks(taskContainer);
}

function createTaskView() {
    const boardId = document.getElementById('boardSelector').value
    fetch(REQ_HEADER_TASKS, {
        body: JSON.stringify({
            boardId: boardId,
            mode: MODE_QUERY
        })
    }).then((response) => {
        return response.json();
    }).then((data) => {
        for (const columnId in data) {
            updateColumn(data[columnId]);
        }
    });
}


function removeTableRow(rowId) {
    const row = document.getElementById('tableRow_' + rowId);
    if (row) {
        row.remove();
    }
}

function updateTableRow(rowElem, rowData) {
    const rowFields = Array.from(rowElem.querySelectorAll('[data-table-bind]'))
    rowFields.forEach(rf => {
        rf.innerText = rowData[rf.dataset.tableBind];
    });
}

function createTableRow(rowData, modal) {
    const resRow = document.getElementById('templateRow').cloneNode(true);
    const rowActions = Array.from(resRow.querySelectorAll('[data-table-action]'));
    resRow.hidden = false;
    resRow.setAttribute('aria-hidden', 'false');
    resRow.id = 'tableRow_' + rowData['id'];
    updateTableRow(resRow, rowData);
    rowActions.forEach(ra => {
        switch (ra.dataset.tableAction) {
            case 'buttons':
                const btnGrp = document.createElement('div');
                const editBtn = document.createElement('button');
                const delBtn = document.createElement('button');
                ra.appendChild(btnGrp);
                btnGrp.appendChild(editBtn);
                btnGrp.appendChild(delBtn);
                btnGrp.classList.add('btn-group', 'd-md-none');
                editBtn.type = 'button';
                delBtn.type = 'button';
                editBtn.classList.add('btn', 'btn-sm', 'btn-info')
                delBtn.classList.add('btn', 'btn-sm', 'btn-danger')
                editBtn.innerHTML = '<i class="fa-solid fa-pen-to-square"></i>';
                delBtn.innerHTML = '<i class="fa-solid fa-eraser"></i>';
                editBtn.addEventListener('click', () => {
                    showModal(modal, MODE_EDIT, rowData['id']);
                })
                delBtn.addEventListener('click', () => {
                    showModal(modal, MODE_DELETE, rowData['id']);
                })
                break;
        }
    });
    return resRow;
}

function createTable(type, modal) {
    const reqHeader = getReqHeader(type)
    fetch(reqHeader, {
        body: JSON.stringify({
            mode: MODE_QUERY,
        })
    }).then((response) => {
        return response.json();
    }).then(data => {
        const tableBody = document.getElementById(TABLE_BODY_ID);
        for (const id in data) {
            tableBody.appendChild(createTableRow(data[id], modal));
        }
    })
}

function genModalForm(type, modal) {
    document.forms[MODAL_FORM_ID].addEventListener('submit', (event) => {
        event.preventDefault();
        // TODO do something here to show user that form is being submitted
        const formData = {};
        const reqHeader = getReqHeader(type);
        new FormData(event.target).forEach((value, key) => {
            formData[key] = value;
        });
        fetch(reqHeader, {
            method: 'POST',
            body: JSON.stringify({
                mode: event.target.dataset.mode,
                formData: formData
            })
        }).then((response) => {
            if (!response.ok) {
                console.log(response)
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        }).then((data) => {
            if (data['success'] === true) {
                if (type === 'tasks') {
                    if (data['mode'] === MODE_DELETE) {
                        removeTask(data['id']);
                    } else {
                        const taskContainer = document.getElementById('tasksContainerColumn_' + data['taskData']['spaltenid']);
                        if (data['mode'] === MODE_NEW) {
                            taskContainer.appendChild(createTask(data['taskData']));
                        } else {
                            const task = document.getElementById('task_' + data['id']);
                            updateTask(task, data['taskData']);
                            taskContainer.appendChild(task);
                        }
                        sortTasks(taskContainer);
                    }
                } else if (type === 'boards') {
                    if (data['mode'] === MODE_DELETE) {
                        removeTableRow(data['id']);
                    } else {
                        const rowContainer = document.getElementById(TABLE_BODY_ID);
                        if (data['mode'] === MODE_NEW) {
                            rowContainer.appendChild(createTableRow(data['rowData'], modal));
                        } else {
                            const row = document.getElementById('tableRow_' + data['id']);
                            console.log(data);
                            console.log('tableRow_' + data['id']);
                            updateTableRow(
                                row,
                                data['rowData']
                            );
                        }
                    }
                }
                modal.hide();
            } else {
                MODAL_FORMFIELDS_NAMES.forEach(formField => {
                    document.getElementById(formField).classList.toggle('is-invalid', formField in data['errors'])
                    document.getElementById(formField + '_invalid').innerText = data['errors'][formField]
                })
            }
        }).catch((error) => {
            // TODO handle error
            console.log(error);
        });
    });
    MODAL_FORMFIELDS_NAMES.forEach(e => {
        const checkbox = document.getElementById(e);
        if (checkbox.dataset.inputControl) {
            const inputField = document.getElementById(checkbox.dataset.inputControl);
            checkbox.addEventListener('change', (event) => {
                inputField.disabled = !event.target.checked;
            });
        }
    })
}

function showModal(modalEle, mode, elemid) {
    const modalHeadline = document.getElementById(MODAL_HEADLINE_ID);
    const modalForm = document.getElementById(MODAL_FORM_ID);
    const formButton = document.getElementById(MODAL_SUBMIT_ID);
    const formFields = document.getElementById(MODAL_FORMFIELDS_ID);
    document.getElementById('id').disabled = false;
    formFields.disabled = false;
    MODAL_FORMFIELDS_NAMES.forEach(formField => {
        document.getElementById(formField).classList.toggle('is-invalid', false)
        document.getElementById(formField + '_invalid').innerText = ''
    })
    modalForm.reset()

    modalForm.dataset.mode = mode;
    switch (mode) {
        case MODE_NEW:
            document.getElementById('id').disabled = true;
            modalHeadline.innerText = 'Neu'
            formButton.className = 'btn btn-success'
            formButton.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Speichern'
            MODAL_FORMFIELDS_NAMES.forEach(e => {
                const checkbox = document.getElementById(e);
                if (checkbox.dataset.inputControl) {
                    const inputField = document.getElementById(checkbox.dataset.inputControl);
                    inputField.disabled = !checkbox.checked;
                }
            });
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
        if (mode === MODE_NEW) {
            document.getElementById('spaltenid').value = elemid;
        } else {
            const reqHeader = getReqHeader(modalForm.dataset.type);
            const reqBody = createQueryRequestBody(modalForm.dataset.type, elemid)
            fetch(reqHeader, {body: reqBody}
            ).then((response) => {
                return response.json()
            }).then((data) => {
                Object.entries(data).forEach(entry => {
                    const inputField = document.getElementById(entry[0])
                    if (inputField) {
                        if (inputField.type === 'checkbox') {
                            inputField.checked = entry[1] === '1';
                        } else {
                            inputField.value = entry[1];
                        }
                        if (inputField.dataset.inputControl) {
                            console.log(inputField)
                            const controlledField = document.getElementById(inputField.dataset.inputControl);
                            controlledField.disabled = !inputField.checked;
                        }
                    }
                })
            })
        }
    }
    modalEle.show();
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