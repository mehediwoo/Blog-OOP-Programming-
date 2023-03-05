<?php 


 include '../lib/session.php';
 include '../lib/Database.php';
 $db = new Database();
 $db->loginRestriction();

 $_SESSION['id']=null;
 $_SESSION['name']=null;
 header("Location:login.php");



 ?>