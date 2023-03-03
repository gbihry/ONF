<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";
    $lesLieux = ModeleObjetDAO::getLieuLivraison();
    $lesEmployeur = ModeleObjetDAO::getEmployeur();
    $lesResponsables = ModeleObjetDAO::getResponsable();
    $lesRole =  ModeleObjetDAO::getLesRole();
    $lesMetier = ModeleObjetDAO::getMetier();
    $lesAgences = ModeleObjetDAO::getAgence();
    $lesLibelles = ModeleObjetDAO::getRoleInf(ModeleObjetDAO::getIDRole($_SESSION['login'])["idRole"]);

    include_once "$racine/vue/vuePied.php";

        if(isset($_SESSION['autorise']) && 
            ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur' ||
            ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Super-Administrateur' ||
            ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Responsable'){

            $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'];
            $nom = ModeleObjetDAO::getNomUtilisateur($id)['nom'];

            if (isset($_POST["import"])) {
    
                $fileName = $_FILES["file"]["tmp_name"];
                
                if ($_FILES["file"]["size"] > 0) {
                    
                    $file = fopen($fileName, "r");
                    
                    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                        if (ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Responsable'){
                            $column[7] = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'];
                        }
                        ModeleObjetDAO::insertUtilisateurCSV($column);
                        $reload = true;
                    }
                }
            }
            if(!empty($_POST['submit'])){
                if ($_POST['livraison'] == 'selectionner' || ($_POST['role'] != '2' && $_POST['responsable'] == 'selectionner') || $_POST['role'] == 'selectionner' || $_POST['metier'] == 'selectionner' || $_POST['agence'] == 'selectionner'){
                    return false;
                }else{
                    if ($_POST['role'] == '2'){
                        $_POST['responsable'] = 0;
                    }
                    ModeleObjetDAO::insertUtilisateur($_POST['mail'],password_hash($_POST['tel'], PASSWORD_DEFAULT),$_POST['prenom'],$_POST['nom'],$_POST['mail'],$_POST['tel'], 
                    $_POST['livraison'],$_POST['responsable'],$_POST['role'],$_POST['metier'],$_POST['agence']);
                    
                    if ($_POST['responsable'] == 0){
                        
                        ModeleObjetDAO::updateResponsable($_POST['mail'], ModeleObjetDAO::getIdUtilisateur($_POST['mail'])['id']);
                        $reload = true;
                        
                    }else{
                        $reload = true;
                    }
                    
                }
            }
        }else {
            header("location:./?action=accueil");
        }

        include_once "$racine/vue/vueAjoutUtilisateur.php";
?> 