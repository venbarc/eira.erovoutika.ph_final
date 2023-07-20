<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | EIRA</title>

    <?php
    session_start();
    include "connect.php";
    include "include/head_links.php";

    // email set up /////////////////////////////////////////////////
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    require 'PHPMailer-master/src/Exception.php';

    // Check if user is signed in
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
    <main id="main" id="profile" class="profile" >
        <!-- ======= Hero Section ======= -->
        <section id="hero">
        
        <div class="container">
            <div class="flex justify-content-center">
                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                    <div data-aos="zoom-out">

                        <div class="row justify-content-center pt-2 text-center">
                            <div class="col-md-12 col-lg-8">
                                <?php
                                    if(empty($image))
                                    {
                                        echo '
                                        <img src="assets/img/profile/default2.png" class="profile_img">
                                        ';
                                    }
                                    else
                                    {
                                        echo '
                                        <img src="'.$image.'" alt="" class="profile_img">
                                        ';
                                    }

                                    echo'
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <h5 style="color: #ff8c00;">
                                                <strong>'.$fname.'  '.$lname.'</strong>
                                            </h5>
                                            <h6 class="text-white" style="font-size: 0.8rem;"> 
                                            '.$email.'
                                            </h6>
                                            <h6 class="text-white" style="font-size: 0.8rem;"> 
                                            '.$contact.' | '.$address.' |
                                            '.$company_univ.
                                            '</h6>
                                            <a href="edit_profile.php" class="btn btn-primary mb-3">Update Profile</a>
                                            <h6 class="text-white" style="font-size: 0.7rem;">
                                                <strong> Joined at <span style="color: #ff8c00;">'.$date_reg.'</span></strong>  
                                            </h6>
                                        </div>
                                    </div>
                                    ';
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

        <section>
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2 class="text-secondary">Early Access</h2>
                    <p>E-Certification Lessons</p>
                </div>
                
                <div class="container-fluid">
                    <row class="justify-content-center">
                        <a href="learn.php" target="_blank" class="btn btn-primary mb-3">Go to E-certification!</a>
                    </row>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                
                <div class="section-title" data-aos="fade-up">
                    <h2 class="text-secondary">Histories</h2>
                    <p>Transactions</p>
                </div>
                
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-11">
                            <?php
                                $stmt = $conn->prepare("select * from payments where email = ?");
                                $stmt->bind_param('s', $email);
                                $stmt->execute();
                                $res = $stmt->get_result();

                                if($res->num_rows > 0)
                                {
                                    echo'
                                    <table>
                                        <thead>
                                            <tr>
                                                <th scope="col">Examination</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">First Name</th>
                                                <th scope="col">Last Name</th>
                                                <th scope="col">Contact</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Reference Number</th>
                                                <th scope="col">Payment Method</th>
                                                <th scope="col">Date Paid</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                    ';
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
                                        $date_pay = $row['date_pay'];

                                        $type = $row['type'];

                                        $approval = $row['approval'];
                                        $status = "";
                                        
                                        if($approval == 0)// pending 
                                        {
                                            $status = '
                                            <a href="view_enrollment.php?type='.$type.'&approval='.$approval.'" 
                                            style="color: #ff8c00; font-weight: 600;">
                                                Pending
                                            </a> 
                                            ';
                                        }
                                        else
                                        if($approval == 1)//approved
                                        {
                                            $status = '
                                            <a href="view_enrollment.php?type='.$type.'&approval='.$approval.'" 
                                            style="color: green; font-weight: 600;">
                                                Approved
                                            </a> 
                                            ';
                                        }
                                        else
                                        if($approval == 2)//rejected
                                        {
                                            $status = '
                                            <a href="view_enrollment.php?type='.$type.'&approval='.$approval.'" 
                                            style="color: red; font-weight: 600;">
                                                Rejected
                                            </a> 
                                            ';
                                        }
                                        
                                        echo'
                                        <tbody>
                                            <tr>
                                                <td data-label="Type">'. $type .'</td>
                                                <td data-label="Email">'. $email .'</td>
                                                <td data-label="First Name">'. $fname .'</td>
                                                <td data-label="Last Name">'. $lname .'</td>
                                                <td data-label="Contact">'. $contact .'</td>
                                                <td data-label="Address">'. $address .'</td>
                                                <td data-label="Reference Number">'. $ref_num .'</td>
                                                <td data-label="Payment Method">'. $pay_type .'</td>
                                                <td data-label="Date Paid">'. $date_pay .'</td>
                                                <td data-label="Status">'. $status .'</td>
                                            </tr>
                                        </tbody>
                                        ';
                                    }

                                    echo'
                                    </table>
                                    ';
                                }
                                else{
                                    ?>
                                        <h2 data-aos="fade-up" style="background: rgb(0,0,0,0.6); color: white; text-align: center; padding: 20px;">
                                            No Records
                                        </h2>
                                    <?php
                                }
                                $stmt->close();
                            ?>
                        </div>
                    </div>
                </div>
                
            </div>
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