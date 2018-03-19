<?php 
include '../BDD-connexion.php';

// afficher detail de l'équipe
$reponse = $bdd->query('SELECT equipes.ID id, equipes.nom equipe, equipes.type type, troupe.nom troupe, troupe.unitee FROM equipes INNER JOIN troupe ON troupe.ID = equipes.troupe_ID ');


$afficherEquipe ='';
while ($donnees = $reponse->fetch()){

		$afficherEquipe .= '<tr><td>'. $donnees['id'].'</td><td>'. $donnees['equipe'].'</td><td>'. $donnees['type'].'</td><td>'. $donnees['troupe'].'</td><td>'. $donnees['unitee'].'</td><td>supprimer</td></tr>';
}

//select option creation
$afficherTroupe ='';
$listeTroupe = $bdd->query('SELECT * FROM troupe');
while($donnees = $listeTroupe->fetch()){
	$afficherTroupe .= '<option value="'. $donnees['ID'].'">'.$donnees['nom'].'</option>';
}

//ajout troupe ou equipe

if(isset($_POST['equipe'])){
$stmt = $bdd->prepare("INSERT INTO equipes (nom, troupe_ID,type) VALUES (?,?,?)");
$stmt->bindParam(1, $nom);
$stmt->bindParam(2, $troupeID);
$stmt->bindParam(3, $type);
$nom = $_POST["equipe"];
$troupeID = intval($_POST["troupe"]);
$type = $_POST["type"];
$stmt->execute();
header("Refresh:0");

}

elseif(isset($_POST['troupeAjout'])){
	$stmt = $bdd->prepare("INSERT INTO troupe (nom, unitee) VALUES (?,?)");
	$stmt->bindParam(1, $nom);
	$stmt->bindParam(2, $unitee);
	$nom = $_POST["troupeAjout"];
	$unitee = intval($_POST["unitee"]);
	$stmt->execute();
	header("Refresh:0");
}
 ?>

 <!DOCTYPE html>
 <html lang="fr">
 <head>
 	<meta charset="UTF-8">
 	<title>liste Equipe</title>
 	<link rel="stylesheet" href="../style.css">
 </head>
 <body>
 	
 	<div id="menu-gauche">
 		<?php include '../menu/menu.php' ?>
 	</div>
 	<div id='contenu-droite' >
	 	<form action="listeEquipe.php" method="POST">
	 		<label for="">nom de la troupe</label>
	 		<input name="troupeAjout" type="text">
	 		 <label for="">unitée</label>
	 		 <input name="unitee" type="text">
			<button type="submit">sauvergarder</button>
	 	</form><br>
	 	<form action="listeEquipe.php" method="POST">
	 		<label for="">nom de l'équipe</label>
	 		<input name="equipe" type="text">
	 		 <select name="troupe">
				  <?=$afficherTroupe?>
			</select> 
			<select name="type">
				  <option value="h">homme</option>
				  <option value="f">femme</option>
				  <option value="mx">mixte</option>
			</select> 
			<button type="submit">sauvergarder</button>
	 	</form>
	 	<table style="width: 100%; text-align: center;">
	 		<tr>
	 			<th>ID</th>
	 			<th>nom</th>
	 			<th>type</th>
	 			<th>troupe</th>
	 			<th>unitee</th>
	 			<th>supprimer</th>
	 		</tr>

			<?=$afficherEquipe ?>


	 	</table>
 	</div>
 </body>
 </html>