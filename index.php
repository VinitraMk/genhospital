<?php
    ob_start();
    session_start();
    #include 'assets/php/login.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>General Hospital</title>
        <link rel="shortcut icon" href="GHLogo.ico" type="image/x-icon">
        <link href="assets/css/index.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <script src="assets/js/index.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body link="#1da2f2">
        <header>
            <span style="font-size:30px;cursor:pointer;float:left;" onclick="openNav()">&#9776;</span>
            <h1>General Hospital</h1>

            <div id="profile">
                <?php
                    if(array_key_exists('logged',$_SESSION)) {
                        if($_SESSION['logged'] && $_SESSION['user']) {
                            $str="".$_SESSION['user'];
                            echo "<div class='dropdown'>
                                <button onclick='myFunction()' class='dropbtn'>".$str."</button>
                                    <div id='myDropdown' class='dropdown-content'>
                                        <a href='profile.php'>Profile</a>
                                        <a href='assets/php/logout.php'>Logout</a>
                                        <a href='schedule.php'>Schedule</a>
                                    </div>
                                <div>
    							<script>
                                    /* When the user clicks on the button, 
                                    toggle between hiding and showing the dropdown content */
                                    function myFunction() {
                                        document.getElementById('myDropdown').classList.toggle('show');
                                    }
    
                                    // Close the dropdown if the user clicks outside of it
                                    window.onclick = function(event) {
                                        if (!event.target.matches('.dropbtn')) {
    
                                            var dropdowns = document.getElementsByClassName('dropdown-content');
                                            var i;
                                            for (i = 0; i < dropdowns.length; i++) {
                                                var openDropdown = dropdowns[i];
                                                if (openDropdown.classList.contains('show')) {
                                                  openDropdown.classList.remove('show');
                                                }
                                            }
                                        }
                                    }
                                </script>";
                        }
                    }
                    else {
                        echo "<div class='dropdown'>
                                 <a href='login.html'><button class='dropbtn'>Login</button></a></div>";
                        
                    }
                ?>
            </div>
        </header>

	<div class="slideshow-container">
        <div class="mySlides fade">
        <img src="assets/images/ghimg1.jpg" style="width:100%; height:100%">
        </div>

        <div class="mySlides fade">
        <img src="assets/images/ghimg2.jpg" style="width:100%; height:100%">
        </div>

        <div class="mySlides fade">
        <img src="assets/images/ghimg3.jpg" style="width:100%; height:100%">
        </div>

        <div class="mySlides fade">
        <img src="assets/images/ghimg4.jpg" style="width:100%; height:100%">
        </div>

        <div class="mySlides fade">
        <img src="assets/images/ghimg5.jpg" style="width:100%; height:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
              showSlides(slideIndex += n);
            }

            function currentSlide(n) {
              showSlides(slideIndex = n);
            }

            function showSlides(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("dot");
              if (n > slides.length) {slideIndex = 1} 
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none"; 
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block"; 
              dots[slideIndex-1].className += " active";
            }

        </script>
    </div>
<br/><br/>
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 

</div>

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="add_staff.html">Add Staff</a>
            <a href="/assets/php/frame/Sched.html">View Schedule</a>
            <a href="/assets/php/frame/Patient.html">View Patient Records</a>
            <a href="add_patient.html">Add Patient Record</a>
            <a href="/assets/php/frame/Visit.html">View Visitation Records</a>
            <a href="book_apt.html">Book Appointment</a>
            <a href="cancel_apt.html">Cancel Appointment</a>

        </div>
        <footer style='position:fixed;bottom:0;left:0;right:0;height:100px;font-family: "Times New Roman", Times, serif;font-size: 125%' >

            Created By:<br>
            Vinitra Muralikrishnan (1511065)<br>
            Rohan Gupta (1511077)
        </footer>
    </body>
<html>
<?php
    ob_end_flush();
?>

