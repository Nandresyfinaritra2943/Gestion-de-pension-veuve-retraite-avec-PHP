<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    h1{
        color: black;
        font-weight: 200;
        font-family: 'Times New Roman', Times, serif;
    }
    .entetetableau{
        width:225px;
        font-weight:bold;
        font-size: 20px;
    }
    #tsipika{
        height: 2px;width: 800px;color: black;
    }
    #Ajouter{
        background-color:forestgreen;
        height: 30px;
        width: 80px;
        color: white;
        border-radius: 3px;
        margin-left: 10px;
        transition: 1s;
    }
    #Ajouter:hover{
        background-color:#ff4f5a;
        color:white;
    }
    
</style>
<body>
<?php
  
    ?>
    <h1 id="entetetarif">TABLE Tarif<a href="./TarifAjouter.php"><button type="submit" id="Ajouter">Ajouter</button></a></h1>
    <div id="anaty">
        <table>
            <tr>
                <td class="entetetableau">
                    Numero Tarif
                </td>
                <td class="entetetableau">
                    Diplome
                </td>
                <td class="entetetableau">
                    Categorie
                </td>
                <td class="entetetableau">
                    Montant
                </td>
                <td>
                    Action
                </td>
            </tr>
        </table>
        <hr>
        <?php require_once"../../Model/TarifAfficherModel.php"; ?>
    </div>
    <?php


?>
</body>
</html>