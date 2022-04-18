<?php
   require APPROOT . '/views/includes/headDashboard.php';
?>
<div class="navbar dark">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>
</div>
    <?php require APPROOT . '/views/includes/sidebar.php'; ?>
<div class="wrapper-landing">
        
        <div class="container-item">
        <img src="../img/iconJeco.png" alt="" width="100" height="auto" style="display: inline-block"><h1>Customers Information</h1>
        </div>
        <div class="wrapper-border-no">
            <table id="customers">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                </tr>
                <?php foreach($data['admins'] as $admin): ?>
                <tr>
                    <td><?php echo $admin->id; ?></td>
                    <td><?php echo $admin->username; ?></td>
                    <td><?php echo $admin->email; ?></td>
                    <td><?php echo $admin->number; ?></td>
                    <td><?php echo $admin->address; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
</div>
