<?php

    require 'controller/controllerPersonne.php';

    $controller = isset($_GET['controller'])? $_GET['controller'] : 'home';

    $action = isset($_GET['action']) ? $_GET['action'] : 'index';

    $Matricule = isset($_GET['id'])? $_GET['id'] : 'none';
    
    $numget = isset($_GET["num"])? $_GET["num"]: "vide";
    
    $numsup = isset($_GET['numsup'])? $_GET['numsup']: "NULL";

    $im = isset($_GET['a'])? $_GET['a']: "NULL";

    $numtarif2 = isset($_GET['s'])? $_GET['s']: "NULL";

    $numtarif1=isset($_GET['g'])? $_GET['g']: "NULL";

    $im1= isset($_GET['d']) ? $_GET['d']:"null";

    $num1 = isset($_GET['e']) ? $_GET['e']:"null";

    $date = isset($_GET['f']) ? $_GET['f']:"null";

    $numtarifpayer = isset($_GET['numtarif']) ? $_GET['numtarif']:"null";

    $datepayer= isset($_GET['date']) ? $_GET['date']:"null";

    $imfact= isset($_GET['fact']) ? $_GET['fact']:"fact";

    $nomconjoin1 = isset($_GET['nomconjoin'])? $_GET['nomconjoin']:"nom";

    if($controller == "personne")
    {
        $personneController = new personneController();

        if (method_exists($personneController, $action)) 
        {
            if($action == "ajouter")
            {
                $personneController->$action($_POST);
            }
            elseif ($action == "modifierpersonneController")
            {
                $personneController->$action($_POST, $Matricule);
            }
            elseif($action == "supprimercontroller")
            {
                $personneController->$action($im);
            }
            elseif($action =='getvaluepersonController')
            {
                $personneController->$action();
            }
            elseif($action=='afficher'){
                $personneController->$action();
            }
            elseif($action=='recherche')
                {
                    $personneController->$action(isset($select),isset($chercher));
                }
        }else{
            echo"action introuvable";
        }
    
    }
    /*-------------------------Fin du Controller Personne-----------------------------------------------------*/ 
    elseif ($controller=="tarif")
    {
        $tarifController = new tarifController();
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if($action=='AjouterTarifController')
                {
                    $tarifController->$action($_POST);
                }
                elseif($action=='recherche')
                {
                    $tarifController->$action(isset($select),isset($chercher));
                }
                
                elseif($action=="SupprimerTarifControl")
                {
                    $tarifController->$action();
                }
                elseif($action=="modifierTarifController")
                {
                    $tarifController->$action($_POST,$numtarif5);
                }
            }
                if( $action =="gettarifControl")
                {
                $tarifController->gettarifControl($numget);
                }

            
                if($action=='getAllTarifController')
                {
                    $tarifController->$action();
                } 

                
                
                else
                {
                echo "action introuvable";
                }
    }
            
/*-------------------------Fin du Controller Tarif-----------------------------------------------------*/ 
    
    elseif($controller=="payer")
    {
        $payerController = new payerControl();
        if(method_exists($payerController,$action))
        {
            if ($_SERVER['REQUEST_METHOD']=="POST")
            {
               if ($action=='ajouterpayerControl')
               {
                $payerController->ajouterpayerControl($_POST);
               }
               elseif($action=='modifierpayerControl')
               {
                $payerController->modifierpayerControl($_POST,$numtarif2,$numtarif1);
               }
                elseif($action=='recherche')
                {
                $payerController->$action(isset($select),isset($chercher));
                }
                elseif($action=="supprimerpayerControl")
                {
                $payerController->supprimerpayerControl($impayer,$numtarifpayer,$datepayer);
                }
                elseif ($action=='recherchedateControl')
                {
                    $payerController->recherchedateControl(isset($dateA),isset($dateB));
                }
               
            }
            elseif($action=='SelectpayerControl')
            {
            $payerController->SelectpayerControl();
            }
            elseif($action=="getimpayerControl")
            {
            $payerController->getimpayerControl($im,$numtarifpayer,$datepayer);
            }
           
            
        }

    }
    /*-------------------------Fin du Controller Paiement-----------------------------------------------------*/ 
    elseif($controller == "conjoin")
    {
        $conjoin =  new conjoinControl();
    if (method_exists($conjoin,$action))
    {
        if ($action =='afficherconjoinControl')
        {
           $conjoin->afficherconjoinControl();
        }
    }
       
    }
    elseif($controller=="facture")
    {
        $facture = new factureController();
      if (method_exists($facture,$action))
      {
        if ($action == "factureControl")
        {
            $facture->$action($imfact);
        }
        elseif ($action== 'factureconjoincontrol')
        {
            $facture->$action($nomconjoin1);
        }
        
      }
    }
    /*-------------------------Fin du Controller Facture-----------------------------------------------------*/ 
    elseif($controller=="pdfpost")
    {
        $pdf = new pdfgetvalueControl();
        if ($action=='requirepdf')
        {
           $pdf->requirepdf($_POST);
        }
        elseif($action=='generationpersonnepdf')
        {
            $pdf->generationpersonnepdf($_POST);
        }
        
    }
    else{
        echo "controller introuvable";
    }
/*-------------------------Fin du Controller PDF-----------------------------------------------------*/ 
?>