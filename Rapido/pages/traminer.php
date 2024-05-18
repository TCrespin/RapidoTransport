
    <section id="">
            <div>
                <table>
                    <?php
                        include('../php/connexion.php');
                        $req = $con->prepare("SELECT * FROM courses WHERE statut = 'Terminée'");
                        $req->execute();
                        $reqs = $req->fetchAll();
                        if(!empty($reqs)){
                            echo "
                            <thead>
                                <th>ID</th>
                                <th>Départ</th>
                                <th>Arrivée</th>
                                <th>Date et Heure</th>
                                <th>Chauffeur</th>
                                <th>Statut</th>
                            </thead>
                            ";
                        }
                    
                        try{

                            foreach($reqs as $request){
                                echo "<tr>";
                                echo "<td>". $request["course_id"] ."</td>";
                                echo "<td>". $request["point_depart"] ."</td>";
                                echo "<td>". $request["point_arrivee"] ."</td>";
                                echo "<td>". $request["date_heure"] ."</td>";
                                $rec = $con->query("SELECT * FROM chauffeurs Where chauffeur_id = {$request['chauffeur_id']}");
                                $recs = $rec->fetch();
                                if(!empty($recs)){
                                    echo "<td>". $recs["nom"]. " ". $recs["prenoms"]. "</td>";
                                }
                                else{
                                    echo "<td>Aucun</td>";
                                }
                                $rec->closeCursor();
                                echo "<td>Terminée</td>";
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
