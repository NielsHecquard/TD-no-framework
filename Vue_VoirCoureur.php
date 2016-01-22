<?php include("VoirCoureur.php");
include("connexion.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/sortable-theme-bootstrap.css">
    <script src="bootstrap/sortable.js"></script>
    <title>Liste des coureurs</title>

    <script type='text/javascript'>

        function DESC(a,b)
        {
            a=a[1]
            b=b[1]
            if(a > b)
                return -1
            if(a < b)
                return 1
            return 0
        }

        function ASC(a,b){
            a=a[1]
            b=b[1]
            if(a > b)
                return 1
            if(a < b)
                return -1
            return 0
        }

        function sortTableAlpha(tid, col, ord){
            mybody=document.getElementById(tid).getElementsByTagName('tbody')[0]
            lines=mybody.getElementsByTagName('tr')
            var sorter=new Array()
            sorter.length=0
            var i=-1;
            while(lines[++i]){
                sorter.push([lines[i],lines[i].getElementsByTagName('td')[col].innerHTML])
            }
            sorter.sort(ord)
            j=-1
            while(sorter[++j]){
                mybody.appendChild(sorter[j][0])
            }

        }

        function sortTableNumber(tid, col, ord){
            mybody=document.getElementById(tid).getElementsByTagName('tbody')[0]
            lines=mybody.getElementsByTagName('tr')
            var sorter=new Array()
            sorter.length=0
            var i=-1;
            while(lines[++i]){
                sorter.push([lines[i],lines[i].getElementsByTagName('td')[col].innerHTML])
            }
            sorter.sort(ord)
            j=-1
            while(sorter[++j]){
                mybody.appendChild(sorter[j][0])
            }

        }
    </script>
</head>
<body>
    <h1>Liste des joueurs</h1>
    <br/>
    <table class="sortable-theme-bootstrap table table-striped" data-sortable>
        <thead>
        <tr>
            <th onclick="sortTableNumber('joueurs',0,ASC)" data-sorted="true" data-sorted-direction="descending">Rang</th>
            <th onclick="sortTableAlpha('joueurs',1,ASC)">Prénom</th>
            <th onclick="sortTableAlpha('joueurs',2,ASC)">Nom</th>
            <th onclick="sortTableAlpha('joueurs',3,ASC)">Pays</th>
        </tr>
        </thead>
        <tbody>
            <?php voirCoureur($db); ?>
        </tbody>
    </table>
</body>
</html>
