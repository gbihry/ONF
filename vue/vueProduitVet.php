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
        foreach($unProduit as $detail){
            $verifVisible = intVal(ModeleObjetDAO::verifProduitVisible($detail['id']));
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
            if($role == 'Gestionnaire de commande' || $role == 'Administrateur'){
                echo ('<a class="btn btn-primary" href="./?action=editProduit&id='.$detail['id'].'"><i class="fa-solid fa-pencil"></i> Modifier</a>');
            }
            echo "</div>";
            echo "<div class='main-desc'>";
            echo "<p>" .$detail['description'] ."</p>";
            echo "<form method='POST'>";
            ?>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Quantité :</span>
                </div>
                <input type="number" class="form-control" name='quantity' min='1' value='1' max='20' aria-describedby="inputGroup-sizing-sm">
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
        }
            echo "<div class='w-100 p-3'><h3 class='float-right'>Points totaux : <span class='produitvet_prix'>".$detail['prix']." <i class='fa-solid fa-ticket'></i></span></h3></div>";
            echo "<button type='submit' name='submit' class='btn btn-success float-right' value='" . $detail['id'] . "'>Ajouter au panier</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";

    ?>
</div>