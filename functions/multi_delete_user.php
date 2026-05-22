<?php


$ids=$_POST['ids'];
include_once "connection.php";


    if(isset($ids)){
    $select_delete=implode(',' , $ids);
    $delete="DELETE FROM prevtions WHERE user_id IN($select_delete)";
    $conn-> query($delete);
    $delete_user="DELETE FROM users WHERE id IN($select_delete)";
    $query=$conn->query($delete_user);
    if($query){
        header("location: ../users.php");
    }else{
        echo $conn-> error;
    }
}









?>