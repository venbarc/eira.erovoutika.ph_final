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

                    ?>
                    <script>
                        console.log('<?php echo $approval_db ?>');
                    </script>
                    <?php
                    
                    if($approval == $approval_db) // if approval url is actually equals to approval in db 
                    {
                        // check if it's already approved
                        if($type == 'rna1' && $approval == 1)
                        {
                            $stmt = $conn->prepare("select * from result where email = ? and rna_type = ?"); // check if already taken the exam
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
                                                        
                                                            $stmt = $conn->prepare("select * from test where rna_type = ? order by rand() limit 40");
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
                                                                $max_percent_rnat = 0; 
                                                                $max_percent_rap = 0; 
                                                                $max_percent_rat = 0; 
                                                                $max_percent_dai = 0.0;
                                                                $overall_max_percent = 0; 

                                                                // get users percentage per question type
                                                                $user_percent_rnat = 0; 
                                                                $user_percent_rap = 0; 
                                                                $user_percent_rat = 0; 
                                                                $user_percent_dai = 0; 
                                                                $overall_user_percent = 0; 

                                                                // Count question type
                                                                $count_rnat = 0; 
                                                                $count_rap = 0; 
                                                                $count_rat = 0; 
                                                                $count_dai = 0; 

                                                                // correct, wrong and unanswered variables 
                                                                $correct = 0;
                                                                $wrong = 0;
                                                                $unanswered = 0;

                                                                // total count question for question type 
                                                                $total_question_rnat = 0;
                                                                $total_question_rap = 0;
                                                                $total_question_rat = 0;
                                                                $total_question_dai = 0;

                                                                $verdict = '';

                                                                // initialization for correct, wrong, and unanswered per question types
                                                                $correct_rnat = 0; $wrong_rnat = 0; $unanswered_rnat = 0;
                                                                $correct_rap = 0; $wrong_rap = 0; $unanswered_rap = 0;
                                                                $correct_rat = 0; $wrong_rat = 0; $unanswered_rat = 0;
                                                                $correct_dai = 0; $wrong_dai = 0; $unanswered_dai = 0;

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
                                                                        $count_rnat ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_rnat ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_rnat ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_rnat ++ ;
                                                                        }
                                                                        // percentage for rnat
                                                                        if($count_rnat > 0)
                                                                        {
                                                                            // Max percentage for rnat
                                                                            $max_percent_rnat = ($count_rnat / $total_questions) * 100;
                                                                            // users percentage for rnat
                                                                            $user_percent_rnat = ($correct_rnat / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'rap')
                                                                    {
                                                                        $count_rap ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_rap ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_rap ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_rap ++ ;
                                                                        }
                                                                        // percentage for rap
                                                                        if($count_rap > 0)
                                                                        {
                                                                            // Max percentage for rap
                                                                            $max_percent_rap = ($count_rap / $total_questions) * 100;
                                                                            // users percentage for rap
                                                                            $user_percent_rap = ($correct_rap / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'rat')
                                                                    {
                                                                        $count_rat ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_rat ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_rat ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_rat ++ ;
                                                                        }
                                                                        // percentage for rat
                                                                        if($count_rat > 0)
                                                                        {
                                                                            // Max percentage for rat
                                                                            $max_percent_rat = ($count_rat / $total_questions) * 100;
                                                                            // users percentage for rat
                                                                            $user_percent_rat = ($correct_rat / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    else
                                                                    if($ques_type == 'dai')
                                                                    {
                                                                        $count_dai ++ ;
                                                                        if($answer == 'default_answer')
                                                                        {
                                                                            $unanswered_dai ++ ;
                                                                        }
                                                                        else if(($answer == $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $correct_dai ++ ;
                                                                        }
                                                                        else if(($answer != $correct_answer) && ($answer !='default_answer'))
                                                                        {
                                                                            $wrong_dai ++ ;
                                                                        }
                                                                        // percentage for dai
                                                                        if($count_dai > 0)
                                                                        {
                                                                            // Max percentage for dai
                                                                            $max_percent_dai = ($count_dai / $total_questions) * 100;
                                                                            // users percentage for dai
                                                                            $user_percent_dai = ($correct_dai / $total_questions) * 100;
                                                                        }
                                                                    }
                                                                    // over all max percentages 
                                                                    $overall_max_percent = $max_percent_rnat + $max_percent_rap + $max_percent_rat + $max_percent_dai;
                                                                    // over all users percentages 
                                                                    $overall_user_percent = $user_percent_rnat + $user_percent_rap + $user_percent_rat + $user_percent_dai;
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
                                                                (cert_id, rna_type, email, full_name,
                                                                user_percent_rnat, user_percent_rap, user_percent_rat, user_percent_dai, overall_user_percent,  
                                                                max_percent_rnat, max_percent_rap, max_percent_rat, max_percent_dai, overall_max_percent, verdict) 
                                                                value (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                                                $stmt->bind_param('ssssdddddddddis', 
                                                                $cert_id, $type, $email, $full_name, 
                                                                $user_percent_rnat, $user_percent_rap, $user_percent_rat, $user_percent_dai, $overall_user_percent,
                                                                $max_percent_rnat, $max_percent_rap, $max_percent_rat, $max_percent_dai, $overall_max_percent, 
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
    ?>

</body>

</html>