<?php
// Retrieve the username from the session
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['buttonNo'])) {
    $username = $_SESSION['username'];
    $buttonNo = $_SESSION['buttonNo'];
    // Now, you can use the $username and $buttonNo variables in your poll.php file
} else {
    // Handle the case where the username or buttonNo is not set in the session
    echo "Error: Username or button number not provided.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/navbarAndFooter/PSF + Marsh White1.png">

    <title>PSF'24</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300&display=swap" rel="stylesheet">
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
    <!--<script src="https://cdn.tailwindcss.com"></script>-->
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



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            font-family: "Lato";
            color: white;
        }

        #content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .table {
            width: 50%;
            display: table;
            margin: 0 auto;
        }

        .tr {
            display: table-row;
            cursor: pointer;

            transition: all 300ms;

        }

        .td {
            display: table-cell;
            font-size: 30px;

            padding: 7px 0;
            border: 2px solid whitesmoke;

            text-align: center;
        }

        .td.check {
            padding-right: 20px;
        }

        .tr:hover {
            transform: scale(1.05);
        }

        .button {

            color: #33cfff;
            border: 1px solid white;
            border-radius: 1000px;

            font-size: 30px;
            padding: 10px 30px;
            margin-top: 10px;

            cursor: pointer;

            transition: all 300ms, transform 100ms;

            opacity: 0;
        }

        .button>* {
            color: #33cfff;
            transition: all 300ms;
        }

        .button:not(.loading):hover>* {
            color: white;
        }

        .button i {
            display: none !important;
        }

        .button.loading {
            background-color: transparent;
        }

        .button.loading i {
            display: inline-block !important;
            color: white;
        }

        .button.loading .text {
            display: none;
        }

        .button:not(.loading):hover {
            background-color: transparent;
            color: white;
        }

        .button:active {
            outline: 0;
            transform: translateY(3px);
        }

        .button:focus {
            outline: 0;
        }

        .button.shown {
            opacity: 1;
            font-size: 6vw;

            color: black;
        }

        .button.shown:hover {
            opacity: 1;
            font-size: 6vw;
            background: transparent;
        }

        .tr.active {
            font-weight: bold;
            background-color: rgba(108, 185, 195, 0.5);

            transform: scale(1.05);
        }

        .tr.active i::before {
            content: "\f14a";
        }

        .tr.active i {
            font-weight: 700;
        }
    </style>

    <style>
        @keyframes StarsIn {
            0% {
                background-color: #a5a5a5;
                transform: scale(1) rotate(0);
                filter: brightness(100%);
            }

            50% {
                background-color: #ffc107;
                transform: scale(1.3) rotate(5deg);
                filter: brightness(110%);
            }

            100% {
                background-color: #ffc107;
                transform: scale(1) rotate(0);
                filter: brightness(100%);
            }
        }

        @keyframes EmojiIn {
            0% {
                opacity: 0;
                transform: scale(0.5) translateY(0);
            }

            50% {
                opacity: 1;
                transform: scale(1.5) translateY(-1rem);
            }

            100% {
                opacity: 0;
                transform: scale(2) translateY(-3rem);
            }
        }

        .star-rating-widget {
            position: relative;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }

        .star-rating-widget__btn {
            position: relative;
            display: inline-block;
            padding: 0;
            border: none;
            background-color: transparent;
            cursor: pointer;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: none;
        }

        .star-rating-widget__btn:focus,
        .star-rating-widget__btn-content:focus {
            outline: none;
        }

        .star-rating-widget__btn-content {
            display: inline-block;
        }

        .star-rating-widget__btn:focus>.star-rating-widget__btn-content {
            box-shadow: 0 0 2px 2px #ffc107;
        }

        .star-rating-widget__star {
            display: inline-block;
            width: 3rem;
            height: 3rem;
            background-color: #a5a5a5;
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        }

        .star-rating-widget__btn--highlight .star-rating-widget__star {
            background-color: #ffc107;
        }

        .star-rating-widget__btn--animate .star-rating-widget__star {
            animation: 0.2s ease-in both StarsIn;
        }

        .star-rating-widget__submitted {
            position: absolute;
            top: 3rem;
            left: 0;
            right: 0;
            font-weight: bold;
        }

        .star-rating-widget__submitted>p {
            color: #069a1c;
            margin: 0.5em 0;
        }

        .star-rating-widget--with-emojis .star-rating-widget__emoji {
            content: attr(data-emoji);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            opacity: 0;
            font-size: calc(3rem * 0.5);
            pointer-events: none;
            z-index: 10;
        }

        .star-rating-widget--with-emojis .star-rating-widget__btn--selected {
            outline: none;
        }

        .star-rating-widget--with-emojis .star-rating-widget__btn--selected .star-rating-widget__emoji {
            animation: 1s ease-in normal EmojiIn;
        }

        .box-lid {
            



            color: #1c335a;
            border: 2px solid #eceff133;
            border-radius: 15px;
            padding-top: 40px;
            padding-bottom: 40px;
            width: 80vw;
            margin-left: auto;
            margin-right: auto;
            background-color: rgb(14 38 88 / 40%);
            box-shadow: inset -5px -5px 10px 5px rgba(5, 218, 250, 0.5);
            

        }
        @import url('https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@600&family=Noto+Sans:wght@600&display=swap');

        .p {font-family: 'Inknut Antiqua', serif;
    

            font-size: 3vw;
            color: #08ca25;
        }
            
            

        #timer {
            font-size: 3.5vw;
        }

        #question {
            color: #33cfff;
        }


        /* Variables */
        :root {
            --fuschia: #c02cae;;
            --button-bg: var(--fuschia);
            --button-text-color: #fff;
            --baby-blue: #f8faff;
        }

        /* Body Styles */


        /* Button Styles */
        .bubbly-button {
            font-family: 'Helvetica', 'Arial', sans-serif;
            display: inline-block;
            font-size: 1.6em;
            padding: 0.5em 1em;
            margin-top: 50px;

            -webkit-appearance: none;
            appearance: none;
            background-color: var(--button-bg);
            color: var(--button-text-color);
            border-radius: 22px;
            border: none;
            cursor: pointer;
            position: relative;
            transition: transform ease-in 0.1s, box-shadow ease-in 0.25s;
            box-shadow: 0 2px 25px rgba(236, 61, 224, 0.5);
        }

        .bubbly-button:focus {
            outline: 0;
        }

        .bubbly-button:active {
            transform: scale(0.9);
            background-color: darken(var(--button-bg), 5%);
            box-shadow: 0 2px 25px rgba(255, 0, 130, 0.2);
        }

        /* Animation */
        .bubbly-button.animate:before,
        .bubbly-button.animate:after {
            display: block;
        }

        @keyframes topBubbles {
            0% {
                background-position: 5% 90%, 10% 90%, 10% 90%, 15% 90%, 25% 90%, 25% 90%, 40% 90%, 55% 90%, 70% 90%;
            }

            50% {
                background-position: 0% 80%, 0% 20%, 10% 40%, 20% 0%, 30% 30%, 22% 50%, 50% 50%, 65% 20%, 90% 30%;
            }

            100% {
                background-position: 0% 70%, 0% 10%, 10% 30%, 20% -10%, 30% 20%, 22% 40%, 50% 40%, 65% 10%, 90% 20%;
                background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
            }
        }

        @keyframes bottomBubbles {
            0% {
                background-position: 10% -10%, 30% 10%, 55% -10%, 70% -10%, 85% -10%, 70% -10%, 70% 0%;
            }

            50% {
                background-position: 0% 80%, 20% 80%, 45% 60%, 60% 100%, 75% 70%, 95% 60%, 105% 0%;
            }

            100% {
                background-position: 0% 90%, 20% 90%, 45% 70%, 60% 110%, 75% 80%, 95% 70%, 110% 10%;
                background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
            }
        }
    </style>
