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
            if (isset($_GET['type'])) {
                $type = $_GET['type'];

                if ($type == 'linux') {
                    ?>
                    <!-- ======= linux1 Section ======= -->
                    <section id="hero">
                        <div class="container">
                            <div class="flex justify-content-center">
                                <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                    <div data-aos="zoom-out">
                                        <h1 class="text-center text-lg-center">
                                            Linux Institute Certifications In <br>
                                            <strong class="text-warning">Linux Essentials</strong>
                                        </h1>
                                        <div class="text-center text-lg-center">
                                            <a href="enroll_rna.php?type=linux" type="button"
                                                class="btn btn-warning scrollto">Enroll now</a>
                                        </div>
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

                    <!-- ======= linux1 Section ======= -->
                    <section id="certificate" class="certificate">
                        <div class="container">

                            <div class="section-title" data-aos="fade-up">
                                <h2 class="text-secondary">Certifications</h2>
                                <p style="color: #00008b;">Linux Essentials Certifications</p>
                            </div>

                            <div class="container">
                                <div class="card p-4" data-aos="fade-up">
                                    <div class="image d-flex flex-column justify-content-center align-items-center">
                                        <!-- img here  -->
                                        <img src="assets/img/certificates/linux/linux.webp" height="200" width="200" />
                                        <!-- title here  -->
                                        <span class="name">LINUX ESSENTIALS</span>

                                        <!-- details here  -->
                                        <div class="row mt-3">
                                            <div class="col-md-12 mb-5">
                                                <p>
                                                    Show potential employers that you have the fundamental skills needed for
                                                    your next position or promotion.
                                                </p>
                                                <p>
                                                    Linux adoption is increasing globally as individual users, government
                                                    agencies, and industries ranging from automotive to space exploration
                                                    embrace open source technologies. This expansion of open source in the
                                                    enterprise is redefining traditional information and communication
                                                    technology (ICT) job roles to require more Linux skills. Whether you're just
                                                    starting out in open source or looking for a promotion, independently
                                                    verifying your skill set can help you stand out to hiring managers or your
                                                    management team.
                                                </p>
                                                <p>
                                                    The more comprehensive and advanced Linux Professional certification track
                                                    can
                                                    be effectively introduced through the Linux Essentials certification.
                                                </p>
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
                                                Exam objectives
                                            </span>
                                        </div>
                                        <!-- details here  -->
                                        <div class="row mt-3">
                                            <!-- details 1  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    1. Linux Evolution and Popular Operating Systems
                                                </div>
                                                Knowledge of Linux development and major distributions.
                                                <br><br>
                                            </div>
                                            <!-- details 2  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    2. Major Open Source Applications
                                                </div>

                                                Awareness of major applications as well as their uses and development.
                                                <br><br>
                                            </div>
                                            <!-- details 3  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    3. Open Source Software and Licensing
                                                </div>
                                                Open communities and licensing Open Source Software for business.
                                                <br><br>
                                            </div>
                                            <!-- details 4  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    4. ICT Skills and Working in Linux
                                                </div>

                                                Basic Information and Communication Technology (ICT) skills and working in
                                                Linux.
                                                <br><br>
                                            </div>
                                            <!-- details 5  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    5. Command Line Basics
                                                </div>

                                                Basic Information and Communication Technology (ICT) skills and working in
                                                Linux.
                                                <br><br>
                                            </div>
                                            <!-- details 6  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    6. Using the Command Line to Get Help
                                                </div>
                                                Running help commands and navigation of the various help systems.
                                                <br><br>
                                            </div>
                                            <!-- details 7  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    7. Using Directories and Listing Files
                                                </div>
                                                Navigation of home and system directories and listing files in various
                                                locations.
                                                <br><br>
                                            </div>
                                            <!-- details 8  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    8. Creating, Moving and Deleting Files
                                                </div>

                                                Create, move and delete files and directories under the home directory.
                                                <br><br>
                                            </div>
                                            <!-- details 9  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    9. Archiving Files on the Command Line
                                                </div>
                                                Archiving files in the user home directory.
                                                <br><br>
                                            </div>
                                            <!-- details 10  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    10. Searching and Extracting Data from Files
                                                </div>
                                                Search and extract data from files in the home directory.
                                                <br><br>
                                            </div>
                                            <!-- details 11  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    11. Turning Commands into a Script
                                                </div>
                                                Turning repetitive commands into simple scripts.
                                                <br><br>
                                            </div>
                                            <!-- details 12  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    12. Choosing an Operating System
                                                </div>
                                                Knowledge of major operating systems and Linux distributions.
                                                <br><br>
                                            </div>
                                            <!-- details 13  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    13. Understanding Computer Hardware
                                                </div>
                                                Familiarity with the components that go into building desktop and server
                                                computers.
                                                <br><br>
                                            </div>
                                            <!-- details 14  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    14. Where Data is Stored
                                                </div>
                                                Where various types of information are stored on a Linux system.
                                                <br><br>
                                            </div>
                                            <!-- details 15  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    15. Your Computer on the Network
                                                </div>
                                                Querying vital networking configuration and determining the basic requirements
                                                for a computer on a Local Area Network (LAN).
                                                <br><br>
                                            </div>
                                            <!-- details 16  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    16. Basic Security and Identifying User Types
                                                </div>

                                                Various types of users on a Linux system.
                                                <br><br>
                                            </div>
                                            <!-- details 17  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    17. Creating Users and Groups
                                                </div>
                                                Creating users and groups on a Linux system.
                                                <br><br>
                                            </div>
                                            <!-- details 17  -->
                                            <div class="col-md-6 mb-3">
                                                <div class="fw-bold" style="color: #00008b;">
                                                    18. Managing File Permissions and Ownership
                                                </div>
                                                Understanding and manipulating file permissions and ownership settings.
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- HOW TO EVALUATE details  -->
                            <div class="container mt-5" data-aos="fade-up">
                                <span class="head_title">
                                    To receive the Linux Essentials certificate the candidate must:
                                </span>
                                <br><br>
                                <!-- evaluation 1  -->
                                <br>
                                <div style="margin-left: 5%;">
                                    <strong>1.</strong> Be familiar with the Linux and open source communities and the most
                                    widely used open source applications;
                                </div>
                                <br>
                                <!-- evaluation 2  -->
                                <br>
                                <div style="margin-left: 5%;">
                                    <strong>2.</strong>Have a basic understanding of the Linux operating system and the
                                    technical know-how necessary to operate on the Linux command line; and
                                </div>
                                <br>
                                <!-- evaluation 3  -->
                                <br>
                                <div style="margin-left: 5%;">
                                    <strong>3.</strong> Have a fundamental understanding of security and management-related
                                    topics, such as user and group management, using the command line, and permissions.
                                </div>
                            </div>

                            <div class="mt-5"></div>
                            <table data-aos="fade-up">
                                <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                <tr>
                                    <th scope="col">Exam Name</th>
                                    <td>Exam 010-160</td>
                                </tr>
                                <tr>
                                    <th scope="col">Pre-requisites</th>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <th scope="col">requirements</th>
                                    <td>
                                        Pass the Linux Essentials Exam
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Exam format</th>
                                    <td>40 questions and must be completed within 60 minutes</td>
                                </tr>
                                <tr>
                                    <th scope="col">Type of Question</th>
                                    <td>Multiple Choice</td>
                                </tr>
                                <tr>
                                    <th scope="col">Languages</th>
                                    <td>English</td>
                                </tr>
                            </table>
                        </div>
                    </section>
                    <!-- End linux1 Section -->

                    <?php
                } else
                    if ($type == 'security') {
                        ?>
                        <!-- ======= linux2 Section ======= -->
                        <section id="hero">
                            <div class="container">
                                <div class="flex justify-content-center">
                                    <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                        <div data-aos="zoom-out">
                                            <h1 class="text-center text-lg-center">
                                                Linux Institute Certifications In<br>
                                                <strong class="text-warning">Linux Security Essentials</strong>
                                            </h1>
                                            <div class="text-center text-lg-center">
                                                <a href="enroll_rna.php?type=security" type="button"
                                                    class="btn btn-warning scrollto">Enroll now</a>
                                            </div>
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

                        <!-- ======= linux1 Section ======= -->
                        <section id="certificate" class="certificate">
                            <div class="container">

                                <div class="section-title" data-aos="fade-up">
                                    <h2 class="text-secondary">Certifications</h2>
                                    <p style="color: #00008b;">Linux Security Essentials Certifications</p>
                                </div>

                                <div class="container">
                                    <div class="card p-4" data-aos="fade-up">
                                        <div class="image d-flex flex-column justify-content-center align-items-center">
                                            <!-- img here  -->
                                            <img src="assets/img/certificates/linux/security.webp" height="200" width="200" />
                                            <!-- title here  -->
                                            <span class="name">SECURITY ESSENTIALS</span>
                                            <br>

                                            <!-- details here  -->
                                            <div class="row mt-3">
                                                <div class="col-md-12 mb-5">
                                                    <p>
                                                        Learn how to protect your data and reputation
                                                    </p>
                                                    <div>
                                                        <p>
                                                            In today's digital world, IT security is absolutely essential for both
                                                            individuals and organizations. For the responsible use of information
                                                            technology,a fundamental skill is the general ability to protect data,
                                                            devices, and networks.Learning how to protect yourself and showcasing
                                                            your knowledge and experience to prospective employers and clients can
                                                            both
                                                            be done by earning the Linux Professional Institute Security Essentials
                                                            certificate.
                                                        </p>
                                                    </div>
                                                    <br>
                                                    <p>
                                                        The Security Essentials exam covers the fundamentals of all significant IT
                                                        security areas. The certificate is designed for individuals who want to gain
                                                        a
                                                        fundamental understanding of how to use information technology safely as
                                                        well as
                                                        for students who have taken their first course in IT security. It is also
                                                        intended for all employees of organizations who wish to improve their IT
                                                        security.
                                                    </p>
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
                                                    Exam objectives
                                                </span>
                                            </div>
                                            <!-- details here  -->
                                            <div class="row mt-3">
                                                <!-- details 1  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        1. Goals, Roles and Actors
                                                    </div>
                                                    The candidate should understand the importance of IT security. This includes
                                                    understanding of essential security goals as well as understanding various
                                                    actors and roles in the field of IT security.
                                                    <br><br>
                                                </div>
                                                <!-- details 2  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        2. Risk Assessment and Management
                                                    </div>

                                                    The candidate should understand how to find and interpret relevant security
                                                    information. This includes understanding the risk of a security vulnerability
                                                    and determining the need and urgency for a reaction.
                                                    <br><br>
                                                </div>
                                                <!-- details 3  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        3.Ethical Behavior
                                                    </div>
                                                    The candidate should understand the technical, financial, and legal implications
                                                    of their behavior when using digital infrastructure. This includes understanding
                                                    the potential harm caused by using security tools. Furthermore, the candidate
                                                    should understand common concepts in copyright and privacy laws.
                                                    <br><br>
                                                </div>
                                                <!-- details 4  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        4.Cryptography and Public Key Infrastructure
                                                    </div>

                                                    The candidate should understand the concepts of symmetric and asymmetric
                                                    encryption as well as other types of commonly used cryptographic algorithms.
                                                    Furthermore, the candidate should understand how digital certificates are used
                                                    to associate cryptographic keys with individual persons and organizations.
                                                    <br><br>
                                                </div>
                                                <!-- details 5  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        5. Web Encryption
                                                    </div>

                                                    The candidate should understand the concepts of HTTPS. This includes verifying
                                                    the identity of web servers and understanding common browser error messages
                                                    related to security.
                                                    <br><br>
                                                </div>
                                                <!-- details 6  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        6. Email Encryption
                                                    </div>

                                                    The candidate should understand the concepts of OpenPGP and S/MIME for email
                                                    encryption. This includes handling OpenPGP keys and S/MIME certificates as well
                                                    as sending and receiving encrypted emails.
                                                    <br><br>
                                                </div>
                                                <!-- details 7  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        7.Data Storage Encryption
                                                    </div>
                                                    The candidate should understand the concepts of file encryption and storage
                                                    device encryption. Furthermore, the candidate should be able to encrypt data
                                                    stored on local storage devices and in the cloud.
                                                    <br><br>
                                                </div>
                                                <!-- details 8  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        8. Hardware Security
                                                    </div>

                                                    The candidate should understand security aspects of hardware. This includes
                                                    understanding the various types of computer devices as well as their major
                                                    components. Furthermore, the candidate should understand the security
                                                    implications of various devices that interact with a computer as well as the
                                                    security implications of physical access to a device.

                                                    <br><br>
                                                </div>
                                                <!-- details 9  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        9. Application Security
                                                    </div>
                                                    The candidate should understand the security aspects of software. This includes
                                                    securely installing software, managing software updates, and protecting software
                                                    from unintended network connections.
                                                    <br><br>
                                                </div>
                                                <!-- details 10  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        10. Malware
                                                    </div>
                                                    The candidate should understand the various types of malware. This includes
                                                    understanding of how they are installed on a device, what effects they cause,
                                                    and how to protect against malware.
                                                    <br><br>
                                                </div>
                                                <!-- details 11  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        11. Data Availability
                                                    </div>
                                                    The candidate should understand how to ensure the availability of their data.
                                                    This includes storing data on appropriate devices and services as well as
                                                    creating backups.
                                                    <br><br>
                                                </div>
                                                <!-- details 12  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        12. Networks, Network Services and the Internet
                                                    </div>
                                                    The candidate should understand the concepts of computer networks and the
                                                    Internet. This includes basic knowledge of various network media types,
                                                    addressing, routing, and packet forwarding as well as understanding of the most
                                                    important protocols used in the Internet.
                                                    <br><br>
                                                </div>
                                                <!-- details 13  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        13. Network and Internet Security
                                                    </div>
                                                    The candidate should understand common security aspects of using networks and
                                                    the Internet. This includes understanding of common security threats against
                                                    networks and networked computers, approaches for mitigation, as well as the
                                                    ability to securely connect to a wired or wireless network.
                                                    <br><br>
                                                </div>
                                                <!-- details 14  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        14. Network Encryption and Anonymity
                                                    </div>
                                                    The candidate should understand the concepts of virtual private networks (VPN).
                                                    This includes using a VPN provider to encrypt transmitted data. Candidates
                                                    should understand recognition and anonymity concepts when using the Internet as
                                                    well as anonymization tools, such as TOR.
                                                    <br><br>
                                                </div>
                                                <!-- details 15  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        15.Identity and Authentication
                                                    </div>

                                                    The candidate should understand common concepts on how to prove their identity
                                                    when using online services. This includes using a password manager, multi-factor
                                                    authentication, and single sign-on, as well as being aware of common security
                                                    threats regarding individual identities.
                                                    <br><br>
                                                </div>
                                                <!-- details 16  -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="fw-bold" style="color: #00008b;">
                                                        16. Information Confidentiality and Secure Communication
                                                    </div>

                                                    The candidate should understand how to keep confidential information secret and
                                                    ensure the confidentiality of digital communication. This includes recognizing
                                                    attempts of phishing and social engineering, as well as using secure means of
                                                    communication.
                                                    <br><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- HOW TO EVALUATE details  -->
                                <div class="container mt-5" data-aos="fade-up">
                                    <span class="head_title">
                                        To receive the Security Essentials certificate the candidate must:
                                    </span>
                                    <br><br>
                                    <!-- evaluation 1  -->
                                    <br>
                                    <div style="margin-left: 5%;">
                                        <strong>1.</strong>Be familiar with the typical security risks associated with using
                                        computers, networks, connected devices, and IT services both locally and in the cloud
                                    </div>
                                    <br>
                                    <!-- evaluation 2  -->
                                    <br>
                                    <div style="margin-left: 5%;">
                                        <strong>2.</strong>Be aware of typical safeguards against threats to their personal devices
                                        and data
                                    </div>
                                    <br>
                                    <!-- evaluation 3  -->
                                    <br>
                                    <div style="margin-left: 5%;">
                                        <strong>3.</strong> Have the ability to use encryption to safeguard data that is being
                                        stored in the cloud, on storage devices, and transferred over a network
                                    </div>
                                    <br>
                                    <!-- evaluation 4  -->
                                    <br>
                                    <div style="margin-left: 5%;">
                                        <strong>4.</strong> Know how to use standard security best practices, safeguard private
                                        data, and protect their identity; and
                                        capable of using IT services safely and taking charge of protecting their personal computing
                                        equipment, software, accounts, and online profiles.
                                    </div>
                                </div>

                                <div class="mt-5"></div>
                                <!-- table  -->
                                <table data-aos="fade-up">
                                    <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                    <tr>
                                        <th scope="col">Exam Name</th>
                                        <td>Exam 020-100</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Pre-requisites</th>
                                        <td>None</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">requirements</th>
                                        <td>
                                            Pass the Security Essentials Exam
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Exam format</th>
                                        <td>40 questions and must be completed within 60 minutes</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Type of Question</th>
                                        <td>Multiple Choice</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Languages</th>
                                        <td>English</td>
                                    </tr>
                                </table>

                            </div>
                        </section>
                        <!-- End linux2 Section -->
                        <?php
                    } else
                        if ($type == 'web') {
                            ?>
                            <!-- ======= linux3 Section ======= -->
                            <section id="hero">
                                <div class="container">
                                    <div class="flex justify-content-center">
                                        <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                                            <div data-aos="zoom-out">
                                                <h1 class="text-center text-lg-center">
                                                    Linux Institute Certifications In <br>
                                                    <strong class="text-warning">Web Development Essentials</strong>
                                                </h1>
                                                <div class="text-center text-lg-center">
                                                    <a href="enroll_rna.php?type=web" type="button"
                                                        class="btn btn-warning scrollto">Enroll now</a>
                                                </div>
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

                            <!-- ======= linux3 Section ======= -->
                            <section id="certificate" class="certificate">
                                <div class="container">

                                    <div class="section-title" data-aos="fade-up">
                                        <h2 class="text-secondary">Certifications</h2>
                                        <p style="color: #00008b;">Linux Web Development Essentials Certifications</p>
                                    </div>

                                    <div class="container">
                                        <div class="card p-4" data-aos="fade-up">
                                            <div class="image d-flex flex-column justify-content-center align-items-center">
                                                <!-- img here  -->
                                                <img src="assets/img/certificates/linux/web.webp" height="200" width="200" />
                                                <!-- title here  -->
                                                <span class="name">WEB DEVELOPMENT ESSENTIALS</span>
                                                <br>

                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <div class="col-md-12 mb-5">
                                                        <p>
                                                            Take Your First Steps in Web Development
                                                        </p>
                                                        <div>
                                                            <p>
                                                                The majority of contemporary software programs are created for the web.
                                                                Your first steps in software development are supported by the Web
                                                                Development Essentials program from the Linux Professional Institute
                                                                (LPI). It includes educational materials appropriate for both classroom
                                                                instruction and independent study. You receive a certificate to
                                                                demonstrate your expertise after passing the Web Development Essentials
                                                                exam.
                                                            </p>
                                                        </div>
                                                        <br>
                                                        <p>
                                                            The program's objectives cover the key facets of web development. They were
                                                            created with the intent of having everything required to implement basic web
                                                            applications. Because of this, the ideal option for practical training and
                                                            courses is Web Development Essentials of having everything required to
                                                            implement basic web applications. Because of this, the ideal option for
                                                            practical training and courses is Web Development Essentials. Candidate
                                                            self-studies provide them with all the tools they need to implement their
                                                            first projects successfully right away.
                                                        </p>
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
                                                        Exam objectives
                                                    </span>
                                                </div>
                                                <!-- details here  -->
                                                <div class="row mt-3">
                                                    <!-- details 1  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            1. Software Development Basics
                                                        </div>
                                                        The candidate should be familiar with the most essential concepts of software
                                                        development and be aware of important programming languages.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 2  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            2.Web Application Architecture
                                                        </div>
                                                        The candidate should understand common standards in web development technology
                                                        and architecture.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 3  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            3.HTTP Basics
                                                        </div>
                                                        The candidate should be familiar with the basics of HTTP. This includes
                                                        understanding HTTP headers, content types, caching, and status codes.
                                                        Furthermore, the candidate should understand the principles of cookies and their
                                                        role for session handling and be aware of advanced HTTP features.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 4  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            4.HTML Document Anatomy
                                                        </div>

                                                        The candidate should understand the anatomy and syntax of an HTML document. This
                                                        includes creating basic HTML documents.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 5  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            5. HTML Semantics and Document Hierarchy
                                                        </div>

                                                        The candidate should be able to create HTML documents with a semantic structure.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 6  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            6. HTML References and Embedded Resources
                                                        </div>
                                                        The candidate should be able to link an HTML document with other documents and
                                                        embed external content, such as images, videos and audio in an HTML document.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 7  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            7.HTML Forms
                                                        </div>
                                                        The candidate should be able to create simple HTML forms containing input
                                                        elements of various types.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 8  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            8. CSS Basics
                                                        </div>

                                                        The candidate should understand the various ways to style an HTML document using
                                                        CSS. This includes the structure and syntax of CSS rules.

                                                        <br><br>
                                                    </div>
                                                    <!-- details 9  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            9. CSS Selectors and Style Application
                                                        </div>

                                                        The candidate should be able to use selectors in CSS and understand how CSS
                                                        rules are applied to elements within an HTML document.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 10  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            10.CSS Styling
                                                        </div>
                                                        The candidate should use CSS to add simple styles to the elements of an HTML
                                                        document.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 11  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            11. CSS Box Model and Layout
                                                        </div>
                                                        The candidate should understand the CSS box model. This includes defining the
                                                        position of elements on a website. Additionally, the candidate should understand
                                                        the document flow.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 12  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            12. JavaScript Execution and Syntax
                                                        </div>
                                                        The candidate should be able to execute JavaScript files and inline code from an
                                                        HTML document and understand basic JavaScript syntax.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 13  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            13. JavaScript Data Structures
                                                        </div>

                                                        The candidate should be able to use variables in JavaScript code. This includes
                                                        understanding values and data types. Furthermore, the candidate should
                                                        understand assignment operators and type conversion and be aware of variable
                                                        scope.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 14  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            14. JavaScript Control Structures and Functions
                                                        </div>
                                                        The candidate should be able to use control structures in JavaScript code. This
                                                        includes using comparison operators. Furthermore, the candidate should be able
                                                        to write simple functions and understand function parameters and return values.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 15  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            15.JavaScript Manipulation of Website Content and Styling
                                                        </div>

                                                        The candidate should understand the HTML DOM. This includes manipulating HTML
                                                        elements and CSS properties through the DOM using JavaScript as well as using
                                                        DOM events in simple scenarios.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 16  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            16. NodeJS Basics
                                                        </div>

                                                        The candidate should understand the basics of NodeJS. This includes running a
                                                        local development server as well as understanding the concept of NPM modules.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 17  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            17.NodeJS Express Basics
                                                        </div>


                                                        The candidate should be able to create a simple dynamic website with the Express
                                                        web framework. This includes defining simple Express routes as well as serving
                                                        dynamic files through the template engine EJS.
                                                        <br><br>
                                                    </div>
                                                    <!-- details 18  -->
                                                    <div class="col-md-6 mb-3">
                                                        <div class="fw-bold" style="color: #00008b;">
                                                            18.SQL Basics
                                                        </div>

                                                        The candidate should be able to create individual tables in an SQLite database
                                                        and add, modify and delete data using SQL. Furthermore, the candidate should be
                                                        able to retrieve data from individual tables and execute SQL queries from
                                                        NodeJS. This does not include referencing or combining data between multiple
                                                        tables.
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- HOW TO EVALUATE details  -->
                                    <div class="container mt-5" data-aos="fade-up">
                                        <span class="head_title">
                                            To receive the Web Development Essentials certificate the candidate must:
                                        </span>
                                        <br><br>
                                        <!-- evaluation 1  -->
                                        <br>
                                        <div style="margin-left: 5%;">
                                            <strong>1.</strong>Know the fundamentals of software development, as well as HTML, CSS,
                                            JavaScript, Node.js, and SQL.
                                        </div>
                                    </div>

                                    <div class="mt-5"></div>
                                    <!-- table  -->
                                    <table data-aos="fade-up">
                                        <h2 style="color:#00008b;" data-aos="fade-right">Examination Details</h2>
                                        <tr>
                                            <th scope="col">Exam Name</th>
                                            <td>Exam 030-100</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Pre-requisites</th>
                                            <td>None</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">requirements</th>
                                            <td>
                                                Pass the Web Development Essentials Exam
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Exam format</th>
                                            <td>40 questions and must be completed within 60 minutes</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Type of Question</th>
                                            <td>Multiple Choice</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Languages</th>
                                            <td>English</td>
                                        </tr>
                                    </table>

                                </div>
                            </section>
                            <!-- End linux2 Section -->
                            <?php
                        } else {
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