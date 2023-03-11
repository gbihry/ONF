<?php
if(isset($reload) && $reload == true) {
    echo '<script>
    if(window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>';
}
?>

<div class="catalogue">
    <div class="text-center">
        <p class="catalogue_title_type"> Catalogue EPI</p>
    </div>

    <div class="form-check text-center">
        <form action="./?action=catalogueEpi&&ref=<?php echo $id["id"];?>" method ="POST">
        <?php
        
            if (isset($_POST['valideProduit']) != true){
        ?>
            <div>
                <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                <label class="form-check-label" for="validerProduit">Voir tous les produits</label>
            </div>
            <input type="submit" name="valideProduit" class="btn btn-success" value="Valider" />
        <?php
            }else{
        ?>
            <div>
                <input class="form-check-input" type="checkbox" id="flexCheckDefault" name='validerCatgorie' required>
                <label class="form-check-label" for="validerCategorie">Voir toutes les catégories</label>
            </div>
            <input type="submit" name="valideCategorie" class="btn btn-success" value="Valider" />
        <?php
            }
        ?>
        </form>
    </div>
    <div class="contenue">
        
    <?php 
        if (isset($_POST['submit']) || isset($_POST['valideProduit']) == true){
    ?>
            <div class="text-center mt-5 produit">
            <?php
            foreach($allProducts as $detail){
                echo "<div class ='unProduit'>";
                echo "<div class='main-produit'>";
                if (file_exists("images/produits/".($detail['fichierPhoto']))){
                    echo "<img class='img-produit' src='images/produits/".($detail['fichierPhoto'])."'>";
                }else{
                    echo "<img class='img-produit' src='images/error.png'>";
                }
                echo "<h1>".$detail['nom']."</h1>";
                echo "</div>";
                echo "<div class='main-desc'>";
                echo "<p>" .$detail['description'] ."</p>";
                echo "<form method='POST' class='form-group'>";
                ?>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Quantité :</span>
                    </div>
                    <input type="number" class="form-control" name='quantity' value='1' min='1' max='<?php  echo ( ModeleObjetDAO::getQuantiteEpiMax($unStatut['statut'],$detail['idType'])); ?>' aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="inputGroupSelect01">Taille :</span>
                    </div>
                    <select name="taille" class="custom-select" id="inputGroupSelect01">
                    <?php 
                    $lesTailles = ModeleObjetDAO::getTaille($detail['id']);
                    foreach ($lesTailles as $uneTaille){
                        echo ("<option value=" . $uneTaille['id'] .">" . $uneTaille['libelle'] . "</option>");
                    }
                    ?>
                    </select>
                </div>
                <?php
                
                    if(ModeleObjetDAO::getQuantiteEpi($login["login"],$detail['idType'])['sum(quantite)'] < (ModeleObjetDAO::getQuantiteEpiMax($unStatut['statut'],$detail['idType']))){
                        echo "<button type='submit' name='submit' class='btn btn-success float-right' value='" . $detail['id'] . "'>Ajouter au panier</button>";
                        
                        
                    }else{
                        echo "<p id='dejaCommander'>Vous avez déjà commandé cet article</p>";
                    }
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    
                
            }
        }else{
            foreach($catalogue as $uneCategorie){
                if ($uneCategorie['libelle'] != 'Vêtements'){
                    echo "<div class='tuile'>
                        <p>" . $uneCategorie['libelle'] . "</p>
                        <a href='./?action=produitEpi&id=".$uneCategorie['id']."&&ref=".$id["id"]."'><img src='images/categorie/".$uneCategorie['libelle'].'.jpg' . "'></a>
                    </div>";
                }
            }
        }
        
        
    ?>
    </div>
</div>