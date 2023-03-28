<?php

class Routeur{
    
    //Attributs
    private static $lesActions = array(
        // exemple d'ajout de middleware
        'defaut' => ['middleware' => ['auth'], 'controller' => 'ctrlAccueil.php'],
        'login' =>  ['controller' => 'auth/ctrlLogin.php'],
        'logout' =>  ['controller' => 'auth/ctrlLogout.php'],
        'newmdp' =>  ['controller' => 'auth/ctrlNewMdp.php'],
        'ajoutUtilisateur' =>  ['controller' => 'utilisateur/ctrlAjoutUtilisateur.php'],
        'users' =>  ['controller' => 'utilisateur/ctrlUsers.php'],
        'editUser' =>  ['controller' => 'utilisateur/ctrlEditUser.php'],
        'catalogueVet' =>  ['controller' => 'ctrlCatalogueVet.php'],
        'catalogueEpi' =>  ['controller' => 'ctrlCatalogueEpi.php'],
        'produitVet' =>  ['controller' => 'ctrlProduitVet.php'],
        'produitEpi' =>  ['controller' => 'ctrlProduitEpi.php'],
        'panierEPI' =>  ['controller' => 'ctrlPanierEPI.php'],
        'panierVET' =>  ['controller' => 'ctrlPanierVET.php'],
        'historiqueCommande' =>  ['controller' => 'ctrlHistoriqueCommande.php'],
        'historiquecommandedetail' =>  ['controller' => 'ctrlHistoriqueCommandeDetail.php'],
        'ajoutPoint' =>  ['controller' => 'ctrlAjoutPoint.php'],
        'aCommander' =>  ['controller' => 'ctrlAcommander.php'],
        'recapPanier' =>  ['controller' => 'ctrlRecapPanier.php'],
        'commandeReussie' =>  ['controller' => 'ctrlCommandeReussi.php'],
        'detail' =>  ['controller' => 'ctrlDetailObjet.php'],
        'recapCommande' =>  ['controller' => 'ctrlRecapCommande.php'],
        'pdfEpi' =>  ['controller' => 'ctrlImprimmerEpi.php'],
        'pdfVet' =>  ['controller' => 'ctrlImprimmerVet.php'],
        'ajoutProduit' =>  ['controller' => 'ctrlAjoutProduit.php'],
        'changerCommentaire' =>  ['controller' => 'ctrlChangerCommentaire.php'],
        'commanderPour' =>  ['controller' => 'ctrlCommanderPour.php'],
        'panierVETSubordonne' =>  ['controller' => 'ctrlPanierVETSubordonne.php'],
        'panierEPISubordonne' =>  ['controller' => 'ctrlPanierEPISubordonne.php'],
        'recapPanierSubordonne' =>  ['controller' => 'ctrlRecapPanierSubordonne.php'],
        'historiqueCommandeSubordonne' =>  ['controller' => 'ctrlHistoriqueCommandeSubordonne.php'],
        'historiquecommandedetailSubordonne' =>  ['controller' => 'ctrlHistoriqueCommandeDetailSubordonne.php'],
        'log' =>  ['controller' => 'ctrlLog.php'],
        'exportCSV' =>  ['controller' => 'ctrlExportCSV.php'],
        'commandeVET' =>  ['controller' => 'ctrlACommandeVET.php'],
        'imprimerRecapCommande' =>  ['controller' => 'ctrlImprimerRecapCommande.php'],
        'interfaceUser' =>  ['controller' => 'ctrlInterfaceUser.php'],
        'catalogueEpiNonOuvrier' =>  ['controller' => 'ctrlCatalogueEpiNonOuvrier.php'],
        'editProduit' =>  ['controller' => 'ctrlEditProduit.php'],
        'bdd' =>  ['controller' => 'ctrlBdd.php'],
        'panierEPINonOuvrier' =>  ['controller' => 'ctrlPanierEPINonOuvrier.php']
    );

    //Fonction qui retourne le fichier controleur à utiliser
    public static function getControleur($action)
    {
        $controleur = self::$lesActions["defaut"];

        //Permet de vérifier que l'action existe et renvoie le nom du contrôleur PHP    
        if (array_key_exists ( $action , self::$lesActions )){
            $controleur = self::$lesActions[$action];
        }

        // regarde si on a un middleware pour la route
        if (isset($controleur['middleware'])) {
            foreach ($controleur['middleware'] as $middleware) {
                // appelle le middleware en question et la fonction (il faut que le nom ajouté ait le même nom que sa classe)
                require(RACINE . "/middleware/$middleware.php");
                $middleware = new $middleware();
                $res = $middleware->next();
                if (!$res) return;
            }
        }

        $racine = RACINE;
        //Inclure controleur
        include RACINE . "/controleur/" . $controleur['controller'];
    }
}