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
        #a{
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
        select{
            color: black;
            width: 20%;
        }
        .search{
            display: flex;
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
                        
                        <h3><button class="btn btn-default" onclick="openLeftContent()"><img src="menu_30px.png"></button> Table Personne <a  class="btn btn-success" onclick="ajouter()"><span class="glyphicon glyphicon-plus"></span> AJouter</a> <a href="deb.php?controller=personne&action=afficher" style="margin-left: 20px;">Actualiser</a></h3>
                    </div>
                    <form action="deb.php?controller=personne&action=recherche" method="POST">
                        <div class="search">
                            <select name="select2" class="form-control">
                                <option value="im">im</option>
                                <option value="nom">nom</option>
                                <option value="prenom">prenom</option>
                                <option value="datenais">datenais</option>
                                <option value="contact">contact</option>
                                <option value="statut">statut</option>
                                <option value="situation">situation</option>
                                <option value="nomconjoin">nomconjoin</option>
                                <option value="prenomconjoin"> prenomconjoin</option>
                                <option value="numtarif">numtarif</option>
                            </select>
                            <input type="text" class="form-control2" name="chercher2">
                            <button class="btn btn-primary">Chercher</button>
                        </div>
                    </form>
                </div>
            </header>

            <div class="container admin">
                <div class="tableContent">
                    <div class="row">
                        <table class="table table-striped table-hover" style="width: 600px">
                            <thead>
                                <tr>
                                <?php
                                 
                                    foreach($item2 as $f)
                                    {
                                        ?><p>Total personne : <?php echo $f['total']?> </p><?php 
                                    }
                                    foreach($mort as $f)
                                    {
                                        ?><p>Total mort: <?php echo $f['mort']?> </p><?php 
                                    }
                                    foreach($vivant as $f)
                                    {
                                        ?><p>Total vivant: <?php echo $f['vivant']?> </p><?php 
                                    }
                                  

                                ?>
                                </tr>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th width="140">Date de naissance</th>
                                    <th>Contact</th>
                                    <th>Statut</th>
                                    <th>Situation</th>
                                    <th>NomConjoin</th>
                                    <th>PrenomConjoin</th>
                                    <th>Numero Tarif</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody >
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
                                                <td ><?= $item['im'] ?></td>
                                                <td><?= $item['nom'] ?></td>
                                                <td><?= $item['prenom'] ?></td>
                                                <td widtd="140"><?= $item['datenais'] ?></td>
                                                <td><?= $item['contact'] ?></td>
                                                <td><?= $item['statut'] ?></td>
                                                <td><?= $item['situation'] ?></td>
                                                <td><?= $item['nomconjoin'] ?></td>
                                                <td><?= $item['prenomconjoin'] ?></td>
                                                <td><?= $item['numtarif'] ?></td>
                                                <td style="display:flex;">
                                                    <a class="btn btn-primary" href="deb.php?controller=personne&action=getvaluepersonController&id=<?php echo $item["im"] ?>"><img src="edit_26px.png"></a>
                                                    <a class="btn btn-danger"  onclick="supprimer('<?php echo $item['im'] ?>')" ><img src="trash_26px.png"></a>
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
        <form action="deb.php?controller=personne&action=ajouter" method="POST">
            <div class="container">
                <div class="row">
                    <h1>Ajouter nouveau Personne</h1>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="im">Matricule:</label>
                         <select name="im" class="form-control">
                            <?php
                                  for($i=0;$i<=100;$i++)
                                    {
                            ?>      
                                    <?php 
                                        $dbHost = "localhost";
                                        $dbUser = "root";
                                        $dbPwd = "";
                                        $dbName = "base";
                                        $connexion = null;        
                                        $connexion = new PDO("mysql:host=".$dbHost.";dbname=".$dbName,$dbUser,$dbPwd);
                                        $res=  $connexion->prepare("SELECT im from personne ORDER BY im DESC LIMIT 1");
                                        $res->execute();
                                        $item = $res->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($item as $item)
                                        {
                                            if ("P".strval(($i))==$item["im"])
                                            {
                                              ?>  <option  value="<?php echo "P".strval(($i+1));?>"> <?php echo "P".strval(($i+1));?> </option> <?php

                                            }
                                            
                                        }      
                                    ?>
                                </option>
                            <?php
                                    }
                                    
                            ?>
                            
                            </select>
                                
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom:</label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prenom:</label>
                            <input type="text" name="prenom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="datenais">Date de naissance:</label>
                            <input type="date" name="datenais" class="form-control" required max="<?=date("Y-m-d") ?>"> 
                        </div><div class="form-group">
                            <label for="contact">Contact:</label>
                            <input type="text" name="contact" class="form-control" required>
                        </div>                                                                  
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="statut">Status:</label>
                            <select name="statut" id="statut" class="form-control" >
                                <option value="1">Vivant(e)</option>
                                <option value="0">Mort(e)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="situation">Situation:</label>
                            <select name="situation" id="situation" class="form-control">
                                <option value="veuf">Veuf(ve)</option>
                                <option value="divorcé">Divorcé(e)</option>
                                <option value="marié">Marié(e)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nomConjoin">Nom Conjoint:</label>
                            <input type="text" name="nomConjoin" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="prenomConjoin">Prénom conjoint:</label>
                            <input type="text" name="prenomConjoin" class="form-control" required>
                        </div><div class="form-group">
                            <label for="numtarif">Num tarif:</label>
                            <select name="numtarif" class="form-control" required>
                            <?php 
                                $conn = new PDO("mysql:host=localhost;dbname=base","root","");
                                $res= $conn->prepare("SELECT numtarif from  Tarif where numtarif ");
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
        <form action="deb.php?controller=personne&action=supprimercontroller" method="post">
            <span id="soratra">Voulez-vous bien supprimer?</span>
            <input type="text" id="im"  hidden>
            <button type="submit" id="a" name="supprimerPersonne">Oui </button>
            <button  id="supannul" >Non</button>
        </form>
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
        function supprimer(im){
            document.getElementById("sup").style.display="block";
            document.getElementById("a").value= im;
        }
    </script>
</body>
</html>