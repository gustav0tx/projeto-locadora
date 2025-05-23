const checkBox = document.getElementById('showPass')
const input = document.getElementById('passwd')
checkBox.addEventListener('click',() => {
    if(checkBox.checked) {
        input.type = 'text'
    } else {
        input.type = 'password'
    }
})