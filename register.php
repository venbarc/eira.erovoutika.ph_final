<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | EIRA</title>

    <?php
    session_start();
    include "connect.php";
    include "include/head_links.php";

    // navigation bar 
    include 'include/navbar.php';

    if (isset($_SESSION['user_id'])) {
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
                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                    <div data-aos="zoom-out">
                        <h3 class="text-center text-white text-lg-center">Registration Here</h3>
                        <!-- if register button is pressed  -->
                        <?php
                            // email set up /////////////////////////////////////////////////
                            require 'PHPMailer-master/src/PHPMailer.php';
                            require 'PHPMailer-master/src/SMTP.php';
                            require 'PHPMailer-master/src/Exception.php';

                            if (isset($_POST['reg_submit'])) 
                            {
                                $email = $_POST['email'];
                                $fname = $_POST['fname'];
                                $lname = $_POST['lname'];
                                $contact = $_POST['contact'];
                                $company_univ = $_POST['company_univ'];
                                $address = $_POST['address'];
                                $password = $_POST['password'];
                                $c_password = $_POST['c_password'];
                                $pin = rand(10000, 90000);

                                // check if email exist in database first 
                                $stmt_check_email = $conn->prepare("select * from users where email = ? ");
                                $stmt_check_email->bind_param('s', $email);
                                $stmt_check_email->execute();
                                $res_check_email = $stmt_check_email->get_result();

                                if($res_check_email->num_rows > 0) //if user already exist
                                {
                                    echo '
                                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                        Email is not available try another one !
                                    </div>
                                    ';
                                }
                                else
                                {
                                    if($password != $c_password) 
                                    {
                                        echo '
                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                            Password and confirm password does not match !
                                        </div>
                                        ';
                                    } 
                                    else 
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

                                        $mail->setFrom('erovoutikamails@gmail.com', 'EIRA Verification');
                                        // users email 
                                        $mail->addAddress($email);
                                        $mail->isHTML(true);
                                        $mail->Subject = 'Verification Pin';
                                        $mail->Body = '
                                        <center>
                                            <h1> 
                                                Verify your Account here <br>
                                                Your verification pin: <br> ' . $pin . '</span> 
                                            </h1> 
                                        </center>
                                        ';

                                        // check if email sent 
                                        if ($mail->send()) 
                                        {
                                            // password hashing 
                                            $hash_pass = password_hash($password, PASSWORD_DEFAULT);

                                            // insert data in database 
                                            $stmt_insert = $conn->prepare("insert into users (email, fname, lname, contact, password, company_univ, address, pin) values (?,?,?,?,?,?,?,?) ");
                                            $stmt_insert->bind_param("sssisssi", $email, $fname, $lname, $contact, $hash_pass, $company_univ, $address, $pin);
                                            $stmt_insert->execute();

                                            if ($stmt_insert->affected_rows > 0)
                                            {
                                                ?>
                                                <script>
                                                    location.href = "verification.php?email=<?php echo $email ?>";
                                                </script>
                                                <?php
                                            } 
                                            else {
                                                echo '
                                                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                    Something went wrong! pls try again.
                                                </div>
                                                ';
                                            }
                                            $stmt_insert->close();
                                        } 
                                        else 
                                        {
                                            echo '
                                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                Email not sent, something went wrong
                                            </div>
                                            ';
                                        }
                                    }
                                    $stmt_check_email->close();
                                } 
                            }

                        ?>

                        <div class="row justify-content-center pt-4">
                            <div class="col-md-12 col-lg-8">
                                <div class="login-wrap p-0">
                                    <!-- start form  -->
                                    <form method="post">
                                        <div class="row">
                                            <!-- Email here  -->
                                            <div class="col-md-4 mb-3">
                                                <label for="email" class="text-white form-label">Email</label>
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Juan@gmail.com" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                            </div>
                                            <!-- First name here  -->
                                            <div class="col-md-4 mb-3">
                                                <label for="fname" class="text-white form-label">First Name</label>
                                                <input type="text" name="fname" class="form-control" id="fname" placeholder="Juan" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                            </div>
                                            <!-- Last name here  -->
                                            <div class="col-md-4 mb-3">
                                                <label for="lname" class="text-white form-label">Last Name</label>
                                                <input type="text" name="lname" class="form-control" id="lname" placeholder="Tamad" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                            </div>
                                            <!-- contact here  -->
                                            <div class="col-md-4 mb-3">
                                                <label for="contact" class="text-white form-label">Contact (+63)</label>
                                                <input type="text" name="contact"  class="form-control" id="contact" placeholder="xxxx-xxx-xxx" onkeyup="this.value=this.value.replace(/[<>]/g,'')" pattern="[0-9]{10}" minlength='10' maxlength='10' required>
                                            </div>
                                            <!-- password here  -->
                                            <div class="col-md-4 mb-3">
                                                <label for="password" class="text-white form-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="password here" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                            </div>
                                            <!-- confirm password here  -->
                                            <div class="col-md-4 mb-3">
                                                <label for="c_password" class="text-white form-label">Confirm Password</label>
                                                <input type="password" name="c_password" class="form-control" id="c_password" placeholder="confirm password here" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                            </div>
                                            <!-- Company and University here  -->
                                            <div class="col-md-6 mb-3">
                                                <label for="company_univ" class="text-white form-label">Company / University</label>
                                                <input type="text" name="company_univ" class="form-control" id="company_univ" placeholder="Company / University" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                            </div>
                                            <!-- Address here -->
                                            <div class="col-md-6 mb-3">
                                                <label for="address" class="text-white form-label">Address</label>
                                                <input type="text" name="address" class="form-control" id="address" placeholder="Address here" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                                            </div>
                                        </div>
                                        <div class="form-group d-md-flex mt-3">
                                            <!-- links for login and forgot password  -->
                                            <div class="w-50 text-md-right">
                                                <a href="login.php" class="register_links">Already have an account ?</a>
                                            </div>
                                        </div>
                                            <!-- submit button to register  -->
                                            <div class="mt-5 text-center">
                                                <input type="submit" name="reg_submit" value="Register" class="btn btn-warning">
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