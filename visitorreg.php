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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pune Startup Fest'23</title>
  <link rel="shortcut icon" href="./images/navbarAndFooter/PSF + Marsh White1.png">
  <link rel="stylesheet" href="./styles/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
  <style>
    <?php include "./styles/contact.css" ?>
    <?php include "./styles/navbar.css" ?>
    <?php include "./styles/footer.css" ?>
  </style>
  <!-- <link rel="stylesheet" href="navBar.css"> -->


  <!-- <link rel="stylesheet" href="./styles/contact.css"> -->
</head>

<body style="background-color: #0c0624;">
  <div id="my-background" style="height: 100%; width: 100%; z-index: -100; position: fixed; filter: opacity(0.35);">
  </div>
  <div class="nav-bg">
    <div class="logo" style="top: 1%;right: 1%;"><a href="./main.html"><img
          src="./images/navbarAndFooter/PSF + Marsh White1.png" alt=""></a>
    </div>
  </div>
  <input type="checkbox" id="burger-toggle">
  <label for="burger-toggle" class="burger-menu">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </label>
  <div class="menu">
    <div class="menu-inner">
      <ul class="menu-nav">
        <li class="menu-nav-item"><a class="menu-nav-link" href="./main.html"><span>
              <div><i class="fa-solid fa-house" style="padding-right: 1rem;"></i>Home</div>
            </span></a></li>
        <li class="menu-nav-item"><a class="menu-nav-link" href="./aboutus.html"><span>
              <div><i class="fa-regular fa-file-lines" style="padding-right: 1rem;"></i>About Us</div>
            </span></a></li>
        <!-- <li class="menu-nav-item"><a class="menu-nav-link" href="../partners.html"><span>
                            <div><i class="fa-solid fa-handshake" style="padding-right: 1rem;"></i>Present Partners
                            </div>
                        </span></a></li> -->
        <li class="menu-nav-item"><a class="menu-nav-link" href="./partners.html"><span>
              <div> <i class="fa-regular fa-handshake" style="padding-right: 1rem; display: inline-block;"></i>Previous
                Partners</div>
            </span></a></li>
        <li class="menu-nav-item"><a class="menu-nav-link" href="../startup_expo.html"><span>
              <div><i class="fa-solid fa-stairs" style="padding-right: 1rem;"></i>Startup Expo</div>
            </span></a></li>
        <li class="menu-nav-item"><a class="menu-nav-link" href="./alumni.html"><span>
              <div><i class="fa-solid fa-people-group" style="padding-right: 1rem;"></i>Alumni</div>
            </span></a></li>
        <li class="menu-nav-item"><a class="menu-nav-link" href="../ongoing_events"><span>
              <div><i class="fa-regular fa-calendar-days" style="padding-right: 1rem;"></i>Ongoing Sessions
              </div>
            </span></a></li>
        <li class="menu-nav-item"><a class="menu-nav-link" href="./events24.html"><span>
              <div><i class="fa-sharp fa-solid fa-puzzle-piece" style="padding-right: 1rem;"></i>Events</div>
            </span></a></li>
        <li class="menu-nav-item"><a class="menu-nav-link" href="./investor.html"><span>
              <div><i class="fa-solid fa-hand-holding-dollar" style="padding-right: 1rem;"></i>Investors</div>
            </span></a></li>
        <li class="menu-nav-item"><a class="menu-nav-link" href="./visitorreg.php"><span>
              <div><i class="fa-solid fa-shoe-prints" style="padding-right: 1rem;"></i>Visitor Registration</div>
            </span></a></li>
        <li class="menu-nav-item"><a class="menu-nav-link" href="./contact.php"><span>
              <div><i class="fa-solid fa-envelope-open-text" style="padding-right: 1rem;"></i>Contact Us</div>
            </span></a></li>
        <li class="menu-nav-item"><a class="menu-nav-link" href="./team.html"><span>
              <div><i class="fa-solid fa-user-group" style="padding-right: 1rem;"></i>Team</div>
            </span></a></li>
        <li class="menu-nav-item"><a class="menu-nav-link" href="#"><span>
              <div>
                <center><i class="fa-solid fa-chevron-down"></i></center>
              </div>
            </span></a></li>
      </ul>
      <div class="gallery">
        <div class="title">
          <p>PSF'22 Gallery</p>
        </div>
        <div class="images">
          <a class="image-link" href="#">
            <div class="image" data-label="PSF'22 Gallery"><img src="./images/navbarAndFooter/PSF'22_Gallery0.jpg"
                alt=""></div>
          </a>
          <a class="image-link" href="#">
            <div class="image" data-label="PSF'22 Gallery"><img src="./images/navbarAndFooter/PSF'22_Gallery1.jpg"
                alt=""></div>
          </a>
          <a class="image-link" href="#">
            <div class="image" data-label="PSF'22 Gallery"><img src="./images/navbarAndFooter/PSF'22_Gallery2.jpg"
                alt=""></div>
          </a>
          <a class="image-link" href="#">
            <div class="image" data-label="PSF'22 Gallery"><img src="./images/navbarAndFooter/PSF'22_Gallery3.jpg"
                alt=""></div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <h3 class="text-center text-success">
    <?= $output ?>
  </h3>
  <form action="" method="post" name='google-sheet'>
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

  <footer class="footer-section">
    <div class="container">
      <div class="footer-cta pt-5 pb-5">
        <div class="row">
          <div class="col-xl-4 col-md-4 mb-30">
            <div class="single-cta p-2">

              <a href="https://goo.gl/maps/8NBMTPuq9N3V4dw1A" target="_blank"><i class="fas fa-map-marker-alt"></i></a>
              <div class="cta-text">
                <h4><a href="https://goo.gl/maps/8NBMTPuq9N3V4dw1A" target="_blank">Find us</a></h4>
                <!-- <span>COEP Tech
                                    University,Pune </span> -->
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-4 mb-30">
            <div class="single-cta p-2">
              <a href="https://wa.me/qr/PDT3YMXZ5NXIB1" target="_blank"><i class="fas fa-phone"></i></a>
              <div class="cta-text">
                <h4><a href="https://wa.me/qr/PDT3YMXZ5NXIB1" target="_blank">Call us</a></h4>
                <!-- <span>9673599363</span> -->
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-4 mb-30">
            <div class="single-cta p-2">
              <a href="mailto:queries.psf@gmail.com" target="_blank"><i class="far fa-envelope-open"></i></a>
              <div class="cta-text">
                <h4><a href="mailto:queries.psf@gmail.com" target="_blank">Mail us</a></h4>
                <!-- <span>queries.psf@gmail.com</span> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-content pt-5">
        <div class="row">
          <div class="col-xl-4 col-lg-4 mb-50">
            <div class="footer-widget">
              <!-- <div class="footer-logo">
                                    <a href="index"><img src="https://i.ibb.co/QDy827D/ak-logo.png" class="img-fluid" alt="logo"></a>
                                </div> -->
              <!-- <div class="footer-text">
                                    <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit, sed do eiusmod tempor incididuntut consec tetur adipisicing
                                    elit,Lorem ipsum dolor sit amet.</p>
                                </div> -->
              <div class="img">

                <a href="./main.html"><img src="images/navbarAndFooter/MM + PSF + BF.png" alt="">
