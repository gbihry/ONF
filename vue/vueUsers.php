
<div class="container-fluid text-center">
    <h1 class="utilisateurs mt-3">Utilisateurs</h1>
    <form action="./?action=pdfEpi" method="post" target="_blank">
    
        <table class="utilisateurs">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Tel</th>
                    <th>Lieu livraison</th>
                </tr>
            </thead>
            <tbody>
                
                    <?php foreach($allUsers as $unUser){?>
                        
                        <tr>
                            <td><?php echo $unUser['login'] ;?></td>
                            <td><?php echo $unUser['tel'] ;?></td>
                            <td><?php echo ModeleObjetDAO::getLieuLivraisonUtilisateurs($unUser['login']) ?></td>
                        </tr>
                    <?php   } ?>
                
                
            </tbody>
        </table>
    </form>
</div>