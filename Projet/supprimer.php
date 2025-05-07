<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fiche.css" media="screen"/>
    <title>supression réussie</title>
</head>

<body>
<img src="images/image" alt="logo" class="logo">
    <section id="bann">
        <div class="pharma">PHARMACIE</div>

        <fieldset><legend class="leg"><h1> Informations suppimés </h1></legend><br>
			<?php

if (isset($_POST['delete'])){
    $identite=$_POST['id_employe'];
    $username=$_POST['pseudo'];
           
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=db_pharmacie;charset=utf8' , 'root' , '');
             $reponse= $bdd->query('SELECT * FROM employe');
            $servname = "localhost"; $dbname = "db_pharmacie"; $user = "root"; $pass = "";
      
           $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
           $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
           $sql = "DELETE  FROM employe  WHERE id_employe='$identite' " ;
           $sth = $dbco->prepare($sql);
           $sth->execute();
          
           $count = $sth->rowCount();
           print( ' ' .$count. ' élément supprimé. </br>');
           print('');
       }
            
       catch(PDOException $e){
           echo "Erreur : " . $e->getMessage();
       }
       if($count > 0){
       echo " <br><h3><B> L'emplyé « $username » avec l'identite « $identite » est supprimé(e) !</B></h3> ";
}else{
    echo " <br><h3><B> Cet employé n'existe pas !</B></h3> ";
}
}
?>
<br>
<a href="administrateur.html"><input type="submit" value="Retour" class="back" ></a>
</fieldset>
    </section>
</body>

</html>