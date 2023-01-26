
<div class="container-fluid text-center">
    <h1 class="Acommander">Utilisateurs n'ayant pas commandé</h1>
<?php
    echo ('
    <table class="historiquecommande">
        <tr>
            <th>Id utilisateurs</th>
            <th>Nom et prénom</th>
            <th>Mail</th>
        </tr>
    ');
    foreach ($AllUsers as $key => $value) {
        if ($value['dateCrea'] == null){
            echo ('
                <tr>
                    <td>'.$value['id'].'</td>
                    <td>'.$value['nom'].'_'.$value['prenom'].'</td>
                    <td>'.$value['email'].'</td>
                </tr>');
            }
        }
    ?>
    </table>
</div>