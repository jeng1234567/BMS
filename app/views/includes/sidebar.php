<style>
<?php include "style.css";?>
</style>

<div class="side-nav">
<a href="#"><span style="margin-left: 100px; font-weight: 300px"><?php echo ucwords($_SESSION['role']); ?></span> </a>
    <hr style="height: 0.1; width: 210px">
    <ul>
        <li><center><span>
            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])): ?>
                <a href="<?php echo URLROOT; ?>/admins/bookingStatus">Booking Status</a>
            <?php elseif($_SESSION['role'] == "Customer" && isset($_SESSION['user_id'])): ?>
                <a href="<?php echo URLROOT; ?>/posts">View Products</a>
            <?php else: ?>

            <?php endif; ?></span></center>
        </li>
        <hr>
        <li><center><span>
            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/admins/">Booking Records</a>
            <?php elseif($_SESSION['role'] == "Customer" && isset($_SESSION['user_id'])): ?>
                <a href="<?php echo URLROOT; ?>/customers/">Booking</a>
            <?php else: ?>
               
            <?php endif; ?></span></center>
        </li>
        <hr>
        <li><center><span>
            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/admins/services">Service</a>
            <?php elseif($_SESSION['role'] == "Customer" && isset($_SESSION['user_id'])): ?>
                <a href="<?php echo URLROOT; ?>/customers/bookingStatus">Booking Status</a>
            <?php else: ?>
                
            <?php endif; ?></span></center>
        </li>
        <hr>
        <li><center><span>
            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/admins/stylist">Stylist</a>
            <?php elseif($_SESSION['role'] == "Customer" && isset($_SESSION['user_id'])): ?>
                <a href="<?php echo URLROOT; ?>/customers/bookingHistory">Booking History</a>
            <?php else: ?>
            <?php endif; ?></span></center>
        </li>
        <hr>
        <li><center><span>
            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/admins/customers">Customer</a>
            <?php elseif($_SESSION['role'] == "Customer" && isset($_SESSION['user_id'])): ?>
                <a href="<?php echo URLROOT; ?>/customers/">Stylists</a>
            <?php else: ?>
            <?php endif; ?></span></center>
        </li>
        <hr>
        <li><center><span>
            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/admins/feedbacks">Feedbacks</a>
            <?php elseif($_SESSION['role'] == "Customer"): ?>
                <a href="<?php echo URLROOT; ?>/customers/">Services</a>
            <?php else: ?>
            <?php endif; ?></span></center>
        </li>
        <hr>
        <li><center><span>
            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/posts">Products</a>
            <?php elseif($_SESSION['role'] == "Customer" && isset($_SESSION['user_id'])): ?>
                <a href="<?php echo URLROOT; ?>/customers/">Feedbacks</a>
            <?php else: ?>
            <?php endif; ?></span></center>
        </li>
        <hr>
        <li><center><span>
            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/admins/branch">Branch</a>
            <?php elseif($_SESSION['role'] == "Customer" && isset($_SESSION['user_id'])): ?>
                <a href="<?php echo URLROOT; ?>/customers/">Setting</a>
            <?php else: ?>
            <?php endif; ?></span></center>
        </li>
        <hr>
    </ul>
</div>


