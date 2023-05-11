    <?php
        if(isset($_POST['submit_contact'])) 
        {
          $name = $_POST['name'];
          $email = $_POST['email'];
          $contact = $_POST['contact'];
          $message = $_POST['message'];

          // users email ====================================================================
          //SMTP settings
          $mail = new PHPMailer\PHPMailer\PHPMailer(true);
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          // erovoutika mails 
          $mail->Username = 'erovoutikamails@gmail.com';
          // erovoutika password form gmail 
          $mail->Password = 'wycnwwgkkvdhieet';
          $mail->SMTPSecure = 'tls';
          $mail->Port = 587;
          $mail->setFrom('erovoutikamails@gmail.com', 'User Concern');
          // users email 
          $mail->addAddress($email);
          $mail->isHTML(true);
          $mail->Subject = 'User Concern';
          $mail->Body = '
          <center>
              <h1> Your concern have been submitted to <span style="color: #00008b;">erovoutikamails@gmail.com</span> </h1>
              <p class="">
              '.$message.'
              </p>
          </center>
          ';

          // erovoutika email ====================================================================
          //SMTP settings
          $mail2 = new PHPMailer\PHPMailer\PHPMailer(true);
          $mail2->isSMTP();
          $mail2->Host = 'smtp.gmail.com';
          $mail2->SMTPAuth = true;
          // erovoutika mails 
          $mail2->Username = 'erovoutikamails@gmail.com';
          // erovoutika password form gmail 
          $mail2->Password = 'wycnwwgkkvdhieet';
          $mail2->SMTPSecure = 'tls';
          $mail2->Port = 587;
          $mail2->setFrom('erovoutikamails@gmail.com', 'User Concern');
          // erovoutika email 
          $mail2->addAddress("erovoutikamails@gmail.com");
          $mail2->isHTML(true);
          $mail2->Subject = 'User Concern';
          $mail2->Body = '
          <center>
              <h1> Concern by: '.$email .'</h1>
              <h2> Name : '. $name . '</h2>
              <h2> contact : '. $contact . '</h2>
              <p>
                '.$message.'
              </p> 
          </center>
          ';

          // check if email for user and for erovoutika sent 
          if($mail->send() && $mail2->send()) 
          {
            echo '
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                Email have been successfully sent, please give as time to review it. 
            </div>
            ';
          } 
          else 
          {
            echo '
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                Email not sent, something went wrong
            </div>
            ';
          }
        }
    ?>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Let's Get In Touch!</p>
        </div>
        <div data-aos="fade-up">
          <p>Send us a messages and we will get back to you as soon as possible!</p>
        </div>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Parc House Building II, Guadalupe Nuevo, <br> Makati City , Makati, Philippines</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>erovoutika@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call: </h4>
                <p>074 423 1557 | 09653546415</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
            <!-- form starts here  -->
            <form method="post">
              <div class="row">
                <!-- name  -->
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                </div>
              </div>
              <!-- contact  -->
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
              </div>
              <!-- message  -->
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required></textarea>
              </div>
              <!-- send btn  -->
              <div class="text-center">
                <button type="submit" name="submit_contact" class="btn btn-primary mt-4">
                  Send Message
                </button>
              </div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->