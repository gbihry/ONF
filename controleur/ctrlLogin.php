<?php

include_once "$racine/modele/ModeleObjetDAO.php";

//Tester si l'utilisateur à déjà cliquer sur "valider"
$valider = filter_input(INPUT_POST, 'valider');

if(isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}
$error = "";

if($valider){
    //On récupère les données passées en POST
    $login = filter_input(INPUT_POST, 'nomLogin', FILTER_SANITIZE_STRING);
    $mdp = filter_input(INPUT_POST, 'mdpLogin', FILTER_SANITIZE_STRING);

    //Test si l'utilisateur à le bon mot de passe et le bon login

    $verifLogin = ModeleObjetDAO::getLogin($login);
    $verifMdp = ModeleObjetDAO::getMdp($login);

    password_hash($mdp, PASSWORD_DEFAULT);

        if($verifLogin != 0 && $verifMdp != 0){
            if($login == $verifLogin['login']) {
                if(password_verify($mdp,$verifMdp['password'])) {
                    $tel = ModeleObjetDAO::getTelUtilisateur($login);
                    if($mdp == $tel) {
                        session_start();
                        $_SESSION['login'] = $login;
                        $_SESSION['wait'] = 'newmdp';
                        header("location:./?action=newmdp");
                    } else {
                        session_start();
                        //Création des variables de session
                        $_SESSION['autorise'] = true;
                        $_SESSION['login'] = $login;

                        date_default_timezone_set('Europe/Paris');
                        $id = (ModeleObjetDAO::getIdUtilisateur($_SESSION['login']))["id"];
                        $description = "Connexion de ".$_SESSION['login'];
                        $date = date( "Y-m-d H:i:s");
                        ModeleObjetDAO::insertLog($date,$description,$id);
                        
                        //On redirige vers la page confidentielle
                        header("location:index.php");
                    }
                } else {
                    $error = "Login ou mot de passe incorrect";
                }
            } else {
                $error = "Login ou mot de passe incorrect";
            }
        }else{
            $error = "Login inconnu";
        }   
}

// Affichage des vues
include "$racine/vue/vueEntete.php";
include "$racine/vue/vueLogin.php";
include "$racine/vue/vuePied.php";

