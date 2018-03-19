<?php 
include '../BDD-connexion.php';
$stmt = $bdd->prepare("INSERT INTO equipes_has_epreuves (equipes_ID, epreuves_ID, arrivee, depart, points, fairplay ) VALUES (?, ?,  ?, ?, ?, ?)");

$stmt->bindParam(1, $equipe);
$stmt->bindParam(2, $epreuve);
$stmt->bindParam(3, $tempsA);
$stmt->bindParam(4, $tempsD);
$stmt->bindParam(5, $points);
$stmt->bindParam(6, $fairplay);


$json = file_get_contents("https://firestore.googleapis.com/v1beta1/projects/mafeking-trophy/databases/(default)/documents/epreuve");
$decodeJson =json_decode($json, true);

// var_dump($decodeJson);
$valeurScan;
foreach ($decodeJson['documents'] as $document) {
				$boucle = $document['fields']['boucle']['stringValue'];
				$epreuve = intval($document['fields']['epreuve']['stringValue']);
				$tempsA = intval(substr($document['fields']['tempsA']['integerValue'], 0,10));
				$tempsD = intval(substr($document['fields']['tempsD']['integerValue'], 0,10));
				$equipe = intval($document['fields']['equipe']['stringValue']);
				$points = intval($document['fields']['points']['stringValue']);
				$fairplay = intval($document['fields']['fairplay']['stringValue']);


				//conversion boucle

				if($boucle == "B"){
					$epreuve += 8;

				}
				


				
				//afficher

				$msg = 'equipe : ' .$equipe . ', boucle : ' . $boucle . ', épreuve : ' . $epreuve . ', temps depart : ' . $tempsD  . ', temps arrivee : ' . $tempsA . ', points : ' . $points . ', fairplay : '. $fairplay . '<br>';
						echo $msg;

				// envois BDD

						$stmt->execute();
	
}




 ?>

