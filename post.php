<?php 
	
	include 'lib/Database.php';
 	include 'helpers/Format.php';
 	
 	$db = new Database();
 	$fm = new Format();
 	include 'inc/header.php';
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php
					$id = $_GET['id']; 
					$sql = "SELECT * FROM tbl_post WHERE id='$id' ";
					$stmt= $db->select($sql);
					while ($rows = $stmt->fetch_assoc()) {
					
				?>
				<h2><?php echo $rows['title'] ?></h2>
				<h4><?php echo $fm->dateformate($rows['times']) ?>, By <a href=""><?php echo $rows['author'] ?></a></h4>
				<img src="images/<?php echo $rows['image'] ?>" alt="MyImage"/>
				<p><?php echo $rows['content'] ?></p>

			<?php ?>
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php 
						$cat_id = $rows['cate']; 
						$query = "SELECT * FROM tbl_post ORDER BY RAND() LIMIT 6";
						$all_c = $db->select($query);
						while ($c_row = $all_c->fetch_assoc()) {
					?>
					<a href="post.php?id=<?php echo $c_row['id'] ?>"><img src="images/<?php echo $c_row['image'] ?>" alt="post image"/></a>
				<?php  } ?>
				<?php  } ?>
				</div>
	</div>

		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>

	<?php include 'inc/footer.php'; ?>