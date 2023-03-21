<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include "$racine/vue/vueEntete.php";

    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Gestionnaire de commande' || isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur'){
        
        $lesFournisseur = ModeleObjetDAO::getFournisseur();
        $lesType = ModeleObjetDAO::getTypeProduit();
        $lesTailles =  ModeleObjetDAO::getAllTailles();
        if(!empty($_POST)){
            if ($_POST['type'] == 'selectionner' || $_POST['fournisseur'] == 'selectionner' || $_POST['typeProduit'] == 'selectionner'){
                $verifInput = false;
                $reload = true;
            }else{
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
                            'taille' => explode(';', $value)[1]
                        ));
                    }
                }
                $namePhoto = $_FILES['file']['name'];
                $tmpName = $_FILES['file']['tmp_name'];
                $verifFileArray = explode('.', $_FILES['file']['name']);

                if ($verifFileArray[1] != 'png' && $verifFileArray[1] != 'jpg'){
                    $verifFile = false;
                    $reload = true;
                }else{
                    if (file_exists("images/produits/".$namePhoto)){
                        $verifPhoto = false;
                        $reload = true;
                    }else{
                        if(!isset($_POST['prix'])){
                            $prix = 0;
                        } else {
                            $prix = $_POST['prix'];
                        }
                        ModeleObjetDAO::insertProduit($_POST['reference'],$namePhoto,$_POST['nom'],$_POST['type'],$_POST['description'],$_POST['fournisseur'],$_POST['typeProduit'],$prix,$AllTailles);
                        move_uploaded_file($tmpName, './images/produits/'.$namePhoto);
                        $reload = true;
                        $verifFile = true;
                    }
                    
                }
            }
        }
        include "$racine/vue/vueAjoutProduit.php";

    } else {
        header("location:./?action=accueil");
    }
    include "$racine/vue/vuePied.php";
?>