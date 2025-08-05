<?php

    require 'config/database.php';

    class personneModel{
        private $conn;


        function __construct()
        {
            $this->conn = Database::connect();
        }


        function getAllPersonne(){
            $stmt = $this->conn->query('SELECT *  from personne order by statut DESC');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        function comptepersonne(){
            $stmt = $this->conn->query('SELECT count(*) as total from personne ');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        function mort(){
            $stmt = $this->conn->query("select count(*) as mort from personne where statut=0");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        function vivant(){
            $stmt = $this->conn->query("select count(*) as vivant from personne where statut=1");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }


        function ajoutPersonne()
        {

            $im=$_POST['im'];
            $nom=$_POST['nom'];
            $prenom = $_POST['prenom'];
            $datenais= $_POST['datenais'];
            $contact = $_POST['contact'];
            $statut=($_POST['statut']);
            $situation=$_POST['situation'];
            $nomconjoin= $_POST['nomConjoin'];
            $prenomconjoin=$_POST['prenomConjoin'];
            $numtarif=$_POST['numtarif'];
            $stmt = $this->conn->prepare('INSERT into personne values(?, ?, ?, ?, ?, ? ,? ,? ,?, ?)');
            $stmt->execute(array($im,$nom,$prenom,$datenais,$contact,$statut,$situation,$nomconjoin,$prenomconjoin,$numtarif));
            header("Location: deb.php?controller=personne&action=afficher");
            exit();

            
        }
        function getvaluepersonnmodel()
        {
            $stmt= $this->conn->prepare("SELECT * FROM personne where im=?");
            $stmt->execute(array($_GET["id"]));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }


        function ModifierPersonneModel($data, $Matricule)
{
            $nom=$data['nom2'];
            $prenom = $data['prenom2'];
            $datenais= $data['datenais2'];
            $contact = $data['contact2'];
            $statut=$data['statut2'];
            $situation=$data['situation2'];
            $nomconjoin= $data['nomConj2'];
            $prenomconjoin=$data['preConj2'];
            $numtarif=$data['numTarif2'];
            $stmt= $this->conn->prepare("UPDATE personne set nom=?,prenom=?,datenais=?,contact=?,statut=?,situation=?,nomconjoin=?,prenomconjoin=?,numtarif=? WHERE im=$Matricule");
            $stmt->execute(array($nom,$prenom,$datenais,$contact,$statut,$situation,$nomconjoin,$prenomconjoin,$numtarif));
if ($statut=="1")
    {
                $stf = $this->conn->prepare("SELECT nomconjoin FROM personne WHERE nomconjoin=?");
                $stf->execute(array($nomconjoin));
                $res=$stf->fetchAll(PDO::FETCH_ASSOC);
                foreach($res as $d)
                {
                   $delete = $this->conn->prepare("DELETE FROM conjoin where nomconjoin=?");
                   $delete->execute(array($d['nomconjoin']));
                }
                header("Location: deb.php?controller=personne&action=afficher");
                exit();
    }
elseif ($statut=="0")
    {
                //recuperation du montant
                $st= $this->conn->prepare("SELECT montant from Tarif where numtarif=?");
                $st->execute(array($numtarif));
                $montant2 =$st->fetchAll(PDO::FETCH_ASSOC);
                foreach($montant2 as $montant1)
        {

                    $montant =intval($montant1["montant"]);
                    for($i=0;$i<2000;$i++)
            {
                    $numpension =$this->conn->query("SELECT numpension from conjoin order by numpension DESC Limit 1");
                    foreach($numpension as $n)
                    {
                        if ("C".strval($i)==$n['numpension'])
                        {
                            $insert = $this->conn->prepare("INSERT INTO conjoin (numpension,nomconjoin,prenomconjoin,montant) VALUES(?,?,?,?)");
                
                            if($insert->execute(array("C".strval($i+1),$nomconjoin,$prenomconjoin,($montant*4)/10)));
                            {
                                header("Location: deb.php?controller=personne&action=afficher");
                                exit();
                            }

                        }
                    }
            }
                    
        }
    }
}
        

        function supprimer($data)
        {
            $im = $_POST['supprimerPersonne'];
            $stmt = $this->conn->prepare("DELETE FROM personne where im=?");
            $stmt->execute(array($im));
            header("Location:deb.php?controller=personne&action=afficher");
            exit();

        }
        function recherche($select,$chercher)
        {
            $select = $_POST['select2'];
            $chercher = $_POST['chercher2'];
            $stmt = $this->conn->prepare("SELECT * FROM personne WHERE $select like LOWER('%$chercher%')");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    
    }
    /*-------------------------Fin de la Classe Personne-----------------------------------------------------*/ 
    class TarifModel{
         private   $conn;
            function __construct()
            {
                $this->conn =  Database::connect();


            }

            function getAllTarif()
            {
                $stmt = $this->conn->query('SELECT * from tarif');
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            function getvalueTarif($numget)
            {
                $numget= $_GET['num'];
                $stmt = $this->conn->prepare("SELECT * FROM Tarif where numtarif=?");
                $stmt->execute(array($numget));
                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            }

            function ModifierTarifModel($data,$num)
            {   
                $num = $_POST['numtarif6'];
                $diplome=$_POST['diplome5'];
                $categorie=$_POST['Categorie5'];
                $montant=$_POST['montant5'];
                $stmt = $this->conn->prepare("UPDATE Tarif SET diplome=?,categorie=?,montant=? WHERE numtarif=$num");
                $stmt->execute(array($diplome,$categorie,$montant));
                header("Location: deb.php?controller=tarif&action=getAllTarifController");
                exit();
            }
            function AjouterTarifModel($data)
            {
                $num = $_POST['numtarif3'];
                $diplome=$_POST['diplome3'];
                $categorie=$_POST['categorie7'];
                $montant=$_POST['Montant3'];
                $stmt = $this->conn->prepare("INSERT INTO Tarif VALUES(?,?,?,?)");
                $stmt->execute(array($num,$diplome,$categorie,$montant));
                header("Location: deb.php?controller=tarif&action=getAllTarifController");
                exit();
            }
            function deleteTarifModel(){
                $numsp = $_POST['supprimerTarif'];
                $stmt = $this->conn->prepare("DELETE FROM Tarif WHERE numtarif=?");
                $stmt->execute(array($numsp));
                header("Location:deb.php?controller=tarif&action=getAllTarifController");
                exit();

            }
            function recherche($select,$chercher)
            {
                $select = $_POST['selecttarif'];
                $chercher = $_POST['cherchertarif'];
                $stmt = $this->conn->prepare("SELECT * FROM Tarif WHERE $select like LOWER('$chercher%')");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
    }
    /*--------------------------Fin de la classe Tarif-------------------------------------------------------------*/ 
    class paiement
    {
        private $conn;
        function __construct()
        {
            $this->conn = Database::connect();
        }
        function getAllpaiementModel(){
            $stmt = $this->conn->prepare("SELECT * FROM paiement");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        function getimModel($im,$numtarifpayer,$datepayer){
            $stmt = $this->conn->prepare("SELECT im,numtarif,date  FROM paiement where im=? AND numtarif=? AND date=?");
            $stmt->execute(array($im,$numtarifpayer,$datepayer));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

            
        }
        function ajouterpayerModel($data)
        {
           $im= $_POST['matricule6'];
           $numtarif=$_POST['numtarif6'];
           $date = $_POST['date6'];
           $date1= $this->conn->prepare("SELECT YEAR(date) as y , MONTH(date) as m from paiement where im=? AND numtarif=?");
           $date1->execute(array($im,$numtarif));
           $item=$date1->fetchAll(PDO::FETCH_ASSOC);
           foreach($item as $X)
           {
            $year = $X['y'];
            $month = $X['m'];
           }
           $yeardate=date_create($date);
          if ($year == date_format($yeardate,'Y' ) AND $month == date_format($yeardate,'m') )
          {
            ?>

            <span style="margin-left: 30%;font-weight:500;font-size:160%;color:cornflowerblue;margin-top:50%">
            Mois deja prise
           </span> 
           <?php
           }
           else
           {

            $res = $this->conn->prepare("SELECT T.numtarif as num FROM Tarif T JOIN personne P ON T.numtarif=P.numtarif WHERE P.im=? ");
            $res->execute(array($im));
            $val=0;
            $req=$res->fetchAll(PDO::FETCH_ASSOC);
            foreach($req as $y)
            {
             $val = $y['num'];
            }
            $conjoin = $this->conn->prepare("SELECT C.numpension as numpty FROM Conjoin C JOIN Personne P ON C.nomconjoin=P.nomconjoin JOIN Tarif T ON T.numtarif=P.numtarif WHERE C.numpension=? ");
            $conjoin->execute(array($im));
            $valeur = $conjoin->fetchAll(PDO::FETCH_ASSOC);
            $conjointER=0;
            foreach($valeur as $v)
            {
                $conjointER = $v['numpty'];
            }
            if ($im==$conjointER)
            {
                $verifier = $this->conn->prepare('SELECT T.numtarif as k from Tarif T
                 JOIN Personne P 
                 ON P.numtarif=T.numtarif 
                 JOIN Conjoin C 
                 ON C.nomconjoin=P.nomconjoin 
                 WHERE C.numpension=?');
                $verifier->execute(array($im));
                $resconj = $verifier->fetchAll(PDO::FETCH_ASSOC);
                $valconj=0;
                foreach ($resconj as $g)
                {
                 $valconj = $g['k'];
                }
                if ($numtarif== $valconj)
                {
                    $stmt = $this->conn->prepare("INSERT INTO paiement VALUES(?,?,?)");
                    $stmt->execute(array($im,$numtarif,$date));
                    header("Location: deb.php?controller=payer&action=SelectpayerControl");
                    exit();
                }
                else{
                    ?> 
                    <span style="margin-left: 30%;font-weight:500;font-size:160%;color:cornflowerblue;margin-top:50%">
                      Numero tarif Invalid ,votre numero Tarif est <?php  echo $valconj?>
                </span>   
                    <?php

                }

            }

 
            elseif($numtarif==$val)
            {
             $stmt = $this->conn->prepare("INSERT INTO paiement VALUES(?,?,?)");
             $stmt->execute(array($im,$numtarif,$date));
             header("Location: deb.php?controller=payer&action=SelectpayerControl");
             exit();
            }
            else
            {
                ?> 
                    <span style="margin-left: 30%;font-weight:500;font-size:160%;color:cornflowerblue;margin-top:50%">
                      Numero tarif Invalid ,votre numero Tarif est <?php  echo $val?>
                </span>   
                    <?php
             
            }

            }


         
        
           
        }
    
        function modifierpayerModel($data,$numtarif2,$numtarif1)
        {
            $numtarif1=$_POST['numtarif5'];
            $numtarif2=$_POST['matricule5'];
            $date = $_POST['date5'];
            $stmt = $this->conn->prepare("UPDATE paiement SET date=? where im=? AND numtarif=?");
            $stmt->execute(array($date,$numtarif2,$numtarif1));
            header("Location: deb.php?controller=payer&action=SelectpayerControl");
            exit();
          
        }
        function supprimerpayerModel($impayer,$numtarifpayer,$datepayer)
        {
            $impayer = $_POST['impayer'];
            $numtarifpayer = $_POST['numtarifpayer'];
            $datepayer = $_POST['datepayer'];
            $stmt = $this->conn->prepare("DELETE FROM paiement where im=? AND numtarif=? AND date=?");
            $stmt->execute(array($impayer,$numtarifpayer,$datepayer));
            header("Location: deb.php?controller=payer&action=SelectpayerControl");
            exit();
        }
        function recherche($select,$chercher)
        {
            $select = $_POST['select'];
            $chercher = $_POST['chercher'];
            $stmt = $this->conn->prepare("SELECT * FROM paiement WHERE $select like LOWER('%$chercher%')");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        function recherchepardateModel($dateA,$dateB)
        {
            $dateA = $_POST['date1'];
            $dateB = $_POST['date2'];
            $stmt = $this->conn->prepare("SELECT * FROM paiement WHERE date BETWEEN ? AND ?");
            $stmt->execute(array($dateA,$dateB));
            return  $stmt->fetchAll(PDO::FETCH_ASSOC);
        }



    
    }
 /* -----------------------------Fin de la classe Conjoin-------------------------------------------------------- */
    class conjoinModel
    {
        private $conn;
        function __construct()
        {
            $this->conn = Database::connect();
        }
        function afficherconjoinModel()
        {
            $liste =$this->conn->prepare("SELECT * FROM conjoin");
            $liste->execute();
            return $liste->fetchAll(PDO::FETCH_ASSOC);
        }

    }
    class factureModel
    {
        private $conn;
        function __construct()
        {
            $this->conn = Database::connect();
        }
        function afficherpersonnefacture()
        {
            $res = $this->conn->prepare("SELECT nom ,im,statut from personne where im in (select im from paiement) ");
            $res->execute();
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }
        function facturegetmodel($imfact)
        {   
            $res = $this->conn->prepare(" SELECT paiement.im as imfact,
                                personne.nom as nomfact ,
                                personne.prenom as prenomfact,
                                Month(paiement.date) as moisfact,
                                YEAR(paiement.date) as anneefact,
                                Tarif.montant as tarifMontantfact 
                                FROM personne 
                                JOIN paiement ON 
                                paiement.im=personne.im JOIN
                                tarif ON personne.numtarif=tarif.numtarif 
                                WHERE personne.im=? ");
            $res->execute(array($imfact));
            return $res->fetchAll(PDO::FETCH_ASSOC);
            

        }
        function afficherfactureconjoin()
        {
            $res = $this->conn->prepare("SELECT nomconjoin,numpension FROM conjoin");
            $res->execute();
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }
        function factureconjoinModel($nomconjoin1)
        {
            $res = $this->conn->prepare(" SELECT conjoin.numpension as num,
            conjoin.nomconjoin as nomconjoin,conjoin.prenomconjoin as prenomconjoin,
            month(paiement.date) as datemois ,year(paiement.date) as dateannee,
            conjoin.montant as montant FROM conjoin
            JOIN paiement ON conjoin.numpension=paiement.im WHERE paiement.im=?");
            $res->execute(array($nomconjoin1));
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }
        
       
    }
    

    
    

    


?>