<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    
    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Gestionnaire de commande' ||  
    ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur'){
        if(!empty($_POST)){
            $idUtilisateur = $_POST['user'];
            $points = $_POST['nombrepoint'];
            ModeleObjetDAO::insertPoints($idUtilisateur, $points);
            $reload = true;
        }
    } else {
        header("location:./?action=accueil");
    }
    
    $role = ModeleObjetDAO::getRole($_SESSION['login'])['libelle'];
    $roleAcess = ModeleObjetDAO::GetRoleInf(ModeleObjetDAO::getIDRole($_SESSION['login'])['idRole']);
    
    $AllUsers = ModeleObjetDAO::getAllUsers("Gestionnaire de commande",0);




    include_once "$racine/vue/vueAjoutPoint.php";
    include_once "$racine/vue/vuePied.php";

?> 