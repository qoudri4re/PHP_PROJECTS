<?php 
    
    $errors = [];
    $product_name;
    $product_id;

    if (isset($_POST['add-btn'])) {
        if (empty($_POST['product-name'])) {
            $errors[] = 'Enter product name';
        } else {
            $result = addProduct($_POST['product-name']);
            unset($_POST['product-name']);
            unset($_POST['add-btn']);
            $_SESSION['message'] = 'Product added';
            if (!$result) {
                echo 'something went wrong'; //. mysqli_error($connection);
            } 
        }
    }

    if (isset($_GET['delete'])) {
        $result = deleteProduct($_GET['delete']);
        if ($result) {
            $_SESSION['message'] = 'Product deleted';
        } else {
            echo 'something went wrong'; //. mysqli_error($connection);
        }
    }

    if (isset($_GET['edit'])) {
        $record = getProductById($_GET['edit']);
        $row = mysqli_fetch_assoc($record);
        if ($record) {
            $product_name = $row['name'];
            $product_id = $_GET['edit'];
        }
    }

    if (isset($_POST['update'])) {
        $result = updateProduct($_POST['update-id'],$_POST['update-product-name']);
        if ($result) {
            $_SESSION['message'] = 'Product updated';
        }
    }
?>