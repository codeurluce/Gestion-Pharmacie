
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fiche.css" media="screen"/>
    <title>Page modifier</title>
</head>

<body>
<img src="images/image" alt="logo" class="logo">
    <section id="bann">
        <div class="pharma">PHARMACIE</div>
        
    <fieldset><legend><h1>Modifier employé </h1></legend>
<br>
<table>
    <thead>
        <th>Id_employe  </th>
        <th>username  </th>
        <div class="action"><th  class="action">action  </th></div>
    </thead>

    <tbody>

            <?php    
    $bdd = new PDO ('mysql:host=localhost;dbname=db_pharmacie;', 'root', '');
    $recupUsers = $bdd->query('SELECT * FROM employe ');


    while($user = $recupUsers->fetch()){
        
            ?> 
        <tr>
            <td> <p> <?= $user['id_employe']?> </p></td>
            <td> <p> <?= $user['username']?> </p></td>
            <td>
                <a href="modifie.php?edit= <?php echo $user['id_employe'] ?>"  class="modif">Modifier</a>
            </td>
        
        </tr>
 
<?php
    }
?>
    </tbody>
</table>
</fieldset><br>
<form action="modifie.php" methode="POST">
        <div class="modification-box">
                    <h1>Modification</h1>
                        <div class="boxtext">
                            <input type="text" placeholder="Nom" name="nom" value="Name"></div>

                        <div class="boxtext">
                            <input type="text" placeholder="Prénom" name="Pnom" value="prenom"/></div>

                        <div class="boxtext">
                            <input type="email" placeholder="Email" name="email" value="$email"/></div> 
                        
                        <div class="boxtext">
                            <input type="tel" placeholder="Phone" name="phone" value="$phone"/></div>

                        <label for="sexe" class="boxtext" id="sexe">Sexe</label>
                                <input  type="radio" value="Homme" name="sexe" id="homme"><label for="hom"> Homme</label>
                                <input  type="radio" value="Femme" name="sexe" id="femme"><label for="fem"> Femme</label>

                        <div class="boxtext">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Username" name="pseudo"></div>

                        <div class="boxtext">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Password" name="motdp"></div><br>
                                <input type="submit" value="modifier" class="inscrip" ></div>
                                </div>
</form>  
    <a href="administrateur.html"><input type="submit" value="Annuler" class="annuler" ></a>
</section>
</body>

</html>