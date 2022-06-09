<?php
    define('USER',"root");
    define('PASSWORD',"");
    define('SERVER',"127.0.0.1");
    define('BASE',"stage_project");

    $dsn="mysql:dbname=".BASE.";host=".SERVER;
    
    try{
        $login = new PDO($dsn,USER,PASSWORD);
    }
    catch(PDOException $e){
        printf("Failed login : %s\n", $e->getMessage());
    exit();
    }
?>