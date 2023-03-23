<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    

    if(isset($_SESSION['autorise']) && $roleUser == 'Gestionnaire de commande' || isset($_SESSION['autorise']) && $roleUser == 'Administrateur'){
        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];

        if($roleUser == 'Administrateur'){
            $agence = "admin";
        }
        else{
            $agence = ModeleObjetDAO::getIdAgence($id)['Agence'];
        }
        $role = $roleUser;
        $roleAcess = ModeleObjetDAO::GetRoleInf(ModeleObjetDAO::getIDRole($_SESSION['login'])['idRole']);
        $AllUsersAcommanderEPI = ModeleObjetDAO::getUtilisateurCommander(1,$agence);
        $AllUsersNoncommanderEPI = ModeleObjetDAO::getUtilisateurCommander(0,$agence);
        
    }elseif($roleUser == 'Responsable'){
        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];

        $role = $roleUser;
        $roleAcess = ModeleObjetDAO::GetRoleInf(ModeleObjetDAO::getIDRole($_SESSION['login'])['idRole']);

        $AllUsersAcommanderEPI = ModeleObjetDAO::getUtilisateurCommanderSubordonne(1,$id);
        $AllUsersNoncommanderEPI = ModeleObjetDAO::getUtilisateurCommanderSubordonne(0,$id);
        
    }
    else {
        header("location:./?action=accueil");
    }






    include_once "$racine/vue/vueAcommander.php";
    include_once "$racine/vue/vuePied.php";

?>