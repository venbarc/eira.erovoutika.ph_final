<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | EIRA</title>

    <?php
    session_start();
    include "connect.php";
    include "include/head_links.php";

    // email set up /////////////////////////////////////////////////
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    require 'PHPMailer-master/src/Exception.php';

    // check if user is logged in 
    if(isset($_SESSION['user_id']))
    {
        ?>
            <script>
                location.href = "404.php";
            </script>
        <?php
    }

    // navigation bar 
    include 'include/navbar.php';
    ?>

</head>

<body>
    <main id="main">
        <!-- ======= Hero Section ======= -->
        <section id="hero" id="change_email_verification" class="change_email_verification">
        
        <div class="container">
            <div class="flex justify-content-center">
                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                    <div data-aos="zoom-out">

                        <?php
                            if(isset($_GET['email']))
                            {
                                $email = $_GET['email'];

                                echo'
                                    <h3 class="text-center text-white text-lg-center mb-5">
                                        We Have sent you your new password in <span class="text-warning">'. $email .'</span>
                                    </h3>
                                    <h2 class="text-dark bg-warning text-center p-3">
                                        Note: Please change your new password after logging in.
                                    </h2>

                                    <h3 class="text-center">
                                        <a href="login.php?email='.$email.'" class="btn btn-warning">
                                            Login here
                                        </a>
                                    </h3>
                                ';
                            }
                        ?>
                        

                    </div>
                </div>
            </div>
        </div>
        <!-- Start wavy hero  -->
        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>
        <!-- End wavy hero  -->
        </section>


        <script>
            // verification 
            const pinInput = document.getElementById("pin");
            const pinBoxes = document.querySelectorAll(".pin-box");

            pinInput.addEventListener("input", function(event) {
            const pinValue = event.target.value;
            for (let i = 0; i < pinBoxes.length; i++) {
                pinBoxes[i].textContent = pinValue[i] || "";
            }
            });
        </script>
        
    <?php
    include 'include/contact.php';
    ?>

    </main>
    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <?php
    include "include/foot_links.php";

    // navigation bar 
    include 'include/footer.php';
    ?>

</body>

</html>