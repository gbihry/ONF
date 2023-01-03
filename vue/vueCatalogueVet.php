<div class="catalogue">
    <div class="contenue">
    <?php 
        foreach($catalogue as $uneCategorie){
                echo "<div class='tuile'>
                        <p>" . $uneCategorie['libelle'] . "</p>
                        <a href='./?action=produitVet&id=".$uneCategorie['id']."'><img src='images/categorie/".$uneCategorie['libelle'].'.jpg' . "'></a>
                    </div>";
        }
      
    ?>
    </div>
</div>

