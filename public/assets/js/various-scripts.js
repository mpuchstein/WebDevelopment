const MODE_NEW = 'new'
const MODE_EDIT = 'edit'
const MODE_DELETE = 'delete'

function tasksComparator(a, b) {
    if (a.dataset.sortId < b.dataset.sortId)
        return -1;
    if (a.dataset.sortId > b.dataset.sortId)
        return 1;
    return 0;
}

function sortTasks(taskContainer) {
    const tasks = taskContainer.querySelectorAll("[data-sort-id]");
    const tasksArray = Array.from(tasks);
    let sorted = tasksArray.sort(tasksComparator);
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
    taskElem.dataset.sortId = taskData['sortId'];
    const taskTitle = taskElem.querySelector('.card-header').querySelector('[title="Taskname"]');
    const reminder = taskElem.querySelector('[title="reminder"]');
    const reminderIcon = taskElem.querySelector('[title="Erinnerung"]');
    const reminderText = taskElem.querySelector('[title="Erinnerungsdatum"]');
    const deadline = taskElem.querySelector('[title="Deadline"]');
    const deadlineText = taskElem.querySelector('[title="Deadlinedatum"]');
    const userText = taskElem.querySelector('[title="Username"]');
    taskTitle.innerHTML = taskData['icon'] + '<span class="ms-4">' + taskData['task'] + '</span>';
    userText.innerText = taskData['username'];
    if (taskData['erinnerung'] === '1') {
        reminderIcon.classList.add('fa-bell');
        reminderText.innerText = taskData['erinnerungsdatum']
        if (Date.parse(taskData['erinnerungsdatum']) - DATE_NOW < 24 * 3600) {
            reminder.classList.toggle('bg-danger', true);
        } else {
            reminder.classList.toggle('bg-danger', false);
        }
    } else {
        reminderIcon.classList.add('fa-bell-slash');
        reminderText.innerText = 'Keine Erinnerung';
    }
    deadlineText.innerText = taskData['deadline'];
    if (Date.parse(taskData['deadline']) - DATE_NOW < 0) {
        deadline.classList.add('bg-danger-subtle');
    } else if (Date.parse(taskData['deadline']) - DATE_NOW < 24 * 3600) {
        deadline.classList.add('bg-danger');
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
        showModal(REQ_URL_EDIT, MODE_EDIT, taskData['id']);
    })
    delDrpLi.addEventListener('click', () => {
        showModal(REQ_URL_DELETE, MODE_DELETE, taskData['id']);
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
        showModal(REQ_URL_NEW, MODE_NEW, -1);
    })
    taskContainer.classList.add('card-body');
    return column;
}

function crudColumn(columnData) {
    const boardView = document.getElementById('tasksContainer');
    if (!document.getElementById('column_' + columnData['columnId'])) {
        boardView.appendChild(createColumn(columnData));
    }
    const taskContainer = document.getElementById('tasksContainerColumn_' + columnData['columnId']);
    updateTasksOfContainer(taskContainer, columnData['tasks']);
}

function createTaskView() {
    const boardId = document.getElementById('boardSelector').value
    fetch(REQ_TASK_HEADER, {
        body: JSON.stringify({boardId: boardId})
    }).then((response) => {
        return response.json()
    }).then((data) => {
        for (const columnId in data) {
            crudColumn(data[columnId]);
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

function genModalForm_new() {
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
                if (data['mode'] === MODE_DELETE) {
                    removeTask(data['id']);
                } else {
                    const taskContainer = document.getElementById('tasksContainerColumn_' + data['taskData']['spaltenid']);
                    if (data['mode'] === MODE_NEW) {
                        taskContainer.appendChild(createTask(data['taskData']));
                    } else {
                        const task = document.getElementById('task_' + data['id']);
                        updateTask(
                            task,
                            data['taskData']
                        );
                        taskContainer.appendChild(task);
                    }
                    sortTasks(taskContainer);
                }
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