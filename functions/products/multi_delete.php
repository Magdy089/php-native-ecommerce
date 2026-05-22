<?php
$ids=$_POST['ids'];

include_once "../connection.php";

    if(isset($ids)){
    $delete_select=implode(',',$ids);
    $delete="DELETE FROM products WHERE id IN($delete_select)";
    $query=$conn->query($delete);
    
    if($query){
        header("location: ../../products.php");
    }else{
        echo $conn->error;
    }
}


?>