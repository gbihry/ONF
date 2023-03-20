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

    $AllUser = ModeleObjetDAO::getAllInfoUtilisateur($_GET['id']);
    $dateCreaFiniEPI = ModeleObjetDAO::getDateCommandeFiniEpi($_GET['id']);
    $dateCreaFiniVET = ModeleObjetDAO::getDateCommandeFiniVet($_GET['id']);

    include_once "$racine/vue/vuePied.php";
        $role_user = ModeleObjetDAO::getRole($_SESSION['login'])['libelle'];
        if(isset($_SESSION['autorise']) && 
        $role_user == 'Administrateur' ||
        $role_user == 'Super-Administrateur' ||
        $role_user == 'Responsable'){
            if(!empty($_POST)) {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $mail = $_POST['mail'];
                $tel = $_POST['tel'];
                $livraison = $_POST['livraison'];
                $responsable = $_POST['responsable'];
                $employeur = $_POST['employeur'];
                $role = $_POST['role'];
                $metier = $_POST['metier'];
                $agence = $_POST['agence'];

                if($responsable == $_GET['id']){
                    $role = 2;
                }
                if($role == 2){
                    $responsable = $_GET['id'];
                }

                // updateUser($idUtilisateur, $prenom, $nom, $email, $tel, $idLieuLivraison, $id_responsable, $idRole, $idMetier, $Agence, $idEmployeur)
                ModeleObjetDAO::updateUser($_GET['id'], $prenom, $nom, $mail, $tel, $livraison, $responsable, $role, $metier, $agence, $employeur);
                $reload = true;

            }

        }else {
            header("location:./?action=accueil");
        }

        include_once "$racine/vue/vueEditUser.php";
?> 