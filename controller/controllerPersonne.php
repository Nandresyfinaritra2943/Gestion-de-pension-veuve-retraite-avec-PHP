<?php
    require 'Model/personneModel.php';

    class personneController{

        private $persModel;

        function __construct(){
            $this->persModel = new personneModel();
        }

        function afficher(){
            $item = $this->persModel->getAllPersonne();
            $item2= $this->persModel->comptepersonne();
            $mort = $this->persModel->mort();
            $vivant = $this->persModel->vivant();
            require 'views/personne/index.php';
           
        }
        

        function ajouter(){
            $item = $this->persModel->ajoutPersonne();
        }
        function getvaluepersonController(){
            $item = $this->persModel->getvaluepersonnmodel();
            require 'views/personne/update.php';


        }

        function modifierpersonneController($data, $Matricule){
            $item = $this->persModel->ModifierPersonneModel($data,$Matricule);
        }
        function supprimercontroller($im){
            $item = $this->persModel->supprimer($im);
        }
        function recherche($select,$chercher){
            $item = $this->persModel->recherche($select,$chercher);
            $item2= $this->persModel->comptepersonne();
            $mort = $this->persModel->mort();
            $vivant = $this->persModel->vivant();
            require "views/personne/index.php";

        }
    }
    /*-------------------------Fin de la Classe Personne-----------------------------------------------------*/ 
    class TarifController
    {
        private $tarif;
        function __construct()
        {
            $this->tarif = new TarifModel();
        }

        function getAllTarifController()
        {
            $item = $this->tarif->getAllTarif();
           require 'views/Tarif/indextarif.php';
        }

        function gettarifControl($numget)
        {
            $item = $this->tarif->getvalueTarif($numget);
            require 'views/Tarif/updateTarif.php';
        }

        function modifierTarifController($data,$num)
        {
          $item = $this->tarif->ModifierTarifModel($data,$num);
        }
        function AjouterTarifController($data)
        {
            $item = $this->tarif->AjouterTarifModel($data);
        }
        function SupprimerTarifControl()
        {
            $item = $this->tarif->deleteTarifModel();
        }
        function recherche($select,$chercher){
            $item = $this->tarif->recherche($select,$chercher);
            require "views/Tarif/indextarif.php";

        }
       
    }
    /*-------------------------Fin de la Classe Tarif-----------------------------------------------------*/ 
    class payerControl{
       private $payer;
        function __construct(){
            $this->payer = new paiement();
        }
        function SelectpayerControl(){
            $item =  $this->payer->getAllpaiementModel();
            require "views/Payer/IndexPayer.php";
        }
        function getimpayerControl($im,$numtarifpayer,$datepayer)
        {
            $item = $this->payer->getimModel($im,$numtarifpayer,$datepayer);
            require "views/Payer/Update.php";

        }
        function ajouterpayerControl($data){
            $item = $this->payer->ajouterpayerModel($data);
        }
        function  modifierpayerControl($data,$numtarif2,$numtarif1)
        {
            $item = $this->payer->modifierpayerModel($data,$numtarif2,$numtarif1);
        }
        function supprimerpayerControl($impayer,$numtarifpayer,$datepayer)
        {
            $item = $this->payer->supprimerpayerModel($impayer,$numtarifpayer,$datepayer);
        }
        function recherche($select,$chercher){
            $item = $this->payer->recherche($select,$chercher);
            require_once "views/Payer/IndexPayer.php";
        }
        function recherchedateControl($dateA,$dateB)
        {
            $item = $this->payer->recherchepardateModel($dateA,$dateB);
            require_once "views/Payer/IndexPayer.php";
        }
    }
    /*-------------------------Fin de la Classe Paiement-----------------------------------------------------*/ 
    class conjoinControl{
        private $conjoint;
        function __construct()
        {
            $this->conjoint = new conjoinModel();
        }
        function afficherconjoinControl()
        {
            $item = $this->conjoint->afficherconjoinModel();
            require "views/Conjoin/afficherconjoin.php";
        }
    }
    /*-------------------------Fin de la Classe Conjoin-----------------------------------------------------*/ 
    class factureController
    {
        private $facture;
        function __construct()
        {
            $this->facture = new factureModel();
        }
        function afficherFactureController()
        {
           $item = $this->facture->afficherpersonnefacture();
           $conjoin = $this->facture->afficherfactureconjoin();
           require "views/Facture/factureafficherpersonne.php";
        }
        function factureControl($imfact)
        {
            $item = $this->facture->facturegetmodel($imfact);
            require "views/Facture/chaquefacture.php";
        }
        function factureconjoincontrol($nomconjoin1)
        {
            $conjoinfact = $this->facture->factureconjoinModel($nomconjoin1);
            require "views/Facture/factureconjoin.php";
        }
    }
    /*-------------------------Fin de la Classe Facture-----------------------------------------------------*/ 
    class pdfgetvalueControl
    {
          function requirepdf($data)
          {
            require "Model/Generationpdf.php";
          }
          function generationpersonnepdf($data)
          {
            require "Model/Generationpersonne.php";
          }
         
    }
/*-------------------------Fin de Generation pdf-----------------------------------------------------*/ 
?>