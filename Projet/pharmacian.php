<?php
$bdd = new PDO ('mysql:host=localhost;dbname=pharmacyms;', 'root', '');
session_start();
if (isset($_POST['Valider'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo_par_defaut = "luce";
        $mdp_par_defaut = "l86n";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi= htmlspecialchars($_POST['mdp']);

        if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut){
             $_SESSION['mdp'] = $mdp_saisi;
             header('location: index.php');
        }else{
            echo " Mot de passe ou pseudo est incorrecte !!! ";
        }

    }else {
        echo "veuillez saisir tous les champs...";
    }
}
?>