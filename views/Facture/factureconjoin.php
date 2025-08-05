



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #tsipika1{
        background-color: yellow;
        height: 30px;
        width: 200px;
        margin-top: 30px;
    }
    #entete{
        height: 500px;
        width: 600px;
        background-color:white;
        margin: 0 auto;
        margin-top: 30px;
    }
    #tsipika{
        display: flex;
    }
    div h1{
        font-weight: 600;
    }
    #tsipika3{
        background-color: yellow;
        height: 30px;
        width: 154px;
        margin-top: 30px;

    }
    body{
        background-color: rgba(0,0,0,0.2);
    }
    #entete{
        text-align: center;
       
    }
    #tsipika2{
        margin-top: 3px;
    }
    #fact{
        
        font-size: 20px;
    }
    #donnee {
        /*margin-right: 380px;*/
        text-align: left;
        padding: 20px;
        margin-left: 30px;
    }
    .label{
        margin-top: 70px;
        font-size: 20px;
    }

</style>
<body>
       <?php
        $moinsnom = [
              1=>"Janvier",2=>"Fevrier",3=>"Mars",4=>"Avril",5=>"Mai",6=>"Juin",7=>"Juillet",8=>"Aout",9=>"Septembre",10=>"Octobre",11=>"Novembre",12=>"Decembre"];
       ?>
       <header>
                <div class="tete">
                    <div class="titre">
                        
                        <h1 style="margin-left: 20%;"><a class="btn btn-default" href="dash6.php"><img src="backFACTURE.png" ></a> Facturation </h1>
                    </div>
                </div>
       </header>
       <?php 
        if (!$conjoinfact)
        {
            ?>
            <label style="margin-left: 30%;font-size:150%">Aucun facture pour le moment</label>
          
            <?php

        }
        else
        {
       foreach($conjoinfact  as $f)
              {?>
        <div id="entete">
       
             <div id="tsipika">
                <div id="tsipika1">

                </div>
                <div id="tsipika2">
                    <h1 >Reçu de Paiement</h1>

                </div>
                <div id="tsipika3">

                </div>
            </div>
            
            <div id="donnee">
             
                <label id="fact" >Facture a : </label>  <br><br><br>
                <label class="label">Nom :&nbsp;&nbsp;&nbsp; <?php echo $f['nomconjoin']?></label><br><br>
                <label class="label">Prenoms :&nbsp;&nbsp;&nbsp; <?php echo $f['prenomconjoin'] ?></label><br><br>
                <label class="label">Matricule :&nbsp;&nbsp;&nbsp;  <?php echo $f['num']?></label><br> <br>
                <label class="label">Mois :&nbsp;&nbsp;&nbsp; <?php echo $moinsnom[$f['datemois'] ]?></label><br><br>
                <label class="label">Annee :&nbsp;&nbsp;&nbsp; <?php echo $f['dateannee'] ?></label><br><br>
                <label class="label">Montant :&nbsp;&nbsp;&nbsp; <?php echo $f['montant']."  AR";?></label><br><br>
                <form action="deb.php?controller=pdfpost&action=requirepdf" method="POST">
                                          <input type="hidden" name="num" value="<?php echo $f['num']?>">
                                          <input type="hidden" name="nomconjoin" value=" <?php echo $f['nomconjoin']?>">
                                          <input type="hidden" name="prenomconjoin" value="<?php echo $f['prenomconjoin'] ?>">
                                          <input type="hidden" name="datemois" value="<?php echo $moinsnom[$f['datemois'] ]?>">
                                          <input type="hidden" name="dateannee" value="<?php echo $f['dateannee'] ?>">
                                          <input type="hidden" name="montant" value="<?php echo $f['montant']?>">
                                          <button type="submit" style="width: 150px;height: 55px;color: white;background-color: darkcyan;border-radius: 20px;margin-left:160px;">Imprimer</button>

                                   </form>
              
            </div>
        </div>
        <?php
              }
            }
              ?>
</body>
</html>



