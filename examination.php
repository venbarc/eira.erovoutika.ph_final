<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examination RNA entry Level | EIRA</title>

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

        $full_name = $fname .' '. $lname;
    }
    else{
        ?>
    <script>
        location.href = "login.php";
    </script>
    <?php
    }


    // navigation bar 
    // include 'include/navbar.php';
    ?>

</head>

<body>

    <main>

        <!--////////////// full screen codes //////////////////////// -->
        <style>
            #modal {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: darkblue;
            z-index: 9999;
            visibility: visible; /* Initially visible */
            }
            #modal-message {
            background-color: #fff;
            padding: 20px;
            font-size: 18px;
            text-align: center;
            border-radius: 5px;
            }
            ::-webkit-scrollbar{
                display: none;
            }
        </style>
        <div id="modal">
            <button id="modal-message" onclick="toggleFullScreen()">
                Your time is ticking please press here To start and don't exit full screen mode.
            </button>
        </div>
        <script>
            var modal = document.getElementById('modal');
            var modalMessage = document.getElementById('modal-message');
            var isExamStarted = false;

            document.addEventListener('keydown', function(event) {
            if (event.key === 'F11') 
            {
                if (isExamStarted) 
                {
                modal.style.visibility = 'visible';
                modalMessage.innerText = 'Press F11 to start the examination';
                isExamStarted = false;
                } 
                else 
                {
                modal.style.visibility = 'hidden';
                isExamStarted = true;
                }
            } 
            else 
            {
                // Prevent the default behavior if F11 key is not pressed
                event.preventDefault();
            }
            });

            function toggleFullScreen() 
            {
                const doc = window.document;
                const docEl = doc.documentElement;

                const requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
                const exitFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;

                if (!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) 
                {
                    requestFullScreen.call(docEl);
                    modal.style.visibility = 'hidden';
                    isExamStarted = true;
                } 
                else 
                {
                    exitFullScreen.call(doc);
                }
            }
        </script>
        <!--////////////// full screen codes //////////////////////// -->

        <!-- start  -->
        <main id="examination" class="examination">

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
                        // check if it's already approved
                        // rna section 
                        if($type == 'rna1' && $approval == 1)
                        {
                            $stmt = $conn->prepare("select * from result where email = ? and type = ?"); // check if already taken the exam
                            $stmt->bind_param('ss', $email, $type);
                            $stmt->execute();
                            $res = $stmt->get_result();

                            // if user already take the exam 
                            if($res->num_rows > 0)
                            {
                                ?>
                                    <script>
                                        location.href = "404.php";
                                    </script>
                                <?php 
                            }
                            else
                            {
                                ?>
                                    <!-- ======= start Hero ======= -->
                                    <section id="hero">
                                        <div class="container">
                                            <div class="flex justify-content-center">
                                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                    <div data-aos="zoom-out">
                                                        <h1 class="text-center text-lg-center">
                                                            Robotics And Automation Examination <br>
                                                            Entry Level
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
                                                <h2 class="text-secondary">Robotics and Automation </h2>
                                                <p style="color: #ff8c00;">
                                                    <!-- 45 minutes timer -->
                                                    <script type="text/javascript">
                                                        var timeLeft = (45 * 60);
                                                    </script>
                                                </p>
                                                <p style="position:sticky;" id="time">Timeout</p>
                                            </div>

                                            <div class="container-fluid" data-aos="fade-up">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 col-lg-11">
                                                        <!-- user data for enrollment -->
                                                        
                                                        <?php 
                                                        
                                                            $stmt = $conn->prepare("select * from test where type = ? order by rand() limit 40");
                                                            $stmt->bind_param('s', $type);
                                                            $stmt->execute();
                                                            $res = $stmt->get_result();
                                                            $count_ques = 1;

                                                            if($res->num_rows)
                                                            {
                                                                ?>
                                                                    <form method="post">
                                                                        <!-- buttons for previous and next and submit button================================================ -->
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-5">
                                                                                <button type="button" id="prev" class="btn btn-primary">Previous</button>
                                                                                <button type="button" id="next" class="btn btn-primary">Next</button>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div id="submit-container" style="display:none; text-align: center;">
                                                                                    <button type="submit" id="submit_id" name="submit_quiz" class="btn btn-primary">
                                                                                    <h6 class="text-white"> Submit Examination </h6>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br><br>

                                                                        <!-- script for timer ============================================================= -->
                                                                        <script>
                                                                            function timeout() {
                                                                            var minutes = Math.floor(timeLeft / 60);
                                                                            var seconds = timeLeft % 60;
                                                                            var mins = checktime(minutes);
                                                                            var secs = checktime(seconds);

                                                                                if (timeLeft <= 0) {
                                                                                    clearTimeout(tm);
                                                                                    document.getElementById("submit_id").click();
                                                                                } else {
                                                                                    document.getElementById("time").innerHTML = mins + ":" + secs;
                                                                                }
                                                                                timeLeft--;
                                                                                var tm = setTimeout(function () { timeout() }, 1000);
                                                                            }

                                                                            function checktime(msg) {
                                                                                if (msg < 10) {
                                                                                    msg = "0" + msg;
                                                                                }
                                                                                return msg;
                                                                            }
                                                                            timeout();
                                                                        </script>

                                                                        <!-- wrap thw whole while to display question one by one on the same position -->
                                                                        <div id="question-container">
                                                                <?php
                                                                while($row = $res->fetch_assoc())
                                                                {
                                                                    $question = $row['question'];
                                                                    $opt1 = $row['opt1'];
                                                                    $opt2 = $row['opt2'];
                                                                    $opt3 = $row['opt3'];
                                                                    $opt4 = $row['opt4'];
                                                                    $answer = $row['answer'];

                                                                    $ques_type = $row['ques_type'];
                                                                    $image = $row['image'];

                                                                    // this is to shuffle options 
                                                                    $options = array($opt1, $opt2, $opt3, $opt4);
                                                                    shuffle($options);
                                                                    ?>
                                                                        <!-- add question class in row to display question one by one  -->
                                                                        <div class="row question">
                                                                            <!-- question here  -->
                                                                            <div class="col-md-12 mb-3">
                                                                                <h6 class="fw-bold">
                                                                                    <?php echo $count_ques++ .' .) '. $question ?>
                                                                                </h6>
                                                                                <!-- image here  -->
                                                                                <?php
                                                                                    if(empty($image))
                                                                                    {
                                                                                        $image = '';
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $image = ' <img src="admin/'.$image.'" class="img-fluid"> ';
                                                                                    }
                                                                                    echo $image;
                                                                                ?>
                                                                            </div>
                                                                            <!-- Option  -->
                                                                            <div class="col-md-12 ml-5">
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[0] ?>" class="mb-3"/>
                                                                                    <span><h6>A.) &nbsp; </h6><?php echo $options[0] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[1] ?>" class="mb-3"/>
                                                                                    <span><h6>B.) &nbsp; </h6><?php echo $options[1] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[2] ?>" class="mb-3"/>
                                                                                    <span><h6>C.) &nbsp; </h6><?php echo $options[2] ?></span>
                                                                                </label>
                                                                                <label title=<?php echo $answer ?>>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[3] ?>" class="mb-3"/>
                                                                                    <span><h6>D.) &nbsp; </h6><?php echo $options[3] ?></span>
                                                                                </label>
                                                                            </div>
                                                                            <!-- Default answer  -->
                                                                            <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="default_answer" checked style="display: none;">

                                                                            <!-- identify question type  -->
                                                                            <input type="hidden" name="ques_type[<?php echo $row['id'] ?>]" value="<?php echo $ques_type ?>" readonly>
                                                                            
                                                                        </div>                                                                
                                                                    <?php
                                                                }
                                                                ?>
                                                                        </div>
                                                                    </form>

                                                                    <!-- style and script for next and previous Button ======================================  -->
                                                                    <style>
                                                                        #question-container {
                                                                            position: relative;
                                                                            height: 100%;
                                                                            margin-bottom: 100%;
                                                                        }

                                                                        .question {
                                                                            position: absolute;
                                                                            top: 0;
                                                                            left: 0;
                                                                            width: 100%;
                                                                            height: 100%;
                                                                            display: none;
                                                                        }

                                                                        .question:first-child {
                                                                            display: block;
                                                                        }
                                                                    </style>
                                                                    <script>
                                                                        var currentQuestion = 1;
                                                                        var numQuestions = <?php echo $count_ques-1; ?>; // number of questions, excluding the submit button

                                                                        document.getElementById("next").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion++;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion == numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "block";
                                                                            }
                                                                        });

                                                                        document.getElementById("prev").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion > 1) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion--;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "none";
                                                                            }
                                                                        });


                                                                        // browser restriction 
                                                                        // var tabContainer = document.getElementById('examination');
                                                                        // var warn = 2;

                                                                        // tabContainer.addEventListener('mouseenter', handleMouseEnter)   
                                                                        // tabContainer.addEventListener('mouseleave', handleMouseLeave)
                                                                        
                                                                        // // mouse is inside the browser  
                                                                        // function handleMouseEnter() 
                                                                        // {
                                                                        //     console.log('Mouse entered the tab');
                                                                        // }
                                                                        // // mouse is outside the browser  
                                                                        // function handleMouseLeave() 
                                                                        // {
                                                                        //     if(warn > 0)
                                                                        //     {
                                                                        //         alert('you can\'t leave during the examination ! warning left: '
                                                                        //          +  warn);
                                                                        //          warn --;
                                                                        //     }
                                                                        //     else if(warn == 0)
                                                                        //     {
                                                                        //         document.getElementById("submit_id").click();
                                                                        //     }

                                                                        // }

                                                                        // Declare the warn variables outside the event listener to retain their values
                                                                        var warnAlt = 2;
                                                                        var warnCtrl = 2;
                                                                        var warnPrtSc = 2;

                                                                        // Disable Alt, Ctrl, and Print Screen keys
                                                                        document.addEventListener("keydown", function(event) 
                                                                        {
                                                                            if (event.key === "Alt") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnAlt > 0) 
                                                                                {
                                                                                    alert("Warning: Alt + Tab is forbidden. Remaining warnings: " + warnAlt);
                                                                                    warnAlt--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            } 
                                                                            else if (event.key === "Control") 
                                                                            {   
                                                                                event.preventDefault();
                                                                                if (warnCtrl > 0) 
                                                                                {
                                                                                    alert("Warning: ctrl is forbidden. Remaining warnings: " + warnCtrl);
                                                                                    warnCtrl--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                            else if (event.key === "PrintScreen") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnPrtSc > 0) 
                                                                                {
                                                                                    alert("Warning: PrtSc is forbidden. Remaining warnings: " + warnPrtSc);
                                                                                    warnPrtSc--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                        });
                                                                    </script>
                                                                <?php
                                                            }
                                                            $stmt->close();

                                                            //if quiz is submitted 
                                                            if(isset($_POST['submit_quiz']))
                                                            {
                                                                // users answer in form
                                                                $answer = $_POST['answer'];
                                                                // users ques_type in form
                                                                $ques_type = $_POST['ques_type'];

                                                                // get maximum percentage per question type
                                                                $max_percent_1 = 0; 
                                                                $max_percent_2 = 0; 
                                                                $max_percent_3 = 0; 
                                                                $max_percent_4 = 0.0;
                                                                $overall_max_percent = 0; 

                                                                // get users percentage per question type
                                                                $user_percent_1 = 0; 
                                                                $user_percent_2 = 0; 
                                                                $user_percent_3 = 0; 
                                                                $user_percent_4 = 0; 
                                                                $overall_user_percent = 0; 

                                                                // Count question type
                                                                $count_1 = 0; 
                                                                $count_2 = 0; 
                                                                $count_3 = 0; 
                                                                $count_4 = 0; 

                                                                // correct, wrong and unanswered variables 
                                                                $correct = 0;
                                                                $wrong = 0;
                                                                $unanswered = 0;

                                                                // total count question for question type 
                                                                $total_question_1 = 0;
                                                                $total_question_2 = 0;
                                                                $total_question_3 = 0;
                                                                $total_question_4 = 0;

                                                                $verdict = '';

                                                                // initialization for correct, wrong, and unanswered per question types
                                                                $correct_1 = 0; $wrong_1 = 0; $unanswered_1 = 0;
                                                                $correct_2 = 0; $wrong_2 = 0; $unanswered_2 = 0;
                                                                $correct_3 = 0; $wrong_3 = 0; $unanswered_3 = 0;
                                                                $correct_4 = 0; $wrong_4 = 0; $unanswered_4 = 0;

                                                                // total question count 
                                                                $total_questions = 40;

                                                                // generate certificate id 
                                                                $cert_id = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 12);

                                                                foreach($answer as $question_id => $answer)
                                                                {
                                                                    // get answer 
                                                                    $stmt = $conn->prepare("select * from test where id = ?");
                                                                    $stmt->bind_param('i', $question_id);
                                                                    $stmt->execute();
                                                                    $res = $stmt->get_result();
                                                                    $row = mysqli_fetch_assoc($res);

                                                                    // answer from db 
                                                                    $correct_answer = $row['answer'];
                                                                    // ques_type from db 
                                                                    $ques_type = $row['ques_type'];

                                                                    // get count of every question type first
                                                                    if($ques_type == 'rnat')
                                                                    {
                                                                        $count_1 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_1 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_1 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_1 ++ ;
                                                                        }
                                                                        // percentage for rnat
                                                                        if($count_1 > 0)
                                                                        {
                                                                            // Max percentage for rnat
                                                                            $max_percent_1 = ($count_1 / $total_questions) * 100;
                                                                            // users percentage for rnat
                                                                            $user_percent_1 = ($correct_1 / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'rap')
                                                                    {
                                                                        $count_2 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_2 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_2 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_2 ++ ;
                                                                        }
                                                                        // percentage for rap
                                                                        if($count_2 > 0)
                                                                        {
                                                                            // Max percentage for rap
                                                                            $max_percent_2 = ($count_2 / $total_questions) * 100;
                                                                            // users percentage for rap
                                                                            $user_percent_2 = ($correct_2 / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'rat')
                                                                    {
                                                                        $count_3 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_3 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_3 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_3 ++ ;
                                                                        }
                                                                        // percentage for rat
                                                                        if($count_3 > 0)
                                                                        {
                                                                            // Max percentage for rat
                                                                            $max_percent_3 = ($count_3 / $total_questions) * 100;
                                                                            // users percentage for rat
                                                                            $user_percent_3 = ($correct_3 / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'dai')
                                                                    {
                                                                        $count_4 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_4 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_4 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_4 ++ ;
                                                                        }
                                                                        // percentage for dai
                                                                        if($count_4 > 0)
                                                                        {
                                                                            // Max percentage for dai
                                                                            $max_percent_4 = ($count_4 / $total_questions) * 100;
                                                                            // users percentage for dai
                                                                            $user_percent_4 = ($correct_4 / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    // over all max percentages 
                                                                    $overall_max_percent = $max_percent_1 + $max_percent_2 + $max_percent_3 + $max_percent_4;
                                                                    // over all users percentages 
                                                                    $overall_user_percent = $user_percent_1 + $user_percent_2 + $user_percent_3 + $user_percent_4;
                                                                    // VERDICT 
                                                                    if($overall_user_percent >= 70)
                                                                    {
                                                                        $verdict = 'passed';
                                                                    }
                                                                    else{
                                                                        $verdict = 'failed';
                                                                    }
                                                                }
                                                                $stmt->close();

                                                                // insert data in result db 
                                                                $stmt = $conn->prepare("insert into result 
                                                                (cert_id, type, email, full_name,
                                                                user_percent_1, user_percent_2, user_percent_3, user_percent_4, overall_user_percent,  
                                                                max_percent_1, max_percent_2, max_percent_3, max_percent_4, overall_max_percent, verdict) 
                                                                value (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                                                $stmt->bind_param('ssssdddddddddis', 
                                                                $cert_id, $type, $email, $full_name, 
                                                                $user_percent_1, $user_percent_2, $user_percent_3, $user_percent_4, $overall_user_percent,
                                                                $max_percent_1, $max_percent_2, $max_percent_3, $max_percent_4, $overall_max_percent, 
                                                                $verdict );
                                                                $stmt->execute();

                                                                if($stmt->affected_rows > 0)
                                                                {
                                                                    ?>
                                                                        <script>
                                                                            location.href = 'result_examination.php?type=<?php echo $type?>';
                                                                        </script>
                                                                    <?php
                                                                }
                                                                else{
                                                                    echo '
                                                                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                        Something went wrong, please try again!
                                                                    </div>
                                                                    ';
                                                                }
                                                                $stmt->close();

                                                            }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </section>
                                <?php 
                            }
                        }
                        else
                        if($type == 'rna2' && $approval == 1)   
                        {
                            $stmt = $conn->prepare("select * from result where email = ? and type = ?"); // check if already taken the exam
                            $stmt->bind_param('ss', $email, $type);
                            $stmt->execute();
                            $res = $stmt->get_result();

                            // if user already take the exam 
                            if($res->num_rows > 0)
                            {
                                ?>
                                    <script>
                                        location.href = "404.php";
                                    </script>
                                <?php 
                            }
                            else
                            {
                                ?>
                                    <!-- ======= start Hero ======= -->
                                    <section id="hero">
                                        <div class="container">
                                            <div class="flex justify-content-center">
                                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                    <div data-aos="zoom-out">
                                                        <h1 class="text-center text-lg-center">
                                                            Robotics And Automation Examination <br>
                                                            Intermediate Level
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
                                                <h2 class="text-secondary">Robotics and Automation </h2>
                                                <p style="color: #ff8c00;">
                                                    <!-- 45 minutes timer -->
                                                    <script type="text/javascript">
                                                        var timeLeft = (45 * 60);
                                                    </script>
                                                </p>
                                                <p style="position:sticky;" id="time">Timeout</p>
                                            </div>

                                            <div class="container-fluid" data-aos="fade-up">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 col-lg-11">
                                                        <!-- user data for enrollment -->
                                                        
                                                        <?php 
                                                        
                                                            $stmt = $conn->prepare("select * from test where type = ? order by rand() limit 40");
                                                            $stmt->bind_param('s', $type);
                                                            $stmt->execute();
                                                            $res = $stmt->get_result();
                                                            $count_ques = 1;

                                                            if($res->num_rows)
                                                            {
                                                                ?>
                                                                    <form method="post">
                                                                        <!-- buttons for previous and next and submit button================================================ -->
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-5">
                                                                                <button type="button" id="prev" class="btn btn-primary">Previous</button>
                                                                                <button type="button" id="next" class="btn btn-primary">Next</button>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div id="submit-container" style="display:none; text-align: center;">
                                                                                    <button type="submit" id="submit_id" name="submit_quiz" class="btn btn-primary">
                                                                                    <h6 class="text-white"> Submit Examination </h6>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br><br>

                                                                        <!-- script for timer ============================================================= -->
                                                                        <script>
                                                                            function timeout() {
                                                                            var minutes = Math.floor(timeLeft / 60);
                                                                            var seconds = timeLeft % 60;
                                                                            var mins = checktime(minutes);
                                                                            var secs = checktime(seconds);

                                                                                if (timeLeft <= 0) {
                                                                                    clearTimeout(tm);
                                                                                    document.getElementById("submit_id").click();
                                                                                } else {
                                                                                    document.getElementById("time").innerHTML = mins + ":" + secs;
                                                                                }
                                                                                timeLeft--;
                                                                                var tm = setTimeout(function () { timeout() }, 1000);
                                                                            }

                                                                            function checktime(msg) {
                                                                                if (msg < 10) {
                                                                                    msg = "0" + msg;
                                                                                }
                                                                                return msg;
                                                                            }
                                                                            timeout();
                                                                        </script>

                                                                        <!-- wrap thw whole while to display question one by one on the same position -->
                                                                        <div id="question-container">
                                                                <?php
                                                                while($row = $res->fetch_assoc())
                                                                {
                                                                    $question = $row['question'];
                                                                    $opt1 = $row['opt1'];
                                                                    $opt2 = $row['opt2'];
                                                                    $opt3 = $row['opt3'];
                                                                    $opt4 = $row['opt4'];
                                                                    $answer = $row['answer'];

                                                                    $ques_type = $row['ques_type'];
                                                                    $image = $row['image'];

                                                                    // this is to shuffle options 
                                                                    $options = array($opt1, $opt2, $opt3, $opt4);
                                                                    shuffle($options);
                                                                    ?>
                                                                        <!-- add question class in row to display question one by one  -->
                                                                        <div class="row question">
                                                                            <!-- question here  -->
                                                                            <div class="col-md-12 mb-3">
                                                                                <h6 class="fw-bold">
                                                                                    <?php echo $count_ques++ .' .) '. $question ?>
                                                                                </h6>
                                                                                <!-- image here  -->
                                                                                <?php
                                                                                    if(empty($image))
                                                                                    {
                                                                                        $image = '';
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $image = ' <img src="admin/'.$image.'" class="img-fluid"> ';
                                                                                    }
                                                                                    echo $image;
                                                                                ?>
                                                                            </div>
                                                                            <!-- Option  -->
                                                                            <div class="col-md-12 ml-5">
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[0] ?>" class="mb-3"/>
                                                                                    <span><h6>A.) &nbsp; </h6><?php echo $options[0] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[1] ?>" class="mb-3"/>
                                                                                    <span><h6>B.) &nbsp; </h6><?php echo $options[1] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[2] ?>" class="mb-3"/>
                                                                                    <span><h6>C.) &nbsp; </h6><?php echo $options[2] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[3] ?>" class="mb-3"/>
                                                                                    <span><h6>D.) &nbsp; </h6><?php echo $options[3] ?></span>
                                                                                </label>
                                                                            </div>
                                                                            <!-- Default answer  -->
                                                                            <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="default_answer" checked style="display: none;">

                                                                            <!-- identify question type  -->
                                                                            <input type="hidden" name="ques_type[<?php echo $row['id'] ?>]" value="<?php echo $ques_type ?>" readonly>
                                                                            
                                                                        </div>                                                                
                                                                    <?php
                                                                }
                                                                ?>
                                                                        </div>
                                                                    </form>

                                                                    <!-- style and script for next and previous Button ======================================  -->
                                                                    <style>
                                                                        #question-container {
                                                                            position: relative;
                                                                            height: 100%;
                                                                            margin-bottom: 100%;
                                                                        }

                                                                        .question {
                                                                            position: absolute;
                                                                            top: 0;
                                                                            left: 0;
                                                                            width: 100%;
                                                                            height: 100%;
                                                                            display: none;
                                                                        }

                                                                        .question:first-child {
                                                                            display: block;
                                                                        }
                                                                    </style>
                                                                    <script>
                                                                        var currentQuestion = 1;
                                                                        var numQuestions = <?php echo $count_ques-1; ?>; // number of questions, excluding the submit button

                                                                        document.getElementById("next").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion++;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion == numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "block";
                                                                            }
                                                                        });

                                                                        document.getElementById("prev").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion > 1) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion--;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "none";
                                                                            }
                                                                        });


                                                                        // browser restriction 
                                                                        // var tabContainer = document.getElementById('examination');
                                                                        // var warn = 2;

                                                                        // tabContainer.addEventListener('mouseenter', handleMouseEnter)   
                                                                        // tabContainer.addEventListener('mouseleave', handleMouseLeave)
                                                                        
                                                                        // // mouse is inside the browser  
                                                                        // function handleMouseEnter() 
                                                                        // {
                                                                        //     console.log('Mouse entered the tab');
                                                                        // }
                                                                        // // mouse is outside the browser  
                                                                        // function handleMouseLeave() 
                                                                        // {
                                                                        //     if(warn > 0)
                                                                        //     {
                                                                        //         alert('you can\'t leave during the examination ! warning left: '
                                                                        //          +  warn);
                                                                        //          warn --;
                                                                        //     }
                                                                        //     else if(warn == 0)
                                                                        //     {
                                                                        //         document.getElementById("submit_id").click();
                                                                        //     }

                                                                        // }

                                                                        // Declare the warn variables outside the event listener to retain their values
                                                                        var warnAlt = 2;
                                                                        var warnCtrl = 2;
                                                                        var warnPrtSc = 2;

                                                                        // Disable Alt, Ctrl, and Print Screen keys
                                                                        document.addEventListener("keydown", function(event) 
                                                                        {
                                                                            if (event.key === "Alt") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnAlt > 0) 
                                                                                {
                                                                                    alert("Warning: Alt + Tab is forbidden. Remaining warnings: " + warnAlt);
                                                                                    warnAlt--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            } 
                                                                            else if (event.key === "Control") 
                                                                            {   
                                                                                event.preventDefault();
                                                                                if (warnCtrl > 0) 
                                                                                {
                                                                                    alert("Warning: ctrl is forbidden. Remaining warnings: " + warnCtrl);
                                                                                    warnCtrl--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                            else if (event.key === "PrintScreen") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnPrtSc > 0) 
                                                                                {
                                                                                    alert("Warning: PrtSc is forbidden. Remaining warnings: " + warnPrtSc);
                                                                                    warnPrtSc--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                        });
                                                                    </script>
                                                                <?php
                                                            }
                                                            $stmt->close();

                                                            //if quiz is submitted 
                                                            if(isset($_POST['submit_quiz']))
                                                            {
                                                                // users answer in form
                                                                $answer = $_POST['answer'];
                                                                // users ques_type in form
                                                                $ques_type = $_POST['ques_type'];

                                                                // get maximum percentage per question type
                                                                $max_percent_1 = 0; 
                                                                $max_percent_2 = 0; 
                                                                $max_percent_3 = 0; 
                                                                $max_percent_4 = 0.0;
                                                                $overall_max_percent = 0; 

                                                                // get users percentage per question type
                                                                $user_percent_1 = 0; 
                                                                $user_percent_2 = 0; 
                                                                $user_percent_3 = 0; 
                                                                $user_percent_4 = 0; 
                                                                $overall_user_percent = 0; 

                                                                // Count question type
                                                                $count_1 = 0; 
                                                                $count_2 = 0; 
                                                                $count_3 = 0; 
                                                                $count_4 = 0; 

                                                                // correct, wrong and unanswered variables 
                                                                $correct = 0;
                                                                $wrong = 0;
                                                                $unanswered = 0;

                                                                // total count question for question type 
                                                                $total_question_1 = 0;
                                                                $total_question_2 = 0;
                                                                $total_question_3 = 0;
                                                                $total_question_4 = 0;

                                                                $verdict = '';

                                                                // initialization for correct, wrong, and unanswered per question types
                                                                $correct_1 = 0; $wrong_1 = 0; $unanswered_1 = 0;
                                                                $correct_2 = 0; $wrong_2 = 0; $unanswered_2 = 0;
                                                                $correct_3 = 0; $wrong_3 = 0; $unanswered_3 = 0;
                                                                $correct_4 = 0; $wrong_4 = 0; $unanswered_4 = 0;

                                                                // total question count 
                                                                $total_questions = 40;

                                                                // generate certificate id 
                                                                $cert_id = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 12);

                                                                foreach($answer as $question_id => $answer)
                                                                {
                                                                    // get answer 
                                                                    $stmt = $conn->prepare("select * from test where id = ?");
                                                                    $stmt->bind_param('i', $question_id);
                                                                    $stmt->execute();
                                                                    $res = $stmt->get_result();
                                                                    $row = mysqli_fetch_assoc($res);

                                                                    // answer from db 
                                                                    $correct_answer = $row['answer'];
                                                                    // ques_type from db 
                                                                    $ques_type = $row['ques_type'];

                                                                    // get count of every question type first
                                                                    if($ques_type == 'rnat')
                                                                    {
                                                                        $count_1 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_1 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_1 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_1 ++ ;
                                                                        }
                                                                        // percentage for rnat
                                                                        if($count_1 > 0)
                                                                        {
                                                                            // Max percentage for rnat
                                                                            $max_percent_1 = ($count_1 / $total_questions) * 100;
                                                                            // users percentage for rnat
                                                                            $user_percent_1 = ($correct_1 / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'rap')
                                                                    {
                                                                        $count_2 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_2 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_2 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_2 ++ ;
                                                                        }
                                                                        // percentage for rap
                                                                        if($count_2 > 0)
                                                                        {
                                                                            // Max percentage for rap
                                                                            $max_percent_2 = ($count_2 / $total_questions) * 100;
                                                                            // users percentage for rap
                                                                            $user_percent_2 = ($correct_2 / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'rat')
                                                                    {
                                                                        $count_3 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_3 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_3 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_3 ++ ;
                                                                        }
                                                                        // percentage for rat
                                                                        if($count_3 > 0)
                                                                        {
                                                                            // Max percentage for rat
                                                                            $max_percent_3 = ($count_3 / $total_questions) * 100;
                                                                            // users percentage for rat
                                                                            $user_percent_3 = ($correct_3 / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'dai')
                                                                    {
                                                                        $count_4 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_4 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_4 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_4 ++ ;
                                                                        }
                                                                        // percentage for dai
                                                                        if($count_4 > 0)
                                                                        {
                                                                            // Max percentage for dai
                                                                            $max_percent_4 = ($count_4 / $total_questions) * 100;
                                                                            // users percentage for dai
                                                                            $user_percent_4 = ($correct_4 / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    // over all max percentages 
                                                                    $overall_max_percent = $max_percent_1 + $max_percent_2 + $max_percent_3 + $max_percent_4;
                                                                    // over all users percentages 
                                                                    $overall_user_percent = $user_percent_1 + $user_percent_2 + $user_percent_3 + $user_percent_4;
                                                                    // VERDICT 
                                                                    if($overall_user_percent >= 70)
                                                                    {
                                                                        $verdict = 'passed';
                                                                    }
                                                                    else{
                                                                        $verdict = 'failed';
                                                                    }
                                                                }
                                                                $stmt->close();

                                                                // insert data in result db 
                                                                $stmt = $conn->prepare("insert into result 
                                                                (cert_id, type, email, full_name,
                                                                user_percent_1, user_percent_2, user_percent_3, user_percent_4, overall_user_percent,  
                                                                max_percent_1, max_percent_2, max_percent_3, max_percent_4, overall_max_percent, verdict) 
                                                                value (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                                                $stmt->bind_param('ssssdddddddddis', 
                                                                $cert_id, $type, $email, $full_name, 
                                                                $user_percent_1, $user_percent_2, $user_percent_3, $user_percent_4, $overall_user_percent,
                                                                $max_percent_1, $max_percent_2, $max_percent_3, $max_percent_4, $overall_max_percent, 
                                                                $verdict );
                                                                $stmt->execute();

                                                                if($stmt->affected_rows > 0)
                                                                {
                                                                    ?>
                                                                        <script>
                                                                            location.href = 'result_examination.php?type=<?php echo $type?>';
                                                                        </script>
                                                                    <?php
                                                                }
                                                                else{
                                                                    echo '
                                                                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                        Something went wrong, please try again!
                                                                    </div>
                                                                    ';
                                                                }
                                                                $stmt->close();

                                                            }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </section>
                                <?php 
                            }
                        } 
                        else
                        if($type == 'rna3' && $approval == 1)
                        {
                            $stmt = $conn->prepare("select * from result where email = ? and type = ?"); // check if already taken the exam
                            $stmt->bind_param('ss', $email, $type);
                            $stmt->execute();
                            $res = $stmt->get_result();

                            // if user already take the exam 
                            if($res->num_rows > 0)
                            {
                                ?>
                                    <script>
                                        location.href = "404.php";
                                    </script>
                                <?php 
                            }
                            else
                            {
                                ?>
                                    <!-- ======= start Hero ======= -->
                                    <section id="hero">
                                        <div class="container">
                                            <div class="flex justify-content-center">
                                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                    <div data-aos="zoom-out">
                                                        <h1 class="text-center text-lg-center">
                                                            Robotics And Automation Examination <br>
                                                            Advance Level
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
                                                <h2 class="text-secondary">Robotics and Automation </h2>
                                                <p style="color: #ff8c00;">
                                                    <!-- 45 minutes timer -->
                                                    <script type="text/javascript">
                                                        var timeLeft = (45 * 60);
                                                    </script>
                                                </p>
                                                <p style="position:sticky;" id="time">Timeout</p>
                                            </div>

                                            <div class="container-fluid" data-aos="fade-up">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 col-lg-11">
                                                        <!-- user data for enrollment -->
                                                        
                                                        <?php 
                                                        
                                                            $stmt = $conn->prepare("select * from test where type = ? order by rand() limit 40");
                                                            $stmt->bind_param('s', $type);
                                                            $stmt->execute();
                                                            $res = $stmt->get_result();
                                                            $count_ques = 1;

                                                            if($res->num_rows)
                                                            {
                                                                ?>
                                                                    <form method="post">
                                                                        <!-- buttons for previous and next and submit button================================================ -->
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-5">
                                                                                <button type="button" id="prev" class="btn btn-primary">Previous</button>
                                                                                <button type="button" id="next" class="btn btn-primary">Next</button>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div id="submit-container" style="display:none; text-align: center;">
                                                                                    <button type="submit" id="submit_id" name="submit_quiz" class="btn btn-primary">
                                                                                    <h6 class="text-white"> Submit Examination </h6>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br><br>

                                                                        <!-- script for timer ============================================================= -->
                                                                        <script>
                                                                            function timeout() {
                                                                            var minutes = Math.floor(timeLeft / 60);
                                                                            var seconds = timeLeft % 60;
                                                                            var mins = checktime(minutes);
                                                                            var secs = checktime(seconds);

                                                                                if (timeLeft <= 0) {
                                                                                    clearTimeout(tm);
                                                                                    document.getElementById("submit_id").click();
                                                                                } else {
                                                                                    document.getElementById("time").innerHTML = mins + ":" + secs;
                                                                                }
                                                                                timeLeft--;
                                                                                var tm = setTimeout(function () { timeout() }, 1000);
                                                                            }

                                                                            function checktime(msg) {
                                                                                if (msg < 10) {
                                                                                    msg = "0" + msg;
                                                                                }
                                                                                return msg;
                                                                            }
                                                                            timeout();
                                                                        </script>

                                                                        <!-- wrap thw whole while to display question one by one on the same position -->
                                                                        <div id="question-container">
                                                                <?php
                                                                while($row = $res->fetch_assoc())
                                                                {
                                                                    $question = $row['question'];
                                                                    $opt1 = $row['opt1'];
                                                                    $opt2 = $row['opt2'];
                                                                    $opt3 = $row['opt3'];
                                                                    $opt4 = $row['opt4'];
                                                                    $answer = $row['answer'];

                                                                    $ques_type = $row['ques_type'];
                                                                    $image = $row['image'];

                                                                    // this is to shuffle options 
                                                                    $options = array($opt1, $opt2, $opt3, $opt4);
                                                                    shuffle($options);
                                                                    ?>
                                                                        <!-- add question class in row to display question one by one  -->
                                                                        <div class="row question">
                                                                            <!-- question here  -->
                                                                            <div class="col-md-12 mb-3">
                                                                                <h6 class="fw-bold">
                                                                                    <?php echo $count_ques++ .' .) '. $question ?>
                                                                                </h6>
                                                                                <!-- image here  -->
                                                                                <?php
                                                                                    if(empty($image))
                                                                                    {
                                                                                        $image = '';
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $image = ' <img src="admin/'.$image.'" class="img-fluid"> ';
                                                                                    }
                                                                                    echo $image;
                                                                                ?>
                                                                            </div>
                                                                            <!-- Option  -->
                                                                            <div class="col-md-12 ml-5">
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[0] ?>" class="mb-3"/>
                                                                                    <span><h6>A.) &nbsp; </h6><?php echo $options[0] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[1] ?>" class="mb-3"/>
                                                                                    <span><h6>B.) &nbsp; </h6><?php echo $options[1] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[2] ?>" class="mb-3"/>
                                                                                    <span><h6>C.) &nbsp; </h6><?php echo $options[2] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[3] ?>" class="mb-3"/>
                                                                                    <span><h6>D.) &nbsp; </h6><?php echo $options[3] ?></span>
                                                                                </label>
                                                                            </div>
                                                                            <!-- Default answer  -->
                                                                            <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="default_answer" checked style="display: none;">

                                                                            <!-- identify question type  -->
                                                                            <input type="hidden" name="ques_type[<?php echo $row['id'] ?>]" value="<?php echo $ques_type ?>" readonly>
                                                                            
                                                                        </div>                                                                
                                                                    <?php
                                                                }
                                                                ?>
                                                                        </div>
                                                                    </form>

                                                                    <!-- style and script for next and previous Button ======================================  -->
                                                                    <style>
                                                                        #question-container {
                                                                            position: relative;
                                                                            height: 100%;
                                                                            margin-bottom: 100%;
                                                                        }

                                                                        .question {
                                                                            position: absolute;
                                                                            top: 0;
                                                                            left: 0;
                                                                            width: 100%;
                                                                            height: 100%;
                                                                            display: none;
                                                                        }

                                                                        .question:first-child {
                                                                            display: block;
                                                                        }
                                                                    </style>
                                                                    <script>
                                                                        var currentQuestion = 1;
                                                                        var numQuestions = <?php echo $count_ques-1; ?>; // number of questions, excluding the submit button

                                                                        document.getElementById("next").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion++;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion == numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "block";
                                                                            }
                                                                        });

                                                                        document.getElementById("prev").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion > 1) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion--;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "none";
                                                                            }
                                                                        });


                                                                        // browser restriction 
                                                                        // var tabContainer = document.getElementById('examination');
                                                                        // var warn = 2;

                                                                        // tabContainer.addEventListener('mouseenter', handleMouseEnter)   
                                                                        // tabContainer.addEventListener('mouseleave', handleMouseLeave)
                                                                        
                                                                        // // mouse is inside the browser  
                                                                        // function handleMouseEnter() 
                                                                        // {
                                                                        //     console.log('Mouse entered the tab');
                                                                        // }
                                                                        // // mouse is outside the browser  
                                                                        // function handleMouseLeave() 
                                                                        // {
                                                                        //     if(warn > 0)
                                                                        //     {
                                                                        //         alert('you can\'t leave during the examination ! warning left: '
                                                                        //          +  warn);
                                                                        //          warn --;
                                                                        //     }
                                                                        //     else if(warn == 0)
                                                                        //     {
                                                                        //         document.getElementById("submit_id").click();
                                                                        //     }

                                                                        // }

                                                                        // Declare the warn variables outside the event listener to retain their values
                                                                        var warnAlt = 2;
                                                                        var warnCtrl = 2;
                                                                        var warnPrtSc = 2;

                                                                        // Disable Alt, Ctrl, and Print Screen keys
                                                                        document.addEventListener("keydown", function(event) 
                                                                        {
                                                                            if (event.key === "Alt") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnAlt > 0) 
                                                                                {
                                                                                    alert("Warning: Alt + Tab is forbidden. Remaining warnings: " + warnAlt);
                                                                                    warnAlt--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            } 
                                                                            else if (event.key === "Control") 
                                                                            {   
                                                                                event.preventDefault();
                                                                                if (warnCtrl > 0) 
                                                                                {
                                                                                    alert("Warning: ctrl is forbidden. Remaining warnings: " + warnCtrl);
                                                                                    warnCtrl--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                            else if (event.key === "PrintScreen") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnPrtSc > 0) 
                                                                                {
                                                                                    alert("Warning: PrtSc is forbidden. Remaining warnings: " + warnPrtSc);
                                                                                    warnPrtSc--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                        });
                                                                    </script>
                                                                <?php
                                                            }
                                                            $stmt->close();

                                                            //if quiz is submitted 
                                                            if(isset($_POST['submit_quiz']))
                                                            {
                                                                // users answer in form
                                                                $answer = $_POST['answer'];
                                                                // users ques_type in form
                                                                $ques_type = $_POST['ques_type'];

                                                                // get maximum percentage per question type
                                                                $max_percent_1 = 0; 
                                                                $max_percent_2 = 0; 
                                                                $max_percent_3 = 0; 
                                                                $max_percent_4 = 0.0;
                                                                $overall_max_percent = 0; 

                                                                // get users percentage per question type
                                                                $user_percent_1 = 0; 
                                                                $user_percent_2 = 0; 
                                                                $user_percent_3 = 0; 
                                                                $user_percent_4 = 0; 
                                                                $overall_user_percent = 0; 

                                                                // Count question type
                                                                $count_1 = 0; 
                                                                $count_2 = 0; 
                                                                $count_3 = 0; 
                                                                $count_4 = 0; 

                                                                // correct, wrong and unanswered variables 
                                                                $correct = 0;
                                                                $wrong = 0;
                                                                $unanswered = 0;

                                                                // total count question for question type 
                                                                $total_question_1 = 0;
                                                                $total_question_2 = 0;
                                                                $total_question_3 = 0;
                                                                $total_question_4 = 0;

                                                                $verdict = '';

                                                                // initialization for correct, wrong, and unanswered per question types
                                                                $correct_1 = 0; $wrong_1 = 0; $unanswered_1 = 0;
                                                                $correct_2 = 0; $wrong_2 = 0; $unanswered_2 = 0;
                                                                $correct_3 = 0; $wrong_3 = 0; $unanswered_3 = 0;
                                                                $correct_4 = 0; $wrong_4 = 0; $unanswered_4 = 0;

                                                                // total question count 
                                                                $total_questions = 40;

                                                                // generate certificate id 
                                                                $cert_id = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 12);

                                                                foreach($answer as $question_id => $answer)
                                                                {
                                                                    // get answer 
                                                                    $stmt = $conn->prepare("select * from test where id = ?");
                                                                    $stmt->bind_param('i', $question_id);
                                                                    $stmt->execute();
                                                                    $res = $stmt->get_result();
                                                                    $row = mysqli_fetch_assoc($res);

                                                                    // answer from db 
                                                                    $correct_answer = $row['answer'];
                                                                    // ques_type from db 
                                                                    $ques_type = $row['ques_type'];

                                                                    // get count of every question type first
                                                                    if($ques_type == 'rnat')
                                                                    {
                                                                        $count_1 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_1 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_1 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_1 ++ ;
                                                                        }
                                                                        // percentage for rnat
                                                                        if($count_1 > 0)
                                                                        {
                                                                            // Max percentage for rnat
                                                                            $max_percent_1 = ($count_1 / $total_questions) * 100;
                                                                            // users percentage for rnat
                                                                            $user_percent_1 = ($correct_1 / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'rap')
                                                                    {
                                                                        $count_2 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_2 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_2 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_2 ++ ;
                                                                        }
                                                                        // percentage for rap
                                                                        if($count_2 > 0)
                                                                        {
                                                                            // Max percentage for rap
                                                                            $max_percent_2 = ($count_2 / $total_questions) * 100;
                                                                            // users percentage for rap
                                                                            $user_percent_2 = ($correct_2 / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'rat')
                                                                    {
                                                                        $count_3 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_3 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_3 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_3 ++ ;
                                                                        }
                                                                        // percentage for rat
                                                                        if($count_3 > 0)
                                                                        {
                                                                            // Max percentage for rat
                                                                            $max_percent_3 = ($count_3 / $total_questions) * 100;
                                                                            // users percentage for rat
                                                                            $user_percent_3 = ($correct_3 / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'dai')
                                                                    {
                                                                        $count_4 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_4 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_4 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_4 ++ ;
                                                                        }
                                                                        // percentage for dai
                                                                        if($count_4 > 0)
                                                                        {
                                                                            // Max percentage for dai
                                                                            $max_percent_4 = ($count_4 / $total_questions) * 100;
                                                                            // users percentage for dai
                                                                            $user_percent_4 = ($correct_4 / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    // over all max percentages 
                                                                    $overall_max_percent = $max_percent_1 + $max_percent_2 + $max_percent_3 + $max_percent_4;
                                                                    // over all users percentages 
                                                                    $overall_user_percent = $user_percent_1 + $user_percent_2 + $user_percent_3 + $user_percent_4;
                                                                    // VERDICT 
                                                                    if($overall_user_percent >= 70)
                                                                    {
                                                                        $verdict = 'passed';
                                                                    }
                                                                    else{
                                                                        $verdict = 'failed';
                                                                    }
                                                                }
                                                                $stmt->close();

                                                                // insert data in result db 
                                                                $stmt = $conn->prepare("insert into result 
                                                                (cert_id, type, email, full_name,
                                                                user_percent_1, user_percent_2, user_percent_3, user_percent_4, overall_user_percent,  
                                                                max_percent_1, max_percent_2, max_percent_3, max_percent_4, overall_max_percent, verdict) 
                                                                value (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                                                $stmt->bind_param('ssssdddddddddis', 
                                                                $cert_id, $type, $email, $full_name, 
                                                                $user_percent_1, $user_percent_2, $user_percent_3, $user_percent_4, $overall_user_percent,
                                                                $max_percent_1, $max_percent_2, $max_percent_3, $max_percent_4, $overall_max_percent, 
                                                                $verdict );
                                                                $stmt->execute();

                                                                if($stmt->affected_rows > 0)
                                                                {
                                                                    ?>
                                                                        <script>
                                                                            location.href = 'result_examination.php?type=<?php echo $type?>';
                                                                        </script>
                                                                    <?php
                                                                }
                                                                else{
                                                                    echo '
                                                                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                        Something went wrong, please try again!
                                                                    </div>
                                                                    ';
                                                                }
                                                                $stmt->close();

                                                            }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </section>
                                <?php 
                            }
                        }
                        // web dev section 
                        else
                        if($type == 'wdv1' && $approval == 1)
                        {
                            $stmt = $conn->prepare("select * from result where email = ? and type = ?"); // check if already taken the exam
                            $stmt->bind_param('ss', $email, $type);
                            $stmt->execute();
                            $res = $stmt->get_result();

                            // if user already take the exam 
                            if($res->num_rows > 0)
                            {
                                ?>
                                    <script>
                                        location.href = "404.php";
                                    </script>
                                <?php 
                            }
                            else
                            {
                                ?>
                                    <!-- ======= start Hero ======= -->
                                    <section id="hero">
                                        <div class="container">
                                            <div class="flex justify-content-center">
                                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                    <div data-aos="zoom-out">
                                                        <h1 class="text-center text-lg-center">
                                                            Web Development <br>
                                                            Level 1
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
                                                <h2 class="text-secondary">Web Development </h2>
                                                <p style="color: #ff8c00;">
                                                    <!-- 45 minutes timer -->
                                                    <script type="text/javascript">
                                                        var timeLeft = (45 * 60);
                                                    </script>
                                                </p>
                                                <p style="position:sticky;" id="time">Timeout</p>
                                            </div>

                                            <div class="container-fluid" data-aos="fade-up">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 col-lg-11">
                                                        <!-- user data for enrollment -->
                                                        
                                                        <?php 
                                                        
                                                            $stmt = $conn->prepare("select * from test where type = ? order by rand() limit 40");
                                                            $stmt->bind_param('s', $type);
                                                            $stmt->execute();
                                                            $res = $stmt->get_result();
                                                            $count_ques = 1;

                                                            if($res->num_rows)
                                                            {
                                                                ?>
                                                                    <form method="post">
                                                                        <!-- buttons for previous and next and submit button================================================ -->
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-5">
                                                                                <button type="button" id="prev" class="btn btn-primary">Previous</button>
                                                                                <button type="button" id="next" class="btn btn-primary">Next</button>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div id="submit-container" style="display:none; text-align: center;">
                                                                                    <button type="submit" id="submit_id" name="submit_quiz" class="btn btn-primary">
                                                                                    <h6 class="text-white"> Submit Examination </h6>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br><br>

                                                                        <!-- script for timer ============================================================= -->
                                                                        <script>
                                                                            function timeout() {
                                                                            var minutes = Math.floor(timeLeft / 60);
                                                                            var seconds = timeLeft % 60;
                                                                            var mins = checktime(minutes);
                                                                            var secs = checktime(seconds);

                                                                                if (timeLeft <= 0) {
                                                                                    clearTimeout(tm);
                                                                                    document.getElementById("submit_id").click();
                                                                                } else {
                                                                                    document.getElementById("time").innerHTML = mins + ":" + secs;
                                                                                }
                                                                                timeLeft--;
                                                                                var tm = setTimeout(function () { timeout() }, 1000);
                                                                            }

                                                                            function checktime(msg) {
                                                                                if (msg < 10) {
                                                                                    msg = "0" + msg;
                                                                                }
                                                                                return msg;
                                                                            }
                                                                            timeout();
                                                                        </script>

                                                                        <!-- wrap thw whole while to display question one by one on the same position -->
                                                                        <div id="question-container">
                                                                <?php
                                                                while($row = $res->fetch_assoc())
                                                                {
                                                                    $question = $row['question'];
                                                                    $opt1 = $row['opt1'];
                                                                    $opt2 = $row['opt2'];
                                                                    $opt3 = $row['opt3'];
                                                                    $opt4 = $row['opt4'];
                                                                    $answer = $row['answer'];

                                                                    $ques_type = $row['ques_type'];
                                                                    $image = $row['image'];

                                                                    // this is to shuffle options 
                                                                    $options = array($opt1, $opt2, $opt3, $opt4);
                                                                    shuffle($options);
                                                                    ?>
                                                                        <!-- add question class in row to display question one by one  -->
                                                                        <div class="row question">
                                                                            <!-- question here  -->
                                                                            <div class="col-md-12 mb-3">
                                                                                <h6 class="fw-bold">
                                                                                    <?php echo $count_ques++ .' .) '. $question ?>
                                                                                </h6>
                                                                                <!-- image here  -->
                                                                                <?php
                                                                                    if(empty($image))
                                                                                    {
                                                                                        $image = '';
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $image = ' <img src="admin/'.$image.'" class="img-fluid"> ';
                                                                                    }
                                                                                    echo $image;
                                                                                ?>
                                                                            </div>
                                                                            <!-- Option  -->
                                                                            <div class="col-md-12 ml-5">
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[0] ?>" class="mb-3"/>
                                                                                    <span><h6>A.) &nbsp; </h6><?php echo $options[0] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[1] ?>" class="mb-3"/>
                                                                                    <span><h6>B.) &nbsp; </h6><?php echo $options[1] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[2] ?>" class="mb-3"/>
                                                                                    <span><h6>C.) &nbsp; </h6><?php echo $options[2] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[3] ?>" class="mb-3"/>
                                                                                    <span><h6>D.) &nbsp; </h6><?php echo $options[3] ?></span>
                                                                                </label>
                                                                            </div>
                                                                            <!-- Default answer  -->
                                                                            <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="default_answer" checked style="display: none;">

                                                                            <!-- identify question type  -->
                                                                            <input type="hidden" name="ques_type[<?php echo $row['id'] ?>]" value="<?php echo $ques_type ?>" readonly>
                                                                            
                                                                        </div>                                                                
                                                                    <?php
                                                                }
                                                                ?>
                                                                        </div>
                                                                    </form>

                                                                    <!-- style and script for next and previous Button ======================================  -->
                                                                    <style>
                                                                        #question-container {
                                                                            position: relative;
                                                                            height: 100%;
                                                                            margin-bottom: 100%;
                                                                        }

                                                                        .question {
                                                                            position: absolute;
                                                                            top: 0;
                                                                            left: 0;
                                                                            width: 100%;
                                                                            height: 100%;
                                                                            display: none;
                                                                        }

                                                                        .question:first-child {
                                                                            display: block;
                                                                        }
                                                                    </style>
                                                                    <script>
                                                                        var currentQuestion = 1;
                                                                        var numQuestions = <?php echo $count_ques-1; ?>; // number of questions, excluding the submit button

                                                                        document.getElementById("next").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion++;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion == numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "block";
                                                                            }
                                                                        });

                                                                        document.getElementById("prev").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion > 1) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion--;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "none";
                                                                            }
                                                                        });


                                                                        // browser restriction 
                                                                        // var tabContainer = document.getElementById('examination');
                                                                        // var warn = 2;

                                                                        // tabContainer.addEventListener('mouseenter', handleMouseEnter)   
                                                                        // tabContainer.addEventListener('mouseleave', handleMouseLeave)
                                                                        
                                                                        // // mouse is inside the browser  
                                                                        // function handleMouseEnter() 
                                                                        // {
                                                                        //     console.log('Mouse entered the tab');
                                                                        // }
                                                                        // // mouse is outside the browser  
                                                                        // function handleMouseLeave() 
                                                                        // {
                                                                        //     if(warn > 0)
                                                                        //     {
                                                                        //         alert('you can\'t leave during the examination ! warning left: '
                                                                        //          +  warn);
                                                                        //          warn --;
                                                                        //     }
                                                                        //     else if(warn == 0)
                                                                        //     {
                                                                        //         document.getElementById("submit_id").click();
                                                                        //     }

                                                                        // }

                                                                        // Declare the warn variables outside the event listener to retain their values
                                                                        var warnAlt = 2;
                                                                        var warnCtrl = 2;
                                                                        var warnPrtSc = 2;

                                                                        // Disable Alt, Ctrl, and Print Screen keys
                                                                        document.addEventListener("keydown", function(event) 
                                                                        {
                                                                            if (event.key === "Alt") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnAlt > 0) 
                                                                                {
                                                                                    alert("Warning: Alt + Tab is forbidden. Remaining warnings: " + warnAlt);
                                                                                    warnAlt--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            } 
                                                                            else if (event.key === "Control") 
                                                                            {   
                                                                                event.preventDefault();
                                                                                if (warnCtrl > 0) 
                                                                                {
                                                                                    alert("Warning: ctrl is forbidden. Remaining warnings: " + warnCtrl);
                                                                                    warnCtrl--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                            else if (event.key === "PrintScreen") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnPrtSc > 0) 
                                                                                {
                                                                                    alert("Warning: PrtSc is forbidden. Remaining warnings: " + warnPrtSc);
                                                                                    warnPrtSc--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                            });
                                                                    </script>
                                                                <?php
                                                            }
                                                            $stmt->close();//select from test questions

                                                            //if quiz is submitted 
                                                            if(isset($_POST['submit_quiz']))
                                                            {
                                                                // users answer in form
                                                                $answer = $_POST['answer'];
                                                                // users ques_type in form
                                                                $ques_type = $_POST['ques_type'];

                                                                // get maximum percentage per question type
                                                                $max_percent_1 = 0; 
                                                                $max_percent_2 = 0; 
                                                                $max_percent_3 = 0; 
                                                                $max_percent_4 = 0;
                                                                $overall_max_percent = 0; 

                                                                // get users percentage per question type
                                                                $user_percent_1 = 0; 
                                                                $user_percent_2 = 0; 
                                                                $user_percent_3 = 0; 
                                                                $user_percent_4 = 0; 
                                                                $overall_user_percent = 0; 

                                                                // Count question type
                                                                $count_1 = 0; 
                                                                $count_2 = 0; 
                                                                $count_3 = 0; 
                                                                $count_4 = 0; 

                                                                // correct, wrong and unanswered variables 
                                                                $correct = 0;
                                                                $wrong = 0;
                                                                $unanswered = 0;

                                                                // total count question for question type 
                                                                $total_question_1 = 0;
                                                                $total_question_2 = 0;
                                                                $total_question_3 = 0;
                                                                $total_question_4 = 0;

                                                                $verdict = '';

                                                                // initialization for correct, wrong, and unanswered per question types
                                                                $correct_1 = 0; $wrong_1 = 0; $unanswered_1 = 0;
                                                                $correct_2 = 0; $wrong_2 = 0; $unanswered_2 = 0;
                                                                $correct_3 = 0; $wrong_3 = 0; $unanswered_3 = 0;
                                                                $correct_4 = 0; $wrong_4 = 0; $unanswered_4 = 0;

                                                                // total question count 
                                                                $total_questions = 40;

                                                                // generate certificate id 
                                                                $cert_id = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 12);
                                                                
                                                                $array_ques_type = array();

                                                                foreach($answer as $question_id => $answer)
                                                                {
                                                                    // get answer 
                                                                    $stmt = $conn->prepare("select * from test where id = ?");
                                                                    $stmt->bind_param('i', $question_id);
                                                                    $stmt->execute();
                                                                    $res = $stmt->get_result();
                                                                    $row = mysqli_fetch_assoc($res);

                                                                    // answer from db 
                                                                    $correct_answer = $row['answer'];
                                                                    // ques_type from db 
                                                                    $ques_type = $row['ques_type'];

                                                                    // get count of every question type first
                                                                    if($ques_type == 'html')
                                                                    {
                                                                        $count_1 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_1 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_1 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_1 ++ ;
                                                                        }
                                                                        if($count_1 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "html");
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'css')
                                                                    {
                                                                        $count_2 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_2 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_2 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_2 ++ ;
                                                                        }
                                                                        if($count_2 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "css");
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'js')
                                                                    {
                                                                        $count_3 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_3 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_3 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_3 ++ ;
                                                                        }
                                                                        if($count_3 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "js");
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'php')
                                                                    {
                                                                        $count_4 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_4 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_4 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_4 ++ ;
                                                                        }
                                                                        if($count_4 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "php");
                                                                        }
                                                                    }
                                                                }

                                                                $count_overall = count($array_ques_type);

                                                                if(in_array('html', $array_ques_type))
                                                                {
                                                                    $max_percent_1 = ( $count_1 / $count_overall) * 100;
                                                                    $user_percent_1 = ( $correct_1 / $count_overall) * 100;
                                                                }
                                                                if(in_array('css', $array_ques_type))
                                                                {
                                                                    $max_percent_2 = ( $count_2 / $count_overall) * 100;
                                                                    $user_percent_2 = ( $correct_2 / $count_overall) * 100;
                                                                }
                                                                if(in_array('js', $array_ques_type))
                                                                {
                                                                    $max_percent_3 = ( $count_3 / $count_overall) * 100;
                                                                    $user_percent_3 = ( $correct_3 / $count_overall) * 100;
                                                                }
                                                                if(in_array('php', $array_ques_type))
                                                                {
                                                                    $max_percent_4 = ( $count_4 / $count_overall) * 100;
                                                                    $user_percent_4 = ( $correct_4 / $count_overall) * 100;
                                                                }

                                                                 // over all max percentages 
                                                                 $overall_max_percent = 100.000;
                                                                 // over all users percentages 
                                                                 $overall_user_percent = $user_percent_1 + $user_percent_2 + $user_percent_3 + $user_percent_4;
                                                                 // VERDICT 
                                                                 if($overall_user_percent >= 70)
                                                                 {
                                                                     $verdict = 'passed';
                                                                 }
                                                                 else{
                                                                     $verdict = 'failed';
                                                                 }

                                                                $stmt->close();// get the answer

                                                                // insert data in result db 
                                                                $stmt = $conn->prepare("insert into result 
                                                                (cert_id, type, email, full_name,
                                                                user_percent_1, user_percent_2, user_percent_3, user_percent_4, overall_user_percent,  
                                                                max_percent_1, max_percent_2, max_percent_3, max_percent_4, overall_max_percent, verdict) 
                                                                value (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                                                $stmt->bind_param('ssssdddddddddis', 
                                                                $cert_id, $type, $email, $full_name, 
                                                                $user_percent_1, $user_percent_2, $user_percent_3, $user_percent_4, $overall_user_percent,
                                                                $max_percent_1, $max_percent_2, $max_percent_3, $max_percent_4, $overall_max_percent, 
                                                                $verdict );
                                                                $stmt->execute();

                                                                if($stmt->affected_rows > 0)
                                                                {
                                                                    ?>
                                                                        <script>
                                                                            location.href = 'result_examination.php?type=<?php echo $type?>';
                                                                        </script>
                                                                    <?php
                                                                }
                                                                else{
                                                                    echo '
                                                                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                        Something went wrong, please try again!
                                                                    </div>
                                                                    ';
                                                                }
                                                                $stmt->close();//insert the data

                                                            }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </section>
                                <?php 
                            }
                        }
                        else
                        if($type == 'wdv2' && $approval == 1)
                        {
                            $stmt = $conn->prepare("select * from result where email = ? and type = ?"); // check if already taken the exam
                            $stmt->bind_param('ss', $email, $type);
                            $stmt->execute();
                            $res = $stmt->get_result();

                            // if user already take the exam 
                            if($res->num_rows > 0)
                            {
                                ?>
                                    <script>
                                        location.href = "404.php";
                                    </script>
                                <?php 
                            }
                            else
                            {
                                ?>
                                    <!-- ======= start Hero ======= -->
                                    <section id="hero">
                                        <div class="container">
                                            <div class="flex justify-content-center">
                                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                    <div data-aos="zoom-out">
                                                        <h1 class="text-center text-lg-center">
                                                            Web Development <br>
                                                            Level 2
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
                                                <h2 class="text-secondary">Web Development </h2>
                                                <p style="color: #ff8c00;">
                                                    <!-- 45 minutes timer -->
                                                    <script type="text/javascript">
                                                        var timeLeft = (45 * 60);
                                                    </script>
                                                </p>
                                                <p style="position:sticky;" id="time">Timeout</p>
                                            </div>

                                            <div class="container-fluid" data-aos="fade-up">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 col-lg-11">
                                                        <!-- user data for enrollment -->
                                                        
                                                        <?php 
                                                        
                                                            $stmt = $conn->prepare("select * from test where type = ? order by rand() limit 40");
                                                            $stmt->bind_param('s', $type);
                                                            $stmt->execute();
                                                            $res = $stmt->get_result();
                                                            $count_ques = 1;

                                                            if($res->num_rows)
                                                            {
                                                                ?>
                                                                    <form method="post">
                                                                        <!-- buttons for previous and next and submit button================================================ -->
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-5">
                                                                                <button type="button" id="prev" class="btn btn-primary">Previous</button>
                                                                                <button type="button" id="next" class="btn btn-primary">Next</button>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div id="submit-container" style="display:none; text-align: center;">
                                                                                    <button type="submit" id="submit_id" name="submit_quiz" class="btn btn-primary">
                                                                                    <h6 class="text-white"> Submit Examination </h6>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br><br>

                                                                        <!-- script for timer ============================================================= -->
                                                                        <script>
                                                                            function timeout() {
                                                                            var minutes = Math.floor(timeLeft / 60);
                                                                            var seconds = timeLeft % 60;
                                                                            var mins = checktime(minutes);
                                                                            var secs = checktime(seconds);

                                                                                if (timeLeft <= 0) {
                                                                                    clearTimeout(tm);
                                                                                    document.getElementById("submit_id").click();
                                                                                } else {
                                                                                    document.getElementById("time").innerHTML = mins + ":" + secs;
                                                                                }
                                                                                timeLeft--;
                                                                                var tm = setTimeout(function () { timeout() }, 1000);
                                                                            }

                                                                            function checktime(msg) {
                                                                                if (msg < 10) {
                                                                                    msg = "0" + msg;
                                                                                }
                                                                                return msg;
                                                                            }
                                                                            timeout();
                                                                        </script>

                                                                        <!-- wrap thw whole while to display question one by one on the same position -->
                                                                        <div id="question-container">
                                                                <?php
                                                                while($row = $res->fetch_assoc())
                                                                {
                                                                    $question = $row['question'];
                                                                    $opt1 = $row['opt1'];
                                                                    $opt2 = $row['opt2'];
                                                                    $opt3 = $row['opt3'];
                                                                    $opt4 = $row['opt4'];
                                                                    $answer = $row['answer'];

                                                                    $ques_type = $row['ques_type'];
                                                                    $image = $row['image'];

                                                                    // this is to shuffle options 
                                                                    $options = array($opt1, $opt2, $opt3, $opt4);
                                                                    shuffle($options);
                                                                    ?>
                                                                        <!-- add question class in row to display question one by one  -->
                                                                        <div class="row question">
                                                                            <!-- question here  -->
                                                                            <div class="col-md-12 mb-3">
                                                                                <h6 class="fw-bold">
                                                                                    <?php echo $count_ques++ .' .) '. $question ?>
                                                                                </h6>
                                                                                <!-- image here  -->
                                                                                <?php
                                                                                    if(empty($image))
                                                                                    {
                                                                                        $image = '';
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $image = ' <img src="admin/'.$image.'" class="img-fluid"> ';
                                                                                    }
                                                                                    echo $image;
                                                                                ?>
                                                                            </div>
                                                                            <!-- Option  -->
                                                                            <div class="col-md-12 ml-5">
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[0] ?>" class="mb-3"/>
                                                                                    <span><h6>A.) &nbsp; </h6><?php echo $options[0] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[1] ?>" class="mb-3"/>
                                                                                    <span><h6>B.) &nbsp; </h6><?php echo $options[1] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[2] ?>" class="mb-3"/>
                                                                                    <span><h6>C.) &nbsp; </h6><?php echo $options[2] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[3] ?>" class="mb-3"/>
                                                                                    <span><h6>D.) &nbsp; </h6><?php echo $options[3] ?></span>
                                                                                </label>
                                                                            </div>
                                                                            <!-- Default answer  -->
                                                                            <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="default_answer" checked style="display: none;">

                                                                            <!-- identify question type  -->
                                                                            <input type="hidden" name="ques_type[<?php echo $row['id'] ?>]" value="<?php echo $ques_type ?>" readonly>
                                                                            
                                                                        </div>                                                                
                                                                    <?php
                                                                }
                                                                ?>
                                                                        </div>
                                                                    </form>

                                                                    <!-- style and script for next and previous Button ======================================  -->
                                                                    <style>
                                                                        #question-container {
                                                                            position: relative;
                                                                            height: 100%;
                                                                            margin-bottom: 100%;
                                                                        }

                                                                        .question {
                                                                            position: absolute;
                                                                            top: 0;
                                                                            left: 0;
                                                                            width: 100%;
                                                                            height: 100%;
                                                                            display: none;
                                                                        }

                                                                        .question:first-child {
                                                                            display: block;
                                                                        }
                                                                    </style>
                                                                    <script>
                                                                        var currentQuestion = 1;
                                                                        var numQuestions = <?php echo $count_ques-1; ?>; // number of questions, excluding the submit button

                                                                        document.getElementById("next").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion++;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion == numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "block";
                                                                            }
                                                                        });

                                                                        document.getElementById("prev").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion > 1) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion--;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "none";
                                                                            }
                                                                        });


                                                                        // browser restriction 
                                                                        // var tabContainer = document.getElementById('examination');
                                                                        // var warn = 2;

                                                                        // tabContainer.addEventListener('mouseenter', handleMouseEnter)   
                                                                        // tabContainer.addEventListener('mouseleave', handleMouseLeave)
                                                                        
                                                                        // // mouse is inside the browser  
                                                                        // function handleMouseEnter() 
                                                                        // {
                                                                        //     console.log('Mouse entered the tab');
                                                                        // }
                                                                        // // mouse is outside the browser  
                                                                        // function handleMouseLeave() 
                                                                        // {
                                                                        //     if(warn > 0)
                                                                        //     {
                                                                        //         alert('you can\'t leave during the examination ! warning left: '
                                                                        //          +  warn);
                                                                        //          warn --;
                                                                        //     }
                                                                        //     else if(warn == 0)
                                                                        //     {
                                                                        //         document.getElementById("submit_id").click();
                                                                        //     }

                                                                        // }

                                                                        // Declare the warn variables outside the event listener to retain their values
                                                                        var warnAlt = 2;
                                                                        var warnCtrl = 2;
                                                                        var warnPrtSc = 2;

                                                                        // Disable Alt, Ctrl, and Print Screen keys
                                                                        document.addEventListener("keydown", function(event) 
                                                                        {
                                                                            if (event.key === "Alt") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnAlt > 0) 
                                                                                {
                                                                                    alert("Warning: Alt + Tab is forbidden. Remaining warnings: " + warnAlt);
                                                                                    warnAlt--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            } 
                                                                            else if (event.key === "Control") 
                                                                            {   
                                                                                event.preventDefault();
                                                                                if (warnCtrl > 0) 
                                                                                {
                                                                                    alert("Warning: ctrl is forbidden. Remaining warnings: " + warnCtrl);
                                                                                    warnCtrl--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                            else if (event.key === "PrintScreen") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnPrtSc > 0) 
                                                                                {
                                                                                    alert("Warning: PrtSc is forbidden. Remaining warnings: " + warnPrtSc);
                                                                                    warnPrtSc--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                            });
                                                                    </script>
                                                                <?php
                                                            }
                                                            $stmt->close();//select from test questions

                                                            //if quiz is submitted 
                                                            if(isset($_POST['submit_quiz']))
                                                            {
                                                                // users answer in form
                                                                $answer = $_POST['answer'];
                                                                // users ques_type in form
                                                                $ques_type = $_POST['ques_type'];

                                                                // get maximum percentage per question type
                                                                $max_percent_1 = 0; 
                                                                $max_percent_2 = 0; 
                                                                $max_percent_3 = 0; 
                                                                $max_percent_4 = 0;
                                                                $overall_max_percent = 0; 

                                                                // get users percentage per question type
                                                                $user_percent_1 = 0; 
                                                                $user_percent_2 = 0; 
                                                                $user_percent_3 = 0; 
                                                                $user_percent_4 = 0; 
                                                                $overall_user_percent = 0; 

                                                                // Count question type
                                                                $count_1 = 0; 
                                                                $count_2 = 0; 
                                                                $count_3 = 0; 
                                                                $count_4 = 0; 

                                                                // correct, wrong and unanswered variables 
                                                                $correct = 0;
                                                                $wrong = 0;
                                                                $unanswered = 0;

                                                                // total count question for question type 
                                                                $total_question_1 = 0;
                                                                $total_question_2 = 0;
                                                                $total_question_3 = 0;
                                                                $total_question_4 = 0;

                                                                $verdict = '';

                                                                // initialization for correct, wrong, and unanswered per question types
                                                                $correct_1 = 0; $wrong_1 = 0; $unanswered_1 = 0;
                                                                $correct_2 = 0; $wrong_2 = 0; $unanswered_2 = 0;
                                                                $correct_3 = 0; $wrong_3 = 0; $unanswered_3 = 0;
                                                                $correct_4 = 0; $wrong_4 = 0; $unanswered_4 = 0;

                                                                // total question count 
                                                                $total_questions = 40;

                                                                // generate certificate id 
                                                                $cert_id = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 12);
                                                                
                                                                $array_ques_type = array();

                                                                foreach($answer as $question_id => $answer)
                                                                {
                                                                    // get answer 
                                                                    $stmt = $conn->prepare("select * from test where id = ?");
                                                                    $stmt->bind_param('i', $question_id);
                                                                    $stmt->execute();
                                                                    $res = $stmt->get_result();
                                                                    $row = mysqli_fetch_assoc($res);

                                                                    // answer from db 
                                                                    $correct_answer = $row['answer'];
                                                                    // ques_type from db 
                                                                    $ques_type = $row['ques_type'];

                                                                    // get count of every question type first
                                                                    if($ques_type == 'html')
                                                                    {
                                                                        $count_1 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_1 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_1 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_1 ++ ;
                                                                        }
                                                                        if($count_1 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "html");
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'css')
                                                                    {
                                                                        $count_2 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_2 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_2 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_2 ++ ;
                                                                        }
                                                                        if($count_2 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "css");
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'js')
                                                                    {
                                                                        $count_3 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_3 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_3 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_3 ++ ;
                                                                        }
                                                                        if($count_3 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "js");
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'php')
                                                                    {
                                                                        $count_4 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_4 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_4 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_4 ++ ;
                                                                        }
                                                                        if($count_4 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "php");
                                                                        }
                                                                    }
                                                                }

                                                                $count_overall = count($array_ques_type);

                                                                if(in_array('html', $array_ques_type))
                                                                {
                                                                    $max_percent_1 = ( $count_1 / $count_overall) * 100;
                                                                    $user_percent_1 = ( $correct_1 / $count_overall) * 100;
                                                                }
                                                                if(in_array('css', $array_ques_type))
                                                                {
                                                                    $max_percent_2 = ( $count_2 / $count_overall) * 100;
                                                                    $user_percent_2 = ( $correct_2 / $count_overall) * 100;
                                                                }
                                                                if(in_array('js', $array_ques_type))
                                                                {
                                                                    $max_percent_3 = ( $count_3 / $count_overall) * 100;
                                                                    $user_percent_3 = ( $correct_3 / $count_overall) * 100;
                                                                }
                                                                if(in_array('php', $array_ques_type))
                                                                {
                                                                    $max_percent_4 = ( $count_4 / $count_overall) * 100;
                                                                    $user_percent_4 = ( $correct_4 / $count_overall) * 100;
                                                                }

                                                                 // over all max percentages 
                                                                 $overall_max_percent = 100.000;
                                                                 // over all users percentages 
                                                                 $overall_user_percent = $user_percent_1 + $user_percent_2 + $user_percent_3 + $user_percent_4;
                                                                 // VERDICT 
                                                                 if($overall_user_percent >= 70)
                                                                 {
                                                                     $verdict = 'passed';
                                                                 }
                                                                 else{
                                                                     $verdict = 'failed';
                                                                 }

                                                                $stmt->close();// get the answer

                                                                // insert data in result db 
                                                                $stmt = $conn->prepare("insert into result 
                                                                (cert_id, type, email, full_name,
                                                                user_percent_1, user_percent_2, user_percent_3, user_percent_4, overall_user_percent,  
                                                                max_percent_1, max_percent_2, max_percent_3, max_percent_4, overall_max_percent, verdict) 
                                                                value (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                                                $stmt->bind_param('ssssdddddddddis', 
                                                                $cert_id, $type, $email, $full_name, 
                                                                $user_percent_1, $user_percent_2, $user_percent_3, $user_percent_4, $overall_user_percent,
                                                                $max_percent_1, $max_percent_2, $max_percent_3, $max_percent_4, $overall_max_percent, 
                                                                $verdict );
                                                                $stmt->execute();

                                                                if($stmt->affected_rows > 0)
                                                                {
                                                                    ?>
                                                                        <script>
                                                                            location.href = 'result_examination.php?type=<?php echo $type?>';
                                                                        </script>
                                                                    <?php
                                                                }
                                                                else{
                                                                    echo '
                                                                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                        Something went wrong, please try again!
                                                                    </div>
                                                                    ';
                                                                }
                                                                $stmt->close();//insert the data

                                                            }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </section>
                                <?php 
                            }
                        }
                        else
                        if($type == 'wdv3' && $approval == 1)
                        {
                            $stmt = $conn->prepare("select * from result where email = ? and type = ?"); // check if already taken the exam
                            $stmt->bind_param('ss', $email, $type);
                            $stmt->execute();
                            $res = $stmt->get_result();

                            // if user already take the exam 
                            if($res->num_rows > 0)
                            {
                                ?>
                                    <script>
                                        location.href = "404.php";
                                    </script>
                                <?php 
                            }
                            else
                            {
                                ?>
                                    <!-- ======= start Hero ======= -->
                                    <section id="hero">
                                        <div class="container">
                                            <div class="flex justify-content-center">
                                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                    <div data-aos="zoom-out">
                                                        <h1 class="text-center text-lg-center">
                                                            Web Development <br>
                                                            Level 3
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
                                                <h2 class="text-secondary">Web Development </h2>
                                                <p style="color: #ff8c00;">
                                                    <!-- 45 minutes timer -->
                                                    <script type="text/javascript">
                                                        var timeLeft = (45 * 60);
                                                    </script>
                                                </p>
                                                <p style="position:sticky;" id="time">Timeout</p>
                                            </div>

                                            <div class="container-fluid" data-aos="fade-up">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 col-lg-11">
                                                        <!-- user data for enrollment -->
                                                        
                                                        <?php 
                                                        
                                                            $stmt = $conn->prepare("select * from test where type = ? order by rand() limit 40");
                                                            $stmt->bind_param('s', $type);
                                                            $stmt->execute();
                                                            $res = $stmt->get_result();
                                                            $count_ques = 1;

                                                            if($res->num_rows)
                                                            {
                                                                ?>
                                                                    <form method="post">
                                                                        <!-- buttons for previous and next and submit button================================================ -->
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-5">
                                                                                <button type="button" id="prev" class="btn btn-primary">Previous</button>
                                                                                <button type="button" id="next" class="btn btn-primary">Next</button>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div id="submit-container" style="display:none; text-align: center;">
                                                                                    <button type="submit" id="submit_id" name="submit_quiz" class="btn btn-primary">
                                                                                    <h6 class="text-white"> Submit Examination </h6>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br><br>

                                                                        <!-- script for timer ============================================================= -->
                                                                        <script>
                                                                            function timeout() {
                                                                            var minutes = Math.floor(timeLeft / 60);
                                                                            var seconds = timeLeft % 60;
                                                                            var mins = checktime(minutes);
                                                                            var secs = checktime(seconds);

                                                                                if (timeLeft <= 0) {
                                                                                    clearTimeout(tm);
                                                                                    document.getElementById("submit_id").click();
                                                                                } else {
                                                                                    document.getElementById("time").innerHTML = mins + ":" + secs;
                                                                                }
                                                                                timeLeft--;
                                                                                var tm = setTimeout(function () { timeout() }, 1000);
                                                                            }

                                                                            function checktime(msg) {
                                                                                if (msg < 10) {
                                                                                    msg = "0" + msg;
                                                                                }
                                                                                return msg;
                                                                            }
                                                                            timeout();
                                                                        </script>

                                                                        <!-- wrap thw whole while to display question one by one on the same position -->
                                                                        <div id="question-container">
                                                                <?php
                                                                while($row = $res->fetch_assoc())
                                                                {
                                                                    $question = $row['question'];
                                                                    $opt1 = $row['opt1'];
                                                                    $opt2 = $row['opt2'];
                                                                    $opt3 = $row['opt3'];
                                                                    $opt4 = $row['opt4'];
                                                                    $answer = $row['answer'];

                                                                    $ques_type = $row['ques_type'];
                                                                    $image = $row['image'];

                                                                    // this is to shuffle options 
                                                                    $options = array($opt1, $opt2, $opt3, $opt4);
                                                                    shuffle($options);
                                                                    ?>
                                                                        <!-- add question class in row to display question one by one  -->
                                                                        <div class="row question">
                                                                            <!-- question here  -->
                                                                            <div class="col-md-12 mb-3">
                                                                                <h6 class="fw-bold">
                                                                                    <?php echo $count_ques++ .' .) '. $question ?>
                                                                                </h6>
                                                                                <!-- image here  -->
                                                                                <?php
                                                                                    if(empty($image))
                                                                                    {
                                                                                        $image = '';
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $image = ' <img src="admin/'.$image.'" class="img-fluid"> ';
                                                                                    }
                                                                                    echo $image;
                                                                                ?>
                                                                            </div>
                                                                            <!-- Option  -->
                                                                            <div class="col-md-12 ml-5">
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[0] ?>" class="mb-3"/>
                                                                                    <span><h6>A.) &nbsp; </h6><?php echo $options[0] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[1] ?>" class="mb-3"/>
                                                                                    <span><h6>B.) &nbsp; </h6><?php echo $options[1] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[2] ?>" class="mb-3"/>
                                                                                    <span><h6>C.) &nbsp; </h6><?php echo $options[2] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[3] ?>" class="mb-3"/>
                                                                                    <span><h6>D.) &nbsp; </h6><?php echo $options[3] ?></span>
                                                                                </label>
                                                                            </div>
                                                                            <!-- Default answer  -->
                                                                            <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="default_answer" checked style="display: none;">

                                                                            <!-- identify question type  -->
                                                                            <input type="hidden" name="ques_type[<?php echo $row['id'] ?>]" value="<?php echo $ques_type ?>" readonly>
                                                                            
                                                                        </div>                                                                
                                                                    <?php
                                                                }
                                                                ?>
                                                                        </div>
                                                                    </form>

                                                                    <!-- style and script for next and previous Button ======================================  -->
                                                                    <style>
                                                                        #question-container {
                                                                            position: relative;
                                                                            height: 100%;
                                                                            margin-bottom: 100%;
                                                                        }

                                                                        .question {
                                                                            position: absolute;
                                                                            top: 0;
                                                                            left: 0;
                                                                            width: 100%;
                                                                            height: 100%;
                                                                            display: none;
                                                                        }

                                                                        .question:first-child {
                                                                            display: block;
                                                                        }
                                                                    </style>
                                                                    <script>
                                                                        var currentQuestion = 1;
                                                                        var numQuestions = <?php echo $count_ques-1; ?>; // number of questions, excluding the submit button

                                                                        document.getElementById("next").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion++;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion == numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "block";
                                                                            }
                                                                        });

                                                                        document.getElementById("prev").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion > 1) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion--;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "none";
                                                                            }
                                                                        });


                                                                        // browser restriction 
                                                                        // var tabContainer = document.getElementById('examination');
                                                                        // var warn = 2;

                                                                        // tabContainer.addEventListener('mouseenter', handleMouseEnter)   
                                                                        // tabContainer.addEventListener('mouseleave', handleMouseLeave)
                                                                        
                                                                        // // mouse is inside the browser  
                                                                        // function handleMouseEnter() 
                                                                        // {
                                                                        //     console.log('Mouse entered the tab');
                                                                        // }
                                                                        // // mouse is outside the browser  
                                                                        // function handleMouseLeave() 
                                                                        // {
                                                                        //     if(warn > 0)
                                                                        //     {
                                                                        //         alert('you can\'t leave during the examination ! warning left: '
                                                                        //          +  warn);
                                                                        //          warn --;
                                                                        //     }
                                                                        //     else if(warn == 0)
                                                                        //     {
                                                                        //         document.getElementById("submit_id").click();
                                                                        //     }

                                                                        // }

                                                                        // Declare the warn variables outside the event listener to retain their values
                                                                        var warnAlt = 2;
                                                                        var warnCtrl = 2;
                                                                        var warnPrtSc = 2;

                                                                        // Disable Alt, Ctrl, and Print Screen keys
                                                                        document.addEventListener("keydown", function(event) 
                                                                        {
                                                                            if (event.key === "Alt") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnAlt > 0) 
                                                                                {
                                                                                    alert("Warning: Alt + Tab is forbidden. Remaining warnings: " + warnAlt);
                                                                                    warnAlt--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            } 
                                                                            else if (event.key === "Control") 
                                                                            {   
                                                                                event.preventDefault();
                                                                                if (warnCtrl > 0) 
                                                                                {
                                                                                    alert("Warning: ctrl is forbidden. Remaining warnings: " + warnCtrl);
                                                                                    warnCtrl--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                            else if (event.key === "PrintScreen") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnPrtSc > 0) 
                                                                                {
                                                                                    alert("Warning: PrtSc is forbidden. Remaining warnings: " + warnPrtSc);
                                                                                    warnPrtSc--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                            });
                                                                    </script>
                                                                <?php
                                                            }
                                                            $stmt->close();//select from test questions

                                                            //if quiz is submitted 
                                                            if(isset($_POST['submit_quiz']))
                                                            {
                                                                // users answer in form
                                                                $answer = $_POST['answer'];
                                                                // users ques_type in form
                                                                $ques_type = $_POST['ques_type'];

                                                                // get maximum percentage per question type
                                                                $max_percent_1 = 0; 
                                                                $max_percent_2 = 0; 
                                                                $max_percent_3 = 0; 
                                                                $max_percent_4 = 0;
                                                                $overall_max_percent = 0; 

                                                                // get users percentage per question type
                                                                $user_percent_1 = 0; 
                                                                $user_percent_2 = 0; 
                                                                $user_percent_3 = 0; 
                                                                $user_percent_4 = 0; 
                                                                $overall_user_percent = 0; 

                                                                // Count question type
                                                                $count_1 = 0; 
                                                                $count_2 = 0; 
                                                                $count_3 = 0; 
                                                                $count_4 = 0; 

                                                                // correct, wrong and unanswered variables 
                                                                $correct = 0;
                                                                $wrong = 0;
                                                                $unanswered = 0;

                                                                // total count question for question type 
                                                                $total_question_1 = 0;
                                                                $total_question_2 = 0;
                                                                $total_question_3 = 0;
                                                                $total_question_4 = 0;

                                                                $verdict = '';

                                                                // initialization for correct, wrong, and unanswered per question types
                                                                $correct_1 = 0; $wrong_1 = 0; $unanswered_1 = 0;
                                                                $correct_2 = 0; $wrong_2 = 0; $unanswered_2 = 0;
                                                                $correct_3 = 0; $wrong_3 = 0; $unanswered_3 = 0;
                                                                $correct_4 = 0; $wrong_4 = 0; $unanswered_4 = 0;

                                                                // total question count 
                                                                $total_questions = 40;

                                                                // generate certificate id 
                                                                $cert_id = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 12);
                                                                
                                                                $array_ques_type = array();

                                                                foreach($answer as $question_id => $answer)
                                                                {
                                                                    // get answer 
                                                                    $stmt = $conn->prepare("select * from test where id = ?");
                                                                    $stmt->bind_param('i', $question_id);
                                                                    $stmt->execute();
                                                                    $res = $stmt->get_result();
                                                                    $row = mysqli_fetch_assoc($res);

                                                                    // answer from db 
                                                                    $correct_answer = $row['answer'];
                                                                    // ques_type from db 
                                                                    $ques_type = $row['ques_type'];

                                                                    // get count of every question type first
                                                                    if($ques_type == 'html')
                                                                    {
                                                                        $count_1 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_1 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_1 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_1 ++ ;
                                                                        }
                                                                        if($count_1 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "html");
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'css')
                                                                    {
                                                                        $count_2 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_2 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_2 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_2 ++ ;
                                                                        }
                                                                        if($count_2 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "css");
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'js')
                                                                    {
                                                                        $count_3 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_3 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_3 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_3 ++ ;
                                                                        }
                                                                        if($count_3 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "js");
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'php')
                                                                    {
                                                                        $count_4 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_4 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_4 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_4 ++ ;
                                                                        }
                                                                        if($count_4 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "php");
                                                                        }
                                                                    }
                                                                }

                                                                $count_overall = count($array_ques_type);

                                                                if(in_array('html', $array_ques_type))
                                                                {
                                                                    $max_percent_1 = ( $count_1 / $count_overall) * 100;
                                                                    $user_percent_1 = ( $correct_1 / $count_overall) * 100;
                                                                }
                                                                if(in_array('css', $array_ques_type))
                                                                {
                                                                    $max_percent_2 = ( $count_2 / $count_overall) * 100;
                                                                    $user_percent_2 = ( $correct_2 / $count_overall) * 100;
                                                                }
                                                                if(in_array('js', $array_ques_type))
                                                                {
                                                                    $max_percent_3 = ( $count_3 / $count_overall) * 100;
                                                                    $user_percent_3 = ( $correct_3 / $count_overall) * 100;
                                                                }
                                                                if(in_array('php', $array_ques_type))
                                                                {
                                                                    $max_percent_4 = ( $count_4 / $count_overall) * 100;
                                                                    $user_percent_4 = ( $correct_4 / $count_overall) * 100;
                                                                }

                                                                 // over all max percentages 
                                                                 $overall_max_percent = 100.000;
                                                                 // over all users percentages 
                                                                 $overall_user_percent = $user_percent_1 + $user_percent_2 + $user_percent_3 + $user_percent_4;
                                                                 // VERDICT 
                                                                 if($overall_user_percent >= 70)
                                                                 {
                                                                     $verdict = 'passed';
                                                                 }
                                                                 else{
                                                                     $verdict = 'failed';
                                                                 }

                                                                $stmt->close();// get the answer

                                                                // insert data in result db 
                                                                $stmt = $conn->prepare("insert into result 
                                                                (cert_id, type, email, full_name,
                                                                user_percent_1, user_percent_2, user_percent_3, user_percent_4, overall_user_percent,  
                                                                max_percent_1, max_percent_2, max_percent_3, max_percent_4, overall_max_percent, verdict) 
                                                                value (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                                                $stmt->bind_param('ssssdddddddddis', 
                                                                $cert_id, $type, $email, $full_name, 
                                                                $user_percent_1, $user_percent_2, $user_percent_3, $user_percent_4, $overall_user_percent,
                                                                $max_percent_1, $max_percent_2, $max_percent_3, $max_percent_4, $overall_max_percent, 
                                                                $verdict );
                                                                $stmt->execute();

                                                                if($stmt->affected_rows > 0)
                                                                {
                                                                    ?>
                                                                        <script>
                                                                            location.href = 'result_examination.php?type=<?php echo $type?>';
                                                                        </script>
                                                                    <?php
                                                                }
                                                                else{
                                                                    echo '
                                                                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                        Something went wrong, please try again!
                                                                    </div>
                                                                    ';
                                                                }
                                                                $stmt->close();//insert the data

                                                            }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </section>
                                <?php 
                            }
                        }
                        else
                        if($type == 'wdv4' && $approval == 1)
                        {
                            $stmt = $conn->prepare("select * from result where email = ? and type = ?"); // check if already taken the exam
                            $stmt->bind_param('ss', $email, $type);
                            $stmt->execute();
                            $res = $stmt->get_result();

                            // if user already take the exam 
                            if($res->num_rows > 0)
                            {
                                ?>
                                    <script>
                                        location.href = "404.php";
                                    </script>
                                <?php 
                            }
                            else
                            {
                                ?>
                                    <!-- ======= start Hero ======= -->
                                    <section id="hero">
                                        <div class="container">
                                            <div class="flex justify-content-center">
                                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                    <div data-aos="zoom-out">
                                                        <h1 class="text-center text-lg-center">
                                                            Web Development <br>
                                                            Level 4
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
                                                <h2 class="text-secondary">Web Development </h2>
                                                <p style="color: #ff8c00;">
                                                    <!-- 45 minutes timer -->
                                                    <script type="text/javascript">
                                                        var timeLeft = (45 * 60);
                                                    </script>
                                                </p>
                                                <p style="position:sticky;" id="time">Timeout</p>
                                            </div>

                                            <div class="container-fluid" data-aos="fade-up">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 col-lg-11">
                                                        <!-- user data for enrollment -->
                                                        
                                                        <?php 
                                                        
                                                            $stmt = $conn->prepare("select * from test where type = ? order by rand() limit 40");
                                                            $stmt->bind_param('s', $type);
                                                            $stmt->execute();
                                                            $res = $stmt->get_result();
                                                            $count_ques = 1;

                                                            if($res->num_rows)
                                                            {
                                                                ?>
                                                                    <form method="post">
                                                                        <!-- buttons for previous and next and submit button================================================ -->
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-5">
                                                                                <button type="button" id="prev" class="btn btn-primary">Previous</button>
                                                                                <button type="button" id="next" class="btn btn-primary">Next</button>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div id="submit-container" style="display:none; text-align: center;">
                                                                                    <button type="submit" id="submit_id" name="submit_quiz" class="btn btn-primary">
                                                                                    <h6 class="text-white"> Submit Examination </h6>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br><br>

                                                                        <!-- script for timer ============================================================= -->
                                                                        <script>
                                                                            function timeout() {
                                                                            var minutes = Math.floor(timeLeft / 60);
                                                                            var seconds = timeLeft % 60;
                                                                            var mins = checktime(minutes);
                                                                            var secs = checktime(seconds);

                                                                                if (timeLeft <= 0) {
                                                                                    clearTimeout(tm);
                                                                                    document.getElementById("submit_id").click();
                                                                                } else {
                                                                                    document.getElementById("time").innerHTML = mins + ":" + secs;
                                                                                }
                                                                                timeLeft--;
                                                                                var tm = setTimeout(function () { timeout() }, 1000);
                                                                            }

                                                                            function checktime(msg) {
                                                                                if (msg < 10) {
                                                                                    msg = "0" + msg;
                                                                                }
                                                                                return msg;
                                                                            }
                                                                            timeout();
                                                                        </script>

                                                                        <!-- wrap thw whole while to display question one by one on the same position -->
                                                                        <div id="question-container">
                                                                <?php
                                                                while($row = $res->fetch_assoc())
                                                                {
                                                                    $question = $row['question'];
                                                                    $opt1 = $row['opt1'];
                                                                    $opt2 = $row['opt2'];
                                                                    $opt3 = $row['opt3'];
                                                                    $opt4 = $row['opt4'];
                                                                    $answer = $row['answer'];

                                                                    $ques_type = $row['ques_type'];
                                                                    $image = $row['image'];

                                                                    // this is to shuffle options 
                                                                    $options = array($opt1, $opt2, $opt3, $opt4);
                                                                    shuffle($options);
                                                                    ?>
                                                                        <!-- add question class in row to display question one by one  -->
                                                                        <div class="row question">
                                                                            <!-- question here  -->
                                                                            <div class="col-md-12 mb-3">
                                                                                <h6 class="fw-bold">
                                                                                    <?php echo $count_ques++ .' .) '. $question ?>
                                                                                </h6>
                                                                                <!-- image here  -->
                                                                                <?php
                                                                                    if(empty($image))
                                                                                    {
                                                                                        $image = '';
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $image = ' <img src="admin/'.$image.'" class="img-fluid"> ';
                                                                                    }
                                                                                    echo $image;
                                                                                ?>
                                                                            </div>
                                                                            <!-- Option  -->
                                                                            <div class="col-md-12 ml-5">
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[0] ?>" class="mb-3"/>
                                                                                    <span><h6>A.) &nbsp; </h6><?php echo $options[0] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[1] ?>" class="mb-3"/>
                                                                                    <span><h6>B.) &nbsp; </h6><?php echo $options[1] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[2] ?>" class="mb-3"/>
                                                                                    <span><h6>C.) &nbsp; </h6><?php echo $options[2] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[3] ?>" class="mb-3"/>
                                                                                    <span><h6>D.) &nbsp; </h6><?php echo $options[3] ?></span>
                                                                                </label>
                                                                            </div>
                                                                            <!-- Default answer  -->
                                                                            <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="default_answer" checked style="display: none;">

                                                                            <!-- identify question type  -->
                                                                            <input type="hidden" name="ques_type[<?php echo $row['id'] ?>]" value="<?php echo $ques_type ?>" readonly>
                                                                            
                                                                        </div>                                                                
                                                                    <?php
                                                                }
                                                                ?>
                                                                        </div>
                                                                    </form>

                                                                    <!-- style and script for next and previous Button ======================================  -->
                                                                    <style>
                                                                        #question-container {
                                                                            position: relative;
                                                                            height: 100%;
                                                                            margin-bottom: 100%;
                                                                        }

                                                                        .question {
                                                                            position: absolute;
                                                                            top: 0;
                                                                            left: 0;
                                                                            width: 100%;
                                                                            height: 100%;
                                                                            display: none;
                                                                        }

                                                                        .question:first-child {
                                                                            display: block;
                                                                        }
                                                                    </style>
                                                                    <script>
                                                                        var currentQuestion = 1;
                                                                        var numQuestions = <?php echo $count_ques-1; ?>; // number of questions, excluding the submit button

                                                                        document.getElementById("next").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion++;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion == numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "block";
                                                                            }
                                                                        });

                                                                        document.getElementById("prev").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion > 1) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion--;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "none";
                                                                            }
                                                                        });


                                                                        // browser restriction 
                                                                        // var tabContainer = document.getElementById('examination');
                                                                        // var warn = 2;

                                                                        // tabContainer.addEventListener('mouseenter', handleMouseEnter)   
                                                                        // tabContainer.addEventListener('mouseleave', handleMouseLeave)
                                                                        
                                                                        // // mouse is inside the browser  
                                                                        // function handleMouseEnter() 
                                                                        // {
                                                                        //     console.log('Mouse entered the tab');
                                                                        // }
                                                                        // // mouse is outside the browser  
                                                                        // function handleMouseLeave() 
                                                                        // {
                                                                        //     if(warn > 0)
                                                                        //     {
                                                                        //         alert('you can\'t leave during the examination ! warning left: '
                                                                        //          +  warn);
                                                                        //          warn --;
                                                                        //     }
                                                                        //     else if(warn == 0)
                                                                        //     {
                                                                        //         document.getElementById("submit_id").click();
                                                                        //     }

                                                                        // }

                                                                        // Declare the warn variables outside the event listener to retain their values
                                                                        var warnAlt = 2;
                                                                        var warnCtrl = 2;
                                                                        var warnPrtSc = 2;

                                                                        // Disable Alt, Ctrl, and Print Screen keys
                                                                        document.addEventListener("keydown", function(event) 
                                                                        {
                                                                            if (event.key === "Alt") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnAlt > 0) 
                                                                                {
                                                                                    alert("Warning: Alt + Tab is forbidden. Remaining warnings: " + warnAlt);
                                                                                    warnAlt--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            } 
                                                                            else if (event.key === "Control") 
                                                                            {   
                                                                                event.preventDefault();
                                                                                if (warnCtrl > 0) 
                                                                                {
                                                                                    alert("Warning: ctrl is forbidden. Remaining warnings: " + warnCtrl);
                                                                                    warnCtrl--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                            else if (event.key === "PrintScreen") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnPrtSc > 0) 
                                                                                {
                                                                                    alert("Warning: PrtSc is forbidden. Remaining warnings: " + warnPrtSc);
                                                                                    warnPrtSc--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                            });
                                                                    </script>
                                                                <?php
                                                            }
                                                            $stmt->close();//select from test questions

                                                            //if quiz is submitted 
                                                            if(isset($_POST['submit_quiz']))
                                                            {
                                                                // users answer in form
                                                                $answer = $_POST['answer'];
                                                                // users ques_type in form
                                                                $ques_type = $_POST['ques_type'];

                                                                // get maximum percentage per question type
                                                                $max_percent_1 = 0; 
                                                                $max_percent_2 = 0; 
                                                                $max_percent_3 = 0; 
                                                                $max_percent_4 = 0;
                                                                $overall_max_percent = 0; 

                                                                // get users percentage per question type
                                                                $user_percent_1 = 0; 
                                                                $user_percent_2 = 0; 
                                                                $user_percent_3 = 0; 
                                                                $user_percent_4 = 0; 
                                                                $overall_user_percent = 0; 

                                                                // Count question type
                                                                $count_1 = 0; 
                                                                $count_2 = 0; 
                                                                $count_3 = 0; 
                                                                $count_4 = 0; 

                                                                // correct, wrong and unanswered variables 
                                                                $correct = 0;
                                                                $wrong = 0;
                                                                $unanswered = 0;

                                                                // total count question for question type 
                                                                $total_question_1 = 0;
                                                                $total_question_2 = 0;
                                                                $total_question_3 = 0;
                                                                $total_question_4 = 0;

                                                                $verdict = '';

                                                                // initialization for correct, wrong, and unanswered per question types
                                                                $correct_1 = 0; $wrong_1 = 0; $unanswered_1 = 0;
                                                                $correct_2 = 0; $wrong_2 = 0; $unanswered_2 = 0;
                                                                $correct_3 = 0; $wrong_3 = 0; $unanswered_3 = 0;
                                                                $correct_4 = 0; $wrong_4 = 0; $unanswered_4 = 0;

                                                                // total question count 
                                                                $total_questions = 40;

                                                                // generate certificate id 
                                                                $cert_id = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 12);
                                                                
                                                                $array_ques_type = array();

                                                                foreach($answer as $question_id => $answer)
                                                                {
                                                                    // get answer 
                                                                    $stmt = $conn->prepare("select * from test where id = ?");
                                                                    $stmt->bind_param('i', $question_id);
                                                                    $stmt->execute();
                                                                    $res = $stmt->get_result();
                                                                    $row = mysqli_fetch_assoc($res);

                                                                    // answer from db 
                                                                    $correct_answer = $row['answer'];
                                                                    // ques_type from db 
                                                                    $ques_type = $row['ques_type'];

                                                                    // get count of every question type first
                                                                    if($ques_type == 'html')
                                                                    {
                                                                        $count_1 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_1 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_1 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_1 ++ ;
                                                                        }
                                                                        if($count_1 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "html");
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'css')
                                                                    {
                                                                        $count_2 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_2 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_2 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_2 ++ ;
                                                                        }
                                                                        if($count_2 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "css");
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'js')
                                                                    {
                                                                        $count_3 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_3 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_3 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_3 ++ ;
                                                                        }
                                                                        if($count_3 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "js");
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'php')
                                                                    {
                                                                        $count_4 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_4 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_4 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_4 ++ ;
                                                                        }
                                                                        if($count_4 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "php");
                                                                        }
                                                                    }
                                                                }

                                                                $count_overall = count($array_ques_type);

                                                                if(in_array('html', $array_ques_type))
                                                                {
                                                                    $max_percent_1 = ( $count_1 / $count_overall) * 100;
                                                                    $user_percent_1 = ( $correct_1 / $count_overall) * 100;
                                                                }
                                                                if(in_array('css', $array_ques_type))
                                                                {
                                                                    $max_percent_2 = ( $count_2 / $count_overall) * 100;
                                                                    $user_percent_2 = ( $correct_2 / $count_overall) * 100;
                                                                }
                                                                if(in_array('js', $array_ques_type))
                                                                {
                                                                    $max_percent_3 = ( $count_3 / $count_overall) * 100;
                                                                    $user_percent_3 = ( $correct_3 / $count_overall) * 100;
                                                                }
                                                                if(in_array('php', $array_ques_type))
                                                                {
                                                                    $max_percent_4 = ( $count_4 / $count_overall) * 100;
                                                                    $user_percent_4 = ( $correct_4 / $count_overall) * 100;
                                                                }

                                                                 // over all max percentages 
                                                                 $overall_max_percent = 100.000;
                                                                 // over all users percentages 
                                                                 $overall_user_percent = $user_percent_1 + $user_percent_2 + $user_percent_3 + $user_percent_4;
                                                                 // VERDICT 
                                                                 if($overall_user_percent >= 70)
                                                                 {
                                                                     $verdict = 'passed';
                                                                 }
                                                                 else{
                                                                     $verdict = 'failed';
                                                                 }

                                                                $stmt->close();// get the answer

                                                                // insert data in result db 
                                                                $stmt = $conn->prepare("insert into result 
                                                                (cert_id, type, email, full_name,
                                                                user_percent_1, user_percent_2, user_percent_3, user_percent_4, overall_user_percent,  
                                                                max_percent_1, max_percent_2, max_percent_3, max_percent_4, overall_max_percent, verdict) 
                                                                value (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                                                $stmt->bind_param('ssssdddddddddis', 
                                                                $cert_id, $type, $email, $full_name, 
                                                                $user_percent_1, $user_percent_2, $user_percent_3, $user_percent_4, $overall_user_percent,
                                                                $max_percent_1, $max_percent_2, $max_percent_3, $max_percent_4, $overall_max_percent, 
                                                                $verdict );
                                                                $stmt->execute();

                                                                if($stmt->affected_rows > 0)
                                                                {
                                                                    ?>
                                                                        <script>
                                                                            location.href = 'result_examination.php?type=<?php echo $type?>';
                                                                        </script>
                                                                    <?php
                                                                }
                                                                else{
                                                                    echo '
                                                                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                        Something went wrong, please try again!
                                                                    </div>
                                                                    ';
                                                                }
                                                                $stmt->close();//insert the data

                                                            }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </section>
                                <?php 
                            }
                        }
                        else
                        if($type == 'wdv5' && $approval == 1)
                        {
                            $stmt = $conn->prepare("select * from result where email = ? and type = ?"); // check if already taken the exam
                            $stmt->bind_param('ss', $email, $type);
                            $stmt->execute();
                            $res = $stmt->get_result();

                            // if user already take the exam 
                            if($res->num_rows > 0)
                            {
                                ?>
                                    <script>
                                        location.href = "404.php";
                                    </script>
                                <?php 
                            }
                            else
                            {
                                ?>
                                    <!-- ======= start Hero ======= -->
                                    <section id="hero">
                                        <div class="container">
                                            <div class="flex justify-content-center">
                                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                                    <div data-aos="zoom-out">
                                                        <h1 class="text-center text-lg-center">
                                                            Web Development <br>
                                                            Level 5
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
                                                <h2 class="text-secondary">Web Development </h2>
                                                <p style="color: #ff8c00;">
                                                    <!-- 45 minutes timer -->
                                                    <script type="text/javascript">
                                                        var timeLeft = (45 * 60);
                                                    </script>
                                                </p>
                                                <p style="position:sticky;" id="time">Timeout</p>
                                            </div>

                                            <div class="container-fluid" data-aos="fade-up">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 col-lg-11">
                                                        <!-- user data for enrollment -->
                                                        
                                                        <?php 
                                                        
                                                            $stmt = $conn->prepare("select * from test where type = ? order by rand() limit 40");
                                                            $stmt->bind_param('s', $type);
                                                            $stmt->execute();
                                                            $res = $stmt->get_result();
                                                            $count_ques = 1;

                                                            if($res->num_rows)
                                                            {
                                                                ?>
                                                                    <form method="post">
                                                                        <!-- buttons for previous and next and submit button================================================ -->
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-5">
                                                                                <button type="button" id="prev" class="btn btn-primary">Previous</button>
                                                                                <button type="button" id="next" class="btn btn-primary">Next</button>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div id="submit-container" style="display:none; text-align: center;">
                                                                                    <button type="submit" id="submit_id" name="submit_quiz" class="btn btn-primary">
                                                                                    <h6 class="text-white"> Submit Examination </h6>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br><br>

                                                                        <!-- script for timer ============================================================= -->
                                                                        <script>
                                                                            function timeout() {
                                                                            var minutes = Math.floor(timeLeft / 60);
                                                                            var seconds = timeLeft % 60;
                                                                            var mins = checktime(minutes);
                                                                            var secs = checktime(seconds);

                                                                                if (timeLeft <= 0) {
                                                                                    clearTimeout(tm);
                                                                                    document.getElementById("submit_id").click();
                                                                                } else {
                                                                                    document.getElementById("time").innerHTML = mins + ":" + secs;
                                                                                }
                                                                                timeLeft--;
                                                                                var tm = setTimeout(function () { timeout() }, 1000);
                                                                            }

                                                                            function checktime(msg) {
                                                                                if (msg < 10) {
                                                                                    msg = "0" + msg;
                                                                                }
                                                                                return msg;
                                                                            }
                                                                            timeout();
                                                                        </script>

                                                                        <!-- wrap thw whole while to display question one by one on the same position -->
                                                                        <div id="question-container">
                                                                <?php
                                                                while($row = $res->fetch_assoc())
                                                                {
                                                                    $question = $row['question'];
                                                                    $opt1 = $row['opt1'];
                                                                    $opt2 = $row['opt2'];
                                                                    $opt3 = $row['opt3'];
                                                                    $opt4 = $row['opt4'];
                                                                    $answer = $row['answer'];

                                                                    $ques_type = $row['ques_type'];
                                                                    $image = $row['image'];

                                                                    // this is to shuffle options 
                                                                    $options = array($opt1, $opt2, $opt3, $opt4);
                                                                    shuffle($options);
                                                                    ?>
                                                                        <!-- add question class in row to display question one by one  -->
                                                                        <div class="row question">
                                                                            <!-- question here  -->
                                                                            <div class="col-md-12 mb-3">
                                                                                <h6 class="fw-bold">
                                                                                    <?php echo $count_ques++ .' .) '. $question ?>
                                                                                </h6>
                                                                                <!-- image here  -->
                                                                                <?php
                                                                                    if(empty($image))
                                                                                    {
                                                                                        $image = '';
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $image = ' <img src="admin/'.$image.'" class="img-fluid"> ';
                                                                                    }
                                                                                    echo $image;
                                                                                ?>
                                                                            </div>
                                                                            <!-- Option  -->
                                                                            <div class="col-md-12 ml-5">
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[0] ?>" class="mb-3"/>
                                                                                    <span><h6>A.) &nbsp; </h6><?php echo $options[0] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[1] ?>" class="mb-3"/>
                                                                                    <span><h6>B.) &nbsp; </h6><?php echo $options[1] ?></span>
                                                                                </label>
                                                                                <label>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[2] ?>" class="mb-3"/>
                                                                                    <span><h6>C.) &nbsp; </h6><?php echo $options[2] ?></span>
                                                                                </label>
                                                                                <label title=<?php echo $answer ?>>
                                                                                    <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $options[3] ?>" class="mb-3"/>
                                                                                    <span><h6>D.) &nbsp; </h6><?php echo $options[3] ?></span>
                                                                                </label>
                                                                            </div>
                                                                            <!-- Default answer  -->
                                                                            <input type="radio" name="answer[<?php echo $row['id'] ?>]" value="default_answer" checked style="display: none;">

                                                                            <!-- identify question type  -->
                                                                            <input type="hidden" name="ques_type[<?php echo $row['id'] ?>]" value="<?php echo $ques_type ?>" readonly>
                                                                            
                                                                        </div>                                                                
                                                                    <?php
                                                                }
                                                                ?>
                                                                        </div>
                                                                    </form>

                                                                    <!-- style and script for next and previous Button ======================================  -->
                                                                    <style>
                                                                        #question-container {
                                                                            position: relative;
                                                                            height: 100%;
                                                                            margin-bottom: 100%;
                                                                        }

                                                                        .question {
                                                                            position: absolute;
                                                                            top: 0;
                                                                            left: 0;
                                                                            width: 100%;
                                                                            height: 100%;
                                                                            display: none;
                                                                        }

                                                                        .question:first-child {
                                                                            display: block;
                                                                        }
                                                                    </style>
                                                                    <script>
                                                                        var currentQuestion = 1;
                                                                        var numQuestions = <?php echo $count_ques-1; ?>; // number of questions, excluding the submit button

                                                                        document.getElementById("next").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion++;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion == numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "block";
                                                                            }
                                                                        });

                                                                        document.getElementById("prev").addEventListener("click", function() 
                                                                        {
                                                                            if (currentQuestion > 1) {
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "none";
                                                                                currentQuestion--;
                                                                                document.querySelector(".question:nth-of-type(" + currentQuestion + ")").style.display = "block";
                                                                            }
                                                                            if (currentQuestion < numQuestions) {
                                                                                document.getElementById("submit-container").style.display = "none";
                                                                            }
                                                                        });


                                                                        // browser restriction 
                                                                        // var tabContainer = document.getElementById('examination');
                                                                        // var warn = 2;

                                                                        // tabContainer.addEventListener('mouseenter', handleMouseEnter)   
                                                                        // tabContainer.addEventListener('mouseleave', handleMouseLeave)
                                                                        
                                                                        // // mouse is inside the browser  
                                                                        // function handleMouseEnter() 
                                                                        // {
                                                                        //     console.log('Mouse entered the tab');
                                                                        // }
                                                                        // // mouse is outside the browser  
                                                                        // function handleMouseLeave() 
                                                                        // {
                                                                        //     if(warn > 0)
                                                                        //     {
                                                                        //         alert('you can\'t leave during the examination ! warning left: '
                                                                        //          +  warn);
                                                                        //          warn --;
                                                                        //     }
                                                                        //     else if(warn == 0)
                                                                        //     {
                                                                        //         document.getElementById("submit_id").click();
                                                                        //     }

                                                                        // }

                                                                        // Declare the warn variables outside the event listener to retain their values
                                                                        var warnAlt = 2;
                                                                        var warnCtrl = 2;
                                                                        var warnPrtSc = 2;

                                                                        // Disable Alt, Ctrl, and Print Screen keys
                                                                        document.addEventListener("keydown", function(event) 
                                                                        {
                                                                            if (event.key === "Alt") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnAlt > 0) 
                                                                                {
                                                                                    alert("Warning: Alt + Tab is forbidden. Remaining warnings: " + warnAlt);
                                                                                    warnAlt--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            } 
                                                                            else if (event.key === "Control") 
                                                                            {   
                                                                                event.preventDefault();
                                                                                if (warnCtrl > 0) 
                                                                                {
                                                                                    alert("Warning: ctrl is forbidden. Remaining warnings: " + warnCtrl);
                                                                                    warnCtrl--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                            else if (event.key === "PrintScreen") 
                                                                            {
                                                                                event.preventDefault();
                                                                                if (warnPrtSc > 0) 
                                                                                {
                                                                                    alert("Warning: PrtSc is forbidden. Remaining warnings: " + warnPrtSc);
                                                                                    warnPrtSc--;
                                                                                } else {
                                                                                    document.getElementById("submit_id").click();
                                                                                }
                                                                            }
                                                                            });
                                                                    </script>
                                                                <?php
                                                            }
                                                            $stmt->close();//select from test questions

                                                            //if quiz is submitted 
                                                            if(isset($_POST['submit_quiz']))
                                                            {
                                                                // users answer in form
                                                                $answer = $_POST['answer'];
                                                                // users ques_type in form
                                                                $ques_type = $_POST['ques_type'];

                                                                // get maximum percentage per question type
                                                                $max_percent_1 = 0; 
                                                                $max_percent_2 = 0; 
                                                                $max_percent_3 = 0; 
                                                                $max_percent_4 = 0;
                                                                $overall_max_percent = 0; 

                                                                // get users percentage per question type
                                                                $user_percent_1 = 0; 
                                                                $user_percent_2 = 0; 
                                                                $user_percent_3 = 0; 
                                                                $user_percent_4 = 0; 
                                                                $overall_user_percent = 0; 

                                                                // Count question type
                                                                $count_1 = 0; 
                                                                $count_2 = 0; 
                                                                $count_3 = 0; 
                                                                $count_4 = 0; 

                                                                // correct, wrong and unanswered variables 
                                                                $correct = 0;
                                                                $wrong = 0;
                                                                $unanswered = 0;

                                                                // total count question for question type 
                                                                $total_question_1 = 0;
                                                                $total_question_2 = 0;
                                                                $total_question_3 = 0;
                                                                $total_question_4 = 0;

                                                                $verdict = '';

                                                                // initialization for correct, wrong, and unanswered per question types
                                                                $correct_1 = 0; $wrong_1 = 0; $unanswered_1 = 0;
                                                                $correct_2 = 0; $wrong_2 = 0; $unanswered_2 = 0;
                                                                $correct_3 = 0; $wrong_3 = 0; $unanswered_3 = 0;
                                                                $correct_4 = 0; $wrong_4 = 0; $unanswered_4 = 0;

                                                                // total question count 
                                                                $total_questions = 40;

                                                                // generate certificate id 
                                                                $cert_id = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 12);
                                                                
                                                                $array_ques_type = array();

                                                                foreach($answer as $question_id => $answer)
                                                                {
                                                                    // get answer 
                                                                    $stmt = $conn->prepare("select * from test where id = ?");
                                                                    $stmt->bind_param('i', $question_id);
                                                                    $stmt->execute();
                                                                    $res = $stmt->get_result();
                                                                    $row = mysqli_fetch_assoc($res);

                                                                    // answer from db 
                                                                    $correct_answer = $row['answer'];
                                                                    // ques_type from db 
                                                                    $ques_type = $row['ques_type'];

                                                                    // get count of every question type first
                                                                    if($ques_type == 'html')
                                                                    {
                                                                        $count_1 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_1 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_1 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_1 ++ ;
                                                                        }
                                                                        if($count_1 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "html");
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'css')
                                                                    {
                                                                        $count_2 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_2 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_2 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_2 ++ ;
                                                                        }
                                                                        if($count_2 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "css");
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'js')
                                                                    {
                                                                        $count_3 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_3 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_3 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_3 ++ ;
                                                                        }
                                                                        if($count_3 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "js");
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'php')
                                                                    {
                                                                        $count_4 ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_4 ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_4 ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_4 ++ ;
                                                                        }
                                                                        if($count_4 > 0)
                                                                        {
                                                                            array_push($array_ques_type, "php");
                                                                        }
                                                                    }
                                                                }

                                                                $count_overall = count($array_ques_type);

                                                                if(in_array('html', $array_ques_type))
                                                                {
                                                                    $max_percent_1 = ( $count_1 / $count_overall) * 100;
                                                                    $user_percent_1 = ( $correct_1 / $count_overall) * 100;
                                                                }
                                                                if(in_array('css', $array_ques_type))
                                                                {
                                                                    $max_percent_2 = ( $count_2 / $count_overall) * 100;
                                                                    $user_percent_2 = ( $correct_2 / $count_overall) * 100;
                                                                }
                                                                if(in_array('js', $array_ques_type))
                                                                {
                                                                    $max_percent_3 = ( $count_3 / $count_overall) * 100;
                                                                    $user_percent_3 = ( $correct_3 / $count_overall) * 100;
                                                                }
                                                                if(in_array('php', $array_ques_type))
                                                                {
                                                                    $max_percent_4 = ( $count_4 / $count_overall) * 100;
                                                                    $user_percent_4 = ( $correct_4 / $count_overall) * 100;
                                                                }

                                                                 // over all max percentages 
                                                                 $overall_max_percent = 100.000;
                                                                 // over all users percentages 
                                                                 $overall_user_percent = $user_percent_1 + $user_percent_2 + $user_percent_3 + $user_percent_4;
                                                                 // VERDICT 
                                                                 if($overall_user_percent >= 70)
                                                                 {
                                                                     $verdict = 'passed';
                                                                 }
                                                                 else{
                                                                     $verdict = 'failed';
                                                                 }

                                                                $stmt->close();// get the answer

                                                                // insert data in result db 
                                                                $stmt = $conn->prepare("insert into result 
                                                                (cert_id, type, email, full_name,
                                                                user_percent_1, user_percent_2, user_percent_3, user_percent_4, overall_user_percent,  
                                                                max_percent_1, max_percent_2, max_percent_3, max_percent_4, overall_max_percent, verdict) 
                                                                value (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                                                $stmt->bind_param('ssssdddddddddis', 
                                                                $cert_id, $type, $email, $full_name, 
                                                                $user_percent_1, $user_percent_2, $user_percent_3, $user_percent_4, $overall_user_percent,
                                                                $max_percent_1, $max_percent_2, $max_percent_3, $max_percent_4, $overall_max_percent, 
                                                                $verdict );
                                                                $stmt->execute();

                                                                if($stmt->affected_rows > 0)
                                                                {
                                                                    ?>
                                                                        <script>
                                                                            location.href = 'result_examination.php?type=<?php echo $type?>';
                                                                        </script>
                                                                    <?php
                                                                }
                                                                else{
                                                                    echo '
                                                                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                                        Something went wrong, please try again!
                                                                    </div>
                                                                    ';
                                                                }
                                                                $stmt->close();//insert the data

                                                            }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </section>
                                <?php 
                            }
                        }
                        else //if not approved
                        {
                            ?>
                                <script>
                                    location.href = "404.php";
                                </script>
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
        // include 'include/footer.php';
    ?>

</body>

</html>