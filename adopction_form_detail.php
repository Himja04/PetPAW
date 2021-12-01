<!doctype html>
<html lang="en">
   <?php include('include/headerscript.php'); ?>
   <body>
      <?php include('include/header.php'); 
         $pets_id = $_REQUEST['pets_id'];
         
          $select = "SELECT * FROM pets WHERE pets_id = '$pets_id'";
          $run = mysqli_query($conn,$select);
         
          while ($data = mysqli_fetch_array($run)) 
          {
              $pets_image = $data['pets_image'];
              $pets_name = $data['pets_name']; 
              $pets_description = $data['pets_description'];    
          }
         
         
         
         
         if (isset($_REQUEST['submit_btn'])) 
         {
              $pet_name = $_REQUEST['pet_name'];
              $name = $_REQUEST['name'];
              $email = $_REQUEST['email'];
              $ap_date = $_REQUEST['ap_date'];
              $phone = $_REQUEST['phone'];
              $gender = $_REQUEST['gender'];
              $age = $_REQUEST['age'];
              $location = $_REQUEST['location'];
              $city = $_REQUEST['city'];
              $area = $_REQUEST['area'];
              $comment = $_REQUEST['comment'];
         
         
              $insert = "INSERT INTO adopction(pet_name,name,email,ad_date,phone,gender,age,location,city,area,message) VALUES('$pet_name','$name','$email','$ap_date','$phone','$gender','$age','$location','$city','$area','$comment')";
              $run = mysqli_query($conn,$insert);
         
              if ($run) 
              {
                  $_SESSION['status'] = "adoption1";
              }
         
         
         }
         
         ?>
      <!-- Main Body Content Start -->
      <main id="body-content" style="    background-image: url(assets/images/adoption.jpg);">
         <section class="wide-tb-100 pb-0">
            <div class="container">
               <div class="row">

               <div class="row">
                    <div class="col-md-8 mb-0">
                        <div class="checkout-details">
                            <h2 class="fw-7 txt-blue">Adoption Form</h2>
                            <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-4 mb-0">
                                    <div class="form-group">
                                        <label for="name">Pet name <span class="text-danger">*</span></label>
                                        <input type="text" name="pet_name" class="form-control" placeholder="Pet Name" required="">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-0">
                                    <div class="form-group">
                                        <label for="lastname">Your name <span class="text-danger">*</span></label>
                                        <input type="text" name="name"  class="form-control" placeholder="Your Name" required="">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-0">
                                    <div class="form-group">
                                        <label for="Company_name">Email</label>
                                        <input type="email" name="email"  class="form-control" placeholder="Your Email" required="" data-msg="This field is required.">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-0">
                                    <div class="form-group">
                                        <label for="Street_address">Date <span class="text-danger">*</span></label>
                                        <input type="datetime-local" id="meeting-time"  name="ap_date"  data-msg="This field is required." class="form-control" placeholder="date" required="">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-0">
                                    <div class="form-group">
                                        <label for="Town_City">Phone No. <span class="text-danger">*</span></label>
                                        <input type="number" name="phone" id="phone"  class="form-control" placeholder="Phone Number" required="" data-msg="This field is required.">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-0">
                                    <div class="form-group">
                                        <label for="Country_Region">Gender <span class="text-danger">*</span></label>
                                        <input type="text" name="gender"  class="form-control" placeholder="Gender" required="" data-msg="This field is required.">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-0">
                                    <div class="form-group">
                                        <label for="Postcode">Pet Age <span class="text-danger"></span></label>
                                        <input type="number" name="age"  class="form-control" placeholder="Pet Age" data-msg="This field is required.">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-0">
                                    <div class="form-group">
                                        <label for="Email_address">City <span class="text-danger">*</span></label>
                                        <input type="text" name="city"  class="form-control" placeholder="City" required="" data-msg="This field is required.">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-0">
                                    <div class="form-group">
                                        <label for="Phone">province  <span class="text-danger">*</span></label>
                                        <input type="text" name="location"  class="form-control" placeholder="province " required="" data-msg="This field is required.">
                                    </div>
                                </div>

                                
                                <div class="col-md-4 mb-0">
                                    <div class="form-group">
                                        <label for="Email_address">Postal code <span class="text-danger"></span></label>
                                        <input type="text" name="area" class="form-control" placeholder="postal code"  data-msg="This field is required.">
                                    </div>
                                </div>
                               
                               
                                <div class="col-md-12 mb-0">
                                    <div class="">
                                        <label for="Order_notes">Message</label>
                                        <textarea name="comment"  class="form-control" rows="6" placeholder="Message"  data-msg="This field is required."></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="submit" name="submit_btn" class="btn-theme bg-orange btn-shadow btn-block text-capitalize mt-30">Find Pet Sitter</button>


                              </form>

                              <a class="btn-theme bg-primary btn-shadow btn-block text-capitalize mt-30 text-center" href="https://www.paypal.com/in/home">Paypal</a>   


                        </div>
                    </div>
                  
                </div>
                
                     
                  </div>
               </div>
            </div>
         </section>
      </main>
      <?php include('include/footer.php'); ?>
      <?php include('include/footerscript.php'); ?>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <?php 
         if (isset($_SESSION['status'])) 
         {
            $status = $_SESSION['status'];
         
         
            if ($status == "adoption1") 
            {
                ?>
      <script>
         swal({
             title: "Thank you for contacting us! We Will get back to you soon ",
               text: "",
               icon: "success",
               button: "Ok",
             }).then(function(){
                 window.location='index.php';
             });
      </script>
      <?php
         }
         
         unset($_SESSION['status']);
         
         }
         ?>
   </body>
   
</html>