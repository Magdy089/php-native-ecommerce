<?php
session_start();
$username=$_POST['username'];
$password=md5($_POST['password']);
$remmber=$_POST['remember'];
include_once "connection.php";
$select="SELECT * FROM users WHERE username='$username' AND password='$password'";
$query=$conn-> query($select);

if($query-> num_rows >0){
    $user=$query-> fetch_assoc();
    $id=$user['id'];
    $_SESSION['login_id']=$id;
    

        // premmision;
        $select_priv="SELECT * FROM prevtions WHERE user_id='$id'";
        $query_priv=$conn-> query($select_priv);
        if($query_priv-> num_rows>0){
            $priv=$query_priv-> fetch_assoc();
            $_SESSION['user_role']=$priv['priv_num'];
        }else{
            $_SESSION['user_role']=2;
        }

    if(!empty($remmber)){
        $token=md5(uniqid());
        $update="UPDATE users SET token='$token' WHERE id=$id";
        $query_token=$conn-> query($update);
        setcookie('token_name' , $token ,time()+ 30 * 24 * 60 *60);
    }
    header("Location: ../index.php");
    exit;
}else{
    $_SESSION['login_error']="<div class='alert alert-danger'> Wrong username or password</div>";
    header("location:../login.php");
    exit;
}


?>