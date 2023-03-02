<?php
if(isset($reload) && $reload == true) {
    echo '<script>
    if(window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>';
}
?>
<div class="container-fluid text-center">
    <h1 class="utilisateurs mt-3">Utilisateurs</h1>
    
        <table class="utilisateurs">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Tel</th>
                    <th>Lieu livraison</th>
                    <th>Responsable</th>
                </tr>
            </thead>
            <tbody>
                
                    <?php foreach($allUsers as $unUser) {
                        $lieu_id = ModeleObjetDAO::getLieuLivraisonUtilisateurs($unUser['login'])['id'];
                        $lieux =  ModeleObjetDAO::getLieuLivraisonUtilisateurs($unUser['login'])['nom'];

                        $responsable_id = ModeleObjetDAO::getResponsableUtilisateur($unUser['id'], $unUser['id_responsable'])['id'];
                        $responsable =  ModeleObjetDAO::getResponsableUtilisateur($unUser['id'], $unUser['id_responsable'])['nom'] . " " . ModeleObjetDAO::getResponsableUtilisateur($unUser['id'], $unUser['id_responsable'])['prenom'];
                        ?>
                        
                        <tr <?php echo('data-login="' . $unUser['login'] . '"') ?>>
                            <td><?php echo $unUser['login'] ;?></td>
                            <?php echo ('<td> <div id="tel" data-data="' . $unUser['tel'] . '"><span>' . $unUser['tel'] . '</span><div class="clear"></div><a class="edit_btn" onclick="edit(this,\'tel\')" name="edit_btn"><i class="fa-solid fa-pencil"></i> Modifier</a></div></td>')?>
                            <?php echo ('<td> <div id="livraison" data-lieu="' . $lieu_id . '" data-data="' . $lieux . '" ><span>' . $lieux  . '</span><div class="clear"></div><a class="edit_btn" onclick="edit(this,\'livraison\')" name="edit_btn"><i class="fa-solid fa-pencil"></i> Modifier</a></div></td>')?>
                            <?php
                                if ($unUser ['id'] == $unUser['id_responsable']){
                                    echo ("<td>Est responsable</td>");
                                }else{
                                    echo ('<td> <div id="responsable" data-responsable="' . $responsable_id . '" data-data="' . $responsable . '" ><span>' . $responsable  . '</span>');
                                    if(ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] != 'Responsable'){
                                        echo('<div class="clear"></div><a class="edit_btn" onclick="edit(this,\'responsable\')" name="edit_btn"><i class="fa-solid fa-pencil"></i> Modifier</a></div></td>');
                                    }
                                    
                                    ?>
                        </tr>
                    <?php   }} ?>
                
                
            </tbody>
        </table>
        <?php 
            if(isset($lieulivraison_data)){
                echo "<select id='select_lieulivraison_blank' style='display:none'>";
                foreach($lieulivraison_data as $lieu){
                    echo "<option value='".$lieu['id']."'>".$lieu['nom']."</option>";
                }
                echo "</select>";
            }
            if(isset($responsable_data)){
                echo "<select id='select_responsable_blank' style='display:none'>";
                foreach($responsable_data as $resp){
                    echo "<option value='".$resp['id']."'>".$resp['nom']." ".$resp['prenom']."</option>";
                }
                echo "</select>";
            }
        ?>
</div>