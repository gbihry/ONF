<?php
    include "$racine/vue/vueEntete.php";
	require("$racine/modele/PDF.php");
    $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'];
    $allIdSub = ModeleObjetDAO::allSubordonneId($id);
    $type = $_GET["id"];
    $idSub = $_GET["ref"];
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
        case 'VETSUB':
            $pdf = new PDF();
            $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $pdf->SetFont('DejaVu','',14);
            $pdf->imprimerRecapCommande($idSub,"VET");
            ob_end_clean();
            $pdf->Output();
            break;
        case 'EPISUB':
            $pdf = new PDF();
            $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $pdf->SetFont('DejaVu','',14);
            $pdf->imprimerRecapCommande($idSub,"EPI");
            ob_end_clean();
            $pdf->Output();
            break;
        case 'AllVet' :
            $pdf = new PDF();
            $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $pdf->SetFont('DejaVu','',14);
            foreach($allIdSub as $unIdSub){
                $pdf->imprimerRecapCommande($unIdSub['id'],"VET");
            }
            ob_end_clean();
            $pdf->Output();
            break;
        case 'AllEpi':
            $pdf = new PDF();
            $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $pdf->SetFont('DejaVu','',14);
            foreach($allIdSub as $unIdSub){
                $pdf->imprimerRecapCommande($unIdSub['id'],"EPI");
            }
            ob_end_clean();
            $pdf->Output();
            break;
    }
	
?>