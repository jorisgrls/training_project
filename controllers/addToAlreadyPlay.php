<?php
    session_start();
    include(__DIR__."/../config.php"); 
    $gameId = $_GET['id'];
    $user_id = $_SESSION['id'];

    $usersGamesExistQuery = "SELECT * FROM usersgames WHERE user_id = $user_id AND game_id = $gameId";
    $usersGamesExistStatement = $login->prepare($usersGamesExistQuery);
    $usersGamesExistStatement->execute();
    $usersGamesExist = $usersGamesExistStatement->fetchAll();

    if (count($usersGamesExist) == 0) {
        $addGameQuery = "INSERT INTO usersgames (user_id, game_id, is_wishlist, alreadyplay, is_own) VALUES ($user_id, $gameId, 0, 1, 0)";
        $addGameStatement = $login->prepare($addGameQuery);
        $addGameStatement->execute();
    }
    else{
        $updateGameQuery = "UPDATE usersgames SET alreadyplay = 1, is_own = 0, is_wishlist = 0 WHERE user_id = $user_id AND game_id = $gameId";
        $updateGameStatement = $login->prepare($updateGameQuery);
        $updateGameStatement->execute();
    }

?>