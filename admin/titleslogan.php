<?php 
    include '../lib/Database.php';
    include '../lib/session.php';
    include '../helpers/Format.php';

    $db = new Database();
    $fm = new Format();
    $db->loginRestriction();

    if (isset($_POST['submit'])) {
        
        $title  = mysqli_real_escape_string($db->link , $_POST['title']);
        $slogan = mysqli_real_escape_string($db->link , $_POST['slogan']);
        $logo   = $_FILES['logo']['name'];
        $target = "img/".basename($logo);

        if (!preg_match('/^[A-Za-z]/', $title) or !preg_match('/^[A-Za-z]/', $slogan)) {
           echo "<script>alert('You can use only A-Z,a-z')</script>";
        }else{
            if (empty($logo)) {
                $sql = "UPDATE  tbl_header SET title='$title',slogan='$slogan' WHERE id='1'";
                $run = $db->Insert($sql);
                if ($run) {
                echo "<script>alert('Updated succesfully')</script>";
                }else{
                    echo "<script>alert('Error)</script>";
                }
            }elseif (!empty($logo)) {
                $sql = "UPDATE  tbl_header SET title='$title',slogan='$slogan',logo='$logo' WHERE id='1'";
                $run = $db->Insert($sql);
                if ($run) {
                echo "<script>alert('Updated succesfully')</script>";

                move_uploaded_file($_FILES['logo']['tmp_name'], $target);

                }else{
                    echo "<script>alert('Error)</script>";
                }
            }
        }
    }
 ?>
<?php include 'inc/header.php'; ?>
        <?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                        <?php 
                        $sql = "SELECT * FROM  tbl_header ";
                        $run = $db->select($sql);
                        while ($row = $run->fetch_array()) {
                         ?>					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $row['title'] ?>"  name="title" class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $row['slogan'] ?>" name="slogan" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Website Logo</label>
                            </td>
                            <td>
                                <input type="file" placeholder="Choose File..." name="logo" class="medium" />
                            </td>
                        </tr><br>
						 <tr>
                            <td>
                                <label>Current Logo:</label>
                            </td>
                            <td>
                                <img src="img/<?php echo $row['logo'] ?>" height="30px" width="30px">
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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
    <div id="site_info">
       <p>
         &copy; Copyright <a href="http://trainingwithliveproject.com">Training with live project</a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>
