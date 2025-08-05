<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/bootstrapVrai.min.css">
    <title>Pension</title>
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
            background-color:#1a2e35;
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
        #update1,body{
            background-color: #1a2e35;
            color: white;
        }
</style>
<body>

<div id="update">
<div id="update1">
    <?php
            foreach($item as $item)
        {
                                ?>
        <form action="deb.php?controller=personne&action=modifierpersonneController&id='<?php echo $item['im']?>'" method="POST">
            <div class="container">
                <div class="row">
                    <h1>Modifier une Personne</h1>
                    <div class="col-lg-6">
                        <div class="form-group">
                           
                            <label for="im2" class="form-label" >Matricule:</label>
                            <input type="text" name="im2" class="form-control" value=<?php echo $item["im"] ?> required>
                        </div>
                        <div class="form-group">
                            <label for="nom" class="form-label">Nom:</label>
                            <input type="text" name="nom2" class="form-control" value=<?php echo $item["nom"] ?> required><br>
                        </div>
                        <div class="form-group">
                            <label for="prenom" class="form-label">Prenom:</label>
                            <input type="text" name="prenom2" class="form-control" value=<?php echo $item["prenom"] ?> required>
                        </div>
                        <div class="form-group">
                            <label for="datenais" class="form-label">Date de naissance:</label>
                            <input type="date" name="datenais2" class="form-control" value=<?php echo $item["datenais"] ?> required ><br>
                        </div><div class="form-group">
                            <label for="contact" class="form-label">Contact:</label>
                            <input type="text" name="contact2" class="form-control" value=<?php echo $item["contact"] ?> required>
                        </div>                                                                  
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                                <?php 
                              if ($item["statut"]==1)
                                {
                                    ?>
                                    <label for="statut" class="form-label">Status:</label>
                                    <select name="statut2" id="statut" class="form-control" >
                                        <option value="1">Vivant(e)</option>
                                        <option value="0">Mort(e)</option>
                                    </select>
                                    <?php
                                }
                              if ($item["statut"]==0)
                                {
                                    ?>
                                    <label for="statut" class="form-label">Status:</label>
                                    <select name="statut2" id="statut" class="form-control" >
                                        <option value="0">Mort(e) </option>
                                        <option value="1"> Vivant(e)</option>
                                    </select>
                                    <?php
                                }
                            
                                ?>
                            
                        </div>
                        <div class="form-group">
                            <label for="situation" class="form-label">Situation:</label>
                            
                                <?php
                                if($item["situation"]== 'marié'){
                                    ?>
                                    <select name="situation2" id="situation" class="form-control" required>
                                        <option value="marié">Marié(e)</option>
                                        <option value="veuf">Veuf(ve)</option>
                                        <option value="divorcé">Divorcé(e)</option>
                                    </select>
                                    <?php
                                    
                                }
                                if ($item["situation"]=='divorcé')
                                {
                                    ?>
                                    <select name="situation2" id="situation" class="form-control" >
                                        <option value="divorcé">Divorcé(e)</option>
                                        <option value="marié">Marié(e)</option>
                                        <option value="veuf">Veuf(ve)</option>
                                  
                                    </select>
                                    <?php
                                }
                                if ($item["situation"]=='veuf')
                                {
                                    ?>
                                    <select name="situation2" id="situation" class="form-control" >
                                        <option value="veuf">Veuf(ve)</option>
                                        <option value="marié">Marié(e)</option>
                                        <option value="divorcé">Divorcé(e)</option>
                                    </select>
                                    <?php
                                }
                                ?>
                        </div>
                        <div class="form-group">
                            <label for="nomConj" class="form-label">Nom Conjoint:</label>
                            <input type="text" name="nomConj2" class="form-control" value=<?php echo $item["nomconjoin"] ?> required><br>
                        </div>
                        <div class="form-group">
                            <label for="preConj" class="form-label">Prénom conjoint:</label>
                            <input type="text" name="preConj2" class="form-control" value=<?php echo $item["prenomconjoin"] ?> required>
                        </div>
                        <div class="form-group">
                            <label for="numTarif" class="form-label">Num tarif:</label>
                            <select type="text" name="numTarif2" class="form-control" required>
                                <option value="<?php echo $item['numtarif'] ?>"> <?php echo $item['numtarif'] ?></option>
                            <?php 
                                $conn = new PDO("mysql:host=localhost;dbname=base","root","");
                                $res= $conn->prepare("SELECT numtarif from  Tarif where numtarif");
                                $res->execute();
                                $fi = $res->fetchAll(PDO::FETCH_ASSOC);
                                foreach($fi as $f){
                                    ?> 
                                    <option value="<?php echo $f['numtarif']?>"><?php echo $f['numtarif']?></option>
                                    
                                    <?php

                                }
                                
                                
                                ?>
                            </select>
                            <br>
                        </div>                             
                    </div>
                    <div class="col-lg-12">
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" >Modifier</button>
                            <a  href="deb.php?controller=personne&action=afficher " class="btn btn-success">Annuler</a>
                        </div> 
                    </div>
                   
                </div>
            </div>
        </form>
        <?php
        }
        ?>     
    </div>
</div>
</body>
</html>