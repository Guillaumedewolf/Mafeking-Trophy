<?php 
include '../BDD-connexion.php';
$stmt = $bdd->prepare("INSERT INTO equipes_has_epreuves (equipes_ID, epreuves_ID, arrivee, depart, points ) VALUES (?, ?,  ?, ?, ?)");

$stmt->bindParam(1, $equipe);
$stmt->bindParam(2, $epreuve);
$stmt->bindParam(3, $tempsA);
$stmt->bindParam(4, $tempsD);
$stmt->bindParam(5, $points);


$jsonDepart = file_get_contents("https://firestore.googleapis.com/v1beta1/projects/mafeking-trophy/databases/(default)/documents/epreuveD");
$jsonArrivee = file_get_contents("https://firestore.googleapis.com/v1beta1/projects/mafeking-trophy/databases/(default)/documents/epreuveA");
$decodeJsonDepart =json_decode($jsonDepart, true);
$decodeJsonArrivee =json_decode($jsonArrivee, true);
// var_dump($decodeJson);
$valeurScan;
foreach ($decodeJsonDepart['documents'] as $document) {
				$boucle = $document['fields']['boucle']['stringValue'];
				$epreuve = intval($document['fields']['epreuve']['stringValue']);
				$tempsD = $document['fields']['date']['timestampValue'];
				$equipe = intval($document['fields']['equipe']['stringValue']);
				$points = intval($document['fields']['points']['stringValue']);
				
				


				//boucle arrivee

				foreach ($decodeJsonArrivee['documents'] as $documentA) {
					$boucleA = $documentA['fields']['boucle']['stringValue'];
					$epreuveA = $documentA['fields']['epreuve']['stringValue'];
					$tempsA = $documentA['fields']['date']['timestampValue'];
					$equipeA = $documentA['fields']['equipe']['stringValue'];
					if ($boucleA == $boucle && $epreuveA == $epreuve && $equipe == $equipeA){
						$msg = 'equipe : ' .$equipe . ', boucle : ' . $boucle . ', épreuve : ' . $epreuve . ', temps depart : ' . $tempsD  . ', temps arrivee : ' . $tempsA . ', points : ' . $points . '<br>';
						echo $msg;

						$stmt->execute();

					}

				}





	
	
}




 ?>




<!DOCTYPE html>

<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>convertion des données</title>

</head>
<body>
	<div id="firestoreDonnee"></div>
</body>
</html>