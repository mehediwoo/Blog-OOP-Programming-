<?php 
    include '../lib/Database.php';
    include '../lib/session.php';
    include '../helpers/Format.php';

    $db = new Database();
    $fm = new Format();
    $db->loginRestriction();

    if (isset($_GET['seenid'])) {
        $seenid = $_GET['seenid'];

        $sql = "UPDATE tbl_contactform SET status='yes' WHERE id='$seenid'";
        $run = $db->insert($sql);
        if ($run) {
            echo "<script>alert('Message seen, Move to seen box')</script>";
        }
    }
?>
<?php include 'inc/header.php'; ?>
           <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                        <li><a class="menuitem">Site Option</a>
                            <ul class="submenu">
                                <li><a href="titleslogan.php">Title & Slogan</a></li>
                                <li><a href="social.php">Social Media</a></li>
                                <li><a href="copyright.php">Copyright</a></li>
                                
                            </ul>
                        </li>
						
                         <li><a class="menuitem">Pages</a>
                            <ul class="submenu">
                            <li><a href="addpage.php">Add New Pages</a></li>
                                <?php 
                                    $query  = "SELECT * FROM tbl_page";
                                    $result = $db->select($query);
                                    while ($row = $result->fetch_assoc()) {
                                   
                                 ?>
                                <li><a href="page.php?pageid=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li><a class="menuitem">Category Option</a>
                            <ul class="submenu">
                               <li><a href="addcat.php">Add Category</a> </li>
                                <li><a href="catlist.php">Category List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Post Option</a>
                            <ul class="submenu">
                                 <li><a href="addpost.php">Add Post</a> </li>
                                <li><a href="postlist.php">Post List</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>E-mail</th>
                            <th>Message</th>
                            <th>Action</th>
						</tr>
					</thead>
                    
					<tbody>
                        <?php 
                        $sql = "SELECT * FROM  tbl_contactform WHERE status='no'";
                        $run = $db->select($sql);
                        $i   =0;
                        if ($run) {
                            while ($row = $run->fetch_assoc()) {
                                $i++;
                        
                        ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td>
                            <?php echo $row['Fname'].'-'.$row['Lname'];?>
                            </td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo substr($row['msg'], 0,85); ?></td>
							<td>
        <a href="viewmsg.php?inboxid=<?php echo $row['id'] ?>">View</a> || 
        <a href="replymsg.php?inboxid=<?php echo $row['id'] ?>">Reply</a>  || 
        <a href="?seenid=<?php echo $row['id'] ?>">Seen</a></td>
						    </tr>
                    <?php } } ?>
					</tbody>
				</table>
               </div>
            </div>

            <div class="box round first grid">
                <h2>Seen Iteam</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                        $sql = "SELECT * FROM  tbl_contactform WHERE status='yes'";
                        $run = $db->select($sql);
                        $i   =0;
                        if ($run) {
                            while ($row = $run->fetch_assoc()) {
                                $i++;
                        
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i; ?></td>
                            <td>
                            <?php echo $row['Fname'].'-'.$row['Lname'];?>
                            </td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo substr($row['msg'], 0,85); ?></td>
                            <td><a href="deletemsg.php?inbox=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure want to delete this message?')">Delete</a></td>
                        </tr>
                    <?php } }else{} ?>
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
    <div id="site_info">
       <p>
         &copy; Copyright <a href="http://trainingwithliveproject.com">Training with live project</a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>
