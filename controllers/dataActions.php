<?php
    session_start();
    include(__DIR__."/../config.php"); 
    $gameId = $_GET['id'];
    $action = $_GET['action'];
    $user_id = $_SESSION['id'];
    
    if($action == "removeGame"){
        $getGameQuery = "DELETE FROM usersgames WHERE user_id = $user_id AND game_id = $gameId";
        $getGameStatement = $login->prepare($getGameQuery);
        $getGameStatement->execute();
    } 
    else{
        switch($action){
            case "addOwnGames":
                $action = ['is_own' => 1, 'is_wishlist' => 0, 'alreadyplay' => 0];
                break;
            case "addWishlist":
                $action = ['is_own' => 0, 'is_wishlist' => 1, 'alreadyplay' => 0];
                break;
            case "addAlreadyPlay":
                $action = ['is_own' => 0, 'is_wishlist' => 0, 'alreadyplay' => 1];
                break;
        }
    
        $usersGamesExistQuery = "SELECT * FROM usersgames WHERE user_id = $user_id AND game_id = $gameId";
        $usersGamesExistStatement = $login->prepare($usersGamesExistQuery);
        $usersGamesExistStatement->execute();
        $usersGamesExist = $usersGamesExistStatement->fetchAll();
        
        if (count($usersGamesExist) == 0) {
            $addGameQuery = "INSERT INTO usersgames (user_id, game_id, alreadyplay, is_own, is_wishlist) VALUES ($user_id, $gameId, {$action['alreadyplay']}, {$action['is_own']}, {$action['is_wishlist']})";
            $addGameStatement = $login->prepare($addGameQuery);
            $addGameStatement->execute();
        }
        else{
            $updateGameQuery = "UPDATE usersgames SET alreadyplay = {$action['alreadyplay']}, is_own = {$action['is_own']}, is_wishlist = {$action['is_wishlist']} WHERE user_id = $user_id AND game_id = $gameId";
            $updateGameStatement = $login->prepare($updateGameQuery);
            $updateGameStatement->execute();
        }    
    }
?>