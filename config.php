<?php
    define('USER',"root");
    define('PASSWD',"");
    define('SERVER',"localhost");
    define('BASE',"stage_project");

    $dsn="mysql:dbname=".BASE.";host=".SERVER;
    try{
        $connexion = new PDO($dsn,USER,PASSWD);
        echo("test ok");
    }
    catch(PDOException $e){
        printf("Échec de la connexion : %s\n", $e->getMessage());
    exit();
    }
?>