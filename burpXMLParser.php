<?php
$xml=simplexml_load_file($argv[1]) or die("Error: Cannot create object");
$cou = $xml->item->count();
$str ="<table border='1'><tr><th>id</th><th>request</th><th>response</th></tr>"; 


for ($i=0; $i<=$cou-1 ; $i++) { 
//echo $i;
$id=$i+1;
try {
$req = str_replace("\n","<br>",base64_decode($xml->item[$i]->request));
$res = str_replace("&lt;br&gt;","<br>",htmlentities(str_replace("\n","<br>",base64_decode($xml->item[$i]->response))));

$str = $str.'<tr><td>'.$id.'</td><td>'.$req.'</td><td>'.$res.'</td></tr>';
}catch (Exception $e) {
//echo $i;
}
}

$str = $str."</table>";

echo $str;

?>
