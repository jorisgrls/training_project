<?php
    include(__DIR__."/../config.php"); 
    $gameId = $_GET['id'];
    $getGameQuery = "SELECT * FROM games g WHERE id = $gameId";
    $getGameStatement = $login->prepare($getGameQuery);
    $getGameStatement->execute();
    $game = $getGameStatement->fetch(PDO::FETCH_ASSOC);
    echo json_encode($game);
?>