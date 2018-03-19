<?php 
include 'BDD-connexion.php';


//afficher le classemement
$msgComplet ='';
$reponse = $bdd->query('SELECT equipes.nom equipe, troupe.nom troupe, points, troupe.unitee FROM equipes, troupe WHERE troupe.ID = equipes.troupe_ID ORDER BY points DESC');

while ($donnees = $reponse->fetch())

{
	
    $afficherNom = $donnees['equipe']; 
    $afficherTroupe = $donnees['troupe'];
    $afficherPoints = $donnees['points'];
    $afficherUnitee = $donnees['unitee'];
    $msgComplet .= '<p><span><a href="equipe/equipe.php?equipe='.$donnees['equipe']. '">' . $afficherNom . '</a></span><span><a href="troupe/troupe.php?troupe='.$donnees['troupe']. '">' . $afficherTroupe .  '</a></span><span>' . $afficherUnitee . '</span><span>' . $afficherPoints .  '</span></p>';
}
 ?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Mafeking Trophy</title>
	<!-- <link rel="stylesheet" href="menu/menu.css"> -->
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="menu-gauche">
			<!-- menu -->
		<?php include 'menu/menu.php' ?>
	</div>
	<div id="contenu-droite">
		<h1>Classement</h1>
		<?php echo $msgComplet ?>
	</div>





</body>
</html>