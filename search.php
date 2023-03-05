<?php
 
 include 'lib/Database.php';
 include 'helpers/Format.php';

 $db = new Database();
 $fm = new Format();

 $page='';

?>

<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php' ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php
				$search = $_GET['search'];
			 	$query  = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR content LIKE '%$search%' ";
				$stmt   = $db->select($query);
				if ($stmt) {
					while ($result = $stmt->fetch_assoc()) {
				
			?>


			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id'] ?>"><?php echo $result['title'] ?></a></h2>
				<h4><?php echo $fm->dateformate($result['times']); ?>, By <a href="#"><?php echo $result['author'] ?></a></h4>
				 <a href="#"><img src="images/<?php echo $result['image'] ?>" alt="post image"/></a>
				<p>
					<?php echo $fm->textShorten($result['content']) ?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'] ?>">Read More</a>
				</div>
			</div>

		<?php } ?>
		

		<?php }else{echo "Post not found!!";} ?>


		</div>
		<?php include 'inc/sidebar.php' ?>
	</div>

<?php include 'inc/footer.php' ?>