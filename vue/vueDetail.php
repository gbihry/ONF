<div class="container-fluid text-center mt-5 produit">
    <?php 
        foreach($unProduit as $detail){
            echo "<div class='main-produit'>";
            $nomPhoto = ModeleObjetDAO::getImage($detail['idImage'])['nom'];
            if (file_exists("images/produits/".$nomPhoto)){
                echo "<img class='img-produit' src='images/produits/".$nomPhoto."'>";
            }else{
                echo "<img class='img-produit' src='images/error.png'>";
            }
            echo "<h1>".$detail['nom']."</h1>";
            echo "</div>";
            echo "<div class='main-desc'>";
            echo "<p>" .$detail['description'] ."</p>";
            echo "<h3>".$detail['prix']." points</h3>";
            echo "<button type='button' class='btn btn-outline-success m-5'>Ajouter au panier</button>";
            echo "</div>";
        }
    
    ?>
</div>