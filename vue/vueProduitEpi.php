<?php
if(isset($reload) && $reload == true) {
    echo '<script>
    if(window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>';
}
?>
    <?php  
        echo ('<h1 class="text-center m-3"> '.$nomCategorie.' </h1>');
        foreach($unProduit as $detail){
            if ($roleUser == 'Administrateur' || $roleUser == 'Gestionnaire de commande'){
                echo "<div class ='unProduit'>";
                echo "<div class='main-produit'>";
                if (file_exists("images/produits/".($detail['fichierPhoto']))){
                    echo "<img class='img-produit' src='images/produits/".($detail['fichierPhoto'])."'>";
                }else{
                    echo "<img class='img-produit' src='images/error.png'>";
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
                ($unStatut['id'] == 1 && $detail['id'] != 207 && $detail['id'] != 6  && $detail['idType'] == 2) || 
                ($unStatut['id'] == 2 && $detail['id'] == 6) || 
                ($unStatut['id'] != 3 && $unStatut['id'] != 4 && $unStatut['id'] != 9 && $detail['id'] == 18) || 
                ($unStatut['id'] != 9 && $detail['id'] == 16) || ($unStatut['id'] != 4 && $detail['id'] == 36)){
                
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
                ($unStatut['id'] == 1 && $detail['id'] != 207 && $detail['id'] != 6  && $detail['idType'] == 2) || 
                ($unStatut['id'] == 2 && $detail['id'] == 6) || 
                ($unStatut['id'] != 3 && $unStatut['id'] != 4 && $unStatut['id'] != 9 && $detail['id'] == 18) || 
                ($unStatut['id'] != 9 && $detail['id'] == 16) || ($unStatut['id'] != 4 && $detail['id'] == 36)){
                    
                
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
    }
    ?>
</div>