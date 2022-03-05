<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  
            include 'includes/num_of_course_form.php';
        
    ?>
    <?php include 'controller/process.php';?>
    <?php if(!empty($errors)) { 
        foreach (array_unique($errors) as $error) {
            echo '<p>'.$error.'</p>';
        }
    }?>
    
    <?php if (count($result) > 0) {
        foreach ($result as $key) { ?>
            <p><?php echo $key?></p>
        <?php }?>
    <?php }?>    

    <?php if (isset($num_table_rows)) { ?>
       <form action="index.php" method="post">
        <table>
            <tr>
                <td>S/N</td>
                <td>Course Code</td>
                <td>Course Unit</td>
                <td>Course Grade</td>
            </tr>
       <?php for ($i=0; $i < $num_table_rows; $i++) { ?>
            <tr>
                <td><?php echo $i + 1;?></td>
                <td><input type="text" name="course_code-<?php echo $i + 1;?>" id="" value="<?php if(isset($_POST['course_code-'.strval($i +1)])) echo $_POST['course_code-'.strval($i +1)]; ?>"></td>
                <td><input type="text" name="course_unit-<?php echo $i + 1;?>" id="" value="<?php if(isset($_POST['course_code-'.strval($i +1)])) echo $_POST['course_unit-'.strval($i +1)]; ?>"></td>
                <td><input type="text" name="course_grade-<?php echo $i + 1;?>" id="" value="<?php if(isset($_POST['course_code-'.strval($i +1)])) echo $_POST['course_grade-'.strval($i +1)]; ?>"></td>
            </tr>
       <?php } ?>
       </table>
       <input type="submit" name= 'calculate'value="Calculate">
       <input type="text" name="num_table_rows" id="" value="<?php echo $num_table_rows; ?>" hidden>
      </form> 
    <?php }?>
</body>
</html>