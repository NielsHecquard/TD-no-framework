<?php include("VoirJoueur.php");
include("connexion.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF8 / ISO 8859-1" />
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/sortable-theme-bootstrap.css">
    <script src="bootstrap/sortable.js"></script>
    <script src="bootstrap/jquery.min.js"></script>

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

        $(document).ready(function () {

            (function ($) {

                $('#filter').keyup(function () {

                    var rex = new RegExp($(this).val(), 'i');
                    $('.searchable tr').hide();
                    $('.searchable tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();

                })

            }(jQuery));

        });
    </script>
</head>
<body>
    <h1>Liste des joueurs</h1>
    <br/>

    <div id="liste_coureur">
        <div class="input-group"> <span class="input-group-addon">Filtre</span>
            <input id="filter" type="text" class="form-control" placeholder="Lancer votre recherche ici...">
        </div><br/>
        <table class="sortable-theme-bootstrap table table-striped" data-sortable>
            <thead>
            <tr>
                <th onclick="sortTableNumber('joueurs',0,ASC)" data-sorted="true" data-sorted-direction="descending">Rang</th>
                <th onclick="sortTableAlpha('joueurs',1,ASC)">Prénom</th>
                <th onclick="sortTableAlpha('joueurs',2,ASC)">Nom</th>
                <th onclick="sortTableAlpha('joueurs',3,ASC)">Pays</th>
            </tr>
            </thead>
            <tbody class="searchable">
                <?php voirCoureur($db); ?>
            </tbody>
        </table>
    </div>
</body>
</html>