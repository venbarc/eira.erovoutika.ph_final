<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board Exam | EIRA</title>

    <?php
    session_start();
    include "connect.php";
    include "include/head_links.php";

    // email set up /////////////////////////////////////////////////
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    require 'PHPMailer-master/src/Exception.php';

    // navigation bar 
    include 'include/navbar.php';
    ?>

</head>

<body>
    <main id="main">
        <!-- ======= Hero Section ======= -->
        <section id="hero">

            <div class="container">
                <div class="flex justify-content-center">
                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                        <div data-aos="zoom-out">
                            <h1 class="text-center text-lg-center">ECT and ECE Board Exam Review </h1>
                            <h2 class="text-center text-lg-center"> Mathematics, General Engineering and Applied
                                Sciences, <br>
                                Electronics Technician, Electronics Engineering, and Electronics Systems and
                                technologies
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28 " preserveAspectRatio="none">
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

        </section><!-- End Hero -->


        <!-- ======= board_exam Section ======= -->
        <section id="board_exam" class="board_exam">
            <div class="container">

                <div class="row" data-aos="fade-left">

                    <!-- Mathematics section here  -->
                    <div class="col-lg-3 col-md-6">
                        <div class="box featured" data-aos="zoom-in" data-aos-delay="100">
                            <span class="avail">Available</span>
                            <h3>Mathematics</h3>
                            <div class="pic"><img src="assets/img/review/math.webp" class="img-fluid" alt=""></div>
                            <div class="btn-wrap">
                                <a href="https://docs.google.com/forms/d/e/1FAIpQLSfHGJH8sA7Lh6YKZK-Oy8jqo5rDPsFgLCqLz9fWuqda9gp5HA/viewform"
                                    target="_blank" class="btn-enroll">Enroll Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- ELECTRONICS TECHNICIAN section here  -->
                    <div class="col-lg-3 col-md-6">
                        <div class="box featured" data-aos="zoom-in" data-aos-delay="100">
                            <span class="avail">Available</span>
                            <h3>Electronics Technician</h3>
                            <div class="pic"><img src="assets/img/review/ECT.webp" class="img-fluid" alt=""></div>
                            <div class="btn-wrap">
                                <a href="https://bit.ly/ECTReviewERo" target="_blank" class="btn-enroll">Enroll Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- General Engineering and applied Science section here  -->
                    <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                        <div class="box featured" data-aos="zoom-in" data-aos-delay="200">
                            <span class="coming_soon">Coming soon</span>
                            <h3>General Engineering
                                and Applied Sciences</h3>
                            <div class="pic"><img src="assets/img/review/geas.webp" class="img-fluid" alt=""></div>
                            <div class="btn-wrap">
                                <!-- <a href="#" class="btn-enroll"> Enroll Now </a> -->
                            </div>
                        </div>
                    </div>

                    <!-- Electronics Engineering section here  -->
                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <div class="box featured" data-aos="zoom-in" data-aos-delay="300">
                            <span class="coming_soon">Coming soon</span>
                            <h3>Electronics Engineering</h3>
                            <div class="pic"><img src="assets/img/review/ee.webp" class="img-fluid" alt=""></div>
                            <div class="btn-wrap">
                                <!-- <a href="#" class="btn-enroll"> Enroll Now </a> -->
                            </div>
                        </div>
                    </div>

                    <!-- Electronics System and technologies section here  -->
                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <div class="box featured" data-aos="zoom-in" data-aos-delay="400">
                            <span class="coming_soon">Coming soon</span>
                            <h3>Electronics Systems
                                and technologies</h3>
                            <div class="pic"><img src="assets/img/review/est.webp" class="img-fluid" alt=""></div>


                            <div class="btn-wrap">
                                <!-- <a href="#" class="btn-enroll"> Enroll Now </a>   -->
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Pricing Section -->

        <?php

        include 'include/how2_enroll.php';
        include 'include/contact.php';
        ?>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <?php
    include "include/foot_links.php";

    // navigation bar 
    include 'include/footer.php';
    ?>

</body>

</html>