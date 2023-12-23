<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';



if (isset($_POST['submit'])) {
  // Instantiation and passing [ICODE]true[/ICODE] enables exceptions
  $mail = new PHPMailer(true);

  $fromEmail = 'bec@coeptech.ac.in';
  $toEmail = 'queries.psf@gmail.com';
  $subjectName = $_POST['subject'];
  $message = $_POST['message'];
  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  try {
    //Server settings
    //  $mail->SMTPDebug = 2; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.office365.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'bec@coeptech.ac.in'; // SMTP username
    $mail->Password = 'Bhau@2021-22';
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    // $mail->SMTPSecure = 'ssl';
    // $mail->Port = 465; // TCP port to connect to
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587; // Use port 587 for TLS
    //Recipients
    $mail->setFrom($fromEmail, 'Query Sender');
    $mail->addAddress($toEmail); // Add a recipient
    //  $mail->addAddress('recipient2@example.com'); // Name is optional
    $mail->addReplyTo($visitor_email, $name);

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Confirmation of visitor Registration for Pune Startup Fest\'23';
    $mail->Body = '<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport"
					  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
				<meta http-equiv="X-UA-Compatible" content="ie=edge">
				<title>Confirmation of visitor Registration for Pune Startup Fest\'23</title>
			</head>
			<body>
			<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">' . $message . '</span>
				<div class="container">
				    
				    <h3 style="font-weight: bold;">Hi ' . $name . '</h3>
				    <h3 style="font-weight; bold;">Congratulations! Your  registration is confirmed</h3>
				    <p style="color: #0a2642; font-size: 20px;">We are excited to have you at the Pune Startup Fest\'23!</p>
				    <p style="color: #0a2642; font-size: 20px;">For more information visit our website at <a href="https://punestartupfest.in">https://punestartupfest.in/</a></p>
				    
				</div>
			</body>
			</html>';
    $mail->AltBody = $message;
    $scriptURL = 'https://script.google.com/macros/s/AKfycbwUgLVT6wXZMrt-c5Iz4ecnCnRtMG1lSI0ro0gN9dO1PO8pYXkAKkn2pJGRhLpOHxHcUw/exec';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $form_data = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'college' => $_POST['college'],
        'mobile' => $_POST['mobile']
      );
      $options = array(
        'http' => array(
          'method' => 'POST',
          'header' => 'Content-type: application/x-www-form-urlencoded',
          'content' => http_build_query($form_data),
        ),
      );
      $context = stream_context_create($options);
      $result = file_get_contents($scriptURL, false, $context);
      if ($result === false) {
        echo 'Error!';
      } else {
        $mail->send();
        $output = '<div class="alert alert-success" style="margin-top:5%">
                  <p style="font-weight: bold;">Thank You ' . $name . ' for registering<br/>Please check your email</p>
              </div>';
      }
    }

  } catch (Exception $e) {
    $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/navbarAndFooter/PSF + Marsh White1.png">

    <title>PSF'24</title>
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
    <link rel="stylesheet" href="./styles/footer24.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css"> -->



    <link rel="stylesheet" href="./styles/contact.css">
    <link rel="stylesheet" href="./styles/footer24.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    <style>
      <?php include "./styles/contact.css" ?>
      <?php include "./styles/footer24.css" ?>
    </style>
    <!-- <link rel="stylesheet" href="./styles/contact.css"> -->
</head>

<body>



    <main class="relative min-h-screen flex flex-col justify-center bg-slate-900 overflow-hidden">
        <!-- Can add content Here(Start) accorfing to need-->
		<h3 class="text-center text-success">
			<?= $output ?>
		  </h3>
		  <form action="" method="post" name='google-sheet' style="z-index: 500;">
			<script src="https://kit.fontawesome.com/6fc46b33e7.js" crossorigin="anonymous"></script>
			<div class="backgroundForm">
			  <div class="formContainer">
				<div class="screen">
				  <div class="form-body">
					<div class="form-body-item formLeft">
					  <div class="app-title">
						<span>VISITOR</span>
						<span>REGISTRATION</span>
						<!-- <img src="PSFb.png" class="psfimg"> -->
					  </div>
					  <img src="./images/navbarAndFooter/PSFb.png" class="psfimg">
		
					  <div class="app-contact">CONTACT INFO : <a href="mailto:queries.psf@gmail.com">queries.psf@gmail.com</a>
					  </div>
					</div>
					<div class="form-body-item">
					  <div class="app-form">
						<p style="font-size:small;">
						  Welcome to the Pune StartUp Fest'23 Visitor's Registration Form!<br> Discover innovative startups in
						  Pune at COEP Tech on March 11th and 12th.<br> No entry fee required.
						</p>
						<div class="app-form-group">
						  <input name="name" class="app-form-control" placeholder="NAME" value="" required autofocus>
						</div>
						<div class="app-form-group">
						  <input name="email" class="app-form-control" placeholder="EMAIL" type="email" required="">
						</div>
						<div class="app-form-group">
						  <input name="college" class="app-form-control" placeholder="Organization/College Name">
						</div>
						<div class="app-form-group">
						  <input type="number" name="mobile" class="app-form-control" placeholder="Mobile Number" required="">
						</div>
						<div class="app-form-group buttons">
						  <button class="app-form-button">CANCEL</button>
						  <button name="submit" class="app-form-button">SUBMIT</button>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </form>



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
                <img src="./svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration" />
            </div>

            <!-- Illustration #2 -->
            <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 blur-3xl opacity-70 pointer-events-none"
                aria-hidden="true">
                <img src="./svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration" />
            </div>
            <div class="absolute left-50 -translate-y-1/2 translate-x-1/4 blur-3xl opacity-60 pointer-events-none"
                style="top: 90%;" aria-hidden="true">
                <img src="./svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration" />
            </div>
            <!-- Illustration #3 -->
            <div class="absolute top-80 left-100 -translate-y-1 translate-x-1/4 blur-3xl opacity-70 pointer-events-none"
                aria-hidden="true">
                <img src="./svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration" />
            </div>
            <div class="absolute left-50 -translate-y-1/2 translate-x-1/4 blur-3xl opacity-60 pointer-events-none"
                style="top: 90%;" aria-hidden="true">
                <img src="./svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration" />
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
		  <img src="./svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration">
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
  
				<span><img style="margin-left: 30%;max-width:40%;" src="./images/navbarAndFooter/PSF24 White.png" alt=""></span>
  
				<p class="ftfooter-links">
					<a href="#" class="ftlink-1">Home</a>
  
					<a href="#">About US</a>
  
					<a href="#">Investors</a>
  
					<a href="#">Contact</a>
				</p>
  
				<p class="ftfooter-company-name">PUNE STARTUP FEST</p>
			</div>
  
			<div class="ftfooter-center">
  
				<div class="icons">
					<i class="fa fa-map-marker"></i>
					<a
						href="https://www.google.com/maps/dir//COEP+Technological+University,+Wellesley+Rd,+Shivajinagar,+Pune,+Maharashtra+411005/@18.5160113,73.8198323,14z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3bc2c0883858b873:0x1d68fbf2cac75519!2m2!1d73.856541!2d18.5293825?entry=ttu">
						<p><span>Bhau's I&E Cell, COEP TECH</span> Shivajinagar, Pune-411005</p>
					</a>
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
    <script src="./js/particle-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 300,
            duration: 2000, // Animation duration in milliseconds
            once: false,     // Animation only once on page load
        });
    </script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</body>

</html>