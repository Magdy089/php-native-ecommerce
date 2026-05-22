<?php
$id=$_POST['id'];
$name=$_POST['name'];
$price=$_POST['price'];
$sale=$_POST['sale'];
$description=$_POST['description'];
$cat_id=$_POST['cat_id'];

include_once "../connection.php";
$update="UPDATE products SET 
name='$name',
price='$price',
sale='$sale',
description='$description',
cat_id='$cat_id'
WHERE id='$id'

";
$query=$conn-> query($update);
if($query){
    header("location: ../../products.php");
}else{
    echo $conn-> error;
}


?>