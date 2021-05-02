<?php 
require_once(dirname(__FILE__).'/../DBManager.php');
//require_once('../DBManager.php');
//require_once('/home/xavi/Documents/zona27/db/DBManager.php');
/**
 * id
 * img
 * titulo
 * etiqueta
 * activo
 * id_categoria
 * id_artista
 * 
 */
function añadirPiercings($img, $titulo, $etiqueta, $id_categoria, $id_artista, $descripcion = ""){
    $manager = new DBzona();
    $sql = "INSERT INTO piercings (img, titulo, etiqueta, id_categoria, id_artista, descripcion) VALUES (:img, :titulo, :etiqueta, :id_categoria, :id_artista, :descripcion)";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->bindParam(':img',$img);
    $stmt->bindParam(':titulo',$titulo);
    $stmt->bindParam(':etiqueta',$etiqueta);
    $stmt->bindParam(':id_categoria',$id_categoria);
    $stmt->bindParam(':id_artista',$id_artista);
    $stmt->bindParam(':descripcion',$descripcion);
    if($stmt->execute()){
        echo "ok";
    } else {
        echo "mal";
    }
    
}

//solo podran modificar el titulo, etiquetas, descripcion, e imagenes (por definir si pueden o no.)
function modificarPiercings($id, $img, $titulo, $etiqueta, $descripcion = ""){
    $manager = new DBzona();
    $sql = "UPDATE piercings SET img=:img, titulo=:titulo, etiqueta=:etiqueta, descripcion=:descripcion WHERE id=:id";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':img',$img);
    $stmt->bindParam(':titulo',$titulo);
    $stmt->bindParam(':etiqueta',$etiqueta);
    $stmt->bindParam(':descripcion',$descripcion);
    if($stmt->execute()){
        echo "ok";
    } else {
        echo "mal";
    }
    
}

//hace visible o invisible las imagenes.
function activoPiercing($id, $activo){
    $manager = new DBzona();
    $sql = "UPDATE piercings SET activo=:activo WHERE id=:id";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':activo',$activo);
    if($stmt->execute()){
        echo "ok";
    } else {
        echo "mal";
    }
}

function eliminarPiercings($id){
    $manager = new DBzona();
    $sql = "DELETE FROM piercings WHERE id=:id";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->bindParam(':id',$id);
    if($stmt->execute()){
        echo "ok";
    } else {
        echo "mal";
    }
    
}

function getAllPiercings(){
    $manager = new DBzona();
    $sql = "SELECT * FROM piercings";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    
}

//devuelve todas las Categoria de piercings
function getAllPiercingsCategoria(){
    $manager = new DBzona();
    $sql = "SELECT * FROM categoria_piercings";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//añadirArtista("xavi2", "guapisimo", "");
//modificarArtista(3, "xavier", "guapisimo", "");
//eliminarArtista(10);
//print_r(getAllArtistas());
?>