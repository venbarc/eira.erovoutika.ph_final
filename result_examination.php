<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examination Result | EIRA</title>

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

    <main>

        <!-- start  -->
        <main id="main" id="result_exam" class="result_exam">

            <?php
                if(isset($_GET['type']))
                {
                    $type = $_GET['type'];

                    // check if it's the actual approval in url and db
                    $stmt = $conn->prepare("select * from payments where email = ? and approval = ?");
                    $stmt->bind_param("ss", $email, $approval);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    $row = mysqli_fetch_assoc($res);
                  
                    // check if it's already approved
                    // rna section 
                    if($type == 'rna1')
                    {
                        // check if there are result in database 
                        $stmt = $conn->prepare("select * from result where email = ?");
                        $stmt->bind_param('s', $email);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        if($res->num_rows > 0) //if user already have result
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Examination Result <br>
                                                        Robotics and Automation Entry Level
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 24 150 28 " preserveAspectRatio="none">
                                        <defs>
                                            <path id="wave-path"
                                                d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
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
                                <!-- End Hero -->

                                <section>
                                    <div class="container">
                                        <div class="section-title" data-aos="fade-up">
                                            <h2 class="text-secondary">Robotics and Automation </h2>
                                            <p>Entry Level Result</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data result -->
                                                    
                                                    <?php 
                                                        $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            echo'
                                                                <h3>Exam Details</h3>
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col"> Exam Code Level </th>
                                                                            <th scope="col"> Level </th>
                                                                            <th scope="col"> Email </th>
                                                                            <th scope="col"> Full Name </th>
                                                                            <th scope="col"> Date Completed </th>
                                                                        </tr>
                                                                    </thead>
                                                            ';
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                $email = $row['email'];
                                                                $full_name = $row['full_name'];
                                                                $date = $row['date'];
                                                                $cert_id = $row['cert_id'];

                                                                $user_percent_1 = $row['user_percent_1'];
                                                                $user_percent_2 = $row['user_percent_2'];
                                                                $user_percent_3 = $row['user_percent_3'];
                                                                $user_percent_4 = $row['user_percent_4'];
                                                                $overall_user_percent = $row['overall_user_percent'];

                                                                $max_percent_1 = $row['max_percent_1'];
                                                                $max_percent_2 = $row['max_percent_2'];
                                                                $max_percent_3 = $row['max_percent_3'];
                                                                $max_percent_4 = $row['max_percent_4'];
                                                                $overall_max_percent = $row['overall_max_percent'];

                                                                $verdict = $row['verdict'];

                                                                $code = '';
                                                                $level = '';

                                                                $color1 = '';
                                                                $color2 = '';
                                                                $color3 = '';
                                                                $color4 = '';
                                                                $color5 = '';

                                                                switch ($type) {
                                                                    case 'rna1':
                                                                        $code = 'RA-101';
                                                                        $level = 'Entry Level';
                                                                        break;
                                                                    case 'rna2':
                                                                        $code = 'RA-102';
                                                                        $level = '2nd Level';
                                                                        break;
                                                                    case 'rna3':
                                                                        $code = 'RA-103';
                                                                        $level = '3rd Level';
                                                                        break;
                                                                    default:
                                                                        // Default action if $type does not match any of the above cases
                                                                        $code = '';
                                                                        $level = '';
                                                                        break;
                                                                }
                                                                
                                                                // get half of max percentages first
                                                                $half_max_percent_1 = ($max_percent_1 / 2);
                                                                $half_max_percent_2 = ($max_percent_2 / 2);
                                                                $half_max_percent_3 = ($max_percent_3 / 2);
                                                                $half_max_percent_4 = ($max_percent_4 / 2);

                                                                $half_overall_max_percent = ($overall_max_percent / 2);

                                                                $color1 = ($user_percent_1 >= $half_max_percent_1) ? 'green' : 'red';
                                                                $color2 = ($user_percent_2 >= $half_max_percent_2) ? 'green' : 'red';
                                                                $color3 = ($user_percent_3 >= $half_max_percent_3) ? 'green' : 'red';
                                                                $color4 = ($user_percent_4 >= $half_max_percent_4) ? 'green' : 'red';

                                                                $color5 = ($overall_user_percent >= 70) ? 'green' : 'red';

                                                                $verdict_color = ($verdict == 'passed') ? '<span style="color: green;"> Passed </span>' : 
                                                                                                    '<span style="color: red;"> Failed </span>';
                                                                echo'
                                                                    <tbody>
                                                                        <tr>
                                                                            <td data-label="Code">'.$code.'</td>
                                                                            <td data-label="Level">'.$level.'</td>
                                                                            <td data-label="Email">'.$email.'</td>
                                                                            <td data-label="Full Name">'.$full_name.'</td>
                                                                            <td data-label="Date Completed">'.$date.'</td>
                                                                        </tr>
                                                                    </tbody>
                                                                ';
                                                            }
                                                            echo'
                                                                </table>
                                                            ';
                                                            
                                                        }
                                                    ?>

                                                        <div class="row mt-4">

                                                            <!-- Exam percentages  -->
                                                            <h5 class="mb-3">Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">RA Terminology %</th>
                                                                        <th scope="col">RA Programming %</th>
                                                                        <th scope="col">RA Troubleshooting %</th>
                                                                        <th scope="col">Implementation %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="RA Terminology">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="RA Programming">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="RA Troubleshooting">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Design and Implementation">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $overall_max_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- users percentages  -->
                                                            <h5 class="mb-3">Your Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">RA Terminology %</th>
                                                                        <th scope="col">RA Programming %</th>
                                                                        <th scope="col">RA Troubleshooting %</th>
                                                                        <th scope="col">Implementation %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="RA Terminology">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color1 ?>">
                                                                                <?php echo $user_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="RA Programming">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color2 ?>">
                                                                                <?php echo $user_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="RA Troubleshooting">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color3 ?>">
                                                                                <?php echo $user_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Design and Implementation">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color4 ?>">
                                                                                <?php echo $user_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color5 ?>">
                                                                                <?php echo $overall_user_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- overall  -->
                                                            <h5 class="mb-3">Overall Result %</h5>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Your total</p>
                                                                <h6 style="font-weight: 600; color: <?php echo $color5 ?> ;">
                                                                    <?php echo $overall_user_percent ?> %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Passing</p>
                                                                <h6 style="font-weight: 600;">
                                                                    70 %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Verdict</p>
                                                                <h6 style="font-weight: 600;">
                                                                    <?php echo $verdict_color ?> 
                                                                </h6>
                                                            </div>

                                                            <!-- download link here  -->
                                                            <?php
                                                                if($verdict == 'passed')
                                                                {
                                                                    ?>
                                                                        <div class="col-md-12 mt-5 text-center">
                                                                            <a href="download_certification.php?type=<?php echo $type ?>&full_name=<?php echo $full_name ?>&date=<?php echo $date ?>&cert_id=<?php echo $cert_id ?>" class="btn btn-primary">
                                                                                Download your Certificate
                                                                            </a>
                                                                        </div>
                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    
                                                                }
                                                            ?>

                                                            <!-- line  -->
                                                            <div style="border-bottom: 2px solid #00008b; margin: 4% 0;"></div>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        {
                            ?>
                                <script>
                                    location.href = "404.php";
                                </script>
                            <?php
                        }
                        
                    }
                    else
                    if($type == 'rna2')
                    {
                        // check if there are result in database 
                        $stmt = $conn->prepare("select * from result where email = ?");
                        $stmt->bind_param('s', $email);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        if($res->num_rows > 0) //if user already have result
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Examination Result <br>
                                                        Robotics and Automation Intermediate Level
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 24 150 28 " preserveAspectRatio="none">
                                        <defs>
                                            <path id="wave-path"
                                                d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
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
                                <!-- End Hero -->

                                <section>
                                    <div class="container">
                                        <div class="section-title" data-aos="fade-up">
                                            <h2 class="text-secondary">Robotics and Automation </h2>
                                            <p>Intermediate Level Result</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data result -->
                                                    
                                                    <?php 
                                                        $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            echo'
                                                                <h3>Exam Details</h3>
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col"> Exam Code Level </th>
                                                                            <th scope="col"> Level </th>
                                                                            <th scope="col"> Email </th>
                                                                            <th scope="col"> Full Name </th>
                                                                            <th scope="col"> Date Completed </th>
                                                                        </tr>
                                                                    </thead>
                                                            ';
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                $email = $row['email'];
                                                                $full_name = $row['full_name'];
                                                                $date = $row['date'];
                                                                $cert_id = $row['cert_id'];

                                                                $user_percent_1 = $row['user_percent_1'];
                                                                $user_percent_2 = $row['user_percent_2'];
                                                                $user_percent_3 = $row['user_percent_3'];
                                                                $user_percent_4 = $row['user_percent_4'];
                                                                $overall_user_percent = $row['overall_user_percent'];

                                                                $max_percent_1 = $row['max_percent_1'];
                                                                $max_percent_2 = $row['max_percent_2'];
                                                                $max_percent_3 = $row['max_percent_3'];
                                                                $max_percent_4 = $row['max_percent_4'];
                                                                $overall_max_percent = $row['overall_max_percent'];

                                                                $verdict = $row['verdict'];

                                                                $code = '';
                                                                $level = '';

                                                                $color1 = '';
                                                                $color2 = '';
                                                                $color3 = '';
                                                                $color4 = '';
                                                                $color5 = '';

                                                                switch ($type) {
                                                                    case 'rna1':
                                                                        $code = 'RA-101';
                                                                        $level = 'Entry Level';
                                                                        break;
                                                                    case 'rna2':
                                                                        $code = 'RA-102';
                                                                        $level = '2nd Level';
                                                                        break;
                                                                    case 'rna3':
                                                                        $code = 'RA-103';
                                                                        $level = '3rd Level';
                                                                        break;
                                                                    default:
                                                                        // Default action if $type does not match any of the above cases
                                                                        $code = '';
                                                                        $level = '';
                                                                        break;
                                                                }
                                                                
                                                                // get half of max percentages first
                                                                $half_max_percent_1 = ($max_percent_1 / 2);
                                                                $half_max_percent_2 = ($max_percent_2 / 2);
                                                                $half_max_percent_3 = ($max_percent_3 / 2);
                                                                $half_max_percent_4 = ($max_percent_4 / 2);

                                                                $half_overall_max_percent = ($overall_max_percent / 2);

                                                                $color1 = ($user_percent_1 >= $half_max_percent_1) ? 'green' : 'red';
                                                                $color2 = ($user_percent_2 >= $half_max_percent_2) ? 'green' : 'red';
                                                                $color3 = ($user_percent_3 >= $half_max_percent_3) ? 'green' : 'red';
                                                                $color4 = ($user_percent_4 >= $half_max_percent_4) ? 'green' : 'red';

                                                                $color5 = ($overall_user_percent >= 70) ? 'green' : 'red';

                                                                $verdict_color = ($verdict == 'passed') ? '<span style="color: green;"> Passed </span>' : 
                                                                                                    '<span style="color: red;"> Failed </span>';
                                                                echo'
                                                                    <tbody>
                                                                        <tr>
                                                                            <td data-label="Code">'.$code.'</td>
                                                                            <td data-label="Level">'.$level.'</td>
                                                                            <td data-label="Email">'.$email.'</td>
                                                                            <td data-label="Full Name">'.$full_name.'</td>
                                                                            <td data-label="Date Completed">'.$date.'</td>
                                                                        </tr>
                                                                    </tbody>
                                                                ';
                                                            }
                                                            echo'
                                                                </table>
                                                            ';
                                                            
                                                        }
                                                    ?>

                                                        <div class="row mt-4">

                                                            <!-- Exam percentages  -->
                                                            <h5 class="mb-3">Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">RA Terminology %</th>
                                                                        <th scope="col">RA Programming %</th>
                                                                        <th scope="col">RA Troubleshooting %</th>
                                                                        <th scope="col">Implementation %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="RA Terminology">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="RA Programming">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="RA Troubleshooting">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Design and Implementation">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $overall_max_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- users percentages  -->
                                                            <h5 class="mb-3">Your Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">RA Terminology %</th>
                                                                        <th scope="col">RA Programming %</th>
                                                                        <th scope="col">RA Troubleshooting %</th>
                                                                        <th scope="col">Implementation %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="RA Terminology">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color1 ?>">
                                                                                <?php echo $user_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="RA Programming">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color2 ?>">
                                                                                <?php echo $user_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="RA Troubleshooting">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color3 ?>">
                                                                                <?php echo $user_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Design and Implementation">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color4 ?>">
                                                                                <?php echo $user_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color5 ?>">
                                                                                <?php echo $overall_user_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- overall  -->
                                                            <h5 class="mb-3">Overall Result %</h5>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Your total</p>
                                                                <h6 style="font-weight: 600; color: <?php echo $color5 ?> ;">
                                                                    <?php echo $overall_user_percent ?> %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Passing</p>
                                                                <h6 style="font-weight: 600;">
                                                                    70 %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Verdict</p>
                                                                <h6 style="font-weight: 600;">
                                                                    <?php echo $verdict_color ?> 
                                                                </h6>
                                                            </div>

                                                            <!-- download link here  -->
                                                            <?php
                                                                if($verdict == 'passed')
                                                                {
                                                                    ?>
                                                                        <div class="col-md-12 mt-5 text-center">
                                                                            <a href="download_certification.php?type=<?php echo $type ?>&full_name=<?php echo $full_name ?>&date=<?php echo $date ?>&cert_id=<?php echo $cert_id ?>" class="btn btn-primary">
                                                                                Download your Certificate
                                                                            </a>
                                                                        </div>
                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    
                                                                }
                                                            ?>

                                                            <!-- line  -->
                                                            <div style="border-bottom: 2px solid #00008b; margin: 4% 0;"></div>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        {
                            ?>
                                <script>
                                    location.href = "404.php";
                                </script>
                            <?php
                        }
                        
                    }
                    else
                    if($type == 'rna3')
                    {
                        // check if there are result in database 
                        $stmt = $conn->prepare("select * from result where email = ?");
                        $stmt->bind_param('s', $email);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        if($res->num_rows > 0) //if user already have result
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Examination Result <br>
                                                        Robotics and Automation Advance Level
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 24 150 28 " preserveAspectRatio="none">
                                        <defs>
                                            <path id="wave-path"
                                                d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
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
                                <!-- End Hero -->

                                <section>
                                    <div class="container">
                                        <div class="section-title" data-aos="fade-up">
                                            <h2 class="text-secondary">Robotics and Automation </h2>
                                            <p>Advance Level Result</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data result -->
                                                    
                                                    <?php 
                                                        $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            echo'
                                                                <h3>Exam Details</h3>
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col"> Exam Code Level </th>
                                                                            <th scope="col"> Level </th>
                                                                            <th scope="col"> Email </th>
                                                                            <th scope="col"> Full Name </th>
                                                                            <th scope="col"> Date Completed </th>
                                                                        </tr>
                                                                    </thead>
                                                            ';
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                $email = $row['email'];
                                                                $full_name = $row['full_name'];
                                                                $date = $row['date'];
                                                                $cert_id = $row['cert_id'];

                                                                $user_percent_1 = $row['user_percent_1'];
                                                                $user_percent_2 = $row['user_percent_2'];
                                                                $user_percent_3 = $row['user_percent_3'];
                                                                $user_percent_4 = $row['user_percent_4'];
                                                                $overall_user_percent = $row['overall_user_percent'];

                                                                $max_percent_1 = $row['max_percent_1'];
                                                                $max_percent_2 = $row['max_percent_2'];
                                                                $max_percent_3 = $row['max_percent_3'];
                                                                $max_percent_4 = $row['max_percent_4'];
                                                                $overall_max_percent = $row['overall_max_percent'];

                                                                $verdict = $row['verdict'];

                                                                $code = '';
                                                                $level = '';

                                                                $color1 = '';
                                                                $color2 = '';
                                                                $color3 = '';
                                                                $color4 = '';
                                                                $color5 = '';

                                                                switch ($type) {
                                                                    case 'rna1':
                                                                        $code = 'RA-101';
                                                                        $level = 'Entry Level';
                                                                        break;
                                                                    case 'rna2':
                                                                        $code = 'RA-102';
                                                                        $level = '2nd Level';
                                                                        break;
                                                                    case 'rna3':
                                                                        $code = 'RA-103';
                                                                        $level = '3rd Level';
                                                                        break;
                                                                    default:
                                                                        // Default action if $type does not match any of the above cases
                                                                        $code = '';
                                                                        $level = '';
                                                                        break;
                                                                }
                                                                
                                                                // get half of max percentages first
                                                                $half_max_percent_1 = ($max_percent_1 / 2);
                                                                $half_max_percent_2 = ($max_percent_2 / 2);
                                                                $half_max_percent_3 = ($max_percent_3 / 2);
                                                                $half_max_percent_4 = ($max_percent_4 / 2);

                                                                $half_overall_max_percent = ($overall_max_percent / 2);

                                                                $color1 = ($user_percent_1 >= $half_max_percent_1) ? 'green' : 'red';
                                                                $color2 = ($user_percent_2 >= $half_max_percent_2) ? 'green' : 'red';
                                                                $color3 = ($user_percent_3 >= $half_max_percent_3) ? 'green' : 'red';
                                                                $color4 = ($user_percent_4 >= $half_max_percent_4) ? 'green' : 'red';

                                                                $color5 = ($overall_user_percent >= 70) ? 'green' : 'red';

                                                                $verdict_color = ($verdict == 'passed') ? '<span style="color: green;"> Passed </span>' : 
                                                                                                    '<span style="color: red;"> Failed </span>';
                                                                echo'
                                                                    <tbody>
                                                                        <tr>
                                                                            <td data-label="Code">'.$code.'</td>
                                                                            <td data-label="Level">'.$level.'</td>
                                                                            <td data-label="Email">'.$email.'</td>
                                                                            <td data-label="Full Name">'.$full_name.'</td>
                                                                            <td data-label="Date Completed">'.$date.'</td>
                                                                        </tr>
                                                                    </tbody>
                                                                ';
                                                            }
                                                            echo'
                                                                </table>
                                                            ';
                                                            
                                                        }
                                                    ?>

                                                        <div class="row mt-4">

                                                            <!-- Exam percentages  -->
                                                            <h5 class="mb-3">Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">RA Terminology %</th>
                                                                        <th scope="col">RA Programming %</th>
                                                                        <th scope="col">RA Troubleshooting %</th>
                                                                        <th scope="col">Implementation %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="RA Terminology">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="RA Programming">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="RA Troubleshooting">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Design and Implementation">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $overall_max_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- users percentages  -->
                                                            <h5 class="mb-3">Your Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">RA Terminology %</th>
                                                                        <th scope="col">RA Programming %</th>
                                                                        <th scope="col">RA Troubleshooting %</th>
                                                                        <th scope="col">Implementation %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="RA Terminology">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color1 ?>">
                                                                                <?php echo $user_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="RA Programming">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color2 ?>">
                                                                                <?php echo $user_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="RA Troubleshooting">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color3 ?>">
                                                                                <?php echo $user_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Design and Implementation">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color4 ?>">
                                                                                <?php echo $user_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color5 ?>">
                                                                                <?php echo $overall_user_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- overall  -->
                                                            <h5 class="mb-3">Overall Result %</h5>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Your total</p>
                                                                <h6 style="font-weight: 600; color: <?php echo $color5 ?> ;">
                                                                    <?php echo $overall_user_percent ?> %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Passing</p>
                                                                <h6 style="font-weight: 600;">
                                                                    70 %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Verdict</p>
                                                                <h6 style="font-weight: 600;">
                                                                    <?php echo $verdict_color ?> 
                                                                </h6>
                                                            </div>

                                                            <!-- download link here  -->
                                                            <?php
                                                                if($verdict == 'passed')
                                                                {
                                                                    ?>
                                                                        <div class="col-md-12 mt-5 text-center">
                                                                            <a href="download_certification.php?type=<?php echo $type ?>&full_name=<?php echo $full_name ?>&date=<?php echo $date ?>&cert_id=<?php echo $cert_id ?>" class="btn btn-primary">
                                                                                Download your Certificate
                                                                            </a>
                                                                        </div>
                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    
                                                                }
                                                            ?>

                                                            <!-- line  -->
                                                            <div style="border-bottom: 2px solid #00008b; margin: 4% 0;"></div>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        {
                            ?>
                                <script>
                                    location.href = "404.php";
                                </script>
                            <?php
                        }
                        
                    }
                    // web dev section 
                    else
                    if($type == 'wdv1')
                    {
                        // check if there are result in database 
                        $stmt = $conn->prepare("select * from result where email = ?");
                        $stmt->bind_param('s', $email);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        if($res->num_rows > 0) //if user already have result
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Examination Result <br>
                                                        Web Development Level 1
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 24 150 28 " preserveAspectRatio="none">
                                        <defs>
                                            <path id="wave-path"
                                                d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
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
                                <!-- End Hero -->

                                <section>
                                    <div class="container">
                                        <div class="section-title" data-aos="fade-up">
                                            <h2 class="text-secondary">Web Development </h2>
                                            <p>Level 1 Result</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data result -->
                                                    
                                                    <?php 
                                                        $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            echo'
                                                                <h3>Exam Details</h3>
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col"> Exam Code Level </th>
                                                                            <th scope="col"> Level </th>
                                                                            <th scope="col"> Email </th>
                                                                            <th scope="col"> Full Name </th>
                                                                            <th scope="col"> Date Completed </th>
                                                                        </tr>
                                                                    </thead>
                                                            ';
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                $email = $row['email'];
                                                                $full_name = $row['full_name'];
                                                                $date = $row['date'];
                                                                $cert_id = $row['cert_id'];

                                                                $user_percent_1 = $row['user_percent_1'];
                                                                $user_percent_2 = $row['user_percent_2'];
                                                                $user_percent_3 = $row['user_percent_3'];
                                                                $user_percent_4 = $row['user_percent_4'];
                                                                $overall_user_percent = $row['overall_user_percent'];

                                                                $max_percent_1 = $row['max_percent_1'];
                                                                $max_percent_2 = $row['max_percent_2'];
                                                                $max_percent_3 = $row['max_percent_3'];
                                                                $max_percent_4 = $row['max_percent_4'];
                                                                $overall_max_percent = $row['overall_max_percent'];

                                                                $verdict = $row['verdict'];

                                                                $code = '';
                                                                $level = '';

                                                                switch ($type) {
                                                                    case 'rna1':
                                                                        $code = 'RA-101';
                                                                        $level = 'Entry Level';
                                                                        break;
                                                                    case 'rna2':
                                                                        $code = 'RA-102';
                                                                        $level = '2nd Level';
                                                                        break;
                                                                    case 'rna3':
                                                                        $code = 'RA-103';
                                                                        $level = '3rd Level';
                                                                        break;

                                                                    case 'wdv1':
                                                                        $code = 'WDV-101';
                                                                        $level = '1st Level';
                                                                        break;
                                                                    case 'wdv2':
                                                                        $code = 'WDV-102';
                                                                        $level = '2nd Level';
                                                                        break;
                                                                    case 'wdv3':
                                                                        $code = 'WDV-103';
                                                                        $level = '3rd Level';
                                                                            break;
                                                                    case 'wdv4':
                                                                        $code = 'WDV-104';
                                                                        $level = '4th Level';
                                                                            break;
                                                                    case 'wdv5':
                                                                        $code = 'WDV-105';
                                                                        $level = '5th Level';
                                                                            break;
                                                                    default:
                                                                        // Default action if $type does not match any of the above cases
                                                                        $code = '';
                                                                        $level = '';
                                                                        break;
                                                                }
                                                                
                                                                // get half of max percentages first
                                                                $half_max_percent_1 = ($max_percent_1 / 2);
                                                                $half_max_percent_2 = ($max_percent_2 / 2);
                                                                $half_max_percent_3 = ($max_percent_3 / 2);
                                                                $half_max_percent_4 = ($max_percent_4 / 2);

                                                                $half_overall_max_percent = ($overall_max_percent / 2);

                                                                // initialize color 
                                                                $color1 = '';
                                                                $color2 = '';
                                                                $color3 = '';
                                                                $color4 = '';
                                                                $color5 = '';

                                                                $color1 = ($user_percent_1 >= $half_max_percent_1) ? 'green' : 'red';
                                                                $color2 = ($user_percent_2 >= $half_max_percent_2) ? 'green' : 'red';
                                                                $color3 = ($user_percent_3 >= $half_max_percent_3) ? 'green' : 'red';
                                                                $color4 = ($user_percent_4 >= $half_max_percent_4) ? 'green' : 'red';

                                                                $color5 = ($overall_user_percent >= 70) ? 'green' : 'red';

                                                                $verdict_color = ($verdict == 'passed') ? '<span style="color: green;"> Passed </span>' : 
                                                                                                    '<span style="color: red;"> Failed </span>';
                                                                echo'
                                                                    <tbody>
                                                                        <tr>
                                                                            <td data-label="Code">'.$code.'</td>
                                                                            <td data-label="Level">'.$level.'</td>
                                                                            <td data-label="Email">'.$email.'</td>
                                                                            <td data-label="Full Name">'.$full_name.'</td>
                                                                            <td data-label="Date Completed">'.$date.'</td>
                                                                        </tr>
                                                                    </tbody>
                                                                ';
                                                            }
                                                            echo'
                                                                </table>
                                                            ';
                                                            
                                                        }
                                                    ?>

                                                        <div class="row mt-4">

                                                            <!-- Exam percentages  -->
                                                            <h5 class="mb-3">Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">HTML %</th>
                                                                        <th scope="col">CSS %</th>
                                                                        <th scope="col">JS %</th>
                                                                        <th scope="col">PHP/MySql %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="HTML">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="CSS">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="JS">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="PHP/MySql">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $overall_max_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- users percentages  -->
                                                            <h5 class="mb-3">Your Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">HTML %</th>
                                                                        <th scope="col">CSS %</th>
                                                                        <th scope="col">JS %</th>
                                                                        <th scope="col">PHP/MySql %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="HTML">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color1 ?>">
                                                                                <?php echo $user_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="CSS">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color2 ?>">
                                                                                <?php echo $user_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="JS">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color3 ?>">
                                                                                <?php echo $user_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="PHP/MySql">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color4 ?>">
                                                                                <?php echo $user_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color5 ?>">
                                                                                <?php echo $overall_user_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- overall  -->
                                                            <h5 class="mb-3">Overall Result %</h5>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Your total</p>
                                                                <h6 style="font-weight: 600; color: <?php echo $color5 ?> ;">
                                                                    <?php echo $overall_user_percent ?> %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Passing</p>
                                                                <h6 style="font-weight: 600;">
                                                                    70 %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Verdict</p>
                                                                <h6 style="font-weight: 600;">
                                                                    <?php echo $verdict_color ?> 
                                                                </h6>
                                                            </div>

                                                            <!-- download link here  -->
                                                            <?php
                                                                if($verdict == 'passed')
                                                                {
                                                                    ?>
                                                                        <div class="col-md-12 mt-5 text-center">
                                                                            <a href="download_certification.php?type=<?php echo $type ?>&full_name=<?php echo $full_name ?>&date=<?php echo $date ?>&cert_id=<?php echo $cert_id ?>" class="btn btn-primary">
                                                                                Download your Certificate
                                                                            </a>
                                                                        </div>
                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    
                                                                }
                                                            ?>

                                                            <!-- line  -->
                                                            <div style="border-bottom: 2px solid #00008b; margin: 4% 0;"></div>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        {
                            ?>
                                <script>
                                    location.href = "404.php";
                                </script>
                            <?php
                        }
                        
                    }
                    else
                    if($type == 'wdv2')
                    {
                        // check if there are result in database 
                        $stmt = $conn->prepare("select * from result where email = ?");
                        $stmt->bind_param('s', $email);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        if($res->num_rows > 0) //if user already have result
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Examination Result <br>
                                                        Web Development Level 2
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 24 150 28 " preserveAspectRatio="none">
                                        <defs>
                                            <path id="wave-path"
                                                d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
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
                                <!-- End Hero -->

                                <section>
                                    <div class="container">
                                        <div class="section-title" data-aos="fade-up">
                                            <h2 class="text-secondary">Web Development </h2>
                                            <p>Level 2 Result</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data result -->
                                                    
                                                    <?php 
                                                        $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            echo'
                                                                <h3>Exam Details</h3>
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col"> Exam Code Level </th>
                                                                            <th scope="col"> Level </th>
                                                                            <th scope="col"> Email </th>
                                                                            <th scope="col"> Full Name </th>
                                                                            <th scope="col"> Date Completed </th>
                                                                        </tr>
                                                                    </thead>
                                                            ';
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                $email = $row['email'];
                                                                $full_name = $row['full_name'];
                                                                $date = $row['date'];
                                                                $cert_id = $row['cert_id'];

                                                                $user_percent_1 = $row['user_percent_1'];
                                                                $user_percent_2 = $row['user_percent_2'];
                                                                $user_percent_3 = $row['user_percent_3'];
                                                                $user_percent_4 = $row['user_percent_4'];
                                                                $overall_user_percent = $row['overall_user_percent'];

                                                                $max_percent_1 = $row['max_percent_1'];
                                                                $max_percent_2 = $row['max_percent_2'];
                                                                $max_percent_3 = $row['max_percent_3'];
                                                                $max_percent_4 = $row['max_percent_4'];
                                                                $overall_max_percent = $row['overall_max_percent'];

                                                                $verdict = $row['verdict'];

                                                                $code = '';
                                                                $level = '';

                                                                switch ($type) {
                                                                    case 'rna1':
                                                                        $code = 'RA-101';
                                                                        $level = 'Entry Level';
                                                                        break;
                                                                    case 'rna2':
                                                                        $code = 'RA-102';
                                                                        $level = '2nd Level';
                                                                        break;
                                                                    case 'rna3':
                                                                        $code = 'RA-103';
                                                                        $level = '3rd Level';
                                                                        break;

                                                                    case 'wdv1':
                                                                        $code = 'WDV-101';
                                                                        $level = '1st Level';
                                                                        break;
                                                                    case 'wdv2':
                                                                        $code = 'WDV-102';
                                                                        $level = '2nd Level';
                                                                        break;
                                                                    case 'wdv3':
                                                                        $code = 'WDV-103';
                                                                        $level = '3rd Level';
                                                                            break;
                                                                    case 'wdv4':
                                                                        $code = 'WDV-104';
                                                                        $level = '4th Level';
                                                                            break;
                                                                    case 'wdv5':
                                                                        $code = 'WDV-105';
                                                                        $level = '5th Level';
                                                                            break;
                                                                    default:
                                                                        // Default action if $type does not match any of the above cases
                                                                        $code = '';
                                                                        $level = '';
                                                                        break;
                                                                }
                                                                
                                                                // get half of max percentages first
                                                                $half_max_percent_1 = ($max_percent_1 / 2);
                                                                $half_max_percent_2 = ($max_percent_2 / 2);
                                                                $half_max_percent_3 = ($max_percent_3 / 2);
                                                                $half_max_percent_4 = ($max_percent_4 / 2);

                                                                $half_overall_max_percent = ($overall_max_percent / 2);

                                                                // initialize color 
                                                                $color1 = '';
                                                                $color2 = '';
                                                                $color3 = '';
                                                                $color4 = '';
                                                                $color5 = '';

                                                                $color1 = ($user_percent_1 >= $half_max_percent_1) ? 'green' : 'red';
                                                                $color2 = ($user_percent_2 >= $half_max_percent_2) ? 'green' : 'red';
                                                                $color3 = ($user_percent_3 >= $half_max_percent_3) ? 'green' : 'red';
                                                                $color4 = ($user_percent_4 >= $half_max_percent_4) ? 'green' : 'red';

                                                                $color5 = ($overall_user_percent >= 70) ? 'green' : 'red';

                                                                $verdict_color = ($verdict == 'passed') ? '<span style="color: green;"> Passed </span>' : 
                                                                                                    '<span style="color: red;"> Failed </span>';
                                                                echo'
                                                                    <tbody>
                                                                        <tr>
                                                                            <td data-label="Code">'.$code.'</td>
                                                                            <td data-label="Level">'.$level.'</td>
                                                                            <td data-label="Email">'.$email.'</td>
                                                                            <td data-label="Full Name">'.$full_name.'</td>
                                                                            <td data-label="Date Completed">'.$date.'</td>
                                                                        </tr>
                                                                    </tbody>
                                                                ';
                                                            }
                                                            echo'
                                                                </table>
                                                            ';
                                                            
                                                        }
                                                    ?>

                                                        <div class="row mt-4">

                                                            <!-- Exam percentages  -->
                                                            <h5 class="mb-3">Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">HTML %</th>
                                                                        <th scope="col">CSS %</th>
                                                                        <th scope="col">JS %</th>
                                                                        <th scope="col">PHP/MySql %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="HTML">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="CSS">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="JS">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="PHP/MySql">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $overall_max_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- users percentages  -->
                                                            <h5 class="mb-3">Your Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">HTML %</th>
                                                                        <th scope="col">CSS %</th>
                                                                        <th scope="col">JS %</th>
                                                                        <th scope="col">PHP/MySql %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="HTML">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color1 ?>">
                                                                                <?php echo $user_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="CSS">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color2 ?>">
                                                                                <?php echo $user_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="JS">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color3 ?>">
                                                                                <?php echo $user_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="PHP/MySql">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color4 ?>">
                                                                                <?php echo $user_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color5 ?>">
                                                                                <?php echo $overall_user_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- overall  -->
                                                            <h5 class="mb-3">Overall Result %</h5>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Your total</p>
                                                                <h6 style="font-weight: 600; color: <?php echo $color5 ?> ;">
                                                                    <?php echo $overall_user_percent ?> %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Passing</p>
                                                                <h6 style="font-weight: 600;">
                                                                    70 %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Verdict</p>
                                                                <h6 style="font-weight: 600;">
                                                                    <?php echo $verdict_color ?> 
                                                                </h6>
                                                            </div>

                                                            <!-- download link here  -->
                                                            <?php
                                                                if($verdict == 'passed')
                                                                {
                                                                    ?>
                                                                        <div class="col-md-12 mt-5 text-center">
                                                                            <a href="download_certification.php?type=<?php echo $type ?>&full_name=<?php echo $full_name ?>&date=<?php echo $date ?>&cert_id=<?php echo $cert_id ?>" class="btn btn-primary">
                                                                                Download your Certificate
                                                                            </a>
                                                                        </div>
                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    
                                                                }
                                                            ?>

                                                            <!-- line  -->
                                                            <div style="border-bottom: 2px solid #00008b; margin: 4% 0;"></div>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        {
                            ?>
                                <script>
                                    location.href = "404.php";
                                </script>
                            <?php
                        }
                        
                    }
                    else
                    if($type == 'wdv3')
                    {
                        // check if there are result in database 
                        $stmt = $conn->prepare("select * from result where email = ?");
                        $stmt->bind_param('s', $email);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        if($res->num_rows > 0) //if user already have result
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Examination Result <br>
                                                        Web Development Level 3
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 24 150 28 " preserveAspectRatio="none">
                                        <defs>
                                            <path id="wave-path"
                                                d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
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
                                <!-- End Hero -->

                                <section>
                                    <div class="container">
                                        <div class="section-title" data-aos="fade-up">
                                            <h2 class="text-secondary">Web Development </h2>
                                            <p>Level 3 Result</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data result -->
                                                    
                                                    <?php 
                                                        $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            echo'
                                                                <h3>Exam Details</h3>
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col"> Exam Code Level </th>
                                                                            <th scope="col"> Level </th>
                                                                            <th scope="col"> Email </th>
                                                                            <th scope="col"> Full Name </th>
                                                                            <th scope="col"> Date Completed </th>
                                                                        </tr>
                                                                    </thead>
                                                            ';
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                $email = $row['email'];
                                                                $full_name = $row['full_name'];
                                                                $date = $row['date'];
                                                                $cert_id = $row['cert_id'];

                                                                $user_percent_1 = $row['user_percent_1'];
                                                                $user_percent_2 = $row['user_percent_2'];
                                                                $user_percent_3 = $row['user_percent_3'];
                                                                $user_percent_4 = $row['user_percent_4'];
                                                                $overall_user_percent = $row['overall_user_percent'];

                                                                $max_percent_1 = $row['max_percent_1'];
                                                                $max_percent_2 = $row['max_percent_2'];
                                                                $max_percent_3 = $row['max_percent_3'];
                                                                $max_percent_4 = $row['max_percent_4'];
                                                                $overall_max_percent = $row['overall_max_percent'];

                                                                $verdict = $row['verdict'];

                                                                $code = '';
                                                                $level = '';

                                                                switch ($type) {
                                                                    case 'rna1':
                                                                        $code = 'RA-101';
                                                                        $level = 'Entry Level';
                                                                        break;
                                                                    case 'rna2':
                                                                        $code = 'RA-102';
                                                                        $level = '2nd Level';
                                                                        break;
                                                                    case 'rna3':
                                                                        $code = 'RA-103';
                                                                        $level = '3rd Level';
                                                                        break;

                                                                    case 'wdv1':
                                                                        $code = 'WDV-101';
                                                                        $level = '1st Level';
                                                                        break;
                                                                    case 'wdv2':
                                                                        $code = 'WDV-102';
                                                                        $level = '2nd Level';
                                                                        break;
                                                                    case 'wdv3':
                                                                        $code = 'WDV-103';
                                                                        $level = '3rd Level';
                                                                            break;
                                                                    case 'wdv4':
                                                                        $code = 'WDV-104';
                                                                        $level = '4th Level';
                                                                            break;
                                                                    case 'wdv5':
                                                                        $code = 'WDV-105';
                                                                        $level = '5th Level';
                                                                            break;
                                                                    default:
                                                                        // Default action if $type does not match any of the above cases
                                                                        $code = '';
                                                                        $level = '';
                                                                        break;
                                                                }
                                                                
                                                                // get half of max percentages first
                                                                $half_max_percent_1 = ($max_percent_1 / 2);
                                                                $half_max_percent_2 = ($max_percent_2 / 2);
                                                                $half_max_percent_3 = ($max_percent_3 / 2);
                                                                $half_max_percent_4 = ($max_percent_4 / 2);

                                                                $half_overall_max_percent = ($overall_max_percent / 2);

                                                                // initialize color 
                                                                $color1 = '';
                                                                $color2 = '';
                                                                $color3 = '';
                                                                $color4 = '';
                                                                $color5 = '';

                                                                $color1 = ($user_percent_1 >= $half_max_percent_1) ? 'green' : 'red';
                                                                $color2 = ($user_percent_2 >= $half_max_percent_2) ? 'green' : 'red';
                                                                $color3 = ($user_percent_3 >= $half_max_percent_3) ? 'green' : 'red';
                                                                $color4 = ($user_percent_4 >= $half_max_percent_4) ? 'green' : 'red';

                                                                $color5 = ($overall_user_percent >= 70) ? 'green' : 'red';

                                                                $verdict_color = ($verdict == 'passed') ? '<span style="color: green;"> Passed </span>' : 
                                                                                                    '<span style="color: red;"> Failed </span>';
                                                                echo'
                                                                    <tbody>
                                                                        <tr>
                                                                            <td data-label="Code">'.$code.'</td>
                                                                            <td data-label="Level">'.$level.'</td>
                                                                            <td data-label="Email">'.$email.'</td>
                                                                            <td data-label="Full Name">'.$full_name.'</td>
                                                                            <td data-label="Date Completed">'.$date.'</td>
                                                                        </tr>
                                                                    </tbody>
                                                                ';
                                                            }
                                                            echo'
                                                                </table>
                                                            ';
                                                            
                                                        }
                                                    ?>

                                                        <div class="row mt-4">

                                                            <!-- Exam percentages  -->
                                                            <h5 class="mb-3">Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">HTML %</th>
                                                                        <th scope="col">CSS %</th>
                                                                        <th scope="col">JS %</th>
                                                                        <th scope="col">PHP/MySql %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="HTML">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="CSS">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="JS">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="PHP/MySql">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $overall_max_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- users percentages  -->
                                                            <h5 class="mb-3">Your Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">HTML %</th>
                                                                        <th scope="col">CSS %</th>
                                                                        <th scope="col">JS %</th>
                                                                        <th scope="col">PHP/MySql %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="HTML">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color1 ?>">
                                                                                <?php echo $user_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="CSS">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color2 ?>">
                                                                                <?php echo $user_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="JS">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color3 ?>">
                                                                                <?php echo $user_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="PHP/MySql">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color4 ?>">
                                                                                <?php echo $user_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color5 ?>">
                                                                                <?php echo $overall_user_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- overall  -->
                                                            <h5 class="mb-3">Overall Result %</h5>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Your total</p>
                                                                <h6 style="font-weight: 600; color: <?php echo $color5 ?> ;">
                                                                    <?php echo $overall_user_percent ?> %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Passing</p>
                                                                <h6 style="font-weight: 600;">
                                                                    70 %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Verdict</p>
                                                                <h6 style="font-weight: 600;">
                                                                    <?php echo $verdict_color ?> 
                                                                </h6>
                                                            </div>

                                                            <!-- download link here  -->
                                                            <?php
                                                                if($verdict == 'passed')
                                                                {
                                                                    ?>
                                                                        <div class="col-md-12 mt-5 text-center">
                                                                            <a href="download_certification.php?type=<?php echo $type ?>&full_name=<?php echo $full_name ?>&date=<?php echo $date ?>&cert_id=<?php echo $cert_id ?>" class="btn btn-primary">
                                                                                Download your Certificate
                                                                            </a>
                                                                        </div>
                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    
                                                                }
                                                            ?>

                                                            <!-- line  -->
                                                            <div style="border-bottom: 2px solid #00008b; margin: 4% 0;"></div>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        {
                            ?>
                                <script>
                                    location.href = "404.php";
                                </script>
                            <?php
                        }
                        
                    }
                    else
                    if($type == 'wdv4')
                    {
                        // check if there are result in database 
                        $stmt = $conn->prepare("select * from result where email = ?");
                        $stmt->bind_param('s', $email);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        if($res->num_rows > 0) //if user already have result
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Examination Result <br>
                                                        Web Development Level 4
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 24 150 28 " preserveAspectRatio="none">
                                        <defs>
                                            <path id="wave-path"
                                                d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
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
                                <!-- End Hero -->

                                <section>
                                    <div class="container">
                                        <div class="section-title" data-aos="fade-up">
                                            <h2 class="text-secondary">Web Development </h2>
                                            <p>Level 4 Result</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data result -->
                                                    
                                                    <?php 
                                                        $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            echo'
                                                                <h3>Exam Details</h3>
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col"> Exam Code Level </th>
                                                                            <th scope="col"> Level </th>
                                                                            <th scope="col"> Email </th>
                                                                            <th scope="col"> Full Name </th>
                                                                            <th scope="col"> Date Completed </th>
                                                                        </tr>
                                                                    </thead>
                                                            ';
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                $email = $row['email'];
                                                                $full_name = $row['full_name'];
                                                                $date = $row['date'];
                                                                $cert_id = $row['cert_id'];

                                                                $user_percent_1 = $row['user_percent_1'];
                                                                $user_percent_2 = $row['user_percent_2'];
                                                                $user_percent_3 = $row['user_percent_3'];
                                                                $user_percent_4 = $row['user_percent_4'];
                                                                $overall_user_percent = $row['overall_user_percent'];

                                                                $max_percent_1 = $row['max_percent_1'];
                                                                $max_percent_2 = $row['max_percent_2'];
                                                                $max_percent_3 = $row['max_percent_3'];
                                                                $max_percent_4 = $row['max_percent_4'];
                                                                $overall_max_percent = $row['overall_max_percent'];

                                                                $verdict = $row['verdict'];

                                                                $code = '';
                                                                $level = '';

                                                                switch ($type) {
                                                                    case 'rna1':
                                                                        $code = 'RA-101';
                                                                        $level = 'Entry Level';
                                                                        break;
                                                                    case 'rna2':
                                                                        $code = 'RA-102';
                                                                        $level = '2nd Level';
                                                                        break;
                                                                    case 'rna3':
                                                                        $code = 'RA-103';
                                                                        $level = '3rd Level';
                                                                        break;

                                                                    case 'wdv1':
                                                                        $code = 'WDV-101';
                                                                        $level = '1st Level';
                                                                        break;
                                                                    case 'wdv2':
                                                                        $code = 'WDV-102';
                                                                        $level = '2nd Level';
                                                                        break;
                                                                    case 'wdv3':
                                                                        $code = 'WDV-103';
                                                                        $level = '3rd Level';
                                                                            break;
                                                                    case 'wdv4':
                                                                        $code = 'WDV-104';
                                                                        $level = '4th Level';
                                                                            break;
                                                                    case 'wdv5':
                                                                        $code = 'WDV-105';
                                                                        $level = '5th Level';
                                                                            break;
                                                                    default:
                                                                        // Default action if $type does not match any of the above cases
                                                                        $code = '';
                                                                        $level = '';
                                                                        break;
                                                                }
                                                                
                                                                // get half of max percentages first
                                                                $half_max_percent_1 = ($max_percent_1 / 2);
                                                                $half_max_percent_2 = ($max_percent_2 / 2);
                                                                $half_max_percent_3 = ($max_percent_3 / 2);
                                                                $half_max_percent_4 = ($max_percent_4 / 2);

                                                                $half_overall_max_percent = ($overall_max_percent / 2);

                                                                // initialize color 
                                                                $color1 = '';
                                                                $color2 = '';
                                                                $color3 = '';
                                                                $color4 = '';
                                                                $color5 = '';

                                                                $color1 = ($user_percent_1 >= $half_max_percent_1) ? 'green' : 'red';
                                                                $color2 = ($user_percent_2 >= $half_max_percent_2) ? 'green' : 'red';
                                                                $color3 = ($user_percent_3 >= $half_max_percent_3) ? 'green' : 'red';
                                                                $color4 = ($user_percent_4 >= $half_max_percent_4) ? 'green' : 'red';

                                                                $color5 = ($overall_user_percent >= 70) ? 'green' : 'red';

                                                                $verdict_color = ($verdict == 'passed') ? '<span style="color: green;"> Passed </span>' : 
                                                                                                    '<span style="color: red;"> Failed </span>';
                                                                echo'
                                                                    <tbody>
                                                                        <tr>
                                                                            <td data-label="Code">'.$code.'</td>
                                                                            <td data-label="Level">'.$level.'</td>
                                                                            <td data-label="Email">'.$email.'</td>
                                                                            <td data-label="Full Name">'.$full_name.'</td>
                                                                            <td data-label="Date Completed">'.$date.'</td>
                                                                        </tr>
                                                                    </tbody>
                                                                ';
                                                            }
                                                            echo'
                                                                </table>
                                                            ';
                                                            
                                                        }
                                                    ?>

                                                        <div class="row mt-4">

                                                            <!-- Exam percentages  -->
                                                            <h5 class="mb-3">Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">HTML %</th>
                                                                        <th scope="col">CSS %</th>
                                                                        <th scope="col">JS %</th>
                                                                        <th scope="col">PHP/MySql %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="HTML">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="CSS">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="JS">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="PHP/MySql">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $overall_max_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- users percentages  -->
                                                            <h5 class="mb-3">Your Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">HTML %</th>
                                                                        <th scope="col">CSS %</th>
                                                                        <th scope="col">JS %</th>
                                                                        <th scope="col">PHP/MySql %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="HTML">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color1 ?>">
                                                                                <?php echo $user_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="CSS">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color2 ?>">
                                                                                <?php echo $user_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="JS">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color3 ?>">
                                                                                <?php echo $user_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="PHP/MySql">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color4 ?>">
                                                                                <?php echo $user_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color5 ?>">
                                                                                <?php echo $overall_user_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- overall  -->
                                                            <h5 class="mb-3">Overall Result %</h5>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Your total</p>
                                                                <h6 style="font-weight: 600; color: <?php echo $color5 ?> ;">
                                                                    <?php echo $overall_user_percent ?> %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Passing</p>
                                                                <h6 style="font-weight: 600;">
                                                                    70 %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Verdict</p>
                                                                <h6 style="font-weight: 600;">
                                                                    <?php echo $verdict_color ?> 
                                                                </h6>
                                                            </div>

                                                            <!-- download link here  -->
                                                            <?php
                                                                if($verdict == 'passed')
                                                                {
                                                                    ?>
                                                                        <div class="col-md-12 mt-5 text-center">
                                                                            <a href="download_certification.php?type=<?php echo $type ?>&full_name=<?php echo $full_name ?>&date=<?php echo $date ?>&cert_id=<?php echo $cert_id ?>" class="btn btn-primary">
                                                                                Download your Certificate
                                                                            </a>
                                                                        </div>
                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    
                                                                }
                                                            ?>

                                                            <!-- line  -->
                                                            <div style="border-bottom: 2px solid #00008b; margin: 4% 0;"></div>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        {
                            ?>
                                <script>
                                    location.href = "404.php";
                                </script>
                            <?php
                        }
                        
                    }
                    else
                    if($type == 'wdv5')
                    {
                        // check if there are result in database 
                        $stmt = $conn->prepare("select * from result where email = ?");
                        $stmt->bind_param('s', $email);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        if($res->num_rows > 0) //if user already have result
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Examination Result <br>
                                                        Web Development Level 5
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 24 150 28 " preserveAspectRatio="none">
                                        <defs>
                                            <path id="wave-path"
                                                d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
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
                                <!-- End Hero -->

                                <section>
                                    <div class="container">
                                        <div class="section-title" data-aos="fade-up">
                                            <h2 class="text-secondary">Web Development </h2>
                                            <p>Level 5 Result</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data result -->
                                                    
                                                    <?php 
                                                        $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            echo'
                                                                <h3>Exam Details</h3>
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col"> Exam Code Level </th>
                                                                            <th scope="col"> Level </th>
                                                                            <th scope="col"> Email </th>
                                                                            <th scope="col"> Full Name </th>
                                                                            <th scope="col"> Date Completed </th>
                                                                        </tr>
                                                                    </thead>
                                                            ';
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                $email = $row['email'];
                                                                $full_name = $row['full_name'];
                                                                $date = $row['date'];
                                                                $cert_id = $row['cert_id'];

                                                                $user_percent_1 = $row['user_percent_1'];
                                                                $user_percent_2 = $row['user_percent_2'];
                                                                $user_percent_3 = $row['user_percent_3'];
                                                                $user_percent_4 = $row['user_percent_4'];
                                                                $overall_user_percent = $row['overall_user_percent'];

                                                                $max_percent_1 = $row['max_percent_1'];
                                                                $max_percent_2 = $row['max_percent_2'];
                                                                $max_percent_3 = $row['max_percent_3'];
                                                                $max_percent_4 = $row['max_percent_4'];
                                                                $overall_max_percent = $row['overall_max_percent'];

                                                                $verdict = $row['verdict'];

                                                                $code = '';
                                                                $level = '';

                                                                switch ($type) {
                                                                    case 'rna1':
                                                                        $code = 'RA-101';
                                                                        $level = 'Entry Level';
                                                                        break;
                                                                    case 'rna2':
                                                                        $code = 'RA-102';
                                                                        $level = '2nd Level';
                                                                        break;
                                                                    case 'rna3':
                                                                        $code = 'RA-103';
                                                                        $level = '3rd Level';
                                                                        break;

                                                                    case 'wdv1':
                                                                        $code = 'WDV-101';
                                                                        $level = '1st Level';
                                                                        break;
                                                                    case 'wdv2':
                                                                        $code = 'WDV-102';
                                                                        $level = '2nd Level';
                                                                        break;
                                                                    case 'wdv3':
                                                                        $code = 'WDV-103';
                                                                        $level = '3rd Level';
                                                                            break;
                                                                    case 'wdv4':
                                                                        $code = 'WDV-104';
                                                                        $level = '4th Level';
                                                                            break;
                                                                    case 'wdv5':
                                                                        $code = 'WDV-105';
                                                                        $level = '5th Level';
                                                                            break;
                                                                    default:
                                                                        // Default action if $type does not match any of the above cases
                                                                        $code = '';
                                                                        $level = '';
                                                                        break;
                                                                }
                                                                
                                                                // get half of max percentages first
                                                                $half_max_percent_1 = ($max_percent_1 / 2);
                                                                $half_max_percent_2 = ($max_percent_2 / 2);
                                                                $half_max_percent_3 = ($max_percent_3 / 2);
                                                                $half_max_percent_4 = ($max_percent_4 / 2);

                                                                $half_overall_max_percent = ($overall_max_percent / 2);

                                                                // initialize color 
                                                                $color1 = '';
                                                                $color2 = '';
                                                                $color3 = '';
                                                                $color4 = '';
                                                                $color5 = '';

                                                                $color1 = ($user_percent_1 >= $half_max_percent_1) ? 'green' : 'red';
                                                                $color2 = ($user_percent_2 >= $half_max_percent_2) ? 'green' : 'red';
                                                                $color3 = ($user_percent_3 >= $half_max_percent_3) ? 'green' : 'red';
                                                                $color4 = ($user_percent_4 >= $half_max_percent_4) ? 'green' : 'red';

                                                                $color5 = ($overall_user_percent >= 70) ? 'green' : 'red';

                                                                $verdict_color = ($verdict == 'passed') ? '<span style="color: green;"> Passed </span>' : 
                                                                                                    '<span style="color: red;"> Failed </span>';
                                                                echo'
                                                                    <tbody>
                                                                        <tr>
                                                                            <td data-label="Code">'.$code.'</td>
                                                                            <td data-label="Level">'.$level.'</td>
                                                                            <td data-label="Email">'.$email.'</td>
                                                                            <td data-label="Full Name">'.$full_name.'</td>
                                                                            <td data-label="Date Completed">'.$date.'</td>
                                                                        </tr>
                                                                    </tbody>
                                                                ';
                                                            }
                                                            echo'
                                                                </table>
                                                            ';
                                                            
                                                        }
                                                    ?>

                                                        <div class="row mt-4">

                                                            <!-- Exam percentages  -->
                                                            <h5 class="mb-3">Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">HTML %</th>
                                                                        <th scope="col">CSS %</th>
                                                                        <th scope="col">JS %</th>
                                                                        <th scope="col">PHP/MySql %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="HTML">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="CSS">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="JS">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="PHP/MySql">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $max_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600;">
                                                                                <?php echo $overall_max_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- users percentages  -->
                                                            <h5 class="mb-3">Your Exam Percentage %</h5>
                                                            <table class="mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">HTML %</th>
                                                                        <th scope="col">CSS %</th>
                                                                        <th scope="col">JS %</th>
                                                                        <th scope="col">PHP/MySql %</th>
                                                                        <th scope="col">Total %</th>
                                                                    <tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-label="HTML">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color1 ?>">
                                                                                <?php echo $user_percent_1 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="CSS">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color2 ?>">
                                                                                <?php echo $user_percent_2 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="JS">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color3 ?>">
                                                                                <?php echo $user_percent_3 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="PHP/MySql">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color4 ?>">
                                                                                <?php echo $user_percent_4 ?> %
                                                                            </h6>
                                                                        </td>
                                                                        <td data-label="Total %">
                                                                            <h6 style="font-weight: 600; color: <?php echo $color5 ?>">
                                                                                <?php echo $overall_user_percent ?> %
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                
                                                            </table>

                                                            <!-- overall  -->
                                                            <h5 class="mb-3">Overall Result %</h5>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Your total</p>
                                                                <h6 style="font-weight: 600; color: <?php echo $color5 ?> ;">
                                                                    <?php echo $overall_user_percent ?> %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Passing</p>
                                                                <h6 style="font-weight: 600;">
                                                                    70 %
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 justify-align-center text-center text-dark py-3" style="background-color: whitesmoke;">
                                                                <p>Verdict</p>
                                                                <h6 style="font-weight: 600;">
                                                                    <?php echo $verdict_color ?> 
                                                                </h6>
                                                            </div>

                                                            <!-- download link here  -->
                                                            <?php
                                                                if($verdict == 'passed')
                                                                {
                                                                    ?>
                                                                        <div class="col-md-12 mt-5 text-center">
                                                                            <a href="download_certification.php?type=<?php echo $type ?>&full_name=<?php echo $full_name ?>&date=<?php echo $date ?>&cert_id=<?php echo $cert_id ?>" class="btn btn-primary">
                                                                                Download your Certificate
                                                                            </a>
                                                                        </div>
                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    
                                                                }
                                                            ?>

                                                            <!-- line  -->
                                                            <div style="border-bottom: 2px solid #00008b; margin: 4% 0;"></div>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        {
                            ?>
                                <script>
                                    location.href = "404.php";
                                </script>
                            <?php
                        }
                        
                    }
                    else //if not approved
                    {
                        ?>
                            <script>
                                location.href = "404.php";
                            </script>
                        <?php 
                    }

                }
            
            ?>
            
        </main>
        <!-- end  -->


    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <?php
    include "include/foot_links.php";

    // footer  
    include 'include/footer.php';
    ?>

</body>

</html>