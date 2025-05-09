<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/fiche.css?v=1.0"/>
    <link rel="stylesheet" href="./style/connexion.css">

    <title>Page modifier</title>
</head>

<body>
    <img src="./images/image.png" alt="logo" class="logo">
    <section id="bann">
        <div class="pharma">PHARMACIE</div>

        <fieldset>
            <legend>
                <h1>Modifier employé </h1>
            </legend>
            <br>
            <table>
                <thead>
                    <th>Nom </th>
                    <th>Prenom </th>
                    <th>Username</th>
                    <th colspan="3">Action</th>
                </thead>

                <tbody>

                    <?php
                    $bdd = new PDO('mysql:host=localhost;dbname=db_pharmacie;', 'root', '');
                    $recupUsers = $bdd->query('SELECT * FROM employe ');


                    while ($user = $recupUsers->fetch()) {

                    ?>
                        <tr>
                            <td>
                                <p> <?= $user['nom_employe'] ?> </p>
                            </td>
                            <td>
                                <p> <?= $user['prenom_employe'] ?> </p>
                            </td>
                            <td>
                                <p> <?= $user['username'] ?> </p>
                            </td>
                            <td>
                                <a href="membres.php?edit=<?php echo $user['id_employe'] ?>" class="consult">Consulter</a>
                            </td>
                            <td>
                                <a href="modifier.php?edit=<?php echo $user['id_employe'] ?>" class="modif">Modifier</a>
                            </td>
                            <td>
                                <a href="bannir.php?edit=<?php echo $user['id_employe'] ?>" class="supp">Supprimer</a>
                            </td>
                            

                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </fieldset>
    <br>
        <div class="modification-box">
            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                <div style="background-color: #d4edda; color: #155724; padding: 10px; margin: 10px; border: 1px solid #c3e6cb;">
                    ✅ L'employé a bien été modifié.
                </div>
        </div>
    <?php endif; ?>
    <script>
        setTimeout(() => {
            const msg = document.querySelector('div[style*="background-color"]');
            if (msg) msg.remove();
        }, 5000); // 5 secondes
    </script>
</body>

</html>