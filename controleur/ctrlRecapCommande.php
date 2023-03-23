<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include "$racine/vue/vueEntete.php";


    if(isset($_SESSION['autorise']) && $roleUser == 'Gestionnaire de commande' || isset($_SESSION['autorise']) && $roleUser == 'Administrateur'){
        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
        if($roleUser == 'Gestionnaire de commande'){
            $agence = ModeleObjetDAO::getIdAgence($id)['Agence'];
        }
        else{
            $agence = null;
        }
        $RecapEpi = ModeleObjetDAO::getRecapCommandeEpi($agence);

        $RecapVet = ModeleObjetDAO::getRecapCommandeVet($agence);

        include "$racine/vue/vueRecapCommande.php";
    } else {
        header("location:./?action=accueil");
    }
    include "$racine/vue/vuePied.php";
?>