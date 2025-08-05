

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
    <?php
    foreach($item as $item)
    {
    ?>

<div id="add1">
    
        <form action="deb.php?controller=payer&action=modifierpayerControl&s=<?php echo $item['im'] ?>&g=<?php echo $item['numtarif'] ?>" method="POST">
            <div class="container">
                <div class="row">
                    <h1 style="color: white;">Modifier Paiement</h1>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="im">Matricule</label><br>
                            <input type="text" name="matricule5" class="form-control" value=<?php echo $item['im']?> required>
                        </div>
                        <div class="form-group">
                            <label for="">Numero Tarif</label><br>
                            <input type="text" name="numtarif5" class="form-control" value=<?php echo $item['numtarif']?> required>
                        </div>                                                                 
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <label for="numtarif">Date de Pension</label><br>
                            <input type="date" name="date5" class="form-control" value='<?php echo $item['date']?>' max='<?=date("Y-m-d")?>' >
                        </div> 
                                                              
                    </div>
                    <div class="col-lg-12">
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" >Modifier</button>
                            <a href="deb.php?controller=payer&action=SelectpayerControl" class="btn btn-primary" onclick="Annuler()" id="tambatra">Annuler</a>
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

