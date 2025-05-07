<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fiche.css" media="screen"/>
    <title>Modifier produit</title>
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
                    //verifier l'existant du produit...
                    $requete = $pdo->prepare('SELECT * FROM produit WHERE  code_produit = ? ');
					$requete->bindParam(1,$_POST['code']);
					$requete->execute();
					//pour recuperer les données...
					$data=($requete->fetch(PDO::FETCH_ASSOC));
					if(empty($data))
					{
						echo"<div class='inscription-box'><h3>CE PRODUIT N'EXISTE PAS...</h3></dvi>";
                    } 
                    else{
                        //requete securise
                        $requete = $pdo->prepare('UPDATE produit SET nom_produit = ?, prix_produit=?, emplacement=?, date_expiration=?, quantite_stock=? WHERE code_produit=?');
                        $requete->bindParam(1,$_POST['nom']);
                        $requete->bindParam(2,$_POST['prix']);
                        $requete->bindParam(3,$_POST['place']);
                        $requete->bindParam(4,$_POST['date']);
                        $requete->bindParam(5,$_POST['quantite']);
                        $requete->bindParam(6,$_POST['code']);
                        $requete->execute();
                        //affichage du message
                        $mod = $_POST['nom'];
                        echo"<div class='inscription-box'><h3>Le produit $mod  est modifie avec succés</h3></dvi>";
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
</body>
</html>