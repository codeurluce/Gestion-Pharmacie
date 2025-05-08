<?php
$bdd = new PDO('mysql:host=localhost;dbname=db_pharmacie;charset=utf8', 'root', '');

$id_employe = "";
$username = "";
$Name = "";
$prenom = "";
$sexe = "";
$phone = "";
$email = "";
$mdp_repeat = "";

// Récupération des données via GET
if (isset($_GET["id_employe"])) {
    $id_employe = $_GET["id_employe"];
    if (!empty($id_employe) && is_numeric($id_employe)) {
        $query = "SELECT * FROM employe WHERE id_employe = ?";
        $stmt = $bdd->prepare($query);
        $stmt->execute([$id_employe]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $id_employe = $data['id_employe'];
            $username = $data['pseudo'];
            $Name = $data["nom"];
            $prenom = $data["pnom"];
            $sexe = $data["sexe"];
            $phone = $data["phone"];
            $email = $data["email"];
            $mdp_repeat = $data["motdp"];
        }
    }
}

// Traitement du formulaire
if (
    isset($_POST['id_employe'], $_POST['pseudo'], $_POST['nom'], $_POST['pnom'], $_POST['sexe'],
          $_POST['phone'], $_POST['email'], $_POST['motdp'])
) {
    $id_employe = $_POST['id_employe'];
    $username = $_POST['pseudo'];
    $Name = $_POST['nom'];
    $prenom = $_POST['pnom'];
    $sexe = $_POST['sexe'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $mdp_repeat = $_POST['motdp'];

    if (!empty($id_employe) && is_numeric($id_employe)) {
        $update = $bdd->prepare("UPDATE employe SET pseudo = :pseudo, nom = :nom, pnom = :pnom, sexe = :sexe, phone = :phone, email = :email, motdp = :motdp WHERE id_employe = :id");
        $update->execute([
            'pseudo' => $username,
            'nom' => $Name,
            'pnom' => $prenom,
            'sexe' => $sexe,
            'phone' => $phone,
            'email' => $email,
            'motdp' => $mdp_repeat,
            'id' => $id_employe
        ]);
        header("Location: editer.php");
        exit();
    }
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

            <!-- Champ caché pour transmettre l'ID -->
            <input type="hidden" name="id_employe" value="<?= htmlspecialchars($id_employe) ?>">

            <div class="boxtext">
                <input type="text" placeholder="Nom" name="nom" value="<?= htmlspecialchars($Name) ?>" required>
            </div>

            <div class="boxtext">
                <input type="text" placeholder="Prénom" name="pnom" value="<?= htmlspecialchars($prenom) ?>" required>
            </div>

            <div class="boxtext">
                <input type="email" placeholder="Email" name="email" value="<?= htmlspecialchars($email) ?>" required>
            </div>

            <div class="boxtext">
                <input type="tel" placeholder="Phone" name="phone" value="<?= htmlspecialchars($phone) ?>" required>
            </div>

            <label class="boxtext" id="sexe">Sexe</label>
            <input type="radio" value="Homme" name="sexe" id="homme" <?= $sexe == "Homme" ? "checked" : "" ?>>
            <label for="homme">Homme</label>
            <input type="radio" value="Femme" name="sexe" id="femme" <?= $sexe == "Femme" ? "checked" : "" ?>>
            <label for="femme">Femme</label>

            <div class="boxtext">
                <input type="text" placeholder="Username" name="pseudo" value="<?= htmlspecialchars($username) ?>" required>
            </div>

            <div class="boxtext">
                <input type="password" placeholder="Password" name="motdp" value="<?= htmlspecialchars($mdp_repeat) ?>" required>
            </div><br>

            <input type="submit" value="Modifier" class="inscrip">
        </div>
    </form>
</section>
</body>
</html>
