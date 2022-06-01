<?php
    include(__DIR__."/../config.php");
    if (!empty($argv[1]) && !empty($argv[2])){
        $name = $argv[1];
        $password = $argv[2];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, password) VALUES ('$name', '$passwordHash')";
        $result = $login->query($sql);
        if ($result) {
            echo "User added successfully | Name : ".$name." / Password :".$password;
        } else {
            echo "Error: " . $sql . "<br>" . $login->error;
        }
    }
    else{
        echo "One of the fields is empty";
    }
?>