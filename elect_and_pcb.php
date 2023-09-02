<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Development | EIRA</title>

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

                    if($type == 'epcb1')
                    {
                        ?>
                            <!-- ======= epcb1 Section ======= -->
                            <section id="hero">
                                <div class="container">
                                    <div class="flex justify-content-center">
                                        <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                            <div data-aos="zoom-out">
                                                <h1 class="text-center text-lg-center">
                                                    Enrollment <strong class="text-warning">Electronics and PCB Design</strong> <br>
                                                    Certifications Level 1
                                                </h1>
                                                <div class="text-center text-lg-center">
                                                    <a href="enroll_elect_and_pcb.php?type=<?php echo $type ?>" type="button" class="btn btn-warning scrollto">
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
                            </section>
                            <!-- End Hero -->

                            <!-- ======= epcb1 Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">Basic HTML and CSS</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/web_dev/web_dev1.png" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">LEVEL 1</span> 
                                                <span class="idd"> Basic HTML and CSS</span>
                                               
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <div class="col-md-12 mb-5">
                                                    <br>
                                                    Basic HTML/CSS! In this introductory course, we will explore the fundamental concepts of web development. 
                                                    We will begin by understanding HTML tags, which form the building blocks of any webpage. With HTML tags, you'll 
                                                    learn how to structure your content and create meaningful elements such as headings, paragraphs, links, images, 
                                                    and more. Moving on, we will delve into the exciting world of CSS (Cascading Style Sheets), where we'll discover 
                                                    how to style and enhance the appearance of HTML elements. We will explore various styling techniques, including 
                                                    color, font, size, and layout. Additionally, we'll learn about class and ID attributes, powerful tools that allow 
                                                    you to target specific elements and apply unique styles. So, let's embark on this journey together and unlock 
                                                    the potential of HTML and CSS to create visually appealing and interactive web pages. Get ready to bring your 
                                                    ideas to life!
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
                                                            1. HTML TAGS
                                                        </div>
                                                        Understanding the purpose and importance of HTML tags in web development.
                                                        Exploring various HTML tags and their functions, such as headings (h1 to h6), paragraphs (p), links (a), images (img), lists (ul, ol, li), and more.
                                                        Learning how to properly structure content using HTML tags to create a well-organized webpage.
                                                        Understanding the hierarchical relationships between HTML elements and how they affect the layout and structure of a webpage.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            2. STYLING HTML ELEMENTS
                                                        </div>
                                                        Introduction to CSS (Cascading Style Sheets) and its role in web design.
                                                        Understanding the different ways of applying styles to HTML elements, such as inline styles, embedded stylesheets, and external stylesheets.
                                                        Exploring various CSS properties and values to modify the appearance of HTML elements, including color, font family, font size, background, margins, padding, and borders.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 3  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            3. CLASS AND ID ATTRIBUTES:
                                                        </div>
                                                        Understanding the purpose of class and ID attributes in HTML and CSS.
                                                        Differentiating between class and ID attributes and knowing when to use each one.
                                                        Applying class attributes to multiple HTML elements to group them together and apply common styles.
                                                        Applying ID attributes to uniquely identify specific HTML elements and apply individual styles.
                                                        Utilizing class and ID selectors in CSS to target and style elements with precision.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 4  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            4. EXAM PREPARATION:

                                                        </div>
                                                        Reviewing and familiarizing yourself with a wide range of HTML tags and their usage.
                                                        Practicing CSS styling techniques by creating and modifying different HTML elements.
                                                        Understanding the concept of specificity in CSS and how it affects the application of styles.
                                                        Exploring examples and practical exercises to reinforce your understanding of HTML tags, CSS styling, and the usage of class and ID attributes.
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
                                            <strong>1. HTML </strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            Limited understanding of HTML basics, struggles with syntax and structure.
                                            Adequate knowledge of HTML fundamentals, can create simple web pages with basic tags and structure.
                                            Proficient in HTML, demonstrates a good grasp of tags, attributes, and document structure.
                                            Advanced understanding of HTML, capable of building complex web pages, effectively using semantic elements, and optimizing for accessibility.
                                        </div>
                                        <br>
                                        <!-- evaluation 2  -->
                                        <div style="margin-left: 3%;">
                                            <strong>2. CSS </strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            Limited knowledge of CSS, struggles with applying styles and understanding selectors.
                                            Basic understanding of CSS styling, can modify colors, fonts, and basic layout properties.
                                            Proficient in CSS, demonstrates competence in using selectors, properties, and applying advanced styling techniques.
                                            Advanced CSS skills, able to create complex layouts, responsive designs, and custom animations.
                                        </div>
                                        <br>
                                    </div>

                                    <div class="mt-5"></div>
                                    
                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Name</th>
                                                <td>Exam WDV-101</td>
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
                            <!-- End Web dev 1 Section -->
                        <?php
                    }
                    else
                    if($type == 'epcb2')
                    {
                        ?>
                            <!-- ======= epcb1 Section ======= -->
                            <section id="hero">
                                <div class="container">
                                    <div class="flex justify-content-center">
                                        <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                            <div data-aos="zoom-out">
                                                <h1 class="text-center text-lg-center">
                                                    Enrollment <strong class="text-warning">Electronics and PCB Design</strong> <br>
                                                    Certifications Level 2
                                                </h1>
                                                <div class="text-center text-lg-center">
                                                    <a href="enroll_elect_and_pcb.php?type=<?php echo $type ?>" type="button" class="btn btn-warning scrollto">
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
                            </section>
                            <!-- End Hero -->

                            <!-- ======= epcb1 Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">Basic HTML and CSS</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/web_dev/web_dev1.png" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">LEVEL 1</span> 
                                                <span class="idd"> Basic HTML and CSS</span>
                                               
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <div class="col-md-12 mb-5">
                                                    <br>
                                                    Basic HTML/CSS! In this introductory course, we will explore the fundamental concepts of web development. 
                                                    We will begin by understanding HTML tags, which form the building blocks of any webpage. With HTML tags, you'll 
                                                    learn how to structure your content and create meaningful elements such as headings, paragraphs, links, images, 
                                                    and more. Moving on, we will delve into the exciting world of CSS (Cascading Style Sheets), where we'll discover 
                                                    how to style and enhance the appearance of HTML elements. We will explore various styling techniques, including 
                                                    color, font, size, and layout. Additionally, we'll learn about class and ID attributes, powerful tools that allow 
                                                    you to target specific elements and apply unique styles. So, let's embark on this journey together and unlock 
                                                    the potential of HTML and CSS to create visually appealing and interactive web pages. Get ready to bring your 
                                                    ideas to life!
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
                                                            1. HTML TAGS
                                                        </div>
                                                        Understanding the purpose and importance of HTML tags in web development.
                                                        Exploring various HTML tags and their functions, such as headings (h1 to h6), paragraphs (p), links (a), images (img), lists (ul, ol, li), and more.
                                                        Learning how to properly structure content using HTML tags to create a well-organized webpage.
                                                        Understanding the hierarchical relationships between HTML elements and how they affect the layout and structure of a webpage.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            2. STYLING HTML ELEMENTS
                                                        </div>
                                                        Introduction to CSS (Cascading Style Sheets) and its role in web design.
                                                        Understanding the different ways of applying styles to HTML elements, such as inline styles, embedded stylesheets, and external stylesheets.
                                                        Exploring various CSS properties and values to modify the appearance of HTML elements, including color, font family, font size, background, margins, padding, and borders.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 3  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            3. CLASS AND ID ATTRIBUTES:
                                                        </div>
                                                        Understanding the purpose of class and ID attributes in HTML and CSS.
                                                        Differentiating between class and ID attributes and knowing when to use each one.
                                                        Applying class attributes to multiple HTML elements to group them together and apply common styles.
                                                        Applying ID attributes to uniquely identify specific HTML elements and apply individual styles.
                                                        Utilizing class and ID selectors in CSS to target and style elements with precision.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 4  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            4. EXAM PREPARATION:

                                                        </div>
                                                        Reviewing and familiarizing yourself with a wide range of HTML tags and their usage.
                                                        Practicing CSS styling techniques by creating and modifying different HTML elements.
                                                        Understanding the concept of specificity in CSS and how it affects the application of styles.
                                                        Exploring examples and practical exercises to reinforce your understanding of HTML tags, CSS styling, and the usage of class and ID attributes.
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
                                            <strong>1. HTML </strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            Limited understanding of HTML basics, struggles with syntax and structure.
                                            Adequate knowledge of HTML fundamentals, can create simple web pages with basic tags and structure.
                                            Proficient in HTML, demonstrates a good grasp of tags, attributes, and document structure.
                                            Advanced understanding of HTML, capable of building complex web pages, effectively using semantic elements, and optimizing for accessibility.
                                        </div>
                                        <br>
                                        <!-- evaluation 2  -->
                                        <div style="margin-left: 3%;">
                                            <strong>2. CSS </strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            Limited knowledge of CSS, struggles with applying styles and understanding selectors.
                                            Basic understanding of CSS styling, can modify colors, fonts, and basic layout properties.
                                            Proficient in CSS, demonstrates competence in using selectors, properties, and applying advanced styling techniques.
                                            Advanced CSS skills, able to create complex layouts, responsive designs, and custom animations.
                                        </div>
                                        <br>
                                    </div>

                                    <div class="mt-5"></div>
                                    
                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Name</th>
                                                <td>Exam WDV-101</td>
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
                            <!-- End Web dev 1 Section -->
                        <?php
                    }
                    else
                    if($type == 'epcb3')
                    {
                        ?>
                            <!-- ======= epcb1 Section ======= -->
                            <section id="hero">
                                <div class="container">
                                    <div class="flex justify-content-center">
                                        <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                            <div data-aos="zoom-out">
                                                <h1 class="text-center text-lg-center">
                                                    Enrollment <strong class="text-warning">Electronics and PCB Design</strong> <br>
                                                    Certifications Level 3
                                                </h1>
                                                <div class="text-center text-lg-center">
                                                    <a href="enroll_elect_and_pcb.php?type=<?php echo $type ?>" type="button" class="btn btn-warning scrollto">
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
                            </section>
                            <!-- End Hero -->

                            <!-- ======= epcb1 Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">Basic HTML and CSS</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/web_dev/web_dev1.png" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">LEVEL 1</span> 
                                                <span class="idd"> Basic HTML and CSS</span>
                                               
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <div class="col-md-12 mb-5">
                                                    <br>
                                                    Basic HTML/CSS! In this introductory course, we will explore the fundamental concepts of web development. 
                                                    We will begin by understanding HTML tags, which form the building blocks of any webpage. With HTML tags, you'll 
                                                    learn how to structure your content and create meaningful elements such as headings, paragraphs, links, images, 
                                                    and more. Moving on, we will delve into the exciting world of CSS (Cascading Style Sheets), where we'll discover 
                                                    how to style and enhance the appearance of HTML elements. We will explore various styling techniques, including 
                                                    color, font, size, and layout. Additionally, we'll learn about class and ID attributes, powerful tools that allow 
                                                    you to target specific elements and apply unique styles. So, let's embark on this journey together and unlock 
                                                    the potential of HTML and CSS to create visually appealing and interactive web pages. Get ready to bring your 
                                                    ideas to life!
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
                                                            1. HTML TAGS
                                                        </div>
                                                        Understanding the purpose and importance of HTML tags in web development.
                                                        Exploring various HTML tags and their functions, such as headings (h1 to h6), paragraphs (p), links (a), images (img), lists (ul, ol, li), and more.
                                                        Learning how to properly structure content using HTML tags to create a well-organized webpage.
                                                        Understanding the hierarchical relationships between HTML elements and how they affect the layout and structure of a webpage.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            2. STYLING HTML ELEMENTS
                                                        </div>
                                                        Introduction to CSS (Cascading Style Sheets) and its role in web design.
                                                        Understanding the different ways of applying styles to HTML elements, such as inline styles, embedded stylesheets, and external stylesheets.
                                                        Exploring various CSS properties and values to modify the appearance of HTML elements, including color, font family, font size, background, margins, padding, and borders.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 3  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            3. CLASS AND ID ATTRIBUTES:
                                                        </div>
                                                        Understanding the purpose of class and ID attributes in HTML and CSS.
                                                        Differentiating between class and ID attributes and knowing when to use each one.
                                                        Applying class attributes to multiple HTML elements to group them together and apply common styles.
                                                        Applying ID attributes to uniquely identify specific HTML elements and apply individual styles.
                                                        Utilizing class and ID selectors in CSS to target and style elements with precision.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 4  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            4. EXAM PREPARATION:

                                                        </div>
                                                        Reviewing and familiarizing yourself with a wide range of HTML tags and their usage.
                                                        Practicing CSS styling techniques by creating and modifying different HTML elements.
                                                        Understanding the concept of specificity in CSS and how it affects the application of styles.
                                                        Exploring examples and practical exercises to reinforce your understanding of HTML tags, CSS styling, and the usage of class and ID attributes.
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
                                            <strong>1. HTML </strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            Limited understanding of HTML basics, struggles with syntax and structure.
                                            Adequate knowledge of HTML fundamentals, can create simple web pages with basic tags and structure.
                                            Proficient in HTML, demonstrates a good grasp of tags, attributes, and document structure.
                                            Advanced understanding of HTML, capable of building complex web pages, effectively using semantic elements, and optimizing for accessibility.
                                        </div>
                                        <br>
                                        <!-- evaluation 2  -->
                                        <div style="margin-left: 3%;">
                                            <strong>2. CSS </strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            Limited knowledge of CSS, struggles with applying styles and understanding selectors.
                                            Basic understanding of CSS styling, can modify colors, fonts, and basic layout properties.
                                            Proficient in CSS, demonstrates competence in using selectors, properties, and applying advanced styling techniques.
                                            Advanced CSS skills, able to create complex layouts, responsive designs, and custom animations.
                                        </div>
                                        <br>
                                    </div>

                                    <div class="mt-5"></div>
                                    
                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Name</th>
                                                <td>Exam WDV-101</td>
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
                            <!-- End Web dev 1 Section -->
                        <?php
                    }
                    else{
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