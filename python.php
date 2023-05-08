<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pyhthon Instetute | EIRA</title>

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
                            <h1 class="text-center text-lg-center">Enrollment Python Institute Certifications</h1>
                            <div class="text-center text-lg-center">
                                <a href="https://docs.google.com/forms/d/e/1FAIpQLSe5xpHesqmvNbUu6no1OUcQtuGxBO3N6z2Go6-UrK5on-8mDQ/viewform" target="_blank" type="button" class="btn btn-warning scrollto">
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

                    if($type == 'pcep')
                    {
                        ?>
                            <!-- ======= pcep Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">Python Institute Certifications</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/python/pcep.png" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">PCEP™ – Certified Entry-Level Python Programmer</span> 
                                                <span class="idd">(Exam PCEP-30-0x)</span>
                                                <!-- title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <p>
                                                        PCEP™ – Certified Entry-Level Python Programmer certification shows that the 
                                                        individual is familiar with universal computer programming concepts like data types, 
                                                        containers, functions, conditions, loops, as well as Python programming language 
                                                        syntax, semantics, and the runtime environment.
                                                    </p> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- details 1  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold text-primary ">
                                                            PCEP™ – Certified Entry-Level
                                                        </div>
                                                         Python Programmer certification (Exam PCEP-30-0x) is a professional credential that 
                                                         measures the candidate's ability to accomplish coding tasks related to the essentials 
                                                         of programming in the Python language. A test candidate should demonstrate sufficient 
                                                         knowledge of the universal concepts of computer programming, the syntax and semantics 
                                                         of the Python language, as well as the skills in resolving typical implementation 
                                                         challenges with the help of the Python Standard Library.
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold text-primary ">
                                                            The PCEP™ certification shows
                                                        </div>
                                                        that the individual is familiar with the following concepts: fundamental terms and 
                                                        definitions (e.g. compilation vs. interpretation), Python's logic and structure 
                                                        (e.g. keywords, instructions, indentation), literals, variables, and numeral systems,
                                                        operators and data types, I/O operations, control flow mechanisms (conditional blocks 
                                                        and loops), data collections (lists, tuples, dictionaries, strings), functions 
                                                        (decomposition, built-in and user-defined functions, organizing interaction between 
                                                        functions and their environment, generators, recursion), exceptions (exception handling, 
                                                        hierarchies), as well as the essentials of Python programming language syntax, 
                                                        semantics, and the runtime environment.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- margin top  -->
                                        <div  style="margin-top: 5%;"></div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam name</th>
                                                <td>PCEP™ – Certified Entry-Level Python Programmer</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Code & Current Exam Versions</th>
                                                <td>PCEP-30-02 (Status: Active) <br>
                                                    PCEP-30-01 (Status: Retiring – December 31, 2022)
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Prerequisites</th>
                                                <td>
                                                    None
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Validity</th>
                                                <td>Lifetime</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Duration</th>
                                                <td>PCEP-30-02 – Exam: 40 minutes, NDA/Tutorial: 5 minutes <br>
                                                    PCEP-30-01 – Exam: 45 minutes, NDA/Tutorial: 5 minutes
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>30</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Format</th>
                                                <td>
                                                    Single- and multiple-select questions, drag & drop, gap fill, sort, code fill,
                                                    code insertion | Python 3.x
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>No prior experience necessary</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English, Spanish</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Cost</th>
                                                <td>
                                                    USD 59 (Exam: Single-Shot) <br>
                                                    USD 76.70 (Exam: with one retake) <br>
                                                    USD 71.00 (Exam: Single-Shot + Practice Test) <br>
                                                    USD 29 (Practice Test) <br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Delivery Channel</th>
                                                <td>OpenEDG Testing Service</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Associated Certifications</th>
                                                <td>
                                                    PCAP – Certified Associate in Python Programming (Exam PCAP-31-0x) <br>
                                                    PCPP1 – Certified Professional in Python Programming 1 (Exam PCPP-32-10x) <br>
                                                </td>
                                            </tr>
                                    </table>
                                    
                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            Become PCEP™ certified and get your foot in the door
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            Python is the programming language that opens more doors than any other, and the more you 
                                            understand Python, the more you can do in the 21st Century. With a solid knowledge of Python, 
                                            you can work in a multitude of jobs and a multitude of industries.PCEP™ certification will be 
                                            particularly valuable for:
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <span class="text-primary">✱</span> aspiring programmers and learners interested in learning 
                                            programming for fun and job-related tasks; <br>
                                            <span class="text-primary">✱</span> learners looking to gain fundamental skills and knowledge 
                                            for an entry-level job role as a software developer, data analyst, or tester; <br>
                                            <span class="text-primary">✱</span> industry professionals wishing to explore technologies 
                                            that are connected with Python, or that utilize it as a foundation; <br>
                                            <span class="text-primary">✱</span> team leaders, product managers, and project managers who 
                                            want to understand the terminology and processes in the software development cycle to 
                                            more effectively manage and communicate with production and development teams. <br>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <!-- End pcep Section -->
                        <?php
                    }
                    else
                    if($type == 'pcap')
                    {
                        ?>
                            <!-- ======= pcap Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">Python Institute Certifications</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/python/pcap.png" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">PCAP™ – Certified Associate in Python Programming</span> 
                                                <span class="idd">(Exam PCAP-31-0x)</span>
                                                <!-- title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <p>
                                                        PCAP™ – Certified Associate in Python Programming certification focuses on the 
                                                        Object-Oriented Programming approach to Python, and shows that the individual is 
                                                        familiar with the more advanced aspects of programming, including the essentials of 
                                                        OOP, the essentials of modules and packages, the exception handling mechanism in OOP, 
                                                        advanced operations on strings, list comprehensions, lambdas, generators, closures, 
                                                        and file processing.
                                                    </p> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- details 1  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold text-primary ">
                                                            PCAP™ – Certified Associate in 
                                                        </div>
                                                        Python Programming certification (Exam PCAP-31-0x) is a professional, high-stakes 
                                                        credential that measures the candidate's ability to perform intermediate-level coding 
                                                        tasks in the Python language, including the ability to design, develop, debug, execute, 
                                                        and refactor multi-module Python programs, as well as measures their skills and 
                                                        knowledge related to analyzing and modeling real-life problems in OOP categories 
                                                        with the use of the fundamental notions and techniques available in the object-oriented 
                                                        approach.
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold text-primary ">
                                                            The PCAP™ certification shows
                                                        </div>
                                                        that the individual is familiar with the following concepts: modules, packages, and 
                                                        PIP, character encoding, strings and string processing, generators, iterators, closures, 
                                                        files, file streams, and file processing, exception hierarchies, and exception classes 
                                                        and objects, working with selected Standard Library modules, and the fundamentals of 
                                                        the Object-Oriented Programming (OOP) approach.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- margin top  -->
                                        <div  style="margin-top: 5%;"></div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam name</th>
                                                <td>PCAP™ – Certified Associate in Python Programming</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Code & Current Exam Versions</th>
                                                <td>
                                                    PCAP-31-03 (Status: Active) <br>
                                                    PCEP-31-02 (Status: Retired)
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Prerequisites</th>
                                                <td>
                                                    None
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Validity</th>
                                                <td>Lifetime</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Duration</th>
                                                <td>
                                                    Exam: 65 minutes, NDA/Tutorial: 10 minutes
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>40</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Format</th>
                                                <td>
                                                    Single- and multiple-select questions | Python 3.x
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Recommended Experience</th>
                                                <td>No prior experience necessary</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Cost</th>
                                                <td>
                                                    USD 295 (Exam) <br>
                                                    USD 319 (Exam + Practice Test) <br>
                                                    USD 49 (Practice Test)
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Delivery Channel</th>
                                                <td>
                                                    Pearson VUE: Authorized Pearson VUE Testing Centers + OnVUE Online Proctoring from 
                                                    Pearson VUE OpenEDG Testing Service: 2022 pilot, limited availability
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Associated Certifications</th>
                                                <td>
                                                    PCEP – Certified Entry-Level Python Programmer (Exam PCEP-30-0x) <br>
                                                    PCPP1 – Certified Professional in Python Programming 1 (Exam PCPP-32-10x)
                                                </td>
                                            </tr>
                                    </table>
                                    
                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            Become PCEP™ certified and get your foot in the door
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            Python is the programming language that opens more doors than any other, and the more you 
                                            understand Python, the more you can do in the 21st Century. With a solid knowledge of Python, 
                                            you can work in a multitude of jobs and a multitude of industries.PCEP™ certification will be 
                                            particularly valuable for:
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <span class="text-primary">✱</span> aspiring programmers and learners interested in learning 
                                            programming for fun and job-related tasks; <br>
                                            <span class="text-primary">✱</span> learners looking to gain fundamental skills and knowledge 
                                            for an entry-level job role as a software developer, data analyst, or tester; <br>
                                            <span class="text-primary">✱</span> industry professionals wishing to explore technologies 
                                            that are connected with Python, or that utilize it as a foundation; <br>
                                            <span class="text-primary">✱</span> team leaders, product managers, and project managers who 
                                            want to understand the terminology and processes in the software development cycle to 
                                            more effectively manage and communicate with production and development teams. <br>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <!-- End pcap Section -->
                        <?php
                    }
                    else
                    if($type == 'pcpp1')
                    {
                        ?>
                            <!-- ======= pccp1 Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">Python Institute Certifications</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/python/pcpp1.png" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">PCPP1™ – Certified Professional in Python Programming 1</span> 
                                                <span class="idd">(Exam PCPP-32-10x)</span>
                                                <!-- title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <p>
                                                        PCPP1™ – Certified Professional in Python Programming 1 certification is the first of 
                                                        the two-series General-Purpose Programming track professional credentials from the 
                                                        OpenEDG Python Institute addressed to developers, IT specialists, and working 
                                                        professionals looking to obtain an industry credential that documents their skills and 
                                                        expertise in the advanced and more specialized aspects of computer programming and 
                                                        the Python language.
                                                    </p> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- details 1  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold text-primary ">
                                                            PCPP1™ – Certified Professional in Python Programming 1 
                                                        </div>
                                                        certification (Exam PCPP-32-10x) is a professional credential that measures the candidate's 
                                                        ability to accomplish coding tasks related to advanced programming in the Python language and 
                                                        related technologies, advanced notions and techniques used in object-oriented programming, 
                                                        the use of selected Python Standard Library modules and packages, designing, building and improving 
                                                        programs and applications utilizing the concepts of GUI and network programming, as well as
                                                        adopting the coding conventions and best practices for code writing.
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold text-primary ">
                                                            The PCPP1™ certification shows
                                                        </div>
                                                        that the individual is familiar with the following concepts: advanced use of classes 
                                                        and modelling real-life problems in the OOP categories (classes, instances, attributes, 
                                                        methods; class and instance data; shallow and deep operations; inheritance and 
                                                        polymorphism; extended function argument syntax and decorators; static and class 
                                                        methods; attribute encapsulation; composition and inheritance; advanced exceptions; 
                                                        copying object data; serialization; metaclasses), best practices and standardization 
                                                        (PEP8, PEP 257, code layout, comments and docstrings, naming conventions, string quotes 
                                                        and whitespaces, programming recommendations), GUI programming (events, widgets, 
                                                        geometry, tools and toolkits, conventions), the elements of network programming 
                                                        (network sockets, client-server communication, JSON and XML files in network 
                                                        communication, HTTP methods, CRUD, building a simple REST client), and file processing
                                                        and communicating with a program's environment (processing files: sqlite3, xml, csv, 
                                                        logging, and configparser; communication: os, datetime, io, and time).
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- margin top  -->
                                        <div  style="margin-top: 5%;"></div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam name</th>
                                                <td>PCPP1™ – Certified Professional in Python Programming 1</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Code & Current Exam Versions</th>
                                                <td>
                                                    PCPP-32-101 (Status: Active)
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Prerequisites</th>
                                                <td>
                                                    PCAP – Certified Associate in Python Programming (Exam PCAP-31-0x)
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Validity</th>
                                                <td>Lifetime</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Duration</th>
                                                <td>PCEP-30-02 – Exam: 40 minutes, NDA/Tutorial: 5 minutes <br>
                                                    PCEP-30-01 – Exam: 45 minutes, NDA/Tutorial: 5 minutes
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>45</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Format</th>
                                                <td>
                                                    Single- and multiple-select questions | Python 3.x
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Cost</th>
                                                <td>
                                                    USD 195 (Exam)
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Delivery Channel</th>
                                                <td>
                                                    Pearson VUE: Authorized Pearson VUE Testing Centers + OnVUE Online Proctoring from 
                                                    Pearson VUE OpenEDG Testing Service: 2022 pilot, limited availability
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Associated Certifications</th>
                                                <td>
                                                    PCEP – Certified Entry-Level Python Programmer (Exam PCEP-30-0x) <br>
                                                    PCAP – Certified Associate in Python Programming (Exam PCAP-31-0x) <br>
                                                    PCPP2™ – Certified Professional in Python Programming 2 (Exam PCPP-32-20x)
                                                </td>
                                            </tr>
                                    </table>
                                    
                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            Become PCPP1™ certified and take your career to the next level
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            Python is the programming language that opens more doors than any other, and the more you 
                                            understand Python, the more you can do in the 21st Century. With a solid knowledge of Python, 
                                            you can work in a multitude of jobs and a multitude of industries.
                                            PCPP1™ certification will be particularly valuable for:
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                             <span class="text-primary">✱</span>learners looking to boost their skills and knowledge for a 
                                             junior-level and middle-level role as a software developer, network programmer, data analyst, or 
                                             tester; <br>
                                             <span class="text-primary">✱</span>industry professionals wishing to explore technologies that 
                                             are connected with Python, or that utilize it as a foundation; <br>
                                             <span class="text-primary">✱</span>team leaders, product managers, and project managers who want 
                                             gain an in-depth understanding of the terminology and processes in the software development 
                                             cycle to more effectively manage and communicate with production, QA, and development teams. <br>

                                        </div>
                                    </div>

                                </div>
                            </section>
                            <!-- End pccp1 Section -->
                        <?php
                    }
                    else
                    if($type == 'pcpp2')
                    {
                        ?>
                            <!-- ======= pcpp2 Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">Python Institute Certifications</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/python/pcpp2.png" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">PCPP2™ – Certified Professional in Python Programming 2</span> 
                                                <span class="idd">(Exam PCPP-32-20x)</span>
                                                <!-- title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <p>
                                                        PCPP2™ – Certified Professional in Python Programming 2 certification is the second of the 
                                                        two-series General-Purpose Programming track professional credentials from the OpenEDG 
                                                        Python Institute addressed to experienced developers, IT specialists, engineers, software 
                                                        and system architects, and working professionals looking to obtain an industry credential 
                                                        that documents their skills and expertise in the advanced and highly specialized areas of 
                                                        computer programming, Python, and related technologies.
                                                    </p> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- details 1  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold text-primary ">
                                                            PCPP2™ – Certified Professional in Python Programming 2
                                                        </div>
                                                        certification (Exam PCPP-32-20x) is a professional credential that measures the 
                                                        candidate's ability to design, develop, debug, refactor, implement, and maintain 
                                                        high-quality multi-module systems, tools, and frameworks with the use of Python 
                                                        Standard and non-Standard Library components and related technologies. The PCPP2™ 
                                                        certification is aimed at experienced Python programmers who are proficient in the use 
                                                        of software architecture principles and techniques, software design patterns, working 
                                                        with SQL and NoSQL databases, using multithreading and multiprocessing programming 
                                                        techniques, and using the more advanced elements of the Python network programming domain.
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold text-primary ">
                                                            The PCPP2™ certification shows
                                                        </div>
                                                        that the individual is familiar with the following 
                                                        concepts: testing principles and techniques (unittest and pytest frameworks), design 
                                                        patterns (OOP design principles, the Singleton, Factory, Facade, Proxy, Observer, 
                                                        Command, Template Method, and State Design patterns), interprocess communication 
                                                        (multiprocessing, threading, subprocess management, multiprocess synchronization), 
                                                        network programming (Python socket module and socket programming, automating complex 
                                                        network configurations, software-defined networking, network security), Python-SQL and 
                                                        Python-NoSQL database access (relational and non-relational databases, CRUD, 
                                                        object-relational mapping: ORM), and the principles of clean code design, and 
                                                        maintenance and optimization of software products.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- margin top  -->
                                        <div  style="margin-top: 5%;"></div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam name</th>
                                                <td>PCPP2™ – Certified Professional in Python Programming 2</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Code & Current Exam Versions</th>
                                                <td>
                                                    PCPP-32-201 (Status: Not Published, Early Beta | Coming Q3/Q4 2023)
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Prerequisites</th>
                                                <td>
                                                    PCAP – Certified Associate in Python Programming (Exam PCAP-31-0x) <br>
                                                    + <br>
                                                    PCPP1 – Certified Professional in Python Programming (Exam PCPP1-32-10x)
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Validity</th>
                                                <td>Lifetime</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Duration</th>
                                                <td>
                                                    Exam: 65 minutes, NDA/Tutorial: 10 minutes
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>45</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Format</th>
                                                <td>
                                                    Single- and multiple-select questions | Python 3.x
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Cost</th>
                                                <td>
                                                    USD 195 (Exam)
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Delivery Channel</th>
                                                <td>
                                                    Pearson VUE: Authorized Pearson VUE Testing Centers + OnVUE Online Proctoring from 
                                                    Pearson VUE
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Associated Certifications</th>
                                                <td>
                                                    PCEP – Certified Entry-Level Python Programmer (Exam PCEP-30-0x) <br>
                                                    PCAP – Certified Associate in Python Programming (Exam PCAP-31-0x) <br>
                                                    PCPP1 – Certified Professional in Python Programming (Exam PCPP1-32-10x)
                                                </td>
                                            </tr>
                                    </table>
                                    
                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            Become PCPP2™ certified to upgrade your skills, advance your career, and boost your salary!
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            Python is the programming language that opens more doors than any other, and the more you understand 
                                            Python, the more you can do in the 21st Century. With a solid knowledge of Python, you can work in 
                                            a multitude of jobs and a multitude of industries.
                                            PCPP2™ certification will be particularly valuable for:
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                             <span class="text-primary">✱</span>learners looking to boost their skills and knowledge for a 
                                             middle-level and senior-level role as a software architect, system engineer, software developer, 
                                             network engineer, data engineer, or QA engineer; <br>
                                             <span class="text-primary">✱</span>industry professionals wishing to further explore technologies 
                                             that are connected with Python, or that utilize it as a foundation; <br>
                                             <span class="text-primary">✱</span>team leaders and software development professionals who want 
                                             gain an in-depth understanding of the more advanced programming concepts and processes utilized 
                                             in the software development cycle to effectively manage and communicate with production, QA, 
                                             and development teams.
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <!-- End pcpp2 Section -->
                        <?php
                    }
                    else
                    if($type == 'pcat')
                    {
                        ?>
                            <!-- ======= pcat Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">Python Institute Certifications</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/python/pcat.png" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">PCAT™ – Certified Associate in Testing with Python</span> 
                                                <span class="idd">(Exam PCAT-31-0x)</span>
                                                <!-- title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <p>
                                                        PCAT™ – Certified Associate in Testing with Python certification is a Python Institute's 
                                                        Testing specialization track credential that covers the most important elements of 
                                                        automated testing activities from the perspective of a Python programmer. The exam 
                                                        covers the principles of software testing, the fundamentals of unit testing, the 
                                                        principles of software engineering, software decomposition, and the Test-Driven and 
                                                        Behavior-Driven Development (TDD, BDD) approaches to programming.
                                                    </p> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- details 1  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold text-primary ">
                                                            PCAT™ – Certified Associate in
                                                        </div>
                                                        Testing with Python certification (Exam PCAT-31-0x) is
                                                        a professional, high-stakes credential that measures the candidate's proficiency in
                                                        software testing and engineering using a range of Python tools, including the ability
                                                        to design, develop, and refactor multi-module computer programs in accordance with
                                                        the Test-Driven Development (TDD) and Behavior-Driven Development (BDD) programming
                                                        approaches, as well as the most important testing-coding conventions, best
                                                        practices, and recognized software engineering and software testing principles
                                                        such as DRY, KISS, and F.I.R.S.T.
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold text-primary ">
                                                            The PCAT™ certification shows
                                                        </div>
                                                        that the individual is able to: explain the importance of 
                                                        software testing and the differences between different types of software testing, 
                                                        explain the most important software testing terms and definitions, understands the 
                                                        concept of the test pyramid, employ test automation and perform code refactoring, 
                                                        use assertions, context managers, and decorators, design and execute unit tests and 
                                                        analyze their results to implement quality code modifications and built-ins, 
                                                        organize unit tests into modules, create code following the TDD approach principles, 
                                                        and explain and employ the fundamental concepts of the BDD approach.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- margin top  -->
                                        <div  style="margin-top: 5%;"></div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam name</th>
                                                <td>PCAT™ – Certified Associate in Testing with Python</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Code & Current Exam Versions</th>
                                                <td>
                                                    PCAT-31-0x (Status: Coming Q1 2023)
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Prerequisites</th>
                                                <td>
                                                    None
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Validity</th>
                                                <td>5 years (unless retaken)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Duration</th>
                                                <td>
                                                    Exam: 65 minutes, NDA/Tutorial: 10 minutes
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>40</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Format</th>
                                                <td>
                                                    Single- and multiple-select questions | Python 3.x
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Cost</th>
                                                <td>
                                                    USD 295 (Exam) <br>
                                                    USD 319 (Exam + Practice Test) <br>
                                                    USD 49 (Practice Test) <br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="col">Delivery Channel</th>
                                                <td>
                                                    Pearson VUE: Authorized Pearson VUE Testing Centers + OnVUE Online Proctoring from 
                                                    Pearson VUE OpenEDG Testing Service: 2022 pilot, limited availability
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Associated Certifications</th>
                                                <td>
                                                    PCPT1 – Certified Professional in Testing with Python: Unit Testing (Exam PCPP-32-10x) <br>
                                                    PCPT2 – Certified Professional in Testing with Python: Test Automation (Exam PCPP-32-20x) <br>
                                                    PCPT3 – Certified Professional in Testing with Python: Security (Exam PCPP-32-30x) <br>
                                                </td>
                                            </tr>
                                    </table>
                                    
                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            Become PCAT™ certified and take your career to the next level
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            Python is the programming language that opens more doors than any other, and the more you understand 
                                            Python and related technologies, the more you can do in the 21st Century. With a solid knowledge of 
                                            Python, you can work in a multitude of jobs and a multitude of industries.
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <span class="text-primary">✱</span>aspiring programmers, software testing beginners, and learners 
                                            interested in learning the basics of Python testing for for fun and job-related tasks <br>
                                            <span class="text-primary">✱</span>learners looking to gain fundamental skills and knowledge for 
                                            an entry-level job role as a software developer, software tester, QA engineer, and test engineer <br>
                                            <span class="text-primary">✱</span>software testing and test engineering industry professionals 
                                            who know other programming language(s) and tools, wishing to explore technologies connected with 
                                            Python, or to utilize it as a foundation for software testing purposes <br>
                                            <span class="text-primary">✱</span>aspiring programmers, learners, and industry professionals 
                                            looking to acquire essential skills in Python and software testing for further self-development 
                                            in the areas of software development, software testing and test automation, security, software 
                                            engineering, software architecture, and quality assurance. <br>
                                            <span class="text-primary">✱</span>team leaders, product managers, project managers, and product 
                                            owners who want to understand the terminology and processes in software testing to more effectively 
                                            manage and communicate with software development and software testing teams.
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <!-- End pcat Section -->
                        <?php
                    }
                    else
                    if($type == 'pcad')
                    {
                        ?>
                            <!-- ======= pcad Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">Python Institute Certifications</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/python/pcad.png" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">PCAD™ – Certified Associate in Data Analytics with Python</span> 
                                                <span class="idd">(Exam PCAD-31-0x)</span>
                                                <!-- title  -->
                                                <div class="justify-content-center align-items-center mt-5 mb-3">
                                                    <p>
                                                        PCAD™ – Certified Associate in Data Analytics with Python certification validates 
                                                        that the individual demonstrates proficiency in Python data acquisition, cleaning, 
                                                        manipulation, modeling, analysis, and visualization techniques. The credential confirms 
                                                        the holder's expertise in the field of data analytics, such as decision-making under 
                                                        uncertainty, data-based decision-making, predictive modelling, and model selection, as 
                                                        well as measures their skills in using Python for file processing and performing 
                                                        programming operations with the use of the NumPy, Pandas, Matplotlib, Seaborn, and 
                                                        SciKit-Learn libraries.
                                                    </p> 
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- details 1  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold text-primary ">
                                                            PCAD™ – Certified Associate in
                                                        </div>
                                                        Data Analytics with Python certification (Exam PCAD-31-0x) is a professional, 
                                                        high-stakes credential that measures the candidate's ability to perform Python coding 
                                                        tasks related to mining, importing, cleaning, and preparing data for analysis, 
                                                        manipulating data and performing statistical analyses on them, summarizing and
                                                        visualizing datasets, using simple machine learning algorithms to perform predictive 
                                                        data modeling, and building Python solutions for data science purposes.
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold text-primary ">
                                                            The PCAD™ certification shows
                                                        </div>
                                                        that the individual is familiar with the following concepts: basic concepts, 
                                                        methodologies, and best practices in data analytics, data extraction and mining, 
                                                        file processing csv, html, json, data analytics with NumPy and Pandas, data 
                                                        visualization with Matplotlib and Seaborn, machine learning and data modeling with 
                                                        SciKit-Learn.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- margin top  -->
                                        <div  style="margin-top: 5%;"></div>

                                    </div>

                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam name</th>
                                                <td>PCAD™ – Certified Associate in Data Analytics with Python</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Code & Current Exam Versions</th>
                                                <td>
                                                    PCAD-31-0x (Status: Coming Q1 2023)
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Prerequisites</th>
                                                <td>
                                                    None
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Validity</th>
                                                <td>5 years (unless retaken or PCPD is earned)</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Exam Duration</th>
                                                <td>
                                                    Exam: 65 minutes, NDA/Tutorial: 10 minutes
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Number of Questions</th>
                                                <td>40</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Format</th>
                                                <td>
                                                    Single- and multiple-select questions | Python 3.x
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Passing Score</th>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Languages</th>
                                                <td>English</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Cost</th>
                                                <td>
                                                    USD 295 (Exam) <br>
                                                    USD 319 (Exam + Practice Test) <br>
                                                    USD 49 (Practice Test)
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="col">Delivery Channel</th>
                                                <td>
                                                    Pearson VUE: Authorized Pearson VUE Testing Centers + OnVUE Online Proctoring from Pearson VUE
                                                    OpenEDG Testing Service: 4th quarter of 2022: pilot, limited availability   
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Associated Certifications</th>
                                                <td>
                                                    PCPD – Certified Professional in Data Analytics with Python (Coming Q4 2023/Q1 2024)
                                                </td>
                                            </tr>
                                    </table>
                                    
                                    <!-- ending details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            Become PCAD™ certified and boost your career
                                        </span>
                                        <br><br>
                                        <div style="margin-left: 3%;">
                                            Python is the programming language that opens more doors than any other, and the more you 
                                            understand Python, the more you can do in the 21st Century. With a solid knowledge of Python, 
                                            you can work in a multitude of jobs and a multitude of industries.
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <span class="text-primary">✱</span>aspiring programmers and learners interested in learning 
                                            programming for fun and job-related tasks; <br>
                                            <span class="text-primary">✱</span>learners and career changers seeking a junior-level job 
                                            role as a software developer, data analyst, or tester. <br>
                                            <span class="text-primary">✱</span>industry professionals wishing to explore technologies that 
                                            are connected with Python, or that utilize it as a foundation; <br>
                                            <span class="text-primary">✱</span>aspiring programmers and industry professionals looking to 
                                            build a solid foundation for further studies in more specialized areas, such as testing, data 
                                            analytics, machine learning, IoT, and web development; <br>
                                            <span class="text-primary">✱</span>team leaders, product managers, and project managers who want 
                                            to understand the terminology and processes in the software development cycle to more effectively 
                                            manage and communicate with production and development teams. <br>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <!-- End pcad Section -->
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