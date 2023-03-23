<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    

    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Gestionnaire de commande' || isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur'){
        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];

        $role = ModeleObjetDAO::getRole($_SESSION['login'])['libelle'];
        $roleAcess = ModeleObjetDAO::GetRoleInf(ModeleObjetDAO::getIDRole($_SESSION['login'])['idRole']);
        if(ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur'){
            $agence = "admin";
        }
        else{
            $agence = ModeleObjetDAO::getIdAgence($id)['Agence'];
        }
        $AllUsersAcommanderVET = ModeleObjetDAO::getUtilisateurCommanderVET(1,$agence);
        $AllUsersNoncommanderVET = ModeleObjetDAO::getUtilisateurCommanderVET(0,$agence);
    }elseif(ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Responsable'){
        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];

        $role = ModeleObjetDAO::getRole($_SESSION['login'])['libelle'];
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