<?php 
//charger la base de données
try{
$bdd = new PDO('mysql:host=localhost;dbname=mafeking-trophy;charset=utf8', 'root', '');
}
catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
}
 ?>