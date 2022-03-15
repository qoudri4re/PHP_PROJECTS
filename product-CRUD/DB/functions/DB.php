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

    function addProduct($productName){ 
        $productName = trim($productName);
        $productName = stripslashes($productName);
        $productName = htmlspecialchars($productName);
        $query = "INSERT INTO products SET name = '$productName'";
        $result = executeQuery($query);
        return $result;
    }
    
?>