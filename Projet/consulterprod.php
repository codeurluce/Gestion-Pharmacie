<!DOCTYPE HTML>
<html>
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="fiche.css" media="screen"/>	
        <title>Consultation</title>
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
					//connexion with database..
					$pdo = new PDO ('mysql:host=localhost;dbname=db_pharmacie','root','',$options);
					//ecriture du requete..
					$requete = $pdo->prepare('SELECT * FROM produit WHERE nom_produit = ? ');
					$requete->bindParam(1,$_POST['nom']);
					$requete->execute();
					//pour recuperer les données...
					$data=($requete->fetch(PDO::FETCH_ASSOC));
					//lecture des données...
					if(empty($data))
					{
						header("location: consultationprod.html");
					}
					else{	
						echo '<div class="inscription-box"><h3>Le nom du produit :  '.$data['nom_produit'].'<br><br>
							Le prix du produit est : '.$data['prix_produit'].'<br><br>
							Son emplacement est :  '.$data['emplacement'].'<br><br>
							La date expiration est :  '.$data['date_expiration'].'<br><br>
							La quantité stocké est :  '.$data['quantite_stock'].'</h3></div>';
                    
					}
				}catch(PDOException $e){
						echo "Erreur : " .$e->getMessage();
			}
			?>
		<br><br><br>
		<a href="Administrateur.html"><input type="submit" value="Retour" class="inscrip"></a>		
	</section>		
    <body>
</html>