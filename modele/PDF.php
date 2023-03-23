<?php
    include_once "$racine/vue/vueEntete.php";
    include_once "$racine/modele/ModeleObjetDAO.php";
    require("$racine/tfpdf/tfpdf.php");
    class PDF extends TFPDF{
        function imprimerVet(){
            $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
            if(ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Gestionnaire de commande'){
                $agence = ModeleObjetDAO::getIdAgence($id)['Agence'];
            }
            else{
                $agence = null;
            }
            $laCommande = ModeleObjetDAO::getRecapCommandeVet($agence);
            $this->AliasNbPages();
            $this->AddPage();
            
            $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $this->SetFont('DejaVu','',14);
            $this->SetXY(90,15);
            $this->Cell(40,10,'Récapitulatif commande VET');
            
            $this->Image("./images/onf.png",10,6,50);
            $this->SetXY(10,50);
            
            $this->FancyTable($laCommande);
            
        }

        function imprimerRecapCommande($id,$type){
            $login = ModeleObjetDAO::getLoginById($id)['login'];
            
            if($type == "VET"){
                $laCommande = ModeleObjetDAO::getRecapCommandeVetUtilisateur($id); 
                $date = ModeleObjetDAO::getDateCommandeFiniVet($id);
                
            }
            else{
                $laCommande = ModeleObjetDAO::getRecapCommandeEpiUtilisateur($id); 
                $date = ModeleObjetDAO::getDateCommandeFiniEpi($id);
                
            }
            
            $this->AliasNbPages();
            $this->AddPage();
            
            $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $this->SetFont('DejaVu','',14);
            $this->SetXY(80,15);
            $this->Cell(40,10,'Récapitulatif commande');
            $this->SetXY(10, 35);
            $this->Cell(40,10, 'Date de commande fini : ' . $date);

            $this->SetXY(10, 45);
            $this->Cell(40,10, 'Nom d\'utilisateur : ' . $login);
            
            $this->Image("./images/onf.png",10,6,50);
            $this->SetXY(10,60);
            
            $this->FancyTable2($laCommande);
            
        }

        function imprimerEpi(){
            $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
            if(ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Gestionnaire de commande'){
                $agence = ModeleObjetDAO::getIdAgence($id)['Agence'];
            }
            else{
                $agence = null;
            }
            $laCommande = ModeleObjetDAO::getRecapCommandeEpi($agence);
            $this->AliasNbPages();
            $this->AddPage();
            
            $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $this->SetFont('DejaVu','',14);
            $this->SetXY(90,15);
            $this->Cell(40,10,'Récapitulatif commande EPI');
            
            $this->Image("./images/onf.png",10,6,50);
            $this->SetXY(10,50);
            
            $this->FancyTable($laCommande);
            
        }
        function FancyTable($data){
            $titre = array('Produit', 'Quantité', 'Lieu de Livraison','Taille');

            // Colors, line width and bold font
            $this->SetFillColor(40,167,69);
            $this->SetTextColor(255);
            $this->SetDrawColor(0,0,0);
            $this->SetLineWidth(.3);
            // Header
            $w = array(100, 20, 40,30);
            for($i=0;$i<count($titre);$i++)
                $this->Cell($w[$i],7,$titre[$i],1,0,'C',true);
                
            $this->Ln();
            $this->SetX(10);
            // Color and font restoration
            $this->SetFillColor(224,235,255);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Data
            $fill = false;
            $y = $this->GetY();
            $x = $this->GetX();
            foreach($data as $row)
            {
                $this->MultiCell($w[0],10,$row[0],'LRB','C',$fill);
                $this->SetXY($x + $w[0],$y);
                $this->Cell($w[1],20,$row[1],'LRB',0,'C',$fill);
                $this->Cell($w[2],20,$row[2],'LRB',0,'C',$fill);
                $this->Cell($w[3],20,$row[3],'LRB',0,'C',$fill);
                $this->Ln();
                $y = $this->GetY();
                $x = $this->GetX();
                $this->SetXY($x,$y);
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
            $w = array(125, 20, 30,20);
            for($i=0;$i<count($titre);$i++)
                $this->Cell($w[$i],7,$titre[$i],1,0,'C',true);
                
            $this->Ln();
            $this->SetX(10);
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
                $this->SetX(10);
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