<?php
include_once "../connection.php";
$id=$_GET['id'];
$delte="DELETE FROM products WHERE id=$id";
$query= $conn->query($delte);

if($query){
    header("location: ../../products.php");
}else{
    echo $conn->error;
}


?>