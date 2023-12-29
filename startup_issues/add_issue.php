<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="../images/navbarAndFooter/PSF24 White.png"
    />

    <title>Add Issues</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&family=Nothing+You+Could+Do&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"
    ></script>
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
    ></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              inter: ["Inter", "sans-serif"],
              nycd: ["Nothing You Could Do", "cursive"],
            },
          },
        },
      };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css"
    />
    <script src="https://unpkg.com/scrollreveal"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <link rel="stylesheet" href="../styles/footer24.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../styles/navbar24.css" />

    <style>
      /* Add CSS styles for form layout */
      /* ... Your CSS styles here ... */
      /* Style the form container */
      body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #131b3d;
        margin: 0;
        padding: 0;
        align-items: center;
        height: 100vh;
      }

      /* Optional: Add additional styles for validation/error messages */
      .error-message {
        color: #e74c3c;
        margin-top: 5px;
      }

      .form {
        --input-focus: #2d8cf0;
        --font-color: #323232;
        --font-color-sub: #666;
        --bg-color: #fff;
        --main-color: #323232;
        padding: 20px;
        background: lightgrey;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 20px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        box-shadow: 4px 4px var(--main-color);
        margin-top: 40px;
        width: 30rem;
        margin-left: 27.5%;
      }

      .title {
        color: var(--font-color);
        font-weight: 900;
        font-size: 20px;
        margin-bottom: 25px;
      }

      .title span {
        color: var(--font-color-sub);
        font-weight: 600;
        font-size: 17px;
      }

      .input {
        width: 300px;
        height: 40px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        background-color: var(--bg-color);
        box-shadow: 4px 4px var(--main-color);
        font-size: 15px;
        font-weight: 600;
        color: var(--font-color);
        padding: 5px 10px;
        outline: none;
      }

      .input::placeholder {
        color: var(--font-color-sub);
        opacity: 0.8;
      }

      .input:focus {
        border: 2px solid var(--input-focus);
      }

      .button-confirm:active {
        box-shadow: 0px 0px var(--main-color);
        transform: translate(3px, 3px);
      }

      .button {
        margin: auto 0 auto;
        width: 120px;
        height: 40px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        background-color: var(--bg-color);
        box-shadow: 4px 4px var(--main-color);
        font-size: 17px;
        font-weight: 600;
        color: var(--font-color);
        cursor: pointer;
      }

      #submit {
        position: relative;
        margin: 50px auto 0 auto;
      }

      #description {
        height: 100px;
      }

      @media (min-width: 319px) and (max-width: 500px) {
        .input .form {
          display: grid;
          width: 80%;

          margin-top: 200px;
          min-height: 450px;
          margin: auto;
          justify-content: center;
        }
      }
    </style>
  </head>

  <body>
    <!-- NAVBAR START -->
    <nav style="position: fixed; z-index: 9999999; padding-top: 1rem">
      <input type="checkbox" id="checkbox3" class="checkbox3 visuallyHidden" />
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
      <!-- <div class="imgg"><a href="../main"><img  class="imgg" src="PSF + Marsh White1.png" alt=""></a></div> -->

      <ul>
        <!-- <img class="imgg" src="PSF + Marsh White1.png" alt="PSF + Marsh White1.png"> -->

        <li>
          <a href="../main.html">
            <i
              id="icon"
              class="fa-solid fa-house icon"
              style="padding-right: 0.5rem"
            ></i>
            Home</a
          >
        </li>
        <li>
          <a href="../aboutus.html">
            <i
              id="icon"
              class="fa-regular fa-file-lines"
              style="padding-right: 0.5rem"
            ></i>
            About Us</a
          >
        </li>

        <li>
          <a href="../events.html">
            <i
              id="icon"
              class="fa-sharp fa-solid fa-puzzle-piece"
              style="padding-right: 0.5rem"
            ></i
            >Events</a
          >
        </li>

        <li>
          <a href="../investor.html"
            ><i
              id="icon"
              class="fa-solid fa-shoe-prints"
              style="padding-right: 0.5rem"
            ></i
            >Investors</a
          >
        </li>
        <li>
          <a href="../partners.html"
            ><i
              id="icon"
              class="fa-solid fa-envelope-open-text"
              style="padding-right: 0.5rem"
            ></i
            >Sponsors</a
          >
        </li>

        <div class="dropdown">
          <button class="dropbtn">
            OTHER <i class="fa-solid fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="../internship_portal.html">
              <i
                id="icon"
                class="fa-regular fa-calendar-days"
                style="padding-right: 0.5rem"
              ></i
              >INTERNSHIP PORTAL
            </a>
            <a href="../alumni.html">
              <i
                id="icon"
                class="fa-regular fa-calendar-days"
                style="padding-right: 0.5rem"
              ></i
              >Alumni
            </a>
            <a href="../startupexpo.html">
              <i
                id="icon"
                class="fa-solid fa-people-group"
                style="padding-right: 0.5rem"
              ></i
              >STARTUP</a
            >
            <a href="../visitorreg.php">
              <i
                id="icon"
                class="fa-solid fa-hand-holding-dollar"
                style="padding-right: 0.5rem"
              ></i
              >Registration</a
            >
            <a href="../team.html">
              <i
                id="icon"
                class="fa-solid fa-hand-holding-dollar"
                style="padding-right: 0.5rem"
              ></i
              >Team</a
            >
          </div>
        </div>
        <li class="mobli">
          <a href="../internship_portal.html">
            <i
              id="icon"
              class="fa-regular fa-calendar-days"
              style="padding-right: 0.5rem"
            ></i
            >Internship Portal</a
          >
        </li>
        <li class="mobli">
          <a href="../alumni.html">
            <i
              id="icon"
              class="fa-regular fa-calendar-days"
              style="padding-right: 0.5rem"
            ></i
            >Alumni
          </a>
        </li>
        <li class="mobli">
          <a href="../startupexpo.html">
            <i
              id="icon"
              class="fa-solid fa-people-group"
              style="padding-right: 0.5rem"
            ></i
            >STARTUP</a
          >
        </li>
        <li class="mobli">
          <a href="../visitorreg.php">
            <i
              id="icon"
              class="fa-solid fa-hand-holding-dollar"
              style="padding-right: 0.5rem"
            ></i
            >Registration</a
          >
        </li>
        <li class="mobli">
          <a href="../team.html">
            <i
              id="icon"
              class="fa-solid fa-hand-holding-dollar"
              style="padding-right: 0.5rem"
            ></i
            >Team</a
          >
        </li>

        <div class="dropdown">
          <button class="dropbtn">
            FEEDBACK <i class="fa-solid fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="../startup_feedback.html">
              <i
                id="icon"
                class="fa-regular fa-calendar-days"
                style="padding-right: 0.5rem"
              ></i
              >Startup Feedback
            </a>
            <a href="../investor_feedback.html">
              <i
                id="icon"
                class="fa-regular fa-calendar-days"
                style="padding-right: 0.5rem"
              ></i
              >Investor Feedback
            </a>
          </div>
        </div>
        <li class="mobli">
          <a href="../startup_feedback.html">
            <i
              id="icon"
              class="fa-solid fa-hand-holding-dollar"
              style="padding-right: 0.5rem"
            ></i
            >Startup Feedback</a
          >
        </li>
        <li class="mobli">
          <a href="../investor_feedback.html">
            <i
              id="icon"
              class="fa-solid fa-hand-holding-dollar"
              style="padding-right: 0.5rem"
            ></i
            >Investor Feedback</a
          >
        </li>
        <!-- <li><a href="#"> <i id="icon" class="fa-regular fa-handshake" style="padding-right: 0.5rem;"></i>Feedback </a></li> -->
        <li>
          <a href="../contact.php"
            ><i
              id="icon"
              class="fa-solid fa-user-group"
              style="padding-right: 0.5rem"
            ></i
            >Contact Us</a
          >
        </li>
      </ul>
    </nav>

    <!-- NAVBAR END -->

    <main
      class="relative min-h-screen flex flex-col justify-center bg-slate-900 overflow-hidden"
    >
      <!-- Can add content Here(Start) accorfing to need-->

      <!-- Can add content Here(End) -->
      <div class="w-full mx-auto px-4 md:px-6 py-24">
        <!-- Can add content Here(Start) accorfing to need-->

        <form
          class="form"
          action="process_issue.php"
          method="POST"
          enctype="multipart/form-data"
        >
          <div class="title">
            PSF'24<br />
            <span>add_issue</span>
          </div>

          <input
            placeholder="Startup Name"
            type="text"
            required
            id="startup_name"
            name="startup_name"
            class="input"
          />

          <input
            placeholder="Stall Number"
            type="text"
            required
            id="stall_no"
            name="stall_no"
            class="input"
          />

          <br />
          Upload Image (if any)
          <input
            placeholder="Image"
            accept="image/*"
            type="file"
            id="image"
            name="image"
            class="input"
          />

          <input
            placeholder="Contact"
            type="text"
            required="id"
            ="contact"
            name="contact"
            class="input"
          />
          <input
            placeholder="Issue"
            type="text"
            required
            id="issue"
            name="issue"
            class="input"
          />

          <textarea
            name="description"
            placeholder="Description"
            type="text"
            id="description"
            class="input"
          ></textarea>

          <input
            class="button"
            id="submit"
            type="submit"
            name="submit"
            value="Submit"
          />
        </form>

        <!-- Can add content Here(End) -->
      </div>
      <!-- Can add content Here(Start) accorfing to need-->

      <!-- Can add content Here(End) -->

      <div class="text-center">
        <!-- Illustration #1 -->
        <div
          class="absolute top-0 left-0 rotate-180 -translate-x-3/4 -scale-x-100 blur-3xl opacity-70 pointer-events-none"
          aria-hidden="true"
        >
          <img
            src="../svg/shape.svg"
            class="max-w-none"
            width="852"
            height="582"
            alt="Illustration"
          />
        </div>

        <!-- Illustration #2 -->
        <div
          class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 blur-3xl opacity-70 pointer-events-none"
          aria-hidden="true"
        >
          <img
            src="../svg/shape.svg"
            class="max-w-none"
            width="852"
            height="582"
            alt="Illustration"
          />
        </div>
        <div
          class="absolute left-50 -translate-y-1/2 translate-x-1/4 blur-3xl opacity-60 pointer-events-none"
          style="top: 90%"
          aria-hidden="true"
        >
          <img
            src="../svg/shape.svg"
            class="max-w-none"
            width="852"
            height="582"
            alt="Illustration"
          />
        </div>
        <!-- Illustration #3 -->
        <div
          class="absolute top-80 left-100 -translate-y-1 translate-x-1/4 blur-3xl opacity-70 pointer-events-none"
          aria-hidden="true"
        >
          <img
            src="../svg/shape.svg"
            class="max-w-none"
            width="852"
            height="582"
            alt="Illustration"
          />
        </div>
        <div
          class="absolute left-50 -translate-y-1/2 translate-x-1/4 blur-3xl opacity-60 pointer-events-none"
          style="top: 90%"
          aria-hidden="true"
        >
          <img
            src="../svg/shape.svg"
            class="max-w-none"
            width="852"
            height="582"
            alt="Illustration"
          />
        </div>

        <!-- Particles animation -->
        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
          <canvas data-particle-animation></canvas>
        </div>
        <div class="relative"></div>
      </div>
      <!-- </div> -->

      <!-- Ilusration #5 -->
      <!-- <div class="absolute bottom-0 left-50 rotate-180 -translate-x-1 -scale-x-100 blur-3xl opacity-70 pointer-events-none" aria-hidden="true">
		  <img src="../svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration">
	  </div> -->
    </main>

    <footer>
      <div class="ftcardcontainer">
        <link
          rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous"
        />

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
            <div class="fttop"></div>
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
          <span
            ><img
              style="margin-left: 30%; max-width: 40%"
              src="../images/navbarAndFooter/PSF24 White.png"
              alt=""
          /></span>

          <p class="ftfooter-links">
            <a href="./main.html" class="ftlink-1">Home</a>

            <a href="./aboutus.html">About Us</a>

            <a href="./investor.html">Investors</a>

            <a href="./contact.php">Contact</a>
          </p>

          <p class="ftfooter-company-name">PUNE STARTUP FEST</p>
        </div>

        <div class="ftfooter-center">
          <div class="icons">
            <i class="fa fa-map-marker"></i>
            <a
              href="https://www.google.com/maps/dir//COEP+Technological+University,+Wellesley+Rd,+Shivajinagar,+Pune,+Maharashtra+411005/@18.5160113,73.8198323,14z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3bc2c0883858b873:0x1d68fbf2cac75519!2m2!1d73.856541!2d18.5293825?entry=ttu"
            >
              <p>
                <span>Bhau's I&E Cell, COEP TECH</span> Shivajinagar,
                Pune-411005
              </p>
            </a>
          </div>

          <div class="icons">
            <i class="fa fa-phone"></i>
            <p><a href=""> Contact us </a></p>
          </div>

          <div class="icons">
            <i class="fa fa-envelope"></i>
            <p>
              <a href="mailto:queries.psf@gmail.com">queries.psf@gmail.com</a>
            </p>
          </div>
          <!-- <div class="ftCopyright">
					<p>Copyright &copy; 2023, All Rights Reserved</p>
				</div> -->
        </div>

        <div class="ftfooter-right">
          <p class="ftfooter-company-about">
            <span>About Pune Startup Fest</span>
            Pune Startup Fest is an unique Startup Expo, which provides an
            excellent platform for numerous students and Start-ups to connect
            with this ever growing entrepreneurial world.
          </p>

          <div class="ftfooter-icons">
            <!-- <h3>Follow Us:</h3> -->
            <a href="https://www.facebook.com/biec.coep/"
              ><i class="fa fa-facebook"></i
            ></a>
            <a
              href="https://twitter.com/BIEC_COEP?t=UdnnunU2-JfVRhQ_SBoRBQ&s=08"
              ><i class="fa fa-twitter"></i
            ></a>
            <a href="https://www.linkedin.com/company/pune-startup-fest/"
              ><i class="fa fa-linkedin"></i
            ></a>
            <a href="https://www.instagram.com/biec_coep/?igshid=Yzg5MTU1MDY%3D"
              ><i class="fa fa-instagram"></i
            ></a>
            <a
              href="https://www.youtube.com/c/BhausInnovationEntrepreneurshipCellCOEP2022"
              ><i class="fa fa-youtube"></i
            ></a>

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
        <div class="ftCopyright designed" style="background-color: #1c335a">
          <p>DESIGNED BY WEB TEAM</p>
        </div>
      </footer>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="../js/particle-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
        offset: 300,
        duration: 2000, // Animation duration in milliseconds
        once: false, // Animation only once on page load
      });
    </script>
    <script
      src="https://kit.fontawesome.com/6fc46b33e7.js"
      crossorigin="anonymous"
    ></script>

    <script>
      // Add JavaScript for displaying a popup after form submission
      document.addEventListener("DOMContentLoaded", function () {
        var form = document.querySelector(".form");
        form.addEventListener("submit", function () {
          alert("Issue submitted successfully!");
        });
      });
    </script>
  </body>
</html>
