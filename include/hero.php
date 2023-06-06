<?php 
    $learn_pages = array("/learn.php", "/learn_css.php", "/learn_html.php", "/learn_js.php", "/learnphp.php");
?>
<!-- ======= Hero Section ======= -->
<section id="hero">

    <div class="container">
        <div class="flex justify-content-center">
            <div class="pt-5 pt-lg-0 order-2 order-lg-1  align-items-center">
                <?php if (in_array($_SERVER['REQUEST_URI'], $learn_pages) ): ?>
                    <div data-aos="zoom-out">
                        <h1 class="text-center text-lg-center">E-<span
                        style=" color:darkorange; border-bottom:0;">C</span>ertification <span
                        style=" color:darkorange; border-bottom:0;">L</span>essons
                    </h1>
                    <h2 class="text-center text-lg-center" style="margin-bottom:0;">Learn to Code at your own pace</h2>
                    <p class="text-center text-lg-center" style="color:darkorange; font-size:small">An early preview of the Erovoutika Self Learn Website!</p>
                </div>
                <?php else: ?>
                    <div data-aos="zoom-out">
                        <h1 class="text-center text-lg-center">Erovoutika <span
                        style=" color:darkorange; border-bottom:0;">I</span>nternational <span
                        style=" color:darkorange; border-bottom:0;">A</span>cademy
                    </h1>
                    <h2 class="text-center text-lg-center">Online Courses about Electronics, Robotics, Automation, and
                        ICT... </h2>
                    </div>
                <?php endif; ?>
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