<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CompTIA | EIRA</title>

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
        <!-- ======= COMPTIA Section ======= -->
        <section id="hero">
            <div class="container">
                <div class="flex justify-content-center">
                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                        <div data-aos="zoom-out">
                            <h1 class="text-center text-lg-center">Enrollment <strong class="text-danger">CompTIA</strong> Certifications</h1>
                            <div class="text-center text-lg-center">
                                <a href="https://docs.google.com/forms/d/e/1FAIpQLSeOLdDhjSfDZBjpz4Nos9sjPHOxMucUt8ngIwVE-FjVyoJc3w/viewform" target="_blank" type="button" class="btn btn-warning scrollto">
                                    Enroll now
                                </a>
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
        </section><!-- End Hero -->

        <main id="main">

            <?php
                // get url type of comptia certificate 
                if(isset($_GET['type']))
                {
                    $type = $_GET['type'];

                    if($type == 'itf')
                    {
                        ?>
                            <!-- ======= ITF+ Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">CompTIA Training and Certifications</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/comptia/comptia-img1.svg" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">CompTIA IT Fundamentals (ITF+)</span> 
                                                <span class="idd">is an introduction to basic IT knowledge and skills.</span>
                                                <!-- what will you learn title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <span class="head_title">
                                                        What skill you will learn?
                                                    </span> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- learn 1  -->
                                                    <div class="col-md-2 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            IT CONCEPTS & TERMINOLOGY
                                                        </div>
                                                        Understanding notational systems, demonstrating the fundamentals of computing, 
                                                        outlining the importance of data, and providing troubleshooting.
                                                    </div>
                                                    <!-- learn 2  -->
                                                    <div class="col-md-2 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            INFRASTRUCTURE
                                                        </div>
                                                        understand how to protect a simple wireless network or configure and install popular 
                                                        peripheral devices on a laptop or computer.
                                                    </div>
                                                    <!-- learn 3  -->
                                                    <div class="col-md-2 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            APPLICATIONS & SOFTWARE
                                                        </div>
                                                        Manage software applications, comprehend the many elements of an operating system,
                                                        and describe the rationale behind various application design techniques.
                                                    </div>
                                                    <!-- learn 4  -->
                                                    <div class="col-md-2 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            SOFTWARE DEVELOPMENT
                                                        </div>
                                                        Understand the different types of programming languages, how to use logic, and why certain
                                                        programming principles are important.
                                                    </div>
                                                    <!-- learn 5  -->
                                                    <div class="col-md-2 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            DATABASE FUNDAMENTALS
                                                        </div>
                                                        Knowing how to explain database principles, structures, and purposes as well as how 
                                                        to employ interface approaches.
                                                    </div>
                                                    <!-- learn 6  -->
                                                    <div class="col-md-2 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            SECURITY
                                                        </div>
                                                        Recognize the issues with confidentiality, integrity, and availability for secure devices and best practices.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- who would benefit  -->
                                        <div class="row" style="margin-top: 5%;" data-aos="fade-left">
                                            <div class="col-md-6 mb-5">
                                                <div class="fw-bold text-danger ">
                                                    Who would benefit from ITF+?
                                                </div>
                                                <br>
                                                <span class="text-danger">✱</span> students who are considering an IT profession. <br>
                                                <span class="text-danger">✱</span> professionals in industries where a thorough understanding of IT is necessary. <br>
                                                <span class="text-danger">✱</span> employees in marketing, sales, and operations for IT-based businesses. <br>
                                            </div>
                                            <div class="col-md-6 mb-5">
                                                <div class="fw-bold text-danger ">
                                                    Why would you benefit from ITF+?
                                                </div>
                                                <br>
                                                <div style="text-align: justify;">
                                                    Over the ten-year period 2019–29, the number of IT positions is anticipated to increase
                                                    by 531,200, a rate substantially higher than the average (11%). (Source: U.S. Bureau of
                                                    Labor Statistics) Nearly 75% of employers globally consider technology to be a primary
                                                    factor. a factor in achieving corporate goals (72%). International Trends in Technology
                                                    and Workforce, CompTIA To use these technologies, all employees must have a foundational
                                                    understanding of IT.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Codes</th>
                                                <td>Exam FC0-U61</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Lunch Date</th>
                                                <td>September 4, 2018</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Details</th>
                                                <td>
                                                    The focus of the new CompTIA IT Fundamentals test is on the knowledge and abilities
                                                    needed to recognize and articulate the fundamentals of computing, IT infrastructure,
                                                    software development, and database use. To better distinguish ourselves in the business
                                                    and demonstrate CompTIA quality and standards, the + has been added with this new edition.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>Maximum of 75 questions per exam</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Type of Questions</th>
                                                <td>Multiple choice</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Length of Test</th>
                                                <td>60 Minutes</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>650 (on a scale of 900)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>No prior experience necessary</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Testing Provider</th>
                                                <td>Pearson VUE</td>
                                            </tr>
                                    </table>
                                    
                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            CompTIA IT Fundamentals FC0-U61: What’s in this version
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            The exam will attest that the victorious applicant possesses the knowledge and abilities
                                            necessary to recognize and explain the fundamentals of computing, IT infrastructure, applications
                                            and software, software development, database fundamentals, and security. Additionally, candidates
                                            will be able to show their expertise to:
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <span class="text-danger">✱</span> Install software <br>
                                            <span class="text-danger">✱</span> Establish basic network connectivity <br>
                                            <span class="text-danger">✱</span> Identify/prevent basic security risks <br>
                                            <span class="text-danger">✱</span> Explain troubleshooting theory and preventative maintenance of devices <br>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <!-- End ITF+ Section -->
                        <?php
                    }
                    else
                    if($type == 'a')
                    {
                        ?>
                            <!-- ======= A+ Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">CompTIA Training and Certifications</p>
                                    </div>

                                    <div class="container mb-5">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/comptia/comptia-img2.svg" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">CompTIA A+</span> 
                                                <span class="idd"> is the industry standard for establishing a career in IT.</span>
                                                <!-- what will you learn title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <span class="head_title">
                                                        What skill you will learn?
                                                    </span> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- learn 1  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            HARDWARE
                                                        </div>
                                                        Identifying, using, and connecting hardware components and devices, including the broad
                                                        knowledge about different devices that is now necessary to support the remote workforce.
                                                    </div>
                                                    <!-- learn 2  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            OPERATING SYSTEMS
                                                        </div>
                                                        Install and support Windows OS including command line & client support. System
                                                        configuration imaging and troubleshooting for Mac OS, Chrome OS, Android and Linux OS.
                                                    </div>
                                                    <!-- learn 3  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            SOFTWARE TROUBLESHOOTING
                                                        </div>
                                                        Troubleshoot PC and mobile device issues including common OS, malware and security issues.
                                                    </div>
                                                    <!-- learn 4  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            NETWORKING
                                                        </div>
                                                        Explain types of networks and connections including TCP/IP, WIFI and SOHO.
                                                    </div>
                                                    <!-- learn 5  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            TROUBLESHOOTING
                                                        </div>
                                                        Troubleshoot real-world device and network issues quickly and efficiently.
                                                    </div>
                                                    <!-- learn 6  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            SECURITY
                                                        </div>
                                                        Identify and protect against security vulnerabilities for devices and their network connections.
                                                    </div>
                                                    <!-- learn 7  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            MOBILE DEVICES
                                                        </div>
                                                        Install & configure laptops and other mobile devices and support applications to 
                                                        ensure connectivity for end- users.
                                                    </div>
                                                    <!-- learn 8  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            VIRTUALIZATION & CLOUD COMPUTING
                                                        </div>
                                                        Compare & contrast cloud computing concepts & set up client-side virtualization.
                                                    </div>
                                                    <!-- learn 9  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            OPERATIONAL PROCEDURES
                                                        </div>
                                                        Follow best practices for safety, environmental impacts, and communication and professionalism.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- companies that uses  -->
                                        <div class="row mt-5">
                                            <div class="col-md-6 mb-5">
                                                <h2 class="mb-4">Companies that uses A+</h2>
                                                <!-- image logos here  -->
                                                <img src="assets/img/certificates/comptia/extra_logo/intel.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/ricoh.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/nissan.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/bluecross.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/hp.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/dell.png" id="comptia_logo" class="mb-3">
                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="mb-4">Jobs That Uses A+</h2>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                       <span class="text-danger">✱</span> Help Desk Tech
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Desktop Support Specialist
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Field Service Technician
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Help Desk Technician
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Associate Network Engineer
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> System Support Technician
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Junior Systems Administrator
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Codes</th>
                                                <td>
                                                    CompTIA A+ 220-1001 (Core 1) |
                                                    Candidates must complete both 1001 and 1002 to earn certification. 
                                                    Exams cannot be combined across the series.
                                                </td>
                                                <td>
                                                    CompTIA A+ 220-1102 (Core 2) |
                                                    Candidates must complete both 1101 and 1102 to earn certification.
                                                    Exams cannot be combined across the series.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Lunch Date</th>
                                                <td>January 15, 2019</td>
                                                <td>April 2022</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Description</th>
                                                <td>
                                                    CompTIA A+ 220-1001 covers mobile devices, networking technology, hardware,
                                                    virtualization and cloud computing and network troubleshooting. CompTIA A+ 220-1002
                                                    covers installing and configuring operating systems, expanded security, software
                                                    troubleshooting and operational procedures.
                                                </td>
                                                <td>
                                                    CompTIA A+ 220-1101 covers mobile devices, networking technology, hardware,
                                                    virtualization and cloud computing. CompTIA A+ 220-1102 covers operating systems, 
                                                    security, software and operational procedures.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>Maximum of 90 questions per exam</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Type of Questions</th>
                                                <td>
                                                    Multiple choice questions (single and multiple response), drag and drops 
                                                    and performance-based.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Length of Test</th>
                                                <td>90 Minutes per exam</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>220-1001: 675 (on a scale of 100-900) 220-1002: 700 (on a scale of 100-900)</td>
                                                <td>220-1101: 675 (on a scale of 900) 220-1102: 700 (on a scale of 900)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>9 to 12 months hands-on experience in the lab or field</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English at launch. German, Japanese, Portuguese, Thai and Spanish</td>
                                                <td>English at launch. German, Japanese, Portuguese, Thai and Spanish</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Testing Provider</th>
                                                <td>Pearson VUE</td>
                                            </tr>
                                    </table>
                                    
                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            A+ 1000-Series: What’s in this version
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            The new CompTIA A+ Core Series includes expanded content on these growing parts of the IT
                                            support role:
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <span class="text-danger">✱</span> A general expansion of baseline security topics core to the IT support role, including physical
                                                versus logical security concepts and measures, malware and more <br>
                                            <span class="text-danger">✱</span> A dramatically different approach in defining competency in operational procedures 
                                                including basic disaster prevention and recovery and scripting basics <br>
                                            <span class="text-danger">✱</span> A greater dependency on networking and device connectivity <br>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <!-- End A+ Section -->
                        <?php
                    }
                    else
                    if($type == 'network')
                    {
                        ?>
                            <!-- ======= network+ Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">CompTIA Training and Certifications</p>
                                    </div>

                                    <div class="container mb-5">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/comptia/comptia-img3.svg" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">CompTIA Network+</span> 
                                                <span class="idd">
                                                    helps develop a career in IT infrastructure covering troubleshooting,
                                                    configuring, and managing networks.
                                                </span>
                                                <!-- what will you learn title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <span class="head_title">
                                                        What skill you will learn?
                                                    </span> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- learn 1  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            NETWORK FUNDAMENTALS
                                                        </div>
                                                        Explain basic networking concepts including network services, physical connections, topologies and architecture,
                                                        and cloud connectivity.
                                                    </div>
                                                    <!-- learn 2  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            NETWORK IMPLEMENTATION
                                                        </div>
                                                        Explain routing technologies and networking devices; deploy ethernet solutions and configure wireless technologies.
                                                    </div>
                                                    <!-- learn 3  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            NETWORK OPERATIONS
                                                        </div>
                                                        Monitor and optimize networks to ensure business continuity.
                                                    </div>
                                                    <!-- learn 4  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            NETWORK SECURITY
                                                        </div>
                                                        Explain security concepts and network attacks in order to harden networks against threats.
                                                    </div>
                                                    <!-- learn 5  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            NETWORK TROUBLESHOOTING
                                                        </div>
                                                        Troubleshoot common cable, connectivity, and software issues related to networking.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- companies that uses  -->
                                        <div class="row mt-5">
                                            <div class="col-md-6 mb-5">
                                                <h2 class="mb-4">Companies that trust CompTIA Network+ include</h2>
                                                <!-- image logos here  -->
                                                <img src="assets/img/certificates/comptia/extra_logo/apple.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/bluecross.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/canon.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/dell.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/hp.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/intel.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/ricoh.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/us-department-of-defense-bw.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/verizon_logo_bw.png" id="comptia_logo" class="mb-3">
                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="mb-4">Jobs that use Network+</h2>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                       <span class="text-danger">✱</span> Junior Network Administrator
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Datacenter Support Technician
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Network Engineer
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> System Administrator
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> NOC Technician
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Telecommunications Technician
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Cable Technician
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Codes</th>
                                                <td>
                                                    N10-008
                                                </td>
                                                <td>
                                                    N10-007
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Lunch Date</th>
                                                <td>September 15, 2021</td>
                                                <td>March 2018</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Description</th>
                                                <td>
                                                    CompTIA Network+ validates the technical skills needed to securely establish, maintain
                                                    and troubleshoot the essential networks that businesses rely on.
                                                </td>
                                                <td>
                                                    CompTIA Network+ N10-007 has been updated and reorganized to address the current 
                                                    networking technologies with expanded coverage of several domains by adding: <br>
                                                    <span class="text-danger">✱</span> Critical security concepts to helping networking professionals work with security practitioners <br>
                                                    <span class="text-danger">✱</span> Key cloud computing best practices and typical service models <br>
                                                    <span class="text-danger">✱</span> Coverage of newer hardware and virtualization techniques <br>
                                                    <span class="text-danger">✱</span> Concepts to give individuals the combination of skills to keep the network resilient <br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>Maximum of 90 questions per exam</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Type of Questions</th>
                                                <td>
                                                    Multiple choice and performance-based
                                                </td>
                                                <td>
                                                    Multiple Choice Questions (single and multiple response), drag and drops 
                                                    and performance-based.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Length of Test</th>
                                                <td>90 Minutes per exam</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>720 (on a scale of 100-900)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>CompTIA A+ Certification and at least 9 to 12 months of networking experience</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English, German, and Spanish, with Japanese scheduled and others TBD</td>
                                                <td>English, German, Japanese, Spanish, Portuguese</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Testing Provider</th>
                                                <td>Pearson VUE</td>
                                            </tr>
                                    </table>
                                    
                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            CompTIA Network+ N10-008: What’s in this version
                                        </span>
                                        <br><br>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <span class="text-danger">✱</span> A general expansion of baseline security topics core to the IT 
                                            support role, including physical <br>
                                            <span class="text-danger">✱</span> Network architecture appears on the exam for the first time, 
                                            including more emphasis on software-defined networking, ensuring that candidates understand 
                                            network integrations and the cutting-edge technologies being used in deployments. <br>
                                            <span class="text-danger">✱</span> Emerging wireless standards and technologies are covered 
                                            to allow businesses flexibility and maximal security when deploying networks. <br>
                                            <span class="text-danger">✱</span> Because constant access to both internal networks and 
                                            SaaS applications drives productivity, network performance monitoring and high availability 
                                            are covered as separate objectives. <br>
                                            <span class="text-danger">✱</span> Network security has been streamlined to focus on the 
                                            critical aspects of hardening networks against malicious attacks and the secure execution 
                                            of network deployments to protect against unintended data breaches. <br>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <!-- End network+ Section -->
                        <?php
                    }
                    else
                    if($type == 'security')
                    {
                        ?>
                            <!-- ======= security+ Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">CompTIA Training and Certifications</p>
                                    </div>

                                    <div class="container mb-5">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/comptia/comptia-img4.svg" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">CompTIA Security+</span> 
                                                <span class="idd">
                                                    is a global certification that validates the baseline skills necessary to perform 
                                                    core security functions and pursue an IT security career.
                                                </span>
                                                <!-- what will you learn title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <span class="head_title">
                                                        What skill you will learn?
                                                    </span> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- learn 1  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            ATTACKS, threats AND VULNERABILITIES
                                                        </div>
                                                        Focusing on more threats, attacks, and vulnerabilities on the Internet from newer 
                                                        custom devices that must be mitigated, such as IoT and embedded devices, newer DDoS 
                                                        attacks, and social engineering attacks based on current events.
                                                    </div>
                                                    <!-- learn 2  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            ARCHITECTURE AND DESIGN
                                                        </div>
                                                        Includes coverage of enterprise environments and reliance on the cloud, which is growing
                                                        quickly as organizations transition to hybrid networks.
                                                    </div>
                                                    <!-- learn 3  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            IMPLEMENTATION
                                                        </div>
                                                        Expanded to focus on administering identity, access management, PKI, basic cryptography, 
                                                        wireless, and end-to-end security.
                                                    </div>
                                                    <!-- learn 4  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            OPERATIONS AND INCEDENT RESPONSE
                                                        </div>
                                                        Covering organizational security assessment and incident response procedures, 
                                                        such as basic threat detection, risk mitigation techniques, security controls, 
                                                        and basic digital forensics.
                                                    </div>
                                                    <!-- learn 5  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            GOVERNANCE RISK AND ACOMPLIANCE
                                                        </div>
                                                        Expanded to support organizational risk management and compliance to regulations, 
                                                        such as PCI-DSS, SOX, HIPAA, GDPR, FISMA, NIST, and CCPA.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- companies that uses  -->
                                        <div class="row mt-5" data-aos="fade-up">
                                            <div class="col-md-6 mb-5">
                                                <h2 class="mb-4">Organizations that have contributed to the development of Security+</h2>
                                                <!-- image logos here  -->
                                                <img src="assets/img/certificates/comptia/extra_logo/target-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/general-dynamics-information-technology--bw.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/netflix.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/splunk-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/navy-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/john-hopkins-logo.png" id="comptia_logo" class="mb-3">
                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="mb-4">Jobs that use CompTIA Security+</h2>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                       <span class="text-danger">✱</span> Security Administrator
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Systems Administrator
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Helpdesk Manager / Analyst
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Network / Cloud Engineer
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Security Engineer / Analyst
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> DevOps / Software Developer
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> IT Auditors
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> IT Project Manager
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Codes</th>
                                                <td>
                                                    SY0-601
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Lunch Date</th>
                                                <td>November 12, 2020</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Details</th>
                                                <td>
                                                    The CompTIA Security+ certification exam will verify the successful candidate has the 
                                                    knowledge and skills required to assess the security posture of an enterprise environment 
                                                    and recommend and implement appropriate security solutions; monitor and secure hybrid 
                                                    environments, including cloud, mobile, and IoT; operate with an awareness of applicable 
                                                    laws and policies, including principles of governance, risk, and compliance; identify, 
                                                    analyze, and respond to security events and incidents
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>Maximum of 90 questions</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Type of Questions</th>
                                                <td>
                                                    Multiple choice and performance-based
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Length of Test</th>
                                                <td>90 Minutes</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>720 (on a scale of 100-900)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>CompTIA Network+ and two years of experience in IT administration with a security focus</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English, Japanese, Vietnamese, Thai, Portuguese</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Testing Provider</th>
                                                <td>Pearson VUE</td>
                                            </tr>
                                    </table>
                                    
                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            CompTIA Security+ SY0-601: What’s in this version
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            Cybersecurity attacks continue to grow. Increasingly, more job roles are tasked with baseline
                                            security readiness and response to address today’s threats. Updates to Security+ reflect skills relevant
                                            to these job roles and prepare candidates to be more proactive in preventing the next attack. To combat
                                            these emerging threats, IT Pros must be able to:
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <span class="text-danger">✱</span> Install software <br>
                                            <span class="text-danger">✱</span> Help identify attacks and vulnerabilities to mitigate them before they infiltrate IS <br>
                                            <span class="text-danger">✱</span> Understand secure virtualization, secure application deployment, and automation concepts <br>
                                            <span class="text-danger">✱</span> Identify and implement the best protocols and encryption <br>
                                            <span class="text-danger">✱</span> Understand the importance of compliance <br>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <!-- End security+ Section -->
                        <?php
                    }
                    else
                    if($type == 'cloud')
                    {
                        ?>
                            <!-- ======= cloud+ Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">CompTIA Training and Certifications</p>
                                    </div>

                                    <div class="container mb-5">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/comptia/comptia-img5.svg" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">CompTIA Cloud+</span> 
                                                <span class="idd">
                                                    shows you have the expertise needed for data center jobs.
                                                </span>
                                                <!-- what will you learn title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <span class="head_title">
                                                        What skill you will learn?
                                                    </span> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- learn 1  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            CLOUD ARCHITECTURE AND DESIGN
                                                        </div>
                                                        Analyze the different cloud models to design the best solution to support business requirements.
                                                    </div>
                                                    <!-- learn 2  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            CLOUD SECURITY
                                                        </div>
                                                        Manage and maintain servers, including OS configurations, access control and virtualization.
                                                    </div>
                                                    <!-- learn 3  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            CLOUD DEVELOPMENT
                                                        </div>
                                                        Analyze system requirements to successfully execute workload migrations to the cloud.
                                                    </div>
                                                    <!-- learn 4  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            OPERATIONS AND SUPPORT
                                                        </div>
                                                        Maintain and optimize cloud environments, including proper automation and orchestration 
                                                        procedures, backup and restore operations, and disaster recovery tasks.
                                                    </div>
                                                    <!-- learn 5  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            TROUBLESHOOTING
                                                        </div>
                                                        Troubleshoot capacity, automation, connectivity and security issues related to cloud implementations.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- companies that uses  -->
                                        <div class="row mt-5" data-aos="fade-up">
                                            <div class="col-md-6 mb-5">
                                                <h2 class="mb-4">Companies That Trust Cloud+</h2>
                                                <!-- image logos here  -->
                                                <img src="assets/img/certificates/comptia/extra_logo/oracle-bw.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/macaulay-brown-inc-bw.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/bae-systems-bw.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/ntt-communications-corp-bw.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/general-dynamics-information-technology--bw.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/us-department-of-defense-bw.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/morphotrust-usa-bw.png" id="comptia_logo" class="mb-3">
                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="mb-4">Jobs That Use Cloud+</h2>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                       <span class="text-danger">✱</span> Sr. Systems Administrator
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Cloud Engineer
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Systems Engineer
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Sr. Network Administrator
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Sr. Network Engineer
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Cloud Specialist
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Cloud Project Manager
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Codes</th>
                                                <td>
                                                    CV0-003
                                                </td>
                                                <td>
                                                    CV0-002
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Lunch Date</th>
                                                <td>June 9, 2021</td>
                                                <td>February 9, 2018</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Details</th>
                                                <td>
                                                    CompTIA Cloud+ is validates the skills needed to deploy and automate secure cloud 
                                                    environments that support the high availability of business systems and data.
                                                </td>
                                                <td>
                                                    CompTIA Cloud+ (CV0-002) reflects an emphasis on incorporating and managing cloud technologies 
                                                    as part of broader systems operations. It assumes a candidate will weave together solutions 
                                                    that meet specific business needs and work in a variety of different industries.It includes 
                                                    new technologies to support the changing cloud market as more organizations depend on 
                                                    cloud-based technologies to run mission critical systems, now that hybrid and multi-cloud 
                                                    have become the norm.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>90 questions</td>
                                                <td>Maximum of 90 questions</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Type of Questions</th>
                                                <td>Multiple choice and performance-based</td>
                                                <td>Performance-based and multiple-choice questions</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Length of Test</th>
                                                <td>90 Minutes</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>750 (on a scale of 100-900)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>CompTIA Network+ and Server+ and 2-3 years of experience in
                                                    systems administration or networking
                                                </td>
                                                <td>2-3 years in system administration</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English</td>
                                                <td>English, Japanese</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Testing Provider</th>
                                                <td>Pearson VUE</td>
                                            </tr>
                                    </table>
                                    
                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            CompTIA Cloud+ CV0-003: What’s in this version?
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            The new CompTIA Cloud+ covers in greater depth the skills and abilities needed to operate 
                                            in the cloud, validating that candidates have the technical experience needed to deploy, 
                                            secure, and automate environments regardless of the vendor solution.
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <span class="text-danger">✱</span> Install software <br>
                                            <span class="text-danger">✱</span> New updates to the CompTIA Cloud+ exam domains: <br>
                                            <span class="text-danger">✱</span> High availability is now its own objective and is highlighted
                                            as an important factor for disaster recovery and security measures. <br>
                                            <span class="text-danger">✱</span> Automation & virtualization content including approaches 
                                            such as continuous integration and continuous deployment ensure candidates have the 
                                            skills to optimize the cloud to meet business needs. <br>
                                            <span class="text-danger">✱</span> Cloud architecture has been added as a domain, highlighting 
                                            the importance of understanding the foundational technologies and concepts that comprise the cloud.<br>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <!-- End cloud+ Section -->
                        <?php
                    }
                    else
                    if($type == 'linux')
                    {
                        ?>
                            <!-- ======= linux+ Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">CompTIA Training and Certifications</p>
                                    </div>

                                    <div class="container mb-5">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/comptia/comptia-img6.svg" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">CompTIA Linux+</span> 
                                                <span class="idd">
                                                    validates the competencies required of an early career system administrator supporting 
                                                    Linux systems.
                                                </span>
                                                <!-- what will you learn title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <span class="head_title">
                                                        What skill you will learn?
                                                    </span> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- learn 1  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            SYSTEM MANAGEMENT
                                                        </div>
                                                        Configure and manage software, storage and process and services.
                                                    </div>
                                                    <!-- learn 2  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            SECURITY
                                                        </div>
                                                        Understand best practices for permissions and authentication, firewalls, and file
                                                        management.
                                                    </div>
                                                    <!-- learn 3  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            SCRIPTING, CONTAINERS AND AUTOMATION
                                                        </div>
                                                        Create simple shell scripts and execute basic BASH scripts, version control using Git,
                                                        and orchestration processes.
                                                    </div>
                                                    <!-- learn 4  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            TROUBLESHOOTING
                                                        </div>
                                                        Analyze system properties and processes and troubleshoot user, application and hardware issues.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- companies that uses  -->
                                        <div class="row mt-5" data-aos="fade-up">
                                            <div class="col-md-6 mb-5">
                                                <h2 class="mb-4">Companies that trust CompTIA Linux+</h2>
                                                <!-- image logos here  -->
                                                <img src="assets/img/certificates/comptia/extra_logo/us-department-of-defense-bw.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/navy-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/general-dynamics-information-technology--bw.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/aetena-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/boozeallen-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/dell.png" id="comptia_logo" class="mb-3">
                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="mb-4">Jobs that use CompTIA Linux+</h2>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                       <span class="text-danger">✱</span> Linux Administrator
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Junior Cloud Engineer
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Junior DevOps Support Engineer
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Technical Support Specialist
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Systems Administrator
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Network Administrator
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Web Administrator/ Developer
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Cybersecurity Engineer
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Linux Engineer
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Codes</th>
                                                <td>
                                                    XK0-004
                                                </td>
                                                <td>
                                                    XK0-005
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Lunch Date</th>
                                                <td>April 2, 2019</td>
                                                <td>July 12, 2022</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Description</th>
                                                <td>
                                                    CompTIA Linux+ validates the skills of IT professionals with hands-on experience configuring, 
                                                    monitoring, and supporting servers running the Linux operating system. 
                                                    The new exam has an increased focus on the following topics: security, kernel modules, 
                                                    storage & virtualization, device management at an enterprise level, git & automation, 
                                                    networking & firewalls, server side & command line, server (vs. client-based) coverage, 
                                                    troubleshooting and SELinux.
                                                </td>
                                                <td>
                                                    The new version of CompTIA Linux+ covers an evolving job role that focuses more on how Linux 
                                                    powers the cloud. The exam includes cutting edge technologies that help automate and 
                                                    orchestrate business processes, including infrastructure as code and containers.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>Maximum of 90 questions</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Type of Questions</th>
                                                <td>Multiple choice and performance-based</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Length of Test</th>
                                                <td>90 Minutes</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>720 (on a scale of 100 to 900)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>
                                                    CompTIA A+, CompTIA Network+ and 12 months of Linux admin experience
                                                </td>
                                                <td>
                                                    Recommended experience is 12 months of hands-on experience working with Linux servers in a
                                                    junior Linux support engineer or junior cloud/DevOps support engineer job role. CompTIA A+, 
                                                    Network+, and Server+ or similar certifications and/or knowledge are also recommended.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English, Japanese, Portuguese and Spanish</td>
                                                <td>English only</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Testing Provider</th>
                                                <td>Pearson VUE</td>
                                            </tr>
                                    </table>
                                    
                                </div>
                            </section>
                            <!-- End linux+ Section -->
                        <?php
                    }
                    else
                    if($type == 'server')
                    {
                        ?>
                            <!-- ======= server+ Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">CompTIA Training and Certifications</p>
                                    </div>

                                    <div class="container mb-5">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/comptia/comptia-img7.svg" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">CompTIA Server+</span> 
                                                <span class="idd">
                                                    ensures pros have the skills to work in data centers or cloud environments.
                                                </span>
                                                <!-- what will you learn title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <span class="head_title">
                                                        What skill you will learn?
                                                    </span> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- learn 1  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            SERVER HARDWARE INSTALLATION AND MANAGEMENT
                                                        </div>
                                                        Install and maintain physical hardware and storage.
                                                    </div>
                                                    <!-- learn 2  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            SERVER ADMINISTRATION
                                                        </div>
                                                        Manage and maintain servers, including OS configuration, access control and virtualization.
                                                    </div>
                                                    <!-- learn 3  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            SECURITY AND DISASTER RECOVERY
                                                        </div>
                                                        Apply physical and network data security techniques and Understand disaster recovery and implement
                                                        backup techniques.
                                                    </div>
                                                    <!-- learn 4  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            TROUBLESHOOTING
                                                        </div>
                                                        Diagnose and resolve system hardware, software, connectivity, storage and security issues.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- companies that uses  -->
                                        <div class="row mt-5" data-aos="fade-up">
                                            <div class="col-md-6 mb-5">
                                                <h2 class="mb-4">Companies that trust CompTIA Server+</h2>
                                                <!-- image logos here  -->
                                                <img src="assets/img/certificates/comptia/extra_logo/intel.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/lenovo-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/microsoft-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/xerox-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/hp.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/dell.png" id="comptia_logo" class="mb-3">
                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="mb-4">Jobs that use CompTIA Server+</h2>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                       <span class="text-danger">✱</span> Systems Administrator
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Data Center Technician
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Server Administrator
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Network Administrator
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Field Service Technician or Engineer
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> IT Technician
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Data Center Engineer
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Codes</th>
                                                <td>
                                                    SK0-004
                                                </td>
                                                <td>
                                                    SK0-005
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Lunch Date</th>
                                                <td>July 31, 2015</td>
                                                <td>May 18, 2021</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Description</th>
                                                <td>
                                                    Server+ covers server architecture, administration, storage, security, networking, 
                                                    troubleshooting as well as disaster recovery.
                                                </td>
                                                <td>
                                                    Server+ validates the hands-on skills of IT professionals who install, manage and 
                                                    troubleshoot servers in data centers as well as on-premise and hybrid environments.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>Maximum of 100 questions</td>
                                                <td>90 questions</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Type of Questions</th>
                                                <td>Multiple choice</td>
                                                <td>Multiple choice and performance-based</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Length of Test</th>
                                                <td>90 Minutes</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>750 (on a scale of 100-900)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>
                                                    A+ CertificationIndividuals with 18 to 24 months of IT experience
                                                </td>
                                                <td>
                                                    CompTIA A+ certified or equivalent knowledge Two years of hands-on experience working in 
                                                    a server environment
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English, Simplified Chinese, Japanese</td>
                                                <td>English (at launch), Japanese (at later date)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Testing Provider</th>
                                                <td>Pearson VUE</td>
                                            </tr>
                                    </table>

                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            Why is CompTIA Server+ different?
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            <!-- no title  -->
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <span class="text-danger">✱</span> 12% job growth is expected for Network & Computer Systems 
                                            Administrators, 2012 – 2022, according to the latest BLS website information. <br>
                                            <span class="text-danger">✱</span> Average salary for a Server+ certified IT professionals is about 
                                            $82,000. <br>
                                            <span class="text-danger">✱</span> 82% of employers recognize that certified employees are valuable 
                                            to their organizations. <br>
                                        </div>
                                    </div>
                                    
                                </div>
                            </section>
                            <!-- End server+ Section -->
                        <?php
                    }
                    else
                    if($type == 'cysa')
                    {
                        ?>
                            <!-- ======= cysa+ Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">CompTIA Training and Certifications</p>
                                    </div>

                                    <div class="container mb-5">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/comptia/comptia-img8.svg" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">CompTIA Cybersecurity Analyst (CySA+)</span> 
                                                <span class="idd">
                                                    is an IT workforce certification that applies behavioral analytics to networks and devices
                                                    to prevent, detect and combat cybersecurity threats through continuous security monitoring.
                                                </span>
                                                <!-- what will you learn title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <span class="head_title">
                                                        What skill you will learn?
                                                    </span> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- learn 1  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            THREAT AND VULNERABILITY MANAGEMENT
                                                        </div>
                                                        Utilize and apply proactive threat intelligence to support organizational security and 
                                                        perform vulnerability management activities.
                                                    </div>
                                                    <!-- learn 2  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            SOFTWARE AND SYSTEMS SECURITY
                                                        </div>
                                                        Apply security solutions for infrastructure management and explain software & 
                                                        hardware assurance best practices.
                                                    </div>
                                                    <!-- learn 3  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            COMPLIANCE AND ASSESSMENT
                                                        </div>
                                                        Apply security concepts in support of organizational risk mitigation and understand the 
                                                        importance of frameworks, policies, procedures, and controls.
                                                    </div>
                                                    <!-- learn 4  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            SECURITY OPERATIONS AND MONITORING
                                                        </div>
                                                        Analyze data as part of continuous security monitoring activities and implement 
                                                        configuration changes to existing controls to improve security.
                                                    </div>
                                                    <!-- learn 5  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            INDECENT RESPONSE
                                                        </div>
                                                        Apply the appropriate incident response procedure, analyze potential indicators of 
                                                        compromise, and utilize basic digital forensics techniques.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- companies that uses  -->
                                        <div class="row mt-5" data-aos="fade-up">
                                            <div class="col-md-6 mb-5">
                                                <h2 class="mb-4">Organizations that have contributed to the development of CySA+</h2>
                                                <!-- image logos here  -->
                                                <img src="assets/img/certificates/comptia/extra_logo/northrop-grumman-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/ricoh.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/240px-seal_of_the_united_states_department_of_state-svg.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/target-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/va-affairs-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/dell.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/netflix.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/johnhopskinapl.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/splunk-logo.png" id="comptia_logo" class="mb-3">

                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="mb-4">Jobs that use CompTIA CySA+</h2>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                       <span class="text-danger">✱</span> Security analyst <br>
                                                                                            - Tier II SOC analyst <br>
                                                                                            - Security monitoring <br>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Threat intelligence analyst
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Security engineer
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Application security analyst
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Incident response or handler
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Compliance analyst
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Threat hunter
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Codes</th>
                                                <td>
                                                    CS0-002
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Lunch Date</th>
                                                <td>April 21, 2020</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Description</th>
                                                <td>
                                                    The CompTIA Cybersecurity Analyst (CySA+) certification verifies that successful 
                                                    candidates have the knowledge and skills required to leverage intelligence and threat 
                                                    detection techniques, analyze and interpret data, identify and address vulnerabilities, 
                                                    suggest preventative measures, and effectively respond to and recover from incidents.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>Maximum of 85 questions</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Type of Questions</th>
                                                <td>Multiple choice and performance-based</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Length of Test</th>
                                                <td>165 minutes</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>750 (on a scale of 100-900)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>
                                                    Network+, Security+ or equivalent knowledge. Minimum of 4 years of hands-on information 
                                                    security or related experience.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English, Japanese, TBD - others</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Testing Provider</th>
                                                <td>Pearson VUE</td>
                                            </tr>
                                    </table>

                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            CompTIA CySA+ CS0-002: What’s in this version
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            The new exam has been updated to address industry changes, as well as the need for security 
                                            analysts to focus on software security and be more proactive with their defense and threat 
                                            intelligence. Security Analysts must also ensure their tasks comply to IT regulatory standards 
                                            that affect their daily work. With the end goal of proactively defending and continuously improving 
                                            the security of an organization, CySA+ will verify the successful candidate has the knowledge 
                                            and skills required to:
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <span class="text-danger">✱</span> Leverage intelligence and threat detection techniques <br>
                                            <span class="text-danger">✱</span> Analyze and interpret data <br>
                                            <span class="text-danger">✱</span> Identify and address vulnerabilities <br>
                                            <span class="text-danger">✱</span> Suggest preventative measures <br>
                                            <span class="text-danger">✱</span> Effectively respond to and recover from incidents <br>
                                        </div>
                                    </div>
                                    
                                </div>
                            </section>
                            <!-- End cysa+ Section -->
                        <?php
                    }
                    else
                    if($type == 'casp')
                    {
                        ?>
                            <!-- ======= casp+ Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">CompTIA Training and Certifications</p>
                                    </div>

                                    <div class="container mb-5">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/comptia/comptia-img9.svg" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">CompTIA Advanced Security Practitioner (CASP+)</span> 
                                                <span class="idd">
                                                    is an advanced-level cybersecurity certification for security architects and senior security 
                                                    engineers charged with leading and improving an enterprise’s cybersecurity readiness.
                                                </span>
                                                <!-- what will you learn title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <span class="head_title">
                                                        What skill you will learn?
                                                    </span> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- learn 1  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            SECURITY ARCHITECTURE
                                                        </div>
                                                        Expanded coverage to analyze security requirements in hybrid networks to work toward an 
                                                        enterprise-wide, zero trust security architecture with advanced secure cloud and virtualization 
                                                        solutions.
                                                    </div>
                                                    <!-- learn 2  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            SECURITY OPERATIONS
                                                        </div>
                                                        Expanded emphasis on newer techniques addressing advanced threat management, vulnerability 
                                                        management, risk mitigation, incident response tactics, and digital forensics analysis.
                                                    </div>
                                                    <!-- learn 3  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            GOVERNANCE, RISK, AND COMPLIANCE
                                                        </div>
                                                        Expanded to support advanced techniques to prove an organization’s overall cybersecurity 
                                                        resiliency metric and compliance to regulations, such as CMMC, PCI-DSS, SOX, HIPAA, GDPR, 
                                                        FISMA, NIST, and CCPA.
                                                    </div>
                                                    <!-- learn 4  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            SECURITY ENGINEERING AND CRYPTOGRAPHY
                                                        </div>
                                                        Expanded to focus on advanced cybersecurity configurations for endpoint security controls, 
                                                        enterprise mobility, cloud/hybrid environments, and enterprise-wide PKI and cryptographic 
                                                        solutions.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- companies that uses  -->
                                        <div class="row mt-5" data-aos="fade-up">
                                            <div class="col-md-6 mb-5">
                                                <h2 class="mb-4">Organizations That Use CASP+</h2>
                                                <!-- image logos here  -->
                                                <img src="assets/img/certificates/comptia/extra_logo/target-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/general-dynamics-information-technology--bw.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/ricoh.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/splunk-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/johnhopskinapl.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/exxon-mobile-logo.png" id="comptia_logo" class="mb-3">
                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="mb-4">Jobs That Use CASP+</h2>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Security Architect
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Senior Security Engineer
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> SOC Manager
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Security Analyst
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Codes</th>
                                                <td>
                                                    CAS-003
                                                </td>
                                                <td>    
                                                    CAS-004
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Lunch Date</th>
                                                <td>April 2, 2018</td>
                                                <td>October 6, 2021</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Description</th>
                                                <td>
                                                    CASP+ covers the technical knowledge and skills required to conceptualize, engineer, 
                                                    integrate and implement secure solutions across complex environments to support a resilient 
                                                    enterprise.
                                                </td>
                                                <td>
                                                    CASP+ covers the technical knowledge and skills required to architect, engineer, integrate, and implement secure 
                                                    solutions across complex environments to support a resilient enterprise while considering the impact of governance, 
                                                    risk, and compliance requirements.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>Maximum of 90 questions</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Type of Questions</th>
                                                <td>Multiple choice and performance-based</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Length of Test</th>
                                                <td>165 minutes</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>This test has no scaled score; it’s pass/fail only</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>
                                                    A minimum of ten years of experience in IT administration, including at least five years of 
                                                    hands-on technical security experience.
                                                </td>
                                                <td>
                                                    A minimum of ten years of general hands-on IT experience, with at least five years of broad hands-on security 
                                                    experience.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English and Japanese</td>
                                                <td>English, Japanese to follow</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Testing Provider</th>
                                                <td>Pearson VUE</td>
                                            </tr>
                                    </table>

                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            CASP+ CAS-004: What’s in this version
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            Information security threats are on the rise globally. Organizations are increasingly concerned 
                                            over the lack of adequately trained senior IT security staff’s ability to effectively lead and 
                                            manage the overall cybersecurity resiliency against the next attack. Updates to CASP+ qualify 
                                            advanced skills required of security architects and senior security engineers to effectively design, 
                                            implement, and manage cybersecurity solutions on complex enterprise networks.
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <!-- no bullets  -->
                                            <!-- <span class="text-danger">✱</span> -->
                                        </div>
                                    </div>
                                    
                                </div>
                            </section>
                            <!-- End casp+ Section -->
                        <?php
                    }
                    else
                    if($type == 'pentest')
                    {
                        ?>
                            <!-- ======= pentest+ Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">CompTIA Training and Certifications</p>
                                    </div>

                                    <div class="container mb-5">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/comptia/comptia-img10.svg" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">CompTIA PenTest+</span> 
                                                <span class="idd">
                                                    is for cybersecurity professionals tasked with penetration testing and 
                                                    vulnerability management.
                                                </span>
                                                <!-- what will you learn title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <span class="head_title">
                                                        What skill you will learn?
                                                    </span> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- learn 1  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            PLANNING AND SCOPING
                                                        </div>
                                                        Includes updated techniques emphasizing governance, risk, and compliance concepts, 
                                                        scoping and organizational/customer requirements, and demonstrating an ethical hacking 
                                                        mindset.
                                                    </div>
                                                    <!-- learn 2  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            INFORMATION GATHERING AND VULNERABILITY SCANNING
                                                        </div>
                                                        Includes updated skills on performing vulnerability scanning and passive/active 
                                                        reconnaissance, vulnerability management, as well as analyzing the results of the 
                                                        reconnaissance exercise.
                                                    </div>
                                                    <!-- learn 3  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            ATTACKS AND EXPLOITS
                                                        </div>
                                                        Includes updated approaches to expanded attack surfaces, researching social engineering 
                                                        techniques, performing network attacks, wireless attacks, application-based attacks and 
                                                        attacks on cloud technologies, and performing post-exploitation techniques.
                                                    </div>
                                                    <!-- learn 4  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            REPORTING AND COMMUNICATION
                                                        </div>
                                                        Expanded to focus on the importance of reporting and communication in an increased 
                                                        regulatory environment during the pen testing process through analyzing findings and 
                                                        recommending appropriate remediation within a report.
                                                    </div>
                                                    <!-- learn 5  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            TOOLS AND CODE ANALYSIS
                                                        </div>
                                                        Includes updated concepts of identifying scripts in various software deployments, analyzing a script
                                                        or code sample, and explaining use cases of various tools used during the phases of a penetration test.
                                                        It is important to note that no scripting and coding is required.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- companies that uses  -->
                                        <div class="row mt-5" data-aos="fade-up">
                                            <div class="col-md-6 mb-5">
                                                <h2 class="mb-4">Organizations that have contributed to the development of PenTest+</h2>
                                                <!-- image logos here  -->
                                                <img src="assets/img/certificates/comptia/extra_logo/target-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/general-dynamics-information-technology--bw.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/ricoh.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/secureworks-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/aesolutions-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/asics-logo.png" id="comptia_logo" class="mb-3">
                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="mb-4">Jobs that use CompTIA PenTest+</h2>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Penetration Tester
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Security Consultant
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Cloud Penetration Tester
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Web App Penetration Tester
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Cloud Security Specialist
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Network & Security Specialist
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Codes</th>
                                                <td>
                                                    PT0-001
                                                </td>
                                                <td>    
                                                    PT0-002
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Lunch Date</th>
                                                <td>July 31, 2018</td>
                                                <td>October 28, 2021</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Description</th>
                                                <td>
                                                    The CompTIA PenTest+ certification verifies that successful candidates have the knowledge and skills 
                                                    required to plan and scope an assessment, understand legal and compliance requirements, perform 
                                                    vulnerability scanning and penetration testing, analyze data, and effectively report and communicate 
                                                    results.
                                                </td>
                                                <td>
                                                    The CompTIA PenTest+ will certify the successful candidate has the knowledge and skills 
                                                    required to plan and scope a penetration testing engagement including vulnerability scanning, 
                                                    understand legal and compliance requirements, analyze results, and produce a written report 
                                                    with remediation techniques.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>Maximum of 85 questions</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Type of Questions</th>
                                                <td>Performance-based and multiple choice</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Length of Test</th>
                                                <td>165 minutes</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>750 (on a scale of 100-900)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>
                                                    Network+, Security+ or equivalent knowledge. Minimum of 3-4 years of hands-on information 
                                                    security or related experience. While there is no required prerequisite, PenTest+ is intended 
                                                        to follow CompTIA Security+ or equivalent experience and has a technical, hands-on focus.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English and Japanese</td>
                                                <td>English, Japanese to follow</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Testing Provider</th>
                                                <td>Pearson VUE</td>
                                            </tr>
                                    </table>

                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            PenTest+ PT0-002: What’s in this version
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            Global cybercrime costs are expected to grow 15% over the next five years. Now more than ever, it is 
                                            imperative that organizations prevent sensitive data from falling into the wrong hands. Updates to 
                                            PenTest+ reflect newer pen testing techniques for the latest attack surfaces, including the cloud, 
                                            hybrid environments, and web applications, as well as more ethical hacking concepts, vulnerability 
                                            scanning and code analysis.
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <!-- no bullets  -->
                                            <!-- <span class="text-danger">✱</span> -->
                                        </div>
                                    </div>
                                    
                                </div>
                            </section>
                            <!-- End pentest+ Section -->
                        <?php
                    }
                    else
                    if($type == 'data')
                    {
                        ?>
                            <!-- ======= data+ Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">CompTIA Training and Certifications</p>
                                    </div>

                                    <div class="container mb-5">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/comptia/comptia-img11.svg" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">CompTIA Data+</span> 
                                                <span class="idd">
                                                    is an early-career data analytics certification for professionals tasked with developing 
                                                    and promoting data-driven business decision-making.
                                                </span>
                                                <!-- what will you learn title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <span class="head_title">
                                                        What skill you will learn?
                                                    </span> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- learn 1  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            DATA CONCEPTS AND ENVIRONMENTS
                                                        </div>
                                                        Boost your knowledge in identifying basic concepts of data schemas and dimensions while 
                                                        understanding the difference between common data structures and file formats.
                                                    </div>
                                                    <!-- learn 2  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            DATA MINING
                                                        </div>
                                                        Grow your skills to explain data acquisition concepts, reasons for cleansing and profiling 
                                                        datasets, executing data manipulation, and understanding techniques for data manipulation.
                                                    </div>
                                                    <!-- learn 3  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            DATA ANALYTICS
                                                        </div>
                                                        Gain the ability to apply the appropriate descriptive statistical methods and summarize 
                                                        types of analysis and critical analysis techniques.
                                                    </div>
                                                    <!-- learn 4  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            VISUALIZATION
                                                        </div>
                                                        Learn how to translate business requirements to form the appropriate visualization in the 
                                                        form of a report or dashboard with the proper design components.
                                                    </div>
                                                    <!-- learn 5  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            DATA GOVERNANCE, QUALITY & CONTROL
                                                        </div>
                                                        Increase your ability to summarize important data governance concepts and apply data 
                                                        quality control concepts.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- companies that uses  -->
                                        <div class="row mt-5" data-aos="fade-up">
                                            <div class="col-md-6 mb-5">
                                                <h2 class="mb-4">Organizations that recommend or teach Data+</h2>
                                                <!-- image logos here  -->
                                                <img src="assets/img/certificates/comptia/extra_logo/discover-financial-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/paypal-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/cars-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/rogers-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/cdw-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/molina-logo.png" id="comptia_logo" class="mb-3">
                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="mb-4">Jobs that use CompTIA Data+</h2>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Data Analyst
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Clinical Analyst
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Reporting Analyst
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Marketing Analyst
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Business Data Analyst
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Operations Analyst
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Business Intelligence Analyst
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Codes</th>
                                                <td>
                                                    DA0-001
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Lunch Date</th>
                                                <td>February 28, 2022</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Description</th>
                                                <td>
                                                    The CompTIA Data+ exam will certify the successful candidate has the knowledge and skills 
                                                    required to transform business requirements in support of data-driven decisions through mining 
                                                    and manipulating data, applying basic statistical methods, and analyzing complex datasets 
                                                    while adhering to governance and quality standards throughout the entire data life cycle.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>90 questions</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Type of Questions</th>
                                                <td>Multiple choice and performance-based</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Length of Test</th>
                                                <td>90 Minutes</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>675 (on scale of 100–900)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>
                                                    NeCompTIA recommends 18–24 months of experience in a report/business analyst job role, 
                                                    exposure to databases and analytical tools, a basic understanding of statistics, and data 
                                                    visualization experience.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Testing Provider</th>
                                                <td>Pearson VUE</td>
                                            </tr>
                                    </table>

                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            Get the analytics skills you need!
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            Know what skills are essential. Show them what you know, and what you can power with data.
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <span class="text-danger">✱</span> Transform business requirements in support of data-driven 
                                            decisions <br>
                                            <span class="text-danger">✱</span> Data analysts using SAS® Visual Analytics to analyze data 
                                            and design reports <br>
                                            <span class="text-danger">✱</span> Analysts using Tableau to make business decisions by 
                                            identifying data to explore and deliver actionable insights. <br>
                                            <span class="text-danger">✱</span> Designing and building data models and enabling analytic 
                                            capabilities with Microsoft Power BI <br>
                                        </div>
                                    </div>
                                    
                                </div>
                            </section>
                            <!-- End data+ Section -->
                        <?php
                    }
                    else
                    if($type == 'project')
                    {
                        ?>
                            <!-- ======= project+ Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">CompTIA Training and Certifications</p>
                                    </div>

                                    <div class="container mb-5">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/comptia/comptia-img12.svg" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">CompTIA Project+</span> 
                                                <span class="idd">
                                                    gives IT Pros the basic concepts to successfully manage small to medium sized projects.
                                                </span>
                                                <!-- what will you learn title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <span class="head_title">
                                                        What skill you will learn?
                                                    </span> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- learn 1  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            PROJECT BASIS
                                                        </div>
                                                        Summarize the properties of project, phases, schedules, roles and responsibilities, 
                                                        and cost controls, as well as identifying the basic aspects of Agile methodology.
                                                    </div>
                                                    <!-- learn 2  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            PROJECT CONSTRAINTS
                                                        </div>
                                                        Predict the impact of various constraint variables and influences throughout the project 
                                                        and explain the importance of risk strategies and activities.
                                                    </div>
                                                    <!-- learn 3  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            COMMUNICATION AND CHANGE MANAGEMENT
                                                        </div>
                                                        Understand appropriate communication methods of influence and use change control processes 
                                                        within the context of a project.
                                                    </div>
                                                    <!-- learn 4  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            PROJECT TOOLS & DOCUMENTATION
                                                        </div>
                                                        Compare and contrast various project management tools and analyze project and partner-centric 
                                                        documentation.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- companies that uses  -->
                                        <div class="row mt-5" data-aos="fade-up">
                                            <div class="col-md-6 mb-5">
                                                <h2 class="mb-4">Organizations that recommend or teach Project+</h2>
                                                <!-- image logos here  -->
                                                <img src="assets/img/certificates/comptia/extra_logo/accenture.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/canon.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/e-y-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/general-dynamics-information-technology--bw.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/hp.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/dell.png" id="comptia_logo" class="mb-3">
                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="mb-4">Jobs that use CompTIA Project+</h2>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> IT Project Coordinator/Manager
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> IT Project Team Member 
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Business Analyst
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Manager, Director, Team Leader
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Codes</th>
                                                <td>
                                                    PK0-004
                                                </td>
                                                <td>
                                                    PK0-005
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Lunch Date</th>
                                                <td>March 15 2017</td>
                                                <td>November 8, 2022</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Description</th>
                                                <td>
                                                    CompTIA Project+ is designed for business professionals who coordinate or manage 
                                                    small-to-medium-size projects, inside and outside of IT. The exam certifies the knowledge 
                                                    and skills required to manage the project life cycle, ensure appropriate, communication, 
                                                    manage resources, manage stakeholders, and maintain project documentation.
                                                </td>
                                                <td>
                                                    CompTIA Project+ is ideal for IT professionals who need to manage smaller, less complex 
                                                    projects as part of their other job duties but still have foundational project management 
                                                    skills. Project+ is versatile because it covers essential project management concepts beyond 
                                                    the scope of just one methodology or framework.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>Maximum of 95 questions</td>
                                                <td>Maximum of 95 questions</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Type of Questions</th>
                                                <td>Multiple choice and performance-based</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Length of Test</th>
                                                <td>90 Minutes</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>710 (on a scale of 100-900)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>
                                                    At least 12 months of cumulative project management experience or equivalent education.
                                                </td>
                                                <td>
                                                    Equivalent to at least 6–12 months of hands-on experience managing projects in an IT environment.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English, Japanese</td>
                                                <td>English</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Testing Provider</th>
                                                <td>Pearson VUE</td>
                                            </tr>
                                    </table>

                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            How CompTIA Project+ Stacks Up
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            Project+ covers a high-level introduction to Agile as part of one of the objectives. If an 
                                            individual would like to focus on Scrum, he/she would take Scrum Alliance’s Certified Scrum 
                                            Master certification.
                                        </div>
                                        <br>
                                        <div style="margin-left: 3%;">
                                            PMI PMP and PRINCE2 Practitioner are methodology/framework-specific certifications intended 
                                            for more advanced project management professionals overseeing larger projects. PMI CAPM and 
                                            PRINCE2 Foundation are entry points to those project management methodologies/frameworks.
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <!-- <span class="text-danger">✱</span>  -->
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </section>
                            <!-- End project+ Section -->
                        <?php
                    }
                    else
                    if($type == 'ctt')
                    {
                        ?>
                            <!-- ======= ctt+ Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">CompTIA Training and Certifications</p>
                                    </div>

                                    <div class="container mb-5">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/comptia/comptia-img13.svg" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">CompTIA Certified Technical Trainer (CTT+)</span> 
                                                <span class="idd">
                                                    certification is for instructors who want to verify they have attained a standard of 
                                                    excellence in the training field. CTT+ validates the knowledge and use of tools and 
                                                    techniques necessary for successfully teaching in today’s learning environments.
                                                </span>
                                                <!-- what will you learn title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <span class="head_title">
                                                        What skill you will learn?
                                                    </span> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- learn 1  -->
                                                    <div class="col-md-12 mb-3">
                                                        <div class="fw-bold text-dark ">
                                                            OVERVIEW
                                                        </div>
                                                        Earning the CTT+ certification designates you as an exceptional trainer in your field. 
                                                        As an instructor, you not only have to plan engaging classroom lectures, practice tasks 
                                                        and exams, but you must also be a knowledgeable and effective communicator. CTT+ 
                                                        certification provides comprehensive training standards to validate your skills in a 
                                                        traditional or virtual classroom environment, and ensures that you can teach effectively 
                                                        and step up to the front of the class with confidence.
                                                    </div>
                                                    <!-- learn 2  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            CTT+ IS TRUSTED BY LEADING ORGANIZATIONS
                                                        </div>
                                                        Corporations such as Dell, Microsoft, Adobe, Cisco, IBM and Ricoh accept CompTIA CTT+ as 
                                                        proof that an instructor is qualified to teach their programs.
                                                    </div>
                                                    <!-- learn 3  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            CTT+ VERIFIES ESSENTIAL TEACHING MODALITIES
                                                        </div>
                                                        In a survey conducted by the Training Associates, 87% of respondents use instructor 
                                                        led training (ILT) as a primary learning modality. Moreover, 74% of organizations 
                                                        take a blended approach to learning, augmenting ILT delivery with either a mobile, 
                                                        video, or social component. Earning a CTT+ certification can validate your skills as 
                                                        a top trainer in a virtual or physical classroom.
                                                    </div>
                                                    <!-- learn 4  -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            CTT+ LETS YOU TEACH WITH CONFIDENCE
                                                        </div>
                                                        CompTIA CTT+ validates that you have the necessary skills and knowledge to prepare, 
                                                        present, facilitate and evaluate a training session. By requiring a video submission 
                                                        of the training session instruction as part of the certification, CTT+ ensures candidates 
                                                        have effective teaching skills.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- companies that uses  -->
                                        <div class="row mt-5" data-aos="fade-up">
                                            <div class="col-md-6 mb-5">
                                                <h2 class="mb-4">Organizations that use CTT+</h2>
                                                <!-- image logos here  -->
                                                <img src="assets/img/certificates/comptia/extra_logo/verizon_logo_bw.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/microsoft-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/army-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/network-solutions-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/boozeallen-logo.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/dell.png" id="comptia_logo" class="mb-3">
                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="mb-4">Jobs that use CTT+</h2>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Training Consultant
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Training ​Developer/Instructor 
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Career ​Technical ​Training ​Instructor
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Academic ​Instructor
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Codes</th>
                                                <td>
                                                    CTT+ Essentials – TK0-201
                                                </td>
                                                <td>
                                                    CTT+ Classroom Performance Based Exam – TK0-202 <br>
                                                    CTT+ Virtual Classroom Performance Based Exam - TK0 -203
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Lunch Date</th>
                                                <td>March 15 2017</td>
                                                <td>November 8, 2022</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Description</th>
                                                <td>
                                                    The CTT+ certification exam tests in and out of class teaching expertise, including 
                                                    preparation, facilitation and physical or virtual classroom evaluation. To earn the 
                                                    certification, two exams must be passed. In addition to TK0-201, you’ll have to pass 
                                                    either TK0-202, or TK0-203.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>Maximum of 95 questions</td>
                                                <td>N/A</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Type of Questions</th>
                                                <td>Multiple choice questions (single and multiple response), and drag and drops</td>
                                                <td>N/A</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Length of Test</th>
                                                <td>90 Minutes</td>
                                                <td>Length of instruction recording must be between 17 minutes and 22 minutes</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>655 (on a scale of 100-900)</td>
                                                <td>36 (on a scale of 48)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>
                                                    6 to 12 months of trainer/instructor experience.
                                                </td>
                                                <td>
                                                    6 to 12 months of trainer/instructor experience.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English, Japanese</td>
                                                <td>
                                                    Recordings can be submitted in English, German, Dutch, Japanese, Spanish, Portuguese, 
                                                    Korean, Vietnamese or Thai
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Testing Provider</th>
                                                <td>Pearson VUE</td>
                                            </tr>
                                    </table>

                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            <!-- no title  -->
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            <!-- no details  -->
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <!-- <span class="text-danger">✱</span>  -->
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </section>
                            <!-- End ctt+ Section -->
                        <?php
                    }
                    else
                    if($type == 'cloud_essentials')
                    {
                        ?>
                            <!-- ======= cloud_essentials+ Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">CompTIA Training and Certifications</p>
                                    </div>

                                    <div class="container mb-5">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/comptia/comptia-img14.svg" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">CompTIA Cloud Essentials+</span> 
                                                <span class="idd">
                                                    is for both IT and non-technical professionals who require the essential business acumen 
                                                    needed to make informed cloud service decisions.
                                                </span>
                                                <!-- what will you learn title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <span class="head_title">
                                                        What skill you will learn?
                                                    </span> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- learn 1  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            CLOUD CONCEPTS
                                                        </div>
                                                        Explain cloud principles, identify cloud networking concepts and storage techniques, 
                                                        and understand cloud design aspects.
                                                    </div>
                                                    <!-- learn 2  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            BUSINESS PRINCIPLES OF CLOD ENVIRONMENTS
                                                        </div>
                                                        Identify and employ appropriate cloud assessments like feasibility studies, benchmarking, 
                                                        or gap analysis, highlight key business aspects of cloud vendor relation adoption, 
                                                        and comprehend cloud migration approaches.
                                                    </div>
                                                    <!-- learn 3  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            MANAGEMENT AND TECHNICAL OPERATIONS
                                                        </div>
                                                        Explain aspects of operating within the cloud, such as data management or optimization 
                                                        and understand the role of DevOps in cloud environments, like API integration or
                                                        provisioning.
                                                    </div>
                                                    <!-- learn 4  -->
                                                    <div class="col-md-3 mb-3">
                                                        <div class="fw-bold text-danger ">
                                                            GOVERNANCE, RISK, COMPLIANCE AND SECURITY FOR THE CLOUD
                                                        </div>
                                                        Understand risk management and response concepts related to cloud services and identify 
                                                        the importance and impacts of compliance in the cloud, such as regulatory concerns or 
                                                        international standards.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- companies that uses  -->
                                        <div class="row mt-5" data-aos="fade-up">
                                            <div class="col-md-6 mb-5">
                                                <h2 class="mb-4">Organizations that recommend Cloud Essentials+</h2>
                                                <!-- image logos here  -->
                                                <img src="assets/img/certificates/comptia/extra_logo/256px-logo_konica_minolta-svg.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/square-logo-dr1.png" id="comptia_logo" class="mb-3">
                                                <img src="assets/img/certificates/comptia/extra_logo/240px-seal_of_the_united_states_department_of_state-svg.png" id="comptia_logo" class="mb-3">
                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="mb-4">Top Cloud Essentials+ Job Roles</h2>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Sales and Marketing Staff in cloud product or service management
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Business Analysts
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Business Process Owners
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Managed Service Provider Personnel
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> New Data Center Staffs
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span class="text-danger">✱</span> Technical Support Staff
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Codes</th>
                                                <td>
                                                    CLO-002
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Lunch Date</th>
                                                <td>November 2019</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Description</th>
                                                <td>
                                                    CompTIA Cloud Essentials+ validates the candidate has the knowledge and skills required to 
                                                    make clear and conscious decisions about cloud technologies and their business impact by 
                                                    evaluating business use cases, financial impacts, cloud technologies and deployment models 
                                                    with knowledge of cloud computing.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>Maximum of 75 questions</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Type of Questions</th>
                                                <td>Multiple choice</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Length of Test</th>
                                                <td>60 Minutes</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>720 (on a scale of 100-900)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>
                                                    Between six months to a year of work experience as a business analyst in an IT 
                                                    environment with some exposure to cloud technologies.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Testing Provider</th>
                                                <td>Pearson VUE</td>
                                            </tr>
                                    </table>

                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            CompTIA Cloud Essentials+ CLO-002: What’s in this version
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            The updated exam empowers candidates to make data-driven cloud recommendations by using key 
                                            skills to evaluate business use cases, financial impacts, cloud technologies, and deployment
                                            models. Earning Cloud Essentials+ demonstrates a readiness for management-level positions 
                                            while ensuring an understanding of the fundamental approach to cloud computing, as well as 
                                            the business impact of migrating and governing in the cloud.
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <!-- <span class="text-danger">✱</span>  -->
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </section>
                            <!-- End cloud_essentials+ Section -->
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