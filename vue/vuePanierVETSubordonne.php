<div class="container-fluid text-center">
    <h1>Panier VET</h1>
    <div class="panier">
        <?php 

        if ($ligneCommandeVET == false){
            echo ('<p class="empty_panier"> Aucun article dans le panier </p>');
        } else {
            echo('<p class="panier_title_type">VET</p>');

        $prixTotal = 0;

        foreach ($ligneCommandeVET as $ligneCommandeUnique) {
            $idLigne = $ligneCommandeUnique['id'];
            $type = $ligneCommandeUnique['type'];
            $idProduit = $ligneCommandeUnique['idProduit'];
            $fichierPhoto = $ligneCommandeUnique['fichierPhoto'];
            $nom = $ligneCommandeUnique['nom'];
            $quantite = $ligneCommandeUnique['quantite'];
            $prix = $ligneCommandeUnique['prix'];
            $taille = $ligneCommandeUnique['libelle'];
            $prixTotal += $ligneCommandeUnique['prix'] * $ligneCommandeUnique['quantite'];
                echo ("<div class='content'>
                        <div class='image'>
                        ");
                        if (file_exists("images/produits/".($fichierPhoto))){
                            echo "<img src='images/produits/" . $fichierPhoto . "'>";
                        }else{
                            echo "<img class='img-produit' src='images/error.png'>";
                        }
                        echo ("
                        </div>
                        <div class='libelle'>
                            <p class='panier_title'>Description produit</p>
                            <p> " . $nom . "</p>
                        </div>
                        <div class'prix'>
                            <p class='panier_title'>Prix</p>
                            <p> " . $prix ."</p>
                        </div>
                        <div class'quantite'>
                            <p class='panier_title'>Quantite</p>
                            <p> " .  $quantite."</p>
                        </div>
                        <div class='taille'>
                            <p class='panier_title'>Taille</p>
                            <p> " .$taille . "</p>
                        </div>
                        <div class='supprimer'>
                            <form action='' method='post'>
                                <input type='hidden' name='idproduit' value=".$idProduit.">
                                <input type='hidden' name='type' value='VET'>
                                <input type='hidden' name='idLigne' value='".$idLigne."'>
                                <button type='submit'>Supprimer</button>
                            </form>
                        </div>
                    </div> 
                ");
        }
        ?>
        <div class='valide_panier'>
        <?php
                echo("
                <div class='prixTotal'>
                    <p>Prix total : <span class='prix_total_span'>".$prixTotal ." <i class='fa-solid fa-ticket'></i></span></p>
                </div> 
                ");

                echo('
                <form action="./?action=recapPanierSubordonne&type=vet&ref='.$id.'" method="POST">
                    <input type="hidden" name="validePanier" value="true">
                    <input type="submit" class="btn btn-success" value="Valider le panier">
                </form>
                ');
        }
        ?> 
        </div>

    </div>
</div>