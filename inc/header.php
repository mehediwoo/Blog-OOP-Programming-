
<!DOCTYPE html>
<html>
<head>
	<?php include 'script/meta.php'; ?>
	<?php include 'script/css.php'; ?>
	<?php include 'script/js.php'; ?>

</head>

<body>
	<div class="headersection templete clear">
		<a href="#">
			<div class="logo">
				<?php 
				$sql = "SELECT * FROM  tbl_header ";
                $run = $db->select($sql);
                while ($row = $run->fetch_array()) {

				 ?>
				<img src="admin/img/<?php echo $row['logo']; ?>" alt="Logo"/>
				<h2><?php echo $row['title']; ?></h2>
				<p><?php echo $row['slogan'] ?></p>
			<?php } ?>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<?php 
				$sql = "SELECT * FROM  tbl_social ";
                $run = $db->select($sql);
                while ($row = $run->fetch_array()) {
				 ?>
				<a href="<?php echo $row['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $row['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $row['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $row['google_plus']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php } ?>
			</div>
			<div class="searchbtn clear">
				<form action="search.php" method="get">
					<input type="text" name="search" placeholder="Search keyword..."/>
					<input type="submit" name="submit" value="Search"/>
				</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
		<?php 
			$fileName = $_SERVER['SCRIPT_FILENAME'];
			$currentpage = basename($fileName, '.php');
		 ?>
		<li><a 
			<?php if ($currentpage == 'index') {echo "id='active'";} ?>
		 href="index.php">Home</a></li>
		<?php 
			$sql = "SELECT * FROM tbl_page ";
			$stmt= $db->select($sql);
			while ($rows = $stmt->fetch_assoc()) {
    	?>
    	<li><a
    		<?php 
    		if (isset($_GET['pageid']) && $_GET['pageid']==$rows['id']) {
    			echo "id='active'";
    		}
    		 ?>
    	 href="page.php?pageid=<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></a></li>
	<?php } ?>
		<li><a 
			<?php if ($currentpage == 'contact') {echo "id='active'";} ?> href="contact.php">Contact US</a></li>
	</ul>
</div>