<?php
        require APPROOT . '/views/includes/headDashboard.php';
    ?>
    <div class="admin-landing">
       <div class="admin-dashboard-nav">
            <?php require APPROOT . '/views/includes/navigation.php'; ?>
       </div>
            <?php require APPROOT . '/views/includes/sidebar.php'; ?>
        <div class="wrapper-landing">
            <div class="container-item">
                <img src="../img/iconJeco.png" alt="" width="100" height="auto" style="display: inline-block"><h1>Booking Status</h1>
            </div>
            <!-- <label for="status">Status : </label>
            <input type="text" placeholder="Status" name="status">
            <br> -->
            <!-- <label for="type">Type : </label>
            <input type="text" placeholder="Type" name="type">
            <br> -->
            <label for="branch">Branch : </label>
            <input type="text" placeholder="Branch" name="branch">
            <br>
            <label for="date">Date : </label>
            <input type="date" placeholder="Date" name="date">
            <br>
            <label for="time">Time : </label>
            <input type="time" placeholder="Time" name="time">
            <div class="wrapper-border">
                <a class="btn green" href="<?php echo URLROOT; ?>/admins/addServices">
                    Update
                </a>
            </div>
        </div>
    </div>