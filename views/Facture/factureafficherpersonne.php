<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/bootstrapVrai.min.css">
</head>
<body>
    <div class="conten">
        <div class="left_content" id="open">
            <h2>Pension <button class="btn btn-default" onclick="closeLeftContent()" style="margin-left: 20PX;"><img src="cancel_32px.png"></button></h2>
            <div class="divider"></div>
            <div class="navigation">
                <ul>
                    <li><a href="deb.php?controller=tarif&action=getAllTarifController" class="btn btn-primary ">Tarif</a></li>
                    <li><a href="deb.php?controller=personne&action=afficher" class="btn btn-primary ">Personne</a></li>
                    <li><a href="dash4.php" class="btn btn-primary ">Conjoint</a></li>
                    <li><a href="deb.php?controller=payer&action=SelectpayerControl" class="btn btn-primary ">Paiement</a></li>
                    <li><a href="dash6.php" class="btn btn-primary ">Facture</a></li>
                    <li><a href="views/Payer/histo.php" class="btn btn-primary ">Histogramme</a></li>
                </ul>
            </div>
        </div>
        <div class="right-content">
            <header>
                <div class="tete">
                    <div class="titre">
                        
                        <h3><button class="btn btn-default" onclick="openLeftContent()"><img src="menu_30px.png" ></button> Facturation </h3>
                    </div>
                   
                </div>
            </header>
            <h1 style="margin-left: 10%;font-family:Verdana, Geneva, Tahoma, sans-serif">Facturation par personne</h1>
            <div class="container admin">
                <div class="tableContent">
                    <div class="row">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Matricule</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($item as $item) 
                                    {
                                        ?>
                                            <tr>
                                                <?php if ($item['statut']==1)
                                                {
                                                    ?>
                                                <td><?= $item['nom']."(Vivant)" ?></td>
                                                <td><?= $item['im'] ?></td>
                                                    <?php
                                                }

                                                ?>
                                                 <?php if ($item['statut']==0)
                                                {
                                                    ?>
                                                <td><?= $item['nom']."(Mort)" ?></td>
                                                <td><?= $item['im'] ?></td>
                                                    <?php
                                                }
                                                
                                                ?>
                                               
                                                <td><a href="deb.php?controller=facture&action=factureControl&fact=<?php echo $item['im'] ?>" class="btn btn-success">Acceder au Facture</a></td>
                                            </tr>
                                        <?php
                                    }
                                    foreach ($conjoin as $item) 
                                    {
                                        ?>
                                            <tr>
                                                <td><?= $item['nomconjoin']?></td>
                                                <td><?= $item['numpension'] ?></td>
                                                <td><a href="deb.php?controller=facture&action=factureconjoincontrol&nomconjoin=<?= $item['numpension']?>" class="btn btn-success">Acceder au Facture</a></td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                                   
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function ajouter(){
            document.getElementById('add').style.display = "block";
            document.getElementById('add1').style.display = "block";
        }
        function Annuler(){
            document.getElementById('add').style.display = "none";
            document.getElementById('add1').style.display = "none";
        }
        window.onmousedown = function(){
            document.getElementById('open').classList.remove('change');
        }
        function openLeftContent(){
            document.getElementById('open').classList.add('change');
        }
        function closeLeftContent(){
            document.getElementById('open').classList.remove('change');
        }
        function Supprimerpayer(im,numtarif,date){
            document.getElementById("sup").style.display="block";
            document.getElementById("impayer").value=im;
            document.getElementById("numtarifpayer").value=numtarif;
            document.getElementById("datepayer").value=date;
            
        }
    </script>

</body>
</html>