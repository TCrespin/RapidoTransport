<?php
    session_start();
    if(!isset($_SESSION["onuser"]) || $_SESSION["onuser"] === false){
        header("Location: login.php");
    }

?>
<?php
    $chauffeur = $_POST["chauffeur"];
    $id = $_POST["id"];

    try{
        include("connexion.php");
        $req = $con->prepare("UPDATE chauffeurs SET disponible = ? WHERE chauffeur_id = ?");
        $req->execute(array($chauffeur, $id));
        $req->closeCursor();
        echo "c'est bon";
    }catch(PDO){
    }
?>