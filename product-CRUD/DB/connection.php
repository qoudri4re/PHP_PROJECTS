<?php 
        define ("DB_HOST","localhost");
        define ("DB_USERNAME","root");
        define ("DB_PASSWORD","qoudri4re");
        define ("DB_NAME","crud");
    
        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        mysqli_set_charset($connection, 'utf8');
    
        if (!$connection) {
            echo "error";
        }
?>