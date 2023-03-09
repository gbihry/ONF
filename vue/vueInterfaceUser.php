
<div class="text-center interface-header">
    <img src="images/user.png" alt="">
    <p><?= $login ?> (Points : <?= $userPoints ?> <i class="fa-solid fa-ticket"></i> )</p>
</div>
<div class="information-user">
    <div class="general-information">
        <h1>Informations Général</h1>
        <p>Nom : <?= $userSecondName ?> </p>
        <p>Prenom : <?= $userFirstName ?> </p>
        <p>Telephone : <?= $userTel ?> </p>
        <p>Role : <?= $userRole ?> </p>
        <p>Metier : <?= $userStatut ?> </p>
        <p>Votre responsable : <?= $responsable ?> </p>
        
        <?php
            echo '<button type="button" class="btn btn-primary"><a type="submit" href="./?action=newmdp&idUser='.ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'].'"><i class="fa-solid fa-arrows-rotate"></i>Changer votre mdp</a></button>';
        ?> 

    </div>
    <div class="commande-information">
        <h1>Informations commandes</h1>
        <h2>Commandes VET</h2>
        <?php
            if ($historiqueCommande != null){
                echo ('
                <table class="historiquecommandeInterface">
                    <tr>
                        <th>Numéro</th>
                        <th>Date</th>
                        <th>Montant</th>
                        <th>Voir</th>
                    </tr>');
                foreach ($historiqueCommande as $key => $value) {
                    if($value['origin'] == 'VET'){
                            echo ('
                            <tr>
                                <td>'.$value['origin'].'_'.$value['id'].'</td>
                                <td>'.$value['dateCrea'].'</td>
                                <td>'.$value['prix'].'</td>
                                <td><a href="./?action=historiquecommandedetail&id='.$value['id'].'&type='.$value['origin'].'" class="btn btn-success"><i class="fa-regular fa-eye"></i> Voir</a></td>
                            </tr>');
                    }
                }
                echo ('</table>');
            }else{
                echo ('<p>Aucune commande VET</p>');
                echo('<a href="./?action=catalogueVet&&ref=0" class="btn btn-success"><i class="fa-regular fa-eye"></i> Catalogue VET</a>');
            }
                
        ?>
        <hr>
        <h2>Commandes EPI</h2>
        <?php
            if ($historiqueCommande != null){
                echo ('
                <table class="historiquecommandeInterface">
                    <tr>
                        <th>Numéro</th>
                        <th>Date</th>
                        <th>Montant</th>
                        <th>Voir</th>
                    </tr>');
                foreach ($historiqueCommande as $key => $value) {
                    if($value['origin'] == 'EPI'){
                        echo ('
                            <tr>
                                <td>'.$value['origin'].'_'.$value['id'].'</td>
                                <td>'.$value['dateCrea'].'</td>
                                <td>'.$value['prix'].'</td>
                                <td><a href="./?action=historiquecommandedetail&id='.$value['id'].'&type='.$value['origin'].'" class="btn btn-success"><i class="fa-regular fa-eye"></i> Voir</a></td>
                            </tr>');
                    }
                }
                echo ('</table>');
            }else{
                echo ('<p>Aucune commande EPI</p>');
                echo('<a href="./?action=catalogueEpi&&ref=0" class="btn btn-success"><i class="fa-regular fa-eye"></i> Catalogue EPI</a>');
            }
            
        ?>
    </div>
</div>
