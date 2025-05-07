<!DOCTYPE HTML>
<html>
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" type="text/css" href="./style/fiche.css" media="screen"/>
		<link rel="stylesheet" href="./style/connexion.css">

        <title>Insertion Produit</title>
    </head>
    <body>
	<img src="./images/image.png" alt="logo" class="logo">
    <section id="bann">
		<div class="pharma">PHARMACIE</div>
		<fieldset><legend><h1> Produits Ajoutés </h1></legend>

		<br>
        <?php
				try{
     			$options = [
          			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
          			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          			PDO::ATTR_EMULATE_PREPARES => false
     				];
					$pdo = new PDO ('mysql:host=localhost;dbname=db_pharmacie','root','',$options);
					//verifier l'existant deja un produit
					$requete = $pdo->prepare('SELECT * FROM produit WHERE  nom_produit = ? ');
					$requete->bindParam(1,$_POST['nom']);
					$requete->execute();
					//pour recuperer les données...
					$data=($requete->fetch(PDO::FETCH_ASSOC));
					if(empty($data))
					{
     					//requete securise
						$nom = $_POST["nom"];
						$prix =$_POST["prix"];
						$emplacement = $_POST["place"];
						$date = $_POST["date"];
						$quantite = $_POST["quantite"];
     					$sql=("INSERT INTO produit(nom_produit, prix_produit, emplacement, date_expiration, quantite_stock)
					       VALUES ('$nom','$prix','$emplacement','$date','$quantite')");
     					$requete = $pdo->prepare($sql);
						$requete->execute(); 
						echo  '<h3><B> Un nouveau Produit a été ajouter avec succés !!!</B></h3><br/>' ;
						
					    echo '<br/><h4>','<B><u> Nom :</u> </B>',$nom,'<br/>','<B><u> Prix:</u> </B>',$prix,'<br/>','<B><u> Emplacement:</u> </B>',$emplacement,'<br/>','<B><u> Date_expiration:</u> </B>',$date,'<br/>','<B><u> Quantite:</u> </B>',$quantite,'<br/></h4>';
					
					}
					else {
						# code...
						echo"<div class='inscription-box'><h3>LE PRODUIT EXISTE DEJA ...ALLER MODIFIER...</h3></dvi>";
					

					}	
				}
				catch(PDOException $pe)
				{
     				echo "Erreur : " .$pe->getMessage();
				}     			
			?>
			<br><br><br>
		<a href="Administrateur.html"><input type="submit" value="Retour" class="inscrip"></a>	
</fieldset>
	</section>
	<body>
</html>    