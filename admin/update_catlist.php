<?php 
    include '../lib/Database.php';
    include '../lib/session.php';
    include '../helpers/Format.php';

    $db = new Database();
    $fm = new Format();
    $db->loginRestriction();
    $id = $_GET['id'];

    if (isset($_POST['update_cat'])) {
        
        $cateName = mysqli_real_escape_string($db->link , $_POST['cat_name']);

        if (empty($cateName)) {
            echo "<script>alert('Category Title Mus not be empty, fillout first')</script>";
        }elseif (!preg_match('/^[A-Za-z]/', $cateName)) {
           echo "<script>alert('You can use only A-Z,a-z')</script>";
        }else{
            $query = "UPDATE  tbl_category SET name='$cateName' WHERE id='$id'";
            $run = $db->CateInsert($query);
            if ($run) {
                echo "<script>alert('Category Update succesfully')</script>";
                echo "<script>window.open('catlist.php','_self')</script>";
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
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <?php 
                                
                                $sql = "SELECT * FROM tbl_category WHERE id='$id' ";
                                $stmt= $db->select($sql);
                                while ($row = $stmt->fetch_assoc()) {
                                    
                                
                             ?>
                            <td>
                                <input type="text" value="<?php echo $row['name'] ?>" name="cat_name" class="medium" />
                            </td>
                        <?php } ?>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="update_cat" Value="Save" />
                            </td>
                        </tr>
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
