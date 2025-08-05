<?php
$conn = new PDO("mysql:host=localhost;dbname=base","root","");
$res= $conn->prepare("SELECT categorie,count(numtarif) as total from Tarif group by categorie ASC");
$res->execute();
$val= $res->fetchAll(PDO::FETCH_ASSOC);
$categorie = [];
$nombre = [];
foreach($val as $w)
{
    $categorie[] = $w['categorie'];
    $nombre [] = $w['total'];

}
$data = ['categorie'=>$categorie,'nombre'=>$nombre];
$data_json = json_encode($data);

?>