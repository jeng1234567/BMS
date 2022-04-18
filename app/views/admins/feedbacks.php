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
        <img src="../img/iconJeco.png" alt="" width="100" height="auto" style="display: inline-block"><h1>Customers Feedback</h1>
        </div>
        <div class="wrapper-border-no">
            <table id="customers">
            <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Feedback</th>
                            <th>Branch</th>
                            <th>Rating</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Maria Anders</td>
                            <td>Superb</td>
                            <td>Lunzuran Branch</td>
                            <td>* * * * *</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Maria Anders</td>
                            <td>Superb</td>
                            <td>Lunzuran Branch</td>
                            <td>* * * * *</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Maria Anders</td>
                            <td>Superb</td>
                            <td>Lunzuran Branch</td>
                            <td>* * * * *</td>
                        </tr>
            </table>
        </div>
</div>
