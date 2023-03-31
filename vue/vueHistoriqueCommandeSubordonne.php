<?php 
    if(isset($reload) && $reload == true) {
        
        echo '<script>
        if(window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        location.href = "./?action=historiqueCommandeSubordonne&&id='.$_GET['id'].'";
        </script>';
    }
?>

<div class="container-fluid text-center">
    <h1>Historique Commande</h1>
<?php
    echo ('
    <table class="historiquecommande">
        <tr>
            <th>Numéro de commande</th>
            <th>Date de commande</th>
            <th>Montant de la commande</th>
            <th>Type de commande</th>
            <th>Voir la commande</th>
            <th>Supprimer</th>
        </tr>
    ');
foreach ($HistoriqueCommande as $key => $value) {
    echo ('
        <tr>
            <td>'.$value['origin'].'_'.$value['id'].'</td>
            <td>'.$value['dateCreaFini'].'</td>
            <td>'.$value['prix'].'</td>
            <td>'.$value['origin'].'</td>
            <td><a href="./?action=historiquecommandedetailSubordonne&id='.$value['id'].'&type='.$value['origin'].'&&ref='.$id.'" class="btn btn-success"><i class="fa-regular fa-eye"></i> Voir</a></td>
            <td><button data-iduser='.$_GET['id'].' data-iddelete='.$value['id'].' data-origin='.$value['origin'].' onclick="user_action(\'deleteLigneCommande\',this)" name="submit" class="btn btn-danger"><i class="fa-solid fa-times"></i> Supprimer</button></td>
        </tr>');
}
?>
    </table>

    <button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=imprimerRecapCommande&&id=VETSUB&&ref=<?=$id?>'">Imprimer PDF VET</button>
    <button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=imprimerRecapCommande&&id=EPISUB&&ref=<?=$id?>'">Imprimer PDF EPI</button>
    </div>

    