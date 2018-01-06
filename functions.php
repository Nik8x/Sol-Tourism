<?php 
//Generate a unique code
function getUniqueCode($length = "") {
  $code = md5(uniqid(rand(), TRUE));
  if ($length != "") {
    return substr($code, 0, $length);
  }
  else {
    return $code;
  }
}



//$plainText = getUniqueCode(15);
//echo $plainText;


function generateHash($plainText, $salt = NULL) {
  if ($salt === NULL) {
    $salt = substr(md5(uniqid(rand(), TRUE)), 0, 25);
  }
  else {
    $salt = substr($salt, 0, 25);
  }

  return $salt . sha1($salt . $plainText);
}




/*======== get category========*/
function fetchAllCategory()
{
 global $mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT DISTINCT
		product_category
		FROM ".$db_table_prefix."products
		");

  $stmt->execute();
  $stmt->bind_result($product_category);
  
  $count_row = $stmt->num_rows;
//if($count_row==0){ return $row = 0;}else{

  while ($stmt->fetch()){
    $row[] = array('product_category' => $product_category);
  }
  $stmt->close();
  return ($row);
}

//}


/*======== get cub category========*/
function fetchAllSubCategory($p_cat)
{
	

	global $mysqli,$db_table_prefix;
   $stmt = $mysqli->prepare("SELECT DISTINCT
		product_sub_category
		FROM ".$db_table_prefix."products
		WHERE
		product_category = ?
		");
  $stmt->bind_param("s", $p_cat);

//print_r($stmt);
  $stmt->execute();
  $stmt->bind_result($product_sub_category);
  $count_row = $stmt->num_rows;

  while ($stmt->fetch()){
    $row[] = array(
	'product_sub_category'=>$product_sub_category
	);
  }
  $stmt->close();
  return ($row);

  
}



/*===== create usr=====*/
function createNewUser($username, $firstname, $lastname, $email, $password){


		global $mysqli, $db_table_prefix;
  //Generate A random userid

  @$character_array = array_merge(range(a, z), range(0, 9));
  $rand_string = "";
  for ($i = 0; $i < 6; $i++) {
    $rand_string .= $character_array[rand(
        0, (count($character_array) - 1)
    )];
  }
  
   $newpassword = generateHash($password);

 $stmt = $mysqli->prepare(
      "INSERT INTO " . $db_table_prefix . "UserDetails (
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		Password,
		MemberSince,
		Active
		)
		VALUES (
		'" . $rand_string . "',
		?,
		?,
		?,
		?,
		?,
        '" . time() . "',
        1
		)"
  );
  $stmt->bind_param("sssss", $username, $firstname, $lastname, $email, $newpassword);
  //print_r($stmt);
  $result = $stmt->execute();
  //print_r($result);
  $stmt->close();
  return $result;
}



//Retrieve complete user information by username
function fetchUserDetails($username) {
  global $mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		Password,
		MemberSince,
		Active,
		role
		FROM ".$db_table_prefix."UserDetails
		WHERE
		UserName = ?
		LIMIT 1");
  $stmt->bind_param("s", $username);

  $stmt->execute();
  $stmt->bind_result($UserID, $UserName, $FirstName, $LastName, $Email, $Password, $MemberSince, $Active,$role);
  while ($stmt->fetch()){
    $row = array('UserID' => $UserID,
      'UserName' => $UserName,
      'FirstName' => $FirstName,
      'LastName' => $LastName,
      'Email' => $Email,
      'Password' => $Password,
      'MemberSince' => $MemberSince,
      'Active' => $Active,
	  'role'=>$role);
  }
  $stmt->close();
  return ($row);
}


//Check if a user is logged in
function isUserLoggedIn() {
  global $loggedInUser,$mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT
		UserID,
		Password
		FROM ".$db_table_prefix."UserDetails
		WHERE
		UserID = ?
		AND
		Password = ?
		AND
		active = 1
		LIMIT 1");
  $stmt->bind_param("is", $loggedInUser->user_id, $loggedInUser->hash_pw);
  $stmt->execute();
  $stmt->store_result();
  $num_returns = $stmt->num_rows;
  $stmt->close();

  if($loggedInUser == NULL)
  {
    return false;
  }
  else
  {
    if ($num_returns > 0)
    {
      return true;
	 
    }
    else
    {
      destroySession("ThisUser");
      return false;
    }
  }
}


