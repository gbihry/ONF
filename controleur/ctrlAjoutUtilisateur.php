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
        $role_user = $roleUser;
        if(isset($_SESSION['autorise']) && 
        $role_user == 'Gestionnaire de commande' ||
        $role_user == 'Administrateur' ||
        $role_user == 'Responsable'){

            $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'];
            $nom = ModeleObjetDAO::getNomUtilisateur($id)['nom'];
            
            $idRole = ModeleObjetDAO::getIDRole($_SESSION['login'])['idRole'];
            $roleInf = ModeleObjetDAO::GetRoleInf($idRole);

            if (isset($_POST["import"])) {
    
                $fileName = $_FILES["file"]["tmp_name"];
                $fileVerif = explode(".", $_FILES['file']['name']);
                if ($fileVerif[1] == 'csv'){
                    if ($_FILES["file"]["size"] > 0) {

                        $file = fopen($fileName, "r");
                        
                        $i = 0;
                        $verifLogin = array();
                        while (($row = fgetcsv($file, 10000, ";")) !== FALSE) {
                            if($i == 0){
                                $i++;
                                continue;
                            }
                            $i++;
                            if ($roleUser == 'Responsable'){
                                $row[7] = $_SESSION['login'];
                            }
                            $verifRole = false;
                            foreach($roleInf as $unRole){
                                if ($unRole['libelle'] == $row[8]){
                                    $verifRole = true;
                                }
                            }
                            if ($verifRole == true){
                                if(ModeleObjetDAO::insertUtilisateurCSV($row) == false){

                                    

                                    array_push($verifLogin, $i);
                                }
                                $verifFile = true;
                                $reload = true;
                            }else{
                                $reload = true;
                            }
                        }
                        if($verifFile == true && $verifRole == true && $verifLogin == true){
                            date_default_timezone_set('Europe/Paris');
                            $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
                            $description = "Ajout d'utilisateurs avec un fichier CSV par ".$_SESSION['login'];
                            $date = date( "Y-m-d H:i:s"); 
                            ModeleObjetDAO::insertLog($date,$description,$id);
                        }
                    }
                }else{
                    $verifFile = false;
                    $reload = true;
                }
                
            }
            if(!empty($_POST['submit'])){
                if ($_POST['livraison'] == 'selectionner' || ($_POST['role'] != '2' && $_POST['responsable'] == 'selectionner') || $_POST['role'] == 'selectionner' || $_POST['metier'] == 'selectionner' || $_POST['agence'] == 'selectionner'){
                    return false;
                }else{
                    if ($_POST['role'] == '2'){
                        $_POST['responsable'] = 0;
                    }
                    $allLogin = ModeleObjetDAO::getUsers();

                    $verifUser = true;
                    foreach($allLogin as $unLogin){
                        if ($unLogin['login'] == $_POST['mail']){
                            $verifUser = false;
                        }
                    }
                    if ($verifUser != false){
                        ModeleObjetDAO::insertUtilisateur($_POST['mail'],password_hash($_POST['tel'], PASSWORD_DEFAULT),$_POST['prenom'],$_POST['nom'],$_POST['mail'],$_POST['tel'], 
                        $_POST['livraison'],$_POST['responsable'],$_POST['role'],$_POST['metier'],$_POST['agence']);

                        date_default_timezone_set('Europe/Paris');
                        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
                        $description = "Ajout d'un utilisateur par ".$_SESSION['login'];
                        $date = date( "Y-m-d H:i:s"); 
                        ModeleObjetDAO::insertLog($date,$description,$id);
                        
                        if ($_POST['responsable'] == 0){
                            ModeleObjetDAO::updateResponsable($_POST['mail'], ModeleObjetDAO::getIdUtilisateur($_POST['mail'])['id']);
                            $reload = true;
                            
                        }else{
                            $reload = true;
                        }
                    }
                    
                }
            }
        }else {
            header("location:./?action=accueil");
        }

        include_once "$racine/vue/vueAjoutUtilisateur.php";
?> 