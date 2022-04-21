
<?php if(isset($_SESSION['user_id']) && $_SESSION['role'] == "Admin") : ?>
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
                <img src="../img/iconJeco.png" alt="" width="100" height="auto" style="display: inline-block"><h1>Booking Records</h1>
            </div>
            <div class="tab">
                <button id="homeB" class="tablinks" onclick="openCity(event, 'London')">Home Booking</button>
                <button id="regB" class="tablinks" onclick="openCity(event, 'Paris')">Regular Services</button>
                <input type="text" class="dropD" id="myInput" onkeyup="myFunction()" placeholder="Search Customer...">
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
                            <td>Approved</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jessa Anders</td>
                            <td>Germany</td>
                            <td>March 19, 2021</td>
                            <td>12:33 PM</td>
                            <td>Approved</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>France Anders</td>
                            <td>Germany</td>
                            <td>March 19, 2021</td>
                            <td>12:33 PM</td>
                            <td>Approved</td>
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
                            <td>Approved</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                            <td>09661573159</td>
                            <td>March 19, 2021</td>
                            <td>1</td>
                            <td>Declined</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                            <td>09661573159</td>
                            <td>March 19, 2021</td>
                            <td>1</td>
                            <td>Approved</td>
                        </tr>
                    </table>
            </div>
        </div>
    </div>
    <script>
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
    </script>
<?php elseif(isset($_SESSION['user_id']) && $_SESSION['role'] == "Customer") : ?>
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
            </div>
            <div class="tab">
                <button id="homeB" class="tablinks" onclick="openCity(event, 'London')">Regular Booking</button>
                <button id="regB" class="tablinks" onclick="openCity(event, 'Paris')">Home Service</button>
                </div>
                <div id="London" class="tabcontent">
                    <label for="branch">Branch : </label>
                    <input type="text" placeholder="Branch" name="branch">
                    <br>
                    <label for="date">Date : </label>
                    <input type="date" placeholder="Date" name="date">
                    <br>
                    <label for="time">Time : </label>
                    <input type="time" placeholder="Time" name="time">
                    <div class="wrapper-border">
                        <a class="btn green" href="<?php echo URLROOT; ?>/admins/addServices">
                            Add
                        </a>
                    </div>
                </div>
                <div id="Paris" class="tabcontent">
                    <label for="date">Date : </label>
                    <input type="date" placeholder="Date" name="date">
                    <br>
                    <label for="time">Time : </label>
                    <input type="time" placeholder="Time" name="time">
                    <br>
                    <label for="location">Location : </label>
                    <input type="text" placeholder="Location" name="location">
                    <br>
                    <label for="contact">Contact : </label>
                    <input type="number" placeholder="Contact" name="contact">
                    <br>
                    <label for="noOfPerson">Number of Person : </label>
                    <input type="number" placeholder="No. of Person" name="noOfPerson">
                    <div class="wrapper-border">
                        <a class="btn green" href="<?php echo URLROOT; ?>/admins/addServices">
                            Add
                        </a>
                    </div>
            </div>
        </div>
    </div>
    <script>
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
    </script>
