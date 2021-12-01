
<!doctype html>
<html lang="en">

 <?php include('include/headerscript.php'); ?>
   <body>
   <?php include('include/header.php'); 


   if (isset($_REQUEST['contact_btn'])) 
   {
        $name = $_REQUEST['name'];
        $lastname = $_REQUEST['lastname'];
        $email = $_REQUEST['email'];
        $phone = $_REQUEST['phone'];
        $comment = $_REQUEST['comment'];

        $insert = "INSERT INTO contact(first_name,last_name,email,phone,message) VALUES('$name','$lastname','$email','$phone','$comment')";
        $run = mysqli_query($conn,$insert);

        if ($run) 
        {
            $_SESSION['status'] = "contact";
        }

   }
   ?>

  
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">        
        <div class="bg-navy-blue bg-fixed pos-rel breadcrumbs-page">
            <img class="ptt-png" src="assets/images/Dot-Shape.png" alt="png">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
                <h1>Contact Us</h1>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- Generally Asked Question Start -->
        <section class="wide-tb-100 pb-0">
            <div class="container">
                <section class="map-wrap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2895.097428991228!2d-80.5207677845079!3d43.47943707912772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882bf38c63ddd43b%3A0x1f0a76d2e3d25b4c!2s108%20University%20Ave%2C%20Waterloo%2C%20ON%20N2J%202W2%2C%20Canada!5e0!3m2!1sen!2sin!4v1637557054893!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </section>
            </div>
        </section>
        <!-- Generally Asked Question End -->

        <!-- Get in touch with us Start -->
        <section class="wide-tb-100 pb-0">
            <div class="container">
                <h1 class="heading-main center">
                    <small>Get in touch with us <i class="pethund_repeat_grid"></i></small>
                    <span>Make</span> Online Inquiry?
                </h1>
                <div class="row">                    
                    <div class="col-lg-8 col-md-12 mx-auto">
                        <div class="need-help">
                            <!-- <div id="sucessmessage"></div> -->
                            <form action="" method="post" >
                                <div class="row">
                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="text" name="name"  class="form-control" placeholder="First Name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="text" name="lastname"  class="form-control" placeholder="Last Name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone Number" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-0">
                                        <div class="form-group">
                                            <textarea name="comment"  class="form-control" rows="6" placeholder="Message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" id="submit" name="contact_btn" class="btn-theme bg-green mt-3 capusle">Submit Request</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Get in touch with us End -->

        <!-- Client Logos Start -->
        <section class="wide-tb-100 bg-light-gray clients-rounded-wrap need-help-topspace">
            <div class="container pos-rel">
                <div class="contact-map-img">
                    <img src="assets/images/World-Map-PNG-Picture.png" alt="">
                </div>
                <div class="row">
                    <!-- Icon Boxes Four Style -->
                    <div class="col-md-4 col-sm-6">
                        <div class="icon-box-4 h-100">
                            <i data-feather="map-pin"></i>
                            <h3>Visit Us</h3>
                            <div>Morningview Lane Artland VDf Latimer,</div>
                        </div>
                    </div>
                    <!-- Icon Boxes Four Style -->

                    <!-- Icon Boxes Four Style -->
                    <div class="col-md-4 col-sm-6">
                        <div class="icon-box-4 h-100">
                            <i data-feather="phone"></i>
                            <h3>Phone Us</h3>
                            <div>+0123 456 789 <br>+12312215</div>
                        </div>
                    </div>
                    <!-- Icon Boxes Four Style -->

                    <!-- Icon Boxes Four Style -->
                    <div class="col-md-4 col-sm-6 mx-auto">
                        <div class="icon-box-4 h-100">
                            <i data-feather="mail"></i>
                            <h3>Mail Us</h3>
                            <div><a href="mailto:support@demo.com">support@demo.com</a></div>
                            <div><a href="mailto:help@demo.com">help@demo.com</a></div>
                        </div>
                    </div>
                    <!-- Icon Boxes Four Style -->
                </div>
            </div>
        </section>
        <!-- Client Logos End -->

    </main>

    <?php include('include/footer.php'); ?>
         <?php include('include/footerscript.php'); ?>


         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


         <?php 

         if (isset($_SESSION['status'])) 
         {
            $status = $_SESSION['status'];


            if ($status == "contact") 
            {
                ?>
                        <script>
                            swal({
                                title: "Thank you for contacting us! We Will get back to you soon ",
                                  text: "",
                                  icon: "success",
                                  button: "Ok",
                                }).then(function(){
                                    window.location='contactus.php';
                                });
                        </script>
                <?php
            }

            unset($_SESSION['status']);

         }
         ?>

</body>
</html>