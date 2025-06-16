const search = document.getElementById('search')
const container = document.getElementById('container')
const movies = [container.children[0], container.children[1], container.children[2]]
const menuBtn = document.getElementById('menu')

search.addEventListener('focus', () => {
    movies.forEach((el) => {
        el.remove()
    })

    const divSearch = document.createElement('div')
    const title = document.createElement('h2')
    const divResult = document.createElement('div')

    divResult.id = 'result'
    divResult.classList.add('result')

    title.innerText = 'Pesquisa...'
    title.classList.add('title-search')

    divSearch.classList.add('search-area')

    divSearch.append(title, divResult)
    container.append(divSearch)
})

search.addEventListener('focusout', () => {
    const divSearch = document.querySelector('.search-area')
    divSearch.remove()

    movies.forEach((el) => {
        container.append(el)
    })
})

search.addEventListener('input', () => {
    const searchValue = search.value
    const nameMovies = []
    const divMovies = []

    movies.forEach((el) => {
        const posters = el.children[1]
        for (let i = 0; i < 12; i++) {
            let namePosters = posters.children[i].children[1].innerText.toLowerCase()
            nameMovies.push(namePosters)

            let divPosters = posters.children[i].cloneNode(true)
            divMovies.push(divPosters)
        }
    })

    divMovies.map((el, i) => {
        el.id = i++
    })

    const divResult = document.getElementById('result')

    divResult.innerHTML = ''

    for (let i = 0; i < 36; i++) {
        if (nameMovies[i].normalize('NFD').includes(searchValue.toLowerCase().normalize('NFD')) && searchValue != '' && !document.getElementById(`${i}`)) {
            divResult.append(divMovies[i])
        }
    }
})

menuBtn.addEventListener('click', () => {
    
    if (!document.getElementById('menuCategories')) {
        const movies = []
        for (let i = 0; i < 3; i++) {
            movies.push(container.children[i])
        }
    
        const divCategories = document.createElement('div')
        divCategories.classList.add('menu-categories')
        divCategories.id = 'menuCategories'

        const btnFantasia = document.createElement('button')
        btnFantasia.innerHTML = '<strong>Fantasia</strong>'
        btnFantasia.addEventListener('click', () => {
            for(let i = 0; i < 2; i++){
                container.children[1].remove()
            }
        })

        const btnSuspense = document.createElement('button')
        btnSuspense.innerHTML = '<strong>Suspense</strong>'
        btnSuspense.addEventListener('click', () => {
            container.children[0].remove()
            container.children[1].remove()
        })

        const btnAção = document.createElement('button')
        btnAção.innerHTML = '<strong>Ação</strong>'
        btnAção.addEventListener('click', () => {
            for(let i = 0; i < 2; i++){
                container.children[0].remove()
            }
        })

        const divAreaBntRemove = document.createElement('div')
        divAreaBntRemove.classList.add('area-button-remove')

        const btnRemove = document.createElement('button')
        btnRemove.innerHTML = '&#215'
        btnRemove.addEventListener('click', () => {
            divCategories.remove()
        })

        const bntInicio = document.createElement('button')
        bntInicio.innerHTML = 'Inicio'
        bntInicio.addEventListener('click', () => {
            container.children[0].remove();
            movies.forEach((el) => {
                container.append(el)
            })
        })

        divAreaBntRemove.append(btnRemove)
        divCategories.append(divAreaBntRemove, btnFantasia, btnSuspense, btnAção, bntInicio)
        document.body.append(divCategories)

    }
})