<?php else : ?>
    <?php
        require APPROOT . '/views/includes/head.php';
    ?>
    <div id="section-landing">
        <div>
            <?php require APPROOT . '/views/includes/homeNav.php'; ?>
        </div>
    <div class="wrapper-landing" id="wrapper-landing">
        <div style="text-align: center">
            <img src="../img/iconJeco.png" alt="" width="200" height="auto" style="display: inline-block; margin: 0; padding: 0">
        </div>
        <h1>Jay Tayers</h1>
        <h2>La Barberia de Jeco</h2>
    </div>
    <div class="contactSect" id="contactSect">
        <div style="text-align: center; padding-top: 30px">
            <img src="../img/iconJeco.png" alt="" width="150" height="auto" style="display: inline-block; margin: 0; padding: 0"><h2>Contacts</h2>
        </div>
        <div style="text-align: center; padding-top: 50px">
            <img src="../img/tele.png" alt="" width="50" height="auto" style="display: inline-block; margin: 0; padding: 0; vertical-align: middle"><i><h1 style="display: inline"> 09467532768 / 992 5647</h1></i>
        </div>
        <div style="text-align: center; padding-top: 30px">
            <img src="../img/faceb.png" alt="" width="70" height="auto" style="display: inline-block; margin: 0; padding: 0; vertical-align: middle"><i><h1 style="display: inline"> La Barberia de Jeco</h1></i> 
        </div>
        <div style="text-align: center; padding-top: 30px">
            <img src="../img/instag.png" alt="" width="80" height="auto" style="display: inline-block; margin: 0; padding: 0; vertical-align: middle"><i><h1 style="display: inline"> La Barberia de Jeco</h1></i>
        </div>
    </div>
    <div class="aboutSect" id="aboutSect">
        <div style="text-align: center; padding-top: 30px">
            <img src="../img/iconJeco.png" alt="" width="150" height="auto" style="display: inline-block; margin: 0; padding: 0"><h2>About</h2>
        </div>
        <p style="width: 80%; height: auto; margin-left: 140px; color: black">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rerum laborum voluptate vero delectus similique provident libero accusamus consectetur! Laborum unde ipsum magnam, ipsa pariatur laboriosam. Itaque libero voluptatibus a odit.</p>
    </div>
    <div class="porfolioSect" id="porfolioSect">
        <div style="text-align: center; padding-top: 30px">
            <img src="../img/iconJeco.png" alt="" width="150" height="auto" style="display: inline-block; margin: 0; padding: 0"><h2>Portfolio</h2>
        </div>
        <div class="grid-container" id="" style="overflow-y: scroll; height:400px">
            <div class="grid-item">
                <img src="../img/iconJeco.png" alt="" width="100" height="auto">
            </div>
            <div class="grid-item">
                <img src="../img/iconJeco.png" alt="" width="100" height="auto">
            </div>
            <div class="grid-item">
                <img src="../img/iconJeco.png" alt="" width="100" height="auto">
            </div>
            <div class="grid-item">
                <img src="../img/iconJeco.png" alt="" width="100" height="auto">
            </div>
            <div class="grid-item">
                <img src="../img/iconJeco.png" alt="" width="100" height="auto">
            </div>
            <div class="grid-item">
                <img src="../img/iconJeco.png" alt="" width="100" height="auto">
            </div>
            <div class="grid-item">
                <img src="../img/iconJeco.png" alt="" width="100" height="auto">
            </div>
            <div class="grid-item">
                <img src="../img/iconJeco.png" alt="" width="100" height="auto">
            </div>
            <div class="grid-item">
                <img src="../img/iconJeco.png" alt="" width="100" height="auto">
            </div>
            <div class="grid-item">
                <img src="../img/iconJeco.png" alt="" width="100" height="auto">
            </div>
            <div class="grid-item">
                <img src="../img/iconJeco.png" alt="" width="100" height="auto">
            </div>
            <div class="grid-item">
                <img src="../img/iconJeco.png" alt="" width="100" height="auto">
            </div>
        </div>
    </div>
    <script>
        let btn = document.getElementById('btnAbout');
        let btn1 = document.getElementById('btnPortfolio');
        let btn2 = document.getElementById('btnContact');
        let div = document.getElementById('aboutSect');
        let div2 = document.getElementById('contactSect');
        let div1 = document.getElementById('porfolioSect');
        let divWrapper = document.getElementById('wrapper-landing');
        
        btn.addEventListener('click', () =>{
            if(div.style.display === 'none'){
                div1.style.display = 'none';
                div2.style.display = 'none';
                div.style.display = 'block';
                divWrapper.style.display = 'none';
            }else{
                div2.style.display = 'none';
                div.style.display = 'none';
                div1.style.display = 'none';
                divWrapper.style.display = 'block';
            }
        })
        btn1.addEventListener('click', () =>{
            if(div1.style.display === 'none'){
                div1.style.display = 'block';
                div2.style.display = 'none';
                div.style.display = 'none';
                divWrapper.style.display = 'none';
            }else{
                div2.style.display = 'none';
                div.style.display = 'none';
                div1.style.display = 'none';
                divWrapper.style.display = 'block';
            }
        })
        btn2.addEventListener('click', () =>{
            if(div2.style.display === 'none'){
                div2.style.display = 'block';
                div1.style.display = 'none';
                div.style.display = 'none';
                divWrapper.style.display = 'none';
            }else{
                div2.style.display = 'none';
                div.style.display = 'none';
                div1.style.display = 'none';
                divWrapper.style.display = 'block';
            }
        })
    </script>
<?php endif ; ?> 
