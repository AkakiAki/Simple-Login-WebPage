<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name']))
{
	header('location:loginform.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Page</title>

	<!-- css link -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container">

	<div class="content">
		<h3>hi, <span>admin</span></h3>
		<h1>Welcome <span><?php echo $_SESSION['admin_name'] ?> </h1>
		<p>this is an admin page</p>
		<a href="login_orm.php" class="btn">login</a>
		<a href="registerform.php" class="btn">register</a>
		<a href="logout.php" class="btn">logout</a>
	</div>

</div>



</body>
</html>