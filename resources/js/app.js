//require('./bootstrap')

async function handleAddCompanyForm(e, form) {
    e.preventDefault()

    let response = await fetch(form.action, {
        method: 'POST',
        credentials: 'same-origin',
        'headers': {
            'X-Requested-With': 'XMLHttpRequest'
        },  
        body: new FormData(form)
    })

    if(response.status == 422) {
        let result = await response.json()
        if(result.length == 0) {
            return
        }

        form.querySelectorAll('.alert').forEach(e => e.remove())
        form.prepend(createAlert(result))
        
    } else if(response.status == 200) {
        let result = await response.json()

        form.querySelectorAll('.alert').forEach(e => e.remove())
        document.getElementById('cardsContainer').append(createCard(result))

        let collapse = new bootstrap.Collapse(document.getElementById('addCompanyBlock'))
        console.log(collapse)
        collapse.hide()

    }

}

function createCard(data) {
    let card = document.querySelector('.card.w-500')
    card = card.cloneNode(true)

    let col = document.createElement('div')
    col.classList.add('col-md-3')
    col.classList.add('g-3')

    //set data
    let body = card.querySelector('.card-body')
    body.querySelector('.card-title').innerHTML = data.name
    body.querySelector('.card-text').innerHTML = data.description
    body.querySelector('.btn').href = `/company/${data.id}`

    col.append(card)
    return col
}

function createAlert(errors, level = 'alert-danger') {

    let alertDiv = document.createElement('div')
    alertDiv.classList.add('alert')
    alertDiv.classList.add(level)

    let ul = document.createElement('ul')

    errors.forEach(err => {
        let li = document.createElement('li')
        li.innerHTML = err
        ul.append(li)
    })

    alertDiv.append(ul)
    return alertDiv
}

window.handleAddCompanyForm = handleAddCompanyForm