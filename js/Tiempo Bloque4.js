var segundoInicio = 750;

function actualizar(){
    if(segundoInicio == 0){
        alert("¡Ya esta por terminar tu tiempo!");
    }else{
        segundoInicio = segundoInicio - 1;
        setTimeout(actualizar,1E3);
    }
}

actualizar();