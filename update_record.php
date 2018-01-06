<?php 
include('header.php');

if(isUserLoggedIn()) {  }else{header("Location: index.php"); die();}


//$updateid = $loggedInUser->user_id;

echo $updateid = $_GET['bill_id'];

if(isset($_POST['update'])){

$billing_id = $_POST['billing_id'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$shipping_address = $_POST['shipping_address'];
$pin_code = $_POST['pin_code'];

$ok = UpdateBill($billing_id,$name,$address,$email,$phone,$shipping_address,$pin_code);
if($ok){
header('location:cart_detail.php');
}
}


$record =  SelectUser($updateid);
print_r($record);
foreach($record as $records)
{
?>

<section class="main">
<div class="container">
<div class="row">
<div class="margin-top">

<div class="login-form"><!--login form-->
						<h2>Update Billing Info</h2>
						<form action="" method="post">

<input type="text" placeholder="Billing Id" value="<?php echo $records['billing_id'];?>" name="billing_id">

<input type="text" placeholder="Name" value="<?php echo $records['name'];?>" name="name">

<input type="text" placeholder="address" value="<?php echo $records['address'];?>" name="address">


<input type="text" placeholder="email" value="<?php echo $records['email'];?>" name="email">

<input type="text" placeholder="phone" value="<?php echo $records['phone'];?>" name="phone">


<input type="text" placeholder="Total Amount" value="<?php echo $records['total_amount'];?>" readonly="readonly">

<input type="text" placeholder="Shipping Address" value="<?php echo $records['shipping_address'];?>" name="shipping_address">

<input type="text" placeholder="Pin Code" value="<?php echo $records['pin_code'];?>" name="pin_code">
							
<button class="btn btn-default" type="submit" name="update">Update</button>
						</form>
					</div>
					
					
</div>
</div>
</div>
</section>

<?php }?>
<?php include('footer.php');?>