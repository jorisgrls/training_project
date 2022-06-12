
<?php 
    $gameName = $_GET['name'];
    $name = str_replace(' ', '+', $gameName);
    $url = "https://api.geekdo.com/xmlapi2/search?query=".$name; 
    

    $ch = curl_init();  

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

    $request = curl_exec($ch); 

    $xml = new simpleXMLElement($request);

    $results = [];

    foreach($xml->item as $item) {
        $results[] = [$item->name['value']->__toString(),$item['id']->__toString()];
    }
    curl_close($ch);

    echo json_encode($results);
    
?>
