<?php
    session_start();
    unset($_SESSION['Mlogin']);
    session_destroy();
    header('Location:login.php');
?>