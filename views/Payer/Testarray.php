<?php
 $conn = new PDO("mysql:host=localhost;dbname=base","root","");
 $res = $conn->prepare("SELECT im from personne");
 $res->execute();
 $tab = $res->fetchAll(PDO::FETCH_ASSOC);
 $tableau = array();
 $i = 0;
 foreach($tab as $f)
 {
    
    $tableau[$i] = $f;

    $i++;
 }

 for ( $i =0;$i<4;$i++){
    foreach ($tableau[$i] as $elem)
    {
        echo $elem;
    }
 }

?>