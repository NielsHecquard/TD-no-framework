<?php include("connexion.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF8 / ISO 8859-1" />
    <?php
        //include("Menu.html");
        if( isset($_GET['insere']) && $_GET['insere'] == 'non' ) {
            echo "Le joueur n'a pas été inséré. Vérifiez qu'il n'existe pas déjà ou que son rang n'est pas déjà occupé";
        }
        if( isset($_GET['insere']) && $_GET['insere'] == 'oui' ) {
            echo "Le joueur a bien été inséré";
        }
    ?>
<title>Ajout d'un joueur</title>
<script>
    function VerifValid()
    {
        if(Form_Joueur.nom.value == "")
        {
            alert("Le nom n'est pas rempli");
            return false;
        }
        else if(Form_Joueur.prenom.value == "")
        {
            alert("Le prenom n'est pas rempli");
            return false;
        }
        else
        {
            return true;
        }
    }
</script>

</head>
<body>
<h1>Ajout d'un joueur</h1>
<form name="Form_Joueur" method="post" action="AjoutJoueur.php" onsubmit='return VerifValid()' >
    <label>CODE_TDF (nationalité):</label>
    <select name="pays" size="1" onChange="select.value='pays'" >
        <?php
            afficherCode_Pays($db);
        ?>
    </select>
    <br />
    <label>Nom:</label>
    <input type="text" name="nom" placeholder="Obligatoire" /> <br />
    <label>Prénom:</label>
    <input type="text" name="prenom" placeholder="Obligatoire" /> <br />
    <label>Année</label>
    <input type="number" name="annee" maxlength="4" min="1900" /> <br />
    <label>Rang</label>
    <input type="number" name="rang" min="1" /> <br />
    <label>Points</label>
    <input type="number" name="points" min="1" /> <br />
    <label>Différence</label>
    <input type="number" name="diff" /> <br />
    <label>Nombre de matchs</label>
    <input type="number" name="nbMatchs" min="1" /> <br /><br />
    <input type="submit" id="envoyer" value="Envoyer" />
</form>

</body>
</html>

