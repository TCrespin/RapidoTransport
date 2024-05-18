
<section id="chauffeur">
    <div>
        <form action="../php/insertChauffeur.php" method="post">
            <div>
                <label for="nom">Nom:</label>
                <input type="text" name="nom" id="nom">
            </div>
            <div>
                <label for="prenom">Prénoms:</label>
                <input type="text" name="prenom" id="prenom">
            </div>
            <div>
                <label for="numero">Téléphone:</label>
                <input type="tel" name="telephone" id="numero">
            </div>
            <div>
                <label for="sexe">Sexe:</label>
                <select name="sexe" id="sexe">
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                </select>
            </div>
            <button type="submit" class="modify">Soumettre</button>
        </form>
    </div>
</section>
        
<section id="">
    <div>
        <table>
            <?php
                include('../php/connexion.php');
                $req = $con->prepare("SELECT * FROM chauffeurs ORDER BY disponible DESC");
                $req->execute();
                $reqs = $req->fetchAll();
                if(!empty($reqs)){
                    echo "<h2>Les chauffeurs:</h2>";
                    echo "
                        <thead>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénoms</th>
                            <th>Sexe</th>
                            <th>Téléphone</th>
                            <th>Disponibilité</th>      
                        </thead>
                    ";
                }
                    
                try{
                    foreach($reqs as $request){
                        echo "<tr>";
                        echo "<th>". $request["chauffeur_id"] ."</th>";
                        echo "<th>". $request["nom"] ."</th>";
                        echo "<th>". $request["prenoms"] ."</th>";
                        echo "<th>". $request["sexe"] ."</th>";
                        echo "<th>". $request["telephone"] ."</th>";
                        if($request["disponible"] == 1){
                            echo '<th>
                                <form  id="formdispChauffeur">
                                    <input type="number" name="id" title="id" value="'. $request["chauffeur_id"].'" hidden>
                                    <select name="chauffeur" title="chauffeur">
                                        <option value="1">disponible</option>
                                        <option value="0">indisponible</option>
                                    </select>
                                </form>
                            </th>';
                        }
                        else{
                            $chauf = $con->prepare("SELECT * FROM courses WHERE statut = ? AND chauffeur_id = ?");
                            $chauf->execute(array("En cours", $request["chauffeur_id"]));
                            $chaufs = $chauf->fetch();

                            if(empty($chaufs)){
                                echo '<th>
                                <form  id="formChauffeur">
                                    <input type="number" name="id" title="id" value="'. $request["chauffeur_id"].'" hidden>
                                    <select name="chauffeur" title="chauffeur">
                                        <option value="0">indisponible</option>
                                        <option value="1">disponible</option>
                                    </select>
                                </form>
                                </th>';
                            }
                            else{
                                echo "<th>indisponible</th>";
                            }
                            $chauf->closeCursor();
                        }
                        echo "</tr>";
                    }
                }catch(PDOException $e){
                    echo "Erreur: ". $e->getMessage();
                }
                $req->closeCursor();
            ?>
        </table>
    </div>
</section>