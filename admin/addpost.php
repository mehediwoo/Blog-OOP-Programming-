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
		<?php
            if (isset($_POST['add_post'])) {

                $title     = $_POST['title'];
                $cate      = $_POST['cate'];
                $post_img  = $_FILES['post_img']['name'];
                $content   = $_POST['content'];
                $author    = $_POST['author'];
                $authorid  = $_POST['userid'];
                $tags      = $_POST['tags'];
                $tergate   = "../images/".basename($post_img);
                if (empty($title) or empty($cate) or empty($content)) {
                    echo "<script>alert('All filed must be filled out')</script>";
                }else{
                    $sql = "INSERT INTO 
        tbl_post(title,content,image,author,times,cate,tags,userid)
        VALUES('$title','$content','$post_img','$author',NOW(),'$cate','$tags','$authorid')";
                    $run = $db->insert($sql);
                    move_uploaded_file($_FILES['post_img']['tmp_name'], $tergate);
                    echo "<script>alert('Successfully Adding Post')</script>";
                }
            }
        ?>
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Post Title..." name="title" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cate">
                                    <option value="">Category One</option>
                                    <?php 
                                    $sql = "SELECT * FROM  tbl_category ";
                                    $run = $db->select($sql);
                                    while ($row = $run->fetch_assoc()) {

                                    ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                <?php } ?>
                                </select>
                            </td>
                        </tr>
                   
                    
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="post_img" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="content"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Tags</td>
                            <td>
                                <input type="text"  name="tags" placeholder="Post Tags.." />
                            </td>
                        </tr>
                        <tr>
                            <td>Author</td>
                            <td>
                                <input type="text" value="<?php echo $_SESSION['role']; ?>" name="author" />
                            </td>
                            <td>
                                <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="userid" />
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="add_post" Value="Save" />
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
