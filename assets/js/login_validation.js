const email = document.getElementById("email");
const password = document.getElementById("password");
const login_form = document.getElementById("login_form");
const message = document.getElementById("msg_error");

login_form.addEventListener("submit", e=>{
    e.preventDefault();
    let msg_error ="";
    let entrar = false;
    let regexEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    
    if (!regexEmail.test(email.value)) {
        msg_error += "La dirección de correo electrónico no es válida <br>";
        entrar = true;
    }
    if (password.value.length <8) {
        msg_error += "La contraseña no es válida <br>";
        entrar = true;
    }
    if(entrar){
        message.innerHTML = msg_error;
    }
})