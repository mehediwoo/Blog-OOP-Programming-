	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">

	<style>
	<?php 
        $sql = "SELECT * FROM tbl_theme WHERE id='1' ";
        $stmt= $db->select($sql);
        while ($theme = $stmt->fetch_assoc()) {
        	if ($theme['name']=='default') {
        		include 'themes/default.php';
        }elseif ($theme['name']=='green') {
        	include 'themes/green.php';
        } 
     } ?>
		

	</style>