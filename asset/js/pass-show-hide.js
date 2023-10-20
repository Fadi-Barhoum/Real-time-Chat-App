const 
password = document.querySelector(".field input[type='password']"),
toggleBtn = document.querySelector(".form .field i");

toggleBtn.addEventListener("click", ()=>{
    if (password.type == "password"){
        password.type = "text";
        toggleBtn.classList.add("show");
    }else{
        password.type = "password";
        toggleBtn.classList.remove("show");
    }
});