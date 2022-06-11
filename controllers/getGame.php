<?php
    include(__DIR__."/../config.php"); 
    $gameId = $_GET['id'];
    $getGameQuery = "SELECT g.*, e.name AS name_editor FROM games g INNER JOIN editors e ON g.id_editor = e.id WHERE g.id = $gameId";
    $getGameStatement = $login->prepare($getGameQuery);
    $getGameStatement->execute();
    $game = $getGameStatement->fetch(PDO::FETCH_ASSOC);
    echo json_encode($game);
?>