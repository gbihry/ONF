<div class="container-fluid text-center">
    <h1 class="recapCommandeEpi mt-3">Modifier commande subordonne</h1>
        <table class="recapCommandeEpi">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Catalogue VET</th>
                    <th>Catalogue EPI</th>
                    <th>Panier EPI</th>
                    <th>Panier VET</th>
                    <th>Historique</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lesSubordonne as $unSubordonne){?>
                    <tr>
                
                        <td><?php echo $unSubordonne['nom'] ;?></td>
                        <td><?php echo $unSubordonne['prenom'] ;?></td>
                        
                    <?php if((ModeleObjetDAO::getUtilisateurCommandeTerminer($unSubordonne['id'], 'VET')) == 1){ ?>
                        <td><button type='submit' id ='redBySFR' name='submit' class='btn btn-success mt-2' <?php echo $unSubordonne['id'];?> >acceder</button></td>

                    <?php }else{
                        if($unSubordonne['idMetier'] == 5 || $unSubordonne['idMetier'] == 6 || $unSubordonne['idMetier'] == 7 || $unSubordonne['idMetier'] == 8 || $unSubordonne['idMetier'] == 9){
                        ?>
                            <td><button type='submit' id ='redBySFR' name='submit' class='btn btn-success mt-2'  <?php echo $unSubordonne['id']; ?> >acceder</button></td>
                        <?php
                        }else{
                        ?>
                            <td><button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=catalogueVet&&id= <?php echo $unSubordonne['id'] ?>';" >acceder</button></td>
                        <?php
                        }
                    ?>

                    <?php }if((ModeleObjetDAO::getUtilisateurCommandeTerminer($unSubordonne['id'], 'EPI')) == 1 && $unSubordonne['idMetier'] != 5 && $unSubordonne['idMetier'] != 6 && $unSubordonne['idMetier'] != 7 && $unSubordonne['idMetier'] != 8 && $unSubordonne['idMetier'] != 9){ ?>
                        <td><button type='submit' id ='redBySFR' name='submit' class='btn btn-success mt-2'  <?php echo $unSubordonne['id']; ?> >acceder</button></td>

                    <?php }elseif(ModeleObjetDAO::getUtilisateurCommandeTerminer($unSubordonne['id'], 'EPI') == 0 && $unSubordonne['idMetier'] != 5 && $unSubordonne['idMetier'] != 6 && $unSubordonne['idMetier'] != 7 && $unSubordonne['idMetier'] != 8 && $unSubordonne['idMetier'] != 9){ ?>
                        <td><button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=catalogueEpi&&id= <?php echo $unSubordonne['id']?>';" >acceder</button></td>
                                
                    <?php }if((ModeleObjetDAO::getUtilisateurCommandeTerminer($unSubordonne['id'], 'EPI') == 1) && ($unSubordonne['idMetier'] == 5 || $unSubordonne['idMetier'] == 6 || $unSubordonne['idMetier'] == 7 || $unSubordonne['idMetier'] == 8 || $unSubordonne['idMetier'] == 9)) {?>
                        <td><button type='submit' id ='redBySFR' name='submit' class='btn btn-success mt-2'  <?php echo $unSubordonne['id'];    ?> >acceder</button></td>

                    <?php }elseif(ModeleObjetDAO::getUtilisateurCommandeTerminer($unSubordonne['id'], 'EPI') == 0 && $unSubordonne['idMetier'] == 5 || $unSubordonne['idMetier'] == 6 || $unSubordonne['idMetier'] == 7 || $unSubordonne['idMetier'] == 8 || $unSubordonne['idMetier'] == 9){ ?>
                        <td><button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=catalogueEpiNonOuvrier&&id= <?php echo $unSubordonne['id']?>';">acceder</button></td>
                <?php } ?>
                        <td><button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=panierEPISubordonne&&id= <?php echo $unSubordonne['id'] ?>';">acceder</button></td>
                        <td><button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=panierVETSubordonne&&id= <?php echo $unSubordonne['id'] ?>';">acceder</button></td>
                        <td><button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=historiqueCommandeSubordonne&&id= <?php echo $unSubordonne['id'] ?>';">acceder</button></td>
                <?php } ?>

                    </tr> 

        </tbody>
    </table>
    <button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=imprimerRecapCommande&&id=AllVet&&ref=0'">Imprimer tout les PDF VET</button>
    <button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=imprimerRecapCommande&&id=AllEpi&&ref=0'">Imprimer tout les PDF EPI</button>
</div>
