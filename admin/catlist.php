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
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
					<?php
						$i   =0;
						$sql = "SELECT * FROM  tbl_category ";
						$run = $db->select($sql);
						if ($run) {
							
						while ($row = $run->fetch_array()) {
							$i++;
						
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['name'] ?></td>
							<td>
								<a href="update_catlist.php?id=<?php echo $row['id'] ?>">Edit</a> || 
								<a href="delete_catlist.php?id=<?php echo $row['id'] ?>">Delete</a>
							</td>
						</tr>
						<?php } }else{}?>
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
