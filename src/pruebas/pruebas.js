function desplegar(id){
    var objeto = document.getElementById(id).parentNode;
    if (objeto.style.display == "none"){
        objeto.style.display = "block";
    } else {
        objeto.style.display = "none";
    }
}

function desplegarSelect(){
    var optionvalue = document.getElementById("aa").value;
    var objeto = document.getElementById(optionvalue).parentNode;
    
    if (objeto.style.display == "none"){
        objeto.style.display = "block";
    } else {
        objeto.style.display = "none";
    }

}