	<?php 
		if (isset($_GET['pageid'])) {
			$page_id = $_GET['pageid'];
			$query = "SELECT * FROM tbl_page WHERE id='$page_id'";
			$run   = $db->select($query);
			while ($row = $run->fetch_assoc()) {
	 ?>
		<title><?php echo $row['name']; ?> || <?php echo TITLE; ?></title>
	<?php } }elseif(isset($_GET['id'])){
			$post_id = $_GET['id'];
			$querys = "SELECT * FROM tbl_post WHERE id='$post_id'";
			$runs   = $db->select($querys);
			while ($postRow = $runs->fetch_assoc()) { ?>
			<title><?php echo substr($postRow['title'], 0,23); ?> || <?php echo TITLE; ?></title>
		<?php	}
	}else{ ?>
			<title><?php echo $fm->title(); ?> || <?php echo TITLE; ?></title>
	<?php } ?>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<?php
	if (isset($_GET['id'])) {
		$postId = $_GET['id'];
	}else{
		$postId = '';
	}
	$sql = "SELECT * FROM tbl_post WHERE id='$postId'";
    $run = $db->select($sql);
    if ($run) {
    	while ($row = $run->fetch_array()) { ?>
    <meta name="keywords" content="<?php echo $row['tags']; ?>">
	<?php } }else{ ?>
<meta name="keywords" content="Blog, website, personal blog">
<?php	} ?>
	
	<meta name="author" content="Mehedi Hasan">