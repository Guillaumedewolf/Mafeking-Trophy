<?php 
//charger la base de données
try{
$bdd = new PDO('mysql:host=localhost;dbname=mafeking-trophy;charset=utf8', 'root', '');
}
catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
}

// afficher detail de l'équipe
$msgComplet ='';
$id_troupe = $_GET['troupe'];
$reponse = $bdd->query('SELECT troupe.nom troupe, troupe.unitee unitee, equipes.nom equipe, equipes.points points FROM troupe INNER JOIN equipes ON troupe.ID = equipes.troupe_ID ORDER BY points DESC');

while ($donnees = $reponse->fetch())

{

var_dump($donnees);
	if($donnees['troupe'] == $id_troupe){ 
    $afficherEquipe = $donnees['equipe'];
    $afficherPoints = $donnees['points'];




    $msgComplet .= '<p><span>' . $afficherEquipe .  '</span><span>' . $afficherPoints . '</span></p>';

	}

}

 ?>

 <!DOCTYPE html>
 <html lang="fr">
 <head>
 	<meta charset="UTF-8">
 	<title>équipe</title>
 </head>
 <body>
 	<style>span{padding: 10px;}</style>
 	<?php echo $msgComplet ?>
 </body>
 </html>