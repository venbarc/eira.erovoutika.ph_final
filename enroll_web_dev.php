<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Web Development | EIRA</title>

    <?php
    session_start();
    include "connect.php";
    include "include/head_links.php";

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
    

    // email SMTP set up /////////////////////////////////////////////////
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    require 'PHPMailer-master/src/Exception.php';

    // navigation bar 
    include 'include/navbar.php';
    ?>

</head>

<body>

    <main>

        <!-- start  -->

        <main id="main" id="enroll_rna" class="enroll_rna">

            <?php
                // get url type of wdv certificate 
                if(isset($_GET['type']))
                {
                    $type = $_GET['type'];

                    if($type == 'wdv1')
                    {
                        ?>
                        <!-- ======= Start hero ======= -->
                        <section id="hero">
                            <div class="container">
                                <div class="flex justify-content-center">
                                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                        <div data-aos="zoom-out">
                                            <h1 class="text-center text-lg-center">
                                                Enrollment <strong class="text-warning">Web Development</strong> <br>
                                                Basic HTML and CSS
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

                        <!-- check if user is already enrolled  -->
                        <?php
                            $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                            $stmt->bind_param('ss', $email, $type);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            // get approval 
                            $row = mysqli_fetch_assoc($res);

                            if($res->num_rows > 0)// The user is already enrolled 
                            {
                                $approval = $row['approval'];
                                
                                if($approval == 0)// Pending 
                                {
                                    ?>
                                        <script>
                                            location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=0";
                                        </script>
                                    <?php
                                }
                                else
                                if($approval == 1)// Approved 
                                {
                                    ?>
                                        <script>
                                            location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=1";
                                        </script>
                                    <?php
                                }
                                else
                                if($approval == 2)// Rejected 
                                {
                                    ?>
                                        <script>
                                            location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=2";
                                        </script>
                                    <?php
                                }
                            }
                            else //if user is not yet enrolled
                            {
                                ?>
                                    <!-- ======= Start wdv1 Enrollment form Section ======= -->
                                    <section id="enroll_rna" class="enroll_rna">
                                        <div class="container">
                                            <div class="section-title" data-aos="fade-up">
                                                <h2 class="text-secondary">Enrollment</h2>
                                                <p style="color: #00008b;">Web Development Level 1</p>
                                            </div>
                                            <?php
                                                // post gcash and security bank buttons in form 
                                                if(isset($_POST['submit_gcash']))
                                                {
                                                    // users info 
                                                    $email = $_POST['email'];
                                                    $fname = $_POST['fname'];
                                                    $lname = $_POST['lname'];
                                                    $contact = $_POST['contact'];
                                                    $address = $_POST['address'];
                                                    $ref_num = $_POST['ref_num'];
                                                    $pay_type = 'Gcash';

                                                    // for proof image
                                                    $file_ext = strtolower(pathinfo($_FILES['proof_pay']['name'], PATHINFO_EXTENSION));
                                                    $file_name = 'proof-'. rand(1000000, 9000000) .'.'. $file_ext; 
                                                    $file_path = 'upload_proof_pay/'. $file_name;

                                                    if(!in_array($file_ext, array('jpg','jpeg','png')))
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Only JPG, JPEG, and PNG files are allowed.
                                                        </div>
                                                        ';     
                                                    }
                                                    if($_FILES['proof_pay']['size'] > 3000000)
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Maximum file size is 3MB.
                                                        </div>
                                                        ';
                                                    }
                                                    if(move_uploaded_file($_FILES['proof_pay']['tmp_name'], $file_path))
                                                    {
                                                        // insert into payments data 
                                                        $stmt_insert = $conn->prepare("
                                                        insert into 
                                                        payments (type, pay_type, ref_num, email, fname, lname, contact, address, proof_pay) 
                                                        values(?,?,?,?,?,?,?,?,?)
                                                        ");
                                                        $stmt_insert->bind_param('sssssssss', $type, $pay_type, $ref_num, $email, $fname, $lname, $contact, $address, $file_path);
                                                        $stmt_insert->execute();

                                                        // get the approval in db to put in url
                                                        $stmt_approval = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt_approval->bind_param('ss', $email, $type);
                                                        $stmt_approval->execute();
                                                        $res = $stmt_approval->get_result();
                                                        // get approval 
                                                        $row = mysqli_fetch_assoc($res);

                                                        if($res->num_rows > 0)
                                                        {
                                                            $approval = $row['approval'];

                                                            // Pending 
                                                            if($approval == 0)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Approved 
                                                            if($approval == 1)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Rejected 
                                                            if($approval == 2)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                        }
                                                        if($stmt_insert->affected_rows > 0)
                                                        {
                                                            ?>
                                                            <script>
                                                                location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=0";
                                                            </script>
                                                            <?php
                                                        }
                                                        else{
                                                            echo'
                                                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                Something went wrong.
                                                            </div>
                                                            ';
                                                        }
                                                        $stmt_insert->close();
                                                        $stmt_approval->close();

                                                    }

                                                    //SMTP settings
                                                    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                                                    $mail->isSMTP();
                                                    $mail->Host = 'smtp.gmail.com';
                                                    $mail->SMTPAuth = true;
                                                    
                                                    // erovoutika mails 
                                                    $mail->Username = 'erovoutikamails@gmail.com';
                                                    // erovoutika password form gmail 
                                                    $mail->Password = 'wycnwwgkkvdhieet';
                                                    $mail->SMTPSecure = 'tls';
                                                    $mail->Port = 587;

                                                    $mail->setFrom('erovoutikamails@gmail.com', 'Eira Payment');
                                                    // users email 
                                                    $mail->addAddress($email);
                                                    $mail->addAddress('erovoutikamails@gmail.com');
                                                    $mail->isHTML(true);
                                                    $mail->Subject = 'Payment Details';
                                                    $mail->Body = '
                                                    <div style="border: 5px dashed darkblue; border-radius: 1%; margin:0 20%; padding:5%;">
                                                        <h1 style="color:darkblue; font-weight: 600; text-align:center;">
                                                            Payment Details
                                                        </h1>
                                                        <h4>Email : '.$email.'</h4>
                                                        <h4>Name : '.$fname.' '.$lname.'</h4>
                                                        <h4>Contact : '.$contact.'</h4>
                                                        <h4>Address : '.$address.'</h4>
                                                        <h4>Reference Number : '.$ref_num.'</h4>
                                                        <h4>Payment Method : '.$pay_type.'</h4>
                                                    </div>
                                                    ';
                                                    $mail->AddAttachment($file_path);
                                                    $mail->send();
                                                }
                                                else
                                                if(isset($_POST['submit_sb']))
                                                {
                                                    // users info 
                                                    $email = $_POST['email'];
                                                    $fname = $_POST['fname'];
                                                    $lname = $_POST['lname'];
                                                    $contact = $_POST['contact'];
                                                    $address = $_POST['address'];
                                                    $ref_num = $_POST['ref_num'];
                                                    $pay_type = 'Security Bank';

                                                    // for proof image
                                                    $file_ext = strtolower(pathinfo($_FILES['proof_pay']['name'], PATHINFO_EXTENSION));
                                                    $file_name = 'proof-'. rand(1000000, 9000000) .'.'. $file_ext; 
                                                    $file_path = 'upload_proof_pay/'. $file_name;

                                                    if(!in_array($file_ext, array('jpg','jpeg','png')))
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Only JPG, JPEG, and PNG files are allowed.
                                                        </div>
                                                        ';     
                                                    }
                                                    if($_FILES['proof_pay']['size'] > 3000000)
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Maximum file size is 3MB.
                                                        </div>
                                                        ';
                                                    }
                                                    if(move_uploaded_file($_FILES['proof_pay']['tmp_name'], $file_path))
                                                    {
                                                        // insert into payments data 
                                                        $stmt_insert = $conn->prepare("
                                                        insert into 
                                                        payments (type, pay_type, ref_num, email, fname, lname, contact, address, proof_pay) 
                                                        values(?,?,?,?,?,?,?,?,?)
                                                        ");
                                                        $stmt_insert->bind_param('sssssssss', $type, $pay_type, $ref_num, $email, $fname, $lname, $contact, $address, $file_path);
                                                        $stmt_insert->execute();

                                                        // get the approval in db to put in url
                                                        $stmt_approval = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt_approval->bind_param('ss', $email, $type);
                                                        $stmt_approval->execute();
                                                        $res = $stmt_approval->get_result();
                                                        // get approval 
                                                        $row = mysqli_fetch_assoc($res);

                                                        if($res->num_rows > 0)
                                                        {
                                                            $approval = $row['approval'];

                                                            // Pending 
                                                            if($approval == 0)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Approved 
                                                            if($approval == 1)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Rejected 
                                                            if($approval == 2)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                        }
                                                        if($stmt_insert->affected_rows > 0)
                                                        {
                                                            ?>
                                                            <script>
                                                                location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=0";
                                                            </script>
                                                            <?php
                                                        }
                                                        else{
                                                            echo'
                                                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                Something went wrong.
                                                            </div>
                                                            ';
                                                        }
                                                        $stmt_insert->close();
                                                        $stmt_approval->close();

                                                    }

                                                    //SMTP settings
                                                    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                                                    $mail->isSMTP();
                                                    $mail->Host = 'smtp.gmail.com';
                                                    $mail->SMTPAuth = true;
                                                    
                                                    // erovoutika mails 
                                                    $mail->Username = 'erovoutikamails@gmail.com';
                                                    // erovoutika password form gmail 
                                                    $mail->Password = 'wycnwwgkkvdhieet';
                                                    $mail->SMTPSecure = 'tls';
                                                    $mail->Port = 587;

                                                    $mail->setFrom('erovoutikamails@gmail.com', 'Eira Payment');
                                                    // users email 
                                                    $mail->addAddress($email);
                                                    $mail->addAddress('erovoutikamails@gmail.com');
                                                    $mail->isHTML(true);
                                                    $mail->Subject = 'Payment Details';
                                                    $mail->Body = '
                                                    <div style="border: 5px dashed darkblue; border-radius: 1%; margin:0 20%; padding:4%;">
                                                        <h1 style="color:darkblue; font-weight: 600; text-align: center">
                                                            Payment Details
                                                        </h1>
                                                        <h4>Email : '.$email.'</h4>
                                                        <h4>Name : '.$fname.' '.$lname.'</h4>
                                                        <h4>Contact : '.$contact.'</h4>
                                                        <h4>Address : '.$address.'</h4>
                                                        <h4>Reference Number : '.$ref_num.'</h4>
                                                        <h4>Payment Method : '.$pay_type.'</h4>
                                                    </div>
                                                    ';
                                                    $mail->AddAttachment($file_path);
                                                    $mail->send();
                                                }
                                            ?>
                                            <div class="container-fluid">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 col-lg-11">
                                                        <div class="card card0 rounded-0">
                                                            <div class="row">
                                                                <div class="col-md-5 d-md-block d-none p-0 box">
                                                                    <div class="card rounded-0 border-0 card1" id="bill">
                                                                        <h3 id="heading1">Payment Summary</h3>
                                                                        <div class="row">
                                                                            <div class="col-lg-7 col-8 mt-4 line pl-4">
                                                                                <h2 class="head">Web Development</h2>
                                                                                <div class="data">Level 1</div>
                                                                            </div>
                                                                            <div class="col-lg-5 col-4 mt-4">
                                                                                <img src="assets/img/certificates/web_dev/web_dev1.png" width="200"
                                                                                    height="200">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 blue-bg">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <p class="data mb-1" id="total-label">Total Price
                                                                                        </p>
                                                                                        <h2 class="head2 mb-1" id="total">$17</h2>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h3 class="data2 mb-1 text-warning"
                                                                                            id="total-label">WDV - 101</h3>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-7 col-sm-12 p-0 box">
                                                                    <div class="card rounded-0 border-0 card2">
                                                                        <div class="form-card">
                                                                            <div class="radio-group">
                                                                                <!-- note  -->
                                                                                <div class="text-center bg-warning" style="padding:15px;">
                                                                                    <strong>Note:</strong>
                                                                                    Kindly please check your Information first before
                                                                                    proceeding to payment!
                                                                                    if you want to make changes please proceed
                                                                                    <a href="edit_profile.php"
                                                                                        class="text-primary">here.</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <!-- email input  -->
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label label">Email</label>
                                                                                    <input type="text" name="email" value="<?php echo $email ?>"readonly>
                                                                                </div>
                                                                                <!-- First Name input  -->
                                                                                <div class="col-6">
                                                                                    <label class="form-label label">Full Name</label>
                                                                                    <input type="text" name="fname" value="<?php echo $fname .' '. $lname?>" readonly>
                                                                                </div>
                                                                                <!-- Contact input  -->
                                                                                <div class="col-12">
                                                                                    <label class="form-label label">Contact</label>
                                                                                    <input type="text" name="contact" value="<?php echo $contact ?>" readonly>
                                                                                </div>
                                                                                <!-- address input  -->
                                                                                <div class="col-12">
                                                                                    <label class="form-label label">Address</label>
                                                                                    <input type="text" name="address" value="<?php echo $address ?>" readonly>
                                                                                </div>
                                                                                <!-- Company_univ input  -->
                                                                                <div class="col-12">
                                                                                    <label class="form-label label">Company / University</label>
                                                                                    <input type="text" name="company_univ" value="<?php echo $company_univ ?>" readonly>
                                                                                </div>
                                                                                <div class="col-md-12">

                                                                                    <!-- button and modal start here  -->
                                                                                    <button type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#staticBackdrop">
                                                                                        <i class="fas fa-money-bill-wave"></i> &nbsp; Pay Now
                                                                                    </button>

                                                                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-body">
                                                                                                    <div class="text-right"><i class="fa fa-close close" data-dismiss="modal"></i></div>
                                                                                                    <div class="tabs mt-3">
                                                                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                                                            <li class="nav-item" role="presentation">
                                                                                                                <a class="nav-link active" id="gcash-tab" data-toggle="tab" href="#gcash" role="tab" aria-controls="gcash" aria-selected="true">
                                                                                                                    <img src="assets/img/enroll/gcash_logo.png" width="80">
                                                                                                                </a>
                                                                                                            </li>
                                                                                                            <li class="nav-item" role="presentation">
                                                                                                                <a class="nav-link" id="sb-tab" data-toggle="tab" href="#sb" role="tab" aria-controls="sb" aria-selected="false">
                                                                                                                    <img src="assets/img/enroll/securitybank-logo.png" width="80">
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                        
                                                                                                            <div class="tab-content" id="myTabContent">
                                                                                                            
                                                                                                                <div class="tab-pane fade show active" id="gcash" role="tabpanel" aria-labelledby="gcash-tab">
                                                                                                                    <!-- form start  -->
                                                                                                                    <form method="post" enctype="multipart/form-data">
                                                                                                                        <div class="mt-2 mx-4">
                                                                                                                            <div class="mb-3">
                                                                                                                                <h6 style="color:#00008b;"><strong>GCash Details</strong></h6>
                                                                                                                                <div style="margin-left: 20px;">
                                                                                                                                    <strong>Number :</strong> 0906-1497-307 <br>
                                                                                                                                    <strong>Name :</strong> B**I D****MO
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="row">
                                                                                                                                <!-- email  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Email</label>
                                                                                                                                        <input type="text" name="email" value="<?php echo $email ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- first name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">First Name</label>
                                                                                                                                        <input type="text" name="fname" value="<?php echo $fname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- last name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Last Name</label>
                                                                                                                                        <input type="text" name="lname" value="<?php echo $lname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Contact name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Contact</label>
                                                                                                                                        <input type="text" name="contact" value="<?php echo $contact ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- address name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Address</label>
                                                                                                                                        <input type="text" name="address" value="<?php echo $address ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Company/univ name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Company / University</label>
                                                                                                                                        <input type="text" name="company_univ" value="<?php echo $company_univ ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- ref num name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Reference Number </strong> </label>
                                                                                                                                        <input type="text" name="ref_num" placeholder="xxxx-xxx-xxxxxx" class="form-control" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Proof of payment  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Proof Of Payment</label>
                                                                                                                                        <input type="file" name="proof_pay" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                
                                                                                                                                <div class="pay">
                                                                                                                                    <button type="submit" name="submit_gcash" class="btn btn-primary"> 
                                                                                                                                        Complete 
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            
                                                                                                                <div class="tab-pane fade" id="sb" role="tabpanel" aria-labelledby="sb-tab">
                                                                                                                    <!-- form start  -->
                                                                                                                    <form method="post" enctype="multipart/form-data">
                                                                                                                        <div class="mt-2 mx-4">
                                                                                                                            <div class="mb-3">
                                                                                                                                <h6 style="color:#00008b;"><strong>Security Bank Details</strong></h6>
                                                                                                                                <div style="margin-left: 20px;">
                                                                                                                                    <strong>Account Number :</strong> 0000021660817 <br>
                                                                                                                                    <strong>Name :</strong> EROVOUTIKA ENTERPRISE
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="row">
                                                                                                                                <!-- email  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Email</label>
                                                                                                                                        <input type="text" name="email" value="<?php echo $email ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- first name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">First Name</label>
                                                                                                                                        <input type="text" name="fname" value="<?php echo $fname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- last name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Last Name</label>
                                                                                                                                        <input type="text" name="lname" value="<?php echo $lname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Contact name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Contact</label>
                                                                                                                                        <input type="text" name="contact" value="<?php echo $contact ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- address name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Address</label>
                                                                                                                                        <input type="text" name="address" value="<?php echo $address ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Company/univ name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Company / University</label>
                                                                                                                                        <input type="text" name="company_univ" value="<?php echo $company_univ ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- ref num name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Reference Number</label>
                                                                                                                                        <input type="text" name="ref_num" placeholder="xxxx-xxx-xxxxxx" class="form-control" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Proof of payment  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Proof Of Payment</label>
                                                                                                                                        <input type="file" name="proof_pay" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                
                                                                                                                                <div class="pay">
                                                                                                                                    <button type="submit" name="submit_sb" class="btn btn-primary"> 
                                                                                                                                        Complete 
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            
                                                                                                            </div>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- button and modal end here  -->
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </section>
                                    <!-- ======= End wdv1 Enrollment form Section ======= -->
                                <?php
                            }
                    }
                    else
                    if($type == 'wdv2')
                    {
                        ?>
                        <!-- ======= Start hero ======= -->
                        <section id="hero">
                            <div class="container">
                                <div class="flex justify-content-center">
                                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                        <div data-aos="zoom-out">
                                            <h1 class="text-center text-lg-center">
                                                Enrollment <strong class="text-warning">Web Development</strong> <br>
                                                Advance HTML, CSS and JavaScript
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

                        <!-- check if user is already enrolled  -->
                        <?php
                            $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                            $stmt->bind_param('ss', $email, $type);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            // get approval 
                            $row = mysqli_fetch_assoc($res);

                            if($res->num_rows > 0)// The user is already enrolled 
                            {
                                $approval = $row['approval'];
                                
                                if($approval == 0)// Pending 
                                {
                                    ?>
                                        <script>
                                            location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=0";
                                        </script>
                                    <?php
                                }
                                else
                                if($approval == 1)// Approved 
                                {
                                    ?>
                                        <script>
                                            location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=1";
                                        </script>
                                    <?php
                                }
                                else
                                if($approval == 2)// Rejected 
                                {
                                    ?>
                                        <script>
                                            location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=2";
                                        </script>
                                    <?php
                                }
                            }
                            else //if user is not yet enrolled
                            {
                                ?>
                                    <!-- ======= Start wdv1 Enrollment form Section ======= -->
                                    <section id="enroll_rna" class="enroll_rna">
                                        <div class="container">
                                            <div class="section-title" data-aos="fade-up">
                                                <h2 class="text-secondary">Enrollment</h2>
                                                <p style="color: #00008b;">Web Development Level 2</p>
                                            </div>
                                            <?php
                                                // post gcash and security bank buttons in form 
                                                if(isset($_POST['submit_gcash']))
                                                {
                                                    // users info 
                                                    $email = $_POST['email'];
                                                    $fname = $_POST['fname'];
                                                    $lname = $_POST['lname'];
                                                    $contact = $_POST['contact'];
                                                    $address = $_POST['address'];
                                                    $ref_num = $_POST['ref_num'];
                                                    $pay_type = 'Gcash';

                                                    // for proof image
                                                    $file_ext = strtolower(pathinfo($_FILES['proof_pay']['name'], PATHINFO_EXTENSION));
                                                    $file_name = 'proof-'. rand(1000000, 9000000) .'.'. $file_ext; 
                                                    $file_path = 'upload_proof_pay/'. $file_name;

                                                    if(!in_array($file_ext, array('jpg','jpeg','png')))
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Only JPG, JPEG, and PNG files are allowed.
                                                        </div>
                                                        ';     
                                                    }
                                                    if($_FILES['proof_pay']['size'] > 3000000)
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Maximum file size is 3MB.
                                                        </div>
                                                        ';
                                                    }
                                                    if(move_uploaded_file($_FILES['proof_pay']['tmp_name'], $file_path))
                                                    {
                                                        // insert into payments data 
                                                        $stmt_insert = $conn->prepare("
                                                        insert into 
                                                        payments (type, pay_type, ref_num, email, fname, lname, contact, address, proof_pay) 
                                                        values(?,?,?,?,?,?,?,?,?)
                                                        ");
                                                        $stmt_insert->bind_param('sssssssss', $type, $pay_type, $ref_num, $email, $fname, $lname, $contact, $address, $file_path);
                                                        $stmt_insert->execute();

                                                        // get the approval in db to put in url
                                                        $stmt_approval = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt_approval->bind_param('ss', $email, $type);
                                                        $stmt_approval->execute();
                                                        $res = $stmt_approval->get_result();
                                                        // get approval 
                                                        $row = mysqli_fetch_assoc($res);

                                                        if($res->num_rows > 0)
                                                        {
                                                            $approval = $row['approval'];

                                                            // Pending 
                                                            if($approval == 0)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Approved 
                                                            if($approval == 1)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Rejected 
                                                            if($approval == 2)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                        }
                                                        if($stmt_insert->affected_rows > 0)
                                                        {
                                                            ?>
                                                            <script>
                                                                location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=0";
                                                            </script>
                                                            <?php
                                                        }
                                                        else{
                                                            echo'
                                                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                Something went wrong.
                                                            </div>
                                                            ';
                                                        }
                                                        $stmt_insert->close();
                                                        $stmt_approval->close();

                                                    }

                                                    //SMTP settings
                                                    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                                                    $mail->isSMTP();
                                                    $mail->Host = 'smtp.gmail.com';
                                                    $mail->SMTPAuth = true;
                                                    
                                                    // erovoutika mails 
                                                    $mail->Username = 'erovoutikamails@gmail.com';
                                                    // erovoutika password form gmail 
                                                    $mail->Password = 'wycnwwgkkvdhieet';
                                                    $mail->SMTPSecure = 'tls';
                                                    $mail->Port = 587;

                                                    $mail->setFrom('erovoutikamails@gmail.com', 'Eira Payment');
                                                    // users email 
                                                    $mail->addAddress($email);
                                                    $mail->addAddress('erovoutikamails@gmail.com');
                                                    $mail->isHTML(true);
                                                    $mail->Subject = 'Payment Details';
                                                    $mail->Body = '
                                                    <div style="border: 5px dashed darkblue; border-radius: 1%; margin:0 20%; padding:5%;">
                                                        <h1 style="color:darkblue; font-weight: 600; text-align:center;">
                                                            Payment Details
                                                        </h1>
                                                        <h4>Email : '.$email.'</h4>
                                                        <h4>Name : '.$fname.' '.$lname.'</h4>
                                                        <h4>Contact : '.$contact.'</h4>
                                                        <h4>Address : '.$address.'</h4>
                                                        <h4>Reference Number : '.$ref_num.'</h4>
                                                        <h4>Payment Method : '.$pay_type.'</h4>
                                                    </div>
                                                    ';
                                                    $mail->AddAttachment($file_path);
                                                    $mail->send();
                                                }
                                                else
                                                if(isset($_POST['submit_sb']))
                                                {
                                                    // users info 
                                                    $email = $_POST['email'];
                                                    $fname = $_POST['fname'];
                                                    $lname = $_POST['lname'];
                                                    $contact = $_POST['contact'];
                                                    $address = $_POST['address'];
                                                    $ref_num = $_POST['ref_num'];
                                                    $pay_type = 'Security Bank';

                                                    // for proof image
                                                    $file_ext = strtolower(pathinfo($_FILES['proof_pay']['name'], PATHINFO_EXTENSION));
                                                    $file_name = 'proof-'. rand(1000000, 9000000) .'.'. $file_ext; 
                                                    $file_path = 'upload_proof_pay/'. $file_name;

                                                    if(!in_array($file_ext, array('jpg','jpeg','png')))
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Only JPG, JPEG, and PNG files are allowed.
                                                        </div>
                                                        ';     
                                                    }
                                                    if($_FILES['proof_pay']['size'] > 3000000)
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Maximum file size is 3MB.
                                                        </div>
                                                        ';
                                                    }
                                                    if(move_uploaded_file($_FILES['proof_pay']['tmp_name'], $file_path))
                                                    {
                                                        // insert into payments data 
                                                        $stmt_insert = $conn->prepare("
                                                        insert into 
                                                        payments (type, pay_type, ref_num, email, fname, lname, contact, address, proof_pay) 
                                                        values(?,?,?,?,?,?,?,?,?)
                                                        ");
                                                        $stmt_insert->bind_param('sssssssss', $type, $pay_type, $ref_num, $email, $fname, $lname, $contact, $address, $file_path);
                                                        $stmt_insert->execute();

                                                        // get the approval in db to put in url
                                                        $stmt_approval = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt_approval->bind_param('ss', $email, $type);
                                                        $stmt_approval->execute();
                                                        $res = $stmt_approval->get_result();
                                                        // get approval 
                                                        $row = mysqli_fetch_assoc($res);

                                                        if($res->num_rows > 0)
                                                        {
                                                            $approval = $row['approval'];

                                                            // Pending 
                                                            if($approval == 0)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Approved 
                                                            if($approval == 1)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Rejected 
                                                            if($approval == 2)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                        }
                                                        if($stmt_insert->affected_rows > 0)
                                                        {
                                                            ?>
                                                            <script>
                                                                location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=0";
                                                            </script>
                                                            <?php
                                                        }
                                                        else{
                                                            echo'
                                                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                Something went wrong.
                                                            </div>
                                                            ';
                                                        }
                                                        $stmt_insert->close();
                                                        $stmt_approval->close();

                                                    }

                                                    //SMTP settings
                                                    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                                                    $mail->isSMTP();
                                                    $mail->Host = 'smtp.gmail.com';
                                                    $mail->SMTPAuth = true;
                                                    
                                                    // erovoutika mails 
                                                    $mail->Username = 'erovoutikamails@gmail.com';
                                                    // erovoutika password form gmail 
                                                    $mail->Password = 'wycnwwgkkvdhieet';
                                                    $mail->SMTPSecure = 'tls';
                                                    $mail->Port = 587;

                                                    $mail->setFrom('erovoutikamails@gmail.com', 'Eira Payment');
                                                    // users email 
                                                    $mail->addAddress($email);
                                                    $mail->addAddress('erovoutikamails@gmail.com');
                                                    $mail->isHTML(true);
                                                    $mail->Subject = 'Payment Details';
                                                    $mail->Body = '
                                                    <div style="border: 5px dashed darkblue; border-radius: 1%; margin:0 20%; padding:4%;">
                                                        <h1 style="color:darkblue; font-weight: 600; text-align: center">
                                                            Payment Details
                                                        </h1>
                                                        <h4>Email : '.$email.'</h4>
                                                        <h4>Name : '.$fname.' '.$lname.'</h4>
                                                        <h4>Contact : '.$contact.'</h4>
                                                        <h4>Address : '.$address.'</h4>
                                                        <h4>Reference Number : '.$ref_num.'</h4>
                                                        <h4>Payment Method : '.$pay_type.'</h4>
                                                    </div>
                                                    ';
                                                    $mail->AddAttachment($file_path);
                                                    $mail->send();
                                                }
                                            ?>
                                            <div class="container-fluid">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 col-lg-11">
                                                        <div class="card card0 rounded-0">
                                                            <div class="row">
                                                                <div class="col-md-5 d-md-block d-none p-0 box">
                                                                    <div class="card rounded-0 border-0 card1" id="bill">
                                                                        <h3 id="heading1">Payment Summary</h3>
                                                                        <div class="row">
                                                                            <div class="col-lg-7 col-8 mt-4 line pl-4">
                                                                                <h2 class="head">Web Development</h2>
                                                                                <div class="data">Level 2</div>
                                                                            </div>
                                                                            <div class="col-lg-5 col-4 mt-4">
                                                                                <img src="assets/img/certificates/web_dev/web_dev2.png" width="200"
                                                                                    height="200">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 blue-bg">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <p class="data mb-1" id="total-label">Total Price
                                                                                        </p>
                                                                                        <h2 class="head2 mb-1" id="total">$17</h2>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h3 class="data2 mb-1 text-warning"
                                                                                            id="total-label">WDV - 102</h3>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-7 col-sm-12 p-0 box">
                                                                    <div class="card rounded-0 border-0 card2">
                                                                        <div class="form-card">
                                                                            <div class="radio-group">
                                                                                <!-- note  -->
                                                                                <div class="text-center bg-warning" style="padding:15px;">
                                                                                    <strong>Note:</strong>
                                                                                    Kindly please check your Information first before
                                                                                    proceeding to payment!
                                                                                    if you want to make changes please proceed
                                                                                    <a href="edit_profile.php"
                                                                                        class="text-primary">here.</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <!-- email input  -->
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label label">Email</label>
                                                                                    <input type="text" name="email" value="<?php echo $email ?>"readonly>
                                                                                </div>
                                                                                <!-- First Name input  -->
                                                                                <div class="col-6">
                                                                                    <label class="form-label label">Full Name</label>
                                                                                    <input type="text" name="fname" value="<?php echo $fname .' '. $lname?>" readonly>
                                                                                </div>
                                                                                <!-- Contact input  -->
                                                                                <div class="col-12">
                                                                                    <label class="form-label label">Contact</label>
                                                                                    <input type="text" name="contact" value="<?php echo $contact ?>" readonly>
                                                                                </div>
                                                                                <!-- address input  -->
                                                                                <div class="col-12">
                                                                                    <label class="form-label label">Address</label>
                                                                                    <input type="text" name="address" value="<?php echo $address ?>" readonly>
                                                                                </div>
                                                                                <!-- Company_univ input  -->
                                                                                <div class="col-12">
                                                                                    <label class="form-label label">Company / University</label>
                                                                                    <input type="text" name="company_univ" value="<?php echo $company_univ ?>" readonly>
                                                                                </div>
                                                                                <div class="col-md-12">

                                                                                    <!-- button and modal start here  -->
                                                                                    <button type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#staticBackdrop">
                                                                                        <i class="fas fa-money-bill-wave"></i> &nbsp; Pay Now
                                                                                    </button>

                                                                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-body">
                                                                                                    <div class="text-right"><i class="fa fa-close close" data-dismiss="modal"></i></div>
                                                                                                    <div class="tabs mt-3">
                                                                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                                                            <li class="nav-item" role="presentation">
                                                                                                                <a class="nav-link active" id="gcash-tab" data-toggle="tab" href="#gcash" role="tab" aria-controls="gcash" aria-selected="true">
                                                                                                                    <img src="assets/img/enroll/gcash_logo.png" width="80">
                                                                                                                </a>
                                                                                                            </li>
                                                                                                            <li class="nav-item" role="presentation">
                                                                                                                <a class="nav-link" id="sb-tab" data-toggle="tab" href="#sb" role="tab" aria-controls="sb" aria-selected="false">
                                                                                                                    <img src="assets/img/enroll/securitybank-logo.png" width="80">
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                        
                                                                                                            <div class="tab-content" id="myTabContent">
                                                                                                            
                                                                                                                <div class="tab-pane fade show active" id="gcash" role="tabpanel" aria-labelledby="gcash-tab">
                                                                                                                    <!-- form start  -->
                                                                                                                    <form method="post" enctype="multipart/form-data">
                                                                                                                        <div class="mt-2 mx-4">
                                                                                                                            <div class="mb-3">
                                                                                                                                <h6 style="color:#00008b;"><strong>GCash Details</strong></h6>
                                                                                                                                <div style="margin-left: 20px;">
                                                                                                                                    <strong>Number :</strong> 0906-1497-307 <br>
                                                                                                                                    <strong>Name :</strong> B**I D****MO
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="row">
                                                                                                                                <!-- email  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Email</label>
                                                                                                                                        <input type="text" name="email" value="<?php echo $email ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- first name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">First Name</label>
                                                                                                                                        <input type="text" name="fname" value="<?php echo $fname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- last name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Last Name</label>
                                                                                                                                        <input type="text" name="lname" value="<?php echo $lname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Contact name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Contact</label>
                                                                                                                                        <input type="text" name="contact" value="<?php echo $contact ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- address name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Address</label>
                                                                                                                                        <input type="text" name="address" value="<?php echo $address ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Company/univ name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Company / University</label>
                                                                                                                                        <input type="text" name="company_univ" value="<?php echo $company_univ ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- ref num name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Reference Number </strong> </label>
                                                                                                                                        <input type="text" name="ref_num" placeholder="xxxx-xxx-xxxxxx" class="form-control" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Proof of payment  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Proof Of Payment</label>
                                                                                                                                        <input type="file" name="proof_pay" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                
                                                                                                                                <div class="pay">
                                                                                                                                    <button type="submit" name="submit_gcash" class="btn btn-primary"> 
                                                                                                                                        Complete 
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            
                                                                                                                <div class="tab-pane fade" id="sb" role="tabpanel" aria-labelledby="sb-tab">
                                                                                                                    <!-- form start  -->
                                                                                                                    <form method="post" enctype="multipart/form-data">
                                                                                                                        <div class="mt-2 mx-4">
                                                                                                                            <div class="mb-3">
                                                                                                                                <h6 style="color:#00008b;"><strong>Security Bank Details</strong></h6>
                                                                                                                                <div style="margin-left: 20px;">
                                                                                                                                    <strong>Account Number :</strong> 0000021660817 <br>
                                                                                                                                    <strong>Name :</strong> EROVOUTIKA ENTERPRISE
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="row">
                                                                                                                                <!-- email  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Email</label>
                                                                                                                                        <input type="text" name="email" value="<?php echo $email ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- first name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">First Name</label>
                                                                                                                                        <input type="text" name="fname" value="<?php echo $fname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- last name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Last Name</label>
                                                                                                                                        <input type="text" name="lname" value="<?php echo $lname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Contact name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Contact</label>
                                                                                                                                        <input type="text" name="contact" value="<?php echo $contact ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- address name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Address</label>
                                                                                                                                        <input type="text" name="address" value="<?php echo $address ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Company/univ name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Company / University</label>
                                                                                                                                        <input type="text" name="company_univ" value="<?php echo $company_univ ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- ref num name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Reference Number</label>
                                                                                                                                        <input type="text" name="ref_num" placeholder="xxxx-xxx-xxxxxx" class="form-control" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Proof of payment  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Proof Of Payment</label>
                                                                                                                                        <input type="file" name="proof_pay" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                
                                                                                                                                <div class="pay">
                                                                                                                                    <button type="submit" name="submit_sb" class="btn btn-primary"> 
                                                                                                                                        Complete 
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            
                                                                                                            </div>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- button and modal end here  -->
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </section>
                                    <!-- ======= End wdv1 Enrollment form Section ======= -->
                                <?php
                            }
                    }
                    else
                    if($type == 'wdv3')
                    {
                        ?>
                        <!-- ======= Start hero ======= -->
                        <section id="hero">
                            <div class="container">
                                <div class="flex justify-content-center">
                                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                        <div data-aos="zoom-out">
                                            <h1 class="text-center text-lg-center">
                                                Enrollment <strong class="text-warning">Web Development</strong> <br>
                                                CSS Frameworks
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

                        <!-- check if user is already enrolled  -->
                        <?php
                            $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                            $stmt->bind_param('ss', $email, $type);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            // get approval 
                            $row = mysqli_fetch_assoc($res);

                            if($res->num_rows > 0)// The user is already enrolled 
                            {
                                $approval = $row['approval'];
                                
                                if($approval == 0)// Pending 
                                {
                                    ?>
                                        <script>
                                            location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=0";
                                        </script>
                                    <?php
                                }
                                else
                                if($approval == 1)// Approved 
                                {
                                    ?>
                                        <script>
                                            location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=1";
                                        </script>
                                    <?php
                                }
                                else
                                if($approval == 2)// Rejected 
                                {
                                    ?>
                                        <script>
                                            location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=2";
                                        </script>
                                    <?php
                                }
                            }
                            else //if user is not yet enrolled
                            {
                                ?>
                                    <!-- ======= Start wdv1 Enrollment form Section ======= -->
                                    <section id="enroll_rna" class="enroll_rna">
                                        <div class="container">
                                            <div class="section-title" data-aos="fade-up">
                                                <h2 class="text-secondary">Enrollment</h2>
                                                <p style="color: #00008b;">Web Development Level 3</p>
                                            </div>
                                            <?php
                                                // post gcash and security bank buttons in form 
                                                if(isset($_POST['submit_gcash']))
                                                {
                                                    // users info 
                                                    $email = $_POST['email'];
                                                    $fname = $_POST['fname'];
                                                    $lname = $_POST['lname'];
                                                    $contact = $_POST['contact'];
                                                    $address = $_POST['address'];
                                                    $ref_num = $_POST['ref_num'];
                                                    $pay_type = 'Gcash';

                                                    // for proof image
                                                    $file_ext = strtolower(pathinfo($_FILES['proof_pay']['name'], PATHINFO_EXTENSION));
                                                    $file_name = 'proof-'. rand(1000000, 9000000) .'.'. $file_ext; 
                                                    $file_path = 'upload_proof_pay/'. $file_name;

                                                    if(!in_array($file_ext, array('jpg','jpeg','png')))
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Only JPG, JPEG, and PNG files are allowed.
                                                        </div>
                                                        ';     
                                                    }
                                                    if($_FILES['proof_pay']['size'] > 3000000)
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Maximum file size is 3MB.
                                                        </div>
                                                        ';
                                                    }
                                                    if(move_uploaded_file($_FILES['proof_pay']['tmp_name'], $file_path))
                                                    {
                                                        // insert into payments data 
                                                        $stmt_insert = $conn->prepare("
                                                        insert into 
                                                        payments (type, pay_type, ref_num, email, fname, lname, contact, address, proof_pay) 
                                                        values(?,?,?,?,?,?,?,?,?)
                                                        ");
                                                        $stmt_insert->bind_param('sssssssss', $type, $pay_type, $ref_num, $email, $fname, $lname, $contact, $address, $file_path);
                                                        $stmt_insert->execute();

                                                        // get the approval in db to put in url
                                                        $stmt_approval = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt_approval->bind_param('ss', $email, $type);
                                                        $stmt_approval->execute();
                                                        $res = $stmt_approval->get_result();
                                                        // get approval 
                                                        $row = mysqli_fetch_assoc($res);

                                                        if($res->num_rows > 0)
                                                        {
                                                            $approval = $row['approval'];

                                                            // Pending 
                                                            if($approval == 0)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Approved 
                                                            if($approval == 1)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Rejected 
                                                            if($approval == 2)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                        }
                                                        if($stmt_insert->affected_rows > 0)
                                                        {
                                                            ?>
                                                            <script>
                                                                location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=0";
                                                            </script>
                                                            <?php
                                                        }
                                                        else{
                                                            echo'
                                                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                Something went wrong.
                                                            </div>
                                                            ';
                                                        }
                                                        $stmt_insert->close();
                                                        $stmt_approval->close();

                                                    }

                                                    //SMTP settings
                                                    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                                                    $mail->isSMTP();
                                                    $mail->Host = 'smtp.gmail.com';
                                                    $mail->SMTPAuth = true;
                                                    
                                                    // erovoutika mails 
                                                    $mail->Username = 'erovoutikamails@gmail.com';
                                                    // erovoutika password form gmail 
                                                    $mail->Password = 'wycnwwgkkvdhieet';
                                                    $mail->SMTPSecure = 'tls';
                                                    $mail->Port = 587;

                                                    $mail->setFrom('erovoutikamails@gmail.com', 'Eira Payment');
                                                    // users email 
                                                    $mail->addAddress($email);
                                                    $mail->addAddress('erovoutikamails@gmail.com');
                                                    $mail->isHTML(true);
                                                    $mail->Subject = 'Payment Details';
                                                    $mail->Body = '
                                                    <div style="border: 5px dashed darkblue; border-radius: 1%; margin:0 20%; padding:5%;">
                                                        <h1 style="color:darkblue; font-weight: 600; text-align:center;">
                                                            Payment Details
                                                        </h1>
                                                        <h4>Email : '.$email.'</h4>
                                                        <h4>Name : '.$fname.' '.$lname.'</h4>
                                                        <h4>Contact : '.$contact.'</h4>
                                                        <h4>Address : '.$address.'</h4>
                                                        <h4>Reference Number : '.$ref_num.'</h4>
                                                        <h4>Payment Method : '.$pay_type.'</h4>
                                                    </div>
                                                    ';
                                                    $mail->AddAttachment($file_path);
                                                    $mail->send();
                                                }
                                                else
                                                if(isset($_POST['submit_sb']))
                                                {
                                                    // users info 
                                                    $email = $_POST['email'];
                                                    $fname = $_POST['fname'];
                                                    $lname = $_POST['lname'];
                                                    $contact = $_POST['contact'];
                                                    $address = $_POST['address'];
                                                    $ref_num = $_POST['ref_num'];
                                                    $pay_type = 'Security Bank';

                                                    // for proof image
                                                    $file_ext = strtolower(pathinfo($_FILES['proof_pay']['name'], PATHINFO_EXTENSION));
                                                    $file_name = 'proof-'. rand(1000000, 9000000) .'.'. $file_ext; 
                                                    $file_path = 'upload_proof_pay/'. $file_name;

                                                    if(!in_array($file_ext, array('jpg','jpeg','png')))
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Only JPG, JPEG, and PNG files are allowed.
                                                        </div>
                                                        ';     
                                                    }
                                                    if($_FILES['proof_pay']['size'] > 3000000)
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Maximum file size is 3MB.
                                                        </div>
                                                        ';
                                                    }
                                                    if(move_uploaded_file($_FILES['proof_pay']['tmp_name'], $file_path))
                                                    {
                                                        // insert into payments data 
                                                        $stmt_insert = $conn->prepare("
                                                        insert into 
                                                        payments (type, pay_type, ref_num, email, fname, lname, contact, address, proof_pay) 
                                                        values(?,?,?,?,?,?,?,?,?)
                                                        ");
                                                        $stmt_insert->bind_param('sssssssss', $type, $pay_type, $ref_num, $email, $fname, $lname, $contact, $address, $file_path);
                                                        $stmt_insert->execute();

                                                        // get the approval in db to put in url
                                                        $stmt_approval = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt_approval->bind_param('ss', $email, $type);
                                                        $stmt_approval->execute();
                                                        $res = $stmt_approval->get_result();
                                                        // get approval 
                                                        $row = mysqli_fetch_assoc($res);

                                                        if($res->num_rows > 0)
                                                        {
                                                            $approval = $row['approval'];

                                                            // Pending 
                                                            if($approval == 0)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Approved 
                                                            if($approval == 1)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Rejected 
                                                            if($approval == 2)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                        }
                                                        if($stmt_insert->affected_rows > 0)
                                                        {
                                                            ?>
                                                            <script>
                                                                location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=0";
                                                            </script>
                                                            <?php
                                                        }
                                                        else{
                                                            echo'
                                                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                Something went wrong.
                                                            </div>
                                                            ';
                                                        }
                                                        $stmt_insert->close();
                                                        $stmt_approval->close();

                                                    }

                                                    //SMTP settings
                                                    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                                                    $mail->isSMTP();
                                                    $mail->Host = 'smtp.gmail.com';
                                                    $mail->SMTPAuth = true;
                                                    
                                                    // erovoutika mails 
                                                    $mail->Username = 'erovoutikamails@gmail.com';
                                                    // erovoutika password form gmail 
                                                    $mail->Password = 'wycnwwgkkvdhieet';
                                                    $mail->SMTPSecure = 'tls';
                                                    $mail->Port = 587;

                                                    $mail->setFrom('erovoutikamails@gmail.com', 'Eira Payment');
                                                    // users email 
                                                    $mail->addAddress($email);
                                                    $mail->addAddress('erovoutikamails@gmail.com');
                                                    $mail->isHTML(true);
                                                    $mail->Subject = 'Payment Details';
                                                    $mail->Body = '
                                                    <div style="border: 5px dashed darkblue; border-radius: 1%; margin:0 20%; padding:4%;">
                                                        <h1 style="color:darkblue; font-weight: 600; text-align: center">
                                                            Payment Details
                                                        </h1>
                                                        <h4>Email : '.$email.'</h4>
                                                        <h4>Name : '.$fname.' '.$lname.'</h4>
                                                        <h4>Contact : '.$contact.'</h4>
                                                        <h4>Address : '.$address.'</h4>
                                                        <h4>Reference Number : '.$ref_num.'</h4>
                                                        <h4>Payment Method : '.$pay_type.'</h4>
                                                    </div>
                                                    ';
                                                    $mail->AddAttachment($file_path);
                                                    $mail->send();
                                                }
                                            ?>
                                            <div class="container-fluid">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 col-lg-11">
                                                        <div class="card card0 rounded-0">
                                                            <div class="row">
                                                                <div class="col-md-5 d-md-block d-none p-0 box">
                                                                    <div class="card rounded-0 border-0 card1" id="bill">
                                                                        <h3 id="heading1">Payment Summary</h3>
                                                                        <div class="row">
                                                                            <div class="col-lg-7 col-8 mt-4 line pl-4">
                                                                                <h2 class="head">Web Development</h2>
                                                                                <div class="data">Level 3</div>
                                                                            </div>
                                                                            <div class="col-lg-5 col-4 mt-4">
                                                                                <img src="assets/img/certificates/web_dev/web_dev3.png" width="200"
                                                                                    height="200">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 blue-bg">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <p class="data mb-1" id="total-label">Total Price
                                                                                        </p>
                                                                                        <h2 class="head2 mb-1" id="total">$17</h2>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h3 class="data2 mb-1 text-warning"
                                                                                            id="total-label">WDV - 103</h3>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-7 col-sm-12 p-0 box">
                                                                    <div class="card rounded-0 border-0 card2">
                                                                        <div class="form-card">
                                                                            <div class="radio-group">
                                                                                <!-- note  -->
                                                                                <div class="text-center bg-warning" style="padding:15px;">
                                                                                    <strong>Note:</strong>
                                                                                    Kindly please check your Information first before
                                                                                    proceeding to payment!
                                                                                    if you want to make changes please proceed
                                                                                    <a href="edit_profile.php"
                                                                                        class="text-primary">here.</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <!-- email input  -->
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label label">Email</label>
                                                                                    <input type="text" name="email" value="<?php echo $email ?>"readonly>
                                                                                </div>
                                                                                <!-- First Name input  -->
                                                                                <div class="col-6">
                                                                                    <label class="form-label label">Full Name</label>
                                                                                    <input type="text" name="fname" value="<?php echo $fname .' '. $lname?>" readonly>
                                                                                </div>
                                                                                <!-- Contact input  -->
                                                                                <div class="col-12">
                                                                                    <label class="form-label label">Contact</label>
                                                                                    <input type="text" name="contact" value="<?php echo $contact ?>" readonly>
                                                                                </div>
                                                                                <!-- address input  -->
                                                                                <div class="col-12">
                                                                                    <label class="form-label label">Address</label>
                                                                                    <input type="text" name="address" value="<?php echo $address ?>" readonly>
                                                                                </div>
                                                                                <!-- Company_univ input  -->
                                                                                <div class="col-12">
                                                                                    <label class="form-label label">Company / University</label>
                                                                                    <input type="text" name="company_univ" value="<?php echo $company_univ ?>" readonly>
                                                                                </div>
                                                                                <div class="col-md-12">

                                                                                    <!-- button and modal start here  -->
                                                                                    <button type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#staticBackdrop">
                                                                                        <i class="fas fa-money-bill-wave"></i> &nbsp; Pay Now
                                                                                    </button>

                                                                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-body">
                                                                                                    <div class="text-right"><i class="fa fa-close close" data-dismiss="modal"></i></div>
                                                                                                    <div class="tabs mt-3">
                                                                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                                                            <li class="nav-item" role="presentation">
                                                                                                                <a class="nav-link active" id="gcash-tab" data-toggle="tab" href="#gcash" role="tab" aria-controls="gcash" aria-selected="true">
                                                                                                                    <img src="assets/img/enroll/gcash_logo.png" width="80">
                                                                                                                </a>
                                                                                                            </li>
                                                                                                            <li class="nav-item" role="presentation">
                                                                                                                <a class="nav-link" id="sb-tab" data-toggle="tab" href="#sb" role="tab" aria-controls="sb" aria-selected="false">
                                                                                                                    <img src="assets/img/enroll/securitybank-logo.png" width="80">
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                        
                                                                                                            <div class="tab-content" id="myTabContent">
                                                                                                            
                                                                                                                <div class="tab-pane fade show active" id="gcash" role="tabpanel" aria-labelledby="gcash-tab">
                                                                                                                    <!-- form start  -->
                                                                                                                    <form method="post" enctype="multipart/form-data">
                                                                                                                        <div class="mt-2 mx-4">
                                                                                                                            <div class="mb-3">
                                                                                                                                <h6 style="color:#00008b;"><strong>GCash Details</strong></h6>
                                                                                                                                <div style="margin-left: 20px;">
                                                                                                                                    <strong>Number :</strong> 0906-1497-307 <br>
                                                                                                                                    <strong>Name :</strong> B**I D****MO
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="row">
                                                                                                                                <!-- email  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Email</label>
                                                                                                                                        <input type="text" name="email" value="<?php echo $email ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- first name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">First Name</label>
                                                                                                                                        <input type="text" name="fname" value="<?php echo $fname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- last name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Last Name</label>
                                                                                                                                        <input type="text" name="lname" value="<?php echo $lname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Contact name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Contact</label>
                                                                                                                                        <input type="text" name="contact" value="<?php echo $contact ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- address name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Address</label>
                                                                                                                                        <input type="text" name="address" value="<?php echo $address ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Company/univ name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Company / University</label>
                                                                                                                                        <input type="text" name="company_univ" value="<?php echo $company_univ ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- ref num name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Reference Number </strong> </label>
                                                                                                                                        <input type="text" name="ref_num" placeholder="xxxx-xxx-xxxxxx" class="form-control" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Proof of payment  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Proof Of Payment</label>
                                                                                                                                        <input type="file" name="proof_pay" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                
                                                                                                                                <div class="pay">
                                                                                                                                    <button type="submit" name="submit_gcash" class="btn btn-primary"> 
                                                                                                                                        Complete 
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            
                                                                                                                <div class="tab-pane fade" id="sb" role="tabpanel" aria-labelledby="sb-tab">
                                                                                                                    <!-- form start  -->
                                                                                                                    <form method="post" enctype="multipart/form-data">
                                                                                                                        <div class="mt-2 mx-4">
                                                                                                                            <div class="mb-3">
                                                                                                                                <h6 style="color:#00008b;"><strong>Security Bank Details</strong></h6>
                                                                                                                                <div style="margin-left: 20px;">
                                                                                                                                    <strong>Account Number :</strong> 0000021660817 <br>
                                                                                                                                    <strong>Name :</strong> EROVOUTIKA ENTERPRISE
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="row">
                                                                                                                                <!-- email  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Email</label>
                                                                                                                                        <input type="text" name="email" value="<?php echo $email ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- first name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">First Name</label>
                                                                                                                                        <input type="text" name="fname" value="<?php echo $fname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- last name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Last Name</label>
                                                                                                                                        <input type="text" name="lname" value="<?php echo $lname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Contact name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Contact</label>
                                                                                                                                        <input type="text" name="contact" value="<?php echo $contact ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- address name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Address</label>
                                                                                                                                        <input type="text" name="address" value="<?php echo $address ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Company/univ name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Company / University</label>
                                                                                                                                        <input type="text" name="company_univ" value="<?php echo $company_univ ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- ref num name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Reference Number</label>
                                                                                                                                        <input type="text" name="ref_num" placeholder="xxxx-xxx-xxxxxx" class="form-control" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Proof of payment  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Proof Of Payment</label>
                                                                                                                                        <input type="file" name="proof_pay" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                
                                                                                                                                <div class="pay">
                                                                                                                                    <button type="submit" name="submit_sb" class="btn btn-primary"> 
                                                                                                                                        Complete 
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            
                                                                                                            </div>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- button and modal end here  -->
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </section>
                                    <!-- ======= End wdv1 Enrollment form Section ======= -->
                                <?php
                            }
                    }
                    else
                    if($type == 'wdv4')
                    {
                        ?>
                        <!-- ======= Start hero ======= -->
                        <section id="hero">
                            <div class="container">
                                <div class="flex justify-content-center">
                                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                        <div data-aos="zoom-out">
                                            <h1 class="text-center text-lg-center">
                                                Enrollment <strong class="text-warning">Web Development</strong> <br>
                                                Basic PHP/ MySQL
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

                        <!-- check if user is already enrolled  -->
                        <?php
                            $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                            $stmt->bind_param('ss', $email, $type);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            // get approval 
                            $row = mysqli_fetch_assoc($res);

                            if($res->num_rows > 0)// The user is already enrolled 
                            {
                                $approval = $row['approval'];
                                
                                if($approval == 0)// Pending 
                                {
                                    ?>
                                        <script>
                                            location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=0";
                                        </script>
                                    <?php
                                }
                                else
                                if($approval == 1)// Approved 
                                {
                                    ?>
                                        <script>
                                            location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=1";
                                        </script>
                                    <?php
                                }
                                else
                                if($approval == 2)// Rejected 
                                {
                                    ?>
                                        <script>
                                            location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=2";
                                        </script>
                                    <?php
                                }
                            }
                            else //if user is not yet enrolled
                            {
                                ?>
                                    <!-- ======= Start wdv1 Enrollment form Section ======= -->
                                    <section id="enroll_rna" class="enroll_rna">
                                        <div class="container">
                                            <div class="section-title" data-aos="fade-up">
                                                <h2 class="text-secondary">Enrollment</h2>
                                                <p style="color: #00008b;">Web Development Level 4</p>
                                            </div>
                                            <?php
                                                // post gcash and security bank buttons in form 
                                                if(isset($_POST['submit_gcash']))
                                                {
                                                    // users info 
                                                    $email = $_POST['email'];
                                                    $fname = $_POST['fname'];
                                                    $lname = $_POST['lname'];
                                                    $contact = $_POST['contact'];
                                                    $address = $_POST['address'];
                                                    $ref_num = $_POST['ref_num'];
                                                    $pay_type = 'Gcash';

                                                    // for proof image
                                                    $file_ext = strtolower(pathinfo($_FILES['proof_pay']['name'], PATHINFO_EXTENSION));
                                                    $file_name = 'proof-'. rand(1000000, 9000000) .'.'. $file_ext; 
                                                    $file_path = 'upload_proof_pay/'. $file_name;

                                                    if(!in_array($file_ext, array('jpg','jpeg','png')))
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Only JPG, JPEG, and PNG files are allowed.
                                                        </div>
                                                        ';     
                                                    }
                                                    if($_FILES['proof_pay']['size'] > 3000000)
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Maximum file size is 3MB.
                                                        </div>
                                                        ';
                                                    }
                                                    if(move_uploaded_file($_FILES['proof_pay']['tmp_name'], $file_path))
                                                    {
                                                        // insert into payments data 
                                                        $stmt_insert = $conn->prepare("
                                                        insert into 
                                                        payments (type, pay_type, ref_num, email, fname, lname, contact, address, proof_pay) 
                                                        values(?,?,?,?,?,?,?,?,?)
                                                        ");
                                                        $stmt_insert->bind_param('sssssssss', $type, $pay_type, $ref_num, $email, $fname, $lname, $contact, $address, $file_path);
                                                        $stmt_insert->execute();

                                                        // get the approval in db to put in url
                                                        $stmt_approval = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt_approval->bind_param('ss', $email, $type);
                                                        $stmt_approval->execute();
                                                        $res = $stmt_approval->get_result();
                                                        // get approval 
                                                        $row = mysqli_fetch_assoc($res);

                                                        if($res->num_rows > 0)
                                                        {
                                                            $approval = $row['approval'];

                                                            // Pending 
                                                            if($approval == 0)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Approved 
                                                            if($approval == 1)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Rejected 
                                                            if($approval == 2)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                        }
                                                        if($stmt_insert->affected_rows > 0)
                                                        {
                                                            ?>
                                                            <script>
                                                                location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=0";
                                                            </script>
                                                            <?php
                                                        }
                                                        else{
                                                            echo'
                                                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                Something went wrong.
                                                            </div>
                                                            ';
                                                        }
                                                        $stmt_insert->close();
                                                        $stmt_approval->close();

                                                    }

                                                    //SMTP settings
                                                    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                                                    $mail->isSMTP();
                                                    $mail->Host = 'smtp.gmail.com';
                                                    $mail->SMTPAuth = true;
                                                    
                                                    // erovoutika mails 
                                                    $mail->Username = 'erovoutikamails@gmail.com';
                                                    // erovoutika password form gmail 
                                                    $mail->Password = 'wycnwwgkkvdhieet';
                                                    $mail->SMTPSecure = 'tls';
                                                    $mail->Port = 587;

                                                    $mail->setFrom('erovoutikamails@gmail.com', 'Eira Payment');
                                                    // users email 
                                                    $mail->addAddress($email);
                                                    $mail->addAddress('erovoutikamails@gmail.com');
                                                    $mail->isHTML(true);
                                                    $mail->Subject = 'Payment Details';
                                                    $mail->Body = '
                                                    <div style="border: 5px dashed darkblue; border-radius: 1%; margin:0 20%; padding:5%;">
                                                        <h1 style="color:darkblue; font-weight: 600; text-align:center;">
                                                            Payment Details
                                                        </h1>
                                                        <h4>Email : '.$email.'</h4>
                                                        <h4>Name : '.$fname.' '.$lname.'</h4>
                                                        <h4>Contact : '.$contact.'</h4>
                                                        <h4>Address : '.$address.'</h4>
                                                        <h4>Reference Number : '.$ref_num.'</h4>
                                                        <h4>Payment Method : '.$pay_type.'</h4>
                                                    </div>
                                                    ';
                                                    $mail->AddAttachment($file_path);
                                                    $mail->send();
                                                }
                                                else
                                                if(isset($_POST['submit_sb']))
                                                {
                                                    // users info 
                                                    $email = $_POST['email'];
                                                    $fname = $_POST['fname'];
                                                    $lname = $_POST['lname'];
                                                    $contact = $_POST['contact'];
                                                    $address = $_POST['address'];
                                                    $ref_num = $_POST['ref_num'];
                                                    $pay_type = 'Security Bank';

                                                    // for proof image
                                                    $file_ext = strtolower(pathinfo($_FILES['proof_pay']['name'], PATHINFO_EXTENSION));
                                                    $file_name = 'proof-'. rand(1000000, 9000000) .'.'. $file_ext; 
                                                    $file_path = 'upload_proof_pay/'. $file_name;

                                                    if(!in_array($file_ext, array('jpg','jpeg','png')))
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Only JPG, JPEG, and PNG files are allowed.
                                                        </div>
                                                        ';     
                                                    }
                                                    if($_FILES['proof_pay']['size'] > 3000000)
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Maximum file size is 3MB.
                                                        </div>
                                                        ';
                                                    }
                                                    if(move_uploaded_file($_FILES['proof_pay']['tmp_name'], $file_path))
                                                    {
                                                        // insert into payments data 
                                                        $stmt_insert = $conn->prepare("
                                                        insert into 
                                                        payments (type, pay_type, ref_num, email, fname, lname, contact, address, proof_pay) 
                                                        values(?,?,?,?,?,?,?,?,?)
                                                        ");
                                                        $stmt_insert->bind_param('sssssssss', $type, $pay_type, $ref_num, $email, $fname, $lname, $contact, $address, $file_path);
                                                        $stmt_insert->execute();

                                                        // get the approval in db to put in url
                                                        $stmt_approval = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt_approval->bind_param('ss', $email, $type);
                                                        $stmt_approval->execute();
                                                        $res = $stmt_approval->get_result();
                                                        // get approval 
                                                        $row = mysqli_fetch_assoc($res);

                                                        if($res->num_rows > 0)
                                                        {
                                                            $approval = $row['approval'];

                                                            // Pending 
                                                            if($approval == 0)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Approved 
                                                            if($approval == 1)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Rejected 
                                                            if($approval == 2)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                        }
                                                        if($stmt_insert->affected_rows > 0)
                                                        {
                                                            ?>
                                                            <script>
                                                                location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=0";
                                                            </script>
                                                            <?php
                                                        }
                                                        else{
                                                            echo'
                                                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                Something went wrong.
                                                            </div>
                                                            ';
                                                        }
                                                        $stmt_insert->close();
                                                        $stmt_approval->close();

                                                    }

                                                    //SMTP settings
                                                    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                                                    $mail->isSMTP();
                                                    $mail->Host = 'smtp.gmail.com';
                                                    $mail->SMTPAuth = true;
                                                    
                                                    // erovoutika mails 
                                                    $mail->Username = 'erovoutikamails@gmail.com';
                                                    // erovoutika password form gmail 
                                                    $mail->Password = 'wycnwwgkkvdhieet';
                                                    $mail->SMTPSecure = 'tls';
                                                    $mail->Port = 587;

                                                    $mail->setFrom('erovoutikamails@gmail.com', 'Eira Payment');
                                                    // users email 
                                                    $mail->addAddress($email);
                                                    $mail->addAddress('erovoutikamails@gmail.com');
                                                    $mail->isHTML(true);
                                                    $mail->Subject = 'Payment Details';
                                                    $mail->Body = '
                                                    <div style="border: 5px dashed darkblue; border-radius: 1%; margin:0 20%; padding:4%;">
                                                        <h1 style="color:darkblue; font-weight: 600; text-align: center">
                                                            Payment Details
                                                        </h1>
                                                        <h4>Email : '.$email.'</h4>
                                                        <h4>Name : '.$fname.' '.$lname.'</h4>
                                                        <h4>Contact : '.$contact.'</h4>
                                                        <h4>Address : '.$address.'</h4>
                                                        <h4>Reference Number : '.$ref_num.'</h4>
                                                        <h4>Payment Method : '.$pay_type.'</h4>
                                                    </div>
                                                    ';
                                                    $mail->AddAttachment($file_path);
                                                    $mail->send();
                                                }
                                            ?>
                                            <div class="container-fluid">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 col-lg-11">
                                                        <div class="card card0 rounded-0">
                                                            <div class="row">
                                                                <div class="col-md-5 d-md-block d-none p-0 box">
                                                                    <div class="card rounded-0 border-0 card1" id="bill">
                                                                        <h3 id="heading1">Payment Summary</h3>
                                                                        <div class="row">
                                                                            <div class="col-lg-7 col-8 mt-4 line pl-4">
                                                                                <h2 class="head">Web Development</h2>
                                                                                <div class="data">Level 4</div>
                                                                            </div>
                                                                            <div class="col-lg-5 col-4 mt-4">
                                                                                <img src="assets/img/certificates/web_dev/web_dev4.png" width="200"
                                                                                    height="200">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 blue-bg">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <p class="data mb-1" id="total-label">Total Price
                                                                                        </p>
                                                                                        <h2 class="head2 mb-1" id="total">$17</h2>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h3 class="data2 mb-1 text-warning"
                                                                                            id="total-label">WDV - 104</h3>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-7 col-sm-12 p-0 box">
                                                                    <div class="card rounded-0 border-0 card2">
                                                                        <div class="form-card">
                                                                            <div class="radio-group">
                                                                                <!-- note  -->
                                                                                <div class="text-center bg-warning" style="padding:15px;">
                                                                                    <strong>Note:</strong>
                                                                                    Kindly please check your Information first before
                                                                                    proceeding to payment!
                                                                                    if you want to make changes please proceed
                                                                                    <a href="edit_profile.php"
                                                                                        class="text-primary">here.</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <!-- email input  -->
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label label">Email</label>
                                                                                    <input type="text" name="email" value="<?php echo $email ?>"readonly>
                                                                                </div>
                                                                                <!-- First Name input  -->
                                                                                <div class="col-6">
                                                                                    <label class="form-label label">Full Name</label>
                                                                                    <input type="text" name="fname" value="<?php echo $fname .' '. $lname?>" readonly>
                                                                                </div>
                                                                                <!-- Contact input  -->
                                                                                <div class="col-12">
                                                                                    <label class="form-label label">Contact</label>
                                                                                    <input type="text" name="contact" value="<?php echo $contact ?>" readonly>
                                                                                </div>
                                                                                <!-- address input  -->
                                                                                <div class="col-12">
                                                                                    <label class="form-label label">Address</label>
                                                                                    <input type="text" name="address" value="<?php echo $address ?>" readonly>
                                                                                </div>
                                                                                <!-- Company_univ input  -->
                                                                                <div class="col-12">
                                                                                    <label class="form-label label">Company / University</label>
                                                                                    <input type="text" name="company_univ" value="<?php echo $company_univ ?>" readonly>
                                                                                </div>
                                                                                <div class="col-md-12">

                                                                                    <!-- button and modal start here  -->
                                                                                    <button type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#staticBackdrop">
                                                                                        <i class="fas fa-money-bill-wave"></i> &nbsp; Pay Now
                                                                                    </button>

                                                                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-body">
                                                                                                    <div class="text-right"><i class="fa fa-close close" data-dismiss="modal"></i></div>
                                                                                                    <div class="tabs mt-3">
                                                                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                                                            <li class="nav-item" role="presentation">
                                                                                                                <a class="nav-link active" id="gcash-tab" data-toggle="tab" href="#gcash" role="tab" aria-controls="gcash" aria-selected="true">
                                                                                                                    <img src="assets/img/enroll/gcash_logo.png" width="80">
                                                                                                                </a>
                                                                                                            </li>
                                                                                                            <li class="nav-item" role="presentation">
                                                                                                                <a class="nav-link" id="sb-tab" data-toggle="tab" href="#sb" role="tab" aria-controls="sb" aria-selected="false">
                                                                                                                    <img src="assets/img/enroll/securitybank-logo.png" width="80">
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                        
                                                                                                            <div class="tab-content" id="myTabContent">
                                                                                                            
                                                                                                                <div class="tab-pane fade show active" id="gcash" role="tabpanel" aria-labelledby="gcash-tab">
                                                                                                                    <!-- form start  -->
                                                                                                                    <form method="post" enctype="multipart/form-data">
                                                                                                                        <div class="mt-2 mx-4">
                                                                                                                            <div class="mb-3">
                                                                                                                                <h6 style="color:#00008b;"><strong>GCash Details</strong></h6>
                                                                                                                                <div style="margin-left: 20px;">
                                                                                                                                    <strong>Number :</strong> 0906-1497-307 <br>
                                                                                                                                    <strong>Name :</strong> B**I D****MO
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="row">
                                                                                                                                <!-- email  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Email</label>
                                                                                                                                        <input type="text" name="email" value="<?php echo $email ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- first name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">First Name</label>
                                                                                                                                        <input type="text" name="fname" value="<?php echo $fname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- last name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Last Name</label>
                                                                                                                                        <input type="text" name="lname" value="<?php echo $lname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Contact name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Contact</label>
                                                                                                                                        <input type="text" name="contact" value="<?php echo $contact ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- address name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Address</label>
                                                                                                                                        <input type="text" name="address" value="<?php echo $address ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Company/univ name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Company / University</label>
                                                                                                                                        <input type="text" name="company_univ" value="<?php echo $company_univ ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- ref num name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Reference Number </strong> </label>
                                                                                                                                        <input type="text" name="ref_num" placeholder="xxxx-xxx-xxxxxx" class="form-control" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Proof of payment  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Proof Of Payment</label>
                                                                                                                                        <input type="file" name="proof_pay" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                
                                                                                                                                <div class="pay">
                                                                                                                                    <button type="submit" name="submit_gcash" class="btn btn-primary"> 
                                                                                                                                        Complete 
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            
                                                                                                                <div class="tab-pane fade" id="sb" role="tabpanel" aria-labelledby="sb-tab">
                                                                                                                    <!-- form start  -->
                                                                                                                    <form method="post" enctype="multipart/form-data">
                                                                                                                        <div class="mt-2 mx-4">
                                                                                                                            <div class="mb-3">
                                                                                                                                <h6 style="color:#00008b;"><strong>Security Bank Details</strong></h6>
                                                                                                                                <div style="margin-left: 20px;">
                                                                                                                                    <strong>Account Number :</strong> 0000021660817 <br>
                                                                                                                                    <strong>Name :</strong> EROVOUTIKA ENTERPRISE
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="row">
                                                                                                                                <!-- email  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Email</label>
                                                                                                                                        <input type="text" name="email" value="<?php echo $email ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- first name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">First Name</label>
                                                                                                                                        <input type="text" name="fname" value="<?php echo $fname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- last name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Last Name</label>
                                                                                                                                        <input type="text" name="lname" value="<?php echo $lname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Contact name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Contact</label>
                                                                                                                                        <input type="text" name="contact" value="<?php echo $contact ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- address name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Address</label>
                                                                                                                                        <input type="text" name="address" value="<?php echo $address ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Company/univ name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Company / University</label>
                                                                                                                                        <input type="text" name="company_univ" value="<?php echo $company_univ ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- ref num name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Reference Number</label>
                                                                                                                                        <input type="text" name="ref_num" placeholder="xxxx-xxx-xxxxxx" class="form-control" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Proof of payment  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Proof Of Payment</label>
                                                                                                                                        <input type="file" name="proof_pay" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                
                                                                                                                                <div class="pay">
                                                                                                                                    <button type="submit" name="submit_sb" class="btn btn-primary"> 
                                                                                                                                        Complete 
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            
                                                                                                            </div>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- button and modal end here  -->
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </section>
                                    <!-- ======= End wdv1 Enrollment form Section ======= -->
                                <?php
                            }
                    }
                    else
                    if($type == 'wdv5')
                    {
                        ?>
                        <!-- ======= Start hero ======= -->
                        <section id="hero">
                            <div class="container">
                                <div class="flex justify-content-center">
                                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                        <div data-aos="zoom-out">
                                            <h1 class="text-center text-lg-center">
                                                Enrollment <strong class="text-warning">Web Development</strong> <br>
                                                Advance PHP/ MySQL
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

                        <!-- check if user is already enrolled  -->
                        <?php
                            $stmt = $conn->prepare("select * from payments where email = ? and type = ?");
                            $stmt->bind_param('ss', $email, $type);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            // get approval 
                            $row = mysqli_fetch_assoc($res);

                            if($res->num_rows > 0)// The user is already enrolled 
                            {
                                $approval = $row['approval'];
                                
                                if($approval == 0)// Pending 
                                {
                                    ?>
                                        <script>
                                            location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=0";
                                        </script>
                                    <?php
                                }
                                else
                                if($approval == 1)// Approved 
                                {
                                    ?>
                                        <script>
                                            location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=1";
                                        </script>
                                    <?php
                                }
                                else
                                if($approval == 2)// Rejected 
                                {
                                    ?>
                                        <script>
                                            location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=2";
                                        </script>
                                    <?php
                                }
                            }
                            else //if user is not yet enrolled
                            {
                                ?>
                                    <!-- ======= Start wdv1 Enrollment form Section ======= -->
                                    <section id="enroll_rna" class="enroll_rna">
                                        <div class="container">
                                            <div class="section-title" data-aos="fade-up">
                                                <h2 class="text-secondary">Enrollment</h2>
                                                <p style="color: #00008b;">Web Development Level 5</p>
                                            </div>
                                            <?php
                                                // post gcash and security bank buttons in form 
                                                if(isset($_POST['submit_gcash']))
                                                {
                                                    // users info 
                                                    $email = $_POST['email'];
                                                    $fname = $_POST['fname'];
                                                    $lname = $_POST['lname'];
                                                    $contact = $_POST['contact'];
                                                    $address = $_POST['address'];
                                                    $ref_num = $_POST['ref_num'];
                                                    $pay_type = 'Gcash';

                                                    // for proof image
                                                    $file_ext = strtolower(pathinfo($_FILES['proof_pay']['name'], PATHINFO_EXTENSION));
                                                    $file_name = 'proof-'. rand(1000000, 9000000) .'.'. $file_ext; 
                                                    $file_path = 'upload_proof_pay/'. $file_name;

                                                    if(!in_array($file_ext, array('jpg','jpeg','png')))
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Only JPG, JPEG, and PNG files are allowed.
                                                        </div>
                                                        ';     
                                                    }
                                                    if($_FILES['proof_pay']['size'] > 3000000)
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Maximum file size is 3MB.
                                                        </div>
                                                        ';
                                                    }
                                                    if(move_uploaded_file($_FILES['proof_pay']['tmp_name'], $file_path))
                                                    {
                                                        // insert into payments data 
                                                        $stmt_insert = $conn->prepare("
                                                        insert into 
                                                        payments (type, pay_type, ref_num, email, fname, lname, contact, address, proof_pay) 
                                                        values(?,?,?,?,?,?,?,?,?)
                                                        ");
                                                        $stmt_insert->bind_param('sssssssss', $type, $pay_type, $ref_num, $email, $fname, $lname, $contact, $address, $file_path);
                                                        $stmt_insert->execute();

                                                        // get the approval in db to put in url
                                                        $stmt_approval = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt_approval->bind_param('ss', $email, $type);
                                                        $stmt_approval->execute();
                                                        $res = $stmt_approval->get_result();
                                                        // get approval 
                                                        $row = mysqli_fetch_assoc($res);

                                                        if($res->num_rows > 0)
                                                        {
                                                            $approval = $row['approval'];

                                                            // Pending 
                                                            if($approval == 0)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Approved 
                                                            if($approval == 1)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Rejected 
                                                            if($approval == 2)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                        }
                                                        if($stmt_insert->affected_rows > 0)
                                                        {
                                                            ?>
                                                            <script>
                                                                location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=0";
                                                            </script>
                                                            <?php
                                                        }
                                                        else{
                                                            echo'
                                                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                Something went wrong.
                                                            </div>
                                                            ';
                                                        }
                                                        $stmt_insert->close();
                                                        $stmt_approval->close();

                                                    }

                                                    //SMTP settings
                                                    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                                                    $mail->isSMTP();
                                                    $mail->Host = 'smtp.gmail.com';
                                                    $mail->SMTPAuth = true;
                                                    
                                                    // erovoutika mails 
                                                    $mail->Username = 'erovoutikamails@gmail.com';
                                                    // erovoutika password form gmail 
                                                    $mail->Password = 'wycnwwgkkvdhieet';
                                                    $mail->SMTPSecure = 'tls';
                                                    $mail->Port = 587;

                                                    $mail->setFrom('erovoutikamails@gmail.com', 'Eira Payment');
                                                    // users email 
                                                    $mail->addAddress($email);
                                                    $mail->addAddress('erovoutikamails@gmail.com');
                                                    $mail->isHTML(true);
                                                    $mail->Subject = 'Payment Details';
                                                    $mail->Body = '
                                                    <div style="border: 5px dashed darkblue; border-radius: 1%; margin:0 20%; padding:5%;">
                                                        <h1 style="color:darkblue; font-weight: 600; text-align:center;">
                                                            Payment Details
                                                        </h1>
                                                        <h4>Email : '.$email.'</h4>
                                                        <h4>Name : '.$fname.' '.$lname.'</h4>
                                                        <h4>Contact : '.$contact.'</h4>
                                                        <h4>Address : '.$address.'</h4>
                                                        <h4>Reference Number : '.$ref_num.'</h4>
                                                        <h4>Payment Method : '.$pay_type.'</h4>
                                                    </div>
                                                    ';
                                                    $mail->AddAttachment($file_path);
                                                    $mail->send();
                                                }
                                                else
                                                if(isset($_POST['submit_sb']))
                                                {
                                                    // users info 
                                                    $email = $_POST['email'];
                                                    $fname = $_POST['fname'];
                                                    $lname = $_POST['lname'];
                                                    $contact = $_POST['contact'];
                                                    $address = $_POST['address'];
                                                    $ref_num = $_POST['ref_num'];
                                                    $pay_type = 'Security Bank';

                                                    // for proof image
                                                    $file_ext = strtolower(pathinfo($_FILES['proof_pay']['name'], PATHINFO_EXTENSION));
                                                    $file_name = 'proof-'. rand(1000000, 9000000) .'.'. $file_ext; 
                                                    $file_path = 'upload_proof_pay/'. $file_name;

                                                    if(!in_array($file_ext, array('jpg','jpeg','png')))
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Only JPG, JPEG, and PNG files are allowed.
                                                        </div>
                                                        ';     
                                                    }
                                                    if($_FILES['proof_pay']['size'] > 3000000)
                                                    {
                                                        echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Maximum file size is 3MB.
                                                        </div>
                                                        ';
                                                    }
                                                    if(move_uploaded_file($_FILES['proof_pay']['tmp_name'], $file_path))
                                                    {
                                                        // insert into payments data 
                                                        $stmt_insert = $conn->prepare("
                                                        insert into 
                                                        payments (type, pay_type, ref_num, email, fname, lname, contact, address, proof_pay) 
                                                        values(?,?,?,?,?,?,?,?,?)
                                                        ");
                                                        $stmt_insert->bind_param('sssssssss', $type, $pay_type, $ref_num, $email, $fname, $lname, $contact, $address, $file_path);
                                                        $stmt_insert->execute();

                                                        // get the approval in db to put in url
                                                        $stmt_approval = $conn->prepare("select * from payments where email = ? and type = ?");
                                                        $stmt_approval->bind_param('ss', $email, $type);
                                                        $stmt_approval->execute();
                                                        $res = $stmt_approval->get_result();
                                                        // get approval 
                                                        $row = mysqli_fetch_assoc($res);

                                                        if($res->num_rows > 0)
                                                        {
                                                            $approval = $row['approval'];

                                                            // Pending 
                                                            if($approval == 0)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Approved 
                                                            if($approval == 1)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                            else
                                                            // Rejected 
                                                            if($approval == 2)
                                                            {
                                                                ?>
                                                                    <script>
                                                                        location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=<?php echo $approval ?>";
                                                                    </script>
                                                                <?php
                                                            }
                                                        }
                                                        if($stmt_insert->affected_rows > 0)
                                                        {
                                                            ?>
                                                            <script>
                                                                location.href = "view_enrollment.php?type=<?php echo $type ?>&approval=0";
                                                            </script>
                                                            <?php
                                                        }
                                                        else{
                                                            echo'
                                                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                Something went wrong.
                                                            </div>
                                                            ';
                                                        }
                                                        $stmt_insert->close();
                                                        $stmt_approval->close();

                                                    }

                                                    //SMTP settings
                                                    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                                                    $mail->isSMTP();
                                                    $mail->Host = 'smtp.gmail.com';
                                                    $mail->SMTPAuth = true;
                                                    
                                                    // erovoutika mails 
                                                    $mail->Username = 'erovoutikamails@gmail.com';
                                                    // erovoutika password form gmail 
                                                    $mail->Password = 'wycnwwgkkvdhieet';
                                                    $mail->SMTPSecure = 'tls';
                                                    $mail->Port = 587;

                                                    $mail->setFrom('erovoutikamails@gmail.com', 'Eira Payment');
                                                    // users email 
                                                    $mail->addAddress($email);
                                                    $mail->addAddress('erovoutikamails@gmail.com');
                                                    $mail->isHTML(true);
                                                    $mail->Subject = 'Payment Details';
                                                    $mail->Body = '
                                                    <div style="border: 5px dashed darkblue; border-radius: 1%; margin:0 20%; padding:4%;">
                                                        <h1 style="color:darkblue; font-weight: 600; text-align: center">
                                                            Payment Details
                                                        </h1>
                                                        <h4>Email : '.$email.'</h4>
                                                        <h4>Name : '.$fname.' '.$lname.'</h4>
                                                        <h4>Contact : '.$contact.'</h4>
                                                        <h4>Address : '.$address.'</h4>
                                                        <h4>Reference Number : '.$ref_num.'</h4>
                                                        <h4>Payment Method : '.$pay_type.'</h4>
                                                    </div>
                                                    ';
                                                    $mail->AddAttachment($file_path);
                                                    $mail->send();
                                                }
                                            ?>
                                            <div class="container-fluid">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 col-lg-11">
                                                        <div class="card card0 rounded-0">
                                                            <div class="row">
                                                                <div class="col-md-5 d-md-block d-none p-0 box">
                                                                    <div class="card rounded-0 border-0 card1" id="bill">
                                                                        <h3 id="heading1">Payment Summary</h3>
                                                                        <div class="row">
                                                                            <div class="col-lg-7 col-8 mt-4 line pl-4">
                                                                                <h2 class="head">Web Development</h2>
                                                                                <div class="data">Level 5</div>
                                                                            </div>
                                                                            <div class="col-lg-5 col-4 mt-4">
                                                                                <img src="assets/img/certificates/web_dev/web_dev5.png" width="200"
                                                                                    height="200">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 blue-bg">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <p class="data mb-1" id="total-label">Total Price
                                                                                        </p>
                                                                                        <h2 class="head2 mb-1" id="total">$17</h2>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <h3 class="data2 mb-1 text-warning"
                                                                                            id="total-label">WDV - 105</h3>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-7 col-sm-12 p-0 box">
                                                                    <div class="card rounded-0 border-0 card2">
                                                                        <div class="form-card">
                                                                            <div class="radio-group">
                                                                                <!-- note  -->
                                                                                <div class="text-center bg-warning" style="padding:15px;">
                                                                                    <strong>Note:</strong>
                                                                                    Kindly please check your Information first before
                                                                                    proceeding to payment!
                                                                                    if you want to make changes please proceed
                                                                                    <a href="edit_profile.php"
                                                                                        class="text-primary">here.</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <!-- email input  -->
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label label">Email</label>
                                                                                    <input type="text" name="email" value="<?php echo $email ?>"readonly>
                                                                                </div>
                                                                                <!-- First Name input  -->
                                                                                <div class="col-6">
                                                                                    <label class="form-label label">Full Name</label>
                                                                                    <input type="text" name="fname" value="<?php echo $fname .' '. $lname?>" readonly>
                                                                                </div>
                                                                                <!-- Contact input  -->
                                                                                <div class="col-12">
                                                                                    <label class="form-label label">Contact</label>
                                                                                    <input type="text" name="contact" value="<?php echo $contact ?>" readonly>
                                                                                </div>
                                                                                <!-- address input  -->
                                                                                <div class="col-12">
                                                                                    <label class="form-label label">Address</label>
                                                                                    <input type="text" name="address" value="<?php echo $address ?>" readonly>
                                                                                </div>
                                                                                <!-- Company_univ input  -->
                                                                                <div class="col-12">
                                                                                    <label class="form-label label">Company / University</label>
                                                                                    <input type="text" name="company_univ" value="<?php echo $company_univ ?>" readonly>
                                                                                </div>
                                                                                <div class="col-md-12">

                                                                                    <!-- button and modal start here  -->
                                                                                    <button type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#staticBackdrop">
                                                                                        <i class="fas fa-money-bill-wave"></i> &nbsp; Pay Now
                                                                                    </button>

                                                                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-body">
                                                                                                    <div class="text-right"><i class="fa fa-close close" data-dismiss="modal"></i></div>
                                                                                                    <div class="tabs mt-3">
                                                                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                                                            <li class="nav-item" role="presentation">
                                                                                                                <a class="nav-link active" id="gcash-tab" data-toggle="tab" href="#gcash" role="tab" aria-controls="gcash" aria-selected="true">
                                                                                                                    <img src="assets/img/enroll/gcash_logo.png" width="80">
                                                                                                                </a>
                                                                                                            </li>
                                                                                                            <li class="nav-item" role="presentation">
                                                                                                                <a class="nav-link" id="sb-tab" data-toggle="tab" href="#sb" role="tab" aria-controls="sb" aria-selected="false">
                                                                                                                    <img src="assets/img/enroll/securitybank-logo.png" width="80">
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                        
                                                                                                            <div class="tab-content" id="myTabContent">
                                                                                                            
                                                                                                                <div class="tab-pane fade show active" id="gcash" role="tabpanel" aria-labelledby="gcash-tab">
                                                                                                                    <!-- form start  -->
                                                                                                                    <form method="post" enctype="multipart/form-data">
                                                                                                                        <div class="mt-2 mx-4">
                                                                                                                            <div class="mb-3">
                                                                                                                                <h6 style="color:#00008b;"><strong>GCash Details</strong></h6>
                                                                                                                                <div style="margin-left: 20px;">
                                                                                                                                    <strong>Number :</strong> 0906-1497-307 <br>
                                                                                                                                    <strong>Name :</strong> B**I D****MO
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="row">
                                                                                                                                <!-- email  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Email</label>
                                                                                                                                        <input type="text" name="email" value="<?php echo $email ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- first name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">First Name</label>
                                                                                                                                        <input type="text" name="fname" value="<?php echo $fname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- last name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Last Name</label>
                                                                                                                                        <input type="text" name="lname" value="<?php echo $lname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Contact name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Contact</label>
                                                                                                                                        <input type="text" name="contact" value="<?php echo $contact ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- address name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Address</label>
                                                                                                                                        <input type="text" name="address" value="<?php echo $address ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Company/univ name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Company / University</label>
                                                                                                                                        <input type="text" name="company_univ" value="<?php echo $company_univ ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- ref num name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Reference Number </strong> </label>
                                                                                                                                        <input type="text" name="ref_num" placeholder="xxxx-xxx-xxxxxx" class="form-control" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Proof of payment  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Proof Of Payment</label>
                                                                                                                                        <input type="file" name="proof_pay" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                
                                                                                                                                <div class="pay">
                                                                                                                                    <button type="submit" name="submit_gcash" class="btn btn-primary"> 
                                                                                                                                        Complete 
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            
                                                                                                                <div class="tab-pane fade" id="sb" role="tabpanel" aria-labelledby="sb-tab">
                                                                                                                    <!-- form start  -->
                                                                                                                    <form method="post" enctype="multipart/form-data">
                                                                                                                        <div class="mt-2 mx-4">
                                                                                                                            <div class="mb-3">
                                                                                                                                <h6 style="color:#00008b;"><strong>Security Bank Details</strong></h6>
                                                                                                                                <div style="margin-left: 20px;">
                                                                                                                                    <strong>Account Number :</strong> 0000021660817 <br>
                                                                                                                                    <strong>Name :</strong> EROVOUTIKA ENTERPRISE
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="row">
                                                                                                                                <!-- email  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Email</label>
                                                                                                                                        <input type="text" name="email" value="<?php echo $email ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- first name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">First Name</label>
                                                                                                                                        <input type="text" name="fname" value="<?php echo $fname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- last name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Last Name</label>
                                                                                                                                        <input type="text" name="lname" value="<?php echo $lname ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Contact name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Contact</label>
                                                                                                                                        <input type="text" name="contact" value="<?php echo $contact ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- address name  -->
                                                                                                                                <div class="col-md-6">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Address</label>
                                                                                                                                        <input type="text" name="address" value="<?php echo $address ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Company/univ name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Company / University</label>
                                                                                                                                        <input type="text" name="company_univ" value="<?php echo $company_univ ?>" class="form-control" readonly>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- ref num name  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Reference Number</label>
                                                                                                                                        <input type="text" name="ref_num" placeholder="xxxx-xxx-xxxxxx" class="form-control" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!-- Proof of payment  -->
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="inputbox">
                                                                                                                                        <label class="form-label">Proof Of Payment</label>
                                                                                                                                        <input type="file" name="proof_pay" required>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                
                                                                                                                                <div class="pay">
                                                                                                                                    <button type="submit" name="submit_sb" class="btn btn-primary"> 
                                                                                                                                        Complete 
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                            
                                                                                                            </div>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- button and modal end here  -->
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </section>
                                    <!-- ======= End wdv1 Enrollment form Section ======= -->
                                <?php
                            }
                    }
                    else{
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