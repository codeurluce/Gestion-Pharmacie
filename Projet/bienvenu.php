<?php
$bdd = new PDO ('mysql:host=localhost;dbname=db_pharmacie;', 'root', '');
if (isset($_POST['OK'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi= htmlspecialchars($_POST['mdp']);
        $recupUsers = $bdd->prepare('SELECT * FROM employe where username = ? AND password = ?');
        $recupUsers->execute(array($pseudo_saisi,$mdp_saisi));
            if($recupUsers->rowCount() > 0){
                header('location: pharmacian.html');
            }else{
            $recupUsers = $bdd->prepare('SELECT * FROM pharmacien where username = ? AND password = ?');
            $recupUsers->execute(array($pseudo_saisi,$mdp_saisi));
            if($recupUsers->rowCount() > 0){
                 header('location: administrateur.html');
            }else{
                echo "Mot de passe ou pseudo est incorrecte";
            }
        }
    }
 }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>Home</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel ="stylesheet" href="fiche.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,300&display=swap" rel="stylesheet">
</head>
<body>

  <section>
        <img src="images/image" alt="logo" class="logo pharmacie">
      <section id="banner">
     <div class="pharma">PHARMACIE</div>
     <div class="banner-text">
       <h1>Bienvenue</h1>
     </div>

     <form method="POST" action="" aligne="center">
            <div class="connexion-box">
               <h1>Login</h1>
                    <div class="textbox">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Username" name="pseudo" required/>
                    </div>
                    <div class="textbox">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="mdp" required/>
                    </div>
            </div>
<br>
                        <input type="submit" name="OK" value="Connexion" class="conex" />
<br>
    </form>
  </section>
  

</body>
</html>

