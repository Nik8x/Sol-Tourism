<?php 
include('header.php');
if(isUserLoggedIn()) {  }else{header("Location: index.php"); die();}

$user_id = $loggedInUser->user_id;
$record = get_oder_detail($user_id);
//print_r(count($record));


?>

<section class="main">
<div class="container">
<div class="row">
<div class="margin-top">
<?php if(empty($record)){ ?>
<p class="text-center no_item">There are no trips For Billing Information!</p>
<p class="text-center con_shopping"><a href="index.php" class="btn1">Look For More Destinations</a></p>
<?php }else{ ?>

<table class="table table-condensed table-bordered">
<thead>
<tr class="cart_menu">
<td>Bill Id</td>
<td>Name</td>
<td>Address</td>
<td>Email</td>
<td>Phone</td>
<td>Total Amount</td>
<td>Shipping Address</td>
<td>Pin Code</td>
<td>Edit</td>
<td>Delete</td>
</tr>
</thead>



<tbody>
<?php foreach($record as $records)
{ ?>
<tr>
<td><?php print $records['billing_id'];?></td>
<td><?php echo $records['name'];?></td>
<td><?php echo $records['address'];?></td>
<td><?php echo $records['email'];?></td>
<td><?php echo $records['phone'];?></td>
<td><?php echo $records['total_amount'];?></td>
<td><?php echo $records['shipping_address'];?></td>
<td><?php echo $records['pin_code'];?></td>





<td style="text-align:center;">
<a href="update_record.php?bill_id=<?php print $records['billing_id'];?>">
<i class="fa  fa-pencil" aria-hidden="true"></i></a></td>
<td>
<a href="delete_bill.php?bill_id=<?php print $records['billing_id'];?>">
<i class="fa fa-times" aria-hidden="true"></i></a></td>

</tr>
<?php } ?>
</tbody>
</table>
<?php } ?>
</div>
</div>
</div>
</section>


<?php include('footer.php');?>