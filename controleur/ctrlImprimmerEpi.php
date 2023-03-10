<?php

//récupérer les données à imprimer 


//générer le pdf
	require("$racine/modele/PDF.php");
	
    //Par exemple commande 60
	
	$pdf = new PDF();
	$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
	$pdf->SetFont('DejaVu','',14);
	$pdf->imprimerEpi();
	ob_end_clean();
	$pdf->Output();
	
?>