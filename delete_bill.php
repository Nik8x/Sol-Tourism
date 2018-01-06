<?php 
include('header.php');
$bill_id = $_GET['bill_id'];
$delete = deleteBill($bill_id);
if($delete)
{
header('location:cart_detail.php');
}

?>