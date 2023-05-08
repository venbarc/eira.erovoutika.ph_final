<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Change Email | EIRA</title>

    <?php
    session_start();
    include "connect.php";
    include "include/head_links.php";

    // email set up /////////////////////////////////////////////////
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    require 'PHPMailer-master/src/Exception.php';

    //Check if user is signed in
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
                        <h3 class="text-center text-white text-lg-center">Change Email Verification</h3>

                        <!-- if pin is posted  -->
                        <?php
                            if(isset($_GET['new_email']))
                            {
                                $new_email = $_GET['new_email'];
                    
                                if(isset($_POST['submit_pin']))
                                {               
                                    $pin_post = $_POST['pin'];
                    
                                    // get the pin in the database to specific user using email
                                    $stmt_pin = $conn->prepare("select * from users where email = ? ");
                                    $stmt_pin->bind_param('s', $email);
                                    $stmt_pin->execute();
                                    $res = $stmt_pin->get_result();
                                    $row = $res->fetch_assoc();
                                    $pin_db = $row['pin'];
                                    $stmt_pin->close();

                                    // check if pin posted by user and pin in database matches 
                                    if($pin_post == $pin_db)
                                    {
                                        // update users email in db 
                                        $stmt_update_user = $conn->prepare("update users set email = ? where email = ? ");
                                        $stmt_update_user->bind_param('ss', $new_email, $email);
                                        $stmt_update_user->execute();

                                        if($stmt_update_user->affected_rows > 0)
                                        {
                                            // update payments email in db 
                                            $stmt_update_payment = $conn->prepare("update payments set email = ? where email = ? ");
                                            $stmt_update_payment->bind_param('ss', $new_email, $email);
                                            $stmt_update_payment->execute();

                                            // update result email in db 
                                            $stmt_update_result = $conn->prepare("update result set email = ? where email = ? ");
                                            $stmt_update_result->bind_param('ss', $new_email, $email);
                                            $stmt_update_result->execute();
                                           ?>
                                                <script>
                                                    location.href = "edit_profile.php";
                                                </script>
                                           <?php
                                        }
                                        else
                                        {
                                            echo'<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                    Something went wrong please try again !
                                                </div> ';
                                        }
                                        $stmt_update_user->close();
                                        $stmt_update_payment->close();
                                        $stmt_update_result->close();
                                    }
                                    else
                                    {
                                        echo '
                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                            Verification does not match pls check your email !
                                        </div>
                                        ';
                                    }
                                }

                                ?>
                                    <div class="row justify-content-center pt-4 text-center">
                                        <div class="col-md-12 col-lg-8">
                                            <?php
                                                $stmt = $conn->prepare("select * from users where email = ?");
                                                $stmt->bind_param('s', $email);
                                                $stmt->execute();
                                                $res = $stmt->get_result();
                                                
                                                if($res->num_rows > 0)
                                                {
                                                    ?>
                                                    <h6 class="text-white mb-3"> 
                                                        We have sent a verification on <span class="text-warning"><?php echo $new_email ?></span>
                                                        kindly please check your email.  
                                                    </h6>
                                                        <!-- start form  -->
                                                        <form method="post">
                                                            <!-- label -->
                                                            <label for="pin" class="form-label text-white">Verification PIN here</label>
                                                            <br> 
                                                            <!-- pin codes  -->
                                                            <div class="pin-input-container">
                                                                <input type="text" name="pin" id="pin" class="pin-input form-control" maxlength="5" required>
                                                                <div class="pin-boxes">
                                                                    <div class="pin-box"></div>
                                                                    <div class="pin-box"></div>
                                                                    <div class="pin-box"></div>
                                                                    <div class="pin-box"></div>
                                                                    <div class="pin-box"></div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <!-- submit btn for pin  -->
                                                            <div class="text-center">
                                                                <input type="submit" name="submit_pin" value="Submit Pin" class="btn btn-primary">
                                                            </div>
                                                        </form>
                                                        <!-- end form  -->
                                                    <?php
                                                }
                                                $stmt->close();
                                            ?>
                                        </div>
                                    </div>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <script>
                                        location.href = "register.php";
                                    </script>
                                <?php
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