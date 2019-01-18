<?php
function Connexion($login, $mdp, $bdd)
{ 
 $bdd = new PDO('mysql:host=localhost;dbname=micro_blog;charset=utf8', 'root', '');
 $res = $bdd->prepare("SELECT * FROM utilisateur WHERE email = '".$login."' AND password = '".$mdp."'");
 $res->execute();
 $array = $res->fetch(PDO::FETCH_ASSOC);
    return $array;
}
?>