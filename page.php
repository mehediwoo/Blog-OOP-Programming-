<?php 
    include 'lib/Database.php';
    include 'helpers/Format.php';

    $db = new Database();
    $fm = new Format();
?>
<?php include 'inc/header.php'; ?>
	
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php 
					if (!isset($_GET['pageid']) or $_GET['pageid']==NULL) {
			        echo "<script>window.open('404.php','_self')</script>";
				    }else{
				        $id = $_GET['pageid'];
				    }
				 ?>
				 <?php 
                    $query  = "SELECT * FROM tbl_page WHERE id='$id'";
                    $result = $db->select($query);
                    while ($rows = $result->fetch_assoc()) {
                            
                        
                    
				  ?>
				<h2><?php echo $rows['name']; ?></h2>
	
				<p><?php echo $rows['content']; ?></p>
			<?php } ?>
	</div>

		</div>
		
			
			<?php include 'inc/sidebar.php' ?>
			
		</div>
	</div>

	<?php include 'inc/footer.php' ?>