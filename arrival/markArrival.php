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

    <footer>
		<div class="ftcardcontainer">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
				integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
				crossorigin="anonymous">
  
			<!-- <h1 class="fth1-text">
				<i class="ftfa fa-users" aria-hidden="true"></i>Team Members
			</h1> -->
			<div class="ftcontainer">
				<div class="ftbox">
					<div class="fttop-bar"></div>
					<div class="ftcontent">
						<!-- <img src="https://images.pexels.com/photos/2570145/pexels-photo-2570145.webp?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
							alt=""> -->
						<b>Dr Vidya More</b>
						Faculty Advisor
						<p>vnm.extc@coep.ac.in</p>
					</div>
  
				</div>
				<div class="ftbox">
					<div class="fttop-bar"></div>
					<div class="fttop">
					</div>
					<div class="ftcontent">
						<!-- <img src=https://images.pexels.com/photos/2826131/pexels-photo-2826131.webp?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260
							alt=""> -->
						<b>Dr Rahul Adhao</b>
						Faculty Advisor
						<p>rba.comp@coep.ac.in</p>
					</div>
  
				</div>
				<div class="ftbox">
					<div class="fttop-bar"></div>
					<div class="ftcontent">
						<!-- <img src=https://images.pexels.com/photos/3681591/pexels-photo-3681591.webp?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940
							alt=""> -->
						<b>Gaurav Sonewane</b>
						Secretary
						<p>secretary.psf@coep.ac.in</p>
					</div>
				</div>
				<div class="ftbox">
					<div class="fttop-bar"></div>
					<div class="ftcontent">
						<!-- <img src=https://images.pexels.com/photos/1689731/pexels-photo-1689731.webp?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940
							alt=""> -->
						<b>Samta Raka </b>
						Finance and Marketing Executive
						<p>finance.psf@coep.ac.in</p>
					</div>
				</div>
				<div class="ftbox">
					<div class="fttop-bar"></div>
					<div class="ftcontent">
						<!-- <img src="https://images.pexels.com/photos/2570145/pexels-photo-2570145.webp?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
							alt=""> -->
						<b>Sanmeet Sawla</b>
						Investor Relations Executive
						<p>ir.psf@coep.ac.in</p>
					</div>
  
				</div>
				<div class="ftbox">
					<div class="fttop-bar"></div>
					<div class="ftcontent">
						<!-- <img src="https://images.pexels.com/photos/2570145/pexels-photo-2570145.webp?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
							alt=""> -->
						<b>Varun Shetty</b>
						Events and Networking Executive
						<p>events.psf@coep.ac.in</p>
					</div>
  
				</div>
			</div>
		</div>
		<footer class="ftfooter-distributed">
  
			<div class="ftfooter-left">
  
				<span><img style="margin-left: 30%;max-width:40%;" src="../images/navbarAndFooter/PSF24 White.webp" alt=""></span>
  
				<p class="ftfooter-links">
					<a href="../main.html" class="ftlink-1">Home</a>
  
					<a href="../aboutus.html">About Us</a>
  
					<a href="../investor.html">Investors</a>
  
					<a href="../contact.php">Contact</a>
				</p>
  
				<p class="ftfooter-company-name">PUNE STARTUP FEST</p>
			</div>
  
			<div class="ftfooter-center">
  
				<div class="icons">
					<i class="fa fa-map-marker"></i>
					<p><a
                        href="https://www.google.com/maps/dir//COEP+Technological+University,+Wellesley+Rd,+Shivajinagar,+Pune,+Maharashtra+411005/@18.5160113,73.8198323,14z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3bc2c0883858b873:0x1d68fbf2cac75519!2m2!1d73.856541!2d18.5293825?entry=ttu">
                        <span>Bhau's I&E Cell, COEP TECH</span> Shivajinagar, Pune-411005
                    </a>
                  </p>
				</div>
  
				<div class="icons">
					<i class="fa fa-phone"></i>
					<p><a href="">
			Contact us
		  </a></p>
				</div>
  
				<div class="icons">
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:queries.psf@gmail.com">queries.psf@gmail.com</a></p>
				</div>
				<!-- <div class="ftCopyright">
					<p>Copyright &copy; 2023, All Rights Reserved</p>
				</div> -->
			</div>
  
			<div class="ftfooter-right">
  
				<p class="ftfooter-company-about">
					<span>About Pune Startup Fest</span>
					Pune Startup Fest is an unique Startup Expo, which provides an excellent platform for numerous
					students and Start-ups to connect with this ever growing entrepreneurial world.
				</p>
  
				<div class="ftfooter-icons">
					<!-- <h3>Follow Us:</h3> -->
					<a href="https://www.facebook.com/biec.coep/"><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com/BIEC_COEP?t=UdnnunU2-JfVRhQ_SBoRBQ&s=08"><i
							class="fa fa-twitter"></i></a>
					<a href="https://www.linkedin.com/company/pune-startup-fest/"><i class="fa fa-linkedin"></i></a>
					<a href="https://www.instagram.com/biec_coep/?igshid=Yzg5MTU1MDY%3D"><i
							class="fa fa-instagram"></i></a>
					<a href="https://www.youtube.com/c/BhausInnovationEntrepreneurshipCellCOEP2022"><i
							class="fa fa-youtube"></i></a>
  
					<!-- <a class="ftglassIco" href="#"><i class="ftfab fa-facebook-f"></i></a>
					<a class="ftglassIco" href="#"><i class="ftfab fa-instagram"></i></a>
					<a class="ftglassIco" href="#"><i class="ftfab fa-linkedin-in"></i></a>
					<a class="ftglassIco" href="#"><i class="ftfab fa-whatsapp"></i></a> -->
  
				</div>
				<!-- <div class="ftcontainer1">
					<div class="ftmenu">
					  <div class="ftnavigation">
						<span style="--i:0; --x:-1; --y:0">
						  <ion-icon name="videocam-outline"></ion-icon>
						</span>
						<span style="--i:1; --x:1; --y:0">
						  <ion-icon name="flame-outline"></ion-icon>
						</span>
						<span style="--i:2; --x:0; --y:-1">
						  <ion-icon name="bulb-outline"></ion-icon>
						</span>
						<span style="--i:3; --x:0; --y:1">
						  <ion-icon name="build-outline"></ion-icon>
						</span>
						<span style="--i:4; --x:-1; --y:1">
						  <ion-icon name="thermometer-outline"></ion-icon>
						</span>
						<span style="--i:5; --x:-1; --y:-1">
						  <ion-icon name="water-outline"></ion-icon>
						</span>
						<span style="--i:6; --x:1; --y:-1">
						  <ion-icon name="alarm-outline"></ion-icon>
						</span>
						<span style="--i:7; --x:1; --y:1">
						  <ion-icon name="radio-outline"></ion-icon>
						</span>
					  </div>
					  <div class="ftclose">
						<ion-icon name="close-outline">X</ion-icon>
					  </div>
					</div>
				  </div> -->
			</div>
			<div class="ftCopyright">
				<p>Copyright &copy; 2023, All Rights Reserved</p>
			</div>
			<div class="ftCopyright designed" style="background-color: #1c335a;">
				<p>DESIGNED BY WEB TEAM</p>
			</div>
  
		</footer>
	</footer>
	


    
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