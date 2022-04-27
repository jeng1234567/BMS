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
                <img src="../img/iconJeco.png" alt="" width="100" height="auto" style="display: inline-block"><h1>Booking</h1>
                <h2 style="color: white; font-style: italic">Regular Booking</h2>
            </div>
            <div class="tab">
                <a href="<?php echo URLROOT; ?>/customers/regularBooking"><button id="homeB" class="tablinks">Regular Booking</button></a>
                <a href="<?php echo URLROOT; ?>/customers/homeServiceBooking"><button id="regB" class="tablinks">Home Service</button></a>
                </div>
                    <form action="<?php echo URLROOT; ?>/customers/regularBooking" method="POST">
                        <br>
                        <label for="branch">Branch : </label>
                        <select name="branch" style="background: none; font-size: 20px ">
                            <?php foreach($data['customers'] as $customer): ?>
                                <option value="<?php echo $customer->branch_name ?>"><?php echo $customer->branch_name ?></option>
                            <?php endforeach; ?>
                        </select>
    
                        <div class="form-item">
                            <label for="date">Date : </label>
                            <input type="date" placeholder="Date" name="date">
                            <span class="invalidFeedback">
                                <?php echo $data['dateError']; ?>
                            </span>
                        </div>

                        <div class="form-item">
                            <label for="time">Time : </label>
                            <input type="time" placeholder="Time" name="time">
                            <span class="invalidFeedback">
                                <?php echo $data['timeError']; ?>
                            </span>
                        </div>
                        <div class="wrapper-border">
                            <button class="btn green" name="submit" type="submit">Add</button>
                        </div>
                </form>
        </div>
    </div>
    <!-- <script>
        const element = document.getElementById('homeB');
        element.click();

        function myFunction() {
        // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("customers");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }

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
    </script> -->