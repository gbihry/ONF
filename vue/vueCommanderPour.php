<div class="container-fluid text-center">
    <h1 class="recapCommandeEpi mt-3">Modifier commande subordonne</h1>
        
    
    <table class="recapCommandeEpi">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Acceder au compte</th>
            </tr>
        </thead>
        <tbody>
            
                <?php foreach($lesSubordonne as $unSubordonne){?>
                    <tr>
                        <td><?php echo $unSubordonne['nom'] ;?></td>
                        <td><?php echo $unSubordonne['prenom'] ;?></td>
                        <td><button type='submit' name='submit' class='btn btn-success mt-2' value='epi'>Pdf epi</button></td>
                       
                    </tr>
                <?php   } ?>
            
            
        </tbody>
    </table>

</div>