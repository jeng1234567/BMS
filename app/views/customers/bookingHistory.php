<?php
   require APPROOT . '/views/includes/headDashboard.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>
    <?php
       require APPROOT . '/views/includes/sidebar.php';
    ?>
<div class="wrapper-landing">
        
        <div class="container-item">
            <img src="../img/iconJeco.png" alt="" width="100" height="auto" style="display: inline-block"><h1>Booking History</h1>
        </div>
        <div class="wrapper-border">
            <?php if($_SESSION['role'] == "Customer" && isset($_SESSION['user_id'])): ?>
            <a class="btn green" href="<?php echo URLROOT; ?>/admins/addServices">
                Add
            </a>
        </div>
    <?php endif; ?>
</div>