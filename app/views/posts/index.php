<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <nav class="top-nav">
        <ul>
            <li class="btn-login">
                <?php if(isset($_SESSION['user_id']) && $_SESSION['role'] == "Admin") : ?>
                    <a href="<?php echo URLROOT; ?>/admins/">Back to Admin's Dashboard</a>
                <?php elseif(isset($_SESSION['user_id']) && $_SESSION['role'] == "Customer"): ?>
                    <a href="<?php echo URLROOT; ?>/customers/">Back to Customer's Dashboard</a>
                <?php else : ?>
                    <a href="<?php echo URLROOT; ?>/index/">Back to Homepage</a>
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

<div class="container">
    <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])): ?>
        <a class="btn green" href="<?php echo URLROOT; ?>/posts/create">
            Create
        </a>
    <?php endif; ?>
    <?php foreach($data['posts'] as $post): ?>
        <div class="container-item">
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post->user_id): ?>
                <a
                    class="btn orange"
                    href="<?php echo URLROOT . "/posts/update/" . $post->id ?>">
                    Update
                </a>
                <form action="<?php echo URLROOT . "/posts/delete/" . $post->id ?>" method="POST">
                    <input type="submit" name="delete" value="Delete" class="btn red">
                </form>
            <?php endif; ?>
            <h2>
                <?php echo $post->title; ?>
            </h2>

            <h3>
                <?php echo 'Created on: ' . date('F j h:m', strtotime($post->created_at)) ?>
            </h3>

            <p>
                <?php echo $post->body ?>
            </p>
        </div>
    <?php endforeach; ?>
    </div>
<style>
</style>
<!-- How do you get a watermelon pregnant? you PAKWAN. -->