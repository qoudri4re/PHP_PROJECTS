<?php 
    session_start();
    require 'DB/functions/DB.php';
    require 'controller/product.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (isset($_SESSION['message'])):?>
        <p><?php echo $_SESSION['message']; unset($_SESSION['message']);?></p>
    <?php endif;?>    
    <h1>Products</h1>
    <?php $records = getProducts(); ?>
    <?php if ($records && mysqli_num_rows($records) > 0): ?>
        
        <table>
            <tr>
                <td>S/N</td>
                <td>Name</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            <?php $counter = 0;?>
        <?php while( $row = mysqli_fetch_assoc($records)): ?>
            <tr>
                <td><?php $counter += 1;echo $counter;?></td>
                <td><?php echo $row['name'];?></td>
                <td><a href="index.php?edit=<?php echo $row['id']?>">edit</a></td>
                <td><a href="index.php?delete=<?php echo $row['id']?>">delete</a></td>
            </tr>
            
        <?php endwhile; ?>
        </table>
    <?php elseif ($records && mysqli_num_rows($records) == 0): ?>    
            <p>No product available, add new product</p>
    <?php else: ?>        
             <p>Something went wrong, <?php echo mysqli_error($connection)?></p>
    <?php endif;?>         
       
    
    <form action="index.php" method="post">
        <p>Add New Product</p>
        <?php if (count($errors) > 0): ?>
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error;?></p>
            <?php endforeach;?>
        <?php endif;?>
        

         <?php if (isset($product_name)):?> 
            <input type="text" name="update-product-name" value="<?php echo $product_name;?>" id="">
            <input type="text" name="update-id" id="" value="<?php echo $product_id;?>" hidden>
            <input type="submit" value="Update" name="update">
         <?php else:?>
            <input type="text" name="product-name" id="" value="<?php if(isset($_POST['product-name'])) echo $_POST['product-name']; ?>" placeholder="product name">
            <input type="submit" value="Add" name="add-btn">
        <?php endif;?>
    </form>

</body>
</html>

