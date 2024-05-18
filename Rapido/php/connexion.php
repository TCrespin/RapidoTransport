<?php
    if(!isset($_SESSION["onuser"]) || $_SESSION["onuser"] === false){
        header("Location: login.php");
    }

    $server = "localhost";
    $user = "root";
    $mdp = "";
    $bdd = "rapido-transport";

    try{
        $con = new PDO("mysql:host=$server;dbname=$bdd", $user, $mdp);
    }
    catch(PDOException $e){
        echo "La connexion à la base de donnée échouée!";
    }
?>