<?php 


 include '../lib/session.php';
 include '../lib/Database.php';
 include '../helpers/Format.php';

 $db = new Database();
 $fm = new Format();
 $db->loginRestriction();


 $page = $_GET['inbox'];

 $sql = "DELETE FROM tbl_contactform WHERE id='$page' ";
 $stmt= $db->delete($sql);
 if ($stmt) {
 	echo "<script>alert('succesfully Deleted')</script>";
 	echo "<script>window.open('inbox.php?msg=Message delete succesfully','_self')</script>";
 }else{
 	echo "<script>alert('Error')</script>";
 }








 ?>