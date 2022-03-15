<?php 
    require 'paths.php';
    require 'DB/connection.php';

    function executeQuery($query){ 
        global $connection;
        return mysqli_query($connection, $query);
    }

    function getProducts(){ 
        $query = "SELECT * FROM products";
        $records = executeQuery($query);
        return $records;
    }


?>