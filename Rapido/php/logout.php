<?php
    session_start();
    if(!isset($_SESSION["onuser"]) || $_SESSION["onuser"] === false){
        header("Location: login.php");
    }

    $_SESSION["message"] = "Vous êtes déconnecté!";
    $_SESSION["onuser"] == false;
    header("Location: login.php");
?>