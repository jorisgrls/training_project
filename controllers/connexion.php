<?php
    session_start();

    include(__DIR__."/../config.php"); 
    if (!empty($_POST['name']) && !empty($_POST['password'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $getUserQuery = "SELECT * FROM users WHERE name = '$name'";
        $getUserStatement = $login->prepare($getUserQuery);
        $getUserStatement->execute();
        $users = $getUserStatement->fetchAll();
        if (count($getUser) == 1) {
            $user = $users[0];
            if (password_verify($password, $user['password'])) {
                $_SESSION['name'] = $name;
                $_SESSION['auth'] = 1;
                $_SESSION['id'] = $user['id'];
                header("location: ../pages/owngames.php");
            } 
            else {
                header("location: ../pages/login.php?error=1");
            }
        } 
        else {
            header("location: ../pages/login.php?error=1");
        }
    }
    else {
        header("location: ../pages/login.php?error=2");
    }
?>