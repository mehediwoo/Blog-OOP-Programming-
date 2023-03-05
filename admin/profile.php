<?php 
    include '../lib/Database.php';
    include '../lib/session.php';
    include '../helpers/Format.php';
    

    $db = new Database();
    $fm = new Format();
    $db->loginRestriction();
    $userID   = $_SESSION['id'];
    /*$userRole = $_SESSION['role'];*/

?>
<?php include 'inc/header.php'; ?>
        <div class="clear">
        </div>
        <?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
		<?php
            if (isset($_POST['update_profile'])) {

                $name      = $_POST['name'];
                $username  = $_POST['username'];
                $password  = $_POST['password'];

                if (empty($username)){
                    echo "<script>alert('Username must be filled out')</script>";
                }else{
                    $sql = "UPDATE tbl_user SET name='$name',username='$username',password='$password' WHERE id='$userID' ";
                    $run = $db->insert($sql);
                    echo "<script>alert('Profile updated succesfully and plese login again')</script>";
                    echo "<script>window.open('logout.php','_self')</script>";
                }
            }
        ?>
            <div class="box round first grid">
                <h2>Add New User</h2>
                <div class="block">               
                 <form action="" method="post" >
                    <table class="form">
                    	<?php 
                    	$sql = "SELECT * FROM tbl_user WHERE id='$userID'";
                    	$stmt= $db->select($sql);
                    	while ($row = $stmt->fetch_assoc()) {
                    	
                    	 ?>
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $row['name'] ?>" name="name" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $row['username'] ?>" name="username" class="medium" />
                            </td>
                        </tr>
                   
                    	<tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="password" value="<?php echo $row['password'] ?>" name="password" class="medium" />
                            </td>
                        </tr>
                    
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="update_profile" Value="Update Profile" />
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <!-- Footer Start-->
    <?php include 'inc/footer.php'; ?>
    <!-- Footer End-->

    <!--Fancy Button-->
    <script src="js/fancy-button/fancy-button.js" type="text/javascript"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
    <!-- /TinyMCE -->
    <style type="text/css">
        #tinymce{font-size:15px !important;}
    </style>
</body>
</html>
