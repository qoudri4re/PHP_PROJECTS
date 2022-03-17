<?php 
        define ("DB_HOST","sql4.freemysqlhosting.net");
        define ("DB_USERNAME","sql4479573");
        define ("DB_PASSWORD","KNM9akiFKj");
        define ("DB_NAME","sql4479573");
    
        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        mysqli_set_charset($connection, 'utf8');
    
        if (!$connection) {
            echo "error";
        }
?>