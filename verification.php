<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification | EIRA</title>

    <?php
    session_start();
    include "connect.php";
    include "include/head_links.php";

    // email set up /////////////////////////////////////////////////
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    require 'PHPMailer-master/src/Exception.php';

    if (isset($_SESSION['user_id'])) 
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
        <section id="hero" id="verification" class="verification">
        
        <div class="container">
            <div class="flex justify-content-center">
                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                    <div data-aos="zoom-out">
                        <h3 class="text-center text-white text-lg-center">Verify your email</h3>

                        <?php
                            if(isset($_GET['email']))
                            {
                                $email = $_GET['email'];

                                if(isset($_POST['submit_pin']))
                                {               
                                    $pin_post = $_POST['pin'];

                                    // get the pin in the database to specific user using email
                                    $stmt = $conn->prepare("select * from users where email = ? ");
                                    $stmt->bind_param('s', $email);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    $row = $res->fetch_assoc();
                                    $pin_db = $row['pin'];

                                    // check if pin posted by user and pin in database matches 
                                    if($pin_post == $pin_db)
                                    {
                                        // update activation to 1 in db 
                                        $stmt_update = $conn->prepare("update users set activation = 1 where email = ?");
                                        $stmt_update->bind_param('s', $email);
                                        $stmt_update->execute();
                                        
                                        if($stmt_update->affected_rows > 0)
                                        {
                                            echo '
                                            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                                Successfully Verified Email proceed to login 
                                            </div>
                                            <br>
                                            ';
                                        }
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

                        <div class="row justify-content-center pt-4 text-center">
                            <div class="col-md-12 col-lg-8">
                                
                                <?php
                                    $stmt = $conn->prepare("select * from users where email = ? and activation = 0");
                                    $stmt->bind_param('s', $email);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    
                                    if($res->num_rows > 0)
                                    {
                                        ?>
                                        <h6 class="text-white mb-3"> 
                                            We have sent a verification on <span class="text-warning"><?php echo $email ?></span>
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
                                    else
                                    {
                                        ?>
                                        <h6 class="text-white mb-3"> 
                                            Successfully Verified <span class="text-warning"><?php echo $email ?></span>
                                            you can now login in.  
                                        </h6>
                                        <div class="text-center text-lg">
                                            <h5>
                                                <a href="login.php" class="text-white btn btn-warning">Login here</a> 
                                            </h5>
                                        </div>
                                        <?php
                                    }
                                    $stmt->close();
                                ?>

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