<?php

    session_start();
 
    if (isset($_SESSION['auth'])) { 
 
        $_SESSION = array();
        session_destroy();
 
        setcookie('login', '');
        setcookie('pass_hache', '');
    } 
    header('Location: ../pages/login.php');
?>