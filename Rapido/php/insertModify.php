<?php
    session_start();
    if(!isset($_SESSION["onuser"]) || $_SESSION["onuser"] === false){
        header("Location: login.php");
    }

?>
<?php
    include("../php/connexion.php");
    $id = $_POST["id"];
    $depart = $_POST["depart"];
    $arrive = $_POST["arrive"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $date_time = $time. " " .$date;
    $chauffeur = $_POST["chauffeur"];
    $statut = $_POST["statut"];

    try{
        if(isset($chauffeur) && isset($statut)){
            if($chauffeur != 0){
                if($statut != "En attente"){
                    $req = $con->prepare("UPDATE courses SET chauffeur_id = ?, statut = ?
                    WHERE course_id = ?
                    ");
                    $req->execute(array($chauffeur, $statut, $id));
                    $req->closeCursor();

                    if($statut == "En cours"){
                        $req = $con->prepare("UPDATE chauffeurs SET disponible = false
                        WHERE chauffeur_id = ?
                        ");
                        $req->execute(array($chauffeur));
                        $req->closeCursor();
                    }
                    else{
                        $req = $con->prepare("UPDATE chauffeurs SET disponible = true
                        WHERE chauffeur_id = ?
                        ");
                        $req->execute(array($chauffeur));
                        $req->closeCursor();
                    }
                    
                }
            }
            else{
                $result = "Le chauffeur n'est pas été choisi!";
            }
        }
    }catch(PDOException $e){
        echo "Erreur: ". $e->getMessage();
    }
    header("Location: ../pages/index.php");
?>