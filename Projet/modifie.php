<?php
$bdd = new PDO('mysql:host=localhost;dbname=db_pharmacie;charset=utf8' , 'root' , '');
$username = "";
$Name = "";
$prenom = "";
$sexe = "";
$phone = "";
$email = "";
$mdp_repeat = "";

            if (isset($_POST['ajouter']))
            {

            $username = $_POST['pseudo'];
            $Name = $_POST["nom"];
            $prenom = $_POST["pnom"];
            $sexe = $_POST["sexe"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $mdp_repeat = $_POST["motdp"];

            $sql = "INSERT INTO employe(nom_employe, prenom_employe, sexe,  username, phone, email_employe, password) VALUES ('$nom','$prenom','$sexe','$username','$phone','$email','$mdp_repeat')";
            $query = mysql_query($sql);
            if($query)
            {
                echo " modification reussi ";
            }else{
                echo "Erreur enregistrement";
            }
            header("refresh:1; url=editer.php");
        }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $sql = "SELECT * FROM employe WHERE id_employe='$id'";
        $query = mysql_query($sql);

        $row = mysql_fetch_array ($query);
        $id = $row['id_employe'];
    }
    if(isset($_POST['modifier']))
?>

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

</section>
</body>

</html>