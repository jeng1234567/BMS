<div class="navbar dark">
    <nav class="top-nav">
        <ul>
            <li>
                <a href="<?php echo URLROOT; ?>/index/">Home</a>
            </li>
            <li>
                <a href="#" id="btnAbout">About</a>
            </li>
            <li>
                <a href="#" id="btnPortfolio">Portfolio</a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/posts/">Products</a>
            </li>
            <li>
                <a href="#" id="btnContact">Contacts</a>
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
</div>
