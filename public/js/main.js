// para verificar la contraseña
let contrasenaInput = document.getElementById("contrasena");
let confirmarContrasenaInput = document.getElementById("confirmar_contrasena");
let messageSpan = document.getElementById("message");
let registroBtn = document.getElementById("registroBtn");
let urlRegistro = FrmUser.getAttribute('action');

confirmarContrasenaInput.addEventListener("input", function() {
    if (confirmarContrasenaInput.value === contrasenaInput.value) {
        messageSpan.innerHTML = "Las contraseñas coinciden.";
        messageSpan.style.color = "green";
    } else {
        messageSpan.innerHTML = "Las contraseñas no coinciden.";
        messageSpan.style.color = "red";
    }
});

registroBtn.addEventListener("click", function(event) {
    event.preventDefault(); // aca envitamos que el formulario se envie sino coincide la contraseña

    if (confirmarContrasenaInput.value !== contrasenaInput.value) {
        alert("Las contraseñas no coinciden. Por favor, verifica.");
    }

    MakeRequestData( urlRegistro, '', true, '', 'POST', 5, '#FrmUser', false, true);
});


// Para hacer que no solamente se ingresen numero al telefono
document.getElementById("telefono").addEventListener("input", function(event) {
    let telefonoInput = event.target;
    let telefono = telefonoInput.value.trim();

    // Expresión regular para validar el formato del teléfono
    let regex = /^\(\d+\)\s\d+-\d+$/;

    if (regex.test(telefono)) {
        telefonoInput.setCustomValidity("");
    } else {
        telefonoInput.setCustomValidity("Teléfono inválido");
    }
});
