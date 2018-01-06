<?php 
include('header.php');
$pid = $_GET['pid'];
$delete = deleteProduct($pid);
if($delete)
{
header('location:display_product.php');
}

?>