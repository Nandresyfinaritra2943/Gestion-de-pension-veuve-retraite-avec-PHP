<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrapVrai.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Pension</title>
    <style>
        #add
        {
            display: none;
            transform: translate(-50%,-50%);
            position: fixed;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5); /* Black w/ opacity */
        }
        #add1
        {
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
        #B{
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
        #supannul
        {
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
                        
                        <h3><button class="btn btn-default" onclick="openLeftContent()"><img src="menu_30px.png"></button> Table Tarif <a href="#" class="btn btn-success" onclick="ajouter()"> <span class="glyphicon glyphicon-plus"></span> AJouter</a><a href="deb.php?controller=tarif&action=getAllTarifController" style="margin-left: 20px;">Actualiser</a></h3>
                    </div>
                    <form action="deb.php?controller=tarif&action=recherche" method="POST">
                        <div class="search">
                            <select name="selecttarif" class="form-control" id="g">
                                <option value="numtarif">numtarif</option>
                                <option value="diplome">diplome</option>
                                <option value="categorie">categorie</option>
                                <option value="montant">montant</option>
                            </select>
                        <input type="text" class="form-control2" name="cherchertarif">
                        <button class="btn btn-primary">Chercher</button>
                        </div>
                    </form>
                </div>
            </header>

            <div class="container admin">
                <div class="tableContent">
                    <div class="row">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Numtarif</th>
                                    <th>Diplome</th>
                                    <th>Categorie</th>
                                    <th >Montant</th>
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
                                                <td><?= $item['numtarif'] ?></td>
                                                <td><?= $item['diplome'] ?></td>
                                                <td><?= $item['categorie'] ?></td>
                                                <td ><?= $item['montant'] ?></td>
                                                <td>
                                                    <a class="btn btn-primary" href="deb.php?controller=tarif&action=gettarifControl&num=<?php echo $item['numtarif'] ?>" ><img src="edit_26px.png"></a>
                                                    <a class="btn btn-danger" onclick="Supprimer('<?php echo $item['numtarif'] ?>')" href="#" ><img src="trash_26px.png"></a>
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
        <form action="deb.php?controller=tarif&action=AjouterTarifController" method="POST">
            <div class="container">
                <div class="row">
                    <h1>Ajouter nouveau Tarif</h1>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="im">NumTarif:</label>
                            <input type="text" name="numtarif3" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nom">Diplome</label>
                            <select class="form-control" name="diplome3">
                                <option>Cepe</option>
                                <option>Bepc</option>
                                <option>Baccalaureat</option>
                                <option>Licence</option>
                                <option>Master</option>
                                <option>Doctorat</option>
                                <option>Professorat</option>
                                <option>HDR</option>
                            </select>
                        </div>                                                              
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="statut">Categorie</label>
                            <select name="categorie7" id="categorie" class="form-control">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                        <div>
                            <label for="numtarif">Montant</label>
                            <select name="Montant3" class="form-control">
                                <option>300000</option>
                                <option>350000</option>
                                <option>400000</option>
                                <option>500000</option>
                                <option>600000</option>
                                <option>700000</option>
                                <option>800000</option>
                                <option>1000000</option>

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
        <form action="deb.php?controller=tarif&action=SupprimerTarifControl" method="post">
            <span id="soratra">Voulez-vous bien supprimer?</span>
            <button type="submit" id="B" name="supprimerTarif">Oui </button>
            <button  id="supannul" >Non</button>
        </form>
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
        function Supprimer(ims)
        {
            document.getElementById("sup").style.display="block";
            document.getElementById("B").value = ims;
        }
       
    </script>
</body>
</html>