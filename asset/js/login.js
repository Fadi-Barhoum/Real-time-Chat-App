const 
form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.addEventListener("submit", (e) => {
    e.preventDefault();
})
    
continueBtn.addEventListener("click", () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/login.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE){
            let data = xhr.response;
            if (data == "Success"){
                location.href = "user.php";
            }else{
                errorText.textContent = data;
                errorText.style.display = "block";
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
})