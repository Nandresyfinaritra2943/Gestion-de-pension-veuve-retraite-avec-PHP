<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrapVrai.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Pension</title>
    <style>
        #add{
            display: none;
            transform: translate(-50%,-50%);
            position: fixed;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5); /* Black w/ opacity */
        }
        #add1{
            padding: 14px;
            background-color: #1a2e35;
            color: #ccc;
            display: none;
            position: fixed;
            top: 15%;
            left: 7%;
            border-radius: 15px;
        }

        #add1 h1{
            text-align: center;
        }
        #sup{
            display:none;
            position:absolute;
            left:300px;top:200px;
            height:200px;
            width:500px;
            background-color:black;
            border-radius: 5px;
            
        }
        #ab{
            font-size: 20px;
            position: absolute;
            left: 100px;
            top:150px;
            background-color:orange;
            width: 100px;
            height: 40px;
            color: white;
            text-align: center;
            border-radius: 5px;
        }
        #supannul{
            font-size: 20px;
            position: absolute;
            left: 300px;
            top:150px;
            background-color:orange;
            width: 100px;
            height: 40px;
            color: white;
            text-align: center;
            border-radius: 5px;

        }
        #soratra{
            font-size: 20px;
            position: absolute;
            left: 140px;
            top:80px;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="left_content" id="open">
            <h2>Pension <button class="btn btn-default" onclick="closeLeftContent()" style="margin-left: 10PX;"><img src="cancel_32px.png"></button></h2>
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
        <div class="right_content">
            <header>
                <div class="tete">
                    <div class="titre">
                        
                        <h3><button class="btn btn-default" onclick="openLeftContent()"><img src="menu_30px.png" ></button> Table Paiement <a href="#" class="btn btn-success" onclick="ajouter()"><span class="glyphicon glyphicon-plus"> </span> AJouter</a><a href="deb.php?controller=payer&action=SelectpayerControl" style="margin-left: 20px;">Actualiser</a></h3>
                    </div>
                    <form action="deb.php?controller=payer&action=recherche" method="POST">
                        <div class="search">
                            <select name="select" >
                                <option>im</option>
                                <option>numtarif</option>
                                <option>date</option>
                            </select>
                            <input type="text" class="form-control2" name="chercher">
                            <button class="btn btn-primary">Chercher</button>
                        </div>
                    </form>
                </div>
            </header>
            <form style="margin-left: 50%;margin-top:2%" action="deb.php?controller=payer&action=recherchedateControl" method="post">
                <input type="date" name="date1" class="form-control2">
                <input type="date" name="date2" class="form-control2">
                <button type="submit" class="btn btn-primary">Recherche</button>
            </form>

            <div class="container admin">
                <div class="tableContent">
                    <div class="row">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Numero Tarif</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    foreach ($item as $item) 
                                    {
                                       
                                       
                                        ?>
                                            <tr>
                                                <td><?= $item['im'] ?></td>
                                                <td><?= $item['numtarif'] ?></td>
                                                <td><?= $item['date'] ?></td>
                                                <td>
                                                    <a class="btn btn-primary" href="deb.php?&controller=payer&action=getimpayerControl&a=<?php echo $item['im']?>&numtarif=<?= $item['numtarif'] ?>&date=<?= $item['date'] ?>"><img src="edit_26px.png"></a>
                                                    <a class="btn btn-danger" onclick="Supprimerpayer('<?php echo $item['im'] ?>','<?php echo $item['numtarif'] ?>','<?php echo $item['date']  ?>')" ><img src="trash_26px.png"></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                }
                                    
                                ?>
                            </tbody>
                        </table>
                                   
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="add"></div>
    <div id="add1">
        <form action="deb.php?controller=payer&action=ajouterpayerControl" method="POST">
            <div class="container">
                <div class="row">
                    <h1>Ajouter nouveau Paiement</h1>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="im">Matricule</label>
                            <select name="matricule6" class="form-control">
                            <?php 
                                $conn = new PDO("mysql:host=localhost;dbname=base","root","");
                                $res= $conn->prepare("SELECT im from personne where statut=1");
                                $res->execute();
                                $fi = $res->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($fi as $f)
                                    {
                                        ?> 

                                            <option value="<?=  $f['im']?>"><?=  $f['im']?></option>
                                            
                                        <?php
                                    }
                                $res = $conn->prepare("SELECT numpension from conjoin ");
                                $res->execute();
                                $resconj = $res->fetchAll(PDO::FETCH_ASSOC);
                                foreach($resconj as $d)
                                {
                                    ?> 

                                        <option value="<?=  $d['numpension']?>"><?=  $d['numpension']?></option>
                                        
                                    <?php
                                }

                                
                               
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nom">Numero tarif</label>
                            <select type="text" name="numtarif6" class="form-control">
                            <?php 
                                $conn = new PDO("mysql:host=localhost;dbname=base","root","");
                                $res= $conn->prepare("SELECT numtarif  from  Tarif ");
                                $res->execute();
                                $fi = $res->fetchAll(PDO::FETCH_ASSOC);
                                foreach($fi as $f){
                                    ?> 
                                    <option value="<?php echo $f['numtarif']?>"><?php echo $f['numtarif']?></option>
                                    <?php
                                                   }
                            ?>
                            </select>
                        </div>                                                              
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="statut">Date de pension</label>
                            <input type="date" name="date6" class="form-control" max="<?=date("Y-m-d") ?>">
                            
                        </div>
                                                              
                    </div>
                    <div class="col-lg-12">
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Ajouter</button>
                            <a href="#" class="btn btn-primary" onclick="Annuler()">Annuler</a>
                        </div> 
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div  id="sup">
        <form action="deb.php?controller=payer&action=supprimerpayerControl" method="post">
            <span id="soratra">Voulez-vous bien supprimer?</span>
            <input type="text" name="impayer" id="impayer" hidden>
            <input type="text" name="numtarifpayer" id="numtarifpayer" hidden>
            <input type="text" name="datepayer" id="datepayer" hidden>
            <button type="submit" class="btn btn-success" id="ab">Oui </button>
        </form>
        <a id="supannul" class="btn btn-success" href="deb.php?controller=payer&action=SelectpayerControl">Non</a>
    </div>
    <script>
        function ajouter()
        {
            document.getElementById('add').style.display = "block";
            document.getElementById('add1').style.display = "block";
        }
        function Annuler()
        {
            document.getElementById('add').style.display = "none";
            document.getElementById('add1').style.display = "none";
        }
        window.onmousedown = function()
        {
            document.getElementById('open').classList.remove('change');
        }
        function openLeftContent()
        {
            document.getElementById('open').classList.add('change');
        }
        function closeLeftContent()
        {
            document.getElementById('open').classList.remove('change');
        }
        function Supprimerpayer(im,numtarif,date)
        {
            document.getElementById("sup").style.display="block";
            document.getElementById("impayer").value=im;
            document.getElementById("numtarifpayer").value=numtarif;
            document.getElementById("datepayer").value=date;
            
        }
    </script>
    
</body>
</html>
    