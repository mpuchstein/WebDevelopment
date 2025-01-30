function fillForm(baseurl, type, id){
    const modalHeadline = document.getElementById('formHeadline')
    const modalForm = document.getElementById('modalForm')
    const formButton = document.getElementById('formSubmit')
    document.getElementById('id').disabled = false
    document.getElementById('board').disabled = false
    modalForm.reset()
    modalForm.action=baseurl+type

    switch (type) {
        case "new":
            modalHeadline.innerHTML = 'Neu'
            formButton.class='btn btn-success'
            formButton.innerHTML='<i class="fa-solid fa-floppy-disk"></i> Speichern'
            break
        case "edit":
            modalHeadline.innerHTML = 'Bearbeiten'
            formButton.class='btn btn-info'
            formButton.innerHTML='<i class="fa-solid fa-floppy-disk"></i> Editieren'
            fetch(baseurl + 'json/' + id).then((response) => {
                return response.json()
            }).then((json) => {
                Object.entries(json).forEach(entry => {
                    const inputField = document.getElementById(entry[0])
                    if (inputField) {
                        inputField.value = entry[1]
                    }
                })
            })
            break
        case "delete":
            modalHeadline.innerHTML = 'Löschen'
            formButton.class='btn btn-danger'
            formButton.innerHTML='<i class="fa-solid fa-eraser"></i> Löschen'
            fetch(baseurl + 'json/' + id).then((response) => {
                return response.json()
            }).then((json) => {
                Object.entries(json).forEach(entry => {
                    const inputField = document.getElementById(entry[0])
                    if (inputField) {
                        inputField.disabled = true
                        inputField.value = entry[1]
                    }
                })
                document.getElementById('id').disabled = false
            })
            break
    }
    $('#boardsForm').modal('show')
}