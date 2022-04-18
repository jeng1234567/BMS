<style>
<?php include "style.css";?>
</style>
<nav class="top-nav">
    <ul>
        <li class="btn-login">
            <?php if(isset($_SESSION['user_id']) && $_SESSION['role'] == "Admin") : ?>
                <a href="#"><?php echo  "Hello! " . $_SESSION['username']; ?></a>
            <?php elseif(isset($_SESSION['user_id']) && $_SESSION['role'] == "Customer"): ?>
                <a href="#"><?php echo  "Hello! " . $_SESSION['username']; ?></a>
            <?php else : ?>

            <?php endif; ?>
        </li>
        <li class="btn-login black">
            <?php if(isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/users/login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>