</head>

<body>



    <main class="relative min-h-screen flex flex-col justify-center bg-slate-900 overflow-hidden">
        <div style="text-align:center;z-index:500;font-size:larger;">
            <h2 style="    text-decoration: underline;
            font-family: 'Inknut Antiqua', serif;
            color: steelblue;
            font-size: 5vw;
            font-weight: bold;
            padding-top:5vh;
            ">RATE STARTUP</h2>
        </div>
        <!-- Can add content Here(Start) accorfing to need-->
        <div style="display: flex; justify-content:center; height:15vh;">
            <div class="widget" style="align-self: center;">

            </div>

        </div>

        <div class="box-lid" id="content">
            <!-- Display the selected username and button number -->
            <p class="p">Selected Username:
                <?php echo $username; ?>
            </p>
            <p class="p">Selected Button Number:
                <?php echo $buttonNo; ?>
            </p>
            <h1 id="question" style="font-size: 4vw; font-family: 'Inknut Antiqua', serif;"></h1>

            <div style="color: #e43a0b;" id="timer">Time remaining: 3:00</div>


            <div class="table" id="table"></div>

            <button id="vote" class="bubbly-button" style=""><span class="text">Vote</span><i
                    class='fas fa-circle-notch fa-spin'></i></button>
        </div>

        <div style="display: flex; justify-content:center; ">
            <div class="widget" style="align-self: center;">

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
                        <!-- <img src="https://images.pexels.com/photos/2570145/pexels-photo-2570145.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
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
                        <!-- <img src=https://images.pexels.com/photos/2826131/pexels-photo-2826131.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260
							alt=""> -->
                        <b>Dr Rahul Adhao</b>
                        Faculty Advisor
                        <p>rba.comp@coep.ac.in</p>
                    </div>

                </div>
                <div class="ftbox">
                    <div class="fttop-bar"></div>
                    <div class="ftcontent">
                        <!-- <img src=https://images.pexels.com/photos/3681591/pexels-photo-3681591.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940
							alt=""> -->
                        <b>Gaurav Sonewane</b>
                        Secretary
                        <p>secretary.psf@coep.ac.in</p>
                    </div>
                </div>
                <div class="ftbox">
                    <div class="fttop-bar"></div>
                    <div class="ftcontent">
                        <!-- <img src=https://images.pexels.com/photos/1689731/pexels-photo-1689731.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940
							alt=""> -->
                        <b>Samta Raka </b>
                        Finance and Marketing Executive
                        <p>finance.psf@coep.ac.in</p>
                    </div>
                </div>
                <div class="ftbox">
                    <div class="fttop-bar"></div>
                    <div class="ftcontent">
                        <!-- <img src="https://images.pexels.com/photos/2570145/pexels-photo-2570145.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
							alt=""> -->
                        <b>Sanmeet Sawla</b>
                        Investor Relations Executive
                        <p>ir.psf@coep.ac.in</p>
                    </div>

                </div>
                <div class="ftbox">
                    <div class="fttop-bar"></div>
                    <div class="ftcontent">
                        <!-- <img src="https://images.pexels.com/photos/2570145/pexels-photo-2570145.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
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

                <span><img style="margin-left: 30%;max-width:40%;" src="../images/navbarAndFooter/PSF24 White.png"
                        alt=""></span>

                <p class="ftfooter-links">
                    <a href="./main.html" class="ftlink-1">Home</a>

                    <a href="./aboutus.html" class="ftlink-1">About Us</a>

                    <a href="./investor.html">Investors</a>

                    <a href="./contact.php">Contact</a>
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

    <script>
        var rate;
        function starRatingWidget(
            appendTo,
            maxStars = 5,
            emojis = ['😤', '😞', '🙂', '😀', '🤩']
        ) {
            const wrapper = document.querySelector([appendTo]);

            if (!wrapper) return;

            const highlightClass = 'star-rating-widget__btn--highlight';
            const animateClass = 'star-rating-widget__btn--animate';
            const widgetWrapper = document.createElement('div');
            widgetWrapper.classList.add('star-rating-widget');

            if (emojis.length) {
                widgetWrapper.classList.add('star-rating-widget--with-emojis');
            }

            wrapper.innerHTML = '';
            wrapper.insertAdjacentElement('beforeend', widgetWrapper);

            function getEmoji(rating) {
                const emojisPerStar = Math.ceil(maxStars / emojis.length);
                const emojiIndex = Math.ceil(rating / emojisPerStar) - 1;

                return emojis[emojiIndex];
            }

            function handleStarBtnClick(e) {
                const starBtns = document.querySelectorAll('.star-rating-widget__btn');
                const rating = e.currentTarget.dataset.rating;
                const submittedClassName = '.star-rating-widget__submitted';

                starBtns.forEach((btn, index) => {
                    index < rating
                        ? btn.classList.add(animateClass, highlightClass)
                        : btn.classList.remove(animateClass, highlightClass);
                });

                e.currentTarget.classList.add('star-rating-widget__btn--selected');

                e.currentTarget.addEventListener('animationend', function (e) {
                    if (e.animationName === 'EmojiIn') {
                        e.currentTarget.classList.remove('star-rating-widget__btn--selected');
                    } else {
                        starBtns.forEach((btn) => {
                            btn.classList.remove(animateClass);
                        });
                    }
                });
                console.log(rating);
                rate = rating;
                console.log(rate);

                function handleSubmittedText() {
                    const widgetWrapper = document.querySelector('.star-rating-widget');
                    const submittedDiv = document.createElement('div');
                    const hasSubmittedDiv = document.querySelector([submittedClassName]);

                    function addSubmittedText() {
                        submittedDiv.classList.add('star-rating-widget__submitted');
                        submittedDiv.innerHTML = `<p role="alert">✓ Rating submitted!</p>`;
                        widgetWrapper.insertAdjacentElement('beforeend', submittedDiv);
                    }

                    if (!hasSubmittedDiv) {
                        addSubmittedText();
                    } else {
                        hasSubmittedDiv.remove(setTimeout(addSubmittedText, 50));
                    }
                }

                handleSubmittedText();
            }

            function starBtnEvents() {
                const starBtns = document.querySelectorAll('.star-rating-widget__btn');

                starBtns.forEach((button) => {
                    button.addEventListener('click', handleStarBtnClick);
                });
            }

            const buttons = Array.from({
                length: maxStars,
            })
                .map((star, index) => {
                    return `<button type="button"
          class="star-rating-widget__btn" data-rating=${index + 1}
          aria-label="Give a rating of ${index + 1}">
          <span class="star-rating-widget__btn-content" tabindex="-1">
            <span class="star-rating-widget__star"
              style=${`"animation-delay: ${index / (maxStars * 4)}s"`}
              aria-hidden="true"></span>
              ${emojis.length
                            ? `<span class="star-rating-widget__emoji" aria-hidden="true">
                    ${emojis.length ? `${getEmoji(index + 1)}` : ''}
                  </span>`
                            : ''
                        }
          </span>
        </button>`;
                })
                .join('');

            widgetWrapper.innerHTML = `${buttons}`;
            starBtnEvents();
        }

        (function () {
            starRatingWidget('.widget');
        })();

    </script>

    <script>
        var rate;
        function starRatingWidget(
            appendTo,
            maxStars = 5,
            emojis = ['😤', '😞', '🙂', '😀', '🤩']
        ) {
            const wrapper = document.querySelector([appendTo]);

            if (!wrapper) return;

            const highlightClass = 'star-rating-widget__btn--highlight';
            const animateClass = 'star-rating-widget__btn--animate';
            const widgetWrapper = document.createElement('div');
            widgetWrapper.classList.add('star-rating-widget');

            if (emojis.length) {
                widgetWrapper.classList.add('star-rating-widget--with-emojis');
            }

            wrapper.innerHTML = '';
            wrapper.insertAdjacentElement('beforeend', widgetWrapper);

            function getEmoji(rating) {
                const emojisPerStar = Math.ceil(maxStars / emojis.length);
                const emojiIndex = Math.ceil(rating / emojisPerStar) - 1;

                return emojis[emojiIndex];
            }

            function handleStarBtnClick(e) {
                const starBtns = document.querySelectorAll('.star-rating-widget__btn');
                const rating = e.currentTarget.dataset.rating;
                const submittedClassName = '.star-rating-widget__submitted';

                starBtns.forEach((btn, index) => {
                    index < rating
                        ? btn.classList.add(animateClass, highlightClass)
                        : btn.classList.remove(animateClass, highlightClass);
                });

                e.currentTarget.classList.add('star-rating-widget__btn--selected');

                e.currentTarget.addEventListener('animationend', function (e) {
                    if (e.animationName === 'EmojiIn') {
                        e.currentTarget.classList.remove('star-rating-widget__btn--selected');
                    } else {
                        starBtns.forEach((btn) => {
                            btn.classList.remove(animateClass);
                        });
                    }
                });
                console.log(rating);
                rate = rating;
                console.log(rate);

                function handleSubmittedText() {
                    const widgetWrapper = document.querySelector('.star-rating-widget');
                    const submittedDiv = document.createElement('div');
                    const hasSubmittedDiv = document.querySelector([submittedClassName]);

                    function addSubmittedText() {
                        submittedDiv.classList.add('star-rating-widget__submitted');
                        submittedDiv.innerHTML = `<p role="alert">✓ Rating submitted!</p>`;
                        widgetWrapper.insertAdjacentElement('beforeend', submittedDiv);
                    }

                    if (!hasSubmittedDiv) {
                        addSubmittedText();
                    } else {
                        hasSubmittedDiv.remove(setTimeout(addSubmittedText, 50));
                    }
                }

                handleSubmittedText();
            }

            function starBtnEvents() {
                const starBtns = document.querySelectorAll('.star-rating-widget__btn');

                starBtns.forEach((button) => {
                    button.addEventListener('click', handleStarBtnClick);
                });
            }

            const buttons = Array.from({
                length: maxStars,
            })
                .map((star, index) => {
                    return `<button type="button"
          class="star-rating-widget__btn" data-rating=${index + 1}
          aria-label="Give a rating of ${index + 1}">
          <span class="star-rating-widget__btn-content" tabindex="-1">
            <span class="star-rating-widget__star"
              style=${`"animation-delay: ${index / (maxStars * 4)}s"`}
              aria-hidden="true"></span>
              ${emojis.length
                            ? `<span class="star-rating-widget__emoji" aria-hidden="true">
                    ${emojis.length ? `${getEmoji(index + 1)}` : ''}
                  </span>`
                            : ''
                        }
          </span>
        </button>`;
                })
                .join('');

            widgetWrapper.innerHTML = `${buttons}`;
            starBtnEvents();
        }

        (function () {
            starRatingWidget('.widget');
        })();







        var possibleStuff = [
            {
                question: "How many Investors will invest?",
                options: [
                    { value: "1", label: "0-2" },
                    { value: "2", label: "3-5" },
                    { value: "3", label: "6-7" },
                    { value: "4", label: "8-9" },
                    { value: "5", label: "All" }
                ]
            }
        ];

        var num = Math.floor(Math.random() * possibleStuff.length);

        var question = possibleStuff[num].question;
        var options = possibleStuff[num].options;

        var table = document.getElementById("table");
        document.getElementById("question").innerText = question;
        updateOptions(options);

        function updateOptions(options) {
            options.forEach(item => {
                // Create row
                var row = document.createElement("div");
                row.classList.add("tr");

                // Create cells
                var cell1 = document.createElement("div");
                cell1.classList.add("td");
                cell1.classList.add("check");
                cell1.innerHTML = "<i class='far fa-square'></i>";

                var cell2 = document.createElement("div");
                cell2.classList.add("td");
                cell2.innerText = item.label; // Use the label property for display
                cell2.setAttribute("data-value", item.value); // Set the data-value attribute for storing the value

                // Append cells to row
                row.appendChild(cell1);
                row.appendChild(cell2);

                // Append row to table
                table.appendChild(row);
            })
        }

        var rows = document.getElementsByClassName("tr");
        for (i = 0; i < rows.length; i++) {
            rows[i].addEventListener("click", function (e) {
                var active = document.querySelector(".tr.active");
                if (active) {
                    active.classList.remove("active");
                }

                this.classList.add("active");

                document.getElementById("vote").classList.add("shown");
            })
        }

        document.getElementById("vote").addEventListener("click", function (e) {
            this.classList.add("loading");

            var choiceElement = document.querySelector(".tr.active .td:nth-child(2)");
            var choice = choiceElement.innerText;
            var choiceValue = choiceElement.getAttribute("data-value");

            // Now you have both the display text and the value of the selected option
            console.log("Selected Option Text: ", choice);
            console.log("Selected Option Value: ", choiceValue);
            console.log("Selected rating Value: ", rate);

            var username = '<?php echo $username;?>';
            var buttonNo = '<?php echo $buttonNo;?>';

            // Send the selected value, username, and buttonNo to the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'submit_vote.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        // Successful vote, update content or redirect if needed
                        contentElement.innerHTML = `<h2>Thank you for voting!</h2><button class="shown button"><a href="buttons.php">Vote for next Pitch </a><i class='fas fa-arrow-left'></i></button>`;

                        // Hide the widget with class 'widget'
                        const widgetElement = document.querySelector('.widget');
                        if (widgetElement) {
                            widgetElement.style.display = 'none';
                        }
                    }
                    else if (response.status === 'error') {
                        // Display an alert if the user has already voted
                        alert(response.message);
                    }
                }
            };

            // Include the username and buttonNo in the data sent to submit_vote.php
            xhr.send('option=' + choiceValue + '&username=' + encodeURIComponent(username) + '&buttonNo=' + encodeURIComponent(buttonNo) + '&rate=' + encodeURIComponent(rate));
            setTimeout(() => {
                document.getElementById("content").innerHTML = `<h2>Thank you for voting!</h2><button class="button shown"><a href="buttons.php">Vote for next Pitch </a><i class='fas fa-arrow-left'></i></button>`;
            }, 1000);
        })
    </script>


    <!--Vardhan-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include your other dependencies and stylesheets here -->

    <script>
        $(document).ready(function () {
            var username = '<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ""; ?>';
            var buttonNo = '<?php echo isset($_SESSION['buttonNo']) ? $_SESSION['buttonNo'] : ""; ?>';

            // Fetch remaining time from the database
            // function fetchRemainingTime() {
            //     $.ajax({
            //         type: 'POST',
            //         url: 'get_remaining_time.php', // Replace with the actual endpoint to fetch time from the database
            //         data: {
            //             username: encodeURIComponent(username),
            //             buttonNo: encodeURIComponent(buttonNo)
            //         },
            //         success: function (response) {
            //             var remainingTime = parseInt(response); // Assuming the response is the remaining time in seconds

            //             // Start the timer with the fetched remaining time
            //             startTimer(remainingTime);
            //         },
            //         error: function (xhr, status, error) {
            //             console.error('AJAX Error:', status, error);
            //         }
            //     });
            // }

            // Function to update the timer display
            // function updateTimerDisplay(minutes, seconds) {
            //     $('#timer').text('Time remaining: ' + minutes + ':' + (seconds < 10 ? '0' : '') + seconds);
            // }

            // Function to start the timer
            // function startTimer(totalSeconds) {
            //     var minutes = Math.floor(totalSeconds / 60);
            //     var seconds = totalSeconds % 60;

            //     // Update the timer display initially
            //     updateTimerDisplay(minutes, seconds);

            //     // Function to decrement the timer
            //     function decrementTimer() {
            //         if (minutes === 0 && seconds === 0) {
            //             // Submit vote when the timer reaches zero
            //             // submitVote();
            //         } else {
            //             if (seconds === 0) {
            //                 minutes--;
            //                 seconds = 59;
            //             } else {
            //                 seconds--;
            //             }

            //             // Update the timer display
            //             updateTimerDisplay(minutes, seconds);
            //         }
            //     }

            //     // Set an interval to decrement the timer every second
            //     var timerInterval = setInterval(decrementTimer, 1000);

            //     // Function to submit the vote
            //     function submitVote() {
            //         $('#vote').addClass('loading');

            //         var choiceElement = $('.tr.active .td:nth-child(2)');
            //         var choiceValue = choiceElement.attr('data-value');

            //         $.ajax({
            //             type: 'POST',
            //             url: 'submit_vote.php',
            //             data: {
            //                 option: choiceValue,
            //                 username: encodeURIComponent(username),
            //                 buttonNo: encodeURIComponent(buttonNo)
            //             },
            //             success: function (response) {
            //                 var parsedResponse = JSON.parse(response);
            //                 if (parsedResponse.status === 'success') {
            //                     // Successful vote, update content or redirect if needed
            //                     $('#content').html('<h2>Thank you for voting!</h2><button class="shown"><a href="buttons.php">Vote for next Pitch </a><i class="fas fa-arrow-left"></i></button>');
            //                 } else if (parsedResponse.status === 'error') {
            //                     alert(parsedResponse.message);
            //                 }
            //             },
            //             error: function (xhr, status, error) {
            //                 // Handle the error
            //                 console.error('AJAX Error:', status, error);
            //             },
            //             complete: function () {
            //                 // Stop the timer interval
            //                 clearInterval(timerInterval);
            //             }
            //         });
            //     }

            //     // Attach the submitVote function to the vote button click event
            //     $('#vote').click(function () {
            //         submitVote();
            //     });
            // }

            // Fetch the remaining time when the document is ready
            // fetchRemainingTime();
        });
    </script>

</body>

</html>
