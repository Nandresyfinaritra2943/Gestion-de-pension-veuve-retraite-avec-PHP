<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        #ivelany,body{
            background-image: url(../images/boat-8332114_1920.jpg);height:800px;width: 100%;margin-top: 30px;
        }
        #titre{
            background-color:rgba(255,255,255,0.5);
            width:1000px;
            height: 400px;
            margin-top: 150px;
            margin-left: 200px;
        }
        #formulaire{
            background-color:teal;
            height: 700px;
            position: absolute;
            width: 500px;
            top:10px;
            left:550px;
        }
        #soratra{
            font-size: 35px;
            color:white;
            margin-top: 90px;
            margin-left: 30px;
        }
        #two{
            margin-left: 30px;
        }
        #three{
            margin-left: 50px;
        }
        #for{
            margin-top: 60px;
            text-align: center;

        }
        #input{
            margin-top: 40px;
            width: 180px;
            height: 30px;
            background-color: transparent;
            color: white;
        }
        #Enregistrer{
            margin-left: 50px;
            margin-top: 10px;
            width: 120px;
            height: 35px;
            transition: 1s;
            border-radius: 5px;
        }
        #Enregistrer:hover{
          background-color: black;
          color: white;

        }
        #sary{
            position: absolute;
            top: 0px;
            left: -500px;
        }

    </style>
</head>
<body>
    <div id="ivelany">
        <div id="titre">
            <br><br><br><br>
        <h1 id="soratra"><span id="one">Enregistrer des</span><br><span id="two">donnees </span><br><span id="three">sur la table Tarif</span></h1>

        </div>
        <div id="formulaire">
            <form id="for" method="post" action="../../Model/TarifInsertMode.php">
                <label>
                    Numero Tarif
                </label>
                <input type="text" placeholder="Numero Tarif" id="input" name="Numtarif"> </input><br> 
                <label>
                    Diplome 
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" placeholder="Diplome" id="input" name="Diplome"><br></input>
                <label>
                    Categorie
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" placeholder="Categorie" id="input" name="Categorie"><br></input>
                <label>
                    Montant
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="number" placeholder="Montant" id="input" name="Montant"></input><br><br><br>
                <button type="submit" id="Enregistrer">Enregistrer</button>
            </form>
                <img src="../images/experience-img.jpg" width="350px" height="300px" id="sary">





        </div>

    </div>
</body>
</html>