	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="index.php">Home</a></li>
			<?php 
			$sql = "SELECT * FROM tbl_page ";
			$stmt= $db->select($sql);
			while ($rows = $stmt->fetch_assoc()) {
    	?>
    	<li><a href="page.php?pageid=<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></a></li>
    	
	<?php } ?>
	<li><a href="contact.php">Contact US</a></li>
		</ul>
	  </div>
	  <?php 
	  $sql = "SELECT * FROM tbl_footer ";
	  $stmt= $db->select($sql);
	  while ($rows = $stmt->fetch_assoc()) {
	   ?>
	  <p>&copy; <?php echo $rows['footerText'] ?></p>
	<?php } ?>
	</div>
	<div class="fixedicon clear">
		<?php 
		$sql = "SELECT * FROM  tbl_social ";
        $run = $db->select($sql);
        while ($row = $run->fetch_array()) {
		?>
		<a href="<?php echo $row['facebook']; ?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $row['twitter']; ?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $row['linkedin']; ?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $row['google_plus']; ?>"><img src="images/gl.png" alt="GooglePlus"/></a>
	<?php } ?>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>