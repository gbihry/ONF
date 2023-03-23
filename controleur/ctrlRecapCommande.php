<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include "$racine/vue/vueEntete.php";


    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Gestionnaire de commande' || isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur'){
        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
        if(ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Gestionnaire de commande'){
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