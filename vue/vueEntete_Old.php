<?php
    session_start();
    include_once "$racine/modele/ModeleObjetDAO.php";
?>
<!DOCTYPE html>

<!-- 
    //TODO: faire un github pour avoir les anciennes version du site
    //TODO: faire la gestion des rôles
    //TODO: faire les logs pour l'admin
    //TODO: faire toutes les contraintes EPI
    //TODO: Statistique qui récapitule la quantité de chaque produit à commander (la somme de quantité de produit de chaque utilisateur)
-->

<html>
    <head>
        <meta charset="UTF-8">
        <!-- Lien vers l'URL Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/f460dffe13.js" crossorigin="anonymous"></script>  
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
        <nav class="navbar navbar-dark bg-dark">

            <?php
            if(isset($_SESSION['autorise'])){
            ?>
            <p class="navbar_point_texte">Points : <?php echo (ModeleObjetDAO::getNbrPointUtilisateur(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'])['point'])?></p>
            <?php
            }
            ?>
            <div class="log">
            <a class="" href="./?action=accueil"><img class="w-25 mx-auto d-block" src="images/onf.png" alt="logo onf"></a>
              <?php
              
              if(!isset($_SESSION['autorise'])){
              ?>
              
                <a href="./?action=login" class=" mx-auto h4">Se connecter <i class="fa-solid fa-right-to-bracket"></i></a>
              
              <?php
                }else{
                  //Création d'un statut pour pouvoir utilisé le tableau unStatut, utilisation du modèle dans la vue car pas de controler dans l'entête 
                  $unStatut = ModeleObjetDAO::getStatut($_SESSION['login']);
              ?>
                  <div class="login">
                    <p>Bonjour, <?php echo $_SESSION['login'] . " (" . $unStatut['statut'] . ") "?> </p>
                    <a href="./?action=logout" class="text-center mr-2"><i class="fa-solid fa-right-from-bracket"></i></a>
                  </div>

              <?php
                }
              ?>
            </div>
              
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
            

            <div class="collapse navbar-collapse" id="navbarsExample01">
              <ul class="navbar-nav mr-auto">
              <?php if(isset($_SESSION['autorise'])){?>
                
                <li class="nav-item">
                  <a class="nav-link" href="./?action=catalogue">Catalogue</a>
                </li>
                <?php } ?>

                <li class="nav-item">
                <?php
                if(isset($_SESSION['autorise'])){
                    $NombreElementDansLePanier = ModeleObjetDAO::getNbArticlePanier(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id']);
                  ?>
                  <a class="nav-link" href="./?action=panier">Panier (<?php echo $NombreElementDansLePanier; ?>)</a>
                </li>
                <?php
                }
                ?>
              </ul>
              
            </div>
          </nav>
          <?php
            if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur'){
              include_once "$racine/vue/vueSousEntete.php";} 
            ?>
          
        <div class="container-fluid">