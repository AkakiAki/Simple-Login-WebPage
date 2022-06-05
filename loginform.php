<?php

@include 'config.php';

session_start();

if(isset($_POST['submit']))
{
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$user_type = $_POST['user_type'];

	$select = " SELECT * FROM user_info WHERE email = '$email' && password = '$password' ";

	$result = mysqli_query($conn, $select);

	if (mysqli_num_rows($result) > 0) 
	{
		
		$row = mysqli_fetch_array($result);

		if ($row['user_type'] == 'admin') 
		{

			$_SESSION['admin_name'] = $row['name'];
			header('location:adminpage.php');

		}elseif ($row['user_type'] == 'admin') 
			{

				$_SESSION['user_name'] = $row['name'];
				header('location:userpage.php');

			}

	}else{
		$error[] = 'incorrect email or password!';
	}
};

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login form</title>

	<!-- css link -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<div class="form-container">
	
	<form>
		<h3>Login</h3>
		<?php
		if (isset($error))
		{
			foreach ($error as $error)
			{
				echo '<span class="error-msg">'.$error.'</span>';
			};
		};
		?>
		<input type="email" name="email" required placeholder="enter your email adress">
		<input type="password" name="password" required placeholder="enter your password">
		<input type="submit" name="submit" value="login now" class="form-btn">
		<p>don't have an account? <a href="registerform.php">register now</a></p>
	</form>
</div>


</body>
</html>