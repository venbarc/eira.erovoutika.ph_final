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

    // navigation bar 
    include 'include/navbar.php';
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
                            <h3 class="text-center text-white text-lg-center">
                                Verify your Certification
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

        <div style="margin: 5% 10%;" id="verify_cert" class="verify_cert">
            <p class="p-3 bg-warning text-center mb-5"><strong>Note: </strong> Certificate ID can be viewed on your certificate at the left bottom.</p>
            <form method="post" class="mb-5">
                <label class="form=label"><strong><h4>Certificate ID</h4></strong></label>
                <input type="text" class="form-control" placeholder="Certificate ID" name="cert_id" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required> <br>
                <button class="btn btn-primary" name="submit_verify_cert">Verify Certificate</button>
            </form>

            <!-- if submit verify cert is posted  -->
            <?php
                if(isset($_POST['submit_verify_cert']))
                {
                    // initialization 
                    $cert_id = $_POST['cert_id'];

                    $stmt = $conn->prepare("select * from result where cert_id = ?");
                    $stmt->bind_param('s', $cert_id);
                    $stmt->execute();
                    $res = $stmt->get_result();

                    if($res->num_rows > 0)
                    {
                        echo'
                            <table>
                                <thead>
                                    <tr>
                                        <th scope="col">Certificate ID</th>
                                        <th scope="col">Robotics And Automation Level</th>
                                        <th scope="col">Email/Name</th>
                                        <th scope="col">Score Percentage</th>
                                        <th scope="col">Passing Percentage</th>
                                        <th scope="col">Verdict</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Verification Status</th>
                                    </tr>
                                </thead>
                        ';
                        while($row = $res->fetch_assoc())
                        {
                            $cert_id = $row['cert_id'];
                            $rna_type = $row['rna_type'];
                            $email = $row['email'];
                            $full_name = $row['full_name'];
                            $overall_user_percent = $row['overall_user_percent'];
                            $verdict = $row['verdict'];
                            $date = date("F j, Y", strtotime($row['date'])); // format the date
                            
                            // get rna type 
                            if($rna_type == 'rna1')
                            {
                                $rna_type = 'Robotics and Automation Level 1';
                            }
                            else if($rna_type == 'rna2')
                            {
                                $rna_type = 'Robotics and Automation Level 2';
                            }
                            else if($rna_type == 'rna3')
                            {
                                $rna_type = 'Robotics and Automation Level 3';
                            }
                            echo'
                                <tbody>
                                    <tr>
                                        <td data-label="Certificate ID">'.$cert_id.'</td>
                                        <td data-label="RNA Level">'.$rna_type.'</td>
                                        <td data-label="Email/Name">'.$email.' <br> '.$full_name.'</td>
                                        <td data-label="Score Percentage">'.$overall_user_percent.'%</td>
                                        <td data-label="Passing Percentage">70 %</td>
                                        <td data-label="Verdict">'.$verdict.'</td>
                                        <td data-label="Date">'.$date.'</td>
                                        <td data-label="Verification Status" style="color: green;"><strong>Valid</strong></td>
                                    </tr>
                                </tbody>
                            ';

                        }
                        echo'
                            </table>
                        ';
                    }
                    else{
                        echo '
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            Invalid Certificate ID. Please try again.
                        </div>
                        ';
                    }
                }
            ?>

        </div>

        
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