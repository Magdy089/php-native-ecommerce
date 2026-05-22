<?php
$id=$_POST['id'];
$username=$_POST['username'];
$email=$_POST['email'];
$adresse=$_POST['adresse'];
$password=md5($_POST['password']) ;
$gender=$_POST['gender'];
$prive=$_POST['priv'];

include_once "connection.php";

// logic password start
if(!empty($_POST['password'])){
$pass=md5($_POST['password']);
$pass_update="UPDATE users SET password='$password' WHERE id=$id";
$query_pass=$conn-> query($pass_update);

}

// logic password end




 $update="UPDATE users SET
 username='$username',
 Email='$email',
 adresse='$adresse',
 rgender='$gender',
 priv_num='$prive'
 WHERE id=$id
 
 
 ";
 $query= $conn-> query($update);

 if($query){
    header("location:../users.php");
 }else{
    echo $conn-> error;
 }



?>