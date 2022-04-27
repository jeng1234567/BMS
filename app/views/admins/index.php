
<?php if(isset($_SESSION['user_id']) && $_SESSION['role'] == "Admin") : ?>
    <?php 
    header("Location: " . URLROOT . "/admins/regularBookingRecords");
    ?>
<?php elseif(isset($_SESSION['user_id']) && $_SESSION['role'] == "Customer") : ?>
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
                <img src="../img/iconJeco.png" alt="" width="100" height="auto" style="display: inline-block"><h1>Booking</h1>
            </div>
            <div class="tab">
                <button id="homeB" class="tablinks" onclick="openCity(event, 'London')">Regular Booking</button>
                <button id="regB" class="tablinks" onclick="openCity(event, 'Paris')">Home Service</button>
                </div>
                <div id="London" class="tabcontent">
                    <input type="text" placeholder="Branch">
                    <br>
                    <input type="date" placeholder="Date">
                    <br>
                    <input type="time" placeholder="Time">
                </div>
                <div id="Paris" class="tabcontent">
                    <input type="date" placeholder="Date">
                    <br>
                    <input type="time" placeholder="Time">
                    <br>
                    <input type="text" placeholder="Location">
                    <br>
                    <input type="number" placeholder="Contact">
                    <br>
                    <input type="text" placeholder="Number of Person">
            </div>
        </div>
<?php else : ?>
    <?php
        require APPROOT . '/views/includes/head.php';
    ?>
    <div id="section-landing">
        <div>
            <?php require APPROOT . '/views/includes/homeNav.php'; ?>
        </div>
    <div class="wrapper-landing">
        <h1>Jay Tayers</h1>
        <h2>Booking Management System</h2>
    </div>
    //hello
<?php endif ; ?> 
