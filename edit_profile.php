<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile | EIRA</title>

    <?php
    session_start();
    include "connect.php";
    include "include/head_links.php";

    // check if user is signed in 
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
    else
    {
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
    <main id="main" id="edit_profile" class="edit_profile">
        <!-- ======= Hero Section ======= -->
        <section id="hero">
        
        <div class="container">
            <div class="flex justify-content-center">
                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                    <div data-aos="zoom-out">

                        <div class="row justify-content-center pt-2">
                            <div class="col-md-12 col-lg-8">

                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <?php
                                            if(empty($image))
                                            {
                                                echo '
                                                <img src="assets/img/profile/default2.png" class="profile_img"> <br>
                                                ';
                                            }
                                            else
                                            {
                                                echo '
                                                <img src="'.$image.'" alt="" class="profile_img"> <br>
                                                ';
                                            }
                                            echo'
                                            <a href="#edit_image" role="button" class="btn btn-primary mt-3" data-bs-toggle="modal">
                                                Edit Image
                                            </a>
                                            <h6 class="mt-2" style="font-size: 0.8rem; color: white;">
                                                '. $date_reg .'
                                            </h6> 
                                            ';
                                        ?>
                                    </div>
                                    <div class="col-md-8 mt-5">
                                        <?php
                                            //edit personal profile here ////////////////////////////////////////
                                            if(isset($_POST['submit_edit_image']))
                                            {
                                                $upload_ext = strtolower(pathinfo($_FILES['edit_image']['name'], PATHINFO_EXTENSION)); // Get the file extension
                                                $upload_name = 'profile-'. rand(1000000,9000000) . '.' . $upload_ext; // Generate the file name
                                                $upload_path = 'upload_profile/'. $upload_name ; // image path 

                                                if(!in_array($upload_ext, array('jpg', 'jpeg', 'png') )) // checks if the file has a valid extension
                                                {
                                                    echo '
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Only JPG, JPEG, and PNG files are allowed.
                                                        </div>
                                                    ';
                                                }
                                                else
                                                if($_FILES['edit_image']['size'] > 3000000) //Check if the file is not larger than 3MB
                                                {
                                                    echo '
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Maximum file size is 3MB.
                                                        </div>
                                                    ';
                                                }
                                                else
                                                if(move_uploaded_file($_FILES['edit_image']['tmp_name'], $upload_path)) // Move the temporary uploaded file to the target folder
                                                {
                                                    $stmt_update_image = $conn->prepare("update users set image = ? where id='$user_id' ");
                                                    $stmt_update_image->bind_param('s', $upload_path);
                                                    $stmt_update_image->execute();
                                                    
                                                    if($stmt_update_image->affected_rows > 0)
                                                    {
                                                        ?>
                                                            <script>
                                                                location.href = "edit_profile.php";
                                                            </script>
                                                        <?php
                                                    }
                                                    else{
                                                        echo '
                                                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                Something went wrong
                                                            </div>
                                                        ';
                                                    }
                                                }
                                            }

                                            //edit personal email here //////////////////////////////////////////
                                            if(isset($_POST['submit_edit_email']))
                                            {
                                                $new_email = $_POST['new_email'];
                                                $pin = rand(10000, 90000);

                                                // get email 
                                                $stmt = $conn->prepare("select * from users where email = ? ");
                                                $stmt->bind_param('s', $new_email);
                                                $stmt->execute();
                                                $res = $stmt->get_result();

                                                // check first if email is valid 
                                                if($res->num_rows > 0)
                                                {
                                                    echo'
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Email Address is not available please try again.
                                                        </div>
                                                        <br>
                                                    ';
                                                }
                                                else
                                                {
                                                    // update pin in db 
                                                    $stmt_update_pin = $conn->prepare("update users set pin = ? where id ='$user_id' ");
                                                    $stmt_update_pin->bind_param('i', $pin);
                                                    $stmt_update_pin->execute();

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
                                                    $mail->setFrom('erovoutikamails@gmail.com', 'EIRA Verification');
                                                    
                                                    // users email 
                                                    $mail->addAddress($new_email);
                                                    $mail->isHTML(true);
                                                    $mail->Subject = 'Change email Pin';
                                                    //contect of email
                                                    $mail->Body = '
                                                    <center>
                                                        <h1> 
                                                            Change your email Account here <br>
                                                            Your verification pin: <br> ' . $pin . '</span> 
                                                        </h1> 
                                                    </center>
                                                    ';
                                                    
                                                    // check if email sent 
                                                    if($mail->send())
                                                    {
                                                        if($stmt_update_pin->affected_rows > 0)
                                                        {
                                                            ?>
                                                                <script>
                                                                    location.href = "verify_change_email.php?new_email=<?php echo $new_email ?>";
                                                                </script>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            echo'
                                                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                Something went wrong!
                                                            </div>
                                                            ';
                                                        }
                                                        $stmt_update_pin->close();
                                                    }
                                                }
                                                
                                            }   

                                            //edit personal information here ////////////////////////////////////
                                            if(isset($_POST['submit_edit_personal']))
                                            {
                                                $fname = $_POST['fname'];
                                                $lname = $_POST['lname'];
                                                $contact = $_POST['contact'];
                                                $company_univ = $_POST['company_univ'];
                                                $address = $_POST['address'];

                                                // update user query
                                                $stmt_update_personal = $conn->prepare("update users set fname = ?, lname = ?, contact = ?, company_univ = ?, address = ? where email = ? ");
                                                $stmt_update_personal->bind_param('ssisss', $fname, $lname, $contact, $company_univ, $address, $email);
                                                $stmt_update_personal->execute();
                                                
                                                if($stmt_update_personal->affected_rows > 0)
                                                {
                                                    echo '
                                                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                                            Successfully updated Personal Information.
                                                        </div>
                                                        ';
                                                }
                                                else{
                                                    echo '
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Something went wrong
                                                        </div>
                                                        ';
                                                }
                                                $stmt_update_personal->close();
                                            }

                                            //Change Password here /////////////////////////////////////////////
                                            if(isset($_POST['submit_change_pass']))
                                            {
                                                // initialization 
                                                $current_pass = $_POST['current_pass'];
                                                $new_pass = $_POST['new_pass'];
                                                $confirm_new_pass = $_POST['confirm_new_pass'];

                                                $stmt = $conn->prepare("select * from users where email = ?");
                                                $stmt->bind_param('s', $email);
                                                $stmt->execute();
                                                $res = $stmt->get_result();
                                                $row = mysqli_fetch_assoc($res);

                                                // password in database 
                                                $password_db = $row['password'];

                                                if($res->num_rows > 0)
                                                {
                                                    if(password_verify($current_pass, $password_db))
                                                    {
                                                        if($new_pass == $confirm_new_pass)
                                                        {
                                                            // hashed the new password first 
                                                            $hash_pass = password_hash($new_pass, PASSWORD_DEFAULT);

                                                            $stmt = $conn->prepare("update users set password = ? where email = ?");
                                                            $stmt->bind_param('ss', $hash_pass, $email);
                                                            $stmt->execute();

                                                            if($stmt->affected_rows > 0)
                                                            {
                                                                echo '
                                                                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                                                    Successfully changed password.
                                                                </div>
                                                                ';
                                                            }
                                                        }
                                                        else{
                                                            echo '
                                                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                New password and Confirm Password does not matched.
                                                            </div>
                                                            ';
                                                        }
                                                    }
                                                    else{
                                                        echo '
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            Confirm Password does not matched.
                                                        </div>
                                                        ';
                                                    }
                                                }
                                                else{
                                                    echo '
                                                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                        Something went wrong! please try again.
                                                    </div>
                                                    ';
                                                }
                                                $stmt->close();
                                                
                                            }
                                        
                                        ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php
                                                    echo'
                                                        <strong style="font-size: 1rem; color: #ff8c00;">First Name</strong> <br>
                                                        <h5 class="" style="font-size: 0.9rem; color: #eee7e7; ">'. $fname .'</h5> 
                                                    ';
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php
                                                    echo'
                                                        <strong style="font-size: 1rem; color: #ff8c00;">Last Name</strong> <br>
                                                        <h5 class="" style="font-size: 0.9rem; color: #eee7e7; ">'. $lname .'</h5> 
                                                    ';
                                                ?>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <?php
                                                    echo'
                                                        <strong style="font-size: 1rem; color: #ff8c00;">Contact</strong> <br>
                                                        <h5 class="" style="font-size: 0.9rem; color: #eee7e7; "> '. $contact .'</h5> 
                                                    ';
                                                ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                    echo'
                                                        <strong style="font-size: 1rem; color: #ff8c00;">Company / University </strong> <br>
                                                        <h5 class="" style="font-size: 0.9rem; color: #eee7e7; "> '. $company_univ .' </h5> 
                                                    ';
                                                ?>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <?php
                                                    echo'
                                                        <strong style="font-size: 1rem; color: #ff8c00;">Address </strong> <br>
                                                        <h5 class="" style="font-size: 0.9rem; color: #eee7e7; "> '. $address .' </h5> 
                                                    ';
                                                ?>
                                            </div>
                                            <div class="col-md-12">
                                                <?php
                                                    echo'
                                                        <a href="#edit_personal" role="button" class="btn btn-primary" data-bs-toggle="modal">
                                                            Update Personal Information
                                                        </a> 
                                                    ';
                                                ?>
                                            </div>
                                            <div class="col-md-12 mt-5">
                                                <?php
                                                    echo'
                                                        <strong style="font-size: 1rem; color: #ff8c00;"> Email </strong> <br>
                                                        <h5 class="mb-3" style="font-size: 0.9rem; color: #eee7e7; "> '. $email .' </h5>
                                                        <a href="#edit_email" role="button" class="btn btn-primary mb-3" data-bs-toggle="modal">Edit Email</a> <br>
                                                        <a href="#change_pass" role="button" class="btn btn-danger" data-bs-toggle="modal"> Change Password </a> <br>
                                                    ';
                                                ?>
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

        <!-- forms are inside the modals  -->
        <?php 
            include "modals.php";
        ?>


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