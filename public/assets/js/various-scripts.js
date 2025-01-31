const tablebtn =
    '<td>' +
    '<div class="btn-group">' +
    '<button type="button" id="%id%_edit"class="btn btn-sm btn-info" data-bs-target="#%formid%"' +
    '><i class="fa-solid fa-pen-to-square"></i>' +
    '</button>' +
    '<button type="button" id="%id%_delete" class="btn btn-sm btn-danger" data-bs-target="#%formid%"' +
    '><i class="fa-solid fa-eraser"></i>' +
    '</button>' +
    '</div>' +
    '</td>'

function genModalForm() {
    document.forms[modalformid].addEventListener('submit', (event) => {
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
            // TODO handle body
            if (data['success'] === true) {
                updateTable()
                $(modalid).modal('hide')
            } else {
                formfieldsnames.forEach(formField => {
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

function updateTable() {
    let tableRows = ''
    const rowButtons = tablebtn.replaceAll('%formid%', modalformid)
    fetch(requrljson).then((response) => {
        return response.json()
    }).then((data) => {
        for (const row of data) {
            tableRows += '<tr>'
            for (const tid of theadids) {
                tableRows += '<td>' + row[tid] + '</td>'
            }
            tableRows += rowButtons.replaceAll('%id%', row['id']);
            tableRows += '</tr>'
        }
        document.getElementById(tablebodyid).innerHTML = tableRows
        for (const row of data) {
            const elemid = row['id']
            const editid = elemid + '_edit'
            const delid = elemid + '_delete'
            const editBtn = document.getElementById(editid)
            const delBtn = document.getElementById(delid)
            editBtn.addEventListener('click', () => {
                showModal(requrledit, modeedit, elemid)
            })
            delBtn.addEventListener('click', () => {
                showModal(requrldelete, modedelete, elemid)
            })
        }
    })
}

function showModal(requrl, mode, elemid) {
    const modalHeadline = document.getElementById(modalheadlineid)
    const modalForm = document.getElementById(modalformid)
    const formButton = document.getElementById(modalsubmitid)
    const formFields = document.getElementById(modalformfieldsid)
    formFields.disabled = false
    formfieldsnames.forEach(formField => {
        document.getElementById(formField).classList.toggle('is-invalid', false)
        document.getElementById(formField+'_invalid').innerText = ''
    })
    modalForm.reset()
    modalForm.action = requrl

    switch (mode) {
        case modenew:
            modalHeadline.innerText = 'Neu'
            formButton.className = 'btn btn-success'
            formButton.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Speichern'
            break
        case modeedit:
            modalHeadline.innerText = 'Bearbeiten'
            formButton.className = 'btn btn-info'
            formButton.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Editieren'
            break;
        case modedelete:
            modalHeadline.innerText = 'Löschen'
            formButton.className = 'btn btn-danger'
            formButton.innerHTML = '<i class="fa-solid fa-eraser"></i> Löschen'
            formFields.disabled = true
            break;
    }
    if (elemid > 0) {
        fetch(requrljson + '/' + elemid).then((response) => {
            return response.json()
        }).then((data) => {
            console.log(data)
            Object.entries(data).forEach(entry => {
                const inputField = document.getElementById(entry[0])
                if (inputField) {
                    inputField.value = entry[1]
                }
            })
        })
    }

    $(modalid).modal('show');
}