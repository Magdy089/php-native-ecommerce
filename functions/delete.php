<?php
include_once "connection.php";

$id=$_GET['id'];
$delet="DELETE FROM users WHERE id= $id";
$query= $conn-> query($delet);

if($query){
    header("location: ../users.php");
}else{
    $conn->error;
}


?>