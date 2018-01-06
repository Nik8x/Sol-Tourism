<?php
include('header.php');

if($_REQUEST)
{

if($_REQUEST['command']=='delete'){
  remove_product($_REQUEST['pid']);
}
else if($_REQUEST['command']=='clear'){
  unset($_SESSION['shoppingCart']);
}
else if($_REQUEST['command']=='update'){

  $max=count($_SESSION['shoppingCart']);
  //print $max;
  for($i=0;$i<$max;$i++){
    $pid=$_SESSION['shoppingCart'][$i]['product_code'];
    //print $pid;
    $variablevalue = 'product'.$pid;
   // print $variablevalue;
    $q= intval($_REQUEST['product'.$pid]);
    //print $q;

    if($q>0 && $q<=999){
      $_SESSION['shoppingCart'][$i]['qty']=$q;
    }

    else{
      $errors = array();
      $errors[]='Some proudcts not updated!, quantity must be a number between 1 and 999';
    }
  }
}
}

?>

<title>Your Destinations</title>


<script language="javascript">
	function del(pid){
      if(confirm('Do you really mean to delete this trip')){
        document.form1.pid.value=pid;
        document.form1.command.value='delete';
        document.form1.submit();
      }
    }

    function clear_cart(){
      if(confirm('This will empty your Destinations, continue?')){
        document.form1.command.value='clear';
        document.form1.submit();
      }
    }

    function update_cart(){
      document.form1.command.value='update';
      document.form1.submit();
    }


</script>



<section class="main">
<div class="container">

<div class="row">
<h3 class="title text-center">Your Destinations</h3>
</div>

<div class="row">
<form name="form1" method="post">

<input type="hidden" name="pid" />
<input type="hidden" name="command" />
<table class="table table-condensed">
				
					
				<?php
if(empty($_SESSION['shoppingCart'])){echo "<p class='text-center no_item'>There is no Destinations currently!</p>";
echo "<p class='text-center con_shopping'><a class='btn1' href='main.php'>Look For More Destinations</a></p>";

echo "<p class='text-center con_shopping'><a href='main.php'><img src='img/cart.gif' /></a></p>";


}else{
        if(is_array($_SESSION['shoppingCart'])){
          ?>
		  	<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Name</td>
							<td class="quantity">Price</td>
							<td class="total">Quantity</td>
							<td>Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php


          $max=count($_SESSION['shoppingCart']);

          for($i=0;$i<$max;$i++){
		   	
            $pid=$_SESSION['shoppingCart'][$i]['product_code'];
            $q=$_SESSION['shoppingCart'][$i]['qty'];
            $pname=get_product_name($pid);
			$pimage=get_product_image($pid);
			
            ?>

            <tr bgcolor="#FFFFFF">
              <td><?php print $i+1; ?></td>
			  <td><img src="<?php echo $pimage;?>" style="width:100px;"/></td>
              <td><?php print $pname; ?></td>
              <td>$ <?php print get_price($pid); ?></td>
              <td><input type="text" name="product<?php print $pid; ?>" value="<?php print $q; ?>" maxlength="3" size="2" /></td>
              <td>$ <?php print get_price($pid)*$q; ?></td>
              <td style="text-align: center;"><a href="javascript:del('<?php print $pid; ?>')" class="remove_product">
			  <i class="fa fa-times"></i>
			  </a></td>
            </tr>
            <?php
          }
          ?>
				<tr>
                <td class="total_order" colspan="3"><span>Order Total: $<?php print get_order_total(); ?></span>
				 <a class="btn_a" href="main.php">Look For More Destinations</a></td>
				
                <td colspan="4" align="right"><input type="button" class="btn1" value="Clear Destination" onClick="clear_cart()">
                  <input type="button" class="btn1" value="Update Destination" onClick="update_cart()">
                 <!-- <input type="button" class="btn1" value="Place Order" onClick="window.location='login.php'">-->
				 
             <?php if(isUserLoggedIn()){?>
<input type="button" class="btn1" value="Place Order" onClick="window.location='billing.php'"><?php } else {?>
			 <input type="button" class="btn1" value="Place Order" onClick="window.location='login.php'">
			 <?php }  ?>
			    </td>
				
				</tr>
          <?php
        }
        else{
        //  echo "<tr><td class='no_item'><span>There is no Destination currently!</span></td>";
        }
		}
        ?>
       
						
					</tbody>
				</table></form>
				
	</div></div>	</section>		
