<?php 
    include '../lib/Database.php';
    include '../lib/session.php';
    include '../helpers/Format.php';

    $db = new Database();
    $fm = new Format();
    $db->loginRestriction();
?>
<?php include 'inc/header.php'; ?>
        <!-- Sidebar Start -->
        <?php include 'inc/sidebar.php'; ?>
        <!-- Sidebar End -->
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2> Dashbord</h2>
                <div class="block">               
                  Welcome admin panel        
                </div>
            </div>

        </div>
        <!-- Grid 10 -->
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <?php include 'inc/footer.php'; ?>
</body>
</html>
