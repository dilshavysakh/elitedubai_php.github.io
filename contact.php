<?php include ('header.php'); ?>
<?php include ('connection.php'); ?>

<section id="contact" class="contact">
    <div class="container mt-5">

      <div class="section-title mb-5">
        <h2>Contact Us</h2>
      </div>

      <div class="row contact-info">

        <div class="col-md-4">
          <div class="contact-address">
            <i class="bi bi-geo-alt"></i>
            <h3>Address</h3>
            <address>Elite Limousine Service LLC <br>
            P.O Box: 125102, Dubai </address>
          </div>
        </div>

        <div class="col-md-4">
          <div class="contact-phone">
            <i class="bi bi-phone"></i>
            <h3>Phone Number</h3>
            <p><a href="tel:+971505828511">+971 50 582 8511</a></p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="contact-email">
            <i class="bi bi-envelope"></i>
            <h3>Email</h3>
            <p><a href="mailto:bookingelitelimodubai@gmail.com">bookingelitelimodubai@gmail.com</a></p>
          </div>
        </div>

      </div>
          <div class="alert alert-success mt-5 text-center" role="alert" style="display: none;" id="success">
            Thank You For Contacting Us!
          </div>
      <div class="form">
        <form action="" method="POST">
          <div class="container">
            <div class="row">
              <div class="form-group">
                <label for=""></label>
                <input type="text" class="form-control" id="" aria-describedby="" name="fullname" placeholder="Full Name" required>
                
              </div>
            </div>
            <div class="row">
              <div class="col form-group">
                <label for=""></label>
                <input type="email" class="form-control" name="email" id=""placeholder="Email" required>
              </div>
              <div class="col form-group">
                <label for=""></label>
                <input type="number" class="form-control" name="phone" id=""placeholder="Phone Number" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <label for=""></label>
                <input type="datetime-local" name="time" style="display: none;">
                <textarea class="form-control" name="msg" rows="4" placeholder="Message" required></textarea>
              </div>
            </div>
            <button type="submit" name="submit" class="btn mt-4">Submit</button>
            
          </div>
        </form>
      </div>

    </div>
  </section>

<?php


  if(isset($_POST['submit'])){

      $fullname=$_POST['fullname'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $msg=$_POST['msg'];
      
      // $mail_id="kdilsha@gmail.com";
      // $subject="msg from ".$fullname;
      // $message=$msg;
      // $message.="email".$email;
      // $message.="phone number".$phone;
      // $headers="From: ".$email;
      // mail($mail_id,$subject,$message,$headers);
     
      if(!empty($_POST["submit"])) {
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $msg=$_POST['msg'];
      
        $toEmail = "kdilsha@gmail.com";
        $mailHeaders = "From: " . $fullname . "<". $email .">\r\n";
        if(mail($toEmail, $message, $phone, $mailHeaders)) {
            $message = "Your contact information is received successfully.";
            $type = "success";
        }
      }

      $query="insert into contact_tb values(NULL,'$fullname','$email','$phone','$msg')";
      $res=mysqli_query($link,$query);
      if($res){
          ?>
          <script>
          document.getElementById("success").style.display="block";
              setTimeout(function(){window.location="index.php";},2000);
          </script>


          <?php
      }
      
      }
?>

  <?php include ('footer.php'); ?>


