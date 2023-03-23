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
    <?php 
        if ($roleUser == 'Responsable'){
            echo ('<h1 class="utilisateurs mt-3">Équipe</h1>');
        }else{
            echo (' <h1 class="utilisateurs mt-3">Utilisateurs</h1>');
            echo ('
                <div class="btnHelp">
                    <a href="docs_utilisation/comment_utiliser_utilisateurs.docx" download>Aide</a>
                </div>
            ');
        }
    ?>
    
    <?php 
        if(isset($msg) && $msg != null) {
            echo '<div class="row">';
                echo '<div class="col-6 mx-auto text-center">';
                    echo '<div class="alert alert-success" role="alert">' . $msg . '</div>';
                echo '</div>';
            echo '</div>';
        }
    ?>
    
        <table class="utilisateurs">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Téléphone</th>
                    <th>Lieu de livraison</th>
                    <th>Responsable</th>
                    <?php 
                        if($roleUser != 'Responsable'){
                            echo('<th>Changer mdp</th>');
                            echo('<th>Modifier</th>');
                            echo('<th>Supprimer</th>');
                            
                        }
                    ?>
                    
                </tr>
            </thead>
            <tbody>
                
                    <?php foreach($allUsers as $unUser) {
                        $lieu_id = ModeleObjetDAO::getLieuLivraisonUtilisateurs($unUser['login'])['id'];
                        $lieux =  ModeleObjetDAO::getLieuLivraisonUtilisateurs($unUser['login'])['nom'];

                        $responsable_id = ModeleObjetDAO::getResponsableUtilisateur($unUser['id'], $unUser['id_responsable'])['id'];
                        $responsable =  ModeleObjetDAO::getResponsableUtilisateur($unUser['id'], $unUser['id_responsable'])['nom'] . " " . ModeleObjetDAO::getResponsableUtilisateur($unUser['id'], $unUser['id_responsable'])['prenom'];

                        $roleUser = ModeleObjetDAO::getRole($unUser['login']);

                        foreach ($roleAcess as $unRole){
                            if ($unRole['libelle'] == $roleUser['libelle']){
                                ?>
                        
                                <tr <?php echo('data-login="' . $unUser['login'] . '"') ?>>
                                <td><?php echo $unUser['login'] ;?></td>
                                <?php echo ('<td> <div id="tel" data-data="' . $unUser['tel'] . '"><span>' . $unUser['tel'] . '</span></td>')?>
                                <?php echo ('<td> <div id="livraison" data-lieu="' . $lieu_id . '" data-data="' . $lieux . '" ><span>' . $lieux  . '</span></td>')?>
                                <?php
                                    if ($unUser ['id'] == $unUser['id_responsable']){
                                        echo ("<td>Est responsable</td>");
                                    }else{
                                        echo ('<td> <div id="responsable" data-responsable="' . $responsable_id . '" data-data="' . $responsable . '" ><span>' . $responsable  . '</span>');
                                    }

                                    if($role != 'Responsable'){
                                        echo ('<td class="text-center resetPwd"><a type="submit" href="./?action=newmdp&id='.$unUser['id'].'" class="btn btn-primary"><i class="fa-solid fa-arrows-rotate"></i> Changer</a></td>');
                                        echo ('<td class="text-center suppUser"><a class="btn btn-primary" href="./?action=editUser&id='.$unUser['id'].'"><i class="fa-solid fa-pencil"></i> Modifier</a></td>');
                                        echo ('<td class="text-center suppUser"><a data-id="'.$unUser['id'].'" name="deleteUser" onclick="user_action(\'deleteUser\',this)" class="btn btn-danger"><i class="fa-solid fa-times"></i> Supprimer</a></td>');
                                    }
                                        
                            
                            }
                        }
                        ?>
                        </tr>
                    <?php   } ?>
                
                
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

<script>
    function afficherMdp() {
        var x = document.getElementById("mdpLogin");
        if (x.type === "password") {
            x.type = "text";
            document.getElementById('afficher').className = "fa-solid fa-eye-slash"; 
        } else {
            x.type = "password";
            document.getElementById('afficher').className = "fa-solid fa-eye"; 
        }
    }
</script>