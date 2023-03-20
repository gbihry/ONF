<?php
  session_start();

  include_once "$racine/modele/ModeleObjetDAO.php";
  date_default_timezone_set('Europe/Paris');
  $dateAuj = new DateTime();
  $dateFin = new DateTime("07-04-2023 16:30:00");
  if(isset($_SESSION['autorise'])) {
    $metierUtilisateur = ModeleObjetDAO::getMetierUtilisateur($_SESSION['login'])['idMetier'];
  }
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <!-- Lien vers l'URL Bootstrap -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">
        <link rel="stylesheet" href="fontawesome/css/all.css">
        <link rel="stylesheet" href="fontawesome/webfonts/fa-brands-400.ttf">
        <link rel="stylesheet" href="fontawesome/webfonts/fa-solid-900.ttf">

        <script src="js/action.js"></script>
        <script src="js/theme.js"></script>
        <?php 
          if (isset(($_GET['action'])) && ($_GET['action'] == "catalogue1")) {
            echo ('<title>ONF - Catalogue EPI</title>');
          }elseif  (isset($_GET['action'])){
            echo ('<title>ONF - ' . ucfirst($_GET['action'] ). '</title>');
          }else{
            echo ('<title>ONF</title>');
          }
          
        ?>

    </head>
    <body>
      <nav class="nav">
        <input type="checkbox" id="nav-check">
          <div class="nav_title">
            <a href="index.php?action=accueil"><img src="images/onf.png" alt="logo ONF" class="logo"></a>
              <?php 
              if(isset($_SESSION['autorise'])) {
                echo '<div class="nav_title_item custombtn"><a href="./?action=interfaceUser"><i class="fa-solid fa-user"></i> '. $_SESSION['login'] .'</a></div>';
                echo '<div class="nav_title_item"><p class="text-color"><i class="fa-solid fa-wrench"></i>' . ModeleObjetDAO::getStatut($_SESSION['login'])['statut'] . '</p></div>';
                if ($metierUtilisateur == 1 || $metierUtilisateur == 2 ||$metierUtilisateur == 3|| $metierUtilisateur == 4){
                  echo '<div class="nav_title_item"><p class="text-color"><i class="fa-solid fa-ticket"></i>'.ModeleObjetDAO::getNbrPointUtilisateur(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'])['point']. '</p></div>';
                }
                echo '<div class="nav_title_item custombtn"><a href="./?action=logout"><i class="fa-solid fa-right-from-bracket"></i> Déconnexion</a></div>';
              }
            ?>
          </div>
          </div>
          <div class="nav_btn">
            <label for="nav-check"><i class="fa-solid fa-bars" id="nav_checker_open"></i><i class="fa-solid fa-x" id="nav_checker_close"></i></label>
          </div>
            
          <div class="nav_links">
            <?php
            if(isset($_SESSION['autorise'])) {
              $NombreElementDansLePanierEPI = ModeleObjetDAO::getNbArticlePanier(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'],'epi');
              $NombreElementDansLePanierVET = ModeleObjetDAO::getNbArticlePanier(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'],'vet');
              $verifCommandeEPI = intVal(ModeleObjetDAO::getUtilisateurCommandeTerminer(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'], 'EPI'));
              $verifCommandeVET = intVal(ModeleObjetDAO::getUtilisateurCommandeTerminer(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'], 'VET'));
              $roleUser = ModeleObjetDAO::getRole($_SESSION['login'])['libelle'];
              
              if(ModeleObjetDAO::getUtilisateurCommandeTerminer(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'], 'EPI') + ModeleObjetDAO::getUtilisateurCommandeTerminer(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'], 'VET') > 0){
                echo '<div class="nav_links_item"><a href="index.php?action=historiqueCommande"><i class="fa-solid fa-clock-rotate-left"></i>Commande passée</a></div>';
              }
              if($metierUtilisateur == 5 || $metierUtilisateur == 6 || $metierUtilisateur == 7 || $metierUtilisateur == 8) {
                if ($verifCommandeEPI == 0 && $dateAuj < $dateFin){
                  echo '
                  <div class="nav_links_item"><a href="index.php?action=catalogueEpiNonOuvrier&&id=0"><i class="fa-solid fa-book-open"></i>Catalogue EPI</a></div>
                  <div class="nav_links_item"><a href="index.php?action=panierEPINonOuvrier"><i class="fa-solid fa-bag-shopping"></i>Panier EPI ('.$NombreElementDansLePanierEPI.')</a></div>';
                }
              }else{
                if ($verifCommandeEPI == 0 && $dateAuj < $dateFin){
                  echo '
                    <div class="nav_links_item"><a href="index.php?action=catalogueEpi&&id=0"><i class="fa-solid fa-book-open"></i>Catalogue EPI</a></div>
                    <div class="nav_links_item"><a href="index.php?action=panierEPI"><i class="fa-solid fa-bag-shopping"></i>Panier EPI ('.$NombreElementDansLePanierEPI.')</a></div>
                  ';
                }
                if ($verifCommandeVET == 0 && $dateAuj < $dateFin){
                    echo '
                    <div class="nav_links_item"><a href="index.php?action=catalogueVet&&id=0"><i class="fa-solid fa-book-open"></i>Catalogue VET</a></div>
                    <div class="nav_links_item"><a href="index.php?action=panierVET"><i class="fa-solid fa-bag-shopping"></i>Panier VET ('.$NombreElementDansLePanierVET.')</a></div>
                  ';
                }
              }
            }else {
              echo '<div class="nav_links_item"><a href="./?action=login"><i class="fa-solid fa-right-from-bracket"></i> Connexion</a>'.'</div>';
            }
            ?>
          </div>
        </nav>
        <?php
        
          if(isset($_SESSION['autorise']) && $roleUser == 'Administrateur' 
          || isset($_SESSION['autorise']) && $roleUser == 'Super-Administrateur'
          || isset($_SESSION['autorise']) &&  $roleUser == 'Responsable'){
            include_once "$racine/vue/vueSousEntete.php";}

        ?>

          