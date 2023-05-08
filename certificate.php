        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certification | EIRA</title>

    <?php
    session_start();
    include "connect.php";
    include "include/head_links.php";

    // email set up /////////////////////////////////////////////////
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    require 'PHPMailer-master/src/Exception.php';

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

    // navigation bar 
    include 'include/navbar.php';
    ?>

</head>

<body>
    
    <main>

        <?php
            include "courses/cert_comptia.php";
            include "courses/cert_its.php";
            include "courses/cert_rna.php";
            include "courses/cert_python.php";
            include "include/contact.php";
        ?>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <?php
    include "include/foot_links.php";

    // navigation bar 
    include 'include/footer.php';
    ?>

</body>

</html>