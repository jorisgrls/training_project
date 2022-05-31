<?php

session_start();
 
include("config.php"); 
if(isset($_POST['login'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";
    $result = $connection->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if($row['name'] == $name && $row['password'] == $password){
        $_SESSION['name'] = $name;
        $_SESSION['password'] = $password;
        header("location: ../pages/owngames.php");
    }
    else{
        echo "Mauvais identifiants";
    }
}
?>