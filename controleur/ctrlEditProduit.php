<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";
    

    if (!isset($_GET['id']) || empty($_GET['id'])){
        header("location:./?action=accueil");
    }



    
        $role_user = ModeleObjetDAO::getRole($_SESSION['login'])['libelle'];
        if(isset($_SESSION['autorise']) && 
        $role_user == 'Gestionnaire de commande' ||
        $role_user == 'Administrateur' || 
        $role_user == 'Responsable'){
            $lesFournisseur = ModeleObjetDAO::getFournisseur();
            $lesType = ModeleObjetDAO::getTypeProduit();
            $lesTailles =  ModeleObjetDAO::getAllTailles();

            $lesTypeProduits = ['EPI', 'VET', 'EPINonOuvrier'];
            $lesTaillesProduit = ModeleObjetDAO::getAllTaillesProduit($_GET['id']);
            $infoProduct = ModeleObjetDAO::getAllInfoProduit($_GET['id']);
            if (isset($_POST) && !empty($_POST)){
                if(isset($_POST['nom']) || !empty($_POST['nom'])) {
                    $AllTailles = array();
                    foreach($_POST as $key => $value) {
                        if(preg_match('/taille_inp_/', $key)) {
                            if(explode(';', $value)[0] == '0') {
                                    $TaillesF = ModeleObjetDAO::addTailleProduit(explode(';', $value)[1]);
                            } else {
                                $TaillesF = explode(';', $value)[0];
                            }
                            array_push($AllTailles, array(
                                'id' => $TaillesF,
                                'libelle' => explode(';', $value)[1]
                            ));
                        }
                    }
                    // check unique
                    $temp_AllTailles = $AllTailles + $lesTaillesProduit;
                    $temp_ = array();
                    foreach($temp_AllTailles as $key => $value) {
                        if(!in_array($value, $temp_)) {
                            $temp_[] = $value;
                        } else {
                            unset($temp_AllTailles[$key]);
                        }
                    }
                    $UniqueTailles = $temp_AllTailles;

                    // remove lesTaillesProduit
                    $temp_lesTaillesProduit = $lesTaillesProduit;
                    foreach($lesTaillesProduit as $key => $value) {
                        if(in_array($value, $AllTailles)) {
                            unset($temp_lesTaillesProduit[$key]);
                        }
                    }
                    // add lesTaillesProduit
                    $temp_AllTailles = $AllTailles;
                    foreach($AllTailles as $key => $value) {
                        if(in_array($value, $lesTaillesProduit)) {
                            unset($temp_AllTailles[$key]);
                        }
                    }

                    if(!isset($_POST['prix'])){
                        $prix = 0;
                    } else {
                        $prix = $_POST['prix'];
                    }

                    foreach($temp_lesTaillesProduit as $key => $value) {
                        ModeleObjetDAO::removeTailleidProduit($_GET['id'],$value['id']);
                    }
                    foreach($temp_AllTailles as $key => $value) {
                        ModeleObjetDAO::addTailleidProduit($_GET['id'],$value['id'], $prix);
                    }

                    if($infoProduct['prix'] != $prix) {
                        foreach($UniqueTailles as $key => $value) {
                            ModeleObjetDAO::updatePrixTailleidProduit($_GET['id'],$value['id'], $prix);
                        }
                    }

                    date_default_timezone_set('Europe/Paris');
                    $idChef = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
                    $description = "Modification du produit ".$_POST["nom"]." par ".$_SESSION['login'];
                    $date = date( "Y-m-d H:i:s");

                ModeleObjetDAO::insertLog($date,$description,$idChef["id"]);

                    ModeleObjetDAO::updateProduit($_GET['id'], $_POST['nom'], $_POST['type'], $_POST['description'], $_POST['fournisseur'], $_POST['reference'], $_POST['typeProduit']);

                    if(isset($_FILES['file']) && !empty($_FILES['file'])) {
                        $name = $_FILES['file']['name'];
                        $target_dir = "images/produits/";
                        $target_dir_old = "images/old_produits/";
                        $target_file = $target_dir . basename($_FILES["file"]["name"]);
                        if(!file_exists($target_file)) {
                            $name = basename($_FILES["file"]["name"]);
                        } else {
                            while(file_exists($target_dir.$name)) {
                                $name = time().'_'.$name;
                            }
                        }
                        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $extensions_arr = array("jpg","jpeg","png");
                        if(in_array($extension,$extensions_arr)){
                            if(file_exists($target_dir.$infoProduct['fichierPhoto'])) {
                                rename($target_dir.$infoProduct['fichierPhoto'], $target_dir_old.time().'_'.$infoProduct['fichierPhoto']);
                            }

                            move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                            ModeleObjetDAO::updateImageProduit($_GET['id'], $name);
                            $newImage = $name;
                        
                            
                        }   
                    }
                }
                if(isset($_POST['supressimg']) && !empty($_POST['supressimg'])) {
                    $target_dir = "images/produits/";
                    $target_dir_old = "images/old_produits/";
                    if(file_exists($target_dir.$infoProduct['fichierPhoto'])) {
                        rename($target_dir.$infoProduct['fichierPhoto'], $target_dir_old.time().'_'.$infoProduct['fichierPhoto']);
                    }
                }
                if(isset($_POST['supressproduct']) && !empty($_POST['supressproduct'])) {
                    $target_dir = "images/produits/";
                    $target_dir_old = "images/old_produits/";
                    if(file_exists($target_dir.$infoProduct['fichierPhoto'])) {
                        rename($target_dir.$infoProduct['fichierPhoto'], $target_dir_old.time().'_'.$infoProduct['fichierPhoto']);
                    }
                    ModeleObjetDAO::deleteProduits($_GET['id']);
                    header("location:./?action=accueil");
                }

                if (isset($_POST['produitVisible']) || !empty($_POST['produitVisible'])){
                    ModeleObjetDAO::updateVisibiliteProduit($_GET['id'], $_POST['produitVisible']);
                }
                
                $reload = true ;
                
            }
        }else {
            header("location:./?action=accueil");
        }

        include_once "$racine/vue/vueEditProduit.php";
        include_once "$racine/vue/vuePied.php";
?> 