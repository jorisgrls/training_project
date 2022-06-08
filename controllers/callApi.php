
<?php 
$gameName = $_GET['name'];
$url = "https://api.geekdo.com/xmlapi2/search?query=".$gameName; 

$ch = curl_init();  

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

$test = curl_exec($ch); 

$xml = new simpleXMLElement($test);

//echo "<pre>".print_r($xml, true)."</pre>";
$results = [];

foreach($xml->item as $item) {
    $results[] = [$item->name['value']->__toString(),$item['id']->__toString()];
}
curl_close($ch);



//print_r($results[0][1]);
//echo json_encode($results[1][1]);
echo json_encode($results);
?>
