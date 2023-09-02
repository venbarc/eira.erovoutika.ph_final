<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Robotics and Automation | EIRA</title>

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
        <main id="main" id="view_enroll" class="view_enroll">

            <?php
                if(isset($_GET['type']) && isset($_GET['approval']))
                {
                    $type = $_GET['type'];
                    $approval = $_GET['approval'];

                    // check if it's the actual approval in url and db
                    $stmt = $conn->prepare("select * from payments where email = ? and approval = ?");
                    $stmt->bind_param("ss", $email, $approval);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    $row = mysqli_fetch_assoc($res);
                    // fetch approval in db 
                    $approval_db = $row['approval'];
                    
                    if($approval == $approval_db) // if approval url is actually equals to approval in db 
                    {
                        // Rna Section approval 
                        if($type == 'rna1' && $approval == 0)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Robotics and Automation Entry level <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: #ff8c00;">Pending Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                // users info 
                                                                $email = $row['email'];
                                                                $fname = $row['fname'];
                                                                $lname = $row['lname'];
                                                                $contact = $row['contact'];
                                                                $address = $row['address'];
                                                                $ref_num = $row['ref_num'];
                                                                $pay_type = $row['pay_type'];
                                                                $proof_pay = $row['proof_pay'];
                                                                $type = $row['type'];

                                                                ?>
                                                                <div class="container">
                                                                    <div class="row d-flex justify-content-center">
                                                                        <div class="col-md-7">
                                                                            <div class="card p-3 py-4">
                                                                                <div class="text-left">
                                                                                    <img src="assets/img/certificates/rna/level 1.webp" width="150" class="rounded-circle">
                                                                                </div>
                                                                                <div class="text-left mt-3">
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Reference # : </strong><?php echo $ref_num ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Email : </strong><?php echo $email ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Full Name : </strong><?php echo $fname .' '.  $lname ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Contact : </strong> <?php echo $contact ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Address :</strong> <?php echo $address ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-3">
                                                                                        <strong> Company / University :</strong> <?php echo $company_univ ?>
                                                                                    </h6>
                                                                                    <h6 style="color: #00008b">
                                                                                        <strong> Payment Method : <?php echo $pay_type ?></strong> 
                                                                                    </h6>
                                                                                    <h5>
                                                                                        <strong style="color: #00008b"> Paid : $17</strong> 
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <h5>Proof of payment</h5>
                                                                            <img src="<?php echo $proof_pay ?>" width="250" height="auto">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        else
                        if($type == 'rna1' && $approval == 1)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Robotics and Automation Entry level <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: green;">Accepted Approval</p>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- Instructions here -->
                                                    <article class="container">
                                                        <h1 class="section-title text-center" style="color:#00008b;" data-aos="fade-up">
                                                            Examination Instructions
                                                        </h1>
                                                        <ol class="timeline">
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">1</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Preparation</h2>
                                                                    <p class="timeline__text">
                                                                        Prepare the necessary equipment for the online exam, such as a computer or laptop with a stable 
                                                                        internet connection, a quiet and well-lit room, and any other materials required for the exam.    
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">2</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Understanding the Exam Instructions </h2>
                                                                    <p class="timeline__text">
                                                                        Read and understand the exam instructions carefully before starting the exam. 
                                                                        Check the exam schedule and time limit, as you will only have a limited amount of time to answer 
                                                                        all the questions. Follow the exam format, as some online examinations may require you to complete 
                                                                        different types of questions, such as multiple-choice.

                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">3</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Exam Details</h2>
                                                                    <p class="timeline__text">
                                                                        The Exam have a time limit of 45 minutes in total and the exam have 40 items to be completed before the
                                                                        timer ends.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">4</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Answering the Questions </h2>
                                                                    <p class="timeline__text">
                                                                        Read each question carefully, and take the time to understand what is being asked before answering.
                                                                        Select the most appropriate answer from the options provided, or if the question requires a written answer, 
                                                                        take the time to plan and organize your response. Check your answers before submitting to avoid any 
                                                                        careless errors, and to make sure that you have answered all the questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">5</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Managing Your Time</h2>
                                                                    <p class="timeline__text">
                                                                        Keep track of the time remaining, as this will help you pace yourself and ensure that you have enough 
                                                                        time to answer all the questions. If you encounter a difficult question, skip it and move on to the next 
                                                                        one. You can always come back to it later if you have time. Avoid spending too much time on one question, 
                                                                        as this may cause you to run out of time and miss out on answering other questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">6</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Technical Difficulties </h2>
                                                                    <p class="timeline__text">
                                                                        If you encounter any technical difficulties during the exam, such as a slow internet connection or a 
                                                                        malfunctioning computer, contact the support team provided by the exam administrator as soon as possible.
                                                                        Avoid panicking or becoming frustrated, as this may affect your performance on the exam.Avoid panicking or 
                                                                        becoming frustrated, as this may affect your performance on the exam.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">7</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Passing Percentage</h2>
                                                                    <p class="timeline__text">
                                                                        The passing verdict for the exam is based on a percentage. You need to score at least 70% of the total 
                                                                        percentage to pass the exam and get certified. The percentage evaluation will depend on the question 
                                                                        types that will appear and will have a total of 100%.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">8</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Exam Integrity</h2>
                                                                    <p class="timeline__text">
                                                                        Follow the exam rules and regulations, and avoid cheating or using any external resources during the exam.
                                                                        Do not communicate with anyone else during the exam, unless it is explicitly allowed by the exam administrator.
                                                                        Any suspicious behavior may lead to disqualification from the exam, and may affect your chances of passing and getting certified.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                        <h5 class="section-title text-center" style="color:#00008b;">
                                                            By following these tips and instructions, you can improve your chances of passing the online examination and 
                                                            achieving your certification. Remember to take breaks and manage your stress levels, as this can also affect 
                                                            your performance. Good luck!
                                                            <br><br>

                                                            <?php
                                                                $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                                $stmt->bind_param('ss', $email, $type);
                                                                $stmt->execute();
                                                                $res = $stmt->get_result();

                                                                // if user already take the exam 
                                                                if($res->num_rows > 0)
                                                                {
                                                                    ?>
                                                                    <a href="result_examination.php?type=<?php echo $type ?>" class="btn btn-danger">
                                                                        Already Taken Examination.
                                                                    </a>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <a href="examination.php?type=<?php echo $type ?>&approval=<?php echo $approval?>" 
                                                                    onclick="return confirm('Are You sure you want to take the examination? if you already read the instructions please press yes else please read the exam instruction first.')" 
                                                                    class="btn btn-primary">
                                                                        Take you exam here
                                                                    </a>
                                                                    <?php
                                                                }
                                                            ?>
                                                           
                                                        </h5>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        if($type == 'rna1' && $approval == 2)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Robotics and Automation Entry level <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: red;">Rejected Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        include "include/contact.php";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        // rna 2
                        else
                        if($type == 'rna2' && $approval == 0)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Robotics and Automation Intermediate level <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: #ff8c00;">Pending Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                // users info 
                                                                $email = $row['email'];
                                                                $fname = $row['fname'];
                                                                $lname = $row['lname'];
                                                                $contact = $row['contact'];
                                                                $address = $row['address'];
                                                                $ref_num = $row['ref_num'];
                                                                $pay_type = $row['pay_type'];
                                                                $proof_pay = $row['proof_pay'];
                                                                $type = $row['type'];

                                                                ?>
                                                                <div class="container">
                                                                    <div class="row d-flex justify-content-center">
                                                                        <div class="col-md-7">
                                                                            <div class="card p-3 py-4">
                                                                                <div class="text-left">
                                                                                    <img src="assets/img/certificates/rna/level 2.webp" width="150" class="rounded-circle">
                                                                                </div>
                                                                                <div class="text-left mt-3">
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Reference # : </strong><?php echo $ref_num ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Email : </strong><?php echo $email ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Full Name : </strong><?php echo $fname .' '.  $lname ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Contact : </strong> <?php echo $contact ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Address :</strong> <?php echo $address ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-3">
                                                                                        <strong> Company / University :</strong> <?php echo $company_univ ?>
                                                                                    </h6>
                                                                                    <h6 style="color: #00008b">
                                                                                        <strong> Payment Method : <?php echo $pay_type ?></strong> 
                                                                                    </h6>
                                                                                    <h5>
                                                                                        <strong style="color: #00008b"> Paid : $17</strong> 
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <h5>Proof of payment</h5>
                                                                            <img src="<?php echo $proof_pay ?>" width="250" height="auto">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        else
                        if($type == 'rna2' && $approval == 1)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Robotics and Automation Intermediate level <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: green;">Accepted Approval</p>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- Instructions here -->
                                                    <article class="container">
                                                        <h1 class="section-title text-center" style="color:#00008b;" data-aos="fade-up">
                                                            Examination Instructions
                                                        </h1>
                                                        <ol class="timeline">
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">1</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Preparation</h2>
                                                                    <p class="timeline__text">
                                                                        Prepare the necessary equipment for the online exam, such as a computer or laptop with a stable 
                                                                        internet connection, a quiet and well-lit room, and any other materials required for the exam.    
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">2</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Understanding the Exam Instructions </h2>
                                                                    <p class="timeline__text">
                                                                        Read and understand the exam instructions carefully before starting the exam. 
                                                                        Check the exam schedule and time limit, as you will only have a limited amount of time to answer 
                                                                        all the questions. Follow the exam format, as some online examinations may require you to complete 
                                                                        different types of questions, such as multiple-choice.

                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">3</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Exam Details</h2>
                                                                    <p class="timeline__text">
                                                                        The Exam have a time limit of 45 minutes in total and the exam have 40 items to be completed before the
                                                                        timer ends.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">4</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Answering the Questions </h2>
                                                                    <p class="timeline__text">
                                                                        Read each question carefully, and take the time to understand what is being asked before answering.
                                                                        Select the most appropriate answer from the options provided, or if the question requires a written answer, 
                                                                        take the time to plan and organize your response. Check your answers before submitting to avoid any 
                                                                        careless errors, and to make sure that you have answered all the questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">5</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Managing Your Time</h2>
                                                                    <p class="timeline__text">
                                                                        Keep track of the time remaining, as this will help you pace yourself and ensure that you have enough 
                                                                        time to answer all the questions. If you encounter a difficult question, skip it and move on to the next 
                                                                        one. You can always come back to it later if you have time. Avoid spending too much time on one question, 
                                                                        as this may cause you to run out of time and miss out on answering other questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">6</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Technical Difficulties </h2>
                                                                    <p class="timeline__text">
                                                                        If you encounter any technical difficulties during the exam, such as a slow internet connection or a 
                                                                        malfunctioning computer, contact the support team provided by the exam administrator as soon as possible.
                                                                        Avoid panicking or becoming frustrated, as this may affect your performance on the exam.Avoid panicking or 
                                                                        becoming frustrated, as this may affect your performance on the exam.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">7</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Passing Percentage</h2>
                                                                    <p class="timeline__text">
                                                                        The passing verdict for the exam is based on a percentage. You need to score at least 70% of the total 
                                                                        percentage to pass the exam and get certified. The percentage evaluation will depend on the question 
                                                                        types that will appear and will have a total of 100%.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">8</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Exam Integrity</h2>
                                                                    <p class="timeline__text">
                                                                        Follow the exam rules and regulations, and avoid cheating or using any external resources during the exam.
                                                                        Do not communicate with anyone else during the exam, unless it is explicitly allowed by the exam administrator.
                                                                        Any suspicious behavior may lead to disqualification from the exam, and may affect your chances of passing and getting certified.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                        <h5 class="section-title text-center" style="color:#00008b;">
                                                            By following these tips and instructions, you can improve your chances of passing the online examination and 
                                                            achieving your certification. Remember to take breaks and manage your stress levels, as this can also affect 
                                                            your performance. Good luck!
                                                            <br><br>

                                                            <?php
                                                                $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                                $stmt->bind_param('ss', $email, $type);
                                                                $stmt->execute();
                                                                $res = $stmt->get_result();

                                                                // if user already take the exam 
                                                                if($res->num_rows > 0)
                                                                {
                                                                    ?>
                                                                    <a href="result_examination.php?type=<?php echo $type ?>" class="btn btn-danger">
                                                                        Already Taken Examination.
                                                                    </a>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <a href="examination.php?type=<?php echo $type ?>&approval=<?php echo $approval?>" 
                                                                    onclick="return confirm('Are You sure you want to take the examination? if you already read the instructions please press yes else please read the exam instruction first.')" 
                                                                    class="btn btn-primary">
                                                                        Take you exam here
                                                                    </a>
                                                                    <?php
                                                                }
                                                            ?>
                                                           
                                                        </h5>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        if($type == 'rna2' && $approval == 2)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Robotics and Automation Intermediate level <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: red;">Rejected Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        include "include/contact.php";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        // rna 3
                        else
                        if($type == 'rna3' && $approval == 0)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Robotics and Automation Advance level <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: #ff8c00;">Pending Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                // users info 
                                                                $email = $row['email'];
                                                                $fname = $row['fname'];
                                                                $lname = $row['lname'];
                                                                $contact = $row['contact'];
                                                                $address = $row['address'];
                                                                $ref_num = $row['ref_num'];
                                                                $pay_type = $row['pay_type'];
                                                                $proof_pay = $row['proof_pay'];
                                                                $type = $row['type'];

                                                                ?>
                                                                <div class="container">
                                                                    <div class="row d-flex justify-content-center">
                                                                        <div class="col-md-7">
                                                                            <div class="card p-3 py-4">
                                                                                <div class="text-left">
                                                                                    <img src="assets/img/certificates/rna/level 3.webp" width="150" class="rounded-circle">
                                                                                </div>
                                                                                <div class="text-left mt-3">
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Reference # : </strong><?php echo $ref_num ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Email : </strong><?php echo $email ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Full Name : </strong><?php echo $fname .' '.  $lname ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Contact : </strong> <?php echo $contact ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Address :</strong> <?php echo $address ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-3">
                                                                                        <strong> Company / University :</strong> <?php echo $company_univ ?>
                                                                                    </h6>
                                                                                    <h6 style="color: #00008b">
                                                                                        <strong> Payment Method : <?php echo $pay_type ?></strong> 
                                                                                    </h6>
                                                                                    <h5>
                                                                                        <strong style="color: #00008b"> Paid : $17</strong> 
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <h5>Proof of payment</h5>
                                                                            <img src="<?php echo $proof_pay ?>" width="250" height="auto">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        else
                        if($type == 'rna3' && $approval == 1)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Robotics and Automation Advance level <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: green;">Accepted Approval</p>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- Instructions here -->
                                                    <article class="container">
                                                        <h1 class="section-title text-center" style="color:#00008b;" data-aos="fade-up">
                                                            Examination Instructions
                                                        </h1>
                                                        <ol class="timeline">
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">1</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Preparation</h2>
                                                                    <p class="timeline__text">
                                                                        Prepare the necessary equipment for the online exam, such as a computer or laptop with a stable 
                                                                        internet connection, a quiet and well-lit room, and any other materials required for the exam.    
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">2</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Understanding the Exam Instructions </h2>
                                                                    <p class="timeline__text">
                                                                        Read and understand the exam instructions carefully before starting the exam. 
                                                                        Check the exam schedule and time limit, as you will only have a limited amount of time to answer 
                                                                        all the questions. Follow the exam format, as some online examinations may require you to complete 
                                                                        different types of questions, such as multiple-choice.

                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">3</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Exam Details</h2>
                                                                    <p class="timeline__text">
                                                                        The Exam have a time limit of 45 minutes in total and the exam have 40 items to be completed before the
                                                                        timer ends.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">4</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Answering the Questions </h2>
                                                                    <p class="timeline__text">
                                                                        Read each question carefully, and take the time to understand what is being asked before answering.
                                                                        Select the most appropriate answer from the options provided, or if the question requires a written answer, 
                                                                        take the time to plan and organize your response. Check your answers before submitting to avoid any 
                                                                        careless errors, and to make sure that you have answered all the questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">5</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Managing Your Time</h2>
                                                                    <p class="timeline__text">
                                                                        Keep track of the time remaining, as this will help you pace yourself and ensure that you have enough 
                                                                        time to answer all the questions. If you encounter a difficult question, skip it and move on to the next 
                                                                        one. You can always come back to it later if you have time. Avoid spending too much time on one question, 
                                                                        as this may cause you to run out of time and miss out on answering other questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">6</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Technical Difficulties </h2>
                                                                    <p class="timeline__text">
                                                                        If you encounter any technical difficulties during the exam, such as a slow internet connection or a 
                                                                        malfunctioning computer, contact the support team provided by the exam administrator as soon as possible.
                                                                        Avoid panicking or becoming frustrated, as this may affect your performance on the exam.Avoid panicking or 
                                                                        becoming frustrated, as this may affect your performance on the exam.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">7</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Passing Percentage</h2>
                                                                    <p class="timeline__text">
                                                                        The passing verdict for the exam is based on a percentage. You need to score at least 70% of the total 
                                                                        percentage to pass the exam and get certified. The percentage evaluation will depend on the question 
                                                                        types that will appear and will have a total of 100%.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">8</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Exam Integrity</h2>
                                                                    <p class="timeline__text">
                                                                        Follow the exam rules and regulations, and avoid cheating or using any external resources during the exam.
                                                                        Do not communicate with anyone else during the exam, unless it is explicitly allowed by the exam administrator.
                                                                        Any suspicious behavior may lead to disqualification from the exam, and may affect your chances of passing and getting certified.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                        <h5 class="section-title text-center" style="color:#00008b;">
                                                            By following these tips and instructions, you can improve your chances of passing the online examination and 
                                                            achieving your certification. Remember to take breaks and manage your stress levels, as this can also affect 
                                                            your performance. Good luck!
                                                            <br><br>

                                                            <?php
                                                                $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                                $stmt->bind_param('ss', $email, $type);
                                                                $stmt->execute();
                                                                $res = $stmt->get_result();

                                                                // if user already take the exam 
                                                                if($res->num_rows > 0)
                                                                {
                                                                    ?>
                                                                    <a href="result_examination.php?type=<?php echo $type ?>" class="btn btn-danger">
                                                                        Already Taken Examination.
                                                                    </a>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <a href="examination.php?type=<?php echo $type ?>&approval=<?php echo $approval?>" 
                                                                    onclick="return confirm('Are You sure you want to take the examination? if you already read the instructions please press yes else please read the exam instruction first.')" 
                                                                    class="btn btn-primary">
                                                                        Take you exam here
                                                                    </a>
                                                                    <?php
                                                                }
                                                            ?>
                                                           
                                                        </h5>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        if($type == 'rna3' && $approval == 2)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Robotics and Automation Advance level <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: red;">Rejected Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        include "include/contact.php";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }

                        //WDV section approval
                        // wdv1 
                        else
                        if($type == 'wdv1' && $approval == 0)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Web Development Level 1 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: #ff8c00;">Pending Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                // users info 
                                                                $email = $row['email'];
                                                                $fname = $row['fname'];
                                                                $lname = $row['lname'];
                                                                $contact = $row['contact'];
                                                                $address = $row['address'];
                                                                $ref_num = $row['ref_num'];
                                                                $pay_type = $row['pay_type'];
                                                                $proof_pay = $row['proof_pay'];
                                                                $type = $row['type'];

                                                                ?>
                                                                <div class="container">
                                                                    <div class="row d-flex justify-content-center">
                                                                        <div class="col-md-7">
                                                                            <div class="card p-3 py-4">
                                                                                <div class="text-left">
                                                                                    <img src="assets/img/certificates/web_dev/web_dev1.png" width="150" class="rounded-circle">
                                                                                </div>
                                                                                <div class="text-left mt-3">
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Reference # : </strong><?php echo $ref_num ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Email : </strong><?php echo $email ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Full Name : </strong><?php echo $fname .' '.  $lname ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Contact : </strong> <?php echo $contact ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Address :</strong> <?php echo $address ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-3">
                                                                                        <strong> Company / University :</strong> <?php echo $company_univ ?>
                                                                                    </h6>
                                                                                    <h6 style="color: #00008b">
                                                                                        <strong> Payment Method : <?php echo $pay_type ?></strong> 
                                                                                    </h6>
                                                                                    <h5>
                                                                                        <strong style="color: #00008b"> Paid : $17</strong> 
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <h5>Proof of payment</h5>
                                                                            <img src="<?php echo $proof_pay ?>" width="250" height="auto">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        else
                        if($type == 'wdv1' && $approval == 1)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Web Development Level 1 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: green;">Accepted Approval</p>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- Instructions here -->
                                                    <article class="container">
                                                        <h1 class="section-title text-center" style="color:#00008b;" data-aos="fade-up">
                                                            Examination Instructions
                                                        </h1>
                                                        <ol class="timeline">
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">1</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Preparation</h2>
                                                                    <p class="timeline__text">
                                                                        Prepare the necessary equipment for the online exam, such as a computer or laptop with a stable 
                                                                        internet connection, a quiet and well-lit room, and any other materials required for the exam.    
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">2</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Understanding the Exam Instructions </h2>
                                                                    <p class="timeline__text">
                                                                        Read and understand the exam instructions carefully before starting the exam. 
                                                                        Check the exam schedule and time limit, as you will only have a limited amount of time to answer 
                                                                        all the questions. Follow the exam format, as some online examinations may require you to complete 
                                                                        different types of questions, such as multiple-choice.

                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">3</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Exam Details</h2>
                                                                    <p class="timeline__text">
                                                                        The Exam have a time limit of 45 minutes in total and the exam have 40 items to be completed before the
                                                                        timer ends.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">4</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Answering the Questions </h2>
                                                                    <p class="timeline__text">
                                                                        Read each question carefully, and take the time to understand what is being asked before answering.
                                                                        Select the most appropriate answer from the options provided, or if the question requires a written answer, 
                                                                        take the time to plan and organize your response. Check your answers before submitting to avoid any 
                                                                        careless errors, and to make sure that you have answered all the questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">5</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Managing Your Time</h2>
                                                                    <p class="timeline__text">
                                                                        Keep track of the time remaining, as this will help you pace yourself and ensure that you have enough 
                                                                        time to answer all the questions. If you encounter a difficult question, skip it and move on to the next 
                                                                        one. You can always come back to it later if you have time. Avoid spending too much time on one question, 
                                                                        as this may cause you to run out of time and miss out on answering other questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">6</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Technical Difficulties </h2>
                                                                    <p class="timeline__text">
                                                                        If you encounter any technical difficulties during the exam, such as a slow internet connection or a 
                                                                        malfunctioning computer, contact the support team provided by the exam administrator as soon as possible.
                                                                        Avoid panicking or becoming frustrated, as this may affect your performance on the exam.Avoid panicking or 
                                                                        becoming frustrated, as this may affect your performance on the exam.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">7</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Passing Percentage</h2>
                                                                    <p class="timeline__text">
                                                                        The passing verdict for the exam is based on a percentage. You need to score at least 70% of the total 
                                                                        percentage to pass the exam and get certified. The percentage evaluation will depend on the question 
                                                                        types that will appear and will have a total of 100%.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">8</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Exam Integrity</h2>
                                                                    <p class="timeline__text">
                                                                        Follow the exam rules and regulations, and avoid cheating or using any external resources during the exam.
                                                                        Do not communicate with anyone else during the exam, unless it is explicitly allowed by the exam administrator.
                                                                        Any suspicious behavior may lead to disqualification from the exam, and may affect your chances of passing and getting certified.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                        <h5 class="section-title text-center" style="color:#00008b;">
                                                            By following these tips and instructions, you can improve your chances of passing the online examination and 
                                                            achieving your certification. Remember to take breaks and manage your stress levels, as this can also affect 
                                                            your performance. Good luck!
                                                            <br><br>

                                                            <?php
                                                                $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                                $stmt->bind_param('ss', $email, $type);
                                                                $stmt->execute();
                                                                $res = $stmt->get_result();

                                                                // if user already take the exam 
                                                                if($res->num_rows > 0)
                                                                {
                                                                    ?>
                                                                    <a href="result_examination.php?type=<?php echo $type ?>" class="btn btn-danger">
                                                                        Already Taken Examination.
                                                                    </a>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <a href="examination.php?type=<?php echo $type ?>&approval=<?php echo $approval?>" 
                                                                    onclick="return confirm('Are You sure you want to take the examination? if you already read the instructions please press yes else please read the exam instruction first.')" 
                                                                    class="btn btn-primary">
                                                                        Take you exam here
                                                                    </a>
                                                                    <?php
                                                                }
                                                            ?>
                                                           
                                                        </h5>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        if($type == 'wdv1' && $approval == 2)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Web Development Level 1 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: red;">Rejected Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        include "include/contact.php";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        // wdv2 
                        else
                        if($type == 'wdv2' && $approval == 0)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Web Development Level 2 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: #ff8c00;">Pending Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                // users info 
                                                                $email = $row['email'];
                                                                $fname = $row['fname'];
                                                                $lname = $row['lname'];
                                                                $contact = $row['contact'];
                                                                $address = $row['address'];
                                                                $ref_num = $row['ref_num'];
                                                                $pay_type = $row['pay_type'];
                                                                $proof_pay = $row['proof_pay'];
                                                                $type = $row['type'];

                                                                ?>
                                                                <div class="container">
                                                                    <div class="row d-flex justify-content-center">
                                                                        <div class="col-md-7">
                                                                            <div class="card p-3 py-4">
                                                                                <div class="text-left">
                                                                                    <img src="assets/img/certificates/web_dev/web_dev1.png" width="150" class="rounded-circle">
                                                                                </div>
                                                                                <div class="text-left mt-3">
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Reference # : </strong><?php echo $ref_num ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Email : </strong><?php echo $email ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Full Name : </strong><?php echo $fname .' '.  $lname ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Contact : </strong> <?php echo $contact ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Address :</strong> <?php echo $address ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-3">
                                                                                        <strong> Company / University :</strong> <?php echo $company_univ ?>
                                                                                    </h6>
                                                                                    <h6 style="color: #00008b">
                                                                                        <strong> Payment Method : <?php echo $pay_type ?></strong> 
                                                                                    </h6>
                                                                                    <h5>
                                                                                        <strong style="color: #00008b"> Paid : $17</strong> 
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <h5>Proof of payment</h5>
                                                                            <img src="<?php echo $proof_pay ?>" width="250" height="auto">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        else
                        if($type == 'wdv2' && $approval == 1)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Web Development Level 2 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: green;">Accepted Approval</p>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- Instructions here -->
                                                    <article class="container">
                                                        <h1 class="section-title text-center" style="color:#00008b;" data-aos="fade-up">
                                                            Examination Instructions
                                                        </h1>
                                                        <ol class="timeline">
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">1</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Preparation</h2>
                                                                    <p class="timeline__text">
                                                                        Prepare the necessary equipment for the online exam, such as a computer or laptop with a stable 
                                                                        internet connection, a quiet and well-lit room, and any other materials required for the exam.    
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">2</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Understanding the Exam Instructions </h2>
                                                                    <p class="timeline__text">
                                                                        Read and understand the exam instructions carefully before starting the exam. 
                                                                        Check the exam schedule and time limit, as you will only have a limited amount of time to answer 
                                                                        all the questions. Follow the exam format, as some online examinations may require you to complete 
                                                                        different types of questions, such as multiple-choice.

                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">3</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Exam Details</h2>
                                                                    <p class="timeline__text">
                                                                        The Exam have a time limit of 45 minutes in total and the exam have 40 items to be completed before the
                                                                        timer ends.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">4</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Answering the Questions </h2>
                                                                    <p class="timeline__text">
                                                                        Read each question carefully, and take the time to understand what is being asked before answering.
                                                                        Select the most appropriate answer from the options provided, or if the question requires a written answer, 
                                                                        take the time to plan and organize your response. Check your answers before submitting to avoid any 
                                                                        careless errors, and to make sure that you have answered all the questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">5</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Managing Your Time</h2>
                                                                    <p class="timeline__text">
                                                                        Keep track of the time remaining, as this will help you pace yourself and ensure that you have enough 
                                                                        time to answer all the questions. If you encounter a difficult question, skip it and move on to the next 
                                                                        one. You can always come back to it later if you have time. Avoid spending too much time on one question, 
                                                                        as this may cause you to run out of time and miss out on answering other questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">6</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Technical Difficulties </h2>
                                                                    <p class="timeline__text">
                                                                        If you encounter any technical difficulties during the exam, such as a slow internet connection or a 
                                                                        malfunctioning computer, contact the support team provided by the exam administrator as soon as possible.
                                                                        Avoid panicking or becoming frustrated, as this may affect your performance on the exam.Avoid panicking or 
                                                                        becoming frustrated, as this may affect your performance on the exam.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">7</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Passing Percentage</h2>
                                                                    <p class="timeline__text">
                                                                        The passing verdict for the exam is based on a percentage. You need to score at least 70% of the total 
                                                                        percentage to pass the exam and get certified. The percentage evaluation will depend on the question 
                                                                        types that will appear and will have a total of 100%.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">8</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Exam Integrity</h2>
                                                                    <p class="timeline__text">
                                                                        Follow the exam rules and regulations, and avoid cheating or using any external resources during the exam.
                                                                        Do not communicate with anyone else during the exam, unless it is explicitly allowed by the exam administrator.
                                                                        Any suspicious behavior may lead to disqualification from the exam, and may affect your chances of passing and getting certified.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                        <h5 class="section-title text-center" style="color:#00008b;">
                                                            By following these tips and instructions, you can improve your chances of passing the online examination and 
                                                            achieving your certification. Remember to take breaks and manage your stress levels, as this can also affect 
                                                            your performance. Good luck!
                                                            <br><br>

                                                            <?php
                                                                $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                                $stmt->bind_param('ss', $email, $type);
                                                                $stmt->execute();
                                                                $res = $stmt->get_result();

                                                                // if user already take the exam 
                                                                if($res->num_rows > 0)
                                                                {
                                                                    ?>
                                                                    <a href="result_examination.php?type=<?php echo $type ?>" class="btn btn-danger">
                                                                        Already Taken Examination.
                                                                    </a>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <a href="examination.php?type=<?php echo $type ?>&approval=<?php echo $approval?>" 
                                                                    onclick="return confirm('Are You sure you want to take the examination? if you already read the instructions please press yes else please read the exam instruction first.')" 
                                                                    class="btn btn-primary">
                                                                        Take you exam here
                                                                    </a>
                                                                    <?php
                                                                }
                                                            ?>
                                                           
                                                        </h5>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        if($type == 'wdv2' && $approval == 2)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Web Development Level 2 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: red;">Rejected Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        include "include/contact.php";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        // wdv3 
                        else
                        if($type == 'wdv3' && $approval == 0)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Web Development Level 3 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: #ff8c00;">Pending Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                // users info 
                                                                $email = $row['email'];
                                                                $fname = $row['fname'];
                                                                $lname = $row['lname'];
                                                                $contact = $row['contact'];
                                                                $address = $row['address'];
                                                                $ref_num = $row['ref_num'];
                                                                $pay_type = $row['pay_type'];
                                                                $proof_pay = $row['proof_pay'];
                                                                $type = $row['type'];

                                                                ?>
                                                                <div class="container">
                                                                    <div class="row d-flex justify-content-center">
                                                                        <div class="col-md-7">
                                                                            <div class="card p-3 py-4">
                                                                                <div class="text-left">
                                                                                    <img src="assets/img/certificates/web_dev/web_dev1.png" width="150" class="rounded-circle">
                                                                                </div>
                                                                                <div class="text-left mt-3">
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Reference # : </strong><?php echo $ref_num ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Email : </strong><?php echo $email ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Full Name : </strong><?php echo $fname .' '.  $lname ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Contact : </strong> <?php echo $contact ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Address :</strong> <?php echo $address ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-3">
                                                                                        <strong> Company / University :</strong> <?php echo $company_univ ?>
                                                                                    </h6>
                                                                                    <h6 style="color: #00008b">
                                                                                        <strong> Payment Method : <?php echo $pay_type ?></strong> 
                                                                                    </h6>
                                                                                    <h5>
                                                                                        <strong style="color: #00008b"> Paid : $17</strong> 
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <h5>Proof of payment</h5>
                                                                            <img src="<?php echo $proof_pay ?>" width="250" height="auto">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        else
                        if($type == 'wdv3' && $approval == 1)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Web Development Level 3 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: green;">Accepted Approval</p>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- Instructions here -->
                                                    <article class="container">
                                                        <h1 class="section-title text-center" style="color:#00008b;" data-aos="fade-up">
                                                            Examination Instructions
                                                        </h1>
                                                        <ol class="timeline">
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">1</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Preparation</h2>
                                                                    <p class="timeline__text">
                                                                        Prepare the necessary equipment for the online exam, such as a computer or laptop with a stable 
                                                                        internet connection, a quiet and well-lit room, and any other materials required for the exam.    
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">2</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Understanding the Exam Instructions </h2>
                                                                    <p class="timeline__text">
                                                                        Read and understand the exam instructions carefully before starting the exam. 
                                                                        Check the exam schedule and time limit, as you will only have a limited amount of time to answer 
                                                                        all the questions. Follow the exam format, as some online examinations may require you to complete 
                                                                        different types of questions, such as multiple-choice.

                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">3</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Exam Details</h2>
                                                                    <p class="timeline__text">
                                                                        The Exam have a time limit of 45 minutes in total and the exam have 40 items to be completed before the
                                                                        timer ends.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">4</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Answering the Questions </h2>
                                                                    <p class="timeline__text">
                                                                        Read each question carefully, and take the time to understand what is being asked before answering.
                                                                        Select the most appropriate answer from the options provided, or if the question requires a written answer, 
                                                                        take the time to plan and organize your response. Check your answers before submitting to avoid any 
                                                                        careless errors, and to make sure that you have answered all the questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">5</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Managing Your Time</h2>
                                                                    <p class="timeline__text">
                                                                        Keep track of the time remaining, as this will help you pace yourself and ensure that you have enough 
                                                                        time to answer all the questions. If you encounter a difficult question, skip it and move on to the next 
                                                                        one. You can always come back to it later if you have time. Avoid spending too much time on one question, 
                                                                        as this may cause you to run out of time and miss out on answering other questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">6</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Technical Difficulties </h2>
                                                                    <p class="timeline__text">
                                                                        If you encounter any technical difficulties during the exam, such as a slow internet connection or a 
                                                                        malfunctioning computer, contact the support team provided by the exam administrator as soon as possible.
                                                                        Avoid panicking or becoming frustrated, as this may affect your performance on the exam.Avoid panicking or 
                                                                        becoming frustrated, as this may affect your performance on the exam.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">7</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Passing Percentage</h2>
                                                                    <p class="timeline__text">
                                                                        The passing verdict for the exam is based on a percentage. You need to score at least 70% of the total 
                                                                        percentage to pass the exam and get certified. The percentage evaluation will depend on the question 
                                                                        types that will appear and will have a total of 100%.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">8</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Exam Integrity</h2>
                                                                    <p class="timeline__text">
                                                                        Follow the exam rules and regulations, and avoid cheating or using any external resources during the exam.
                                                                        Do not communicate with anyone else during the exam, unless it is explicitly allowed by the exam administrator.
                                                                        Any suspicious behavior may lead to disqualification from the exam, and may affect your chances of passing and getting certified.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                        <h5 class="section-title text-center" style="color:#00008b;">
                                                            By following these tips and instructions, you can improve your chances of passing the online examination and 
                                                            achieving your certification. Remember to take breaks and manage your stress levels, as this can also affect 
                                                            your performance. Good luck!
                                                            <br><br>

                                                            <?php
                                                                $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                                $stmt->bind_param('ss', $email, $type);
                                                                $stmt->execute();
                                                                $res = $stmt->get_result();

                                                                // if user already take the exam 
                                                                if($res->num_rows > 0)
                                                                {
                                                                    ?>
                                                                    <a href="result_examination.php?type=<?php echo $type ?>" class="btn btn-danger">
                                                                        Already Taken Examination.
                                                                    </a>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <a href="examination.php?type=<?php echo $type ?>&approval=<?php echo $approval?>" 
                                                                    onclick="return confirm('Are You sure you want to take the examination? if you already read the instructions please press yes else please read the exam instruction first.')" 
                                                                    class="btn btn-primary">
                                                                        Take you exam here
                                                                    </a>
                                                                    <?php
                                                                }
                                                            ?>
                                                           
                                                        </h5>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        if($type == 'wdv3' && $approval == 2)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Web Development Level 3 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: red;">Rejected Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        include "include/contact.php";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        // wdv4 
                        else
                        if($type == 'wdv4' && $approval == 0)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Web Development Level 4 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: #ff8c00;">Pending Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                // users info 
                                                                $email = $row['email'];
                                                                $fname = $row['fname'];
                                                                $lname = $row['lname'];
                                                                $contact = $row['contact'];
                                                                $address = $row['address'];
                                                                $ref_num = $row['ref_num'];
                                                                $pay_type = $row['pay_type'];
                                                                $proof_pay = $row['proof_pay'];
                                                                $type = $row['type'];

                                                                ?>
                                                                <div class="container">
                                                                    <div class="row d-flex justify-content-center">
                                                                        <div class="col-md-7">
                                                                            <div class="card p-3 py-4">
                                                                                <div class="text-left">
                                                                                    <img src="assets/img/certificates/web_dev/web_dev1.png" width="150" class="rounded-circle">
                                                                                </div>
                                                                                <div class="text-left mt-3">
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Reference # : </strong><?php echo $ref_num ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Email : </strong><?php echo $email ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Full Name : </strong><?php echo $fname .' '.  $lname ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Contact : </strong> <?php echo $contact ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Address :</strong> <?php echo $address ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-3">
                                                                                        <strong> Company / University :</strong> <?php echo $company_univ ?>
                                                                                    </h6>
                                                                                    <h6 style="color: #00008b">
                                                                                        <strong> Payment Method : <?php echo $pay_type ?></strong> 
                                                                                    </h6>
                                                                                    <h5>
                                                                                        <strong style="color: #00008b"> Paid : $17</strong> 
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <h5>Proof of payment</h5>
                                                                            <img src="<?php echo $proof_pay ?>" width="250" height="auto">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        else
                        if($type == 'wdv4' && $approval == 1)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Web Development Level 4 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: green;">Accepted Approval</p>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- Instructions here -->
                                                    <article class="container">
                                                        <h1 class="section-title text-center" style="color:#00008b;" data-aos="fade-up">
                                                            Examination Instructions
                                                        </h1>
                                                        <ol class="timeline">
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">1</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Preparation</h2>
                                                                    <p class="timeline__text">
                                                                        Prepare the necessary equipment for the online exam, such as a computer or laptop with a stable 
                                                                        internet connection, a quiet and well-lit room, and any other materials required for the exam.    
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">2</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Understanding the Exam Instructions </h2>
                                                                    <p class="timeline__text">
                                                                        Read and understand the exam instructions carefully before starting the exam. 
                                                                        Check the exam schedule and time limit, as you will only have a limited amount of time to answer 
                                                                        all the questions. Follow the exam format, as some online examinations may require you to complete 
                                                                        different types of questions, such as multiple-choice.

                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">3</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Exam Details</h2>
                                                                    <p class="timeline__text">
                                                                        The Exam have a time limit of 45 minutes in total and the exam have 40 items to be completed before the
                                                                        timer ends.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">4</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Answering the Questions </h2>
                                                                    <p class="timeline__text">
                                                                        Read each question carefully, and take the time to understand what is being asked before answering.
                                                                        Select the most appropriate answer from the options provided, or if the question requires a written answer, 
                                                                        take the time to plan and organize your response. Check your answers before submitting to avoid any 
                                                                        careless errors, and to make sure that you have answered all the questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">5</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Managing Your Time</h2>
                                                                    <p class="timeline__text">
                                                                        Keep track of the time remaining, as this will help you pace yourself and ensure that you have enough 
                                                                        time to answer all the questions. If you encounter a difficult question, skip it and move on to the next 
                                                                        one. You can always come back to it later if you have time. Avoid spending too much time on one question, 
                                                                        as this may cause you to run out of time and miss out on answering other questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">6</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Technical Difficulties </h2>
                                                                    <p class="timeline__text">
                                                                        If you encounter any technical difficulties during the exam, such as a slow internet connection or a 
                                                                        malfunctioning computer, contact the support team provided by the exam administrator as soon as possible.
                                                                        Avoid panicking or becoming frustrated, as this may affect your performance on the exam.Avoid panicking or 
                                                                        becoming frustrated, as this may affect your performance on the exam.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">7</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Passing Percentage</h2>
                                                                    <p class="timeline__text">
                                                                        The passing verdict for the exam is based on a percentage. You need to score at least 70% of the total 
                                                                        percentage to pass the exam and get certified. The percentage evaluation will depend on the question 
                                                                        types that will appear and will have a total of 100%.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">8</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Exam Integrity</h2>
                                                                    <p class="timeline__text">
                                                                        Follow the exam rules and regulations, and avoid cheating or using any external resources during the exam.
                                                                        Do not communicate with anyone else during the exam, unless it is explicitly allowed by the exam administrator.
                                                                        Any suspicious behavior may lead to disqualification from the exam, and may affect your chances of passing and getting certified.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                        <h5 class="section-title text-center" style="color:#00008b;">
                                                            By following these tips and instructions, you can improve your chances of passing the online examination and 
                                                            achieving your certification. Remember to take breaks and manage your stress levels, as this can also affect 
                                                            your performance. Good luck!
                                                            <br><br>

                                                            <?php
                                                                $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                                $stmt->bind_param('ss', $email, $type);
                                                                $stmt->execute();
                                                                $res = $stmt->get_result();

                                                                // if user already take the exam 
                                                                if($res->num_rows > 0)
                                                                {
                                                                    ?>
                                                                    <a href="result_examination.php?type=<?php echo $type ?>" class="btn btn-danger">
                                                                        Already Taken Examination.
                                                                    </a>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <a href="examination.php?type=<?php echo $type ?>&approval=<?php echo $approval?>" 
                                                                    onclick="return confirm('Are You sure you want to take the examination? if you already read the instructions please press yes else please read the exam instruction first.')" 
                                                                    class="btn btn-primary">
                                                                        Take you exam here
                                                                    </a>
                                                                    <?php
                                                                }
                                                            ?>
                                                           
                                                        </h5>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        if($type == 'wdv4' && $approval == 2)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Web Development Level 4 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: red;">Rejected Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        include "include/contact.php";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        // wdv4 
                        else
                        if($type == 'wdv5' && $approval == 0)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Web Development Level 5 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: #ff8c00;">Pending Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                // users info 
                                                                $email = $row['email'];
                                                                $fname = $row['fname'];
                                                                $lname = $row['lname'];
                                                                $contact = $row['contact'];
                                                                $address = $row['address'];
                                                                $ref_num = $row['ref_num'];
                                                                $pay_type = $row['pay_type'];
                                                                $proof_pay = $row['proof_pay'];
                                                                $type = $row['type'];

                                                                ?>
                                                                <div class="container">
                                                                    <div class="row d-flex justify-content-center">
                                                                        <div class="col-md-7">
                                                                            <div class="card p-3 py-4">
                                                                                <div class="text-left">
                                                                                    <img src="assets/img/certificates/web_dev/web_dev5.png" width="150" class="rounded-circle">
                                                                                </div>
                                                                                <div class="text-left mt-3">
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Reference # : </strong><?php echo $ref_num ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Email : </strong><?php echo $email ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Full Name : </strong><?php echo $fname .' '.  $lname ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Contact : </strong> <?php echo $contact ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Address :</strong> <?php echo $address ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-3">
                                                                                        <strong> Company / University :</strong> <?php echo $company_univ ?>
                                                                                    </h6>
                                                                                    <h6 style="color: #00008b">
                                                                                        <strong> Payment Method : <?php echo $pay_type ?></strong> 
                                                                                    </h6>
                                                                                    <h5>
                                                                                        <strong style="color: #00008b"> Paid : $17</strong> 
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <h5>Proof of payment</h5>
                                                                            <img src="<?php echo $proof_pay ?>" width="250" height="auto">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        else
                        if($type == 'wdv5' && $approval == 1)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Web Development Level 5 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: green;">Accepted Approval</p>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- Instructions here -->
                                                    <article class="container">
                                                        <h1 class="section-title text-center" style="color:#00008b;" data-aos="fade-up">
                                                            Examination Instructions
                                                        </h1>
                                                        <ol class="timeline">
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">1</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Preparation</h2>
                                                                    <p class="timeline__text">
                                                                        Prepare the necessary equipment for the online exam, such as a computer or laptop with a stable 
                                                                        internet connection, a quiet and well-lit room, and any other materials required for the exam.    
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">2</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Understanding the Exam Instructions </h2>
                                                                    <p class="timeline__text">
                                                                        Read and understand the exam instructions carefully before starting the exam. 
                                                                        Check the exam schedule and time limit, as you will only have a limited amount of time to answer 
                                                                        all the questions. Follow the exam format, as some online examinations may require you to complete 
                                                                        different types of questions, such as multiple-choice.

                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">3</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Exam Details</h2>
                                                                    <p class="timeline__text">
                                                                        The Exam have a time limit of 45 minutes in total and the exam have 40 items to be completed before the
                                                                        timer ends.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">4</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Answering the Questions </h2>
                                                                    <p class="timeline__text">
                                                                        Read each question carefully, and take the time to understand what is being asked before answering.
                                                                        Select the most appropriate answer from the options provided, or if the question requires a written answer, 
                                                                        take the time to plan and organize your response. Check your answers before submitting to avoid any 
                                                                        careless errors, and to make sure that you have answered all the questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">5</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Managing Your Time</h2>
                                                                    <p class="timeline__text">
                                                                        Keep track of the time remaining, as this will help you pace yourself and ensure that you have enough 
                                                                        time to answer all the questions. If you encounter a difficult question, skip it and move on to the next 
                                                                        one. You can always come back to it later if you have time. Avoid spending too much time on one question, 
                                                                        as this may cause you to run out of time and miss out on answering other questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">6</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Technical Difficulties </h2>
                                                                    <p class="timeline__text">
                                                                        If you encounter any technical difficulties during the exam, such as a slow internet connection or a 
                                                                        malfunctioning computer, contact the support team provided by the exam administrator as soon as possible.
                                                                        Avoid panicking or becoming frustrated, as this may affect your performance on the exam.Avoid panicking or 
                                                                        becoming frustrated, as this may affect your performance on the exam.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">7</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Passing Percentage</h2>
                                                                    <p class="timeline__text">
                                                                        The passing verdict for the exam is based on a percentage. You need to score at least 70% of the total 
                                                                        percentage to pass the exam and get certified. The percentage evaluation will depend on the question 
                                                                        types that will appear and will have a total of 100%.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">8</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Exam Integrity</h2>
                                                                    <p class="timeline__text">
                                                                        Follow the exam rules and regulations, and avoid cheating or using any external resources during the exam.
                                                                        Do not communicate with anyone else during the exam, unless it is explicitly allowed by the exam administrator.
                                                                        Any suspicious behavior may lead to disqualification from the exam, and may affect your chances of passing and getting certified.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                        <h5 class="section-title text-center" style="color:#00008b;">
                                                            By following these tips and instructions, you can improve your chances of passing the online examination and 
                                                            achieving your certification. Remember to take breaks and manage your stress levels, as this can also affect 
                                                            your performance. Good luck!
                                                            <br><br>

                                                            <?php
                                                                $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                                $stmt->bind_param('ss', $email, $type);
                                                                $stmt->execute();
                                                                $res = $stmt->get_result();

                                                                // if user already take the exam 
                                                                if($res->num_rows > 0)
                                                                {
                                                                    ?>
                                                                    <a href="result_examination.php?type=<?php echo $type ?>" class="btn btn-danger">
                                                                        Already Taken Examination.
                                                                    </a>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <a href="examination.php?type=<?php echo $type ?>&approval=<?php echo $approval?>" 
                                                                    onclick="return confirm('Are You sure you want to take the examination? if you already read the instructions please press yes else please read the exam instruction first.')" 
                                                                    class="btn btn-primary">
                                                                        Take you exam here
                                                                    </a>
                                                                    <?php
                                                                }
                                                            ?>
                                                           
                                                        </h5>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        if($type == 'wdv5' && $approval == 2)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Web Development Level 5 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: red;">Rejected Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        include "include/contact.php";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }

                        //epcb section approval
                        // epcb1 
                        else
                        if($type == 'epcb1' && $approval == 0)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Electronics and PCB Design 1 <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: #ff8c00;">Pending Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                // users info 
                                                                $email = $row['email'];
                                                                $fname = $row['fname'];
                                                                $lname = $row['lname'];
                                                                $contact = $row['contact'];
                                                                $address = $row['address'];
                                                                $ref_num = $row['ref_num'];
                                                                $pay_type = $row['pay_type'];
                                                                $proof_pay = $row['proof_pay'];
                                                                $type = $row['type'];

                                                                ?>
                                                                <div class="container">
                                                                    <div class="row d-flex justify-content-center">
                                                                        <div class="col-md-7">
                                                                            <div class="card p-3 py-4">
                                                                                <div class="text-left">
                                                                                    <img src="assets/img/certificates/web_dev/web_dev1.png" width="150" class="rounded-circle">
                                                                                </div>
                                                                                <div class="text-left mt-3">
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Reference # : </strong><?php echo $ref_num ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Email : </strong><?php echo $email ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Full Name : </strong><?php echo $fname .' '.  $lname ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Contact : </strong> <?php echo $contact ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Address :</strong> <?php echo $address ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-3">
                                                                                        <strong> Company / University :</strong> <?php echo $company_univ ?>
                                                                                    </h6>
                                                                                    <h6 style="color: #00008b">
                                                                                        <strong> Payment Method : <?php echo $pay_type ?></strong> 
                                                                                    </h6>
                                                                                    <h5>
                                                                                        <strong style="color: #00008b"> Paid : $17</strong> 
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <h5>Proof of payment</h5>
                                                                            <img src="<?php echo $proof_pay ?>" width="250" height="auto">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        else
                        if($type == 'epcb1' && $approval == 1)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Electronics and PCB Design 1  <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: green;">Accepted Approval</p>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- Instructions here -->
                                                    <article class="container">
                                                        <h1 class="section-title text-center" style="color:#00008b;" data-aos="fade-up">
                                                            Examination Instructions
                                                        </h1>
                                                        <ol class="timeline">
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">1</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Preparation</h2>
                                                                    <p class="timeline__text">
                                                                        Prepare the necessary equipment for the online exam, such as a computer or laptop with a stable 
                                                                        internet connection, a quiet and well-lit room, and any other materials required for the exam.    
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">2</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Understanding the Exam Instructions </h2>
                                                                    <p class="timeline__text">
                                                                        Read and understand the exam instructions carefully before starting the exam. 
                                                                        Check the exam schedule and time limit, as you will only have a limited amount of time to answer 
                                                                        all the questions. Follow the exam format, as some online examinations may require you to complete 
                                                                        different types of questions, such as multiple-choice.

                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">3</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Exam Details</h2>
                                                                    <p class="timeline__text">
                                                                        The Exam have a time limit of 45 minutes in total and the exam have 40 items to be completed before the
                                                                        timer ends.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">4</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Answering the Questions </h2>
                                                                    <p class="timeline__text">
                                                                        Read each question carefully, and take the time to understand what is being asked before answering.
                                                                        Select the most appropriate answer from the options provided, or if the question requires a written answer, 
                                                                        take the time to plan and organize your response. Check your answers before submitting to avoid any 
                                                                        careless errors, and to make sure that you have answered all the questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">5</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Managing Your Time</h2>
                                                                    <p class="timeline__text">
                                                                        Keep track of the time remaining, as this will help you pace yourself and ensure that you have enough 
                                                                        time to answer all the questions. If you encounter a difficult question, skip it and move on to the next 
                                                                        one. You can always come back to it later if you have time. Avoid spending too much time on one question, 
                                                                        as this may cause you to run out of time and miss out on answering other questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">6</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Technical Difficulties </h2>
                                                                    <p class="timeline__text">
                                                                        If you encounter any technical difficulties during the exam, such as a slow internet connection or a 
                                                                        malfunctioning computer, contact the support team provided by the exam administrator as soon as possible.
                                                                        Avoid panicking or becoming frustrated, as this may affect your performance on the exam.Avoid panicking or 
                                                                        becoming frustrated, as this may affect your performance on the exam.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">7</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Passing Percentage</h2>
                                                                    <p class="timeline__text">
                                                                        The passing verdict for the exam is based on a percentage. You need to score at least 70% of the total 
                                                                        percentage to pass the exam and get certified. The percentage evaluation will depend on the question 
                                                                        types that will appear and will have a total of 100%.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">8</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Exam Integrity</h2>
                                                                    <p class="timeline__text">
                                                                        Follow the exam rules and regulations, and avoid cheating or using any external resources during the exam.
                                                                        Do not communicate with anyone else during the exam, unless it is explicitly allowed by the exam administrator.
                                                                        Any suspicious behavior may lead to disqualification from the exam, and may affect your chances of passing and getting certified.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                        <h5 class="section-title text-center" style="color:#00008b;">
                                                            By following these tips and instructions, you can improve your chances of passing the online examination and 
                                                            achieving your certification. Remember to take breaks and manage your stress levels, as this can also affect 
                                                            your performance. Good luck!
                                                            <br><br>

                                                            <?php
                                                                $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                                $stmt->bind_param('ss', $email, $type);
                                                                $stmt->execute();
                                                                $res = $stmt->get_result();

                                                                // if user already take the exam 
                                                                if($res->num_rows > 0)
                                                                {
                                                                    ?>
                                                                    <a href="result_examination.php?type=<?php echo $type ?>" class="btn btn-danger">
                                                                        Already Taken Examination.
                                                                    </a>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <a href="examination.php?type=<?php echo $type ?>&approval=<?php echo $approval?>" 
                                                                    onclick="return confirm('Are You sure you want to take the examination? if you already read the instructions please press yes else please read the exam instruction first.')" 
                                                                    class="btn btn-primary">
                                                                        Take you exam here
                                                                    </a>
                                                                    <?php
                                                                }
                                                            ?>
                                                           
                                                        </h5>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        if($type == 'epcb1' && $approval == 2)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Electronics and PCB Design 1  <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: red;">Rejected Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        include "include/contact.php";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        // epcb2 
                        else
                        if($type == 'epcb2' && $approval == 0)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Electronics and PCB Design 2  <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: #ff8c00;">Pending Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                // users info 
                                                                $email = $row['email'];
                                                                $fname = $row['fname'];
                                                                $lname = $row['lname'];
                                                                $contact = $row['contact'];
                                                                $address = $row['address'];
                                                                $ref_num = $row['ref_num'];
                                                                $pay_type = $row['pay_type'];
                                                                $proof_pay = $row['proof_pay'];
                                                                $type = $row['type'];

                                                                ?>
                                                                <div class="container">
                                                                    <div class="row d-flex justify-content-center">
                                                                        <div class="col-md-7">
                                                                            <div class="card p-3 py-4">
                                                                                <div class="text-left">
                                                                                    <img src="assets/img/certificates/web_dev/web_dev1.png" width="150" class="rounded-circle">
                                                                                </div>
                                                                                <div class="text-left mt-3">
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Reference # : </strong><?php echo $ref_num ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Email : </strong><?php echo $email ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Full Name : </strong><?php echo $fname .' '.  $lname ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Contact : </strong> <?php echo $contact ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Address :</strong> <?php echo $address ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-3">
                                                                                        <strong> Company / University :</strong> <?php echo $company_univ ?>
                                                                                    </h6>
                                                                                    <h6 style="color: #00008b">
                                                                                        <strong> Payment Method : <?php echo $pay_type ?></strong> 
                                                                                    </h6>
                                                                                    <h5>
                                                                                        <strong style="color: #00008b"> Paid : $17</strong> 
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <h5>Proof of payment</h5>
                                                                            <img src="<?php echo $proof_pay ?>" width="250" height="auto">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        else
                        if($type == 'epcb2' && $approval == 1)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Electronics and PCB Design 2  <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: green;">Accepted Approval</p>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- Instructions here -->
                                                    <article class="container">
                                                        <h1 class="section-title text-center" style="color:#00008b;" data-aos="fade-up">
                                                            Examination Instructions
                                                        </h1>
                                                        <ol class="timeline">
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">1</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Preparation</h2>
                                                                    <p class="timeline__text">
                                                                        Prepare the necessary equipment for the online exam, such as a computer or laptop with a stable 
                                                                        internet connection, a quiet and well-lit room, and any other materials required for the exam.    
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">2</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Understanding the Exam Instructions </h2>
                                                                    <p class="timeline__text">
                                                                        Read and understand the exam instructions carefully before starting the exam. 
                                                                        Check the exam schedule and time limit, as you will only have a limited amount of time to answer 
                                                                        all the questions. Follow the exam format, as some online examinations may require you to complete 
                                                                        different types of questions, such as multiple-choice.

                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">3</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Exam Details</h2>
                                                                    <p class="timeline__text">
                                                                        The Exam have a time limit of 45 minutes in total and the exam have 40 items to be completed before the
                                                                        timer ends.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">4</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Answering the Questions </h2>
                                                                    <p class="timeline__text">
                                                                        Read each question carefully, and take the time to understand what is being asked before answering.
                                                                        Select the most appropriate answer from the options provided, or if the question requires a written answer, 
                                                                        take the time to plan and organize your response. Check your answers before submitting to avoid any 
                                                                        careless errors, and to make sure that you have answered all the questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">5</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Managing Your Time</h2>
                                                                    <p class="timeline__text">
                                                                        Keep track of the time remaining, as this will help you pace yourself and ensure that you have enough 
                                                                        time to answer all the questions. If you encounter a difficult question, skip it and move on to the next 
                                                                        one. You can always come back to it later if you have time. Avoid spending too much time on one question, 
                                                                        as this may cause you to run out of time and miss out on answering other questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">6</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Technical Difficulties </h2>
                                                                    <p class="timeline__text">
                                                                        If you encounter any technical difficulties during the exam, such as a slow internet connection or a 
                                                                        malfunctioning computer, contact the support team provided by the exam administrator as soon as possible.
                                                                        Avoid panicking or becoming frustrated, as this may affect your performance on the exam.Avoid panicking or 
                                                                        becoming frustrated, as this may affect your performance on the exam.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">7</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Passing Percentage</h2>
                                                                    <p class="timeline__text">
                                                                        The passing verdict for the exam is based on a percentage. You need to score at least 70% of the total 
                                                                        percentage to pass the exam and get certified. The percentage evaluation will depend on the question 
                                                                        types that will appear and will have a total of 100%.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">8</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Exam Integrity</h2>
                                                                    <p class="timeline__text">
                                                                        Follow the exam rules and regulations, and avoid cheating or using any external resources during the exam.
                                                                        Do not communicate with anyone else during the exam, unless it is explicitly allowed by the exam administrator.
                                                                        Any suspicious behavior may lead to disqualification from the exam, and may affect your chances of passing and getting certified.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                        <h5 class="section-title text-center" style="color:#00008b;">
                                                            By following these tips and instructions, you can improve your chances of passing the online examination and 
                                                            achieving your certification. Remember to take breaks and manage your stress levels, as this can also affect 
                                                            your performance. Good luck!
                                                            <br><br>

                                                            <?php
                                                                $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                                $stmt->bind_param('ss', $email, $type);
                                                                $stmt->execute();
                                                                $res = $stmt->get_result();

                                                                // if user already take the exam 
                                                                if($res->num_rows > 0)
                                                                {
                                                                    ?>
                                                                    <a href="result_examination.php?type=<?php echo $type ?>" class="btn btn-danger">
                                                                        Already Taken Examination.
                                                                    </a>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <a href="examination.php?type=<?php echo $type ?>&approval=<?php echo $approval?>" 
                                                                    onclick="return confirm('Are You sure you want to take the examination? if you already read the instructions please press yes else please read the exam instruction first.')" 
                                                                    class="btn btn-primary">
                                                                        Take you exam here
                                                                    </a>
                                                                    <?php
                                                                }
                                                            ?>
                                                           
                                                        </h5>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        if($type == 'epcb2' && $approval == 2)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Electronics and PCB Design 2  <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: red;">Rejected Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        include "include/contact.php";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        // epcb3 
                        else
                        if($type == 'epcb3' && $approval == 0)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Electronics and PCB Design 3  <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: #ff8c00;">Pending Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt->bind_param('ss', $email, $type);
                                                        $stmt->execute();
                                                        $res = $stmt->get_result();

                                                        if($res->num_rows > 0)
                                                        {
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                                // users info 
                                                                $email = $row['email'];
                                                                $fname = $row['fname'];
                                                                $lname = $row['lname'];
                                                                $contact = $row['contact'];
                                                                $address = $row['address'];
                                                                $ref_num = $row['ref_num'];
                                                                $pay_type = $row['pay_type'];
                                                                $proof_pay = $row['proof_pay'];
                                                                $type = $row['type'];

                                                                ?>
                                                                <div class="container">
                                                                    <div class="row d-flex justify-content-center">
                                                                        <div class="col-md-7">
                                                                            <div class="card p-3 py-4">
                                                                                <div class="text-left">
                                                                                    <img src="assets/img/certificates/web_dev/web_dev1.png" width="150" class="rounded-circle">
                                                                                </div>
                                                                                <div class="text-left mt-3">
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Reference # : </strong><?php echo $ref_num ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Email : </strong><?php echo $email ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Full Name : </strong><?php echo $fname .' '.  $lname ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong>Contact : </strong> <?php echo $contact ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-1">
                                                                                        <strong> Address :</strong> <?php echo $address ?>
                                                                                    </h6>
                                                                                    <h6 class="mb-3">
                                                                                        <strong> Company / University :</strong> <?php echo $company_univ ?>
                                                                                    </h6>
                                                                                    <h6 style="color: #00008b">
                                                                                        <strong> Payment Method : <?php echo $pay_type ?></strong> 
                                                                                    </h6>
                                                                                    <h5>
                                                                                        <strong style="color: #00008b"> Paid : $17</strong> 
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <h5>Proof of payment</h5>
                                                                            <img src="<?php echo $proof_pay ?>" width="250" height="auto">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }
                        else
                        if($type == 'epcb3' && $approval == 1)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Electronics and PCB Design 3  <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: green;">Accepted Approval</p>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- Instructions here -->
                                                    <article class="container">
                                                        <h1 class="section-title text-center" style="color:#00008b;" data-aos="fade-up">
                                                            Examination Instructions
                                                        </h1>
                                                        <ol class="timeline">
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">1</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Preparation</h2>
                                                                    <p class="timeline__text">
                                                                        Prepare the necessary equipment for the online exam, such as a computer or laptop with a stable 
                                                                        internet connection, a quiet and well-lit room, and any other materials required for the exam.    
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">2</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Understanding the Exam Instructions </h2>
                                                                    <p class="timeline__text">
                                                                        Read and understand the exam instructions carefully before starting the exam. 
                                                                        Check the exam schedule and time limit, as you will only have a limited amount of time to answer 
                                                                        all the questions. Follow the exam format, as some online examinations may require you to complete 
                                                                        different types of questions, such as multiple-choice.

                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">3</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Exam Details</h2>
                                                                    <p class="timeline__text">
                                                                        The Exam have a time limit of 45 minutes in total and the exam have 40 items to be completed before the
                                                                        timer ends.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">4</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Answering the Questions </h2>
                                                                    <p class="timeline__text">
                                                                        Read each question carefully, and take the time to understand what is being asked before answering.
                                                                        Select the most appropriate answer from the options provided, or if the question requires a written answer, 
                                                                        take the time to plan and organize your response. Check your answers before submitting to avoid any 
                                                                        careless errors, and to make sure that you have answered all the questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">5</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Managing Your Time</h2>
                                                                    <p class="timeline__text">
                                                                        Keep track of the time remaining, as this will help you pace yourself and ensure that you have enough 
                                                                        time to answer all the questions. If you encounter a difficult question, skip it and move on to the next 
                                                                        one. You can always come back to it later if you have time. Avoid spending too much time on one question, 
                                                                        as this may cause you to run out of time and miss out on answering other questions.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">6</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Technical Difficulties </h2>
                                                                    <p class="timeline__text">
                                                                        If you encounter any technical difficulties during the exam, such as a slow internet connection or a 
                                                                        malfunctioning computer, contact the support team provided by the exam administrator as soon as possible.
                                                                        Avoid panicking or becoming frustrated, as this may affect your performance on the exam.Avoid panicking or 
                                                                        becoming frustrated, as this may affect your performance on the exam.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">7</span>
                                                                <div class="timeline__content">
                                                                    <h2 class="timeline__heading">Passing Percentage</h2>
                                                                    <p class="timeline__text">
                                                                        The passing verdict for the exam is based on a percentage. You need to score at least 70% of the total 
                                                                        percentage to pass the exam and get certified. The percentage evaluation will depend on the question 
                                                                        types that will appear and will have a total of 100%.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="timeline__entry" data-aos="fade-up">
                                                                <span class="timeline__id">8</span>
                                                                <div class="timeline__content timeline__content--flipped">
                                                                    <h2 class="timeline__heading">Exam Integrity</h2>
                                                                    <p class="timeline__text">
                                                                        Follow the exam rules and regulations, and avoid cheating or using any external resources during the exam.
                                                                        Do not communicate with anyone else during the exam, unless it is explicitly allowed by the exam administrator.
                                                                        Any suspicious behavior may lead to disqualification from the exam, and may affect your chances of passing and getting certified.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                        <h5 class="section-title text-center" style="color:#00008b;">
                                                            By following these tips and instructions, you can improve your chances of passing the online examination and 
                                                            achieving your certification. Remember to take breaks and manage your stress levels, as this can also affect 
                                                            your performance. Good luck!
                                                            <br><br>

                                                            <?php
                                                                $stmt = $conn->prepare("select * from result where email = ? and type = ?");
                                                                $stmt->bind_param('ss', $email, $type);
                                                                $stmt->execute();
                                                                $res = $stmt->get_result();

                                                                // if user already take the exam 
                                                                if($res->num_rows > 0)
                                                                {
                                                                    ?>
                                                                    <a href="result_examination.php?type=<?php echo $type ?>" class="btn btn-danger">
                                                                        Already Taken Examination.
                                                                    </a>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <a href="examination.php?type=<?php echo $type ?>&approval=<?php echo $approval?>" 
                                                                    onclick="return confirm('Are You sure you want to take the examination? if you already read the instructions please press yes else please read the exam instruction first.')" 
                                                                    class="btn btn-primary">
                                                                        Take you exam here
                                                                    </a>
                                                                    <?php
                                                                }
                                                            ?>
                                                           
                                                        </h5>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            <?php
                        }
                        else
                        if($type == 'epcb3' && $approval == 2)
                        {
                            ?>
                                <!-- ======= start Hero ======= -->
                                <section id="hero">
                                    <div class="container">
                                        <div class="flex justify-content-center">
                                            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                <div data-aos="zoom-out">
                                                    <h1 class="text-center text-lg-center">
                                                        Electronics and PCB Design 3  <br>
                                                        Approval
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
                                            <h2 class="text-secondary">Enrollment Approval</h2>
                                            <p style="color: red;">Rejected Approval</p>
                                        </div>

                                        <div class="container-fluid" data-aos="fade-up">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-11">
                                                    <!-- user data for enrollment -->
                                                    <?php
                                                        include "include/contact.php";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                            <?php
                        }

                    }
                    else // if approval url not equals to approval db 
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