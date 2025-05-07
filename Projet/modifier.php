<?php

$bdd = new PDO('mysql:host=localhost;dbname=db_pharmacie;charset=utf8' , 'root' , '');
$id_employe = "";
$username = "";
$Name = "";
$prenom = "";
$sexe = "";
$phone = "";
$email = "";
$mdp_repeat = "";
    if (isset($_GET["id_employe"]))
    {
        $id_employe = $_GET["id_employe"];
        if(!empty($id_employe) AND is_numeric($id_employe))
        {
            $bdd = new PDO('mysql:host=localhost;dbname=db_pharmacie;charset=utf8' , 'root' , '');
            $query = "SELECT * from employe WHERE id_employe=$id_employe";
            // $result = $conn->exec($query);
            // $data = $result->fetchAll();
            $result = $bdd->query($query);
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            $id_employe = $data[0]['id_employe'];
            $username = $data[0]['pseudo'];
            $Name = $data[0]["nom"];
            $prenom = $data[0]["pnom"];
            $sexe = $data[0]["sexe"];
            $phone = $data[0]["phone"];
            $email = $data[0]["email"];
            $mdp_repeat = $data[0]["motdp"];

        }

    }
if (isset($_POST['pseudo']) && isset($_POST['id_employe']) && isset($_POST['nom']) && isset($_POST['pnom']) && isset($_POST['sexe']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['motdp']))
{
            $id_employe = $_POST['id_employe'];
            $username = $_POST[0]['pseudo'];
            $Name = $_POST[0]["nom"];
            $prenom = $_POST[0]["pnom"];
            $sexe = $_POST[0]["sexe"];
            $phone = $_POST[0]["phone"];
            $email = $_POST[0]["email"];
            $mdp_repeat = $_POST[0]["motdp"];
    if(!empty($username) && !empty($Name) && !empty($prenom) && !empty($sexe) && !empty($phone) && !empty($email) && !empty($mdp_repeat) && !empty($id_employe) && is_numeric($id_employe))
    {
        $bdd = new PDO('mysql:host=localhost;dbname=db_pharmacie;charset=utf8' , 'root' , '');
        // $query = "UPDATE employe set pseudo=$username WHERE id_employe=$id_employe";
        $query = $bdd->prepare("UPDATE employe SET pseudo = :pseudo WHERE id_employe = :id");
        $query->execute([
                            'pseudo' => $username,
                            'id' => $id_employe
                    ]);
        $conn->exec($query);
        header("Location: editer.php");
    }
}

  if(isset($_POST['modifier']))
        {
            
        }

?>


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
<form action="#" method="POST">
        <div class="inscription-box">
                    <h1>Modification</h1>
                        <div class="boxtext">
                            <input type="text" placeholder="Nom" name="nom" /></div>

                        <div class="boxtext">
                            <input type="text" placeholder="Prénom" name="Pnom"/></div>

                        <div class="boxtext">
                            <input type="email" placeholder="Email" name="email" /></div> 
                        
                        <div class="boxtext">
                            <input type="tel" placeholder="Phone" name="phone" /></div>

                        <label for="sexe" class="boxtext" id="sexe">Sexe</label>
                                <input  type="radio" value="Homme" name="sexe" id="homme"><label for="hom"> Homme</label>
                                <input  type="radio" value="Femme" name="sexe" id="femme"><label for="fem"> Femme</label>

                        <div class="boxtext">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Username" name="pseudo"/></div>

                        <div class="boxtext">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Password" name="motdp" required/></div><br>
        </div>
        <input type="submit" value="modifier" class="inscrip" >
</form>  
</section>
</body>

</html>