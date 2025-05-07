<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fiche.css" media="screen"/>
    <title>Vente</title>
    <link  >
</head>
<body>
    <img src="images/image" alt="logo" class="logo">
    <section id="bann">
        <div class="pharma">PHARMACIE</div>
    <fieldset><legend><h1>Les Produits </h1></legend>
        <br>
        <table>
            <thead>
                <th>Code </th>
                <th>Nom </th>
                <th>Prix  </th>
                <th>emplacement  </th>
                <th>date expiration  </th>
                <th>QteStock </th>
                <th>Action </th>

            </thead>
        
            <tbody>
        
                    <?php    
            $bdd = new PDO ('mysql:host=localhost;dbname=db_pharmacie;', 'root', '');
            $recupUsers = $bdd->query('SELECT * FROM produit ');
        
        
            while($user = $recupUsers->fetch()){
                
                    ?> 
                <tr>
                    <td> <p> <?= $user['code_produit']?> </p></td>
                    <td> <p> <?= $user['nom_produit']?> </p></td>
                    <td> <p> <?= $user['prix_produit']?> </p></td>
                    <td> <p> <?= $user['emplacement']?> </p></td>
                    <td> <p> <?= $user['date_expiration']?> </p></td>
                    <td> <p> <?= $user['quantite_stock']?> </p></td>
                    <td>
                        <a href="ventes.php?edit= <?php echo $user['code_produit'] ?>"  class="modif">Vendre</a>
                    </td>        
        
                </tr>
         
        <?php
            }
        ?>
            </tbody>
        </table>
        </fieldset>
            <a href="administrateur.html"><input type="submit" value="Retour" class="annuler" ></a>
        </section>
        </body>
        
        </html>
    </section>
</body>
</html>