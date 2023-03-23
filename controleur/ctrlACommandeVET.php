<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    

    if(isset($_SESSION['autorise']) && $roleUser == 'Gestionnaire de commande' || isset($_SESSION['autorise']) && $roleUser == 'Administrateur'){
        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];

        $role = $roleUser;
        $roleAcess = ModeleObjetDAO::GetRoleInf(ModeleObjetDAO::getIDRole($_SESSION['login'])['idRole']);
        if($roleUser == 'Administrateur'){
            $agence = "admin";
        }
        else{
            $agence = ModeleObjetDAO::getIdAgence($id)['Agence'];
        }
        $AllUsersAcommanderVET = ModeleObjetDAO::getUtilisateurCommanderVET(1,$agence);
        $AllUsersNoncommanderVET = ModeleObjetDAO::getUtilisateurCommanderVET(0,$agence);
    }elseif($roleUser == 'Responsable'){
        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];

        $role = $roleUser;
        $roleAcess = ModeleObjetDAO::GetRoleInf(ModeleObjetDAO::getIDRole($_SESSION['login'])['idRole']);

        $AllUsersAcommanderVET = ModeleObjetDAO::getUtilisateurCommanderSubordonneVET(1,$id);
        $AllUsersNoncommanderVET = ModeleObjetDAO::getUtilisateurCommanderSubordonneVET(0,$id);
        
    }
    else {
        header("location:./?action=accueil");
    }






    include_once "$racine/vue/vueACommanderVET.php";
    include_once "$racine/vue/vuePied.php";

?>