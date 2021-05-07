<?php 
require_once(dirname(__FILE__).'/../DBManager.php');
//require_once('../DBManager.php');
//require_once('/home/xavi/Documents/zona27/db/DBManager.php');
/**
 * id
 * red
 * id_artista
 * link
 * 
 */
function añadirRedes($nombre, $id_artista, $link){
    $manager = new DBzona();
    $sql = "INSERT INTO redes (id_red, id_artista, url_red) VALUES (:nombre, :id_artista, :link)";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->bindParam(':nombre',$nombre);
    $stmt->bindParam(':id_artista',$id_artista);
    $stmt->bindParam(':link',$link);
    if($stmt->execute()){
        echo "ok";
    } else {
        echo "mal";
    }
    
}
function modificarRed($id, $link){
    $manager = new DBzona();
    $sql = "UPDATE redes SET url_red=:link WHERE id=:id";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':link',$link);
    if($stmt->execute()){
        echo "ok";
    } else {
        echo "mal";
    }
    
}
function eliminarRed($id){
    $manager = new DBzona();
    $sql = "DELETE FROM redes WHERE id=:id";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->bindParam(':id',$id);
    if($stmt->execute()){
        echo "ok";
    } else {
        echo "mal";
    }
    
}
function gett(){
    $manager = new DBzona();
    $sql = "SELECT * FROM redes";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    
}
function getAllNombreRedes(){
    $manager = new DBzona();
    $sql = "SELECT * FROM categoria_redes";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    
}
function getAllRedes (){
    //SELECT e.id, c.nombre AS id_red, d.nombre AS id_artista, e.url_red from redes e, categoria_redes c, artista d where e.id_red = c.id AND e.id_artista = d.id
    //SELECT e.id, c.nombre AS id_red, e.id_artista, e.url_red from redes e, categoria_redes c where e.id_red = c.id
    $manager = new DBzona();
    $sql = "SELECT e.id, c.nombre AS id_red, e.id_artista, e.url_red from redes e, categoria_redes c where e.id_red = c.id";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
//añadirRedes(1, 1, "https://www.instagram.com/zona27tattoo/");
//modificarRed(1, "https://www.instagram.com/zona27tattoo/");
//eliminarRed(1);
//print_r(getAllRedes());
//print_r(getAllNombreRedes());
//print_r(gett());
?>