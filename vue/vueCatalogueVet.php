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
        <p class="catalogue_title_type"> Catalogue VET</p>
    </div>
    
    <div class="form-check text-center">
        <form action="./?action=catalogueVet&&ref=<?php echo $id["id"];?>" method ="POST">
            <?php
                if (isset($_POST['valideProduit']) != true){
            ?>
                <div>
                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                    <label class="form-check-label" for="validerProduit">Voir tout les produits</label>
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
    if (isset($_POST['valideProduit']) == true){
        ?>
        <div class="container-fluid text-center mt-5 produit">
            <?php 
            foreach($allProducts as $detail){
                echo "<div class ='unProduit'>";
                echo "<div class='main-produit'>";
                echo "<img class='img-produit' src='images/".($detail['fichierPhoto'])."'>";
                echo "<h1>".$detail['nom']."</h1>";
                echo "</div>";
                echo "<div class='main-desc'>";
                echo "<p>" .$detail['description'] ."</p>";
                echo "<form method='POST'>";
                ?>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Quantité :</span>
                    </div>
                    <input type="number" class="form-control" name='quantity' min='0' max='20' aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="inputGroupSelect01">Taille :</span>
                    </div>
                    <select name="taille" class="custom-select" id="inputGroupSelect01">
                    <?php 
                            echo ("<option value=" . (ModeleObjetDAO::getTaille($detail['id']))['id'] .">" . (ModeleObjetDAO::getTaille($detail['id']))['libelle']. "</option>")
                    ?>
                    </select>
                </div>

                <?php
                if (isset($commanderPour)){
                
                    ?>
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Commander pour :</span>
                        </div>
                        <select name="commanderPour" class="custom-select" id="inputGroupSelect01">
                            <?php 
                            echo ("<option value=" . $_SESSION['login'] ."> Moi même </option>");
                            foreach($commanderPour as $unSubordonnee){
                                    echo ("<option value=" . $unSubordonnee['email'] .">" . $unSubordonnee['email']. "</option>");
                            }
                            ?>
                        </select>
                        </div>
                    <?php
                }
                echo "<div class='w-100 p-3'><h3 class='float-right'>Points : <span class='produitvet_prix'>".$detail['prix']." <i class='fa-solid fa-ticket'></i></span></h3>";
                echo "<button type='submit' name='submit' class='btn btn-success float-right' value='" . $detail['id'] . "'>Ajouter au panier</button></div>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    <?php
    }else{
        foreach($catalogue as $uneCategorie){
            echo "<div class='tuile'>
                    <p>" . $uneCategorie['libelle'] . "</p>
                    <a href='./?action=produitVet&id=".$uneCategorie['id']."&&ref=".$id["id"]."'><img src='images/categorie/".$uneCategorie['libelle'].'.jpg' . "'></a>
                </div>";
        }
    }       
    
        
    
    ?>
    </div>
</div>

