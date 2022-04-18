<nav class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/admins">Booking Status</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/admins">Booking Records</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/admins">Home Service</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/admins">Customers</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/admins">Stylists</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/admins">Services</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/admins">Feedbacks</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/posts">Products</a>
        </li>
        <li class="btn-login">
            <?php if(isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/users/login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>
