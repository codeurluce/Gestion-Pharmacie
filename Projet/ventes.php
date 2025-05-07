<!DOCTYPE HTML>
<html>
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" type="text/css" href="fiche.css" media="screen"/>
        <title>Vente</title>
    </head>
    <body>
    <img src="images/image" alt="logo" class="logo">
    <section id="bann">
        <div class="pharma">PHARMACIE</div>

        <form action="vente.php" method="POST">
            <div class="inscription-box">
            <h1>saisir</h1>
                        <div class="boxtext">

            <input type="number" name="code" id="code" placeholder="Le code du produit" required>
                </div> 
                <div class="boxtext">
            <input type="number" name="quantite" id="quantite" placeholder="La quantite à vendre" required>
        </div>
        <div class="boxtext">
            <input type="date" name="date" placeholder="la date" id="date" required>
        </div>
        <div class="boxtext">
            <input type="number" name="identifiant" id="identifiant" placeholder="L'identifiant du vendeur" required>
        </div><br><br><br><br><br><br><br>
        <input type="submit" value="Vendre" class="annul">	
        </form>
    </section>
	<body>
</html>    