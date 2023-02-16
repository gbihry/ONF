
<div class="container-fluid text-center">
    <h1 class="recapCommandeEpi mt-3">Récap commande EPI</h1>
    <form action="./?action=pdfEpi" method="post" target="_blank">
        <button type='submit' name='submit' class='btn btn-success mt-2' value='epi'>Pdf epi</button>
    
    <table class="recapCommandeEpi">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantite</th>
                <th>Lieu de livraison</th>
            </tr>
        </thead>
        <tbody>
            
                <?php foreach($RecapEpi as $uneCommandeEpi){?>
                    <tr>
                        <td><?php echo $uneCommandeEpi['produit'] ;?></td>
                        <td><?php echo $uneCommandeEpi['sum(quantite)'] ;?></td>
                        <td><?php echo $uneCommandeEpi['nom'] ;?></td>
                    </tr>
                <?php   } ?>
            
            
        </tbody>
    </table>
    </form>
    <form action="./?action=pdfVet" method="post">
        
        <h1 class="recapCommandeEpi mt-3">Récap commande VET</h1>
        <button type='submit' name='submit' class='btn btn-success mt-2' value='vet'>Pdf vet</button>
        <table class="recapCommandeEpi">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantite</th>
                <th>Lieu de livraison</th>
            </tr>
        </thead>
        <tbody>
            
                <?php foreach($RecapVet as $uneCommandeVet){?>
                    <tr>
                        <td><?php echo $uneCommandeVet['produit'] ;?></td>
                        <td><?php echo $uneCommandeVet['sum(quantite)'] ;?></td>
                        <td><?php echo $uneCommandeVet['nom'] ;?></td>
                    </tr>
                <?php   } ?>
            
            
            </tbody>
        </table>
    </form>
                    
    
</div>





        

