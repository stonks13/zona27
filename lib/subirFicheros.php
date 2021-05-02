<?php 

function guardarImagen($tipo){ //tipo = artista, tattoos, piercings...
    
	$extension = $_FILES["image"]["type"];
	$extensiones_aceptadas = array("image/JPG", "image/png", "image/jpeg");
	$encontrado = array_search($extension, $extensiones_aceptadas, true);

    $directorio = "/home/xavi/Documents/zona27/imagenes/".$tipo."/";
    
    $fecha = date("d-m-o_H:i:s");
    if($encontrado!=false){
        $extension = explode("/", $extension);
        $extension = $extension[1];
		if(is_uploaded_file($_FILES["image"]["tmp_name"])){
            $ruta = $fecha.".".$extension;
			move_uploaded_file($_FILES["image"]["tmp_name"], $directorio.$ruta);
			//echo $directorio.$fecha.".".$extension; //Imagen subida
            return $ruta;            
		}
		else{
			return 1; //Error al subir la imagen
		}
	}
	else{
		return 2; //Extensión no válida
	}
}

 
?>