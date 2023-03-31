<?php 
    if (isset($_GET['type']) && $_GET['type'] == 'vet'){
        echo ('<a href="./?action=panierVET" class="returnarrow"><i class="fa-solid fa-arrow-left"></i><p>Retour</p></a>');
    }else{
        echo ('<a href="./?action=panierEPI" class="returnarrow"><i class="fa-solid fa-arrow-left"></i><p>Retour</p></a>');
    }
?>
<div class="container-fluid text-center">
    <?php 
        $prixTotal = 0;
        ?>
    <h1>Recapitulatif Panier</h1>
    <div class="recap">
        <div class="tile">
            <?php
            if(isset($ligneCommandeVET) && $ligneCommandeVET != false) {
                echo('<p class="title">VET</p>');

                foreach ($ligneCommandeVET as $ligneCommandeUnique) {
                    $idLigne = $ligneCommandeUnique['id'];
                    $type = $ligneCommandeUnique['type'];
                    $fichierPhoto = $ligneCommandeUnique['fichierPhoto'];
                    $nom = $ligneCommandeUnique['nom'];
                    $quantite = $ligneCommandeUnique['quantite'];
                    $prix = $ligneCommandeUnique['prix'];
                    $taille = $ligneCommandeUnique['libelle'];
                    $prixTotal += $ligneCommandeUnique['prix'] * $ligneCommandeUnique['quantite'];
                    echo('<div class="row">
                        <div class="logo">
                    ');
                    if (file_exists("images/produits/".($fichierPhoto))){
                        echo "<img src='images/produits/" . $fichierPhoto . "'>";
                    }else{
                        echo "<img class='img-produit' src='images/error.png'>";
                    }
                    echo ('
                        </div>
                        <div class="desc">
                            <p>' . $nom . '</p>
                            <p class="sub">Taille: ' . $taille . ' | Quantité : '. $quantite.' | Prix Unitaire : '. $prix.'</p>
                        </div>
                    </div>');
                }
            }

            if(isset($ligneCommandeEPI) && $ligneCommandeEPI != false) {
                echo('<p class="title">EPI</p>');

                foreach ($ligneCommandeEPI as $ligneCommandeUnique) {
                    $idLigne = $ligneCommandeUnique['id'];
                    $type = $ligneCommandeUnique['type'];
                    $fichierPhoto = $ligneCommandeUnique['fichierPhoto'];
                    $nom = $ligneCommandeUnique['nom'];
                    $quantite = $ligneCommandeUnique['quantite'];
                    $taille = $ligneCommandeUnique['libelle'];
                    echo('<div class="row">
                        <div class="logo">
                    ');
                    if (file_exists("images/produits/".($fichierPhoto))){
                        echo "<img src='images/produits/" . $fichierPhoto . "'>";
                    }else{
                        echo "<img class='img-produit' src='images/error.png'>";
                    }
                    echo ('
                        </div>
                        <div class="desc">
                            <p>' . $nom . '</p>
                            <p class="sub">Taille: ' . $taille . ' | Quantité : '. $quantite.'</p>
                        </div>
                    </div>');
                }
            }
            ?>
        </div>
        <div class="tile">
            <p class="title">Recapitulatif</p>
            <?php
            if(isset($points)) {
            $pointsRestant = $points - $prixTotal;
            ?>
            <div class="row_text">
                <p class="text">Points actuel : <?php echo($points); ?></p>
                <p class="text">Points totaux : <?php echo($prixTotal); ?></p>
                <p class="text">Points restants : <?php 
                    if($pointsRestant < 0) {
                        echo('<span style="color:red">'.$pointsRestant.'</span>');
                    } else {
                        echo $pointsRestant;
                    }
                ?></p>
            </div>
            <?php
            }
            ?>
            <div class="row_input">
                <?php
                if(isset($points) && $pointsRestant < 0) {
                    echo('<p class="text">Vous n\'avez pas assez de points pour valider votre commande</p>');
                }
                ?>
                <form action="" method="post">
                    <input type="hidden" name="validerCommande" value="true">
                    <button type="submit" class="btn btn-success" <?php
                    if(isset($points) && $pointsRestant < 0) {
                        echo('disabled');
                    }
                    ?>
                    >Valider</button>
                    <?php 
                    switch($_GET['type']){
                        case 'vet':
                            echo ('<a class="btn btn-danger" href="./?action=panierVET">Annuler</a>');
                            break;
                        case 'epi':
                            echo ('<a class="btn btn-danger" href="./?action=panierEPI">Annuler</a>');
                            break;
                        default:
                            echo ('<a class="btn btn-danger" href="./?action=panierEPINonOuvrier">Annuler</a>');
                            break;
                    }
                    ?>
                    
                </form>
            </div>
            <?php 
                if ($_GET['type'] == 'vet'){
                    echo (' <p id ="redBySFR2"> Validation définitive, vous ne pourrez plus commander de vêtements et vos points restants seront perdu.
                    Votre chef à un droit de regard et de supression sur votre commande si celle ci n\'est pas conforme</p>');
                }else{
                    echo (' <p id ="redBySFR2"> Validation définitive, vous ne pourrez plus commander d\'EPI.
                    Votre chef à un droit de regard et de supression sur votre commande si celle ci n\'est pas conforme</p>');
                }
            ?>
        </div>
    </div>
</div>