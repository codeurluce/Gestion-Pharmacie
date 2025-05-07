<!DOCTYPE HTML>
<html>
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" type="text/css" href="fiche.css" media="screen"/>
        <title>Passer commande</title>
    </head>
    <body>
	<img src="images/image" alt="logo" class="logo">
    <section id="bann">
		<div class="pharma">PHARMACIE</div>
		<br><br>
        <?php
				try{
     			$options = [
          			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
          			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          			PDO::ATTR_EMULATE_PREPARES => false
     				];
					$pdo = new PDO ('mysql:host=localhost;dbname=db_pharmacie','root','',$options);
     				//requete securise
					$nom = $_POST["produit"];
					$prix =$_POST["quantite"];
					$emplacement = $_POST["bon"];
					$date = $_POST["date"];
					$quantite = $_POST["identifiant"];
     				$sql=("INSERT INTO bon_commande(produit_cmd,quantite_commande,facture_bon,date_bon,id_pharma)
					      VALUES ('$nom','$prix','$emplacement','$date','$quantite')");
     				$requete = $pdo->prepare($sql);
					$requete->execute(); 
     				echo"<div class='inscription-box'><h3>Le commande du produit $nom  est passé avec succés...</h3></dvi>";    
                }
				catch(PDOException $pe)
				{
     				echo "Erreur : " .$pe->getMessage();
				}     			
			?>
			<br><br><br>
		<a href="Administrateur.html"><input type="submit" value="Retour" class="inscrip"></a>	
	</section>
	<body>
</html>    