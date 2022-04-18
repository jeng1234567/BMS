<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <nav class="top-nav">
        <ul>
            <li class="btn-login">
                <?php if(isset($_SESSION['user_id']) && $_SESSION['role'] == "Admin") : ?>
                    <a href="#"><?php echo  "Hello! " . $_SESSION['username']; ?></a>
                    <button>Back</button>
                <?php elseif(isset($_SESSION['user_id']) && $_SESSION['role'] == "Customer"): ?>
                    <a href="#"><?php echo  "Hello! " . $_SESSION['username']; ?></a>
                    <button>Back</button>
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

<?php if(isset($_SESSION['role'])) : ?>
    <div class="container">
        <?php if(isLoggedIn()): ?>
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
<?php else : ?>
    
<?php endif; ?>


