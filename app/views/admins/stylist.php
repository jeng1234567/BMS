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
            <img src="../img/iconJeco.png" alt="" width="100" height="auto" style="display: inline-block"><h1>Stylist</h1>
        </div>
        <div class="wrapper-border">
            <table id="customers">
                <tr>
                    <th>ID</th>
                    <th>stylist_name</th>
                    <th>branch</th>
                    <th>motto</th>
                    <th></th>
                </tr>
                <?php foreach($data['admins'] as $admin): ?>
                <tr>
                    <td><?php echo $admin->id ; ?></td>
                    <td><?php echo $admin->stylist_name; ?></td>
                    <td><?php echo $admin->branch; ?></td>
                    <td><?php echo $admin->motto; ?></td>
                    <td>
                        <?php if(isset($_SESSION['user_id']) == $admin->id): ?>
                        <a
                            class="btn orange"
                            href="<?php echo URLROOT . "/admins/updateStylist/" . $admin->id ?>">
                            Update
                        </a>
                        <form action="<?php echo URLROOT . "/admins/deleteStylist/" . $admin->id ?>" method="POST">
                            <input type="submit" name="deleteStylist" value="Delete" class="btn red">
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])): ?>
        <a class="btn green" href="<?php echo URLROOT; ?>/admins/addStylist">
            Add
        </a>
    </div>
    <?php endif; ?>
</div>
