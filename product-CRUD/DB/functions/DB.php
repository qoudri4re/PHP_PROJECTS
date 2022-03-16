<?php 
    require 'paths.php';
    require 'DB/connection.php';

    function sanitize($data){ 
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
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
        $productName = sanitize($productName);
        $query = "INSERT INTO products SET name = '$productName'";
        $result = executeQuery($query);
        return $result;
    }
    
    function deleteProduct($productId){ 
        $productId = sanitize($productId);
        $query = "DELETE FROM products WHERE id = '$productId'";
        $result = executeQuery($query);
        return $result;
    }
    function getProductById($id){ 
        $id = sanitize($id);
        $query = "SELECT * FROM products WHERE id = '$id'";
        $result = executeQuery($query);
        return $result;
    }
    function updateProduct($id, $productName){ 
        $query = "UPDATE products SET name = '$productName' WHERE id = '$id'";
        $result = executeQuery($query);
        return $result;
    }
?>