<?php
if(isset($reload) && $reload == true) {
    echo '<script>
    if(window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>';
}
?>
<div class="container-fluid text-center mt-5 produit">
    <?php  
        foreach($allProductsEPI as $detail){
            echo "<div class ='unProduit'>";
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
            echo "</div>";
            echo ('<div class="text-center suppUser"><a type="submit" name="deleteUser" href="./?action=produits&id='.$detail['id'].'" class="btn btn-danger"><i class="fa-solid fa-times"></i> Supprimer</a></div>');

            echo "</div>";
            
        }
    ?>
</div>