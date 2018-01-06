<?php
include("header.php");
if(isUserLoggedIn()) {  }else{header("Location: login.php"); die();}



if(isset($_POST['order']))
{
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$userid = $loggedInUser->user_id;
$total = get_order_total();

$shipping_address = $_POST['shipping_address'];
$pin_code = $_POST['pin_code'];
$card_no = $_POST['card_no']; 
$ex_date = $_POST['ex_date'];
$cvc = $_POST['cvc'];


$ok = createBill($name,$address,$email,$phone,$userid,$total,$shipping_address,$pin_code,$card_no,$ex_date,$cvc);
if($ok)
{
destroySession("shoppingCart");
header('location:index.php');
}

}
?>
<section class="main">
<div class="container">

<div class="login-form">

<?php 
if(!empty($_SESSION['shoppingCart'])){
?>
<form name="billing" action="" method="post">


<!--<input type="hidden" value="M=<?php //echo $loggedInUser->user_id; ?>" name="userid"/>-->
	<div class="row">
        <h2>Billing Information</h2>
        
		
		<div class="col-md-4">
		
		
			<input type="text" value="Order Total : $<?php echo get_order_total()?>" readonly="readonly"/>
			<input type="text" name="name" placeholder="Enter Name" />
			<input type="text" name="address" placeholder="Address"/>
			<input type="text" name="email" placeholder="email"/>
			<input type="text" name="phone" placeholder="Phone"/>
			
			</div>
		
		<div class="col-md-4">
		
		 <h2>Shiping Information</h2>
			
			<input type="text" name="shipping_address" placeholder="Enter Shipping Address"/>
			
			
			<input type="text" name="pin_code" placeholder="Enter Pin Code"/>
			
			
			</div>
		
		<div class="col-md-4">
		
		 <h2>Credit Card information</h2>
			<input type="text" name="card_no" placeholder="Enter Card No"/>
			
			<input type="text" name="ex_date" placeholder="Enter Ex. Date"/>
			<input type="text" name="cvc" placeholder="Enter cvc"/>
			</div>
		
		</div>
		<div class="row text-center">
		<button class="btn btn-default pull-right" type="submit" name="order">Place Order</button>
		</div>
		 
		 
	
	
</form>
<?php }else{ ?>
<div class="row">
<h3 class="title text-center">Your Destinations</h3>
</div>
<p class="text-center no_item">There are no trips For Billing Information!</p>
<p class="text-center con_shopping"><a href="main.php" class="btn1">Look For More Destinations</a></p>
<?php }
?>			
			
</div>
</div>
</section>
<?php include('footer.php');?>
