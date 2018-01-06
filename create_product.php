<?php 
include('header.php');
if(isUserLoggedIn()) {  }else{header("Location: logout.php"); die();}



?>
<section class="main">
<div class="container">
<div class="row">


<h3 class="success">
<?php 
if(isset($_GET['ss']))
{
echo $msg = "Product Add Successfully";	
}
?></h3>

<div class="login-form"><!--login form-->
<h2>Create Destination</h2>


<form method="post" action="processUpload.php" enctype="multipart/form-data">

<input type="text" name="product_name" placeholder="Product Name"/>

<input type="text" name="product_description" placeholder="Product Description" />

<!--<input type="text" name="product_category" placeholder="Product Category"/>-->

<div class="form-group">
<select name="product_category" class="form-control">
<option>--Select Category--</option>
<option value="Mercury">Mercury</option>
<option value="Venus">Venus</option>
<option value="Luna">Luna</option>
<option value="Mars">Mars</option>
<option value="Jupiter">Jupiter</option>
<option value="Saturn">Saturn</option>
<option value="Uranus">Uranus</option>
<option value="Neptune">Neptune</option>
<option value="Inner Belt">Inner Belt</option>
<option value="Kuiper Belt">Kuiper Belt</option>
</select>
</div>

<input type="text" name="product_sub_category" placeholder="Product SubCategory"/>


<input type="text" name="price" placeholder="Product Price"/>



<input type="file" name="galleryImage" style="background:transparent;"/>

<button type="submit" name="submit" class="btn btn-default" >Submit</button>

</form>
		
		
					
</div>
					
					
</div>

</div>

</section>
<?php include('footer.php');?>