<?php 
include '../BDD-connexion.php';


$reponse = $bdd->query('SELECT ID, tempsBoucleE, tempsBoucleW FROM equipes');

while ($donnees = $reponse->fetch()){
	$ID = $donnees['ID'];
	$tempsTotal = intval($donnees['tempsBoucleE']) + intval($donnees['tempsBoucleW']);

	//calcul point

	$pointsBoucle = 80 - (80/21600)*($tempsTotal - 14400);

	intval($pointsBoucle);
	$stmt = $bdd->prepare("UPDATE equipes SET temps_points = $pointsBoucle  WHERE ID = $ID");
	$stmt->execute();




}



 ?>
