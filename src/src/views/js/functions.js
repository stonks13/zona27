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
    var item = document.getElementById("desp_"+id);
    var clase = item.className.split(" ");
    if (clase[clase.length -1] == "active"){
        item.classList.remove("active");
    } else{
        item.classList.add("active");
    }
}

function filtrarSeleccionados(classSelected){
    var arrayClases = document.getElementsByClassName("filterDiv");
    if(classSelected == "all") {
        for (let index = 0; index < arrayClases.length; index++){
            removerSelect(arrayClases[index], "show");
            añadirSelect(arrayClases[index], "show");
        }
    } else {
        for (let index = 0; index < arrayClases.length; index++) {
            removerSelect(arrayClases[index], "show");
            var arr1 = arrayClases[index].className.split(" ");
            if (arrayClases[index].className.indexOf(classSelected) > -1 && arr1[arr1.length -1].length == classSelected.length) añadirSelect(arrayClases[index], "show");
        }
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

function addFrame(){
    var item = document.getElementById("add-frame");
    var clase = item.className.split(" ");
    if (clase[clase.length -1] == "add"){
        item.classList.remove("add");
    } else{
        item.classList.add("add");
    }
}