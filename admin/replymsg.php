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
            if (!isset($_GET['inboxid']) or $_GET['inboxid']==NULL) {
            	echo "<script>window.open('inbox.php','_self')</script>";
            }elseif(isset($_POST['inboxmsg'])){
            	echo "<script>window.open('inbox.php','_self')</script>";
            }else{
            	$inboxId= $_GET['inboxid'];
            }
            if (isset($_POST['replymsg'])) {
            	   $to       = $_POST['to'];
            	   $from     = $_POST['from'];
            	   $subject  = $_POST['subject'];
            	   $mesg     = $_POST['mesg'];
            	   if (empty($from)) {
            	   	  echo "<script>alert('From mail is empty')</script>";
            	   }elseif (empty($mesg)) {
            	   	echo "<script>alert('Message isn't empty')</script>";
            	   }else{
            	   	$sendMail = mail($to, $subject, $mesg);
            	   	echo "<script>alert('Mail sent successfully')</script>";
            	   }
            }
        ?>
            <div class="box round first grid">
                <h2>Reply Message</h2>
                <div class="block">               
                 	<form action="" method="post" enctype="multipart/form-data">
                 		<?php 
                 		$sql = "SELECT * FROM   tbl_contactform  WHERE id='$inboxId'";
						$run = $db->select($sql);
						if ($run) {
							while ($row = $run->fetch_array()) {
						
                 		 ?>
                    	<table class="form">
                      	
	                        <tr>
	                            <td>
	                                <label>To</label>
	                            </td>
	                            <td>
	                                <input type="text" value="<?php echo $row['email']; ?>" name="to"  class="medium" />
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <label>From</label>
	                            </td>
	                            <td>
	                                <input type="text" placeholder="Enter your E-mail Address" name="from"  class="medium" />
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <label>Subject</label>
	                            </td>
	                            <td>
	                                <input type="text" placeholder="Enter your Mail Subject" name="subject"  class="medium" />
	                            </td>
	                        </tr>
	                        <tr>
	                            <td style="vertical-align: top; padding-top: 9px;">
	                                <label>Message</label>
	                            </td>
	                            <td>
	                                <textarea class="tinymce" name="mesg"></textarea>
	                            </td>
	                        </tr>
							<tr>
	                            <td></td>
	                            <td>
	                                <input type="submit" name="replymsg" Value="Reply" />
	                            </td>
	                        </tr>
                    	</table>
                    <?php } } ?>
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
