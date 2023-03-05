<?php 
    include 'lib/Database.php';
    include 'helpers/Format.php';

    $db = new Database();
    $fm = new Format();

    if (isset($_POST['submit'])) {
    	$Fname = $_POST['firstname'];
    	$Lname = $_POST['lastname'];
    	$email = $_POST['email'];
    	$msg   = $_POST['msg'];

    	if (empty($Fname)) {
    		echo "<script>alert('First Name must be filled out')</script>";
    	}elseif (empty($Lname)) {
    		echo "<script>alert('Last Name must be filled out')</script>";
    	}elseif (empty($email)) {
    		echo "<script>alert('Email must be filled out')</script>";
    	}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    		echo "<script>alert('Invalid E-mail Address')</script>";
    	}else{
    	$sql = "INSERT INTO tbl_contactform(Fname,Lname,email,msg,status) 
    		VALUES('$Fname','$Lname','$email','$msg','no')";
            $run = $db->insert($sql);
    		echo "<script>alert('We recive your mail, wait for reply')</script>";
    		
    	}
    }
?>
<?php include 'inc/header.php' ?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="msg"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send Message"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
		<?php include 'inc/sidebar.php' ?>
	</div>

	<?php include 'inc/footer.php' ?>