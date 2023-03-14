<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include "$racine/vue/vueEntete.php";

    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] != 'Utilisateurs'){
        if(isset($_GET['msgResp'])) {
            $msg = $_GET['msgResp']; 
            $reload = true;
        }
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

        if (isset($_GET['id']) && !empty($_GET['id'])){
            ModeleObjetDAO::deleteUser($_GET['id']);
            $reload = true;
        }

        $lieulivraison_data = ModeleObjetDAO::getLieuLivraison();
        $responsable_data = ModeleObjetDAO::getResponsable();

        $role = ModeleObjetDAO::getRole($_SESSION['login'])['libelle'];
        $roleAcess = ModeleObjetDAO::GetRoleInf(ModeleObjetDAO::getIDRole($_SESSION['login'])['idRole']);

        $allUsers = ModeleObjetDAO::getAllUsers($role, ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id']);
        include "$racine/vue/vueUsers.php";
        
    } else {
        header("location:./?action=accueil");
    }
    include "$racine/vue/vuePied.php";
?>