//Destroys a session as part of logout
function destroySession($name) {
  if(isset($_SESSION[$name]))
  {
    $_SESSION[$name] = NULL;
    unset($_SESSION[$name]);
  }
}

/*======== get product========*/
function fetchAllProduct()
{
 global $mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT
  		product_id,
		product_code,
		product_name,
		product_description,
		price,
		product_category,
		new_file_name
		FROM ".$db_table_prefix."products
		");

  $stmt->execute();
  $stmt->bind_result($product_id,$product_code,$product_name,$product_description,$price,$product_category,$new_file_name);
  
  $count_row = $stmt->num_rows;
//if($count_row==0){ return $row = 0;}
//else{
  while ($stmt->fetch()){
    $row[] = array(
	'product_id'=>$product_id,
	'product_code'=>$product_code,
	'product_name'=>$product_name,
	'product_description'=>$product_description,
	'price'=>$price,
	'product_category' => $product_category,
	'new_file_name'=>$new_file_name);
  }
  $stmt->close();
  return ($row);
//}
}

/*=============== search==============*/
function fetchSearchProductDetails($p_cat)
{

//echo $p_cat;

global $mysqli;
    $stmt = $mysqli->prepare(
    "
    SELECT
    product_id,
		product_code,
		product_name,
		product_description,
		price,
		product_category,
		new_file_name
	FROM products
    WHERE
    product_category = ?
	OR
	product_sub_category = ?
    "
    );
    $stmt->bind_param("ss", $p_cat,$p_cat);
    $stmt->execute();
    $stmt->bind_result($product_id,$product_code,$product_name,$product_description,$price,$product_category,$new_file_name);
    $stmt->execute();
	
	$stmt->store_result();
	$count_row = $stmt->num_rows;
	
	
	
	
  while ($stmt->fetch()) {
    $row[] = array(
    'product_id'=>$product_id,
	'product_code'=>$product_code,
	'product_name'=>$product_name,
	'product_description'=>$product_description,
	'price'=>$price,
	'product_category' => $product_category,
	'new_file_name'=>$new_file_name
	 
		
    );
  }
  $stmt->close();
  return ($row);
  
  
}

/************222**/
function fetchSearchProductDetails2($p_cat,$sub_category)
{

//echo $p_cat;

global $mysqli;
    $stmt = $mysqli->prepare(
    "
    SELECT
    product_id,
		product_code,
		product_name,
		product_description,
		price,
		product_category,
		new_file_name
	FROM products
    WHERE
    product_category = ?
	AND
	product_sub_category = ?
    "
    );
    $stmt->bind_param("ss", $p_cat,$sub_category);
    $stmt->execute();
    $stmt->bind_result($product_id,$product_code,$product_name,$product_description,$price,$product_category,$new_file_name);
    $stmt->execute();
	
	$stmt->store_result();
	$count_row = $stmt->num_rows;
	
	
	
	
  while ($stmt->fetch()) {
    $row[] = array(
    'product_id'=>$product_id,
	'product_code'=>$product_code,
	'product_name'=>$product_name,
	'product_description'=>$product_description,
	'price'=>$price,
	'product_category' => $product_category,
	'new_file_name'=>$new_file_name
	 
		
    );
  }
  $stmt->close();
  return ($row);
  
  
}

/*================*/
//Retrieve complete user information by username
function fetchThisProductDetails($product_code)
{

 global $mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT
		product_id,
		product_code,
		product_name,
		product_description,
		price
		FROM ".$db_table_prefix."products
		WHERE
		product_code = ?
		LIMIT 1");
  $stmt->bind_param("s", $product_code);

  $stmt->execute();
  $stmt->bind_result($product_id, $product_name, $product_description, $price , $product_code);
  
 
  
  while ($stmt->fetch()){
    $row = array('product_id' => $product_id,
        'product_code' => $product_code,
        'product_name' => $product_name,
        'product_description' => $product_description,
        'price' => $price
    );
  }
  $stmt->close();
  return ($row);
}


