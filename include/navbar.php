<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index.php"><img src="assets/img/logo/eira_logo.png" alt="" class="img-fluid"></a>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link scrollto" href="index.php">
                        <i class="fas fa-home"></i> &nbsp; Home
                    </a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="certificate.php">
                        <i class="fas fa-certificate"></i> &nbsp; Certifications
                    </a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="verify_certificate.php">
                        <i class="fas fa-check-double"></i> &nbsp; Verify Certificate
                    </a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="board_exam.php">
                        <i class="fas fa-chalkboard-teacher"></i> &nbsp; Board Exam Review
                    </a>
                </li>


                <?php
                if (isset($_SESSION['user_id'])) 
                {
                    ?>
                        <li><a class="nav-link scrollto" href="#contact"><i class="fas fa-phone-alt"></i>&nbsp; Contact</a></li>
                        <li>
                            <a href="profile.php">
                                <i class="fas fa-user"></i> &nbsp; Profile
                            </a>
                        </li>
                        <li>
                            <a href="logout.php" style="color: #f44336;">
                                <i class="fas fa-sign-out-alt"></i> &nbsp; Logout
                            </a>
                        </li>
                    <?php
                } 
                else 
                {
                    ?>
                        <li><a class="nav-link scrollto" href="login.php"><i class="fas fa-sign-in-alt"></i>&nbsp; Login</a></li>
                        <li><a class="nav-link scrollto" href="register.php"><i class="fas fa-user"></i>&nbsp; Register</a></li>
                        <li><a class="nav-link scrollto" href="#contact"><i class="fas fa-phone-alt"></i>&nbsp; Contact</a></li>
                    <?php
                }
                ?>


            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>

        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->