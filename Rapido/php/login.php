<?php
    session_start();
    if(!isset($_SESSION["message"])){
        header("Location: ../pages/login.php");
    }
    $_SESSION["onuser"] = false;
    $mail = $_POST["mail"];
    $password = $_POST["password"];

    if(empty($mail)){
        $_SESSION["message"] = "Entrez votre mail!";
        header("Location: ../pages/login.php");
    }
    else if(empty($password)){
        $_SESSION["message"] = "Entrez votre mot de passe!";
        header("Location: ../pages/login.php");
    }
    else{
        try{
            include("connexion.php");
            $req = $con->prepare("SELECT * FROM users WHERE mail = ?");
            $req->execute(array($mail));
            $user = $req->fetch();
            if(empty($user)){
                $_SESSION["message"] = "Désolé, votre mail n'est pas enregistré!";
                $req->closeCursor();
                header("Location: ../pages/login.php");
            }
            else{
                if($password == $user["password"]){
                    $_SESSION["onuser"] = true;
                    $req->closeCursor();
                    header("Location: ../pages/index.php");
                }
                else{
                    $_SESSION["message"] = "Votre password est incorrect!";
                    $req->closeCursor();
                    header("Location: ../pages/login.php");
                }
            }
        }catch(PDOException $e){
            echo "Erreur: ".$e->getMessage();
        }
    }
?>