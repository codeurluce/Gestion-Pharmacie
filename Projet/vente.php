<!DOCTYPE HTML>
<html>
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" type="text/css" href="fiche.css" media="screen"/>
        <title>Vente</title>
    </head>
    <body>
	
    <section id="bann">
		<div class="pharma"></div>
		<br><br>
        <?php
				try{
     			$options = [
          			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
          			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          			PDO::ATTR_EMULATE_PREPARES => false
     				];
					$pdo = new PDO ('mysql:host=localhost;dbname=db_pharmacie','root','',$options);
					//requete de verification
					$requete = $pdo->prepare('SELECT * FROM produit WHERE  code_produit = ? ');
					$requete->bindParam(1,$_POST['code']);
					$requete->execute();
					$verif = $_POST['code'];
					$data=($requete->fetch(PDO::FETCH_ASSOC));
					$qquantite = $data['quantite_stock'];
					$pproduit = $data['prix_produit'];
					if(empty($data))
					{
						echo"<div class='inscription-box'><h3>Ce produit numéro $verif n'existe pas.<h3></dvi>";
					}
					else{
						//requete securise
						$quantite = $_POST["quantite"];
						$date = $_POST["date"];
						$code = $_POST["code"];
						$pharma = $_POST["identifiant"];
						$prixtt = $quantite * $pproduit;
						$quantiteR = $qquantite - $quantite;
						//requete d'insertion
     					$sql=("INSERT INTO vente(quantite_vendue,prix_total,date_vendue,code_produit,id_pharma)
					       VALUES ('$quantite','$prixtt','$date','$code',$pharma)");
     					$requete = $pdo->prepare($sql);
						$requete->execute(); 
						 echo"<div class='inscription-box'><h3>La vente du produit numéro $code  est ajouté avec succés</h3></dvi>";
						//mise a jour du quantite du produit....
						$requete = $pdo->prepare('UPDATE produit SET quantite_stock=? WHERE code_produit=?');
                        $requete->bindParam(1,$quantiteR);
                        $requete->bindParam(2,$_POST['code']);
                        $requete->execute();
						
                    }	
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