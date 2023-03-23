
<div class="text-center interface-header">
    <img src="images/user.png" alt="">
    <?php 
        if($metier['id'] == 1 || $metier['id'] == 2 ||$metier['id'] == 3|| $metier['id'] == 4){
            echo('<p> '. $login .' ( Points : '. $userPoints .' <i class="fa-solid fa-ticket"></i> )</p>');
        }else{
            echo('<p> '. $login .' </p>');
        }
    ?>
    
    <a class="switchtheme" id="switchtheme"><i class="fa-solid"></i></a>
</div>
<div class="information-user">
    <div class="general-information">
        <h1>Informations Générales</h1>
        <p>Nom : <?= $userSecondName ?> </p>
        <p>Prenom : <?= $userFirstName ?> </p>
        <p>Téléphone : <?= $userTel ?> </p>
        <p>Rôle : <?= $userRole ?> </p>
        <p>Metier : <?= $userStatut ?> </p>
        <p>Votre responsable : <?= $responsable ?> </p>
        
        <?php
            echo '<a type="submit" class="btn btn-primary" href="./?action=newmdp&idUser='.ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'].'"><i class="fa-solid fa-arrows-rotate"></i>Changer votre mot de passe</a>';
        ?> 

    </div>
    <div class="commande-information">
        <h1>Informations commandes</h1>
        <?php
        if($metier['id'] == 1 || $metier['id'] == 2 ||$metier['id'] == 3|| $metier['id'] == 4){
        ?>
            <h2>Commandes VET</h2>
        <?php
        }
            if ($verifCommandeVet != 0){
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
                                <td>'.$value['dateCreaFini'].'</td>
                                <td>'.$value['prix'].'</td>
                                <td><a href="./?action=historiquecommandedetail&id='.$value['id'].'&type='.$value['origin'].'" class="btn btn-success"><i class="fa-regular fa-eye"></i> Voir</a></td>
                            </tr>');
                    }
                }
                echo ('</table>');
            }else{
                if($metier['id'] == 1 || $metier['id'] == 2 ||$metier['id'] == 3|| $metier['id'] == 4){
                    echo ('<p>Aucune commande VET</p>');
                    echo('<a href="./?action=catalogueVet&&id=0" class="btn btn-success"><i class="fa-regular fa-eye"></i> Catalogue VET</a>');
                }
            }
                
        ?>
        <hr>
        <h2>Commandes EPI</h2>
        <?php
            if ($verifCommandeEpi != 0){
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
                                <td>'.$value['dateCreaFini'].'</td>
                                <td>'.$value['prix'].'</td>
                                <td><a href="./?action=historiquecommandedetail&id='.$value['id'].'&type='.$value['origin'].'" class="btn btn-success"><i class="fa-regular fa-eye"></i> Voir</a></td>
                            </tr>');
                    }
                }
                echo ('</table>');
            }else{
                echo ('<p>Aucune commande EPI</p>');
                if($metier['id'] == 5 || $metier['id'] == 6 ||$metier['id'] == 7|| $metier['id'] == 8 || $metier['id'] == 9){
                    if($dateAuj < $dateFin){
                        echo('<a href="./?action=catalogueEpiNonOuvrier&&id=0" class="btn btn-success"><i class="fa-regular fa-eye"></i> Catalogue EPI</a>');
                    }
                }
                else{
                    if($dateAuj < $dateFin){
                        echo('<a href="./?action=catalogueEpi&&id=0" class="btn btn-success"><i class="fa-regular fa-eye"></i> Catalogue EPI</a>');
                    }
                }
            }
            
        ?>
    </div>
</div>
