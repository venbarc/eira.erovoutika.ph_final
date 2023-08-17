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

                    if($type == 'wdv1')
                    {
                        ?>
                            <!-- ======= Web dev 1 Section ======= -->
                            <section id="hero">
                                <div class="container">
                                    <div class="flex justify-content-center">
                                        <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                            <div data-aos="zoom-out">
                                                <h1 class="text-center text-lg-center">
                                                    Enrollment <strong class="text-warning">Web Development</strong> <br>
                                                    Certifications Level 1
                                                </h1>
                                                <div class="text-center text-lg-center">
                                                    <a href="enroll_web_dev.php?type=<?php echo $type ?>" type="button" class="btn btn-warning scrollto">
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

                            <!-- ======= Web dev 1 Section ======= -->
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
                    if($type == 'wdv2')
                    {
                        ?>
                            <!-- ======= Web dev 1 Section ======= -->
                            <section id="hero">
                                <div class="container">
                                    <div class="flex justify-content-center">
                                        <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                            <div data-aos="zoom-out">
                                                <h1 class="text-center text-lg-center">
                                                    Enrollment <strong class="text-warning">Web Development</strong> <br>
                                                    Certifications Level 2
                                                </h1>
                                                <div class="text-center text-lg-center">
                                                    <a href="enroll_web_dev.php?type=<?php echo $type ?>" type="button" class="btn btn-warning scrollto">
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

                            <!-- ======= Web dev 1 Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">Advance HTML, CSS and JS</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/web_dev/web_dev2.png" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">LEVEL 2</span> 
                                                <span class="idd"> Advance HTML, CSS and JS</span>
                                               
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <div class="col-md-12 mb-5">
                                                    <br>
                                                    HTML, or HyperText Markup Language, serves as the foundational language for web development, allowing 
                                                    developers to create the structure and content of web pages by utilizing various tags and elements to 
                                                    define text, images, links, forms, and multimedia. CSS, which stands for Cascading Style Sheets, complements 
                                                    HTML by enabling web designers to control the presentation and layout of those web pages, giving them the 
                                                    ability to customize colors, fonts, margins, padding, and more to achieve visually appealing and consistent 
                                                    designs across different devices and screen sizes. Meanwhile, JavaScript, a versatile scripting language, 
                                                    brings interactivity and dynamism to web pages, allowing developers to add interactive elements, form 
                                                    validation, animations, and even build complex web applications, thereby enhancing the overall user experience 
                                                    and responsiveness of the website. Together, HTML, CSS, and JavaScript form the core trio of web development, 
                                                    enabling the creation of fully functional, aesthetically pleasing, and engaging web experiences.
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
                                                            1. HTML
                                                        </div>
                                                        <span class="text-danger">* </span> HTML and its role in web development <br>
                                                        <span class="text-danger">* </span>HTML document structure: doctype, head, body, and basic elements <br>
                                                        <span class="text-danger">* </span>Working with text: headings, paragraphs, lists, and formatting tags <br>
                                                        <span class="text-danger">* </span>Adding images and multimedia using HTML tags <br>
                                                        <span class="text-danger">* </span>Creating hyperlinks and anchor tags <br>
                                                        <span class="text-danger">* </span>Understanding HTML forms and form elements (input, select, textarea, etc.) <br>
                                                        <span class="text-danger">* </span>Semantic HTML: using meaningful tags like header, footer, section, article, etc. <br>
                                                        <span class="text-danger">* </span>Tables and their structure in HTML <br>
                                                        <span class="text-danger">* </span>Creating and styling HTML lists <br>
                                                        <span class="text-danger">* </span> Basic HTML5 elements: canvas, video, audio, and more <br>
                                                        <span class="text-danger">* </span>Accessibility in HTML: using alt attributes, labels, and ARIA roles <br>
                                                        <br><br>
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            2. CSS
                                                        </div>
                                                        <span class="text-danger">* </span>Introduction to CSS and its role in web development <br>
                                                        <span class="text-danger">* </span>CSS syntax and rule structure: selectors, properties, and values <br>
                                                        <span class="text-danger">* </span>Styling text: fonts, colors, text alignment, and decorations <br>
                                                        <span class="text-danger">* </span>Working with CSS box model: margins, padding, borders <br>
                                                        <span class="text-danger">* </span>Understanding and using CSS classes and IDs <br>
                                                        <span class="text-danger">* </span> Positioning elements: static, relative, absolute, and fixed <br>
                                                        <span class="text-danger">* </span> CSS layout techniques: floats, flexbox, and grid <br>
                                                        <span class="text-danger">* </span>Creating responsive designs with media queries <br>
                                                        <span class="text-danger">* </span>CSS transitions and animations <br>
                                                        <span class="text-danger">* </span>CSS transformations: rotate, scale, translate, etc. <br>
                                                        <span class="text-danger">* </span>Introduction to CSS preprocessors (e.g., Sass, LESS) - optional <br>
                                                        <br><br>
                                                    </div>
                                                    <!-- details 3  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            3. JavaScript
                                                        </div>
                                                        <span class="text-danger">* </span>Introduction to JavaScript and its role in web development <br>
                                                        <span class="text-danger">* </span>JavaScript syntax: variables, data types, and operators <br>
                                                        <span class="text-danger">* </span>Working with functions and control structures (if-else, loops) <br>
                                                        <span class="text-danger">* </span>DOM manipulation: accessing and modifying HTML elements with JavaScript <br>
                                                        <span class="text-danger">* </span>Handling user events: click, input, mouse events, etc. <br>
                                                        <span class="text-danger">* </span>Understanding and using JavaScript objects and arrays <br>
                                                        <span class="text-danger">* </span>Asynchronous JavaScript: callbacks, promises, and async/await <br>
                                                        <span class="text-danger">* </span>Handling form validation with JavaScript <br>
                                                        <span class="text-danger">* </span> Working with JSON data and APIs <br>
                                                        <span class="text-danger">* </span>Introduction to AJAX and Fetch API <br>
                                                        <span class="text-danger">* </span> Debugging JavaScript code <br>
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
                                        <!-- evaluation 3  -->
                                        <div style="margin-left: 3%;">
                                            <strong>3. JS </strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            The examination will assess the proper use of JavaScript syntax, including variables, data types, and operators; 
                                            accurate implementation of functions and control structures (if-else, loops) to perform tasks; correct manipulation 
                                            of the Document Object Model (DOM) to access and modify HTML elements; handling and responding to user events 
                                            (click, input, mouse events) using JavaScript; effective use of JavaScript objects and arrays to store and manage 
                                            data; understanding and implementation of asynchronous JavaScript using callbacks, promises, or async/await; 
                                            accurate handling of form validation using JavaScript; retrieving and working with JSON data and APIs using 
                                            JavaScript, and appropriate use of AJAX or Fetch API to interact with server-side resources.
                                        </div>
                                        <br>
                                    </div>

                                    <div class="mt-5"></div>
                                    
                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Name</th>
                                                <td>Exam WDV-102</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Pre-requisites</th>
                                                <td>WDV-101</td>
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
                    if($type == 'wdv3')
                    {
                        ?>
                            <!-- ======= Web dev 3 Section ======= -->
                            <section id="hero">
                                <div class="container">
                                    <div class="flex justify-content-center">
                                        <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                            <div data-aos="zoom-out">
                                                <h1 class="text-center text-lg-center">
                                                    Enrollment <strong class="text-warning">Web Development</strong> <br>
                                                    Certifications Level 3
                                                </h1>
                                                <div class="text-center text-lg-center">
                                                    <a href="enroll_web_dev.php?type=<?php echo $type ?>" type="button" class="btn btn-warning scrollto">
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

                            <!-- ======= Web dev 3 Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">CSS Frame works</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/web_dev/web_dev3.png" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">LEVEL 3</span> 
                                                <span class="idd"> CSS Frame Works</span>
                                               
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <div class="col-md-6 mb-5">
                                                    <strong>Bootstrap CSS:</strong>
                                                    <br>
                                                    is a popular and widely-used front-end CSS framework developed by Twitter. It provides a 
                                                    set of pre-designed and responsive components, styles, and layouts that enable developers to create 
                                                    modern and visually appealing websites and web applications quickly. Bootstrap utilizes HTML, CSS, and 
                                                    JavaScript to offer a comprehensive library of UI elements like buttons, forms, navigation bars, modals, 
                                                    and more, all designed to work seamlessly across different devices and screen sizes. With its grid system, 
                                                    developers can easily create responsive layouts, ensuring that their designs adapt smoothly to various devices.
                                                    Bootstrap's documentation is extensive, making it easy for both beginners and experienced developers to 
                                                    implement and customize its components according to specific project requirements. Its widespread usage and 
                                                    strong community support also make it a valuable choice for building consistent and professional-looking user 
                                                    interfaces.
                                                    </div>
                                                    <div class="col-md-6 mb-5">
                                                    <strong>Tailwind CSS:</strong>
                                                    <br>
                                                    Tailwind CSS is a utility-first CSS framework that offers a unique approach to web development. 
                                                    Instead of providing pre-designed components like Bootstrap, Tailwind CSS focuses on providing a highly 
                                                    customizable set of utility classes. These utility classes encapsulate individual CSS styles and can be 
                                                    combined to build UI components and layouts quickly. Tailwind CSS aims to provide developers with low-level 
                                                    building blocks that can be customized extensively, allowing for greater design flexibility without the need 
                                                    to write custom CSS. This approach streamlines the development process and makes it easier to maintain a 
                                                    consistent design system throughout the project. While it requires a learning curve to become familiar with 
                                                    the utility classes, Tailwind CSS's approach offers significant benefits in terms of rapid development, 
                                                    consistent styles, and minimal reliance on writing custom CSS. Additionally, Tailwind CSS can be easily 
                                                    integrated with JavaScript frameworks like React, Vue, or Angular, making it a versatile choice for modern 
                                                    web development projects.
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
                                                            1. Bootstrap:
                                                        </div>
                                                        <span class="text-danger">* </span> Introduction to Bootstrap and its role in web development <br>
                                                        <span class="text-danger">* </span> Bootstrap's grid system for creating responsive layouts <br>
                                                        <span class="text-danger">* </span> Working with Bootstrap components, such as buttons, forms, and navigation bars <br>
                                                        <span class="text-danger">* </span>  Utilizing Bootstrap's utility classes for styling and layout adjustments <br>
                                                        <span class="text-danger">* </span>  Customizing Bootstrap components and styles to match project requirements <br>
                                                        <span class="text-danger">* </span> Understanding Bootstrap's responsive design approach and breakpoints <br>
                                                        <span class="text-danger">* </span> Integrating Bootstrap with JavaScript frameworks for enhanced functionality <br>
                                                        <span class="text-danger">* </span> Leveraging Bootstrap's documentation for efficient development <br>
                                                        <br><br>
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            2. Tailwind:
                                                        </div>
                                                        <span class="text-danger">* </span>  Introduction to Tailwind CSS and its utility-first approach <br>
                                                        <span class="text-danger">* </span>  Understanding Tailwind's utility classes for styling and design flexibility <br>
                                                        <span class="text-danger">* </span>  Creating responsive layouts using Tailwind's grid system and responsive utility classes <br>
                                                        <span class="text-danger">* </span>  Building custom components and designs with Tailwind's utility classes <br>
                                                        <span class="text-danger">* </span>  Customizing color schemes and design tokens in Tailwind CSS <br>
                                                        <span class="text-danger">* </span>  Utilizing responsive design features in Tailwind CSS <br>
                                                        <span class="text-danger">* </span>  Integrating Tailwind CSS with JavaScript frameworks for dynamic web applications <br>
                                                        <span class="text-danger">* </span>  Exploring the advantages and disadvantages of using Tailwind CSS <br>
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
                                            <strong>1. Bootstrap CSS </strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            This exam covers Bootstrap's role in web development, including its grid system, components (buttons, forms, 
                                            navigation bars), utility classes, customization, responsive design, JavaScript integration, and efficient use 
                                            of documentation.
                                        </div>
                                        <br>
                                        <!-- evaluation 2  -->
                                        <div style="margin-left: 3%;">
                                            <strong>2. Tailwind CSS </strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            This exam covers Tailwind CSS, its utility-first approach, utility classes for styling and flexibility, 
                                            responsive layouts using the grid system, creating custom designs, customizing color schemes and design tokens, 
                                            responsive design features, Tailwind's integration with JavaScript frameworks, and exploring its advantages and 
                                            disadvantages.
                                        </div>
                                        <br>
                                    </div>

                                    <div class="mt-5"></div>
                                    
                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Name</th>
                                                <td>Exam WDV-103</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Pre-requisites</th>
                                                <td>WDV-101 / WDV-102</td>
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
                            <!-- End Web dev 3 Section -->
                        <?php
                    }
                    else
                    if($type == 'wdv4')
                    {
                        ?>
                            <!-- ======= Web dev 1 Section ======= -->
                            <section id="hero">
                                <div class="container">
                                    <div class="flex justify-content-center">
                                        <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                            <div data-aos="zoom-out">
                                                <h1 class="text-center text-lg-center">
                                                    Enrollment <strong class="text-warning">Web Development</strong> <br>
                                                    Certifications Level 4
                                                </h1>
                                                <div class="text-center text-lg-center">
                                                    <a href="enroll_web_dev.php?type=<?php echo $type ?>" type="button" class="btn btn-warning scrollto">
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

                            <!-- ======= Web dev 1 Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">Basic PHP/ MySQL</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/web_dev/web_dev4.png" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">LEVEL 4</span> 
                                                <span class="idd"> Basic PHP/ MySQL</span>
                                               
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <div class="col-md-6 mb-5">
                                                    <strong>PHP (Hypertext Preprocessor):</strong>
                                                    <br>
                                                    PHP is a server-side scripting language that is embedded in HTML, allowing developers to create dynamic content on web pages.
                                                    It is open-source and has a large and active community, making it widely supported and continuously evolving.
                                                    PHP can interact with databases, handle form data, manage cookies and sessions, and perform various server-side tasks.
                                                    With its simple syntax and ease of integration with HTML, PHP enables developers to build complex web applications efficiently.
                                                    PHP is commonly used in conjunction with MySQL to perform database operations, making it a preferred choice for back-end development.
                                                    </div>
                                                    <div class="col-md-6 mb-5">
                                                    <strong>MySQL:</strong>
                                                    <br>
                                                    MySQL is an open-source relational database management system (RDBMS) known for its speed, scalability, and reliability.
                                                    It is widely used in web development to store and manage structured data efficiently.
                                                    MySQL follows the SQL (Structured Query Language) standard, making it easy to interact with databases using queries.
                                                    With its support for various data types and powerful features like indexing and caching, MySQL offers optimized database performance.
                                                    It integrates seamlessly with PHP, allowing developers to retrieve, insert, update, and delete data from databases in web applications.
                                                    MySQL is a popular choice for web projects of all sizes, from small websites to large-scale applications, due to its robustness and stability.
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
                                                            1. PHP Basics
                                                        </div>
                                                        <span class="text-danger">* </span> Introduction to PHP and its role in server-side web development <br>
                                                        <span class="text-danger">* </span> PHP syntax and data types <br>
                                                        <span class="text-danger">* </span> Working with variables, arrays, and conditional statements (if-else, switch) <br>
                                                        <span class="text-danger">* </span> Loops (for, while, foreach) and control structures in PHP <br>
                                                        <span class="text-danger">* </span> Understanding PHP functions and their usage <br>
                                                        <span class="text-danger">* </span> PHP form handling and processing user input <br>
                                                        <span class="text-danger">* </span> Managing PHP sessions and cookies <br>
                                                        <br><br>
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            2. MySQL Database
                                                        </div>
                                                        <span class="text-danger">* </span> Introduction to MySQL and its role in database management <br>
                                                        <span class="text-danger">* </span> Creating and managing MySQL databases and tables <br>
                                                        <span class="text-danger">* </span> Basic CRUD operations (Create, Read, Update, Delete) in MySQL <br>
                                                        <span class="text-danger">* </span> SQL queries for data retrieval (SELECT), data insertion (INSERT), data update (UPDATE), and data deletion (DELETE)<br>
                                                        <span class="text-danger">* </span> Working with MySQL data types and database normalization <br>
                                                        <span class="text-danger">* </span> Understanding MySQL joins and how to retrieve data from multiple tables <br>
                                                        <br><br>
                                                    </div>
                                                    <!-- details 3  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            3. PHP and MySQL Integration
                                                        </div>
                                                        <span class="text-danger">* </span> Connecting PHP to MySQL database <br>
                                                        <span class="text-danger">* </span> Executing SQL queries from PHP <br>
                                                        <span class="text-danger">* </span> Fetching data from MySQL and displaying it using PHP <br>
                                                        <span class="text-danger">* </span> Inserting, updating, and deleting data in MySQL using PHP <br>
                                                        <span class="text-danger">* </span> Using PHP to validate and process form data and store it in the database <br>
                                                        <span class="text-danger">* </span> Managing user authentication and sessions with PHP and MySQL <br>
                                                        <br><br>
                                                    </div>
                                                    <!-- details 4  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            4. Advanced Concepts
                                                        </div>
                                                        <span class="text-danger">* </span> Introduction to prepared statements for secure database operations <br>
                                                        <span class="text-danger">* </span> Understanding PHP error handling and debugging techniques <br>
                                                        <span class="text-danger">* </span> File handling in PHP: reading, writing, and uploading files <br>
                                                        <span class="text-danger">* </span> Exploring PHP frameworks (e.g., Laravel, CodeIgniter) for efficient development <br>
                                                        <span class="text-danger">* </span> Implementing basic security measures to prevent common web vulnerabilities <br>
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
                                            <strong>1. PHP Fundamentals </strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            The exam assesses students' ability to demonstrate correct implementation of PHP syntax, data types, variables, 
                                            arrays, and conditional statements, as well as accurate usage of loops (for, while, foreach) and control structures 
                                            (if-else, switch) in PHP. Additionally, it evaluates their understanding and utilization of PHP functions for code 
                                            organization and reusability, proper handling of PHP forms, and effective management of PHP sessions and cookies for 
                                            user authentication and data persistence.
                                        </div>
                                        <br>
                                        <!-- evaluation 2  -->
                                        <div style="margin-left: 3%;">
                                            <strong>2. MySQL Database Operations </strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            The exam evaluates students' ability to demonstrate accurate creation and management of MySQL databases and tables, 
                                            correct implementation of basic CRUD operations (Create, Read, Update, Delete) in MySQL, and accurate usage of SQL 
                                            queries (SELECT, INSERT, UPDATE, DELETE) for data retrieval and manipulation. Additionally, it assesses their 
                                            understanding and application of MySQL data types and database normalization, as well as their proficiency in using 
                                            MySQL joins to retrieve data from multiple tables.
                                        </div>
                                        <br>
                                        <!-- evaluation 3  -->
                                        <div style="margin-left: 3%;">
                                            <strong>3. PHP and MySQL Integration </strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            Successful connection establishment between PHP and MySQL database.
                                            Correct execution of SQL queries from PHP and handling of query results.
                                            Accurate fetching and displaying of data retrieved from MySQL using PHP.
                                            Proper insertion, updating, and deletion of data in MySQL using PHP.
                                            Secure handling of form data validation and processing using PHP and MySQL.
                                        </div>
                                        <br>
                                    </div>

                                    <div class="mt-5"></div>
                                    
                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Name</th>
                                                <td>Exam WDV-104</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Pre-requisites</th>
                                                <td>WDV-102 / WDV-103</td>
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
                    if($type == 'wdv5')
                    {
                        ?>
                            <!-- ======= Web dev 1 Section ======= -->
                            <section id="hero">
                                <div class="container">
                                    <div class="flex justify-content-center">
                                        <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                            <div data-aos="zoom-out">
                                                <h1 class="text-center text-lg-center">
                                                    Enrollment <strong class="text-warning">Web Development</strong> <br>
                                                    Certifications Level 5
                                                </h1>
                                                <div class="text-center text-lg-center">
                                                    <a href="enroll_web_dev.php?type=<?php echo $type ?>" type="button" class="btn btn-warning scrollto">
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

                            <!-- ======= Web dev 1 Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">Full Stack Development</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/web_dev/web_dev5.png" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">LEVEL 5</span> 
                                                <span class="idd"> Full Stack Development</span>
                                               
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <div class="col-md-12 mb-5">
                                                    <strong>Full-Stack Development:</strong>
                                                    <br>
                                                    In full-stack development, front-end and back-end components work together seamlessly to create a complete 
                                                    web application. The front-end handles user interactions and presents the data, while the back-end processes 
                                                    requests, manages data, and ensures the proper functioning of the application. Communication between the 
                                                    front-end and back-end is achieved through HTTP requests and responses.Full-stack developers are proficient in 
                                                    both front-end and back-end technologies, allowing them to build end-to-end solutions and handle the entire 
                                                    development process. They work with frameworks and libraries to streamline development, improve code 
                                                    organization, and enhance productivity.By combining HTML, CSS, JavaScript, PHP, and MySQL, full-stack 
                                                    development enables the creation of feature-rich and scalable web applications that cater to the needs of
                                                    both users and businesses. It provides a holistic approach to web development, ensuring that all aspects of 
                                                    the application are well-integrated and cohesive.
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
                                                            1. HTML
                                                        </div>
                                                        <span class="text-danger">* </span> Understanding HTML syntax and structure <br>
                                                        <span class="text-danger">* </span> Proper use of HTML tags and elements for content organization <br>
                                                        <span class="text-danger">* </span> Creating hyperlinks and anchor tags <br>
                                                        <span class="text-danger">* </span> Working with images and multimedia elements <br>
                                                        <span class="text-danger">* </span> Implementing forms and form elements for user input <br>
                                                        <span class="text-danger">* </span> Usage of semantic HTML for improved accessibility and SEO <br>
                                                        <br><br>
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            2. CSS
                                                        </div>
                                                        <span class="text-danger">* </span> Implementing CSS styles and classes for element styling <br>
                                                        <span class="text-danger">* </span> Usage of CSS properties for text formatting and layout design <br>
                                                        <span class="text-danger">* </span> Understanding the CSS box model and its impact on element sizing <br>
                                                        <span class="text-danger">* </span> Working with CSS positioning and layout techniques (float, flexbox, grid) <br>
                                                        <span class="text-danger">* </span> Applying CSS media queries for responsive design <br>
                                                        <span class="text-danger">* </span> Creating CSS animations and transitions for interactive elements <br>
                                                        <br><br>
                                                    </div>
                                                     <!-- details 3  -->
                                                     <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            3. JavaScript
                                                        </div>
                                                        <span class="text-danger">* </span> Understanding JavaScript syntax, variables, and data types <br>
                                                        <span class="text-danger">* </span>  Usage of control structures (if-else, switch) and loops (for, while)<br>
                                                        <span class="text-danger">* </span> Handling and responding to user events (click, input, mouse events)<br>
                                                        <span class="text-danger">* </span> Manipulating the Document Object Model (DOM) for dynamic web content<br>
                                                        <span class="text-danger">* </span> Working with JavaScript objects, arrays, and functions<br>
                                                        <span class="text-danger">* </span> Implementing asynchronous JavaScript using callbacks, promises, or async/await<br>
                                                        <span class="text-danger">* </span> Retrieving and displaying JSON data from APIs using JavaScript<br>
                                                        <br><br>
                                                    </div>
                                                    <!-- details 4  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            4. PHP
                                                        </div>
                                                        <span class="text-danger">* </span> PHP syntax, variables, data types, and operators <br>
                                                        <span class="text-danger">* </span> Working with arrays and control structures (if-else, switch, loops) in PHP <br>
                                                        <span class="text-danger">* </span>  Understanding and implementing PHP functions for code organization and reusability <br>
                                                        <span class="text-danger">* </span>  Handling and processing form data in PHP <br>
                                                        <span class="text-danger">* </span> PHP sessions and cookies for user authentication and data persistence <br>
                                                        <br><br>
                                                    </div>
                                                    <!-- details 5  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            5. MySql
                                                        </div>
                                                        <span class="text-danger">* </span> Creating and managing MySQL databases and tables <br>
                                                        <span class="text-danger">* </span> CRUD operations (Create, Read, Update, Delete) in MySQL <br>
                                                        <span class="text-danger">* </span> Writing SQL queries for data retrieval (SELECT), data insertion (INSERT), data update (UPDATE), and data deletion (DELETE) <br>
                                                        <span class="text-danger">* </span> Understanding MySQL data types and database normalization <br>
                                                        <span class="text-danger">* </span> Working with MySQL joins to retrieve data from multiple tables <br>
                                                        <br><br>
                                                    </div>
                                                    <!-- details 6  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            6. PHP and MySQL Integration
                                                        </div>
                                                        <span class="text-danger">* </span> Connecting PHP to MySQL database <br>
                                                        <span class="text-danger">* </span> Executing SQL queries from PHP and handling query results <br>
                                                        <span class="text-danger">* </span> Fetching and displaying data retrieved from MySQL using PHP <br>
                                                        <span class="text-danger">* </span> Inserting, updating, and deleting data in MySQL using PHP <br>
                                                        <span class="text-danger">* </span> Secure handling of form data validation and processing using PHP and MySQL <br>
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
                                            The evaluation assesses students' ability to demonstrate correct usage of HTML tags and elements to structure web 
                                            content, create links, images, and multimedia elements on web pages, understand HTML forms and form elements for user 
                                            input, implement semantic HTML for improved accessibility and SEO, and utilize HTML5 features and attributes 
                                            appropriately.
                                        </div>
                                        <br>
                                        <!-- evaluation 1  -->
                                        <div style="margin-left: 3%;">
                                            <strong>2. CSS </strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            The evaluation assesses students' ability to accurately implement CSS styles and classes for element styling, 
                                            correctly use CSS properties for text formatting and layout design, demonstrate an understanding of the CSS box 
                                            model and its impact on element sizing, apply CSS positioning and layout techniques (float, flexbox, grid), and 
                                            utilize CSS media queries for responsive design.
                                        </div>
                                        <br>
                                        <!-- evaluation 1  -->
                                        <div style="margin-left: 3%;">
                                            <strong>3. JS </strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            The evaluation assesses students' ability to demonstrate correct syntax and usage of JavaScript variables, data 
                                            types, and operators, proficiency in control structures (if-else, switch) and loops (for, while) in JavaScript, 
                                            handling and responding to user events (click, input, mouse events) using JavaScript, manipulation of the Document
                                            Object Model (DOM) for dynamic web content, and working with JavaScript objects, arrays, and functions for data 
                                            management.
                                        </div>
                                        <br>
                                        <!-- evaluation 1  -->
                                        <div style="margin-left: 3%;">
                                            <strong>4. PHP/MySQL </strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            The evaluation assesses students' ability to establish a successful connection between PHP and MySQL database, 
                                            execute SQL queries from PHP and handle query results, fetch and display data retrieved from MySQL using PHP, perform 
                                            proper insertion, updating, and deletion of data in MySQL using PHP, and securely handle form data validation and 
                                            processing using PHP and MySQL.
                                        </div>
                                        <br>
                                    </div>

                                    <div class="mt-5"></div>
                                    
                                    <!-- table  -->
                                    <table data-aos="fade-up" >
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                            <tr>
                                                <th scope="col">Exam Name</th>
                                                <td>Exam WDV-105</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Pre-requisites</th>
                                                <td>WDV-101 - WDV-104</td>
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