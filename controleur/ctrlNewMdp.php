<?php

include_once "$racine/modele/ModeleObjetDAO.php";
include "$racine/vue/vueEntete.php";

$error = "";

$valider = filter_input(INPUT_POST, 'valider');

if($valider) {
    if(!isset($_GET['id'])){
        $motDePasseActuel_INPUT = filter_input(INPUT_POST, 'mdpActuel');
    }else{
        $motDePasseActuel = null;
    }
    $nouveauMotDePasse_INPUT = filter_input(INPUT_POST, 'mdpNew');
    $nouveauMotDePasse2_INPUT = filter_input(INPUT_POST, 'mdpNewConfirm');

    if(isset($_GET['id'])){
        if($nouveauMotDePasse_INPUT == $nouveauMotDePasse2_INPUT && $_SESSION['login'] != null){
            $login = ModeleObjetDAO::getLoginById($_GET['id'])['login'];
            $try = ModeleObjetDAO::updateMdp($login, $motDePasseActuel, $nouveauMotDePasse_INPUT);
            if($try === true) {
                header("location:./?action=users&msgResp=" . urlencode('Mot de passe modifié à l\'utilisateur suivant : '.$login.' '));

                date_default_timezone_set('Europe/Paris');

                $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
                $description = "L'utilisateur ".$_SESSION['login']." à changer le mdp de ".$login;
                $date = date( "Y-m-d H:i:s");
                ModeleObjetDAO::insertLog($date,$description,$id);
            } else {
                $error = $try;
            }
        }
    }elseif(isset($_GET['idUser'])){
        if($nouveauMotDePasse_INPUT == $nouveauMotDePasse2_INPUT && $_SESSION['login'] != null){
            $try = ModeleObjetDAO::updateMdp($_SESSION['login'], $motDePasseActuel_INPUT, $nouveauMotDePasse_INPUT);
            if($try === true) {
                session_destroy();
                header("location:./?action=login&msg=" . urlencode('Mot de passe modifié, veuillez vous reconnecter.'));

                date_default_timezone_set('Europe/Paris');

                $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
                $description = "L'utilisateur ".$_SESSION['login']." à changer de mdp";
                $date = date( "Y-m-d H:i:s");
                ModeleObjetDAO::insertLog($date,$description,$id);
            } else {
                $error = $try;
            }
        }
    }elseif($nouveauMotDePasse_INPUT == $nouveauMotDePasse2_INPUT && $_SESSION['login'] != null && $_SESSION['wait'] == 'newmdp') {
        
            
        $try = ModeleObjetDAO::updateMdp($_SESSION['login'], $motDePasseActuel_INPUT, $nouveauMotDePasse_INPUT);
        
        
        if($try === true) {
            session_destroy();
            header("location:./?action=login&msg=" . urlencode('Mot de passe modifié, veuillez vous reconnecter.'));
        } else {
            $error = $try;
        }
    } else {
        $error = "Les mots de passe ne correspondent pas";
    }
}

// Affichage des vues
include "$racine/vue/vueNewMdp.php";
include "$racine/vue/vuePied.php";

