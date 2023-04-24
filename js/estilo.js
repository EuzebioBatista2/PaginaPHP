const inputs = document.getElementsByClassName('input-form')
for(let input of inputs) {
    input.addEventListener("blur", function() {
        if(input.value != "") {
            input.classList.add("active")
        } else {
            input.classList.remove("active")
        }
    })
}