<div class="container-fluid text-center">
    <h1 class="recapCommandeEpi mt-3">Modifier commande subordonne</h1>
        


    
        <table class="recapCommandeEpi">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Commande EPI</th>
                    <th>Commande VET</th>
                    <th>Récap EPI</th>
                    <th>Récap VET</th>
                </tr>
            </thead>
            <tbody>
                
                    <?php foreach($lesSubordonne as $unSubordonne){?>
                        <tr>
                            <td><?php echo $unSubordonne['nom'] ;?></td>
                            <td><?php echo $unSubordonne['prenom'] ;?></td>
                            <td><button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=catalogueEpi&&ref= <?php echo $unSubordonne['id'];?> ';">acceder</button></td>
                            <td><button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=catalogueVet&&ref= <?php echo $unSubordonne['id'] ?>';">acceder</button></td>
                            <td><button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=panierEPISubordonne&&ref= <?php echo $unSubordonne['id'] ?>';">acceder</button></td>
                            <td><button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=panierVETSubordonne&&ref= <?php echo $unSubordonne['id'] ?>';">acceder</button></td>
                        </tr>
                    <?php   } ?>
                
                
            </tbody>
        </table>


    

</div>

