<?php 
//message when adding deleting
    $errors = [];
    if (isset($_POST['add-btn'])) {
        if (empty($_POST['product-name'])) {
            $errors[] = 'Enter product name';
        } else {
            $result = addProduct($_POST['product-name']);
            unset($_POST['product-name']);
            if (!$result) {
                echo 'something went wrong'; //. mysqli_error($connection);
            } 
        }
    }
?>