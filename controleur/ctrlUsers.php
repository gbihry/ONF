<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include "$racine/vue/vueEntete.php";

    if(isset($_SESSION['autorise']) && $roleUser != 'Utilisateurs'){
        if(isset($_GET['msgResp'])) {
            $msg = $_GET['msgResp']; 
            $reload = true;
        }
        if(isset($_POST) && !empty($_POST)) {
            isset($_POST['type']) ? $type = $_POST['type'] : $type = null;
            switch($type) {
                case 'tel':
                    ModeleObjetDAO::updateTel($_POST['login'], $_POST['tel']);

                    $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
                    $description = "L'utilisateur ".$_SESSION['login']." à modifier le tel de ".$_POST['login'];
                    $date = date( "Y-m-d H:i:s");
                    ModeleObjetDAO::insertLog($date,$description,$id);

                    $reload = true;
                    break;
                case 'livraison':
                    ModeleObjetDAO::updateLivraison($_POST['login'], $_POST['livraison']);

                    $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
                    $description = "L'utilisateur ".$_SESSION['login']." à modifier le lieu de livraison de ".$_POST['login'];
                    $date = date( "Y-m-d H:i:s");
                    ModeleObjetDAO::insertLog($date,$description,$id);

                    $reload = true;
                    break;
                case 'responsable':
                    ModeleObjetDAO::updateResponsable($_POST['login'], $_POST['responsable']);

                    $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
                    $description = "L'utilisateur ".$_SESSION['login']." à modifier le responsable de ".$_POST['login'];
                    $date = date( "Y-m-d H:i:s");
                    ModeleObjetDAO::insertLog($date,$description,$id);

                    $reload = true;
                    break;
                default:
                    $reload = false;
                    break;
            }
        }

        if (isset($_GET['id']) && !empty($_GET['id'])){
            $login = ModeleObjetDAO::getLoginById($_GET['id'])['login'];

            ModeleObjetDAO::deleteUser($_GET['id']);
            
            $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
            $description = "L'utilisateur ".$_SESSION['login']." à supprimer l'utilisateur ".$login;
            $date = date( "Y-m-d H:i:s");
            ModeleObjetDAO::insertLog($date,$description,$id);
            
            $reload = true;
            header("location:./?action=users");
        }

        $lieulivraison_data = ModeleObjetDAO::getLieuLivraison();
        $responsable_data = ModeleObjetDAO::getResponsable();
        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
        $role = $roleUser;
        $roleAcess = ModeleObjetDAO::GetRoleInf(ModeleObjetDAO::getIDRole($_SESSION['login'])['idRole']);
        if($role == 'Gestionnaire de commande'){
            $agence = ModeleObjetDAO::getIdAgence($id)['Agence'];
        }
        else{
            $agence = null;
        }
        $allUsers = ModeleObjetDAO::getAllUsers($role, ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'],$agence);
        include "$racine/vue/vueUsers.php";
        
    } else {
        header("location:./?action=accueil");
    }
    include "$racine/vue/vuePied.php";
?>