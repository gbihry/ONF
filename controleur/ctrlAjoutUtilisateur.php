<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";
    $lesLieux = ModeleObjetDAO::getLieuLivraison();
    $lesEmployeur = ModeleObjetDAO::getEmployeur();
    $lesResponsables = ModeleObjetDAO::getResponsable();
    $lesRole =  ModeleObjetDAO::getLesRole();
    $lesMetier = ModeleObjetDAO::getMetier();
    $lesAgences = ModeleObjetDAO::getAgence();
   
    include_once "$racine/vue/vuePied.php";

        if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur' ||
         ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Super-Administrateur'){
            if(!empty($_POST)){
                if ($_POST['livraison'] == 'selectionner' || $_POST['responsable'] == 'selectionner' || $_POST['role'] == 'selectionner' || $_POST['metier'] == 'selectionner' || $_POST['agence'] == 'selectionner'){
                    return false;
                }else{
                    ModeleObjetDAO::insertUtilisateur($_POST['mail'],password_hash($_POST['tel'], PASSWORD_DEFAULT),$_POST['prenom'],$_POST['nom'],$_POST['mail'],$_POST['tel'],
                    $_POST['livraison'],$_POST['responsable'],$_POST['role'],$_POST['metier'],$_POST['agence']);
                }
                
                
                
                
            }
        }else {
            header("location:./?action=accueil");
        }

        include_once "$racine/vue/vueAjoutUtilisateur.php";
?> 