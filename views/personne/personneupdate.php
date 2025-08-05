<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap//bootstrapVrai.min.css">
    <link rel="stylesheet" href="../../css//style.css">
    <title>Document</title>
</head>
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
            display: block;
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
</style>
<body>
<div id="add"></div>
    <div id="add1">
        <form action="deb.php?controller=personne&action=ajouter" method="POST">
            <div class="container">
                <div class="row">
                    <h1>Ajouter nouveau Personne</h1>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="im">Matricule:</label>
                         <select name="im">
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
                                              ?>  <option> <?php echo "P".strval(($i+1));?> </option> <?php

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
                            <input type="date" name="datenais" class="form-control" required> 
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
                            <select type="number" name="numtarif" class="form-control" required>
                            <?php 
                                $conn = new PDO("mysql:host=localhost;dbname=base","root","");
                                $res= $conn->prepare("SELECT numtarif from  tarif where im not in(select im from paiement)");
                                $res->execute();
                                $fi = $res->fetchAll(PDO::FETCH_ASSOC);
                                foreach($fi as $f){
                                    ?> 
                                    <option><?php echo $f['im']?></option>
                                    
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
   
   
</body>
</html>