/*=========================*/

function get_product_name($product_code){
  global $mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT
		product_name
		FROM ".$db_table_prefix."products
		WHERE
		product_code = ?
		LIMIT 1");
  $stmt->bind_param("s", $product_code);

  $stmt->execute();
  $stmt->bind_result($product_name);
  while ($stmt->fetch()){
    $row = $product_name;
  }
  $stmt->close();
  return ($row);

}

/*===============*/
function get_product_image($pid){
 global $mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT
		new_file_name
		FROM ".$db_table_prefix."products
		WHERE
		product_code = ?
		LIMIT 1");
  $stmt->bind_param("s", $pid);

  $stmt->execute();
  $stmt->bind_result($new_file_name);
  while ($stmt->fetch()){
   $row = $new_file_name;
   
  }
  $stmt->close();
  return ($row);
 

}
/*========*/
function get_price($pid){
  global $mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT
		price
		FROM ".$db_table_prefix."products
		WHERE
		product_code = ?
		LIMIT 1");
  $stmt->bind_param("s", $pid);

  $stmt->execute();
  $stmt->bind_result($price);
  while ($stmt->fetch()){
    $row = $price;
  }

  $stmt->close();
  return ($row);



}
/*===========*/
function remove_product($pid){

  $max=count($_SESSION['shoppingCart']);
  for($i=0;$i<$max;$i++){
    if($pid==$_SESSION['shoppingCart'][$i]['product_code']){
      unset($_SESSION['shoppingCart'][$i]);
      break;
    }
  }
  $_SESSION['shoppingCart']=array_values($_SESSION['shoppingCart']);
}

/*=====================*/
function get_order_total(){
  $max=count($_SESSION['shoppingCart']);
  $sum=0;
  for($i=0;$i<$max;$i++){
    $pid=$_SESSION['shoppingCart'][$i]['product_code'];
    $q=$_SESSION['shoppingCart'][$i]['qty'];
    $price=get_price($pid);
    $sum+=$price*$q;
  }
  return $sum;
}
/*===== Take a Trip ======*/
function addtocart($pid,$q){

  //if(count($pid<1) or count($q<1)) return;

if(is_array($_SESSION['shoppingCart'])){
    if(product_exists($pid)) return;
    $max=count($_SESSION['shoppingCart']);
    //print $max;
    $thisproduct = fetchThisProductDetails($pid);

 //$_SESSION['shoppingCart'][$max]['product_code']=$thisproduct['product_code'];
    $_SESSION['shoppingCart'][$max]['product_name']=$thisproduct['product_name'];
    $_SESSION['shoppingCart'][$max]['product_description']=$thisproduct['product_description'];
    $_SESSION['shoppingCart'][$max]['product_price']=$thisproduct['price'];
    $_SESSION['shoppingCart'][$max]['product_code']=$pid;
    $_SESSION['shoppingCart'][$max]['qty']=$q;
	/*echo "<pre>";
	print_r($_SESSION['shoppingCart']);
	echo "<a href='shoppingcart.php'>View Cart</a>";
  echo "<pre>";*/
  //return $max;
  }
  
  
  else{
  
    $_SESSION['shoppingCart'] = array();
    $thisproduct = fetchThisProductDetails($pid);

    //$_SESSION['shoppingCart'][0]['product_code']=$thisproduct['product_code'];
    $_SESSION['shoppingCart'][0]['product_name']=$thisproduct['product_name'];
    $_SESSION['shoppingCart'][0]['product_description']=$thisproduct['product_description'];
    $_SESSION['shoppingCart'][0]['product_price']=$thisproduct['price'];
    $_SESSION['shoppingCart'][0]['product_code']=$pid;
    $_SESSION['shoppingCart'][0]['qty']=$q;
  }


}

