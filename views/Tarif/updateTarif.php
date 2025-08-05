<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap//bootstrapVrai.min.css">
    <link rel="stylesheet" href="css//style.css">
</head>
<body>
    <style>
      .container{
            height: 100%;
            width: 40%;
            padding-top: 2%;
            text-align: center;
            border-radius: 5%;
            margin-left: 30%;
        }
        input,label,select{
            margin-top: 4%;
            width: 30%;
            font-size: 70%;
            height: 3%;

        }
        label{
            font-size: 100%;
            margin-right: 2%;
            color: white;
        }
       /* button{
            margin-top: 8%;
            width: 40%;
            height: 6%;
            margin-bottom: 8%;
            margin-right: 30%;
        }*/
      /*  #tambatra{
            color: black;
            background-color: white;
            width: 200px;
            height: 15px;
            border-radius: 6px;
        }*/
        
        
      #add3{
        margin-top: 10%;
        background-color: #1a2e35;
        height: 60%;
        width: 80%;
        margin-left: 5%;
        position: absolute;
        border-radius: 3%;
      }
    </style>
    <?php
    foreach($item as $item)
    {
    ?>

<div id="add3">
    
        <form action="deb.php?controller=tarif&action=modifierTarifController" method="POST">
            <div class="container">
                <div class="row">
                    <h1 style="color: white;">Modifier Tarif</h1>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="im">Numerotarif</label><br>
                            <input type="text" name="numtarif6" class="form-control" value=<?php echo $item['numtarif']?> required>
                        </div>
                        <div class="form-group">
                            <label for="">Diplome</label><br>
                            <input type="text" name="diplome5" class="form-control" value=<?php echo $item['diplome']?> required>
                        </div>                                                                 
                    </div>
                    <div class="col-lg-6">
                        
                        
                        <div class="form-group">
                            <label for="">Categorie</label><br>
                            <select name="Categorie5" class="form-control"  required>
                            <option value="<?php echo $item['categorie']?>"><?php echo $item['categorie']?></option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="numtarif">Montant</label><br>
                            <input type="number" name="montant5" class="form-control" value=<?php echo $item['montant']?> required>
                        </div> 
                                                              
                    </div>
                    <div class="col-lg-12">
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" id="tambatra">Modifier</button>
                            <a href="deb.php?controller=tarif&action=getAllTarifController" class="btn btn-primary" onclick="Annuler()" id="tambatra" >Annuler</a>
                        </div> 
                    </div>
                </div>
            </div>
        </form>
    </div>



    <?php

    }

    ?>
    
</body>
</html>