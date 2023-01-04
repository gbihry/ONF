<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";
    $lesLieux = ModeleObjetDAO::getLieuLivraison();
    $lesChef = ModeleObjetDAO::getChef();
    $lesRole =  ModeleObjetDAO::getLesRole();
    $lesMetier = ModeleObjetDAO::getMetier();
    include_once "$racine/vue/vueAjoutUtilisateur.php";
    include_once "$racine/vue/vuePied.php";

        if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur'){
            if(!empty($_POST)){
                ModeleObjetDAO::insertUtilisateur($_POST['login'],password_hash($_POST['tel'], PASSWORD_DEFAULT),$_POST['prenom'],$_POST['nom'],$_POST['mail'],$_POST['tel'],
                $_POST['livraison'],$_POST['chef'],$_POST['role'],$_POST['metier'],$_POST['agence']);
            }
        }else {
            header("location:./?action=accueil");
        }
?> 