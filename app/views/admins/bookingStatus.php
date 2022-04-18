<?php
        require APPROOT . '/views/includes/headDashboard.php';
    ?>
    <div class="admin-landing">
       <div class="admin-dashboard-nav">
            <?php require APPROOT . '/views/includes/navigation.php'; ?>
       </div>
            <?php require APPROOT . '/views/includes/sidebar.php'; ?>
        <div class="wrapper-landing">
            <div class="container-item">
                <img src="../img/iconJeco.png" alt="" width="100" height="auto" style="display: inline-block"><h1>Booking Status</h1>
            </div>
            <div class="tab">
                <button id="homeB" class="tablinks" onclick="openCity(event, 'London')">Home Booking</button>
                <button id="regB" class="tablinks" onclick="openCity(event, 'Paris')">Regular Services</button>
                <input type="text" class="dropD" placeholder="Search Customer...">
                </div>
                <div id="London" class="tabcontent">
                    <table id="customers">
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Branch</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Remarks</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                            <td>March 19, 2021</td>
                            <td>12:33 PM</td>
                            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])): ?>
                            <td>
                                <a class="btn green" href="<?php echo URLROOT; ?>/admins/addBranch">
                                    Add Remarks
                                </a>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                            <td>March 19, 2021</td>
                            <td>12:33 PM</td>
                            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])): ?>
                            <td>
                                <a class="btn green" href="<?php echo URLROOT; ?>/admins/addBranch">
                                    Add Remarks
                                </a>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                            <td>March 19, 2021</td>
                            <td>12:33 PM</td>
                            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])): ?>
                            <td>
                                <a class="btn green" href="<?php echo URLROOT; ?>/admins/addBranch">
                                    Add Remarks
                                </a>
                            </td>
                            <?php endif; ?>
                        </tr>
                    </table>
                </div>

                <div id="Paris" class="tabcontent">
                    <table id="customers">
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Location</th>
                            <th>Contact</th>
                            <th>Date</th>
                            <th>No. Person</th>
                            <th>Remarks</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                            <td>09661573159</td>
                            <td>March 19, 2021</td>
                            <td>1</td>
                            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])): ?>
                            <td>
                                <a class="btn green" href="<?php echo URLROOT; ?>/admins/addBranch">
                                    Add Remarks
                                </a>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                            <td>09661573159</td>
                            <td>March 19, 2021</td>
                            <td>1</td>
                            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])): ?>
                            <td>
                                <a class="btn green" href="<?php echo URLROOT; ?>/admins/addBranch">
                                    Add Remarks
                                </a>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                            <td>09661573159</td>
                            <td>March 19, 2021</td>
                            <td>1</td>
                            <?php if($_SESSION['role'] == "Admin" && isset($_SESSION['user_id'])): ?>
                            <td>
                                <a class="btn green" href="<?php echo URLROOT; ?>/admins/addBranch">
                                    Add Remarks
                                </a>
                            </td>
                            <?php endif; ?>
                        </tr>
                    </table>
            </div>
        </div>
    </div>
    <script>
        const element = document.getElementById('homeB');
        element.click();

        function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        }
    </script>