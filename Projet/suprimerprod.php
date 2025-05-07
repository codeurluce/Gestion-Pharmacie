<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fiche.css" media="screen"/>
	<link rel="stylesheet" href="./style/connexion.css">

    <title>supprimer produit</title>
</head>
<body>
	<img src="./images/image.png" alt="logo" class="logo">
    <section id="bann">
		<div class="pharma">PHARMACIE</div>
        <fieldset><legend class="leg"><h1> Informations suppimés </h1></legend><br>
	
		<?php
				try{
     			$options = [
          			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
          			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          			PDO::ATTR_EMULATE_PREPARES => false
     				];
     				$pdo = new PDO ('mysql:host=localhost;dbname=db_pharmacie','root','',$options);
					//requete securise
					$requete = $pdo->prepare('SELECT * FROM produit WHERE  nom_produit = ? ');
					$requete->bindParam(1,$_POST['nom']);
					$requete->execute();
					$supp = $_POST['nom'];
					//pour recuperer les données...
					$data=($requete->fetch(PDO::FETCH_ASSOC));
					if(empty($data))
					{
						echo"<br><h3><B>Le produit $supp n'existe pas.<h3></dvi>";
					}
					else{ 
                    $requete = $pdo->prepare('DELETE FROM produit WHERE nom_produit = ? ');
					$requete->bindParam(1,$_POST['nom']);
                    $requete->execute();

					$count = $requete->rowCount();
					print( ' ' .$count. ' produit supprimé. </br>');
					print('');
					$sup = $_POST['nom'];
					echo"<br><h3><B>Le produit $sup  est supprimé avec succés</h3></dvi>";
					} 
				}
				catch(PDOException $pe)
				{
     				echo "Erreur : " .$pe->getMessage();
				}     			
		?>
<br>
<a href="administrateur.html"><input type="submit" value="Retour" class="back" ></a>
</fieldset>
		<a href="Administrateur.html"><input type="submit" value="Retour" class="inscrip"></a> 
	</section>		
</body>
</html>