<?php

    session_start();
 
    if (isset($_SESSION['auth'])) { 
 
        $_SESSION = array();
        session_destroy();
    } 
    header('Location: ../pages/login.php');
?>