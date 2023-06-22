<?php 
session_start();
include "connect.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/learn_style.css">
  <link rel="stylesheet" href="assets/css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha383-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha383-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp3YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/24d5cf3efd.js" crossorigin="anonymous"></script>
  <title>Tutorial</title>

  <?php include "include/head_links.php"; ?>

</head>

<body>
  <!-- Navigation Bar -->
  <!-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#0F3695">
        <div class="container-fluid">
            <a href="#" class="brand"><img src="images/ero-logo-white.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav> -->
  <?php include __DIR__ . "/include/navbar.php" ?>
  
    
  <?php include __DIR__ . "/include/hero.php" ?>

  <!-- <div class="banner" style="position: relative; overflow: hidden;">
    <img src="/assets/img/learn/web_banner-transformed.webp" alt="" style="position: absolute; width: 100%; object-fit: fill; background-repeat: no-repeat; z-index: 0;">
    <div class="banner-text" style="z-index: 10">
      <h1>E-CERTIFICATION LESSONS</h1>
      <h3>Learn To Code</h3>
    </div>
  </div> -->



  <div class="card-container mb-5">
    <div class="row pt-5 ml-5 mr-5">

      <span class="certificate-header">FRONT-END DEVELOPMENT BASICS</span>

      <div class="col-md-6 col-lg-4 pb-5">

        <div class="card card-custom bg-white border-white border-0 ">
          <div class="card-custom-img  position-relative overflow-hidden" style="">
           <img class="img-fluid position-absolute" src="assets/img/learn/tutorial_bgnew.png" alt="tutorial_card_cover" style="object-fit: fill; z-index: 0; top: -36px;">
           <p class="position-absolute text-white" style="top: 10px; right: .90rem; z-index: 10">11 Lectures</p>
          </div>
          <div class="card-custom-avatar">
            <img class="img-fluid" src="/assets/img/learn/html_logo.png" class="logo" alt="logo" />
          </div>
          <div class="card-body" style="overflow-y: auto">
            <h4 class="card-title">HTML</h4>

          </div>
          <div class="card-footer" style="background: inherit; border-color: inherit;">
            <a href="learn_html.php" class="btn btn-primary" style="background-color: #FF8C00; border-color: inherit;">Start Learning</a>
          </div>
        </div>

      </div>

      <div class="col-md-6 col-lg-4 pb-5">

        <div class="card card-custom bg-white border-white border-0 ">
          <div class="card-custom-img  position-relative overflow-hidden" style="">
           <img class="img-fluid position-absolute" src="assets/img/learn/tutorial_bgnew.png" alt="tutorial_card_cover" style="object-fit: fill; z-index: 0; top: -36px;">
           <p class="position-absolute text-white" style="top: 10px; right: .90rem; z-index: 10">21 Lectures</p>
          </div>
          <div class="card-custom-avatar">
            <img class="img-fluid" src="/assets/img/learn/css_logo.png" class="logo" alt="logo" />
          </div>
          <div class="card-body" style="overflow-y: auto">
            <h4 class="card-title">CSS</h4>

          </div>
          <div class="card-footer" style="background: inherit; border-color: inherit;">
            <a href="learn_css.php" class="btn btn-primary" style="background-color: #FF8C00; border-color: inherit;">Start Learning</a>
          </div>
        </div>

      </div>

      <div class="col-md-6 col-lg-4 pb-5">

        <div class="card card-custom bg-white border-white border-0 ">
          <div class="card-custom-img  position-relative overflow-hidden" style="">
           <img class="img-fluid position-absolute" src="assets/img/learn/tutorial_bgnew.png" alt="tutorial_card_cover" style="object-fit: fill; z-index: 0; top: -36px;">
           <p class="position-absolute text-white" style="top: 10px; right: .90rem; z-index: 10">22 Lectures</p>
          </div>
          <div class="card-custom-avatar">
            <img class="img-fluid" src="/assets/img/learn/js_logo.png" class="logo" alt="logo" />
          </div>
          <div class="card-body" style="overflow-y: auto">
            <h4 class="card-title">JAVASCRIPT</h4>

          </div>
          <div class="card-footer" style="background: inherit; border-color: inherit;">
            <a href="learn_js.php" class="btn btn-primary" style="background-color: #FF8C00; border-color: inherit;">Start Learning</a>
          </div>
        </div>

      </div>

      
    </div>
    
    <div class="row pt-5 ml-5 mr-5">
      
      <span class="certificate-header">BACK-END DEVELOPMENT BASICS</span>
      
      <div class="col-md-6 col-lg-4 pb-5">
  
        <div class="card card-custom bg-white border-white border-0 ">
          <div class="card-custom-img  position-relative overflow-hidden" style="">
           <img class="img-fluid position-absolute" src="assets/img/learn/tutorial_bgnew.png" alt="tutorial_card_cover" style="object-fit: fill; z-index: 0; top: -36px;">
           <p class="position-absolute text-white" style="top: 10px; right: .90rem; z-index: 10">24 Lectures</p>
          </div>
          <div class="card-custom-avatar">
            <img class="img-fluid" src="/assets/img/learn/php_logo.png" class="logo" alt="logo" />
          </div>
          <div class="card-body" style="overflow-y: auto">
            <h4 class="card-title">PHP</h4>
  
          </div>
          <div class="card-footer" style="background: inherit; border-color: inherit;">
            <a href="learnphp.php" class="btn btn-primary" style="background-color: #FF8C00; border-color: inherit;">Start Learning</a>
          </div>
        </div>
  
      </div>


    </div>
  </div>
  </div>

  <?php include(__DIR__ . "/include/footer.php") ?>
  <?php include(__DIR__ . "/include/foot_links.php") ?>

</body>

</html>