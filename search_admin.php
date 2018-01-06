<?php include('header.php');
$p_cat =  $_GET['p_cat'];
?>
<?php 

//Forms posted
	if(!empty($_POST)) {
		$errors = array();

		if (isset($_POST["type"]) && $_POST["type"] == 'add' && $_POST["product_qty"] > 0) {
			$product_code=$_POST['product_code'];
			$product_qty = $_POST['product_qty'];
			// function add / append an item to the cart
			 addtocart($product_code,$product_qty);
			
		}
	} else {
		$errors[] = "quantity = 0 / something went wrong";
	}


?>

<section class="main"> 
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="container"> 
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-3">
        <div class="left-sidebar">
          <h2>Category</h2>
          <div class="panel panel-default">
            <div class="panel-body">
			
		 
             
              <?php $category = fetchAllSubCategory($p_cat);
		 
		 
		 foreach($category as $categories)
		  {
		  ?>
              <p class="cat_name"><a href="search_sub_category.php?p_cat=<?php echo $p_cat;?>&sub_category=<?php echo $categories['product_sub_category'];?>"><?php echo $categories['product_sub_category'];?> </a></p>
              <?php
		  
		 }?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="brands_products">
          <h2 class="title text-center">Featured Destinations</h2>
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <?php $allProduct = fetchSearchProductDetails($p_cat);
	foreach ($allProduct as $allProducts){
	
	
	?>
                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                  <div class="col-sm-6 col-md-4">
                    <div class="thumbnail product_thumb productinfo text-center"> <img src="<?php echo $allProducts['new_file_name']; ?>" alt="...">
                      <div class="caption">
                        <h2>$<?php echo $allProducts['price'];?></h2>
                        <p><?php echo $allProducts['product_name']; ?></p>
                        <p><?php echo $allProducts['product_description']; ?></p>
						
						
						
                      </div>
                    </div>
                  </div>
                </form>
                <?php
	}
	?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /container --> 
</section>
<?php include('footer.php');?>
