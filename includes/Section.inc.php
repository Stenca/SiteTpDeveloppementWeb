<!-- About Section -->
<section>
    <div class="container">
        <div class="row">              
            <form action="index.php" method="post">
                <div class="col-sm-10">  
                    <div class="form-group">
                        <?php
                            if(!isset($_GET['id']) && !isset($_GET['Supp'])){ 
                                echo '<textarea id="message" name="message" class="form-control" placeholder="Message"></textarea>';
                            }
                            elseif(isset($_GET['id'])){
                                $req = $bdd->prepare('SELECT * FROM messages WHERE id=:id');
                                $req->execute(array(
                                        'id' => $_GET['id']
                                        ));
                                $donnees = $req->fetch();
                                echo '<textarea id="message" name="message" class="form-control" placeholder="Message">'.$donnees['contenu'].'</textarea>';
                                echo '<input type="hidden" name="id" value="'.$donnees['id'].'">';
                            }
                            elseif(isset($_GET['Supp'])){ //Supprime un message
                                $req = $bdd->exec("DELETE FROM messages WHERE id=".$_GET['Supp']."");
                                header('location:index.php');
                            }
                        ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                </div>
                <?php
                    if(!empty($_POST)){ // Insère un nouveau message dans la base
                        $contenu = $_POST['message'];
                        $date = date("Y-m-d H:i:s");
                        if(!isset($_POST['id'])){
                            $req = $bdd->prepare('INSERT INTO messages(contenu, date) VALUES(:contenu, :date)');
                            $req->execute(array(
                                    'contenu' => $contenu,
                                    'date' => $date,
                                    ));
                        }
                        elseif(isset($_POST['id'])){ // Modifie un message
                            $req = $bdd->prepare('UPDATE messages SET contenu = :contenu, date = :date WHERE id=:id');
                            $req->execute(array(
                                    'contenu' => $contenu,
                                    'date' => $date,
                                    'id' => $_POST['id']
                                    ));
                        }
                        header('location:index.php');
                    }

                    if(isset($_GET['Vote'])){ // Ajoute un vote au message
                        $ip = $_SERVER['REMOTE_ADDR'];
                        $id = $_GET['Vote'];
                        $req = 'SELECT ip FROM messages WHERE id='.$id.'';
                        $res= $bdd->query($req);
                        $derniereIp = $res->fetch();
                        if($ip != $derniereIp['ip']) { // Annule l'ajout de vote si l'ip est la même que celle qui vient de voter
                            $req2 = $bdd->prepare('UPDATE messages SET compteur = compteur+1 WHERE id='.$id.'');
                            $req3 = $bdd->prepare('UPDATE messages SET ip = :ip WHERE id= :id');
                            $req2->execute();
                            $req3->execute(array(
                                 'ip' => $ip,
                                 'id' => $id
                            ));
                         }
                        else {
                            echo "Vous avez déjà voté";
                        }
                    }
                ?>
            </form>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php         
                    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
                    $limite = 5;
                    $debut = ($page - 1) * $limite;
                    $query = ('SELECT * FROM messages ORDER BY date DESC LIMIT :limite OFFSET :debut');
                    $query = $bdd->prepare($query);
                    $query->bindValue('debut', $debut, PDO::PARAM_INT);
                    $query->bindValue('limite', $limite, PDO::PARAM_INT);
                    $query->execute();

                    while ($donnees = $query->fetch()) // Affiche la liste des messages
                    {
                        $id = $donnees['id'];
                        echo '<blockquote><p>'. $donnees['contenu'].'</p><footer>'.$donnees['date'].' - '.$donnees['compteur'].' votes</footer>';
                        echo '<table><tr><form action="index.php" method="GET"><button type="submit" class="btn btn-success btn-sm">Modifier</button><input type="hidden" name="id" value="'.$id.'"></form></tr>';
                        echo '<tr><form action="index.php" method="GET"><button type="submit" class="btn btn-success btn-sm" value="Supprimer">Supprimer</button><input type="hidden" name="Supp" value="'.$id.'"></form></tr>';
                        echo '<tr><form action="index.php" method="GET"><button type="submit" class="btn btn-success btn-sm" value="Voter">Voter</button><input type="hidden" name="Vote" value="'.$id.'"></form></tr></table></blockquote>';

                    }
                ?><a href="?page=<?php echo $page - 1; ?>">Page précédente</a>
                    —
                <a href="?page=<?php echo $page + 1; ?>">Page suivante</a>
            </div> 
        </div>
    </div>
</section>