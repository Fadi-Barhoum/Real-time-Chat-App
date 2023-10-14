const
    form = document.querySelector(".signup form"),
    continueBtn = form.querySelector(".button input");

form.addEventListener("submit", (e) => {
    e.preventDefault();
})
    
continueBtn.addEventListener("click", () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/signup.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE){
            let data = xhr.response;
            console.log(data);
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
})