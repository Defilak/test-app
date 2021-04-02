//require('./bootstrap')

async function handleAddCommentForm(e, form) {
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

        if(result.comment.company_type === null) {
            result.comment.company_type = ''
        }

        let comments = document.getElementById('commentsContainer_' + result.comment.company_type)
        comments.classList.remove('d-none')
        comments.innerHTML += createComment(result)

        let collapse = new bootstrap.Collapse(document.getElementById('collapse_' + result.comment.company_type))
        collapse.hide()
        console.log(form.querySelector('textarea'))
        form.querySelector('textarea').value = ''
    }
}

function createComment(data) {
    return `
        <div class="d-flex flex-colomn">
            <div class="comment p-2 mb-2">
                <p class="comment_user">
                    <a href="#">${data.name}</a>
                    :
                    <small>${data.comment.created_at}</small>
                </p>

                <p class="border comment_text p-2">${data.comment.text}</p>
            </div>
        </div>
        `
}

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
        collapse.hide()
    }
}

function createCard(data) {
    let card = `
    <div class="card w-500">
        <div class="card-body">
            <h5 class="card-title">${data.name}</h5>
            <p class="card-text">${data.description}</p>
            <a href="/company/${data.id}" class="btn btn-primary">Подробнее</a>
        </div>
    </div>
    `
    
    let col = document.createElement('div')
    col.classList.add('col-md-3')
    col.classList.add('g-3')
    col.innerHTML += card

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
window.handleAddCommentForm = handleAddCommentForm