<?php
    include(__DIR__."/../config.php"); 
    $gameId = $_GET['id'];
    $addGameQuery = "SELECT * FROM games WHERE id_api = $gameId";
    $addGameStatement = $login->prepare($addGameQuery);
    $addGameStatement->execute();
    $game = $addGameStatement->fetch(PDO::FETCH_ASSOC);
    echo json_encode($game);
?>