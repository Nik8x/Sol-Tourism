<?php include('header.php');
if(isUserLoggedIn()) {  header("Location: index.php"); die(); }else{}

if(isset($_POST['register']))
{
$errors = array();
	$email = trim($_POST["email"]);
	$username = trim($_POST["username"]);
  	$firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
  	$password = trim($_POST["password"]);
	$confirm_pass = trim($_POST["passwordc"]);


	if($username == "")
	{
		$errors[] = "enter valid username";
	}

	if($firstname == "")
	{
		$errors[] = "enter valid first name";
	}

  if($lastname == "")
  {
	$errors[] = "enter valid last name";
  }


	if($password =="" && $confirm_pass =="")
	{
		$errors[] = "enter password";
	}
	else if($password != $confirm_pass)
	{
		$errors[] = "password do not match";
	}

	//End data validation
	if(count($errors) == 0)
	{	


	  $user = createNewUser($username, $firstname, $lastname, $email, $password);
	 
	 if($user=1)
	 {
	 $msg =  "registration successfully";
	 }
	  
	}
}

if(isset($_POST['login']))
{

$errors = array();
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	
	//Perform some validation

	if($username == "")
	{
		$errors[] = "enter username";
	}
	if($password == "")
	{
		$errors[] = "enter password";
	}

	if(count($errors) == 0)
	{
			//retrieve the records of the user who is trying to login
			$userdetails = fetchUserDetails($username);

			//See if the user's account is activated
			if($userdetails["Active"]==0)
			{
				$errors[] = "account inactive";
			}
			else
			{
				//Hash the password and use the salt from the database to compare the password.
				$entered_pass = generateHash($password,$userdetails["Password"]);
				
				if($entered_pass != $userdetails["Password"])
				{

					$errors[] = "invalid password";
  				}
				else
				{
					//Passwords match! we're good to go'
					//Transfer some db data to the session object
					$loggedInUser->email = $userdetails["Email"];
					$loggedInUser->user_id = $userdetails["UserID"];
					$loggedInUser->hash_pw = $userdetails["Password"];
					$loggedInUser->first_name = $userdetails["FirstName"];
				    $loggedInUser->last_name = $userdetails["LastName"];
					$loggedInUser->username = $userdetails["UserName"];
				  	$loggedInUser->member_since = $userdetails["MemberSince"];
					
					$loggedInUser->role = $userdetails["role"];

				//pass the values of $loggedInUser into the session -
				  	// you can directly pass the values into the array as well.

					$_SESSION["ThisUser"] = $loggedInUser;

				  	//now that a session for this user is created
					//Redirect to this users account page
					
					if($loggedInUser->role== 'admin')
					{ 
					header("Location:index.php");
					}
					else{
					header("Location: billing.php");
					die();
					}
				}
			}

	}
	
}
/*echo "<pre>";
print_r($errors);
echo "</pre>";*/
?>

<section id="form"><!--form-->
		<div class="container">
		<?php if(isset($msg)){?>
		<div class="row">
		<h2 class="text-center"><?php echo $msg;?></h2>
		</div><?php } ?>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form  method="post">
							<input type="text" placeholder="Name" name="username">
							<input type="password" placeholder="Email Password" name="password">
							
							<button class="btn btn-default" type="submit" name="login">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="" method="post">
							<input type='text' name='username' placeholder="Enter User Name" />
							
							<input type='text' name='firstname' placeholder="Enter First Name"/>
							<input type='text' name='lastname' placeholder="Enter Last Name"/>
							<input type='password' name='password' placeholder="Enter Password" />
							
<input type='password' name='passwordc' placeholder="Enter Conform password" />

<input type='text' name='email' placeholder="Enter Email Address" />
							
							<button class="btn btn-default" type="submit" name="register">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section>
<?php include('footer.php');?>