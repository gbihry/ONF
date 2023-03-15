<?php
    include "$racine/vue/vueEntete.php";
	require("$racine/modele/PDF.php");
    $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'];
    $type = $_GET["id"];
    switch($type){
        case 'EPI':
            $pdf = new PDF();
            $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $pdf->SetFont('DejaVu','',14);
            $pdf->imprimerRecapCommande($id,$type);
            ob_end_clean();
            $pdf->Output();
            break;
        case 'VET':
            $pdf = new PDF();
            $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $pdf->SetFont('DejaVu','',14);
            $pdf->imprimerRecapCommande($id,$type);
            ob_end_clean();
            $pdf->Output();
            break;
    }
	
?>