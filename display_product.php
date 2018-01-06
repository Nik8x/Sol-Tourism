<?php 
include('header.php');
$allproducts =  fetchAllProducts();


?>

<section class="main">

<div class="container">

<div class="row margin-top">


  <table class="table table-condensed table-bordered all_product">
				
					
						  	<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
                            <td>Image</td>
                            <td>Name</td>
							<td class="price">Description</td>
							<td class="quantity">Price($)</td>
							<td>Category</td>
                            <td>Sub Category</td>
                            <td>Delete</td>
                            <td>Edit</td>


							
							<td></td>
                            <td></td>
						</tr>
					</thead>
					<tbody>
		<?php  
		$n = 1;
		foreach($allproducts as $productdetails){ ?>

			
            <tr bgcolor="#FFFFFF">
              <td><?php echo $n++;?></td>
			  <td><img style="width:100px;" src="<?php echo $productdetails['new_file_name'];?>"></td>
              <td><?php echo $productdetails['product_name'];?></td>
			  <td><?php echo $productdetails['product_description'];?></td>
              <td><?php echo $productdetails['price'];?></td>
              <td><?php echo $productdetails['product_category'];?></td>
              <td><?php echo $productdetails['product_sub_category'];?></td>
              <td style="text-align: center;">

			  <a class="remove_product" href="product_delete.php?pid=<?php echo $productdetails['product_id'];?>">
			<img src="img/delete.png"/>
			  </a>
              </td>
              <td>
			  
			  <a class="remove_product" href="product_edit.php?pid=<?php echo $productdetails['product_id'];?>">
			 <img src="img/edit.png"/>
			  </a>
			  
			  </td>
            </tr>
            				
                 
						
					</tbody>
					
<?php } ?>
				</table>
<?php //} ?>

</div>

</div>

</section>

<?php include('footer.php');?>