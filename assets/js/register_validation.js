const fullname = document.getElementById("fullname");
const username = document.getElementById("username");
const email = document.getElementById("email");
const password = document.getElementById("password");
const register_form = document.getElementById("register_form");
const message = document.getElementById("msg_error");

register_form.addEventListener("submit", e=>{
    e.preventDefault();
    let msg_error ="";
    let entrar = false;
    let regexEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    
    if(fullname.value.length < 6){
        msg_error += "El nombre no es válido <br>";
        entrar = true;
    }
    if(username.value.length < 6){
        msg_error += "El nombre de usuario es demasiado corto <br>";
        entrar = true;
    }
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
