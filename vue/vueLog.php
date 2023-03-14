<div class="btnBdd">
    <button type='submit' name='submit' class='btn btn-success mt-3 mr-1' onclick="window.location.href = './?action=log&&ref=1';" >Tout les logs</button>
    <button type='submit' name='submit' class='btn btn-success mt-3' onclick="window.location.href = './?action=log&&ref=2';" >Log par utilisateur</button>
</div>
    <?php 

        if(isset($toutLesLogs)){
    ?>
            <table class="recapCommandeEpi">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Login</th>
                </tr>
            </thead>
            <tbody>
                
                    <?php foreach($toutLesLogs as $unLog){?>
                        <tr>
                            <td><?php echo $unLog['date'] ;?></td>
                            <td><?php echo $unLog['description'] ;?></td>
                            <td><?php echo $unLog['login'] ;?></td>
                        </tr>
                    <?php   } ?>
                
                
            </tbody>
        </table>

    <?php
        } if(isset($allLogin)){
    ?>
        <form  method="post" action="./?action=log&&ref=3" class="d-flex justify-content-center mt-4">
            <div class="d-flex justify-content-center  w-50 p-3">
                    <select name="utilisateur" class="custom-select" id="inputGroupSelect01">
                    <option class="text-center " value="selectionner">--------------Séléctionner--------------</option>
                    <?php 
                        foreach($allLogin as $unLogin){
                            echo ("<option value=" . ($unLogin["login"]).">" . ($unLogin["login"]). "</option>");
                        }     
                    ?>
                    </select>
                    <button type='submit' name='submit' value="submit" class='btn btn-success '>Confirmer</button>
            </div>
            
        </form>
    <?php
        }if(isset($logById)){

    ?>
            <table class="recapCommandeEpi">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Login</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($logById as $unLogById){
                ?>
                <tr>
                    <td><?php echo $unLogById['date'] ;?></td>
                    <td><?php echo $unLogById['description'] ;?></td>
                    <td><?php echo $unLogById['login'] ;?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php
        }
    ?>

