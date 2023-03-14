<?php 

if(isset($reload) && $reload == true) {
    echo '<script>
    if(window.history.replaceState) {
        var href = "http://localhost/ONF/?action=produits";
        window.history.replaceState(null, null, href);
    }
    </script>';
}
?>
<div class="alert-container">
    <?php 
        if (isset($modifDesc) && $modifDesc == true ){
            echo ('<div class="alert alert-success" role="alert">La description à bien été changé</div>');
        }elseif (isset($supprimer) && $supprimer != true){
            echo ('<div class="alert alert-danger">Le produit à bien été supprimer</div>');
        }elseif (isset($verifType) && $verifType != true){
            echo ('<div class="alert alert-danger">Le produit est déjà assigner à ce type</div>');
        }elseif (isset($verifType) && $verifType != false){
            echo ('<div class="alert alert-success">Le type du produit à bien été changer</div>');
        }
    ?>
</div>
<div class="container-fluid text-center mt-5 produit">
    <?php  
        foreach($allProductsEPI as $detail){
            echo "<div class ='unProduitModif'>";
            echo "<div class='main-produit'>";
            if (file_exists("images/produits/".($detail['fichierPhoto']))){
                echo "<img class='img-produit' src='images/produits/".($detail['fichierPhoto'])."'>";
            }else{
                echo "<img class='img-produit' src='images/error.png'>";
            }
            echo "<h1>".$detail['nom']."</h1>";
            echo "</div>";
            echo "<div class='main-desc-edit'>";
                echo '<div id="description" data-idProduit="'.$detail['id'].'" data-data="' . $detail['description'] . '"><p>' . $detail['description'] . '</p><div class="clear"></div><a class="edit_btn" onclick="edit(this,\'description\')" name="edit_btn"><i class="fa-solid fa-pencil"></i> Modifier</a></div>';
                ?>
                <form method="POST" action="./?action=produits&idProduitType=<?=$detail['id']?>">
                    <div class="modifType">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" for="inputGroupSelect01">Type :</span>
                            </div>
                            <select name="idType" class="custom-select" id="inputGroupSelect01">
                                <option value="selectionner"><?= $detail['typeLibelle'] ?></option>
                            <?php 
                                foreach($allType as $unType){
                                    if ($unType['libelle'] != $detail['typeLibelle']){
                                        echo ("<option value=" . ($unType['id']).">" . ($unType['libelle']). "</option>");
                                    }
                                }
                            ?>
                            </select>
                        </div>
                        <div class="text-center editType"><input type="submit" name="editType" class="btn btn-success" value="valider"></div></form> 
                    </div>
                </form>
                    
                <?php
            echo "</div>";
            echo ('<div class="text-center suppProduits"><a type="submit" name="deleteProduit" href="./?action=produits&idDelete='.$detail['id'].'" class="btn btn-danger"><i class="fa-solid fa-times"></i> Supprimer</a></div>');

            echo "</div>";
            
        }
    ?>
</div>