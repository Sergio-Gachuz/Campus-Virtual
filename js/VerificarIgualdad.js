let iguales = document.getElementById("iguales");

function verificarPasswords(){
    let pass1 = document.getElementById('#pass1').value;
    let pass2 = document.getElementById('#pass2').value;

    if (pass1 != pass2) {
        iguales.textContent = "No coincide.";
    } else {
        iguales.textContent = "La contraseña coincide.";
    }
}