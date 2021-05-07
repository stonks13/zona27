function fileSelector(file){
    var filename = '';
    var span = document.getElementById("spanFileName");
    if (file.files.length != 0){
        filename = file.files[0].name;
        span.innerHTML = filename;
    } else {
        filename = "Selecciona una imagen...";
        span.innerHTML = filename;
        file = '';
    }
    
}

function desplegable(id){

}

function filtrarSeleccionados(classSelected){
    var arrayClases = document.getElementsByClassName("filterDiv");
    if(classSelected == "all") classSelected = "";
    for (let index = 0; index < arrayClases.length; index++) {
        removerSelect(arrayClases[index], "show");
        if (arrayClases[index].className.indexOf(classSelected) > -1) añadirSelect(arrayClases[index], "show");
    }
}

function removerSelect(clase, nombreClase){
    var arr1, arr2;
    arr1 = clase.className.split(" ");
    arr2 = nombreClase.split(" ");
    for (let index = 0; index < arr2.length; index++) {
      while (arr1.indexOf(arr2[index]) > -1) {
        arr1.splice(arr1.indexOf(arr2[index]), 1);     
      }
    }
    clase.className = arr1.join(" ");
}
function añadirSelect(clase, nombreClase){
    var arr1, arr2;
    arr1 = clase.className.split(" ");
    arr2 = nombreClase.split(" ");
    for (let index = 0; index < arr2.length; index++) {
      if (arr1.indexOf(arr2[index]) == -1) {clase.className += " " + arr2[index];}
    }
}
