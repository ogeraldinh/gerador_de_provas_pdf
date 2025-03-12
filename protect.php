<?php
    session_start();
    include('conex.php');
    if ((!isset($_SESSION['id']) == true) and (!isset($_SESSION['senha']) == true)) {
        unset($_SESSION['id']);
        unset($_SESSION['senha']);
        session_destroy();
        header('Location: login.php');
        exit();
    }
    ?>