<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include "$racine/vue/vueEntete.php";

    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] != 'Utilisateurs'){

        if(isset($_POST) && !empty($_POST)) {
            isset($_POST['type']) ? $type = $_POST['type'] : $type = null;
            switch($type) {
                case 'tel':
                    ModeleObjetDAO::updateTel($_POST['login'], $_POST['tel']);
                    $reload = true;
                    break;
                case 'livraison':
                    ModeleObjetDAO::updateLivraison($_POST['login'], $_POST['livraison']);
                    $reload = true;
                    break;
                case 'responsable':
                    ModeleObjetDAO::updateResponsable($_POST['login'], $_POST['responsable']);
                    $reload = true;
                    break;
                default:
                    $reload = false;
                    break;
            }
        }

        $lieulivraison_data = ModeleObjetDAO::getLieuLivraison();
        $responsable_data = ModeleObjetDAO::getResponsable();

        $allUsers = ModeleObjetDAO::getAllUsers(ModeleObjetDAO::getRole($_SESSION['login'])['libelle'], ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id']);
        include "$racine/vue/vueUsers.php";
        
    } else {
        header("location:./?action=accueil");
    }
    include "$racine/vue/vuePied.php";
?>