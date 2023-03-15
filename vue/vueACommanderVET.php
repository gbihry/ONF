<div class="container-fluid text-center">
    <h1 class="Acommander">Utilisateur(s) n'ayant pas commandé de VET</h1>
<?php
    echo ('
    <table class="historiquecommande">
        <tr>
            <th>Id utilisateurs</th>
            <th>Nom et prénom</th>
            <th>Mail</th>
            <th>Date de création panier</th>
        </tr>
    ');
    foreach ($AllUsersNoncommanderVET as $key => $value) {
        $roleUser = ModeleObjetDAO::getRole($value['login']);
        foreach ($roleAcess as $unRole){
            if ($unRole['libelle'] == $roleUser['libelle']){
                if($id != $value['id']){
                    echo ('
                    <tr>
                        <td>'.$value['id'].'</td>
                        <td>'.$value['nom'].'_'.$value['prenom'].'</td>
                        <td>'.$value['email'].'</td>
                        <td>'.$value['dateCrea'].'</td>
                    </tr>');
                }
            }
        }
    }
        
    ?>
    </table>
    <h1 class="Acommander">Utilisateur(s) ayant commandé des VET</h1>
    <?php
    echo ('
    <table class="historiquecommande">
        <tr>
            <th>Id utilisateurs</th>
            <th>Nom et prénom</th>
            <th>Mail</th>
            <th>Date de confirmation de panier</th>
        </tr>
    ');
    foreach ($AllUsersAcommanderVET as $key => $value) {
        $roleUser = ModeleObjetDAO::getRole($value['login']);
        foreach ($roleAcess as $unRole){
            if ($unRole['libelle'] == $roleUser['libelle']){
                if($id != $value['id']){
                    echo ('
                    <tr>
                        <td>'.$value['id'].'</td>
                        <td>'.$value['nom'].'_'.$value['prenom'].'</td>
                        <td>'.$value['email'].'</td>
                        <td>'.$value['dateCreaFini'].'</td>
                    </tr>');
                }
            }
        }
    }
    ?>
    </table>

    <button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=aCommander'"> Commande EPI</button>

</div>