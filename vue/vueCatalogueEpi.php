<div class="catalogue">
    <div class="text-center">
        <p class="catalogue_title_type"> Catalogue EPI</p>
    </div>
    <div class="contenue">
    <?php 
    
        foreach($catalogue as $uneCategorie){
                echo "<div class='tuile'>
                        <p>" . $uneCategorie['libelle'] . "</p>
                        <a href='./?action=produitEpi&id=".$uneCategorie['id']."'><img src='images/categorie/".$uneCategorie['libelle'].'.jpg' . "'></a>
                    </div>";
        }
        
    ?>
    </div>
</div>