<div class="container-fluid text-center">
    <h1>Panier VET</h1>
    <div class="panier">
        <?php 

        if ($ligneCommandeVET == false){
            echo ('<p class="empty_panier"> Aucun article dans le panier </p>');
        }else {
            echo('<p class="panier_title_type">VET</p>');

            $prixTotal = 0;
            foreach ($ligneCommandeVET as $ligneCommandeUnique) {
                $idLigne = $ligneCommandeUnique['id'];
                $idProduit = $ligneCommandeUnique['idProduit'];
                $type = $ligneCommandeUnique['type'];
                $fichierPhoto = $ligneCommandeUnique['fichierPhoto'];
                $nom = $ligneCommandeUnique['nom'];
                $quantite = $ligneCommandeUnique['quantite'];
                $prix = $ligneCommandeUnique['prix'];
                $taille = $ligneCommandeUnique['libelle'];
                $prixTotal += $ligneCommandeUnique['prix'] * $ligneCommandeUnique['quantite'];
                $lesTailles = ModeleObjetDAO::getTaille($ligneCommandeUnique['idProduit']);
                $idTaille = ModeleObjetDAO::getIdTailleByNomTaille($taille);
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
                                <p class='panier_title'>Points</p>
                                <p> " . $prix ."</p>
                            </div>
                            <div class='quantite' 'data-idligne='" . $idLigne . "'>
                                <p class='panier_title'>Quantite:</p>
                                <div id='quantite' data-ligne='". $idLigne ."' data-data='". $quantite . "'><span>" . $quantite . "</span><div class='clear'></div><a class='edit_btn' onclick='edit(this,\"quantiteVET\")' name='edit_btn'><i class='fa-solid fa-pencil'></i> Modifier</a></div>
                            </div>
                            <div class='taille'>
                                <p class='panier_title'>Taille</p>
                            ");

                                if ($taille == "Taille Unique"){
                                    echo ("<div id='quantite'><span>" . $taille . "</span></div>");
                                }else{
                                    echo ("<div id='quantite' data-produit='". $idProduit ."' data-ligne='". $idLigne ."' data-taille='". $idTaille ."' data-data='". $taille . "'><span>" . $taille . "</span><div class='clear'></div><a class='edit_btn' onclick='edit(this,\"tailleVET\")' name='edit_btn'><i class='fa-solid fa-pencil'></i> Modifier</a></div>");
                                }
                            ?>
                            </div>
                            <div class='supprimer'>
                                <form action='' method='post'>
                                    <input type='hidden' name='idproduit' value="<?php echo($idProduit); ?>">
                                    <input type='hidden' name='type' value='VET'>
                                    <input type='hidden' name='idLigne' value="<?php echo($idLigne); ?>">
                                    <button type='submit'>Supprimer</button>
                                </form>
                            </div>
                        </div> 
            <?php 
                if(isset($lesTailles)){
                    echo "<select id='select_taillevet_".$idProduit."_blank' style='display:none'>";
                    foreach($lesTailles as $taille){
                        echo "<option value='".$taille['id']."'>".$taille['libelle']."</option>";
                    }
                    echo "</select>";
                }
            } ?>
            <div class='valide_panier'>
            <?php
                    echo("
                    <div class='prixTotal'>
                        <p>Points totaux : <span class='prix_total_span'>".$prixTotal ." <i class='fa-solid fa-ticket'></i></span></p>
                    </div> 
                    ");
                    $reste = $pointUtilisateur - $prixTotal;
                    echo("
                    <div class='prixTotal'>
                        <p>Points restants : <span class='prix_total_span'>". $reste." <i class='fa-solid fa-ticket'></i></span></p>
                    </div> 
                    ");

                    echo('
                    <form action="./?action=recapPanier&type=vet" method="POST">
                        <input type="hidden" name="validePanier" value="true">
                        <input type="submit" class="btn btn-success" value="Valider le panier">
                    </form>
                    ');
            }
        ?>
        </div>

    </div>
</div>