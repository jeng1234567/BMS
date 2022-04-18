<?php
   require APPROOT . '/views/includes/headDashboard.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>
    <?php
       require APPROOT . '/views/includes/sidebar.php';
    ?>
<div class="wrapper-landing">
        
        <div class="container-item">
            <img src="../img/iconJeco.png" alt="" width="100" height="auto" style="display: inline-block"><h1>Services</h1>
        </div>
        <div class="wrapper-border">
            <table id="customers">
                <tr>
                    <th>ID</th>
                    <th>Services</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                <?php foreach($data['admins'] as $admin): ?>
                <tr>
                    <td><?php echo $admin->id; ?></td>
                    <td><?php echo $admin->service; ?></td>
                    <td><?php echo $admin->price; ?></td>
                    <td>
                        <?php if(isset($_SESSION['user_id']) == $admin->id): ?>
                        <a
                            class="btn orange"
                            href="<?php echo URLROOT . "/admins/updateServices/" . $admin->id ?>">
                            Update
                        </a>
                        <form action="<?php echo URLROOT . "/admins/services/" . $admin->id ?>" method="POST">
                            <input type="submit" name="delete" value="Delete" class="btn red">
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])): ?>
            <a class="btn green" href="<?php echo URLROOT; ?>/admins/addServices">
                Add
            </a>
        </div>
    <?php endif; ?>
</div>