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
            echo "<div class ='unProduit'>";
            echo "<div class='main-produit'>";
            echo "<img class='img-produit' src='images/".($detail['fichierPhoto'])."'>";
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
                <input type="number" class="form-control" name='quantity' min='0' value='0' max='<?php echo ModeleObjetDAO::getQuantiteEpiMax($unStatut['statut'],$detail['idType']);   ?>' aria-describedby="inputGroup-sizing-sm">
                
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
                        echo ("<option value=" . (ModeleObjetDAO::getTaille($detail['id']))['id'] .">" . (ModeleObjetDAO::getTaille($detail['id']))['libelle']. "</option>")
                        
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
    ?>
</div>