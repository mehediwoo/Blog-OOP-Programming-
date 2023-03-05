<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
					<?php 
					    $sql   = "SELECT * FROM tbl_category";
						$stmt  = $db->select($sql);
						while ($result = $stmt->fetch_assoc()) {
					
				 	?>
						<li><a href="index.php?cate=<?php echo $result['id'] ?>"><?php echo $result['name']; ?></a></li>

					<?php } ?>						
					</ul>
				
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php 
					$recent   = "SELECT * FROM tbl_post ORDER BY RAND() LIMIT 4";
					$select   = $db->select($recent);
					while ($recent_post = $select->fetch_assoc()) {
				 ?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $recent_post['id'] ?>"><?php echo $recent_post['title']; ?></a></h3>
						<a href="post.php?id=<?php echo $recent_post['id'] ?>"><img src="images/<?php echo $recent_post['image'] ?>" alt="post image"/></a>
						<p><?php echo substr($recent_post['content'], 0,196) ?></p>	
					</div>
				<?php } ?>
			</div>
			
		</div>