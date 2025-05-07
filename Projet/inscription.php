<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style/fiche.css" media="screen"/>
		<link rel="stylesheet" href="./style/connexion.css">

    <title>Page inscription</title>
</head>

<body>
<img src="./images/image.png" alt="logo" class="logo">
    <section id="bann">
        <div class="pharma">PHARMACIE</div>
        
        <form method="POST" action="valide.php" aligne="center">
                <div class="inscription-box">
                    <h1>Inscription</h1>
                        <div class="boxtext">
                            <input type="text" placeholder="Nom" name="nom" required/></div>

                        <div class="boxtext">
                            <input type="text" placeholder="Prénom" name="Pnom" required/></div>

                        <div class="boxtext">
                            <input type="email" placeholder="Email" name="email" required/></div> 
                        
                        <div class="boxtext">
                            <input type="tel" placeholder="Phone" name="phone" required /></div>

                        <label for="sexe" class="boxtext" id="sexe">Sexe</label>
                                <input  type="radio" value="Homme" name="sexe" id="homme"><label for="hom"> Homme</label>
                                <input  type="radio" value="Femme" name="sexe" id="femme"><label for="fem"> Femme</label>

                        <div class="boxtext">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Username" name="pseudo" required/></div>

                        <div class="boxtext">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Password" name="mdp" required/></div>

                        <div class="boxtext">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Confirm Password" name="motdp" required/></div><br>
                                <input type="submit" value="inscription" class="inscrip" >
        </div>
    </form> 
    <a href="administrateur.html"><input type="submit" value="Annuler" class="annuler" ></a>
</section>
</body>

</html>