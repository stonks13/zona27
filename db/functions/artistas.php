<?php 
require_once(dirname(__FILE__).'/../DBManager.php');
//require_once('../DBManager.php');
//require_once('/home/xavi/Documents/zona27/db/DBManager.php');
/**
 * id
 * nombre
 * descripcion
 * img
 * 
 */
function aa($img){
    $imgContenido = addslashes(file_get_contents($img));
    echo $img;
}
function añadirArtista($nombre, $descripcion, $img){
    $manager = new DBzona();
    $sql = "INSERT INTO artista (nombre, descripcion, img) VALUES (:nombre, :descripcion, :img)";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->bindParam(':nombre',$nombre);
    $stmt->bindParam(':descripcion',$descripcion);
    $stmt->bindParam(':img',$img);
    if($stmt->execute()){
        echo "ok";
    } else {
        echo "mal";
    }
    
}
function modificarArtista($id, $nombre, $descripcion, $img){
    $manager = new DBzona();
    $sql = "UPDATE artista SET nombre=:nombre, descripcion=:descripcion, img=:img WHERE id=:id";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':nombre',$nombre);
    $stmt->bindParam(':descripcion',$descripcion);
    $stmt->bindParam(':img',$img);
    if($stmt->execute()){
        echo "ok";
    } else {
        echo "mal";
    }
    
}
function eliminarArtista($id){
    $manager = new DBzona();
    $sql = "DELETE FROM artista WHERE id=:id";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->bindParam(':id',$id);
    if($stmt->execute()){
        echo "ok";
    } else {
        echo "mal";
    }
    
}
function getAllArtistas(){
    $manager = new DBzona();
    $sql = "SELECT * FROM artista";
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