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

                    if($type == 'web_level_1')
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
                                                    <a href="enroll_web_dev.php?type=<?php echo $type ?>" type="button" class="btn btn-warning scrollto">Enroll now</a>
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
                                        <p style="color: #00008b;">HTML, CSS, and JavaScript</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/rna/level 1.webp" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">LEVEL 1</span> 
                                                <span class="idd"> HTML, CSS, and JavaScript</span>
                                               
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <div class="col-md-12 mb-5">
                                                    <br>
                                                    HTML (Hypertext Markup Language) is the standard markup language used to create the structure and content of web pages. It uses tags to define elements such as headings, paragraphs, lists, images, tables, and more. HTML provides the foundation for organizing and presenting information on the web.
                                                    CSS (Cascading Style Sheets) is a styling language that works in conjunction with HTML. It allows developers to control the visual appearance of web pages. With CSS, you can specify colors, fonts, spacing, borders, backgrounds, and other stylistic properties. It provides a way to separate the presentation of a web page from its structure, making it easier to maintain and update the design across multiple pages.
                                                    JavaScript is a versatile scripting language that adds interactivity to web pages. It enables dynamic behavior and functionality, such as form validation, interactive maps, image sliders, and much more. JavaScript can manipulate HTML elements, respond to user actions, handle events, and interact with servers to fetch data asynchronously, making web pages more engaging and responsive.
                                                    By combining HTML, CSS, and JavaScript, developers can create rich and interactive web experiences. HTML provides the structure, CSS handles the visual styling, and JavaScript adds functionality and interactivity. This powerful trio forms the backbone of modern web development and is essential for creating user-friendly, visually appealing, and dynamic websites and web applications.
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
                                                            1. HTML BASICS
                                                        </div>
                                                        Understanding the syntax and structure of HTML, including tags, elements, attributes, and document 
                                                        hierarchy. Familiarity with common HTML tags like html, head, body, p, a, img, and table. 
                                                        Knowledge of creating basic web page structure and organizing content.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            2. CSS STYLING
                                                        </div>
                                                        Knowledge of CSS selectors and their usage to target HTML elements for styling. Understanding how to 
                                                        apply styles to elements using properties like colors, fonts, backgrounds, margins, and padding. 
                                                        Ability to create and use CSS classes and IDs, and familiarity with CSS box model concepts.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 3  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            3. CSS LAYOUTS
                                                        </div>
                                                        Understanding CSS layout techniques, including using floats, positioning, and CSS grid. Knowledge of 
                                                        creating responsive designs using media queries and understanding the concept of mobile-first design. 
                                                        Familiarity with flexbox for creating flexible and responsive layouts.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 4  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            4. JAVASCRIPT FUNDAMENTALS
                                                        </div>
                                                        Understanding JavaScript syntax, variables, data types, and operators. Knowledge of control structures 
                                                        such as conditional statements (if, else, switch) and loops (for, while). Ability to write functions and
                                                        work with arrays and objects. Understanding event handling and DOM manipulation.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 5  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            5. DOM MANIPULATION
                                                        </div>
                                                        Knowledge of accessing and manipulating HTML elements using JavaScript. Understanding how to traverse
                                                        the DOM, modify element properties, create new elements, and handle events. Familiarity with common DOM 
                                                        methods and properties.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 6  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            6. JAVASCRIPT EVENTS
                                                        </div>
                                                        The objective of this is to test the candidate’s understanding of comparison operators 
                                                        and their ability to use if-else statements to control the flow of a program based on 
                                                        certain conditions. The student should be able to write code using these concepts and 
                                                        should be able to debug and resolve errors. The goal is to ensure the student has a 
                                                        solid understanding of these fundamental concepts and can apply them to practical 
                                                        projects and applications.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 7  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            7. DEBUGGING AND ERROR HANDLING
                                                        </div>
                                                        Understanding how to use browser developer tools for debugging JavaScript code. Knowledge of common 
                                                        JavaScript errors and how to handle them using try-catch blocks and error handling techniques.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 8  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            8. PROJECT DEVELOPMENT
                                                        </div>
                                                        Ability to apply HTML, CSS, and JavaScript together to build a complete web project. Understanding how 
                                                        to structure a project, organize files, and implement interactivity and styling. Familiarity with best 
                                                        practices for code organization, performance optimization, and cross-browser compatibility.
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
                                            <strong>1. HTML (%)</strong>
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
                                            <strong>2. CSS (%)</strong>
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
                                            <strong>3. JAVASCRIPT (%)</strong>
                                        </div>
                                        <br>
                                        <div style="margin-left: 5%;">
                                            Limited familiarity with JavaScript, struggles with syntax and basic concepts.
                                            Basic understanding of JavaScript fundamentals, can write simple scripts and handle basic interactivity.
                                            Proficient in JavaScript, capable of implementing advanced functionality, working with arrays, objects, and manipulating the DOM.
                                            Advanced JavaScript skills, proficient in using advanced concepts like closures, asynchronous programming, and working with APIs.
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