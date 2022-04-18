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
        Update post
    </h1>

    <form
    action="<?php echo URLROOT; ?>/posts/update/<?php echo $data['post']->id ?>" method="POST">
        <div class="form-item">
            <input
                type="text"
                name="title"
                value="<?php echo $data['post']->title ?>">

            <span class="invalidFeedback">
                <?php echo $data['titleError']; ?>
            </span>
        </div>

        <div class="form-item">
            <textarea name="body" placeholder="Enter your post..."><?php echo $data['post']->body ?></textarea>

            <span class="invalidFeedback">
                <?php echo $data['bodyError']; ?>
            </span>
        </div>

        <button class="btn green" name="submit" type="submit">Submit</button>
    </form>
</div>
