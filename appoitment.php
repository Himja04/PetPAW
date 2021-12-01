<!doctype html>
<html lang="en">
   <?php include('include/headerscript.php'); ?>
   <body>
      <?php include('include/header.php'); 
         if (isset($_REQUEST['btn_submit'])) 
         {
              $name = $_REQUEST['your_name'];
              $email = $_REQUEST['your_email'];
              $ap_date = $_REQUEST['ap_date'];
              $phone = $_REQUEST['your_phone'];
              $message = $_REQUEST['message'];
         
         
              $insert = "INSERT INTO booking(name,email,phone,booking_date,message) VALUES('$name','$email','$phone','$ap_date','$message')";
              $run = mysqli_query($conn,$insert);
         
              if ($run) 
              {
                  $_SESSION['status'] = "app";
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
                     <li class="breadcrumb-item active" aria-current="page">Appoitment Booking</li>
                  </ol>
               </nav>
               <h1>Appoitment Booking</h1>
            </div>
         </div>
      </section>
      <!-- Page Breadcrumbs End -->
      <!-- Main Body Content Start -->
      <main id="body-content">
         <section class="section-content-block section-secondary-bg">
            <div class="container">
               <div class="row wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                  <div class="appointment-form-wrapper light-layout  margin-bottom-24 clearfix theme-custom-no-box-shadow d-inline-flex">
                     <div class="col-4">
                        <div class="appointment-form-heading text-left">
                           <h2 class="form-title text-capitalize margin-top-24">
                              Request Booking
                           </h2>
                           <p>
                              Please fill out the booking form and very soon we will contact with you to schedule an appointment. 
                           </p>
                        </div>
                     </div>
                     <div class="col-8">
                        <form class="appoinment-form margin-top-42" action="" method="POST"  id="basic-form">
                           <div class="container">
                              <div class="row">
                                  
                               
                                 <div class="form-group col-4">
                                 <label for="name">Your Name <span class="text-danger">*</span></label>
                                    <input name="your_name" id="name" class="form-control" placeholder="Name" type="text">
                                    <small style="color: red; display: none;" id="name_mess">This field is required.</small>
                                 </div>



                                 <div class="form-group col-4">
                                    <label for="name">Email <span class="text-danger">*</span></label>
                                    <input name="your_email" class="form-control" placeholder="Email" type="email" id="email" required>
                                    <small style="color: red; display: none;" id="email_mess">This field is required.</small>
                                 </div>



                                 <div class="form-group col-4">
                                    <label for="name">Appoitment Date <span class="text-danger">*</span></label>
                                    <input type="datetime-local" id="meeting_time"
                                       name="ap_date"  data-msg="This field is required." class="form-control" placeholder="date" >

                                       <small style="color: red; display: none;" id="date_time_mess">This field is required.</small>
                                 </div>



                                 <div class="form-group col-4">
                                    <label for="name">Phone No <span class="text-danger">*</span></label>
                                    <input name="your_phone" class="form-control" id="phone" placeholder="Phone" type="text" >
                                    <small style="color: red; display: none;" id="phone_mess">This field is required.</small>
                                 </div>

                                 

                                 <div class="form-group  col-4">
                                    <label for="name">Choose Services<span class="text-danger">*</span></label>
                                    <select name="service" id="service" class="form-control wide" >
                                    <option value="">None</option>
                                       <option value="2">Pet training</option>
                                       <option value="3">pet sitting</option>
                                       <option value="4">pet grooming </option>
                                       <option value="5">pet vaccination </option>
                                       <option value="6">pet clubbing </option>
                                       <option value="7">pet healthcare</option>
                                    </select>
                                    <small style="color: red; display: none;" id="service_mess">This field is required.</small>
                                 </div>

                                 


                                 <div class="form-group  col-4">
                                    <label for="name">Available Slote<span class="text-danger">*</span></label>
                                    <select name="age" id="age" class="form-control wide" >
                                    <option value="">None</option>
                                       <option value="2">1-3</option>
                                       <option value="3">3-6</option>
                                       <option value="4">6-9</option>
                                       <option value="5">9-12</option>
                                    </select>
                                    <small style="color: red; display: none;" id="age_mess">This field is required.</small>
                                 </div>


                                 
                                 <div class="form-group col-12">
                                    <textarea name="message" id="message" class="form-control" rows="3" placeholder="Your Message..." ></textarea>
                                    <small style="color: red; display: none;" id="message_mess">This field is required.</small>
                                 </div>


                                 <div class="form-group col-12 col-sm-12 col-xs-12 text-left">
                                    <button name="btn_submit" id="submit" class="btn btn-lg btn-theme btn-square btn-theme-invert" type="submit">Get Appointment</button>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <!-- end .appointment-form-wrapper  -->
               </div>
               <!--  end .row  -->
            </div>
            <!--  end .container -->
         </section>
      </main>
      <?php include('include/footer.php'); ?>
      <?php include('include/footerscript.php'); ?>

  
   <!-- new validation code -->

<script>
 $(document).ready(function() {


   $("#submit").on("click",function(){

      var service = $("#service").val();
      var age =$("#age").val();
      var name =$("#name").val();
      var email =$("#email").val();
      var meeting_time =$("#meeting_time").val();
      var phone =$("#phone").val();
      var message =$("#message").val();



      if (name == "" && email == "" && meeting_time == "" && phone == "" && service == "" && age == "" && message == "") 
      {
         $("#name_mess").show();
         $("#email_mess").show();
         $("#date_time_mess").show();
         $("#phone_mess").show();
         $("#service_mess").show();
         $("#age_mess").show();
         $("#message_mess").show();

         return false;
      }
      if (name == "") 
      {
         $("#name_mess").show();
         return false;
      }
      else
      {
         $("#name_mess").hide();
      }

      //  if (email == "") 
      // {
      //    $("#email_mess").show();
      //    return false;
      // }
      // else
      // {
      //    $("#email_mess").hide();
 
      // }




      if (meeting_time == "") 
      {
         $("#date_time_mess").show();
         return false;
      }
      else
      {
         $("#date_time_mess").hide();
         
      }





      if (phone == "") 
      {
         $("#phone_mess").show();
         return false;
      }
      else
      {
         $("#phone_mess").hide();
      
      }




       if (service == "") 
      {
         $("#service_mess").show();
         return false;
      }
      else
      {
         $("#service_mess").hide();
      
      }



       if (age == "") 
      {
         $("#age_mess").show();
         return false;
      }
      else
      {
         $("#age_mess").hide();
      
      }




      if (message == "") 
      {
         $("#message_mess").show();
         return false;
      }
      else
      {
         $("#message_mess").hide();
      
      }


      
   });
});
</script>









      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <?php 
         if (isset($_SESSION['status'])) 
         {
            $status = $_SESSION['status'];

if ($status == "app") 
            {
                ?>
      <script>
         swal({
             title: "Thank you for contacting us! We Will get back to you soon ",
               text: "",
               icon: "success",
               button: "Ok",
             }).then(function(){
                 window.location='appoitment.php';
             });
      </script>
      <?php
         }
         
         unset($_SESSION['status']);
         
         }
         ?>
   </body>
</html>