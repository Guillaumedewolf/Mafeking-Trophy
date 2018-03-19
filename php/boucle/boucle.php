<?php 
include '../BDD-connexion.php';
$reponse = $bdd->query('SELECT COUNT(ID) FROM equipes');
$nombreEquipes = $reponse->fetchALL();
$nombreEquipes = intval($nombreEquipes[0][0]);



//calcul temps
$reponse = $bdd->query('SELECT * FROM equipes_has_epreuves ee');
$donnees = $reponse->fetchALL();



for ($i=1; $i < $nombreEquipes; $i++) { 
	$tempsTotal = 0;
	$tempsGeler = 0;
	$tempsFinal = 0;

	$tempsTotal2 = 0;
	$tempsGeler2 = 0;
	$tempsFinal2 = 0;
	foreach ($donnees as $epreuve) {
		if($epreuve[0] == $i){
			//temps total
			if($epreuve[1] == 17){
				$tempsTotal = intval($epreuve[3]) - intval($epreuve[2]);

			}
			elseif($epreuve[1] == 18){
				$tempsTotal2 = intval($epreuve[3]) - intval($epreuve[2]);
			}
			//temps geler
			elseif($epreuve[1] <= 8){
				$tempsGeler += (intval($epreuve[3]) - intval($epreuve[2]));


			}
			else{
				$tempsGeler2 += (intval($epreuve[3]) - intval($epreuve[2]));


			}




		}





	}

$tempsFinal =  $tempsTotal - $tempsGeler;
$tempsFinal2 =  $tempsTotal2 - $tempsGeler2;
var_dump($tempsFinal);
$stmt = $bdd->prepare("UPDATE equipes SET tempsBoucleE = $tempsFinal, tempsBoucleW = $tempsFinal2 WHERE ID = $i");
$stmt->execute();





}



 ?>