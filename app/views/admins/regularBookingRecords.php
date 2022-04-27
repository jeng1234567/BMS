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
            <h2 style="color: white; font-style: italic">Regular Booking Records</h2>
        </div>
        <div class="tab">
                <a href="<?php echo URLROOT; ?>/admins/regularBookingRecords"><button id="homeB" class="tablinks">Regular Booking</button></a>
                <a href="<?php echo URLROOT; ?>/admins/homeServiceRecords"><button id="regB" class="tablinks">Home Service</button></a>
                </div>
                    <div class="wrapper-border">
                        <div class="scrollable-div">
                            <table id="customers">
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Branch</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th></th>
                                </tr>
                                <?php foreach($data['admins'] as $admin): ?>
                                <tr>
                                    <td><?php echo $admin->id; ?></td>
                                    <td><?php echo $admin->customer; ?></td>
                                    <td><?php echo $admin->branch; ?></td>
                                    <td><?php echo $admin->remark; ?></td>
                                    <td><?php echo $admin->date; ?></td>
                                    <td><?php echo $admin->time; ?></td>
                                    <td>
                                        <?php if(isset($_SESSION['user_id']) == $admin->id): ?>
                                        <a
                                            class="btn green"
                                            style="margin: 1px; padding: 6px 9px 6px 9px"
                                            href="<?php echo URLROOT . "/admins/updateRegularBookingRecords/" . $admin->id ?>">
                                            Add Remarks
                                        </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])): ?>
                        </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>