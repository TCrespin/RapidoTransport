<?php
    session_start();
    if(!isset($_SESSION["onuser"]) || $_SESSION["onuser"] === false){
        header("Location: login.php");
    }

?>
<?php
    include("../php/connexion.php");

    $depart = $_POST["depart"];
    $arrive = $_POST["arrive"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $date_time = $time. " " .$date;
    $chauffeur = 0;
    $statut = "En attente";

    try{
        if(isset($depart) && isset($arrive) && isset($date) && isset($time)){
            if($depart != ""){
                if($arrive != ""){
                    $req = $con->prepare("INSERT INTO courses(point_depart, point_arrivee, date_heure, chauffeur_id, statut)
                    VALUES (?,?,?,?,?)");
                    $req->execute(array($depart, $arrive, $date_time, $chauffeur, $statut));
                    //$req->closeCursor();
                }
                else{
                    $result = "Le champs départ n'est pas rempli!";
                }
            }
            else{
                $result = "Le champs départ n'est pas rempli!";
            }
        }
    }catch(PDOException $e){
        echo "Erreur: ". $e->getMessage();
    }
    header("Location: ../pages/index.php");
?>