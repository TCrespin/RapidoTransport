<?php
    session_start();
    if(!isset($_SESSION["onuser"]) || $_SESSION["onuser"] === false){
        header("Location: login.php");
    }

?>
<?php
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $telephone = $_POST["telephone"];
    $sexe = $_POST["sexe"];
    $disponible = true;

    if(isset($nom) && isset($prenom) && isset($telephone)){
        if($nom != ""){
            if($nom != ""){
                if(!empty($telephone)){
                    try{
                        include("../php/connexion.php");
                        $req = $con->prepare("INSERT INTO chauffeurs(nom, prenoms, telephone, sexe, disponible)
                        VALUES(?,?,?,?,?)");

                        $req->execute(array($nom,$prenom,$telephone,$sexe,$disponible));

                        $req->closeCursor();
                    }catch(PDOException $e){
                        echo "Erreur: ".$e->getMessage();
                    }
                }
                else{
                    $result = "Le numéro de téléphone ne peut pas être vide!";
                }
            }
            else{
                $result = "Le prenom n'est pas rempli!";
            }
        }
        else{
            $result = "Le nom n'est pas rempli!";
        }
    }
    else{
        echo "Erreur!";
    }
    header("Location: ../pages/index.php");
?>