<?php 
	include '../lib/Database.php';
	include '../lib/session.php';
    include '../helpers/Format.php';

	$db = new Database();
 	$fm = new Format();
 	$db->loginRestriction();
 ?>
<?php include 'inc/header.php'; ?>        
<div class="clear">
        </div>
           <?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Post Title</th>
							<th>Description</th>
							<th>Category</th>
							<th>Image</th>
							<th>Author</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$sql = "SELECT tbl_post.*,tbl_category.name FROM tbl_post INNER JOIN tbl_category ON tbl_post.cate=tbl_category.id";
							$stmt= $db->select($sql);
							while ($row = $stmt->fetch_assoc()) {
								
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $row['title'] ?></td>
							<td><?php echo substr($row['content'], 0,70) ?></td>
							<td><?php echo $row['name'] ?></td>
							<td class="">
								<img height="50px" width="100px" src="../images/<?php echo $row['image'] ?>">
							</td>
							<td><span style="color: green;font-weight: 700"><?php echo $row['author'] ?></span></td>
							<td> 
								<?php if ($_SESSION['role']=='admin' OR $_SESSION['id']==$row['userid']) { ?>
									<a href="">Edit</a>
									|| <a href="">Delete</a></td>
								<?php } ?>
								
						</tr>
					<?php } ?>
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
	
    <?php include 'inc/footer.php'; ?>
	   <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
</body>
</html>
