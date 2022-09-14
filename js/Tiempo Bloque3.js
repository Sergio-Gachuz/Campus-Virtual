var segundoInicio = 180;

function actualizar(){
    if(segundoInicio == 0){
        alert("Tu tiempo se acabo");
        window.location.assign("index.php");
    }else{
        segundoInicio = segundoInicio - 1;
        setTimeout(actualizar,1E3);
    }
}

actualizar();