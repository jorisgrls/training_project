<?php
    session_start();
    include(__DIR__."/../config.php"); 
    $gameId = $_GET['id'];
    $user_id = $_SESSION['id'];
    $getGameQuery = "UPDATE usersgames SET alreadyplay = 0, is_own = 1 WHERE user_id = $user_id AND game_id = $gameId";
    $getGameStatement = $login->prepare($getGameQuery);
    $getGameStatement->execute();
?>