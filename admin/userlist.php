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
                <h2>User List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>User Name</th>
							<th>User Role</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
					<?php
						$i   =0;
						$sql = "SELECT * FROM  tbl_user ";
						$run = $db->select($sql);
						
						while ($row = $run->fetch_array()) {
							$i++;
						
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['username'] ?></td>
							<td><?php echo $row['role'] ?></td>
							<td>
							<?php 
								if ($_SESSION['role']=='admin') { ?>
									<a href="delete_user.php?userid=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete this user?')">Delete</a>
							<?php }else{echo "Only Admin Can delete this";} ?>
								
							</td>
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
</body>
 <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>
</html>
