<?php 
    include '../lib/Database.php';
    include '../lib/session.php';
    include '../helpers/Format.php';

    $db = new Database();
    $fm = new Format();
    $db->loginRestriction();
    session_start();

    if (isset($_POST['footer'])) {
        $copy  = mysqli_real_escape_string($db->link , $_POST['copy']);

        $sql = "UPDATE  tbl_footer SET 
        footerText='$copy' WHERE id='1'";
    $run = $db->Insert($sql);
    if ($run) {
        echo "<script>alert('Copyright Added succesfully')</script>";
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
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">
                    <?php 
                    $sql = "SELECT * FROM  tbl_footer ";
                    $run = $db->select($sql);
                    while ($row = $run->fetch_array()) {

                     ?>					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $row['footerText'] ?>" name="copy" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="footer" Value="Update" />
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
