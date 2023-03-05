<?php 
    include '../lib/Database.php';
    include '../lib/session.php';
    include '../helpers/Format.php';

    $db = new Database();
    $fm = new Format();
    $db->loginRestriction();
?>
<?php 

    
    if (!isset($_GET['pageid'])) {
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        $id = $_GET['pageid'];
    }
 ?>
<?php include 'inc/header.php'; ?>
        <div class="clear">
        </div>
        <?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
		<?php
            if (isset($_POST['update_page'])) {

                $title     = $_POST['title'];
                $content   = $_POST['content'];
                if (empty($title) or empty($content)) {
                    echo "<script>alert('All filed must be filled out')</script>";
                }else{
                    $sql = "UPDATE tbl_page SET name='$title', content='$content' WHERE id='$id' ";
                    $run = $db->insert($sql);
                    echo "<script>alert('Page Updated Successfully')</script>";
                }
            }
        ?>
            <div class="box round first grid">
                <h2>Update Page</h2>
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       <?php 
                       $query  = "SELECT * FROM tbl_page WHERE id='$id'";
                        $result = $db->select($query);
                        while ($rows = $result->fetch_assoc()) {
                            
                        
                        ?>
                        <tr>
                            <td>
                                <label>Page Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $rows['name'] ?>" name="title" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="content"><?php echo $rows['content'] ?></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="update_page" Value="Update Page" />
                                <a onclick="return confirm('Are you sure want to delete this page?');" href="deletePage.php?delpage=<?php echo $rows['id'];?>">Delete</a>
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


