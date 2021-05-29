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
function añadirTattoo($img, $titulo, $etiqueta, $id_categoria, $id_artista){
    $manager = new DBzona();
    $sql = "INSERT INTO tattoos (img, titulo, etiqueta, id_categoria, id_artista) VALUES (:img, :titulo, :etiqueta, :id_categoria, :id_artista)";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->bindParam(':img',$img);
    $stmt->bindParam(':titulo',$titulo);
    $stmt->bindParam(':etiqueta',$etiqueta);
    $stmt->bindParam(':id_categoria',$id_categoria);
    $stmt->bindParam(':id_artista',$id_artista);
    if($stmt->execute()){
        echo "ok";
    } else {
        echo "mal";
    }
    
}

//solo podran modificar el titulo, etiquetas, e imagenes (por definir si pueden o no.)
function modificarTattoo($id, $titulo, $etiqueta){
    $manager = new DBzona();
    $sql = "UPDATE tattoos SET titulo=:titulo, etiqueta=:etiqueta WHERE id=:id";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':titulo',$titulo);
    $stmt->bindParam(':etiqueta',$etiqueta);
    if($stmt->execute()){
        echo "ok";
    } else {
        echo "mal";
    }
    
}

//hace visible o invisible las imagenes.
function activoTattoo($id, $activo){
    $manager = new DBzona();
    $sql = "UPDATE tattoos SET activo=:activo WHERE id=:id";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':activo',$activo);
    if($stmt->execute()){
        echo "ok";
    } else {
        echo "mal";
    }
}

function eliminarTattoo($id){
    $manager = new DBzona();
    $sql = "DELETE FROM tattoos WHERE id=:id";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->bindParam(':id',$id);
    if($stmt->execute()){
        echo "ok";
    } else {
        echo "mal";
    }
    
}

function getAllTattoos(){
    $manager = new DBzona();
    $sql = "SELECT * FROM tattoos";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    
}
function get12Tattoos(){
    $manager = new DBzona();
    $sql = "SELECT * FROM tattoos ORDER BY id DESC limit 12";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    
}

//devuelve todas las Categoria de tatuajes
function getAllTattoosCategoria(){
    $manager = new DBzona();
    $sql = "SELECT * FROM categoria_tattoos";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//añadirArtista("xavi2", "guapisimo", "");
//modificarArtista(3, "xavier", "guapisimo", "");
//eliminarArtista(10);
//print_r(getAllArtistas());
if (isset($_POST['deletefunction'])) {
    eliminarImagen("tattoos", $_POST['delete-img']);
    eliminarTattoo($_POST['deletefunction']);
} else if (isset($_POST['updatefunction'])) {
    modificarTattoo($_POST['updatefunction'], $_POST['modify-title'], $_POST['modify-tag']);
}
?>