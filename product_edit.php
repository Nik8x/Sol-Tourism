<?php 
include('header.php');
$product_id = $_GET['pid'];
$record =  SelectProduct($product_id);

foreach($record as $records)
{
?>
<section class="main">
<div class="container">
<div class="row">
<h2>Update Product Detail</h2>
</div>
<div class="row">
<div class="login-form">
<form method="post" action="update_product.php" enctype="multipart/form-data">
Product Id
<input type="text" name="product_id" value="<?php echo $records['product_id'];?>" readonly="readonly"/>

Product Name

<input type="text" name="product_name" value="<?php echo $records['product_name'];?>"/>

Price($)
<input type="text" name="price" value="<?php echo $records['price'];?>"/>

Product Description
 <input type="text" name="product_description" value="<?php echo $records['product_description'];?>"/>
 
 Product Category

 <?php $product_category =  $records['product_category'];?>
<div class="form-group">
<select name="product_category" class="form-control">
<option value="Mercury" <?php if($product_category=="Mercury"){ echo "selected";}?>>Mercury</option>
<option value="Venus" <?php if($product_category=="Venus"){ echo "selected";}?>>Venus</option>
<option value="Luna" <?php if($product_category=="Luna"){ echo "selected";}?>>Luna</option>
<option value="Mars" <?php if($product_category=="Mars"){ echo "selected";}?>>Mars</option>
<option value="Jupiter" <?php if($product_category=="Jupiter"){ echo "selected";}?>>Jupiter</option>
<option value="Saturn" <?php if($product_category=="Saturn"){ echo "selected";}?>>Saturn</option>
<option value="Uranus" <?php if($product_category=="Uranus"){ echo "selected";}?>>Uranus</option>
<option value="Neptune" <?php if($product_category=="Neptune"){ echo "selected";}?>>Neptune</option>
<option value="Inner Belt" <?php if($product_category=="Inner Belt"){ echo "selected";}?>>Inner Belt</option>
<option value="Kuiper Belt" <?php if($product_category=="Kuiper Belt"){ echo "selected";}?>>Kuiper Belt</option>
</select>
</div>

Product Sub Category
 <input type="text" name="product_sub_category" value="<?php echo $records['product_sub_category'];?>"/>
 
 
<img src="<?php echo $records['new_file_name'];?>" style="height:100px;"/>
<input type="file" name="new_file_name" style="background:transparent;"/>
<button type="submit" name="submit" >Submit</button>
</form>
</div>
</div>
</div>
</section>
<?php
}
?>