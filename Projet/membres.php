
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style/fiche.css" media="screen"/>
		<link rel="stylesheet" href="./style/connexion.css">

    <title>Page modifier</title>
</head>

<body>
<img src="./images/image.png" alt="logo" class="logo">
    <section id="bann">
        <div class="pharma">PHARMACIE</div>
        
    <fieldset><legend><h1>Les employés </h1></legend>
<br>
<table>
    <thead>
        <th>Identifiant </th>
        <th>Nom </th>
        <th>Prenom  </th>
        <th>Username  </th>
        <th>sexe  </th>
        <th>Phone </th>
        <th>Email  </th>
    </thead>

    <tbody>

            <?php    
    $bdd = new PDO ('mysql:host=localhost;dbname=db_pharmacie;', 'root', '');
    $recupUsers = $bdd->query('SELECT * FROM employe ');


    while($user = $recupUsers->fetch()){
        
            ?> 
        <tr>
            <td> <p> <?= $user['id_employe']?> </p></td>
            <td> <p> <?= $user['nom_employe']?> </p></td>
            <td> <p> <?= $user['prenom_employe']?> </p></td>
            <td> <p> <?= $user['username']?> </p></td>
            <td> <p> <?= $user['sexe']?> </p></td>
            <td> <p> <?= $user['phone']?> </p></td>
            <td> <p> <?= $user['email_employe']?> </p></td>
        </tr>
 
<?php
    }
?>
    </tbody>
</table>
<a href="Administrateur.html"><input type="submit" value="Menu principal" class="back" ></a>

</fieldset>
</section>
</body>
</html>