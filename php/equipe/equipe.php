<?php 
//charger la base de données
include '../BDD-connexion.php';

// afficher detail de l'équipe
$msgComplet ='';
$id_equipe = $_GET['equipe'];
$reponse = $bdd->query('SELECT ee.depart depart, ee.arrivee arrivee, ee.points points, equipes.nom equipe, epreuves.nom epreuve, ee.fairplay fairplay FROM equipes_has_epreuves ee INNER JOIN epreuves ON ee.epreuves_ID = epreuves.ID INNER JOIN equipes ON ee.equipes_ID = equipes.ID');

while ($donnees = $reponse->fetch())

{


	if($donnees['equipe'] == $id_equipe){ 
    $afficherEpreuve = $donnees['epreuve'];
    $afficherDepart=date('H:i:s',intval($donnees['depart']));
    $afficherArrivee = date('H:i:s',intval($donnees['arrivee']));
    $afficherPoints = $donnees['points'];
    $afficherFairplay = $donnees['fairplay'];
    //calcul temps
    // $afficherTemps = strtotime($donnees['depart']) - strtotime($donnees['arrivee']);
    // $afficherTemps = $afficherTemps / 60;




    $msgComplet .= '<p><span>' . $afficherEpreuve .  '</span><span>' . $afficherDepart . '</span><span>' . $afficherArrivee .  '</span><span>' . $afficherPoints . '</span><span>' . $afficherFairplay . '</span></p>';

	}

}

 ?>

 <!DOCTYPE html>
 <html lang="fr">
 <head>
 	<meta charset="UTF-8">
 	<title>équipe</title>
    <link rel="stylesheet" href="../style.css">
 </head>
 <body>
    <div id="menu-gauche">
            <!-- menu -->
        <?php include '../menu/menu.php' ?>
    </div>
    <div id="contenu-droite">
     	<style>span{padding: 10px;}</style>
     	<?php echo $msgComplet ?>
    </div>
 </body>
 </html>