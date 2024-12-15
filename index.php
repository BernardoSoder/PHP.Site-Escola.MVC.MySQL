<?php
    session_start();
    if (isset($_SESSION['esta_logado'])){
        header("Location: ./views/principal.php");
    }
    else{
        header("Location: ./views/login.php");
    }
    exit();
?>