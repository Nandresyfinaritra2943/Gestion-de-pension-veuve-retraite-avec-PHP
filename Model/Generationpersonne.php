<?php
require_once __DIR__.'/../vendor/autoload.php';
$num = $data['num'];
$nom = $data['nom'];
$prenom = $data['prenom'];
$mois = $data['mois'];
$annee = $data['annee'];
$montant = $data['montant'];
$dir = __DIR__. "/facture/{$num}_$nom/";
$pdfFilename = "facture_{$num}_{$nom}_{$mois}_{$annee}.pdf";
$pdfPath = $dir . $pdfFilename;

if(!is_dir($dir))
{
    mkdir($dir, 0777, true);
}

$mpdf = new \Mpdf\Mpdf();

$html = '
                        <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Document</title>
                    </head>
                    <style>
                        #tsipika1{
                            background-color: white;
                            height: 30px;
                            width: 300px;
                            margin-top: 30px;
                        }
                        #entete{
                            height: 500px;
                            width: 600px;
                            background-color:white;
                            margin: 0 auto;
                        }
                        #tsipika{
                            display: flex;
                        }
                        div h1{
                            font-weight: 600;
                        }
                        #tsipika3{
                            background-color: white;
                            height: 30px;
                            width: 100px;
                            margin-top: 30px;

                        }
                        body{
                            background-color: rgba(0,0,0,0.2);
                        }
                        #entete{
                            text-align: center;
                        
                        }
                        #tsipika2{
                            margin-top: 3px;
                        }
                        #fact{
                            
                            font-size: 20px;
                        }
                        #donnee {
                            /*margin-right: 380px;*/
                            text-align: left;
                            padding: 20px;
                        }
                        .label{
                            margin-top: 70px;
                        }

                    </style>
                    <body>
                            <div id="entete">
                                <div id="tsipika">
                                    <div id="tsipika1">

                                    </div>
                                    <div id="tsipika2">
                                        <h1 >Reçu de Paiement</h1>

                                    </div>
                                    <div id="tsipika3">

                                    </div>
                                </div>
                                
                                <div id="donnee">
                                    <label id="fact" >Facture a : </label>  <br><br><br>
                                    <label class="label">Nom :'.$nom.'</label><br><br>
                                    <label class="label">Prenoms :'.$prenom.'</label><br><br>
                                    <label class="label">Matricule :'.$num.'</label><br> <br>
                                    <label class="label">Mois : '.$mois.'</label><br><br>
                                    <label class="label">Annee :'.$annee.'</label><br><br>
                                    <label class="label">Montant :'.$montant.'  AR </label><br><br>
                                </div>
                            </div>
                    </body>
                    </html>
';
$mpdf->WriteHTML($html);
    
$mpdf->Output($pdfPath,'F');
$mpdf->Output($pdfPath,'I');

?>