<?php
if(isset($reload) && $reload == true) {
    echo '<script>
    if(window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    location.href = "./?action=catalogueVet&id='.$_GET['id'].'";
    </script>';
}

if (isset($_GET['id']) && $_GET['id'] != 0){
    echo ('<a href="./?action=commanderPour" class="returnarrow"><i class="fa-solid fa-arrow-left"></i><p>Retour</p></a>');
}else{
    echo ('<a href="./?action=accueil" class="returnarrow"><i class="fa-solid fa-arrow-left"></i><p>Retour</p></a>');
}
?>
<div class="catalogue">
    <div class="text-center">
        <p class="catalogue_title_type"> Catalogue VET</p>
    </div>

    <div class="contenue">
        <div class="container-fluid text-center mt-5 produit">
        <form method='POST'>
            <button type='submit' name='trie' class='btn btn-success' value='DESC'>Trie par prix décroissant</button>
            <button type='submit' name='trie' class='btn btn-success' value='ASC'>Trie par prix croissant</button>
        </form>
            <?php 
            foreach($allProducts as $detail){
                $descGras = ModeleObjetDAO::getDescGras($detail['id']);
                $desReste = ModeleObjetDAO::getRestPs($detail['id']);
                echo "<div class ='unProduit'>";
                echo "<div class='main-produit'>";
                if (file_exists("images/produits/".($detail['fichierPhoto']))){
                    echo "<img class='img-produit' src='images/produits/".($detail['fichierPhoto'])."'>";
                }else{
                    echo "<img class='img-produit' src='images/error.png'>";
                }
                echo "<h1>".$detail['nom']."</h1>";
                if($roleUser == 'Gestionnaire de commande' || $roleUser == 'Administrateur'){
                    echo ('<a class="btn btn-primary" href="./?action=editProduit&id='.$detail['id'].'"><i class="fa-solid fa-pencil"></i> Modifier</a>');
                }
                echo "</div>";
                echo "<div class='main-desc'>";
                if ($descGras != ''){
                    echo ("<p>". $desReste."<span id='descGras'>". $descGras . "</span></p>");
                }else{
                    echo "<p>" .$detail['description'] ."</p>";
                }
                
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
    </div>
</div>

