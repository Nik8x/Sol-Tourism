<?php
include('header.php');
if(isset($_POST['submit']))
{
if($_FILES['new_file_name']['name'])
{
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_description = $_POST['product_description'];
$price  = $_POST['price'];
$product_category = $_POST['product_category'];
$product_sub_category = $_POST['product_sub_category'];
$uploaddir = 'product_img/';
$uploadfile = $uploaddir . basename($_FILES['new_file_name']['name']);
move_uploaded_file($_FILES['new_file_name']['tmp_name'], $uploadfile);
$b = update_product_withimg($product_id,$product_name,$product_description,$price,$product_category,$product_sub_category,$uploadfile);
if($b)
{
header('location:display_product.php');
}

}else{
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_description = $_POST['product_description'];
$price  = $_POST['price'];
$product_category = $_POST['product_category'];
$product_sub_category = $_POST['product_sub_category'];
$a = update_product($product_id , $product_name,$product_description,$price,$product_category,$product_sub_category);

if($a)
{
header('location:display_product.php');
}
}
}
?>