function product_exists($pid){

 $max=count($_SESSION['shoppingCart']);
  $flag=0;
  for($i=0;$i<$max;$i++){
    if($pid==$_SESSION['shoppingCart'][$i]['product_code']){
      $flag=1;
      break;
    }
  }
  return $flag;
}

function createBill($name,$address,$email,$phone,$userid,$total,$shipping_address,$pin_code,$card_no,$ex_date,$cvc){



  global $mysqli,$db_table_prefix;
$stmt = $mysqli->prepare(
      "INSERT INTO " . $db_table_prefix . "billing_info (
		name,
		address,
		email,
		phone,
		user_id,
		total_amount,
		shipping_address,
		pin_code,
		card_no,
		ex_date,
		cvc
		)
		VALUES (
		?,
		?,
		?,
		?,
		?,
		?,
		?,
		?,
		?,
		?,
		?
       )"
  );
  $stmt->bind_param("sssssssssss", $name,$address,$email,$phone,$userid,$total,$shipping_address,$pin_code,$card_no,$ex_date,$cvc);
  //print_r($stmt);
  $result = $stmt->execute();
  //print_r($result);
  $stmt->close();
  return $result;
}

/*====== billing info=====*/
function get_oder_detail($user_id){
global $mysqli;
    $stmt = $mysqli->prepare(
    "
    SELECT
    billing_id,
	name,
	address,
	email,
	phone,
	total_amount,
	shipping_address,
	pin_code
	FROM billing_info
    WHERE
    user_id = ?
    "
    );
    $stmt->bind_param("s",$user_id);
    $stmt->execute();
    $stmt->bind_result($billing_id,$name,$address,$email,$phone,$total_amount,$shipping_address,$pin_code);
    $stmt->execute();
	
	$stmt->store_result();
	$count_row = $stmt->num_rows;
	
	// if($count_row==0){ return $row = 0;}
	
	
  while ($stmt->fetch()) {
    $row[] = array(
	'billing_id'=>$billing_id,
    'name'=>$name,
	'address'=>$address,
	'email'=>$email	,
	'phone'=>$phone,
	'total_amount'=>$total_amount,
	'shipping_address'=>$shipping_address,
	'pin_code'=>$pin_code
    );
  }
  $stmt->close();
  return ($row);
}

/*============================*/
function SelectUser($updateid){
 
 

 	global $mysqli;
    $stmt = $mysqli->prepare(
    "
    SELECT
	billing_id,
    name,
	address,
	email,
	phone,
	total_amount,
	shipping_address,
	pin_code
	FROM billing_info
    WHERE
    billing_id = ?
    LIMIT 1"
    );
    $stmt->bind_param("s", $updateid);
    $stmt->execute();
    $stmt->bind_result($billing_id,$name, $address,$email,$phone,$total_amount,$shipping_address,$pin_code);
    $stmt->execute();
	
	$stmt->store_result();
	$count_row = $stmt->num_rows;
	
	
	
	
  while ($stmt->fetch()) {
    $row[] = array(
	'billing_id'=>$billing_id,
      'name'   => $name,
      'address'       		=> $address,
	  'email'    	 		=> $email,
	  'phone'     			 => $phone,
	  'total_amount' 			=> $total_amount,
	  'shipping_address'=>$shipping_address,
	'pin_code'=>$pin_code
	 
		
    );
  }
  $stmt->close();
  return ($row);
  
 }
 
 /*== update bill=*/
 function UpdateBill($billing_id,$name,$address,$email,$phone,$shipping_address,$pin_code){
 
 global $mysqli,$db_table_prefix;
 
	$stmt = $mysqli->prepare(
      "UPDATE " . $db_table_prefix . "billing_info
		SET
		name = ?,
		address = ?,
		email = ?,
		phone= ?,
		shipping_address = ?,
		pin_code = ?
		WHERE
		billing_id = ?
		LIMIT 1"
    );
    $stmt->bind_param("sssssss",$name,$address,$email,$phone,$shipping_address,$pin_code,$billing_id);
	
    $result = $stmt->execute();
	$stmt->close();

    return $result;
	
	}
	
