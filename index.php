<?php
 
 include 'lib/Database.php';
 include 'helpers/Format.php';

 $db = new Database();
 $fm = new Format();
 


 if (isset($_SERVER['PHP_SELF'])) {
 	$page=1;
 }

?>

<?php include 'inc/header.php'; ?>	
<?php include 'inc/slider.php' ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				if ($page==0 or $page<=-1) {
					$page = 1;
				}
			 	
			 	$page_start = ($page*3)-3;
			 	$sql  = "SELECT * FROM tbl_post LIMIT $page_start,3";
			 	$stmt = $db->select($sql);
			 }elseif(isset($_GET['cate'])){
			 	$catid = $_GET['cate'];
			 	$query  = "SELECT * FROM tbl_post WHERE cate='$catid' ";
				$stmt   = $db->select($query);
			 }else{
			 	$query  = "SELECT * FROM tbl_post LIMIT 0,3";
				$stmt   = $db->select($query);
			 }
				
				if ($stmt) {
					while ($result = $stmt->fetch_assoc()) {
				
			?>


			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id'] ?>"><?php echo $result['title'] ?></a></h2>
				<h4><?php echo $fm->dateformate($result['times']) ?>, By <a href="#"><?php echo $result['author'] ?></a></h4>
				 <a href="#"><img src="images/<?php echo $result['image'] ?>" alt="post image"/></a>
				<p>
					<?php echo $fm->textShorten($result['content']) ?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'] ?>">Read More</a>
				</div>
			</div>

		<?php } ?>
		<!-- Pagination -->
		<?php
			 
		?>
		<div class="pagination">
			<ul>
				<?php
					if ($page>1) { ?>
					 	<li>
					<a href="index.php?page=<?php echo $page-1 ?>">Previous</a>
						</li>
				<?php } 
				?>
				

				<?php 
					$sql ="SELECT COUNT(*) FROM tbl_post";
					$stmt= $db->select($sql);
					$row = $stmt->fetch_assoc();
					$all = array_shift($row);
					$result = $all/3;
					$final_All_Post =  ceil($result);
					for ($i=1; $i < $final_All_Post ; $i++) { 
					
				 ?>
				 <?php 
				 	if ($i == $page) { ?>
				 		<li style="background: #a56e0a;">
					<a style="color: #fff"href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
						</li>
				<?php }else{ ?>
					<li>
					<a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
					</li>
				<?php } ?>
				

				<?php } ?>
				
				
						<li>
					<a href="index.php?page=<?php echo $page+1; ?>">Next</a>
						</li>
				
			</ul>
		</div>
		<!-- Pagination -->

		<?php }else{header("Location:404.php");} ?>


		</div>
		<?php include 'inc/sidebar.php' ?>
	</div>

<?php include 'inc/footer.php' ?>