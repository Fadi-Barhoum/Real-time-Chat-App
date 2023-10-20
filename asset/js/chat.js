const
    form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input_field"),
    sendBtn = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");

form.addEventListener("submit", (e) => {
    e.preventDefault();
})
    
sendBtn.addEventListener("click", () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/insert_messages.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE){
            if (xhr.status === 200){
                inputField.value = "";
                scrollToBottom();
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
})

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/get_chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE){
            if (xhr.status === 200){
                let data = xhr.response; 
                chatBox.innerHTML = data;
                if (!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
},500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}

chatBox.addEventListener("mouseenter", ()=>{
    chatBox.classList.add("active");
});

chatBox.addEventListener("mouseleave", ()=>{
    chatBox.classList.remove("active");
});
