<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histogramme avec Paiement</title>
    <script src="./../../dist/chart.umd.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../bootstrap/bootstrapVrai.min.css">
</head>
<style>
  #histo{
        width: 800px;
        height: 1000px;
        margin-left: 20%;
    }
    .chart-container{
        width: 20%;margin-top: 0 auto;
    }

    </style>
<body>
    <div class="content">
        <div class="left_content" id="open">
            <h2>Pension <button class="btn btn-default" onclick="closeLeftContent()" style="margin-left: 10PX;"><img src="cancel_32px.png"></button></h2>
            <div class="divider"></div>
            <div class="navigation">
                <ul>
                    <li><a href="../../deb.php?controller=tarif&action=getAllTarifController" class="btn btn-primary ">Tarif</a></li>
                    <li><a href="../../deb.php?controller=personne&action=afficher" class="btn btn-primary ">Personne</a></li>
                    <li><a href="../../dash4.php" class="btn btn-primary ">Conjoint</a></li>
                    <li><a href="../../deb.php?controller=payer&action=SelectpayerControl" class="btn btn-primary ">Paiement</a></li>
                    <li><a href="../../dash6.php" class="btn btn-primary ">Facture</a></li>
                    <li><a href="../../views/Payer/histo.php" class="btn btn-primary ">Histogramme</a></li>
                </ul>
            </div>
        </div>
        <div class="right_content">
            <div id="histo">
              <h1 style="color:darkslategrey;">HISTOGRAMME DE NOMBRE DE PERSONNES PAR CATEGORIE</h1>
              <canvas id="myChart" width= "50" height= "40" ></canvas>
            </div>
        </div>
    </div>

    <
</body>
<?php
$conn = new PDO("mysql:host=localhost;dbname=base","root","");
$res= $conn->prepare("SELECT Tarif.categorie,count(personne.im) as total from Tarif JOIN personne ON Tarif.numtarif=personne.numtarif group by Tarif.categorie ASC");
$res->execute();
$val= $res->fetchAll(PDO::FETCH_ASSOC);
$categorie = [];
$nombre = [];
foreach($val as $w)
{
    $categorie[] = $w['categorie'];
    $nombre [] = $w['total'];

}

?>


<script>

    // selectioner le canvas
    const ctx = document.getElementById("myChart").getContext('2d');
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($categorie)?>,
            datasets: [{
                label: 'Nombre de personne  ',
                data: <?php echo json_encode($nombre)?>,
                backgroundColor: 'hsl(193, 29%, 40%)',
                borderColor: 'rgba(<?php json_encode(generercouleur()) ?>)',
                borderWidth: 0.2,
                barThickefness:20,
                maxbarThickefness:100,
                barPercentage:0.3,
                categoryPercentage:0.8,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {beginAtZero: true,
                    ticks: {
                        stepSize:1
                    }

                }
            
            }
        }
    });

    //Creation du graphique
    var monHistogramme = new Chart(ctx, {
       type: 'bar', //type histogramme
     data: data,
     options: options
     });

</script>
<?php
$color='';
 function generercouleur()
 {
    $r = rand(0,255);
    $g = rand(0,255);
    $b = rand(0,255);
    $color = $r .','.$g . ','.$b;
return $color;

 }

  


?>

</html>