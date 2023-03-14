<?php
    include_once "$racine/modele/ModeleObjetDAO.php";
    require("$racine/tfpdf/tfpdf.php");
    class PDF extends TFPDF{
        function imprimerVet(){
            $laCommande = ModeleObjetDAO::getRecapCommandeVet();
            $this->AliasNbPages();
            $this->AddPage();
            
            $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $this->SetFont('DejaVu','',14);
            $this->SetXY(90,15);
            $this->Cell(40,10,'Récapitulatif commande VET');
            
            $this->Image("./images/onf.png",10,6,50);
            $this->SetXY(20,50);
            
            $this->FancyTable($laCommande);
            
        }

        function imprimerRecapCommande($id,$type){
            if($type == "VET"){
                $laCommande = ModeleObjetDAO::getRecapCommandeVetUtilisateur($id); 
            }
            else{
                $laCommande = ModeleObjetDAO::getRecapCommandeEpiUtilisateur($id); 
            }
            
            $this->AliasNbPages();
            $this->AddPage();
            
            $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $this->SetFont('DejaVu','',14);
            $this->SetXY(90,15);
            $this->Cell(40,10,'Récapitulatif commande');
            
            $this->Image("./images/onf.png",10,6,50);
            $this->SetXY(20,50);
            
            $this->FancyTable2($laCommande);
            
        }

        function imprimerEpi(){
            $laCommande = ModeleObjetDAO::getRecapCommandeEpi();
            $this->AliasNbPages();
            $this->AddPage();
            
            $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $this->SetFont('DejaVu','',14);
            $this->SetXY(90,15);
            $this->Cell(40,10,'Récapitulatif commande EPI');
            
            $this->Image("./images/onf.png",10,6,50);
            $this->SetXY(20,50);
            
            $this->FancyTable($laCommande);
            
        }
        function FancyTable($data){
            $titre = array('Produit', 'Quantité', 'Lieu de Livraison');

            // Colors, line width and bold font
            $this->SetFillColor(40,167,69);
            $this->SetTextColor(255);
            $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
            // Header
            $w = array(70, 40, 60);
            for($i=0;$i<count($titre);$i++)
                $this->Cell($w[$i],7,$titre[$i],1,0,'C',true);
                
            $this->Ln();
            $this->SetX(20);
            // Color and font restoration
            $this->SetFillColor(224,235,255);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Data
            $fill = false;
            foreach($data as $row)
            {
                $this->Cell($w[0],10,$row[0],'LR',0,'C',$fill);
                $this->Cell($w[1],10,$row[1],'LR',0,'C',$fill);
                $this->Cell($w[2],10,$row[2],'LR',0,'C',$fill);
                $this->Ln();
                $this->SetX(20);
                $fill = !$fill;
            }
            // Closing line
            $this->Cell(array_sum($w),0,'','T');
            
            
        }

        function FancyTable2($data){
            $titre = array('Produit', 'Quantité', 'Taille','Total');

            // Colors, line width and bold font
            $this->SetFillColor(40,167,69);
            $this->SetTextColor(255);
            $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
            // Header
            $w = array(100, 20, 30,20);
            for($i=0;$i<count($titre);$i++)
                $this->Cell($w[$i],7,$titre[$i],1,0,'C',true);
                
            $this->Ln();
            $this->SetX(20);
            // Color and font restoration
            $this->SetFillColor(224,235,255);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Data
            $fill = false;
            foreach($data as $row)
            {
                $this->Cell($w[0],10,$row[0],'LR',0,'C',$fill);
                $this->Cell($w[1],10,$row[1],'LR',0,'C',$fill);
                $this->Cell($w[2],10,$row[2],'LR',0,'C',$fill);
                $this->Cell($w[3],10,$row[3],'LR',0,'C',$fill);
                $this->Ln();
                $this->SetX(20);
                $fill = !$fill;
            }
            // Closing line
            $this->Cell(array_sum($w),0,'','T');
            
            
        }

        // Pied de page
        function Footer()
        {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Numéro de page

            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        
        } 
    }

?> 