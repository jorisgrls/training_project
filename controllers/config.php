<?php
    define('USER',"root");
    define('PASSWORD',"");
    define('SERVER',"localhost");
    define('BASE',"training_project");

    $dsn="mysql:dbname=".BASE.";host=".SERVER;
    try{
        $connection = new PDO($dsn,USER,PASSWORD);
    }
    catch(PDOException $e){
        printf("Failed connection : %s\n", $e->getMessage());
    exit();
    }
?>