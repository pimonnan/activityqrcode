<?php
    $localhost = "localhost";
    $username = "root";
    $password = "";
    $database = "warehouse";

    $connection = mysqli_connect($localhost, $username, $password, $database);
    
    if(!$connection){
        echo '!Error Connect to database';
    }
?>