function deleteBill($bill_id){
 global $mysqli,$db_table_prefix;
 $stmt = $mysqli->prepare(
      "Delete from " . $db_table_prefix . "billing_info
		WHERE
		billing_id = ?
		LIMIT 1"
    );
    $stmt->bind_param("s",$bill_id);
	$result = $stmt->execute();
	$stmt->close();

    return $result;

}

/*==================== product function for admin=================*/

/*All Destinations */

function fetchAllProducts()
{

  global $mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT
		product_id,
		product_name,
		product_description,
		price,
		product_category,
		product_sub_category,
		new_file_name
		FROM ".$db_table_prefix."products
		");

  $stmt->execute();
  $stmt->bind_result($product_id, $product_name, $product_description, $price , $product_category,$product_sub_category, $new_file_name);
 
 
 $count_row = $stmt->num_rows;

  while ($stmt->fetch()){
    $row[] = array('product_id' => $product_id,
        'product_name' => $product_name,
        'product_description' => $product_description,
		'price' => $price,
        'product_category' => $product_category,
		'product_sub_category' =>$product_sub_category,
        'new_file_name' => $new_file_name);
  }
  $stmt->close();
  return ($row);


}
/*============*/
function deleteProduct($pid){
 global $mysqli,$db_table_prefix;
 $stmt = $mysqli->prepare(
      "Delete from " . $db_table_prefix . "products
		WHERE
		product_id = ?
		LIMIT 1"
    );
    $stmt->bind_param("s",$pid);
	$result = $stmt->execute();
	$stmt->close();

    return $result;

}

/*===================*/
function SelectProduct($product_id){
  
   global $mysqli;
    $stmt = $mysqli->prepare(
    "
    SELECT
    product_id,
	product_name,
	product_description,
	price,
	product_category,
	product_sub_category,
	new_file_name
	FROM products
    WHERE
    product_id = ?
    LIMIT 1"
    );
    $stmt->bind_param("s", $product_id);
    $stmt->execute();
    $stmt->bind_result($product_id,$product_name,$product_description,$price,$product_category,$product_sub_category,$new_file_name);
    $stmt->execute();
	
	$stmt->store_result();
	$count_row = $stmt->num_rows;
	
	
	
	
  while ($stmt->fetch()) {
    $row[] = array(
      'product_id'  => $product_id,
	  'product_name'=>$product_name,
	  'product_description'=>$product_description,
	  'price' =>$price,
	  'product_category'=>$product_category,
	  'product_sub_category'=>$product_sub_category,
	  'new_file_name'=>$new_file_name
	 
		
    );
  }
  $stmt->close();
  return ($row);
  
  }
  
  function update_product($product_id ,$product_name,$product_description,$price,$product_category,$product_sub_category)
 {



 global $mysqli,$db_table_prefix;
 
	$stmt = $mysqli->prepare(
      "UPDATE " . $db_table_prefix . "products
		SET
		product_name = ?,
		product_description = ?,
		price = ?,
		product_category = ?,
		product_sub_category=?
		WHERE
		product_id = ?
		LIMIT 1"
    );
	
	
    $stmt->bind_param("ssssss" ,$product_name,$product_description,$price,$product_category,$product_sub_category,$product_id);
	$result = $stmt->execute();
	$stmt->close();
return $result;
}

/*function for img*/
 
 function update_product_withimg($product_id,$product_name,$product_description,$price,$product_category,$product_sub_category,$uploadfile)
 {
 
  global $mysqli,$db_table_prefix;
 
	$stmt = $mysqli->prepare(
      "UPDATE " . $db_table_prefix . "products
		SET
		product_name = ?,
		product_description = ?,
		price = ?,
		product_category = ?,
		product_sub_category = ?,
		new_file_name=?
		WHERE
		product_id = ?
		LIMIT 1"
    );
	
	
    $stmt->bind_param("sssssss" ,$product_name,$product_description,$price,$product_category,$product_sub_category,$uploadfile,$product_id);
	$result = $stmt->execute();
	$stmt->close();
return $result;
}

?>