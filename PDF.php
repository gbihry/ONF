<?php
    include_once "$racine/modele/ModeleObjetDAO.php";
    require("$racine/tfpdf/tfpdf.php");
    class PDF extends TFPDF{
        function imprimer(){
            $laCommande = ModeleObjetDAO::getRecapCommandeVet();

            $this->AddPage();
            
            $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $this->SetFont('DejaVu','',14);
            foreach($laCommande as $uneCommande){
                $this->Cell(40,10,$uneCommande['produit'] . "--" . $uneCommande['sum(quantite)']. "--" . $uneCommande['nom']);
                $this->Ln();
            }
            
        }

    }

?> 