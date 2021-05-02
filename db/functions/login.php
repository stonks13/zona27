<?php
require_once(dirname(__FILE__).'/../DBManager.php');
//require_once('/home/xavi/Documents/zona27/db/DBManager.php');
use DBzona;

function loginAdmin($user){
    $manager = new DBzona();
    //$sql = "SELECT * FROM usuario WHERE nombre=:user AND passw =:passw";
    $sql = "SELECT * FROM usuario WHERE nombre=:user";
    $stmt = $manager->dbconn()->prepare($sql);
    $stmt->bindParam(':user',$user);
    //$stmt->bindParam(':passw',$passw);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0]['passw'];
}
//echo loginAdmin("xavi");
//echo getcwd();
//echo dirname(__FILE__);
?>