<?php 
    include '../lib/Database.php';
    include '../lib/session.php';
    include '../helpers/Format.php';
    if ($_SESSION['role']!='admin') {
        header("Location:index.php");
    }
    $db = new Database();
    $fm = new Format();
    $db->loginRestriction();


    if (isset($_POST['adduser'])) {
        
        $name = mysqli_real_escape_string($db->link , $_POST['name']);
        $username = mysqli_real_escape_string($db->link , $_POST['username']);
        $passwrd  = mysqli_real_escape_string($db->link , $_POST['passwrd']);
        $mail  = mysqli_real_escape_string($db->link , $_POST['mail']);
        $role     = mysqli_real_escape_string($db->link , $_POST['role']);

        if (empty($username) || empty($name)) {
            echo "<script>alert('Admin UserName and Name Must be filled out!')</script>";
        }elseif($db->UserNameCheek($username)){
            echo "<script>alert('Username is allredy used, plese try another one!')</script>";

        }elseif(empty($passwrd)){
            echo "<script>alert('Admin Password Must be filled out!')</script>";
        }elseif(empty($role)){
            echo "<script>alert('Admin Assign Role Must be filled out!')</script>";
        }elseif($db->mailcheck($mail)){
             echo "<script>alert('E-mail allready exist, plese try another one')</script>";
        }elseif (!preg_match('/^[A-Za-z0-9.]/', $passwrd)) {
           echo "<script>alert('You can use only A-Za-z0-9.')</script>";
        }else{
            $sql = "INSERT INTO  tbl_user(name,username,password,email,role) VALUES('$name','$username','$passwrd','$mail','$role')";
            $run = $db->CateInsert($sql);
            if ($run) {
                echo "<script>alert('Succesfully User Added')</script>";
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
                <h2>Add New User</h2>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter  Name..." name="name" class="medium" />
                            </td>
                        </tr>				
                        <tr>
                            <td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter User Name..." name="username" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Password..." name="passwrd" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>E-mail</label>
                            </td>
                            <td>
                                <input type="mail" placeholder="Enter E-mail..." name="mail" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Assin Role</label>
                            </td>
                            <td>
                                <select name="role">
                                    <option>Select Admin Role</option>
                                    <option value="author">Author</option>
                                    <option value="editor">Editor</option>
                                    <option value="modarator">Modarator</option>
                                </select>
                            </td>
                        </tr>
						<tr> 
                            <td></td>
                            <td>
                                <input type="submit" name="adduser" Value="Create" />
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
