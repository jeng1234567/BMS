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
    <?php
        $customerName = $_SESSION['username'];
    ?>
    
        <div class="container-item">
            <img src="../img/iconJeco.png" alt="" width="100" height="auto" style="display: inline-block"><h1>Booking Status</h1>
            <h2 style="color: white; font-style: italic">Home Service Records</h2>
        </div>
        <div class="tab">
                <a href="<?php echo URLROOT; ?>/admins/regularBookingRecords"><button id="homeB" class="tablinks">Regular Booking</button></a>
                <a href="<?php echo URLROOT; ?>/admins/homeServiceRecords"><button id="regB" class="tablinks">Home Service</button></a>
                </div>
                    <div class="wrapper-border">
                        <table id="customers">
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Location</th>
                                <th>Contact</th>
                                <th>Date</th>
                                <th>Person</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            <?php foreach($data['admins'] as $admin): ?>
                            <tr>
                                <td><?php echo $admin->id; ?></td>
                                <td><?php echo $admin->customer; ?></td>
                                <td><?php echo $admin->location; ?></td>
                                <td><?php echo $admin->contact; ?></td>
                                <td><?php echo $admin->date; ?></td>
                                <td><?php echo $admin->numberOfPerson; ?></td>
                                <td><?php echo $admin->remark; ?></td>
                                <td>
                                    <?php if(isset($_SESSION['user_id']) == $admin->id): ?>
                                    <a
                                        class="btn green"
                                        style="margin: 2px; padding: 6px"
                                        href="<?php echo URLROOT . "/admins/updateServices/" . $admin->id ?>">
                                        Approve
                                    </a>
                                    <form action="<?php echo URLROOT . "/admins/delete/" . $admin->id ?>" method="POST">
                                        <input type="submit" name="delete" value="Cancel" class="btn red" style="margin: 0; padding: 0">
                                    </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])): ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>