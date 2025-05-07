<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fiche.css" media="screen"/>
	<title>Document</title>
</head>
<body>

<img src="images/image" alt="logo" class="logo">
    <section id="bann">
        <div class="pharma">PHARMACIE</div>

		<fieldset><legend><h1> Informations Ajoutés </h1></legend>
<br>
			<?php
	$Name = $_POST['nom'];
	$prenom = $_POST['Pnom'];
	$sexe = $_POST['sexe'];
	$username = $_POST['pseudo'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];/*comparaison des mots de passe */
	$mdp_saisi = $_POST['mdp'];
	$mdp_repeat = $_POST['motdp'];

    $options = ['cost' => 12,];
    $mdp = password_hash($mdp_saisi, PASSWORD_BCRYPT, $options);
	
		// Connexion à la base de données
	$bdd = new mysqli ('localhost', 'root', '', 'db_pharmacie');
		  if ( $bdd -> connect_error ){
		die ( " Echec de la connexion : " . $bdd -> connect_error );
	}else {
		$stmt = $bdd -> prepare ( "INSERT into employe (nom_employe, prenom_employe, sexe, username, phone, email_employe, password) values (?, ?, ?, ?, ?, ?, ?)" );
		$stmt -> bind_param ( "ssssiss" , $Name , $prenom , $sexe , $username , $phone , $email , $mdp );
		$stmt->execute();
		echo  '<h3><B> Un nouveau Pharmacien a été ajouter avec succés !!!</B></h3><br/>' ;
		$stmt -> close();
		$bdd -> close();
		
    echo '<br/><h4>','<B><u> Nom:</u> </B>',$Name,'<br/>','<B><u> Prenom:</u> </B>',$prenom,'<br/>','<B><u> sexe:</u> </B>',$sexe,'<br/>','<B><u> pseudo:</u> </B>',$username,'<br/>','<B><u> Phone:</u> </B>',$phone,'<br/>','<B><u> email:</u> </B>',$email,'<br/>','<B><u> password:</u> </B>',$mdp_repeat,'<br/></h4>',' ';
    
    }
	
?>
<a href="administrateur.html"><input type="submit" value="Retour" class="annul" ></a>
</fieldset>
</div>
</section>
</body>
</html>

</h3>