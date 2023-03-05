<?php 


 include '../lib/session.php';
 include '../lib/Database.php';
 include '../helpers/Format.php';

 $db = new Database();
 $fm = new Format();
 $db->loginRestriction();


 $page = $_GET['delpage'];

 $sql = "DELETE FROM tbl_page WHERE id='$page' ";
 $stmt= $db->delete($sql);
 if ($stmt) {
 	echo "<script>alert('Page Delete Succesfully')</script>";
 	echo "<script>window.open('index.php?msg=Page delete succesfully','_self')</script>";
 }else{
 	echo "<script>alert('Error')</script>";
 }








 ?>