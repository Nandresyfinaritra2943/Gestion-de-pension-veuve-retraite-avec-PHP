<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap//bootstrapVrai.min.css">
    <link rel="stylesheet" href="css//style.css">
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
<body>
<div class="content">
        <div class="left_content" id="open">
            <h2>Pension <button class="btn btn-default" onclick="closeLeftContent()" style="margin-left: 20PX;"><img src="cancel_32px.png" ></button></h2>
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
                        
                        <h3 style="color: white;"><button class="btn btn-default" onclick="openLeftContent()"><img src="menu_30px.png"></button> Table Conjoin </h3>
                    </div>
                </div>
            </header>

    <div class="container admin">
    <div class="tableContent">
        <div class="row">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Numero Pension</th>
                        <th>Nom Conjoin</th>
                        <th>Prenom Conjoin</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($item as $item) 
                        {
                            ?>
                                <tr>
                                    <td><?= $item['numpension'] ?></td>
                                    <td><?= $item['nomconjoin'] ?></td>
                                    <td><?= $item['prenomconjoin'] ?></td>
                                    <td><?= $item['montant'] ?></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
     <?php
    ?>
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
        function Supprimer(){
            document.getElementById("sup").style.display="block";
        }
    </script>
</body>
</html>