<?php
    session_start();
    if(!isset($_SESSION["onuser"]) || $_SESSION["onuser"] === false){
        header("Location: login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAPIDO Transport Interurbain</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/ajouter.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/corps.css">
</head>
<body>
    <div class="corps">
        <header>
            <div>
                <img src="../assets/images/Logo-Rapido-16x9.jpg" alt="RAPIDO">
                <p>Transport Interurbain De Taxi</p>
            </div>
        </header>
        <hr>
        <section id="divmodify">
            <h2>Modifier un transport</h2>
            <div >
                <form action="../php/insertModify.php" method="post">
                    <?php
                        if(isset($_POST["id"])){
                            $id = $_POST["id"];
                            if(isset($id)){
                                try{
                                    include("../php/connexion.php");
                                    $req = $con->query("SELECT * FROM courses WHERE course_id = {$id}");
                                    $req = $req->fetch();
                                    $data = explode(" ", $req["date_heure"], 2);
                                }catch(PDOException){
                                    header("Location: index.php"); 
                                }
                            }else{
                                echo "Erreur!"; 
                            }
                    ?>
                    <div>
                        <label for="id">ID:</label>
                        <input type="text" name="id" id="id" value="<?php echo $req['course_id'];?>" readonly>
                    </div>
                    <div>
                        <label for="depart">Départ:</label>
                        <input type="text" name="depart" id="depart" readonly value="<?php echo $req['point_depart'];?>">
                    </div>
                    <div>
                        <label for="arrive">Arrivée:</label>
                        <input type="text" name="arrive" id="arrive" readonly value="<?php echo $req['point_arrivee'];?>">
                    </div>
                    <div>
                        <label for="date">Date:</label>
                        <input type="date" name="date" id="date" readonly value="<?php echo $data[1];?>">
                    </div>
                    <div>
                        <label for="time">Time:</label>
                        <input type="time" name="time" id="time" readonly value="<?php echo $data[0];?>">
                    </div>
                    <div>
                        <label for="chauffeur">Chauffeur:</label>
                        <select name="chauffeur" id="chauffeur">
                        <?php
                            if($req["statut"] == "En attente"){
                                try{
                                    $red = $con->query("SELECT * FROM chauffeurs WHERE disponible = true ORDER BY nom");
                                    $reds = $red->fetchAll();
                                    foreach($reds as $request){
                                        echo '<option value="'. $request["chauffeur_id"]. '">'. $request["nom"]. " ". $request["prenoms"].'</option>';
                                    }
                                    if(empty($reds)){
                                        echo '<option value="0">Aucun</option>';
                                    }
                                }catch(PDOException $e){
                                    echo "Erreur: ". $e->getMessage();
                                }
                                $red->closeCursor();
                            }else if($req["statut"] == "En cours")
                            {
                                try{
                                    $rec = $con->query("SELECT * FROM chauffeurs Where chauffeur_id = {$req["chauffeur_id"]}");
                                    $recs = $rec->fetch();
                                    if(!empty($recs)){
                                        echo '<option value="'. $recs["chauffeur_id"]. '">'. $recs["nom"]. " ". $recs["prenoms"].'</option>';
                                    }
                                    $rec->closeCursor();
                                }catch(PDOException $e){
                                    echo "Erreur: ". $e->getMessage();
                                }
                            }
                        ?>
                        </select>
                    </div>
                    <div>
                        <label for="statut">Statut:</label>
                        <select name="statut" id="statut">
                        <?php
                            if($req["statut"] == "En attente"){
                                echo '
                                    <option value="En attente">En attente</option>
                                    <option value="En cours">En cours</option>
                                    <option value="Terminée">Terminée</option>
                                ';
                            }else if($req["statut"] == "En cours")
                            {
                                echo '
                                    <option value="En cours">En cours</option>
                                    <option value="Terminée">Terminée</option>
                                ';
                            }
                        }
                            
                        ?>
                        </select>
                        
                    </div>
                    <div class="btns">
                        <button type="button" onclick="history.back()" class="annuler" >Annuler</button>
                        <button type="submit" class="modify">Soumettre</button>
                    </div>
                </form>
                <div class="btn-del">
                <?php
                    if($req["statut"] == "En attente") {
                        echo '
                            <form action="../php/delete.php" method="post">
                                <input type="text" name="id" title="id" value="'. $req['course_id'] .'" readonly hidden>
                                <button type="submit" class="delete">Delete</button>
                            </form>
                        ';
                    }
                ?>
                </div>
            </div>
        </section>
        <footer>
            <h6 class="botTitle">TRANSPORT INTERURBAIN DE TAXI</h6>
            <aside>
                <img src="../assets/images/Logo-Rapido-16x9.jpg" alt="RAPIDO">
                <div>
                    <h6>Les Responsables</h6>
                    <ul>
                        <li>M. Jackson</li>
                        <li>M. Oliver</li>
                        <li>Md. Edi</li>
                    </ul>
                </div>
            </aside>
        </footer>
    </div>
</body>
</html>