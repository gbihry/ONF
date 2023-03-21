<?php 

if(isset($reload) && $reload == true) {
    echo '<script>
    if(window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
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
        }
    ?>
</div>
<div class="container-fluid text-center mt-5 produit">
    <a type='submit' name='submit' class='btn btn-success mt-2' href="./?action=produits" >Voir produits EPI</a>
    <a type='submit' name='submit' class='btn btn-success mt-2' href="./?action=produitsVetModif" >Voir produits VET</a>
    <h1>Produits EPI non ouvrier</h1>
    <?php  
        foreach($allProductsEPINonOuvrier as $detail){
            echo "<div class ='unProduitModif'>";
            echo "<div class='main-produit'>";
            if (file_exists("images/produits/".($detail['fichierPhoto']))){
                echo "<img class='img-produit' src='images/produits/".($detail['fichierPhoto'])."'>";
            }else{
                echo "<img class='img-produit' src='images/error.png'>";
            }
            echo "<h1>".$detail['nom']."</h1>";
            if($role['libelle'] == 'Administrateur' || $role['libelle'] == 'Super-Administrateur'){
                echo ('<a class="btn btn-primary" href="./?action=editProduit&id='.$detail['id'].'"><i class="fa-solid fa-pencil"></i> Modifier</a>');
            }
            echo "</div>";
            echo "<div class='main-desc-edit'>";
                echo '<div id="description" data-idProduit="'.$detail['id'].'" data-data="' . $detail['description'] . '"><p>' . $detail['description'] . '</p><div class="clear"></div><a class="edit_btn" onclick="edit(this,\'description\')" name="edit_btn"><i class="fa-solid fa-pencil"></i> Modifier</a></div>';
            echo "</div>";
            echo ('<td class="text-center suppUser"><a data-id="'.$detail['id'].'" name="deleteProduit" onclick="user_action(\'deleteProduit\',this)" class="btn btn-danger"><i class="fa-solid fa-times"></i> Supprimer</a></td>');

            echo "</div>";
            
        }
    ?>
</div>