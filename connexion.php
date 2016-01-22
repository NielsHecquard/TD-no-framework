<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=atp', 'root', '');
}
catch(Exception $e) {
    echo "Échec : " . $e->getMessage();
}
