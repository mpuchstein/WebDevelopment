const crudModal = new bootstrap.Modal(
    document.getElementById('crudModal'),
    {
        backdrop: 'static', focus: true, keyboard: true
    })

function fillCrud(baseurl, type, id) {
    switch (type) {
        case "new":
            document.getElementById('crudTitle').innerHTML = 'Neu'
            document.getElementById('crudForm').reset()
            // crudModal.show()
            break
        case "edit":
            document.getElementById('crudTitle').innerHTML = 'Bearbeiten'
            fetch(baseurl + id).then((response) => {
                return response.json()
            }).then((json) => {
                Object.entries(json).forEach(entry => {
                    const inputField = document.getElementById(entry[0])
                    if (inputField) {
                        inputField.value = entry[1]
                    }
                })
            })
                // .then(() => crudModal.show())
            break
        case "delete":
            document.getElementById('crudTitle').innerHTML = 'Bearbeiten'
            fetch(baseurl + id).then((response) => {
                return response.json()
            }).then((json) => {
                Object.entries(json).forEach(entry => {
                    const inputField = document.getElementById(entry[0])
                    if (inputField) {
                        inputField.disabled = true
                        inputField.value = entry[1]
                    }
                })
            })
                // .then(() => crudModal.show())
            break
    }

}
