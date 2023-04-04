<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    
    if(isset($_SESSION['autorise']) && $roleUser == 'Gestionnaire de commande' ||  
    $roleUser == 'Administrateur'){
        if(!empty($_POST)){
            $idUtilisateur = $_POST['user'];
            $points = $_POST['nombrepoint'];
            ModeleObjetDAO::insertPoints($idUtilisateur, $points);

            date_default_timezone_set('Europe/Paris');
            $login = ModeleObjetDAO::getLoginById($idUtilisateur);
            $description = "Ajout de points à ".$login["login"]." par ".$_SESSION['login'];
            $idChef = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
            $date = date( "Y-m-d H:i:s");
            ModeleObjetDAO::insertLog($date,$description,$idChef["id"]);
            $reload = true;
        }
    } else {
        header("location:./?action=accueil");
    }
    $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
    $role = $roleUser;
    $roleAcess = ModeleObjetDAO::GetRoleInf(ModeleObjetDAO::getIDRole($_SESSION['login'])['idRole']);
    if($roleUser == 'Gestionnaire de commande'){
        $agence = ModeleObjetDAO::getIdAgence($id)['Agence'];
    }
    else{
        $agence = null;
    }
    $AllUsers = ModeleObjetDAO::getAllUsers($role,0,$agence);




    include_once "$racine/vue/vueAjoutPoint.php";
    include_once "$racine/vue/vuePied.php";

?> 