<?php

function voirCoureur($db) {

    $req = $db->prepare('select * from joueur');
    $req->execute();
    while( $c = $req->fetch(PDO::FETCH_ASSOC) ){
        echo '<tr>
                <td>'. $c['id'] .'</td>
                <td>'. $c['prenom'] .'</td>
                <td>'. $c['nom'] .'</td>
                <td>'. $c['codePays'] .'</td>
            </tr>';
    }

}
?>