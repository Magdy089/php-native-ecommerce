<?php

$name=$_POST['name'];
$price=$_POST['price'];
$sale=$_POST['sale'];
$description=$_POST['description'];
$cat_id=$_POST['cat_id'];
// $img=$_POST['img'];


$files=[];
$count=count($_FILES['img']['name']);
for($i=0; $i<$count ;  $i++){
    $imgName =$_FILES['img']['name'][$i];
    $tmp =$_FILES['img']['tmp_name'][$i];
    $error= $_FILES['img']['error'][$i];
    $size= $_FILES['img']['size'][$i];




// if there img uploaded;
if($error==0){
    $extintion=['jpg' , 'gif' , 'png' , 'jpeg'];
    $ext= pathinfo($imgName , PATHINFO_EXTENSION);
    
    if(in_array($ext , $extintion)){
            if($size<2000000){
            $newName=md5(uniqid()).".".$ext;
            move_uploaded_file($tmp , "../../imgs/$newName");
            $files[]=$newName;
    }else{
            echo "this img too big";
        
    }
            
        }else{
            echo "not found extionsion";
        }
    // if size_img 
    
    
}else{
    echo "you must uploaded img";
    exit;
}
};





include_once "../connection.php";

// die;
$insert="INSERT INTO products
(name , price , sale , description , cat_id )
VALUE
('$name' , '$price' , '$sale' , '$description' , '$cat_id')


";

$query= $conn-> query($insert);
 
if($query){
    $product_id=$conn-> insert_id;
    foreach($files as $file){
        $insert_img="INSERT INTO images
        (product_id , name)
        VALUE
        ('$product_id' , '$file')
        ";
        $query_img=$conn->query($insert_img);

        header("location:../../products.php");
    }

}else{
    echo $conn->error;
}







?>