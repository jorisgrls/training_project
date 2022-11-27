<?php
session_start();
    include(__DIR__."/../config.php"); 
    $gameId = $_GET['id'];
    $user_id = $_SESSION['id'];
    $getGameQuery = "DELETE FROM usersgames WHERE user_id = $user_id AND game_id = $gameId";
    $getGameStatement = $login->prepare($getGameQuery);
    $getGameStatement->execute();
?>