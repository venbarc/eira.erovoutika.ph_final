<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robotics and Automation | EIRA</title>

    <?php
    session_start();
    include "connect.php";
    include "include/head_links.php";

    // navigation bar 
    include 'include/navbar.php';
    ?>

</head>

<body>

    <main>

        <!-- start  -->

        <main id="main">

            <?php
                // get url type of RNA certificate 
                if(isset($_GET['type']))
                {
                    $type = $_GET['type'];

                    if($type == 'rna1')
                    {
                        ?>
                            <!-- ======= RNA1 Section ======= -->
                            <section id="hero">
                                <div class="container">
                                    <div class="flex justify-content-center">
                                        <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                            <div data-aos="zoom-out">
                                                <h1 class="text-center text-lg-center">
                                                    Enrollment <strong class="text-warning">Robotics and Automation</strong> <br>
                                                    Certifications Level 1
                                                </h1>
                                                <div class="text-center text-lg-center">
                                                    <a href="enroll_rna.php?type=<?php echo $type ?>" type="button" class="btn btn-warning scrollto">Enroll now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 24 150 28 " preserveAspectRatio="none">
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
                            <!-- End Hero -->

                            <!-- ======= rna1 Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">Robotics and automation Certifications</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/rna/level 1.webp" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">ENTRY LEVEL</span> 
                                                <span class="idd"> ROBOTICS AND AUTOMATION</span>
                                               
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <div class="col-md-12 mb-5">
                                                    <br>
                                                    <div style="text-align: justify;">
                                                    Robotics Automation Level 1 is an entry-level comprehensive learning experience for 
                                                    individuals seeking to acquire new skills in the fields of robotics and automation. 
                                                    The program covers the basics to advanced concepts of the Arduino environment, programming 
                                                    language, and design. Participants will have hands-on experience in constructing their own 
                                                    automation projects enabling them to put their newfound knowledge into practice. At the end 
                                                    of the program, individuals will acquire the following:
                                                    </div>
                                                    <div style="margin-left: 3%;">
                                                         <span style="color: #00008b;">✱</span> Understanding of the fundamentals of robotics 
                                                         and automation <br>
                                                         <span style="color: #00008b;">✱</span> Design and build basic robotics and automation 
                                                         projects <br>
                                                         <span style="color: #00008b;">✱</span> Design and construct own automation projects 
                                                         using the Arduino environment, language, and programming. <br>
                                                    </div>
                                                    <br>
                                                    Similarly, there’s a Robotics and Automation certification exam. It’s designed to assess 
                                                    the candidate's knowledge and understanding of the fundamentals of robotics and automation 
                                                    such as Arduino programming, electronics circuit design, and troubleshooting. This exam is 
                                                    intended for candidates who wants to pursue career for Research and Development (R&D) 
                                                    engineer, Embedded system engineer, electronics design engineer, robotics and automation 
                                                    engineer, robotics teacher.
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- What makes it different  -->
                                        <div class="row" style="margin-top: 5%;" data-aos="fade-left">
                                            
                                        </div>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- Coverage title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <span class="head_title">
                                                        Exam Coverage
                                                    </span> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- details 1  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            1. INTRODUCTION TO ROBOTICS AND AUTOMATION
                                                        </div>
                                                        The exam objective in Introduction to Robotics and Automation assesses knowledge of 
                                                        basic principles, components, and applications of robots and automation, including history, 
                                                        types, artificial intelligence (AI), control, simulation and design, ethics and social 
                                                        implications, and current trends. It aims to provide a foundation for further study and 
                                                        careers.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            2. ARDUINO BOARD AND IDE
                                                        </div>
                                                        The Arduino is a platform for creating interactive objects and environments, with a 
                                                        micro controller and input/output (I/O) pins for interaction. The Arduino Integrated 
                                                        Development Environment (IDE) is a software application used to write and upload 
                                                        code to the board. The IDE includes a text editor, compiler, serial monitor, and 
                                                        library manager, making it user-friendly and easy to use.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 3  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            3. ARDUINO PROGRAMMING
                                                        </div>
                                                        The objective in Arduino Programming is to assess the candidate's understanding of 
                                                        writing and uploading code to the Arduino board, including controlling output devices, 
                                                        reading inputs, using operators and statements, implementing serial communication, using 
                                                        sensors, displaying data on an LCD, and developing a robotics project. The exam will 
                                                        evaluate the candidate's coding skills, understanding of Arduino programming, and ability 
                                                        to use the Arduino IDE and debug code.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 4  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            4. SERIAL COMMUNICATION
                                                        </div>
                                                        The objective in Serial Communication is to evaluate the candidate's understanding of 
                                                        transmitting data between the Arduino and a computer using serial communication, 
                                                        including sending and receiving data, using the Serial Monitor in the Arduino IDE, 
                                                        using serial communication in projects, and troubleshooting issues. The exam will 
                                                        test the candidate's knowledge of the basic principles of serial communication and 
                                                        their ability to implement it effectively in an Arduino project.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 5  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            5. REVIEW ON ELECTRONICS
                                                        </div>
                                                        The objective in Review on Electronics is to test the candidate's knowledge of basic 
                                                        electronics concepts and their ability to apply them in practical projects. The exam 
                                                        covers topics such as current, voltage, resistance, power, electrical components, 
                                                        use of basic electronic tools, reading schematics and circuit diagrams, analog and 
                                                        digital signals, and troubleshooting basic electronic circuits. The candidate's 
                                                        understanding and application of these concepts will be evaluated.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 6  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            6. DIGITAL OUTPUT, DELAY, LED
                                                        </div>
                                                        The objective in Digital Output, Delay, LED tests the candidate’s understanding and 
                                                        ability to control digital outputs, use delays, and control LEDs using the Arduino 
                                                        platform. The student should be able to write code to control digital outputs, use the 
                                                        delay () function, connect an LED and control its brightness, and calculate the 
                                                        appropriate resistor value. The goal is to ensure the student has a strong foundation 
                                                        in these basic concepts for practical applications.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 7  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            7. COMPARISON OPERATORS AND IF ELSES
                                                        </div>
                                                        The objective of this is to test the candidate’s understanding of comparison operators 
                                                        and their ability to use if-else statements to control the flow of a program based on 
                                                        certain conditions. The student should be able to write code using these concepts and 
                                                        should be able to debug and resolve errors. The goal is to ensure the student has a 
                                                        solid understanding of these fundamental concepts and can apply them to practical 
                                                        projects and applications.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 8  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            8. DIGITAL AND ANALOG SENSORS
                                                        </div>
                                                        The objective of this exam is to test the candidate's understanding of analog and 
                                                        digital inputs and their ability to use them to control the behavior of a program. 
                                                        The student should be able to connect sensors to a microcontroller, to read and get 
                                                        sensor values in a program using Seral monitor, and use them to control the output 
                                                        devices.  
                                                        <br><br>
                                                    </div>
                                                    <!-- details 9  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            9. INTEGRATION OF THE INPUT DEVICE TO THE OUTPUT DEVICES OF MICROCONTROLLER
                                                        </div>
                                                        The exam objective in Integration of the Input Device to the Output Device of 
                                                        Microcontroller is to assess the students' understanding of how to connect different 
                                                        types of input devices such as digital and analog sensors to the microcontroller and to 
                                                        determine the output of the microcontroller. The students should be able to demonstrate 
                                                        their ability to integrate input devices and perform operations on the microcontroller 
                                                        to achieve the desired output. This includes understanding how to program the 
                                                        microcontroller to communicate with the input and output devices, as well as the use of 
                                                        various programming techniques to perform operations on the data received from the input
                                                        devices.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 10  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            10. ROBOTICS AND AUTOMATION PROJECT
                                                        </div>
                                                        The objective in the Robotics and Automation Project is to assess the student's 
                                                        understanding of the fundamental concepts and principles of robotics and automation, 
                                                        as well as their ability to apply this knowledge to real-world problems. Additionally, 
                                                        they will evaluate the student's ability to analyze and design robotic systems, 
                                                        understand and implement automation processes, and analyze and solve complex problems 
                                                        related to robotics and automation.
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- HOW TO EVALUATE details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            How to evaluate examination ?
                                        </span>
                                        <br><br>
                                        <!-- evaluation 1  -->
                                        <div style="margin-left: 3%;">
                                            <strong>1. Robotics and Automation Terminologies (%)</strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            Covers Robotics and Automation Terminologies which will assess the examiner’s knowledge regarding 
                                            different Robotics and Automation concepts and terminologies. Additionally, this will evaluate the 
                                            examiner’s understanding of different terminologies that are used in learning about robot 
                                            components, automation, operation, and application.
                                        </div>
                                        <br>
                                        <!-- evaluation 2  -->
                                        <div style="margin-left: 3%;">
                                            <strong>2. Programming (%)</strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            Understand the process and execution of programming languages and commands. Additionally, 
                                            this aims to evaluate the examiner’s programming language proficiency and capability to 
                                            interpret logic and come up with efficient techniques to solve problems. 
                                        </div>
                                        <br>
                                        <!-- evaluation 3  -->
                                        <div style="margin-left: 3%;">
                                            <strong>3. Troubleshooting (%)</strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            The ability to recognize signs and issues and develop troubleshooting strategies to resolve 
                                            technical problems, and errors.  Evaluates the critical thinking skills and utilization of
                                            repair tools and resources required for diagnosing malfunctions of the robots or any Arduino 
                                            based automation projects. 
                                        </div>
                                        <br>
                                        <!-- evaluation 4  -->
                                        <div style="margin-left: 3%;">
                                            <strong>4. Design and Implementation (%)</strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            Produce a thorough plan outlining the structure, elements, and functionality of the product. 
                                            Able to understand the architecture, data structures, algorithms, and interfaces. Evaluate an 
                                            entire system and develop based on the integrated design specification including various components. 
                                        </div>
                                    </div>

                                    <div class="mt-5"></div>
                                    
                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Name</th>
                                                <td>Exam RA-101</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Pre-requisites</th>
                                                <td>None</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Validity</th>
                                                <td>
                                                    Lifetime
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Duration</th>
                                                <td>55 minutes</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>40 questions</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Type of Question</th>
                                                <td>Multiple Choice</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Cost</th>
                                                <td>$17 USD</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English</td>
                                            </tr>
                                    </table>
                                    
                                    

                                </div>
                            </section>
                            <!-- End rna1 Section -->
                        <?php
                    }
                   
                }
            ?>

            

        </main>
        <!-- end  -->


    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <?php
    include "include/foot_links.php";

    // navigation bar 
    include 'include/footer.php';
    ?>

</body>

</html>