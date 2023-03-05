<?php 
    include '../lib/Database.php';
    include '../lib/session.php';
    include '../helpers/Format.php';

    $db = new Database();
    $fm = new Format();
    $db->loginRestriction();


    if (isset($_POST['add_cat'])) {
        
        $cateName = mysqli_real_escape_string($db->link , $_POST['cat_name']);

        if (empty($cateName)) {
            echo "<script>alert('Category Title Mus not be empty, fillout first')</script>";
        }elseif (!preg_match('/^[A-Za-z]/', $cateName)) {
           echo "<script>alert('You can use only A-Z,a-z')</script>";
        }else{
            $sql = "INSERT INTO tbl_category(name) VALUES('$cateName')";
            $run = $db->CateInsert($sql);
            if ($run) {
                echo "<script>alert('Category added succesfully')</script>";
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
                            <td>
                                <input type="text" placeholder="Enter Category Name..." name="cat_name" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="add_cat" Value="Save" />
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
