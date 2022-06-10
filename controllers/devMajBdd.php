<?php
    session_start();
    include(__DIR__."/../config.php"); 
    $user_id = $_SESSION['id'];

    $deleteUsersgamesQuery = "DELETE FROM usersgames WHERE user_id = $user_id";
    $deleteUsersgamesStatement = $login->prepare($deleteUsersgamesQuery);
    $deleteUsersgamesStatement->execute();

    $addUsersgamesQuery = "INSERT INTO usersgames (user_id, game_id, is_wishlist, is_own, alreadyplay) 
                           VALUES ($user_id, 7, 0, 0, 1),
                                  ($user_id, 8, 0, 0, 1),
                                  ($user_id, 9, 0, 0, 1),
                                  ($user_id, 10, 0, 1, 0),
                                  ($user_id, 11, 0, 1, 0),
                                  ($user_id, 12, 0, 1, 0),
                                  ($user_id, 13, 1, 0, 0),
                                  ($user_id, 14, 1, 0, 0),
                                  ($user_id, 15, 1, 0, 0)";
    $addUsersgamesStatement = $login->prepare($addUsersgamesQuery);
    $addUsersgamesStatement->execute();
    header('Location: ../pages/owngames.php');
?>