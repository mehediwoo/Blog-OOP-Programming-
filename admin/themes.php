<?php 
    include '../lib/Database.php';
    include '../lib/session.php';
    include '../helpers/Format.php';

    $db = new Database();
    $fm = new Format();
    $db->loginRestriction();

    if (isset($_POST['up_theme'])) {
        
        $name  = $_POST['theme'];

        if (empty($name)) {
            echo "<script>alert('Plese select a theme')</script>";
            echo "<script>window.open('themes.php','_self')</script>";
        }else{
            $query = "UPDATE  tbl_theme SET name='$name' WHERE id='1'";
            $stmt  = $db->update($query);
            if ($stmt) {
                echo "<script>alert('Theme Applyed succesfully')</script>";
            }else{
                echo "<script>alert('Error)</script>";
            }
        }
    }

 ?>
<?php include 'inc/header.php'; ?>
        <div class="clear">
        </div>
        <?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Select Themes</h2>
               <div class="block copyblock"> 
                <?php 
                    $sql = "SELECT * FROM tbl_theme WHERE id='1' ";
                    $stmt= $db->select($sql);
                    while ($theme = $stmt->fetch_assoc()) {
                
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input <?php if ($theme['name']== 'default') {
                                    echo "checked";
                                } ?> type="radio" name="theme" value="default"> Default
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if ($theme['name']== 'green') {
                                    echo "checked";
                                } ?> type="radio" name="theme" value="green"> Green
                            </td>
                        </tr>
						<tr>
                            <td>
                                <input type="submit" name="up_theme" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } ?>
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


<?php 
                                
                                /*
                                while ($row = $stmt->fetch_assoc()) {*/
                                    
                                
                             ?>