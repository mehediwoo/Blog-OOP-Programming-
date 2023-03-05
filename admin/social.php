<?php 
    include '../lib/Database.php';
    include '../lib/session.php';
    include '../helpers/Format.php';

    $db = new Database();
    $fm = new Format();
    $db->loginRestriction();

if (isset($_POST['social'])) {

    $facebook  = mysqli_real_escape_string($db->link , $_POST['facebook']);
    $twitter   = mysqli_real_escape_string($db->link , $_POST['twitter']);
    $linkedin  = mysqli_real_escape_string($db->link , $_POST['linkedin']);
    $googleplus= mysqli_real_escape_string($db->link , $_POST['googleplus']);

    $sql = "UPDATE  tbl_social SET 
        facebook='$facebook',
        twitter='$twitter', 
        linkedin='$linkedin', 
        google_plus='$googleplus' 
        WHERE id='1'";
    $run = $db->Insert($sql);
    if ($run) {
        echo "<script>alert('Social Media Link Added succesfully')</script>";
    }else{
        echo "<script>alert('Something went wrong, Try after sometimes')</script>";
    }
}

?>
<?php include 'inc/header.php'; ?>
        <div class="clear">
        </div>
        <?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block">               
                 <form action="" method="post">
                    <table class="form">
                    <?php 
                    $sql = "SELECT * FROM  tbl_social ";
                    $run = $db->select($sql);
                    while ($row = $run->fetch_array()) {

                     ?>					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" value="<?php echo $row['facebook'] ?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="twitter" value="<?php echo $row['twitter'] ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="linkedin" value="<?php echo $row['linkedin'] ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="googleplus" value="<?php echo $row['google_plus'] ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="social" Value="Update" />
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
    <?php include 'inc/footer.php'; ?>
</body>
</html>
