
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
        if (!$item)
        {
            ?>
            <tr>
            <td colspan="4" style="text-align: center;">Aucun resultat</td>

            </tr>
          
            <?php

        }
        else
        {
       foreach($item  as $f)
              {
        ?>
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
                <label class="label">Nom :&nbsp;&nbsp;&nbsp;  <?php echo $f['nomfact']?></label><br><br>
                <label class="label">Prenoms :&nbsp;&nbsp;&nbsp;<?php echo $f['prenomfact'] ?></label><br><br>
                <label class="label">Matricule :&nbsp;&nbsp;&nbsp;  <?php echo $f['imfact'] ?></label><br> <br>
                <label class="label">Mois :&nbsp;&nbsp;&nbsp; <?php echo $moinsnom[$f['moisfact'] ]?></label><br><br>
                <label class="label">Annee :&nbsp;&nbsp;&nbsp; <?php echo $f['anneefact'] ?></label><br><br>
                <label class="label">Montant :&nbsp;&nbsp;&nbsp; <?php echo $f['tarifMontantfact']." AR";?></label><br><br>
                <form action="deb.php?controller=pdfpost&action=generationpersonnepdf" method="POST">
                                          <input type="hidden" name="num" value="<?php echo $f['imfact']?>">
                                          <input type="hidden" name="nom" value=" <?php echo $f['nomfact']?>">
                                          <input type="hidden" name="prenom" value="<?php echo $f['prenomfact'] ?>">
                                          <input type="hidden" name="mois" value="<?php echo $moinsnom[$f['moisfact'] ]?>">
                                          <input type="hidden" name="annee" value="<?php echo $f['anneefact'] ?>">
                                          <input type="hidden" name="montant" value="<?php echo $f['tarifMontantfact']?>">
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




