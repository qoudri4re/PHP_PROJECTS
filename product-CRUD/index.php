<?php 
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
    <h1>Products</h1>
    <?php $records = getProducts(); ?>
    <?php if ($records && mysqli_num_rows($records) > 0): ?>
        
        <table>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        <?php while( $row = mysqli_fetch_assoc($records)): ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><a href="index.php?edit=<?php echo $rows['id']?>"></a></td>
                <td><a href="index.php?delete=<?php echo $rows['id']?>"></a></td>
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
        
        <input type="text" name="product-name" id="" value="<?php if(isset($_POST['product-name'])) echo $_POST['product-name']; ?>" placeholder="product name">
        <input type="submit" value="Add" name="add-btn">
    </form>

</body>
</html>

