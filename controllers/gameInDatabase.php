<?php
    $gameId = $_GET['id'];

    include(__DIR__."/../config.php"); 
    
    if(!gameInDatabase($gameId)){
        addGameInDatabase($gameId);
    }
    echo(gameInDatabase($gameId));

    

    function gameInDatabase($gameId){
        global $login;
        $addGameQuery = "SELECT * FROM games WHERE id_api = $gameId";
        $addGameStatement = $login->prepare($addGameQuery);
        $addGameStatement->execute();
        $game = $addGameStatement->fetch(PDO::FETCH_ASSOC);
        if($game){
            return json_encode($game);
        }else{
            return false;
        }
    }

    function addGameInDatabase($gameId){
        $url = "https://api.geekdo.com/xmlapi2/things?id=".$gameId; 
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

        $request = curl_exec($ch); 

        $xml = new simpleXMLElement($request);

        $results = ["id_api" => intval($xml->item['id']->__toString()),
                    "img" => $xml->item->thumbnail->__toString(),
                    "title" => $xml->item->name['value']->__toString(),
                    "description" => $xml->item->description->__toString(),
                    "min_players" => $xml->item->minplayers['value']->__toString(),
                    "max_players" => $xml->item->maxplayers['value']->__toString(),
                    "playingtime" => intval($xml->item->playingtime['value']->__toString()),
                    "editor" => $xml->xpath('//*[@type="boardgamepublisher"][1]')[0]['value']->__toString(),
                ];

        curl_close($ch);

        $editor_id = getEditorByName($results['editor']);

        global $login;

        $addGameQuery = "INSERT INTO games (id_api, img, title, description, nb_players, playingtime, id_editor) VALUES 
                        ({$results['id_api']}, 
                        \"{$results['img']}\", 
                        \"{$results['title']}\", 
                        \"{$results['description']}\", 
                        \"{$results['min_players']} - {$results['max_players']}\", 
                        {$results['playingtime']}, 
                        $editor_id)";
        $addGameStatement = $login->prepare($addGameQuery);
        $addGameStatement->execute();
    }

    function getEditorByName($name){
        global $login;
        $getEditorQuery = "SELECT id FROM editors WHERE name = \"$name\"";
        $getEditorStatement = $login->prepare($getEditorQuery);
        $getEditorStatement->execute();
        $editor = $getEditorStatement->fetch(PDO::FETCH_ASSOC);
        if($editor){
            return $editor['id'];
        }else{
            $addEditorQuery = "INSERT INTO editors (name) VALUES (\"$name\")";
            $addEditorStatement = $login->prepare($addEditorQuery);
            $addEditorStatement->execute();
            return getEditorByName($name);
        }
    }
?>