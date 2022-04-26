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
            <img src="../img/iconJeco.png" alt="" width="100" height="auto" style="display: inline-block"><h1>Home Service Booking History</h1>
        </div>
        <div class="tab">
                <a href="<?php echo URLROOT; ?>/customers/regularBookingHistory"><button id="homeB" class="tablinks">Regular Booking</button></a>
                <a href="<?php echo URLROOT; ?>/customers/homeServiceBookingHistory"><button id="regB" class="tablinks">Home Service</button></a>
                </div>
                    <div class="wrapper-border">
                    <?php
                            $customerName = $_SESSION['username'];
                            echo $customerName;
                        ?>
                        <table id="customers">
                            <tr>
                                <th>ID</th>
                                <th>Location</th>
                                <th>Contact</th>
                                <th>Person</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th></th>
                            <?php foreach($data['customers'] as $customer): ?>
                            <tr>
                                <td><?php echo $customer->id; ?></td>
                                <td><?php echo $customer->location; ?></td>
                                <td><?php echo $customer->contact; ?></td>
                                <td><?php echo $customer->numberOfPerson; ?></td>
                                <td><?php echo $customer->type; ?></td>
                                <td><?php echo $customer->date; ?></td>
                                <td><?php echo $customer->time; ?></td>
                                <td>
                                    <?php if(isset($_SESSION['user_id']) == $customer->id): ?>
                                    <a
                                        class="btn orange"
                                        href="<?php echo URLROOT . "/customers/updateServices/" . $customer->id ?>">
                                        Update
                                    </a>
                                    <form action="<?php echo URLROOT . "/customers/delete/" . $customer->id ?>" method="POST">
                                        <input type="submit" name="delete" value="Delete" class="btn red">
                                    </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])): ?>
                        <a class="btn green" href="<?php echo URLROOT; ?>/customers/addServices">
                            Add
                        </a>
                        
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

