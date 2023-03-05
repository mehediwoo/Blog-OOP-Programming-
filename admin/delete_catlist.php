<?php 


 include '../lib/session.php';
 include '../lib/Database.php';
 include '../helpers/Format.php';

 $db = new Database();
 $fm = new Format();
 $db->loginRestriction();


 $id = $_GET['id'];

 $sql = "DELETE FROM tbl_category WHERE id='$id' ";
 $stmt= $db->delete($sql);
 if ($stmt) {
 	echo "<script>alert('Category Delete Succesfully')</script>";
 	echo "<script>window.open('catlist.php?msg=category delete succesfully','_self')</script>";
 }else{
 	echo "<script>alert('Error')</script>";
 }








 ?>