<?php require 'DB/functions/DB.php';?>
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
        <?php $rows = mysqli_fetch_assoc($records)?>
        <?php foreach($rows as $key): ?>
            <p><?php echo $key;?></p>
        <?php endforeach; ?>
    <?php elseif ($records && mysqli_num_rows($records) == 0): ?>    
            <p>No product available</p>
    <?php else: ?>        
             <p>Something went wrong, <?php echo mysqli_error($connection)?></p>
    <?php endif;?>         
       

</body>
</html>

