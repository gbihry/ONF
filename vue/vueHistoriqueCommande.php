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
        </tr>
    ');
foreach ($HistoriqueCommande as $key => $value) {
    echo ('
        <tr>
            <td>'.$value['origin'].'_'.$value['id'].'</td>
            <td>'.$value['dateCreaFini'].'</td>
            <td>'.$value['prix'].'</td>
            <td>'.$value['origin'].'</td>
            <td><a href="./?action=historiquecommandedetail&id='.$value['id'].'&type='.$value['origin'].'" class="btn btn-success"><i class="fa-regular fa-eye"></i> Voir</a></td>
        </tr>');
}
?>
    </table>
    <button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=imprimerRecapCommande&&ref=VET'">Imprimer PDF VET</button>
    <button type='submit' name='submit' class='btn btn-success mt-2' onclick="window.location.href = './?action=imprimerRecapCommande&&ref=EPI'">Imprimer PDF EPI</button>
    </div>