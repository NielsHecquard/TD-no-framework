<?php
include("Vue_AjoutJoueur.php");

//Affichage
function afficherCode_Pays($db) {
    $req = $db->prepare('select * from pays');
    $req->execute();
    while( $c = $req->fetch(PDO::FETCH_ASSOC) ){
        echo '<option value= "' .$c['code'] . '" >' .$c['libelle'] . '</option>';
    }
}

//Enregistrement base
if( isset($_POST['nom']) && isset($_POST['prenom']) ) {
    ajoutJoueur($db);

}

function ajoutJoueur($db) {
    $num = recupNumJoueurMax($db);
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $pays = $_POST['pays'];
    $annee = $_POST['annee'];
    $rang = $_POST['rang'];
    $points = $_POST['points'];
    $diff = $_POST['diff'];
    $nbMatchs = $_POST['nbMatchs'];

    $ok = verifier($db, $nom, $prenom, $pays, $rang);

    if ($ok==false) {
        $req = $db->prepare('insert into joueur(id, prenom, nom, codePays) values(:num, :prenom, :nom, :pays)');
        $req->execute(array(
            'num' => $num,
            'prenom' => $prenom,
            'nom' => $nom,
            'pays' => $pays
        ));

        $req = $db->prepare('insert into classement(idJoueur, annee, rang, points, diff, nbMatchs) values(:num, :annee, :rang, :points, :diff, :nbMatchs)');
        $req->execute(array(
            'num' => $num,
            'annee' => $annee,
            'rang' => $rang,
            'points' => $points,
            'diff' => $diff,
            'nbMatchs' => $nbMatchs
        ));

        header('location: AjoutJoueur.php?insere=oui');
    }
    else header('location: AjoutJoueur.php?insere=non');
}

function recupNumJoueurMax($db)
{
    $req = $db->prepare('SELECT MAX(id)+1 AS NUM FROM joueur');
    $req->execute();
    $num = $req->fetch();
    return $num['NUM'];
}

function verifier($db, $nom, $prenom, $pays, $rang) {
    $retour=false;

    //On vérifie que le joueur n'existe pas
    $req = $db->prepare('select prenom, nom, codePays from joueur where prenom=:prenom and nom=:nom and codePays=:pays');
    $req->execute(array(
        'prenom' => $prenom,
        'nom' => $nom,
        'pays' => $pays
    ));
    while( $c = $req->fetch(PDO::FETCH_ASSOC) ){
        if(isset($c['NOM']))
            $retour = false;
        else $retour = true;
    }

    //On vérifier que le rang n'existe pas
    $req = $db->prepare('select rang from classement where rang = :rang');
    $req->execute(array(
        'rang' => $rang,
    ));
    while( $c = $req->fetch(PDO::FETCH_ASSOC) ){
        if(isset($c['RANG']))
            $retour = false;
        else $retour = true;
    }

    return $retour;
}
?>