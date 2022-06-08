<?php 
$gameId = $_GET['id'];
$url = "https://api.geekdo.com/xmlapi2/things?id=".$gameId; 

$ch = curl_init();  

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

$test = curl_exec($ch); 

$xml = new simpleXMLElement($test);

//echo "<pre>".print_r($xml, true)."</pre>";
$results = [];
$results[] = ["id_api" => $xml->item['id']->__toString(),"img" => $xml->item->thumbnail->__toString(),"title" => $xml->item->name['value']->__toString(),"description" => $xml->item->description->__toString(),"nb_players" => $xml->item->minplayers['value']->__toString(),"playingtime" => $xml->item->playingtime['value']->__toString(),"editor" => $xml->item->link['value']->__toString()];


curl_close($ch);

include(__DIR__."/../config.php"); 
    
$addGameQuery = "INSERT INTO games (id_api, img, title, description, nb_players, nb_recommanded_players, id_editor) VALUES ($results[0]['id_api'], $results[0]['img'], $results[0]['title'], $results[0]['description'], $results[0]['nb_players'], $results[0]['playingtime'], $results[0]['editor'])";
$addGameStatement = $login->prepare($addGameQuery);
$addGameStatement->execute();


//print_r($results[0][1]);
//echo json_encode($results[1][1]);
//echo json_encode($results);
?>