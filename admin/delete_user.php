<?php 


 include '../lib/session.php';
 include '../lib/Database.php';
 include '../helpers/Format.php';

 $db = new Database();
 $fm = new Format();
 $db->loginRestriction();


 $userid = $_GET['userid'];

 $sql = "DELETE FROM tbl_user WHERE id='$userid' ";
 $stmt= $db->delete($sql);
 if ($stmt) {
 	echo "<script>alert('User has been  Deleted')</script>";
 	echo "<script>window.open('userlist.php?msg=User delete succesfully','_self')</script>";
 }else{
 	echo "<script>alert('Error')</script>";
 }








 ?>