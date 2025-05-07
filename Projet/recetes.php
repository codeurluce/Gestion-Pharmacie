<!DOCTYPE HTML>
<html>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style/fiche.css" media="screen"/>
	<link rel="stylesheet" href="./style/connexion.css">

    <title>Page recette</title>
</head>

<body>
    <section id="bann">
		<div class="vente">
			<h1> Informations des ventes</h1> 
		</div>
		<br><br>
		<br><br>
		<br><br>
		<div class="dec">
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
                    $requet=("SELECT id_vente,quantite_vendue,prix_total,date_vendue,code_produit,id_employe FROM vente WHERE id_employe >= 1");
	                //executer le requete...
	                $resultat = $pdo->query($requet); 	
					//.........
					//recuperation et affichage...
					while($var= $resultat -> fetch(PDO::FETCH_OBJ))
                    {
						echo '<div>
							<ul>
							<li><h3><u><p> Pour la vente numéro  '.$var->id_vente.':</p></u></h3>
							<ul>
							<h3>
							<li>La quantite vendue : '.$var->quantite_vendue.'</li>
							<li>Le prix total : '.$var->prix_total.'</li>
							<li>La date de vente : 10/05/2021 12:03</li>';
							//requte du nom du produit..
							$reqcorps = $pdo->prepare('SELECT nom_produit FROM produit WHERE code_produit=? ');
							$reqcorps->bindParam(1,$var->code_produit);
							$reqcorps->execute();
							$data=($reqcorps->fetch(PDO::FETCH_ASSOC));
							if(!empty($data))
							{
								echo '<li> Le produit est:  introuvable</li>';
							}
							else{
								echo '<li> Le nom du produit est : PARACETAMOL'.$data['nom_produit'].'</li>';
								}	
							//requete du nom du vendeur..
							$reqcorps = $pdo->prepare('SELECT nom_employe FROM employe WHERE id_employe=? ');
							$reqcorps->bindParam(1,$var->id_employe);
							$reqcorps->execute();
							$datac=($reqcorps->fetch(PDO::FETCH_ASSOC));
							echo '<li> le produit est vendue par : '.$datac['nom_employe'].'</li>';
							echo '</h3></ul></li></ul></div>';
                    }
				}catch(PDOException $e){
						echo "Erreur : " .$e->getMessage();
			}
			?>
			</div>
		<br><br><br>
		<a href="pharmacian.html"><input type="submit" value="Retour" class="annuler"></a>		
	</section>		
    <body>
</html>