<?php
// Database connection parameters

$host = "localhost"; // Hostname (e.g., "localhost")
$username = "u331863597_biec"; // Database username
$password = "psf@BIEC69"; // Database password
$database = "u331863597_event"; // Database name

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch investor data including image URL from the database
$query = "SELECT id, name, image_url, has_arrived FROM investors";
$result = mysqli_query($conn, $query);

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/navbarAndFooter/PSF24 White.webp">

    <title>Pune Startup Fest'24</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&family=Nothing+You+Could+Do&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                        nycd: ['Nothing You Could Do', 'cursive'],
                    },
                },
            },
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../styles/footer24.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="../styles/navbar24.css">



    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #566787;
            background: #001247;
            font-family: 'Varela Round', sans-serif;
            font-size: 17px;
        }



        .table-responsive {
            margin: 60px 0;
        }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px 25px;
            border-radius: 30px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-wrapper .btn {
            float: right;
            color: #333;
            background-color: #fff;
            border-radius: 3px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-wrapper .btn:hover {
            color: #333;
            background: #f2f2f2;
        }

        .table-wrapper .btn.btn-primary {
            color: black;
            background: #bfcfff;
            size: 12px;
        }

        .table-wrapper .btn.btn-primary:hover {
            background: #fff;
        }

        .table-title .btn {
            font-size: 13px;
            border: none;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        .table-title {
            color: black;
            background: #bfcfff;
            padding: 16px 25px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .show-entries select.form-control {
            width: 60px;
            margin: 0 5px;
        }

        .table-filter .filter-group {
            float: right;
            margin-left: 15px;
        }

        .table-filter input,
        .table-filter select {
            height: 34px;
            border-radius: 3px;
            border-color: #ddd;
            box-shadow: none;
        }

        .table-filter {
            padding: 5px 0 15px;
            border-bottom: 1px solid #e9e9e9;
            margin-bottom: 5px;
        }

        .table-filter .btn {
            height: 34px;
        }

        .table-filter label {
            font-weight: normal;
            margin-left: 10px;
        }

        .table-filter select,
        .table-filter input {
            display: inline-block;
            margin-left: 5px;
        }

        .table-filter input {
            width: 200px;
            display: inline-block;
        }

        .filter-group select.form-control {
            width: 110px;
        }

        .filter-icon {
            float: right;
            margin-top: 7px;
        }

        .filter-icon i {
            font-size: 18px;
            opacity: 0.7;
        }

        .table img {
            max-width: 60px;
            height: 60px;
            border-radius: 10%;
            overflow: hidden;
        }


        table.table tr th,
        table.table tr td {
            border-color: #bfcfff;
            /*#e9e9e9*/
            padding: 12px 15px;
            vertical-align: middle;
            text-align: center;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 80px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #bfcfff;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.view {
            width: 15px;
            height: 15px;
            color: #2196F3;
            border: 2px solid;
            border-radius: 8px;
            text-align: center;
        }

        table.table td a.view i {
            font-size: 22px;
            margin: 2px 0 0 1px;
        }

        table.table .avatar {
            border-radius: 12%;
            vertical-align: middle;
            margin-right: 10px;
            size: 15px;
        }

        h1 {

            font-family: Garamond, serif;

        }

        .circle {
            width: 60px;
            height: 60px;
            border-radius: 10%;
            overflow: hidden;
        }

        .circle img {
            width: 110%;
            height: 110%;
            object-fit: cover;
        }

        .status {
            font-size: 30px;
            margin: 2px 2px 0 0;
            display: inline-block;
            vertical-align: middle;
            line-height: 10px;
        }

        .text-success {
            color: #10c469;
        }

        .text-info {
            color: #62c9e8;
        }

        .text-warning {
            color: #FFC107;
        }

        .text-danger {
            color: #ff5b5b;
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>

    <!-- NAVBAR START -->
    <nav style="position: fixed; z-index: 9999999;">
        <input type="checkbox" id="checkbox3" class="checkbox3 visuallyHidden">
        <label for="checkbox3" class="checkbtn">
            <div class="hamburger hamburger3">
                <span class="bar bar1"></span>
                <span class="bar bar2"></span>
                <span class="bar bar3"></span>
                <span class="bar bar4"></span>
  
            </div>
        </label>
  
        <!-- <input type="checkbox" id="check">
  <label for="check" class="checkbtton">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    
  </label> -->
        <!-- <div class="imgg"><a href="../main"><img  class="imgg" src="PSF + Marsh White1.webp" alt=""></a></div> -->
  
        <ul>
            <!-- <img class="imgg" src="PSF + Marsh White1.webp" alt="PSF + Marsh White1.webp"> -->
  
            <li> <a href="../main.html"> <i id="icon" class="fa-solid fa-house icon" style="padding-right: 0.5rem;"></i>
                    Home</a>
            </li>
            <li><a href="../aboutus.html"> <i id="icon" class="fa-regular fa-file-lines"
                        style="padding-right: 0.5rem;"></i> About
                    Us</a>
            </li>
  
            <li><a href="../events.html"> <i id="icon" class="fa-sharp fa-solid fa-puzzle-piece"
                        style="padding-right: 0.5rem;"></i>Events</a></li>
  
  
            <li><a href="../investor.html"><i id="icon" class="fa-solid fa-shoe-prints"
                        style="padding-right: 0.5rem;"></i>Investors</a></li>
            <li><a href="../partners.html"><i id="icon" class="fa-solid fa-envelope-open-text"
                        style="padding-right: 0.5rem;"></i>Sponsors</a></li>
  
            <div class="dropdown ">
                <button class="dropbtn">OTHER <i class="fa-solid fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <a href="../internship_portal.html"> <i id="icon" class="fa-regular fa-calendar-days"
                            style="padding-right: 0.5rem;"></i>INTERNSHIP
                        PORTAL
                    </a>
                    <a href="../alumni.html"> <i id="icon" class="fa-regular fa-people-group"
                            style="padding-right: 0.5rem;"></i>Alumni
                    </a>
                    <a href="../startupexpo.html"> <i id="icon" class="fa-solid fa-stairs"
                            style="padding-right: 0.5rem;"></i>STARTUP</a>
                    <a href="../visitorreg.php"> <i id="icon" class="fa-solid fa-hand-holding-dollar"
                            style="padding-right: 0.5rem;"></i>Registration</a>
                    <a href="../team.html"> <i id="icon" class="fa-solid fa-hand-holding-dollar"
                            style="padding-right: 0.5rem;"></i>Team</a>
                </div>
            </div>
            <li class="mobli"><a href="../internship_portal.html"> <i id="icon" class="fa-regular fa-calendar-days"
                        style="padding-right: 0.5rem;"></i>Internship
                    Portal</a></li>
            <li class="mobli"><a href="../alumni.html"> <i id="icon" class="fa-solid fa-people-group"
                        style="padding-right: 0.5rem;"></i>Alumni
                </a></li>
            <li class="mobli"><a href="../startupexpo.html"> <i id="icon" class="fa-solid fa-stairs"
                        style="padding-right: 0.5rem;"></i>STARTUP</a></li>
            <li class="mobli"><a href="../visitorreg.php"> <i id="icon" class="fa-solid fa-shoe-prints"
                        style="padding-right: 0.5rem;"></i>Registration</a></li>
            <li class="mobli"><a href="../team.html"> <i id="icon" class="fa-solid fa-user-group"
                        style="padding-right: 0.5rem;"></i>Team</a></li>
  
            <div class="dropdown">
                <button class="dropbtn">FEEDBACK <i class="fa-solid fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <a href="../startup_feedback.html"> <i id="icon" class="fa-regular fa-calendar-days"
                            style="padding-right: 0.5rem;"></i>Startup
                        Feedback
                    </a>
                    <a href="../investor_feedback.html"> <i id="icon" class="fa-regular fa-calendar-days"
                            style="padding-right: 0.5rem;"></i>Investor
                        Feedback
                    </a>
  
                </div>
            </div>
            <li class="mobli"><a href="../startup_feedback.html"> <i id="icon" class="fa-solid fa-comments"
                        style="padding-right: 0.5rem;"></i>Startup
                    Feedback</a></li>
            <li class="mobli"><a href="../investor_feedback.html"> <i id="icon" class="fa-solid fa-comments"
                        style="padding-right: 0.5rem;"></i>Investor
                    Feedback</a></li>
            <!-- <li><a href="#"> <i id="icon" class="fa-regular fa-handshake" style="padding-right: 0.5rem;"></i>Feedback </a></li> -->
            <li><a href="../contact.php"><i id="icon" class="fa-solid fa-envelope"
  style="padding-right: 0.5rem;"></i>Contact
Us</a></li>
<!-- <li><a href="../arrival/"><i id="icon" class="fa-solid fa-briefcase"
                      style="padding-right: 0.5rem;"></i>Arrival</a></li>
          <li><a href="../startup_issues/add_issue.html"><i id="icon" class="fa-solid fa-exclamation-circle"
                      style="padding-right: 0.5rem;"></i>Startup Issues</a></li> -->
        </ul>
    </nav>
    <!-- NAVBAR END -->

    <main class="relative min-h-screen flex flex-col justify-center bg-slate-900 overflow-hidden">
        <!-- Can add content Here(Start) accorfing to need-->

        <div class="container-xl" style="z-index:500;margin-top:70px;">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-4">
                                <h1><b>Investors list</b></h1>
                            </div>
                            <div class="col-sm-8">
                                <a href="#" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>
                                        <h6>Refresh List</h6>
                                    </span></a>
    
                            </div>
                        </div>
                    </div>
                    <div class="table-filter">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="show-entries">
    
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                <div class="filter-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control">
                                </div>
    
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th></th>
                                <th>Image</th>
                                <th>Name</th>
                                <!-- <th>Arrived</th>                      -->
                                <!-- <th>Status</th>                     
                            <th>Net Amount</th>-->
                                <th>Arrived</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td><img src='" . $row['image_url'] . "' alt='" . $row['name'] . "' width='50'></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>";
                    if ($row['has_arrived']) {
                        echo "Yes";
                    } else {
                        echo "<button onclick='markArrived(" . $row['id'] . ")'>Arrived</button>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
                        </tbody>
                    </table>
                    <div class="clearfix">
                        <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
    
                    </div>
                </div>
            </div>
        </div>



        <!-- Can add content Here(End) -->
        <div class="w-full mx-auto px-4 md:px-6 py-24">
        <!-- Can add content Here(Start) accorfing to need-->



            <!-- Can add content Here(End) -->
        </div>
        <!-- Can add content Here(Start) accorfing to need-->




        <!-- Can add content Here(End) -->

        <div class="text-center">

            <!-- Illustration #1 -->
            <div class="absolute top-0 left-0 rotate-180 -translate-x-3/4 -scale-x-100 blur-3xl opacity-70 pointer-events-none"
                aria-hidden="true">
                <img src="../svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration" />
            </div>

            <!-- Illustration #2 -->
            <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 blur-3xl opacity-70 pointer-events-none"
                aria-hidden="true">
                <img src="../svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration" />
            </div>
            <div class="absolute left-50 -translate-y-1/2 translate-x-1/4 blur-3xl opacity-60 pointer-events-none"
                style="top: 90%;" aria-hidden="true">
                <img src="../svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration" />
            </div>
            <!-- Illustration #3 -->
            <div class="absolute top-80 left-100 -translate-y-1 translate-x-1/4 blur-3xl opacity-70 pointer-events-none"
                aria-hidden="true">
                <img src="../svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration" />
            </div>
            <div class="absolute left-50 -translate-y-1/2 translate-x-1/4 blur-3xl opacity-60 pointer-events-none"
                style="top: 90%;" aria-hidden="true">
                <img src="../svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration" />
            </div>


            <!-- Particles animation -->
            <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
                <canvas data-particle-animation></canvas>
            </div>
            <div class="relative">
            </div>
        </div>
        <!-- </div> -->

        <!-- Ilusration #5 -->
        <!-- <div class="absolute bottom-0 left-50 rotate-180 -translate-x-1 -scale-x-100 blur-3xl opacity-70 pointer-events-none" aria-hidden="true">
		  <img src="../svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration">
	  </div> -->
    </main>

    <!--footer starts here -->
    <footer>
        <div class="footer-ft">
            <div class="foot-container">

                <div class="footbox-left">
                    <span><img  class="footer-logo"; margin-left: 30%;max-width:40%;" src="./images/navbarAndFooter/PSF24 White.png" alt=""></span>
                    <span><p class="footer-links">
                        <a href="./main.html" class="ftlink-1">Home</a>
      
                        <a href="./aboutus.html">About Us</a>
      
                        <a href="./investor.html">Investors</a>
      
                        <a href="./contact.php">Contact</a>
                    </p></span>
                </div>


                <div class="footbox-center">
                        <a class="footer-details" href="https://www.google.com/maps/dir//COEP+Technological+University,+Wellesley+Rd,+Shivajinagar,+Pune,+Maharashtra+411005/@18.5160113,73.8198323,14z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3bc2c0883858b873:0x1d68fbf2cac75519!2m2!1d73.856541!2d18.5293825?entry=ttu">
                            <img src="./svg/location-pin.svg" alt="location-pin" class="foot-svg style">
                            <p class="foot-detail-content">Bhau's I&E Cell, COEP TECH Shivajinagar, Pune-411005</p>
                        </a>
                        <a class="footer-details" href="#">
                            <img src="./svg/telephone.svg" alt="telephone-logo" class="foot-svg">
                            <p class="foot-detail-content">Contact us</p>
                        </a>
                        <a class="footer-details" href="mailto:queries.psf@gmail.com">
                            <img src="./svg/mail.svg" alt="mail-logo" class="foot-svg">
                            <p class="foot-detail-content">queries.psf@gmail.com</p>
                        </a>
                </div>


                <div class="footbox-right"><span>
                    <div class="foot-contact">
                        <div class="foot-link-card">
                            <a class="socialContainer containerOne" href="https://www.instagram.com/biec_coep/?igshid=Yzg5MTU1MDY%3D">
                              <svg viewBox="0 0 16 16" class="socialSvg instagramSvg">
                                <path
                                  d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                                ></path>
                              </svg>
                            </a>
                          
                            <a class="socialContainer containerTwo" href="https://www.youtube.com/c/BhausInnovationEntrepreneurshipCellCOEP2022">
                              <img src="./svg/youtube-white.svg" alt="white youtube logo" class="socialSvg YoutubeSvg" style="scale: 1.5;">
                            </a>
                          
                            <a class="socialContainer containerThree" href="https://www.linkedin.com/company/pune-startup-fest/">
                              <svg viewBox="0 0 448 512" class="socialSvg linkdinSvg">
                                <path
                                  d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"
                                ></path>
                              </svg>
                            </a>
                          
                            <a class="socialContainer containerFour" href="https://twitter.com/BIEC_COEP?t=UdnnunU2-JfVRhQ_SBoRBQ&s=08">
                              <img src="./svg/twitter-logo.png" alt="titter-logo" class="socialSvg twitterpng">
                            </a>

                            <a class="socialContainer containerFive" href="https://www.facebook.com/biec.coep/">
                                <img src="./svg/facebook-white-logo.svg" alt="facebook logo" class="socialSvg facebookSvg" style="scale: 1.5;">
                              </a>
                          </div>
                          
                    </div>
                    <div class="foot-mails">
                        <div class="foot-detail-cards">
                            <div class="ft-detail-card">
                              <p class="ft-tip">Gaurav Sonewane</p>
                              <div class="ft-detail-text">
                                <p class="ft-second-text">Secretary</p>
                                <a class="ft-third-text" href="mailto:secretary.psf@coep.ac.in">secretary.psf@coep.ac.in</a>
                              </div>
                            </div>
                            <div class="ft-detail-card">
                              <p class="ft-tip">Samta Raka</p>
                              <div class="ft-detail-text">
                                <p class="ft-second-text">Finance and Marketing Executive</p>
                                <a class="ft-third-text" href="mailto:finance.psf@coep.ac.in">finance.psf@coep.ac.in</a>
                              </div>
                            </div>
                            <div class="ft-detail-card">
                              <p class="ft-tip">Sanmeet Sawla</p>
                              <div class="ft-detail-text">
                                <p class="ft-second-text">Investor Relations Executive</p>
                                <a class="ft-third-text" href="mailto:ir.psf@coep.ac.in">ir.psf@coep.ac.in</a>
                              </div>
                            </div>
                            <div class="ft-detail-card">
                              <p class="ft-tip">Varun Shetty</p>
                              <div class="ft-detail-text">
                                <p class="ft-second-text">Events and Networking Executive</p>
                                <a class="ft-third-text" href="mailto:events.psf@coep.ac.in">events.psf@coep.ac.in</a>
                              </div>
                            </div>
                          </div>
                    </div>
                    </span>
                </div>




                <div class="ft-Copyright" style="color: aqua; font-size: 14px;" >
                    <p>Copyright &copy; 2023, All Rights Reserved</p>
                </div>

                <div class="ft-designed" style="color: aliceblue; font-size: 18px;">
                    <p>DESIGNED BY WEB TEAM</p>
                </div>

            </div>

            
			


        </div>
        




    </footer>
    <!--footer ends here -->
	


    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="../js/particle-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 300,
            duration: 2000, // Animation duration in milliseconds
            once: false,     // Animation only once on page load
        });
    </script>
    <script src="https://kit.fontawesome.com/6fc46b33e7.js" crossorigin="anonymous"></script>
    <script>
        function markArrived(investorId) {
            // Send an AJAX request to update the "has_arrived" status in the database
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "update_arrival.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    location.reload(); // Reload the page after the update
                }
            };
            xhr.send("investorId=" + investorId);
        }
    </script>
</body>

</html>