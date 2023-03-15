<?php

class Routeur{
    
    //Attributs
    private static $lesActions = array(
        'defaut' => 'ctrlAccueil.php',
        'login' => 'ctrlLogin.php',
        'logout' => 'ctrlLogout.php',
        'catalogueVet' => 'ctrlCatalogueVet.php',
        'catalogueEpi' => 'ctrlCatalogueEpi.php',
        'produitVet' => 'ctrlProduitVet.php',
        'produitEpi' => 'ctrlProduitEpi.php',
        'panierEPI' => 'ctrlPanierEPI.php',
        'panierVET' => 'ctrlPanierVET.php',
        'historiqueCommande' => 'ctrlHistoriqueCommande.php',
        'ajoutUtilisateur' => 'ctrlAjoutUtilisateur.php',
        'historiquecommandedetail' => 'ctrlHistoriqueCommandeDetail.php',
        'ajoutPoint' => 'ctrlAjoutPoint.php',
        'aCommander' => 'ctrlAcommander.php',
        'recapPanier' => 'ctrlRecapPanier.php',
        'commandeReussie' => 'ctrlCommandeReussi.php',
        'newmdp' => 'ctrlNewMdp.php',
        'detail' => 'ctrlDetailObjet.php',
        'recapCommande' => 'ctrlRecapCommande.php',
        'pdfEpi' => 'ctrlImprimmerEpi.php',
        'pdfVet' => 'ctrlImprimmerVet.php',
        'ajoutProduit' => 'ctrlAjoutProduit.php',
        'changerCommentaire' => 'ctrlChangerCommentaire.php',
        'commanderPour' => 'ctrlCommanderPour.php',
        'users' => 'ctrlUsers.php',
        'produits' => 'ctrlProduits.php',
        'produitsVetModif' => 'ctrlProduitsVetModif.php',
        'produitsEpiNonOuvrier' => 'ctrlProduitsEpiNonOuvrier.php',
        'panierVETSubordonne' => 'ctrlPanierVETSubordonne.php',
        'panierEPISubordonne' => 'ctrlPanierEPISubordonne.php',
        'recapPanierSubordonne' => 'ctrlRecapPanierSubordonne.php',
        'historiqueCommandeSubordonne' => 'ctrlHistoriqueCommandeSubordonne.php',
        'historiquecommandedetailSubordonne' => 'ctrlHistoriqueCommandeDetailSubordonne.php',
        'log' => 'ctrlLog.php',
        'exportCSV' => 'ctrlExportCSV.php',
        'commandeVET' => 'ctrlACommandeVET.php',
        'imprimerRecapCommande' => 'ctrlImprimerRecapCommande.php',
        'interfaceUser' => 'ctrlInterfaceUser.php',
        'catalogueEpiNonOuvrier' => 'ctrlCatalogueEpiNonOuvrier.php',
        'panierEPINonOuvrier' => 'ctrlPanierEPINonOuvrier.php',
        'bdd' => 'ctrlBdd.php'
        
    );   
    
        
    //Fonction qui retourne le fichier controleur à utiliser
    public static function getControleur($action){
        $controleur = self::$lesActions["defaut"];

        //Permet de vérifier que l'action existe et renvoie le nom du contrôleur PHP    
        if (array_key_exists ( $action , self::$lesActions )){
            $controleur = self::$lesActions[$action];
        }

        return $controleur;
    }
}