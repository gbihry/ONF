<?php
    if (isset($_GET['id']) && $_GET['id'] != 0){
        echo ('<a href="./?action=commanderPour" class="returnarrow"><i class="fa-solid fa-arrow-left"></i><p>Retour</p></a>');
    }else{
        echo ('<a href="./?action=accueil" class="returnarrow"><i class="fa-solid fa-arrow-left"></i><p>Retour</p></a>');
    }
?>

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
        <?php 
            if ($roleUser == 'Administrateur' || $roleUser == 'Gestionnaire de commande'){
                echo ('<p class="catalogue_title_type"> Catalogue EPI</p>');
            }else{
                echo ('<p class="catalogue_title_type"> Catalogue EPI ouvrier</p>');
            }
        ?>
    </div>

    <div class="form-check text-center">
        <form action="./?action=catalogueEpi&&id=<?php echo $id["id"];?>" method ="POST">
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
    <?php 
        if (isset($_POST['submit']) || isset($_POST['valideProduit']) == true){
            echo ("</div>");
            foreach($allProducts as $detail){
                $verifVisible = intVal(ModeleObjetDAO::verifProduitVisible($detail['id']));
                if ($roleUser == 'Administrateur' || $roleUser == 'Gestionnaire de commande'){
                    echo "<div class ='unProduit'>";
                    echo "<div class='main-produit'>";
                    if (file_exists("images/produits/".($detail['fichierPhoto']))){
                        if ($verifVisible == 0){
                            echo("<i class='fa-solid fa-eye-slash'></i>");
                            echo "<img class='img-produit nonVisible' src='images/produits/".($detail['fichierPhoto'])."'>";
                        }else{
                            echo("<i class='fa-solid fa-eye'></i>");
                            echo "<img class='img-produit' src='images/produits/".($detail['fichierPhoto'])."'>";
                        }
                        
                    }else{
                        if($verifVisible == 0){
                            echo("<i class='fa-solid fa-eye-slash'></i>");
                            echo "<img class='img-produit nonVisible' src='images/error.png'>";
                        }else{
                            echo("<i class='fa-solid fa-eye'></i>");
                            echo "<img class='img-produit' src='images/error.png'>";
                        }
                    }
                    echo "<h1>".$detail['nom']."</h1>";
                    
                    echo ('<a class="btn btn-primary" href="./?action=editProduit&id='.$detail['id'].'"><i class="fa-solid fa-pencil"></i> Modifier</a>');
                    echo "</div>";
                    echo "<div class='main-desc'>";
                    echo "<p>" .$detail['description'] ."</p>";
                    echo "<form method='POST' class='form-group'>";
                    ?>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Quantité :</span>
                        </div>
                        <input type="number" class="form-control" name='quantity' min='1' value='1' max='<?php echo (ModeleObjetDAO::getQuantiteEpiMax($unStatut['statut'],$detail['idType']) - ModeleObjetDAO::getQuantiteEpi($login["login"],$detail['idType'])['sum(quantite)']);   ?>' aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group mb-3">
                        
                        <?php
                        if (ModeleObjetDAO::getType($detail['id']) == 1 || ModeleObjetDAO::getType($detail['id']) == 2) {
                        ?>
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="inputGroupSelect01">Pointure :</span>
                            </div>
                        <?php
                        }else{
                            ?>
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="inputGroupSelect01">Taille :</span>
                            </div>
                            <?php
                        }
                        ?>
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
                        echo "<p id='dejaCommander'>Vous avez déjà mis ce type d'article dans votre panier</p>";
                    }
                }else{
                    if($unStatut['id'] == 1 && $detail['id'] == 10 || 
                    ($unStatut['id'] == 1 &&  $detail['id'] != 6  && $detail['idType'] == 2) ||
                    ($unStatut['id'] !=1 && $unStatut['id'] !=2 && $detail['id'] == 2) || 
                    ($unStatut['id'] == 2 && $detail['id'] == 6) || 
                    ($unStatut['id'] != 1 && $unStatut['id'] != 2 && $unStatut['id'] != 9 && $detail['id'] == 1) ||
                    ($unStatut['id'] != 3 && $unStatut['id'] != 4 && $unStatut['id'] != 9 && $detail['id'] == 18) || 
                    ($unStatut['id'] != 1 && $unStatut['id'] != 2 && $unStatut['id'] != 3 && $unStatut['id'] != 9 && $detail['id'] == 3) || 
                    ($unStatut['id'] != 3 && $unStatut['id'] != 4 && $detail['id'] == 4) ||
                    ($unStatut['id'] != 9 && $detail['id'] == 16) || ($unStatut['id'] != 4 && $detail['id'] == 36) ||
                    ($unStatut['id'] == 1 && $detail['id'] != 207 && $detail['id'] != 6  && $detail['idType'] == 2) || 
                    ($unStatut['id'] != 1 && $unStatut['id'] != 2 && $detail['id'] == 6) || 
                    ($unStatut['id'] != 3 && $unStatut['id'] != 4 && $unStatut['id'] != 9 && $detail['id'] == 18) || 
                    ($unStatut['id'] != 9 && $detail['id'] == 16) || ($unStatut['id'] != 4 && $detail['id'] == 36)
                    || ($detail['id'] == 209 && $employeur['roleEmployeur'] == "onf")|| ($detail['id'] == 33 && $employeur['roleEmployeur'] == "syndicat") ||
                    ($unStatut['id'] != 4 && $unStatut['id'] != 3 && $unStatut['id'] != 9 && $detail['id'] == 36) ||
                    ($unStatut['id'] != 2 && $unStatut['id'] != 3 && $detail['id'] == 8) || 
                    ($unStatut['id'] != 2 && $detail['id'] == 7)){
                    
                    }else{
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
                    }
                    
                    if($unStatut['id'] == 1 && $detail['id'] == 10 || 
                    ($unStatut['id'] == 1 &&  $detail['id'] != 6  && $detail['idType'] == 2) ||
                    ($unStatut['id'] !=1 && $unStatut['id'] !=2 && $detail['id'] == 2) || 
                    ($unStatut['id'] == 2 && $detail['id'] == 6) || 
                    ($unStatut['id'] != 1 && $unStatut['id'] != 2 && $unStatut['id'] != 9 && $detail['id'] == 1) ||
                    ($unStatut['id'] != 3 && $unStatut['id'] != 4 && $unStatut['id'] != 9 && $detail['id'] == 18) || 
                    ($unStatut['id'] != 1 && $unStatut['id'] != 2 && $unStatut['id'] != 3 && $unStatut['id'] != 9 && $detail['id'] == 3) || 
                    ($unStatut['id'] != 3 && $unStatut['id'] != 4 && $detail['id'] == 4) ||
                    ($unStatut['id'] != 9 && $detail['id'] == 16) || ($unStatut['id'] != 4 && $detail['id'] == 36)
                    ($unStatut['id'] == 1 && $detail['id'] != 207 && $detail['id'] != 6  && $detail['idType'] == 2) || 
                    ($unStatut['id'] != 1 && $unStatut['id'] != 2 && $detail['id'] == 6) || 
                    ($unStatut['id'] != 3 && $unStatut['id'] != 4 && $unStatut['id'] != 9 && $detail['id'] == 18) || 
                    ($unStatut['id'] != 9 && $detail['id'] == 16) || ($unStatut['id'] != 4 && $detail['id'] == 36)
                    || ($detail['id'] == 209 && $employeur['roleEmployeur'] == "onf")|| ($detail['id'] == 33 && $employeur['roleEmployeur'] == "syndicat") ||
                    ($unStatut['id'] != 4 && $unStatut['id'] != 3 && $unStatut['id'] != 9 && $detail['id'] == 36) ||
                    ($unStatut['id'] != 2 && $unStatut['id'] != 3 && $detail['id'] == 8) || 
                    ($unStatut['id'] != 2 && $detail['id'] == 7)){
                        
                    
                    }else{
    
                        ?>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Quantité :</span>
                            </div>
                            <input type="number" class="form-control" name='quantity' min='1' value='1' max='<?php echo (ModeleObjetDAO::getQuantiteEpiMax($unStatut['statut'],$detail['idType']) - ModeleObjetDAO::getQuantiteEpi($login["login"],$detail['idType'])['sum(quantite)']);   ?>' aria-describedby="inputGroup-sizing-sm">
                            
                        </div>
                        <div class="input-group mb-3">
                            
                            <?php
                            if (ModeleObjetDAO::getType($detail['id']) == 1 || ModeleObjetDAO::getType($detail['id']) == 2) {
                            ?>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="inputGroupSelect01">Pointure :</span>
                                </div>
                            <?php
                            }else{
                            ?>
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="inputGroupSelect01">Taille :</span>
                            </div>
                            <?php
                            }
                            ?>
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
                            echo "<p id='dejaCommander'>Vous avez déjà mis ce type d'article dans votre panier</p>";
                        }
                        
                    
                    } 
                    
                }      
                echo "</form>";          
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        }else{
            echo ('<div class="contenue">');
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