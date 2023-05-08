<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EIRA</title>

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
    
    // check if user is logged in 
    if(isset($_SESSION['user_id']))
    {
        ?>
            <script>
                location.href = "404.php";
            </script>
        <?php
    }
    
    ?>

</head>

<body>
    <main id="main">
        <!-- ======= Hero Section ======= -->
        <section id="hero">

            <div class="container">
                <div class="flex justify-content-center">
                    <div class="pt-5 pt-lg-0 order-2 order-lg-1 align-items-center">
                        <div data-aos="zoom-out">
                            <h1 class="text-center text-lg-center">Welcome Back to EIRA</h1>
                            <!-- if login button is set  -->
                            <?php
                                if(isset($_POST['login_submit']))
                                {
                                    $email = $_POST['email'];
                                    $password = $_POST['password'];

                                    //check if email existed in database first
                                    $stmt_check_email = $conn->prepare("select * from users where email = ?");
                                    $stmt_check_email->bind_param('s', $email);
                                    $stmt_check_email->execute();
                                    $res_check_email = $stmt_check_email->get_result();

                                    //check if admin existed in db
                                    $stmt_admin = $conn->prepare("select * from admin where email = ? and password = ?");
                                    $stmt_admin->bind_param('ss', $email, $password);
                                    $stmt_admin->execute();
                                    $res_admin = $stmt_admin->get_result();

                                    //check if activation is active to specific user
                                    $stmt_active = $conn->prepare("select * from users where email = ? and activation = 1");
                                    $stmt_active->bind_param('s', $email);
                                    $stmt_active->execute();
                                    $res_active = $stmt_active->get_result();

                                    // if email exist 
                                    if ($res_check_email->num_rows == 1) 
                                    {
                                        // check if user verify their email 
                                        if ($res_active->num_rows == 1) 
                                        {
                                            $row = $res_check_email->fetch_assoc();
                                            $hash_pass = $row['password'];

                                            if (password_verify($password, $hash_pass)) 
                                            {
                                                // set id and start the SESSION
                                                $id = $row['id'];
                                                $_SESSION['user_id'] = $id;

                                                ?>
                                                <script>
                                                    location.href = "profile.php";
                                                </script>
                                                <?php
                                            } 
                                            else 
                                            {
                                                echo '
                                                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                    Incorrect Credentials !
                                                </div>
                                                ';
                                            }
                                        } 
                                        else 
                                        {
                                            echo '
                                            <div class="text-dark text-center pb-2 pt-2" style="background-color: pink;">
                                                Pls Verify your email address! <br>
                                                <a href="verification.php?email=' . $email . '" style="color: black; text-decoration: underline;">
                                                    Verify here
                                                </a>
                                            </div>
                                            ';
                                        }
                                        $stmt_active->close();
                                    }
                                    if($res_admin-> num_rows == 1)
                                    {
                                        // allow login
                                        // start session admin
                                        $row = $res_admin->fetch_assoc();
                                        $_SESSION['admin_id'] = $row['id'];
                                        ?>
                                            <script>
                                                location.href = "admin/";
                                            </script>
                                        <?php
                                    } 
                                    else 
                                    {
                                        echo '
                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                            Incorrect Credentials !
                                        </div>
                                        ';
                                    }
                                    $stmt_admin->close();
                                    $stmt_check_email->close(); 
                                }

                                //if the forgot password pressed
                                if(isset($_POST['submit_forgot_pass']))
                                {
                                    // initialization 
                                    $email = $_POST['email'];

                                    // generate random strings and numbers for password 
                                    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    $new_pass = substr(str_shuffle($chars), 0, 10);

                                    // hash the new password 
                                    $hash_pass = password_hash($new_pass, PASSWORD_DEFAULT);

                                    // check if the email exist in the database first 
                                    $stmt = $conn->prepare("select * from users where email = ?");
                                    $stmt->bind_param('s', $email);
                                    $stmt->execute();
                                    $res = $stmt->get_result();

                                    if($res->num_rows > 0)
                                    {
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

                                        $mail->setFrom('erovoutikamails@gmail.com', 'Reset Password');
                                        // users email 
                                        $mail->addAddress($email);
                                        $mail->isHTML(true);
                                        $mail->Subject = 'New Password';
                                        $mail->Body = '
                                        <center>
                                            <h3> 
                                                Your New Password is: <br>' . $new_pass . '</span> <br>
                                            </h3> 
                                        </center>
                                        <h4 style="color:red; "> Note: Please change password after logging in.</h4>
                                        ';

                                        // check if email sent 
                                        if ($mail->send()) 
                                        {
                                            // change password in database 
                                            $stmt = $conn->prepare("update users set password = ? where email = ? ");
                                            $stmt->bind_param('ss', $hash_pass, $email);
                                            $stmt->execute();
                                            
                                            if($stmt->affected_rows > 0)
                                            {
                                                ?>
                                                    <script>
                                                        location.href = "forgot_pass.php?email=<?php echo $email ?>";
                                                    </script>
                                                <?php
                                            }
                                            else{
                                                echo '
                                                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                    Something went wrong !
                                                </div>
                                            ';  
                                            }
                                        }
                                        
                                    }
                                    else{
                                        echo '
                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                            Email does not exist in our database !
                                        </div>
                                        ';                     
                                    }
                                }
                            ?>

                            <!-- login form  -->
                            <div class="row justify-content-center pt-4">
                                <div class="col-md-12 col-lg-8">
                                    <div class="login-wrap p-0">
                                        <!-- start form  -->
                                        <form method="post">
                                            <div class="row">
                                                <!-- Email here  -->
                                                <div class="col-md-6 mb-3">
                                                    <label for="email" class="text-white form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" id="email" <?php echo isset($_GET['email']) ? 'value=" '. $_GET['email'] .'"' : 'placeholder="Juan@gmail.com"' ?> onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                                </div>
                                                <!-- password here  -->
                                                <div class="col-md-6 mb-3">
                                                    <label for="password" class="text-white form-label">Password</label>
                                                    <input type="password" name="password" class="form-control" id="password" placeholder="password here" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                                </div>
                                            </div>
                                            <div class="form-group d-md-flex mt-3">
                                                <!-- links for login and forgot password  -->
                                                <div class="w-50 text-md-left">
                                                    <a href="#forgot_pass" class="register_links" role="button" data-bs-toggle="modal">
                                                        Forgot password ?
                                                    </a>
                                                </div>
                                                <div class="w-50 text-md-right">
                                                    <a href="register.php" class="register_links">Don't have an account ?</a>
                                                </div>
                                            </div>
                                                <!-- submit button to register  -->
                                                <div class="mt-5 text-center">
                                                    <input type="submit" name="login_submit" value="Login" class="btn btn-warning">
                                                </div>
                                        </form>
                                        <!-- end form  -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

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

            <!-- forms are inside the modals  -->
            <?php 
                include "modals.php";
            ?>

        </section>
        <!-- End Hero -->

        
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