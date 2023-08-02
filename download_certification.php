<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Certificate | EIRA</title>

    <?php
    session_start();
    include "connect.php";
    include "include/head_links.php";

    // email set up /////////////////////////////////////////////////
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    require 'PHPMailer-master/src/Exception.php';

    if(isset($_SESSION['user_id']))
    {
        $user_id = $_SESSION['user_id'];
        // get user statement data 
        $stmt_get_user = $conn->prepare("select * from users where id = ? ");
        $stmt_get_user->bind_param('i', $user_id);
        $stmt_get_user->execute();   
        $res_get_user = $stmt_get_user->get_result();
        
        // fetch users data
        $user = $res_get_user->fetch_assoc();

        $email = $user['email'];
        $fname = $user['fname']; 
        $lname = $user['lname']; 
        $contact = $user['contact']; 
        $image = $user['image']; 
        $company_univ = $user['company_univ']; 
        $address = $user['address']; 
        $date_reg = $user['date_reg']; 

        $full_name = $fname .' '. $lname;
    }
    else{
        ?>
    <script>
        location.href = "login.php";
    </script>
    <?php
    }

    // navigation bar 
    include 'include/navbar.php';
    ?>

</head>

<body>
    <main id="main">

        <?php
            if(isset($_GET['type']) && isset($_GET['full_name']) && isset($_GET['date']) && isset($_GET['cert_id']))
            {
                $type = $_GET['type'];
                $full_name = $_GET['full_name'];
                $date = $_GET['date'];
                $cert_id = $_GET['cert_id'];

                // query to check if the user actually passed the examination 
                $stmt = $conn->prepare("select * from result where email = ? and verdict = 'passed' ");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $res = $stmt->get_result();

                $row = mysqli_fetch_assoc($res);
                $verdict = $row['verdict'];

                // rna section 
                if($type == 'rna1' && $res->num_rows > 0)
                {
                    ?>
                        <!-- ======= Hero Section ======= -->
                        <section id="hero" id="verification" class="verification">
                        
                            <div class="container">
                                <div class="flex justify-content-center">
                                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                        <div data-aos="zoom-out">
                                            <h3 class="text-center text-white text-lg-center">
                                                Congratulations for passing <br> Robotics and Automation Entry Level
                                            </h3>
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
                        </section>
                        <!-- End wavy hero  -->

                        <!-- download content here  -->
                        <div class="container" style="margin-bottom: 25%; margin-top: 3%;">
                            <div class="flex justify-content-center">
                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                    <div data-aos="zoom-out">
                                        <h3 class="text-center text-dark text-lg-center mb-5">
                                            Download Robotics and Automation Entry Level <br>
                                            Certification
                                        </h3>
                                        <div class="text-center">
                                            <?php
                                                require ('certifications_template/fpdf.php');
                                                if ($verdict == 'passed') 
                                                {
                                                    $font = "certifications_template/BRUSHSCI.TTF";
                                                    $font2 = "certifications_template/Comme-Regular.TTF";
                                                    $image = imagecreatefrompng("certifications_template/rna1.png");
                                                    $color = imagecolorallocate($image, 19, 21, 22);
                                                    $name = $full_name;
                                                    $date = date("F j, Y", strtotime($date)); // format the date

                                                    $date_x = 35;
                                                    $cert_x = 265;
                                                    $name_x = 35;

                                                    // name and date positioning
                                                    imagettftext($image, 45, 0, $name_x, 320, $color, $font, $name);
                                                    imagettftext($image, 13, 0, $date_x, 575, $color, $font2, $date);
                                                    // verification mark 
                                                    imagettftext($image, 13, 0, $cert_x, 575, $color, $font2, $cert_id);

                                                    // Output the image as base64-encoded data URI
                                                    ob_start();
                                                    imagepng($image);
                                                    $data = ob_get_clean();
                                                    
                                                    // show and download the image 
                                                    imagepng($image, "certifications_img/". $full_name .".png");

                                                    $pdf = new FPDF('L', 'in' , [11.7, 8.27]);
                                                    $pdf->AddPage();
                                                    $pdf->Image("certifications_img/". $full_name .".png",0,0,11.7,8.27);
                                                    $pdf->Output("certifications_img/". $full_name .".pdf", "F");
                                                    imagedestroy($image);
                                                    
                                                    echo'
                                                        <iframe src="certifications_img/'. $full_name .'.pdf" width="100%" height="700px"></iframe>
                                                    ';
                                                }
                                                else{
                                                    ?>
                                                    <script>
                                                        location.href = "404.php";
                                                    </script>
                                                    <?php
                                                }  
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    $stmt->close();
                }
                else
                if($type == 'rna2' && $res->num_rows > 0)
                {
                    ?>
                        <!-- ======= Hero Section ======= -->
                        <section id="hero" id="verification" class="verification">
                        
                            <div class="container">
                                <div class="flex justify-content-center">
                                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                        <div data-aos="zoom-out">
                                            <h3 class="text-center text-white text-lg-center">
                                                Congratulations for passing <br> Robotics and Automation Intermediate Level
                                            </h3>
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
                        </section>
                        <!-- End wavy hero  -->

                        <!-- download content here  -->
                        <div class="container" style="margin-bottom: 25%; margin-top: 3%;">
                            <div class="flex justify-content-center">
                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                    <div data-aos="zoom-out">
                                        <h3 class="text-center text-dark text-lg-center mb-5">
                                            Download Robotics and Automation Intermediate Level <br>
                                            Certification
                                        </h3>
                                        <div class="text-center">
                                            <?php
                                                require ('certifications_template/fpdf.php');
                                                if ($verdict == 'passed') 
                                                {
                                                    $font = "certifications_template/BRUSHSCI.TTF";
                                                    $font2 = "certifications_template/Comme-Regular.TTF";
                                                    $image = imagecreatefrompng("certifications_template/rna2.png");
                                                    $color = imagecolorallocate($image, 19, 21, 22);
                                                    $name = $full_name;
                                                    $date = date("F j, Y", strtotime($date)); // format the date
                                                
                                                    $date_x = 35;
                                                    $cert_x = 265;
                                                    $name_x = 35;

                                                    // name and date positioning
                                                    imagettftext($image, 45, 0, $name_x, 320, $color, $font, $name);
                                                    imagettftext($image, 13, 0, $date_x, 575, $color, $font2, $date);
                                                    // verification mark 
                                                    imagettftext($image, 13, 0, $cert_x, 575, $color, $font2, $cert_id);

                                                    // Output the image as base64-encoded data URI
                                                    ob_start();
                                                    imagepng($image);
                                                    $data = ob_get_clean();
                                                    
                                                    // show and download the image 
                                                    imagepng($image, "certifications_img/". $full_name .".png");

                                                    $pdf = new FPDF('L', 'in' , [11.7, 8.27]);
                                                    $pdf->AddPage();
                                                    $pdf->Image("certifications_img/". $full_name .".png",0,0,11.7,8.27);
                                                    $pdf->Output("certifications_img/". $full_name .".pdf", "F");
                                                    imagedestroy($image);
                                                    
                                                    echo'
                                                        <iframe src="certifications_img/'. $full_name .'.pdf" width="100%" height="700px"></iframe>
                                                    ';
                                                }
                                                else{
                                                    ?>
                                                    <script>
                                                        location.href = "404.php";
                                                    </script>
                                                    <?php
                                                }  
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    $stmt->close();
                }
                else
                if($type == 'rna3' && $res->num_rows > 0)
                {
                    ?>
                        <!-- ======= Hero Section ======= -->
                        <section id="hero" id="verification" class="verification">
                        
                            <div class="container">
                                <div class="flex justify-content-center">
                                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                        <div data-aos="zoom-out">
                                            <h3 class="text-center text-white text-lg-center">
                                                Congratulations for passing <br> Robotics and Automation Advance Level
                                            </h3>
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
                        </section>
                        <!-- End wavy hero  -->

                        <!-- download content here  -->
                        <div class="container" style="margin-bottom: 25%; margin-top: 3%;">
                            <div class="flex justify-content-center">
                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                    <div data-aos="zoom-out">
                                        <h3 class="text-center text-dark text-lg-center mb-5">
                                            Download Robotics and Automation Advance Level <br>
                                            Certification
                                        </h3>
                                        <div class="text-center">
                                            <?php
                                                require ('certifications_template/fpdf.php');
                                                if ($verdict == 'passed') 
                                                {
                                                    $font = "certifications_template/BRUSHSCI.TTF";
                                                    $font2 = "certifications_template/Comme-Regular.TTF";
                                                    $image = imagecreatefrompng("certifications_template/rna3.png");
                                                    $color = imagecolorallocate($image, 19, 21, 22);
                                                    $name = $full_name;
                                                    $date = date("F j, Y", strtotime($date)); // format the date

                                                    $date_x = 35;
                                                    $cert_x = 265;
                                                    $name_x = 35;

                                                    // name and date positioning
                                                    imagettftext($image, 45, 0, $name_x, 320, $color, $font, $name);
                                                    imagettftext($image, 13, 0, $date_x, 575, $color, $font2, $date);
                                                    // verification mark 
                                                    imagettftext($image, 13, 0, $cert_x, 575, $color, $font2, $cert_id);

                                                    // Output the image as base64-encoded data URI
                                                    ob_start();
                                                    imagepng($image);
                                                    $data = ob_get_clean();
                                                    
                                                    // show and download the image 
                                                    imagepng($image, "certifications_img/". $full_name .".png");

                                                    $pdf = new FPDF('L', 'in' , [11.7, 8.27]);
                                                    $pdf->AddPage();
                                                    $pdf->Image("certifications_img/". $full_name .".png",0,0,11.7,8.27);
                                                    $pdf->Output("certifications_img/". $full_name .".pdf", "F");
                                                    imagedestroy($image);
                                                    
                                                    echo'
                                                        <iframe src="certifications_img/'. $full_name .'.pdf" width="100%" height="700px"></iframe>
                                                    ';
                                                }
                                                else{
                                                    ?>
                                                    <script>
                                                        location.href = "404.php";
                                                    </script>
                                                    <?php
                                                }  
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    $stmt->close();
                }
                // web dev section
                else
                if($type == 'wdv1' && $res->num_rows > 0)
                {
                    ?>
                        <!-- ======= Hero Section ======= -->
                        <section id="hero" id="verification" class="verification">
                        
                            <div class="container">
                                <div class="flex justify-content-center">
                                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                        <div data-aos="zoom-out">
                                            <h3 class="text-center text-white text-lg-center">
                                                Congratulations for passing <br> Web Development Level 1
                                            </h3>
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
                        </section>
                        <!-- End wavy hero  -->

                        <!-- download content here  -->
                        <div class="container" style="margin-bottom: 25%; margin-top: 3%;">
                            <div class="flex justify-content-center">
                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                    <div data-aos="zoom-out">
                                        <h3 class="text-center text-dark text-lg-center mb-5">
                                            Download Web Development Level 1 <br>
                                            Certification
                                        </h3>
                                        <div class="text-center">
                                            <?php
                                                require ('certifications_template/fpdf.php');
                                                if ($verdict == 'passed') 
                                                {
                                                    $font = "certifications_template/BRUSHSCI.TTF";
                                                    $font2 = "certifications_template/Comme-Regular.TTF";
                                                    $image = imagecreatefrompng("certifications_template/wdv1.png");
                                                    $color = imagecolorallocate($image, 19, 21, 22);
                                                    $name = $full_name;
                                                    $date = date("F j, Y", strtotime($date)); // format the date

                                                    // center align the date
                                                    $date_width = imagettfbbox(13, 0, $font2, $date); 
                                                    $date_width = abs($date_width[4] - $date_width[0]);
                                                    $date_x = (imagesx($image) - $date_width) / 23;

                                                    $cert_x = 265;
                                                    $name_x = 35;

                                                    // name and date positioning
                                                    imagettftext($image, 45, 0, $name_x, 320, $color, $font, $name);
                                                    imagettftext($image, 13, 0, $date_x, 575, $color, $font2, $date);
                                                    // verification mark 
                                                    imagettftext($image, 13, 0, $cert_x, 575, $color, $font2, $cert_id);

                                                    // Output the image as base64-encoded data URI
                                                    ob_start();
                                                    imagepng($image);
                                                    $data = ob_get_clean();
                                                    
                                                    // show and download the image 
                                                    imagepng($image, "certifications_img/". $full_name .".png");

                                                    $pdf = new FPDF('L', 'in' , [11.7, 8.27]);
                                                    $pdf->AddPage();
                                                    $pdf->Image("certifications_img/". $full_name .".png",0,0,11.7,8.27);
                                                    $pdf->Output("certifications_img/". $full_name .".pdf", "F");
                                                    imagedestroy($image);
                                                    
                                                    echo'
                                                        <iframe src="certifications_img/'. $full_name .'.pdf" width="100%" height="700px"></iframe>
                                                    ';
                                                }
                                                else{
                                                    ?>
                                                    <script>
                                                        location.href = "404.php";
                                                    </script>
                                                    <?php
                                                } 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    $stmt->close();
                }
                else
                if($type == 'wdv2' && $res->num_rows > 0)
                {
                    ?>
                        <!-- ======= Hero Section ======= -->
                        <section id="hero" id="verification" class="verification">
                        
                            <div class="container">
                                <div class="flex justify-content-center">
                                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                        <div data-aos="zoom-out">
                                            <h3 class="text-center text-white text-lg-center">
                                                Congratulations for passing <br> Web Development Level 2
                                            </h3>
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
                        </section>
                        <!-- End wavy hero  -->

                        <!-- download content here  -->
                        <div class="container" style="margin-bottom: 25%; margin-top: 3%;">
                            <div class="flex justify-content-center">
                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                    <div data-aos="zoom-out">
                                        <h3 class="text-center text-dark text-lg-center mb-5">
                                            Download Web Development Level 2 <br>
                                            Certification
                                        </h3>
                                        <div class="text-center">
                                            <?php
                                                require ('certifications_template/fpdf.php');
                                                if ($verdict == 'passed') 
                                                {
                                                    $font = "certifications_template/BRUSHSCI.TTF";
                                                    $font2 = "certifications_template/Comme-Regular.TTF";
                                                    $image = imagecreatefrompng("certifications_template/wdv2.png");
                                                    $color = imagecolorallocate($image, 19, 21, 22);
                                                    $name = $full_name;
                                                    $date = date("F j, Y", strtotime($date)); // format the date

                                                    $date_x = 35;
                                                    $cert_x = 265;
                                                    $name_x = 35;

                                                    // name and date positioning
                                                    imagettftext($image, 45, 0, $name_x, 320, $color, $font, $name);
                                                    imagettftext($image, 13, 0, $date_x, 575, $color, $font2, $date);
                                                    // verification mark 
                                                    imagettftext($image, 13, 0, $cert_x, 575, $color, $font2, $cert_id);

                                                    // Output the image as base64-encoded data URI
                                                    ob_start();
                                                    imagepng($image);
                                                    $data = ob_get_clean();
                                                    
                                                    // show and download the image 
                                                    imagepng($image, "certifications_img/". $full_name .".png");

                                                    $pdf = new FPDF('L', 'in' , [11.7, 8.27]);
                                                    $pdf->AddPage();
                                                    $pdf->Image("certifications_img/". $full_name .".png",0,0,11.7,8.27);
                                                    $pdf->Output("certifications_img/". $full_name .".pdf", "F");
                                                    imagedestroy($image);
                                                    
                                                    echo'
                                                        <iframe src="certifications_img/'. $full_name .'.pdf" width="100%" height="700px"></iframe>
                                                    ';
                                                }
                                                else{
                                                    ?>
                                                    <script>
                                                        location.href = "404.php";
                                                    </script>
                                                    <?php
                                                } 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    $stmt->close();
                }
                else
                if($type == 'wdv3' && $res->num_rows > 0)
                {
                    ?>
                        <!-- ======= Hero Section ======= -->
                        <section id="hero" id="verification" class="verification">
                        
                            <div class="container">
                                <div class="flex justify-content-center">
                                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                        <div data-aos="zoom-out">
                                            <h3 class="text-center text-white text-lg-center">
                                                Congratulations for passing <br> Web Development Level 3
                                            </h3>
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
                        </section>
                        <!-- End wavy hero  -->

                        <!-- download content here  -->
                        <div class="container" style="margin-bottom: 25%; margin-top: 3%;">
                            <div class="flex justify-content-center">
                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                    <div data-aos="zoom-out">
                                        <h3 class="text-center text-dark text-lg-center mb-5">
                                            Download Web Development Level 3 <br>
                                            Certification
                                        </h3>
                                        <div class="text-center">
                                            <?php
                                                require ('certifications_template/fpdf.php');
                                                if ($verdict == 'passed') 
                                                {
                                                    $font = "certifications_template/BRUSHSCI.TTF";
                                                    $font2 = "certifications_template/Comme-Regular.TTF";
                                                    $image = imagecreatefrompng("certifications_template/wdv3.png");
                                                    $color = imagecolorallocate($image, 19, 21, 22);
                                                    $name = $full_name;
                                                    $date = date("F j, Y", strtotime($date)); // format the date

                                                    $date_x = 35;
                                                    $cert_x = 265;
                                                    $name_x = 35;

                                                    // name and date positioning
                                                    imagettftext($image, 45, 0, $name_x, 320, $color, $font, $name);
                                                    imagettftext($image, 13, 0, $date_x, 575, $color, $font2, $date);
                                                    // verification mark 
                                                    imagettftext($image, 13, 0, $cert_x, 575, $color, $font2, $cert_id);

                                                    // Output the image as base64-encoded data URI
                                                    ob_start();
                                                    imagepng($image);
                                                    $data = ob_get_clean();
                                                    
                                                    // show and download the image 
                                                    imagepng($image, "certifications_img/". $full_name .".png");

                                                    $pdf = new FPDF('L', 'in' , [11.7, 8.27]);
                                                    $pdf->AddPage();
                                                    $pdf->Image("certifications_img/". $full_name .".png",0,0,11.7,8.27);
                                                    $pdf->Output("certifications_img/". $full_name .".pdf", "F");
                                                    imagedestroy($image);
                                                    
                                                    echo'
                                                        <iframe src="certifications_img/'. $full_name .'.pdf" width="100%" height="700px"></iframe>
                                                    ';
                                                }
                                                else{
                                                    ?>
                                                    <script>
                                                        location.href = "404.php";
                                                    </script>
                                                    <?php
                                                } 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    $stmt->close();
                }
                else
                if($type == 'wdv4' && $res->num_rows > 0)
                {
                    ?>
                        <!-- ======= Hero Section ======= -->
                        <section id="hero" id="verification" class="verification">
                        
                            <div class="container">
                                <div class="flex justify-content-center">
                                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                        <div data-aos="zoom-out">
                                            <h3 class="text-center text-white text-lg-center">
                                                Congratulations for passing <br> Web Development Level 4
                                            </h3>
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
                        </section>
                        <!-- End wavy hero  -->

                        <!-- download content here  -->
                        <div class="container" style="margin-bottom: 25%; margin-top: 3%;">
                            <div class="flex justify-content-center">
                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                    <div data-aos="zoom-out">
                                        <h3 class="text-center text-dark text-lg-center mb-5">
                                            Download Web Development Level 4 <br>
                                            Certification
                                        </h3>
                                        <div class="text-center">
                                            <?php
                                                require ('certifications_template/fpdf.php');
                                                if ($verdict == 'passed') 
                                                {
                                                    $font = "certifications_template/BRUSHSCI.TTF";
                                                    $font2 = "certifications_template/Comme-Regular.TTF";
                                                    $image = imagecreatefrompng("certifications_template/wdv4.png");
                                                    $color = imagecolorallocate($image, 19, 21, 22);
                                                    $name = $full_name;
                                                    $date = date("F j, Y", strtotime($date)); // format the date

                                                    $date_x = 35;
                                                    $cert_x = 265;
                                                    $name_x = 35;

                                                    // name and date positioning
                                                    imagettftext($image, 45, 0, $name_x, 320, $color, $font, $name);
                                                    imagettftext($image, 13, 0, $date_x, 575, $color, $font2, $date);
                                                    // verification mark 
                                                    imagettftext($image, 13, 0, $cert_x, 575, $color, $font2, $cert_id);

                                                    // Output the image as base64-encoded data URI
                                                    ob_start();
                                                    imagepng($image);
                                                    $data = ob_get_clean();
                                                    
                                                    // show and download the image 
                                                    imagepng($image, "certifications_img/". $full_name .".png");

                                                    $pdf = new FPDF('L', 'in' , [11.7, 8.27]);
                                                    $pdf->AddPage();
                                                    $pdf->Image("certifications_img/". $full_name .".png",0,0,11.7,8.27);
                                                    $pdf->Output("certifications_img/". $full_name .".pdf", "F");
                                                    imagedestroy($image);
                                                    
                                                    echo'
                                                        <iframe src="certifications_img/'. $full_name .'.pdf" width="100%" height="700px"></iframe>
                                                    ';
                                                }
                                                else{
                                                    ?>
                                                    <script>
                                                        location.href = "404.php";
                                                    </script>
                                                    <?php
                                                } 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    $stmt->close();
                }
                else
                if($type == 'wdv5' && $res->num_rows > 0)
                {
                    ?>
                        <!-- ======= Hero Section ======= -->
                        <section id="hero" id="verification" class="verification">
                        
                            <div class="container">
                                <div class="flex justify-content-center">
                                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                        <div data-aos="zoom-out">
                                            <h3 class="text-center text-white text-lg-center">
                                                Congratulations for passing <br> Web Development Level 5
                                            </h3>
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
                        </section>
                        <!-- End wavy hero  -->

                        <!-- download content here  -->
                        <div class="container" style="margin-bottom: 25%; margin-top: 3%;">
                            <div class="flex justify-content-center">
                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                    <div data-aos="zoom-out">
                                        <h3 class="text-center text-dark text-lg-center mb-5">
                                            Download Web Development Level 5 <br>
                                            Certification
                                        </h3>
                                        <div class="text-center">
                                            <?php
                                                require ('certifications_template/fpdf.php');
                                                if ($verdict == 'passed') 
                                                {
                                                    $font = "certifications_template/BRUSHSCI.TTF";
                                                    $font2 = "certifications_template/Comme-Regular.TTF";
                                                    $image = imagecreatefrompng("certifications_template/wdv5.png");
                                                    $color = imagecolorallocate($image, 19, 21, 22);
                                                    $name = $full_name;
                                                    $date = date("F j, Y", strtotime($date)); // format the date
                                      
                                                    $date_x = 35;
                                                    $cert_x = 265;
                                                    $name_x = 35;

                                                    // name and date positioning
                                                    imagettftext($image, 45, 0, $name_x, 320, $color, $font, $name);
                                                    imagettftext($image, 13, 0, $date_x, 575, $color, $font2, $date);
                                                    // verification mark 
                                                    imagettftext($image, 13, 0, $cert_x, 575, $color, $font2, $cert_id);

                                                    // Output the image as base64-encoded data URI
                                                    ob_start();
                                                    imagepng($image);
                                                    $data = ob_get_clean();
                                                    
                                                    // show and download the image 
                                                    imagepng($image, "certifications_img/". $full_name .".png");

                                                    $pdf = new FPDF('L', 'in' , [11.7, 8.27]);
                                                    $pdf->AddPage();
                                                    $pdf->Image("certifications_img/". $full_name .".png",0,0,11.7,8.27);
                                                    $pdf->Output("certifications_img/". $full_name .".pdf", "F");
                                                    imagedestroy($image);
                                                    
                                                    echo'
                                                        <iframe src="certifications_img/'. $full_name .'.pdf" width="100%" height="700px"></iframe>
                                                    ';
                                                }
                                                else{
                                                    ?>
                                                    <script>
                                                        location.href = "404.php";
                                                    </script>
                                                    <?php
                                                } 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    $stmt->close();
                }
                else{
                    ?>
                        <script>
                            location.href = "404.php";
                        </script>
                    <?php
                }
            }
            else
            {
                ?>
                    <script>
                        location.href = "404.php";
                    </script>
                <?php
            }
        
        ?>
        
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