<div class="container-fluid text-center">
    <h1>Panier EPI</h1>
    <div class="panier">
        <?php 

        if ($ligneCommandeEPI == false){
            echo ('<p class="empty_panier"> Aucun article dans le panier </p>');
        } else {
            echo('<p class="panier_title_type">EPI</p>');

        foreach ($ligneCommandeEPI as $ligneCommandeUnique) {
            $idLigne = $ligneCommandeUnique['id'];
            $idProduit = $ligneCommandeUnique['idProduit'];
            $type = $ligneCommandeUnique['type'];
            $fichierPhoto = $ligneCommandeUnique['fichierPhoto'];
            $nom = $ligneCommandeUnique['nom'];
            $quantite = $ligneCommandeUnique['quantite'];
            $taille = $ligneCommandeUnique['libelle'];
            $lesTailles = ModeleObjetDAO::getTaille($ligneCommandeUnique['idProduit']);
            $idTaille = ModeleObjetDAO::getIdTailleByNomTaille($taille);
            $unStatut = ModeleObjetDAO::getStatut($_SESSION['login'])['statut'];

            $max = ModeleObjetDAO::getQuantiteEpiMax($unStatut,$ligneCommandeUnique['idType']);
            $maxQuantite = ModeleObjetDAO::getQuantiteEpi($_SESSION['login'],$ligneCommandeUnique['idType'])['sum(quantite)'];
                echo ("<div class='content'>
                        <div class='image'>
                            <img src='images/" . $fichierPhoto . "' alt=''>
                        </div>
                        <div class='libelle'>
                            <p class='panier_title'>Description produit</p>
                            <p> " . $nom . "</p>
                        </div>
                        <div class='quantite' 'data-idligne='" . $idLigne . "'>
                            <p class='panier_title'>Quantite (max : " . $max . ")</p>
                            ");
                    if ($maxQuantite > $max){
                        echo ("<div id='quantite' data-ligne='". $idLigne ."' data-data='". $max . "'><span>" . $max . "</span><div class='clear'></div><a class='edit_btn' onclick='edit(this,\"quantiteEPI\")' name='edit_btn'><i class='fa-solid fa-pencil'></i> Modifier</a></div>");
                    }else{
                        echo ("<div id='quantite' data-ligne='". $idLigne ."' data-data='". $quantite . "'><span>" . $quantite . "</span><div class='clear'></div><a class='edit_btn' onclick='edit(this,\"quantiteEPI\")' name='edit_btn'><i class='fa-solid fa-pencil'></i> Modifier</a></div>");
                    }
                    echo ("
                    </div>
                    <div class='taille'>
                            <p class='panier_title'>Taille</p>
                            <div id='quantite' data-ligne='". $idLigne ."' data-taille='". $idTaille ."' data-data='". $taille . "'><span>" . $taille . "</span><div class='clear'></div><a class='edit_btn' onclick='edit(this,\"tailleEPI\")' name='edit_btn'><i class='fa-solid fa-pencil'></i> Modifier</a></div>
                        </div>
                        <div class='supprimer'>
                            <form action='' method='post'>
                                <input type='hidden' name='idproduit' value=".$idProduit.">
                                <input type='hidden' name='type' value='EPI'>
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
                echo('
                <form action="./?action=recapPanier&type=epi" method="POST">
                    <input type="hidden" name="validePanier" value="true">
                    <input type="submit" class="btn btn-success" value="Valider le panier">
                </form>
                ');
                if(isset($lesTailles)){
                    echo "<select id='select_tailleepi_blank' style='display:none'>";
                    foreach($lesTailles as $taille){
                        echo "<option value='".$taille['id']."'>".$taille['libelle']."</option>";
                    }
                    echo "</select>";
                }
            }
        ?> 
        </div>

    </div>
</div>