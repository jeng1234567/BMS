<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <nav class="top-nav">
        <ul>
            <li class="btn-login">
                <?php if(isset($_SESSION['user_id']) && $_SESSION['role'] == "Admin") : ?>
                    <a href="<?php echo URLROOT; ?>/admins/">Back to Admins Dashboard</a>
                <?php elseif(isset($_SESSION['user_id']) && $_SESSION['role'] == "Customer"): ?>
                    <a href="<?php echo URLROOT; ?>/customers/">Back to Customers Dashboard</a>
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
</div>

<div class="container center">
    <h1>
        Add Stylist
    </h1>
    <form action="<?php echo URLROOT; ?>/admins/addStylist" method="POST">
        <div class="form-item">
            <input type="text" name="stylist_name" placeholder="Stylist...">
            <span class="invalidFeedback">
                <?php echo $data['stylistError']; ?>
            </span>
        </div>

        <div class="form-item">
            <input type="text" name="branch" placeholder="Branch...">
            <span class="invalidFeedback">
                <?php echo $data['branchError']; ?>
            </span>
        </div>

        <div class="form-item">
            <input type="text" name="motto" placeholder="Motto...">
            <span class="invalidFeedback">
                <?php echo $data['mottoError']; ?>
            </span>
        </div>

        <button class="btn green" name="submit" type="submit">Submit</button>
    </form>
</div>
