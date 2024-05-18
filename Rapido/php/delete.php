<?php
    session_start();
    if(!isset($_SESSION["onuser"]) || $_SESSION["onuser"] === false){
        header("Location: login.php");
    }

?>
<?php
    $id = $_POST["id"];

    if(isset($id)){
        try{
            include("connexion.php");
            $req = $con->prepare("DELETE FROM courses WHERE course_id = ? AND statut = ? ");
            $req->execute(array($id, "En attente"));
        }catch(PDOException $e){
            echo "Erreur";
        }
    }

    header("Location: ../pages/index.php");

?>