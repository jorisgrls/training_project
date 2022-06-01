<?php

session_start();

include(__DIR__."/../config.php"); 
if(isset($_POST['login'])){
    if (!empty($_POST['name']) && !empty($_POST['password'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $getUser = "SELECT * FROM users WHERE name = '$name'";
        $getUserStatement = $login->prepare($getUser);
        $getUserStatement->execute();
        $getUser = $getUserStatement->fetchAll();
        if (count($getUser) == 1) {
            $user = $getUser[0];
            if (password_verify($password, $user['password'])) {
                $_SESSION['name'] = $name;
                $_SESSION['auth'] = 1;
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
}
?>