<?php

@include 'config.php';

if(isset($_POST['submit']))
{
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$user_type = $_POST['user_type'];

	$select = " SELECT * FROM user_info WHERE email = '$email' && password = '$password' ";

	$result = mysqli_query($conn, $select);

	if (mysqli_num_rows($result) > 0){
		
		$error[] = 'user already exsists';

	}else{

		if($password != $cpassword)
		{

			$error[] = 'passwords do not match';

		}else{
			$insert = "INSERT INTO user_info(name, email, password, user_type) VALUES('$name', '$email', '$password', '$user_type')";
			mysqli_query($conn, $insert);
			header('location:loginform.php');
		}

	}


};
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register form</title>

	<!-- css link -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<div class="form-container">
	
	<form>
		<h3>register</h3>
		<?php
		if (isset($error))
		{
			foreach ($error as $error)
			{
				echo '<span class="error-msg">'.$error.'</span>';
			};
		};
		?>
		<input type="text" name="name" required placeholder="enter your nickname">
		<input type="email" name="email" required placeholder="enter your email adress">
		<input type="password" name="password" required placeholder="enter your password">
		<input type="password" type="cpassword" required placeholder="reenter your password">
		<select name="user_type">
			<option value="user">user</option>
			<option value="admin">admin</option>
		</select>
		<input type="submit" name="submit" value="register now" class="form-btn">
		<p>already have an account? <a href="loginform.php">login now</a></p>
	</form>
</div>


</body>
</html>
