<?php
 
 include '../lib/Database.php';
 include '../lib/session.php';
 include '../helpers/Format.php';

 $db = new Database();
 $fm = new Format();
 if (isset($_SESSION['id'])) {
 	header("Location:index.php?Wellcome_to_Admin_Pannel");
 }
 
 ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php
		if (isset($_POST['login'])) {
		 	$username = $_POST['username'];
		 	$password = $_POST['password'];
		 	if ($username == '' or $password=='') {
		 		echo "Field must be filled out";
		 	}else{
		 		$user = $db->login($username,$password);
		 		if ($user) {
		 			$_SESSION['id']   = $user['id'];
		 			$_SESSION['user'] = $user['username'];
		 			$_SESSION['name'] = $user['name'];
		 			$_SESSION['role'] = $user['role'];
		 			echo "Wellcome to ".$_SESSION['name'];
		 			header("Location:index.php?Wellcome_to_Admin_Pannel");

		 		}else{
		 			echo "Incorrect username or password";
		 		}
		 	}
		 } 


		 ?>
		<form action="" method="POST">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" name="login" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="https://facebook.com/mehediwoo">Facebook</a><span> For Mehedi Hasan</span>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>