</a>
              </div>
              <div class="follow" style="overflow-x: visible;">
                <p class="follow-us">Follow Us</p>
                <div class="wrapper" style="overflow-x: visible;">
                  <a href="https://tinyurl.com/biec-facebook" target="_blank" class="icon facebook">
                    <!-- <div class="tooltip">Facebook</div> -->
                    <span><i class="fab fa-facebook-f"></i></span>
                  </a>
                  <a href="https://tinyurl.com/biec-twitter" target="_blank" class="icon twitter">
                    <!-- <div class="tooltip">Twitter</div> -->
                    <span><i class="fab fa-twitter"></i></span>
                  </a>
                  <a href="https://instagram.com/biec_coep?igshid=Yzg5MTU1MDY=" target="_blank" class="icon instagram">
                    <!-- <div class="tooltip">Instagram</div> -->
                    <span><i class="fab fa-instagram"></i></span>
                  </a>
                  <a href="https://www.linkedin.com/company/pune-startup-fest/" target="_blank" class="icon linkedin">
                    <!-- <div class="tooltip">Github</div> -->
                    <span><i class="fab fa-linkedin"></i></span>
                  </a>
                  <a href="https://tinyurl.com/biec-youtube" target="_blank" class="icon youtube">
                    <!-- <div class="tooltip">Youtube</div> -->
                    <span><i class="fab fa-youtube"></i></span>
                  </a>
                </div>
              </div>

            </div>
          </div>
          <div class="col-xl-8 col-lg-8 col-md-12 mb-30 new-margin-class">
            <div class="footer-widget">
              <div class="cards">
                <div class="cardFooter card-1">
                  <span class="style" style="text-align: center; font-weight: bold;">Dr. Vidya More</span>
                  <span class="style1" style="text-align: center; padding-top: 3px;font-size: small;">Faculty
                    Advisor,</span>
                  <span class="style2"><a href="mailto:vnm.extc@coep.ac.in"
                      style="font-size: small;">vnm.extc@coep.ac.in</a></span>
                </div>
                <div class="cardFooter card-2">
                  <span class="style" style="text-align: center; font-weight: bold;">Dr. Rahul Adhao</span>
                  <span class="style1" style="text-align: center; padding-top: 3px;font-size: small;">Faculty
                    Advisor,</span>
                  <span class="style2"><a href="mailto:rba.comp@coep.ac.in"
                      style="font-size: small">rba.comp@coep.ac.in</a></span>
                </div>
                <div class="cardFooter card-3">
                  <span class="style" style="text-align: center; font-weight: bold;">Gaurav Sonewane</span>
                  <span class="style1" style="text-align: center; padding-top: 3px;font-size: small;">Secretary,</span>
                  <!-- <span class="style2">BHAU's I & E-cell</span> -->
                  <span class="style2"><a href="mailto:secretary.psf@coep.ac.in"
                      style="font-size: small;margin-left: -5px;">secretary.psf@coep.ac.in</a></span>
                </div>
                <div class="cardFooter card-4">
                  <span class="style" style="text-align: center; font-weight: bold;">Samta Raka</span>
                  <span class="style1" style="text-align: center; padding-top: 3px;font-size: small;">Finance &amp;
                    Marketing Executive,</span>
                  <span class="style3"><a href="mailto:finance.psf@coep.ac.in"
                      style="font-size:small">finance.psf@coep.ac.in</a></span>
                </div>
                <div class="cardFooter card-5">
                  <span class="style" style="text-align: center; font-weight: bold;">Sanmeet Sawla</span>
                  <span class="style1 m-0" style="text-align: center; padding-top: 3px;font-size: small;">Investor
                    Relations
                    Executive,</span>
                  <span class="style3"><a href="mailto:ir.psf@coep.ac.in"
                      style="font-size: small;">ir.psf@coep.ac.in</a></span>
                </div>
                <div class="cardFooter card-1">
                  <span class="style" style="text-align: center; font-weight: bold; font-size: 15px">Varun Shetty</span>
                  <span class="style1" style="text-align: center; padding-top: 3px;font-size: small;">Events &
                    Networking Executive,</span>
                  <span class="style3" style="font-size: small;"><a
                      href="mailto:events.psf@coep.ac.in">events.psf@coep.ac.in</a></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="copyright-area">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-6 text-center text-lg-left">
            <div class="copyright-text">
              <p>Copyright &copy; 2023, All Right Reserved</p>
            </div>

          </div>
          <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
            <div class="footer-menu">
              <ul>
                <li><a href="./main.html">Home</a></li>
                <li><a href="./aboutus.html">About Us</a></li>
                <li><a href="./investor.html">Investors</a></li>
                <li><a href="./contact.php">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="design" style="background:aqua  ">
      <p>Designed by Vedang Khedekar &amp; Web Team</p>
    </div>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanta/dist/vanta.waves.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <!--<script>-->
  <!--      const scriptURL = 'https://script.google.com/macros/s/AKfycby8k4YHAEQqB4FvJ1J47jgo_byNvW87sRa5CFJ7c2Rb7-CELXsoqetJcKrgAU1zIWGvRQ/exec'-->
  <!--      const form = document.forms['google-sheet']-->

  <!--      form.addEventListener('submit', e => {-->
  <!--          e.preventDefault()-->
  <!--          fetch(scriptURL, { method: 'POST', body: new FormData(form) })-->
  <!--              .then(response => alert("Thanks for Contacting us..! We Will Contact You Soon..."))-->
  <!--              .catch(error => console.error('Error!', error.message))-->
  <!--      })-->
  <!--  </script>-->
  <script>
    VANTA.WAVES({
      el: "#my-background",
      mouseControls: true,
      touchControls: true,
      gyroControls: false,
      minHeight: 200.00,
      minWidth: 200.00,
      scale: 1.00,
      scaleMobile: 1.00
    })
  </script>
</body>

</html>