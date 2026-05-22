<?php

session_start();

$username=$_POST['username'];
$email=$_POST['email'];
$adresse=$_POST['adresse'];
$password=$_POST['password'] ;
$gender=$_POST['gender'];
$prive=$_POST['priv'];



// valdtion;
$errors=[];
if(empty($username)){
    $errors['username']='<div class="alert alert-danger">wrong the username</div>';
}
if(empty($email)){
    $errors['email']='<div class="alert alert-danger">wrong the email</div>';
}
if(empty($password)){
    $errors['password']='<div class="alert alert-danger">wrong the password</div>';
}
if(empty($adresse)){
    $errors['adresse']='<div class="alert alert-danger">wrong the adresse</div>';
}
// if(empty($gender)){
//     $errors['gender']='<div class="alert alert-danger">wrong the gender</div>';
// }
// if(empty($prive)){
//     $errors['prive']='<div class="alert alert-danger">wrong the priv</div>';
// }

if(!empty($errors)){
    $_SESSION['errors']=$errors;
    $_SESSION['old']=$_POST;
    header("location: ../users.php?action=add");
    exit;
}

$password=md5($_POST['password']);






include_once "connection.php";
$insert="INSERT INTO users
(username , email , password , adresse , rgender , priv_num)
VALUE
('$username' , '$email' , '$password', '$adresse' , '$gender' , '$prive')

";
$query= $conn-> query($insert);
if($query){
    header("location:../users.php");
}else{
    echo $conn-> error;
}



?>