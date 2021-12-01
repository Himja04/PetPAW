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
                $pets_image = explode(",", $pets_image);
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
      <!-- Page Breadcrumbs Start -->
      <section class="breadcrumbs-page-wrap">
         <div class="bg-navy-blue bg-fixed pos-rel breadcrumbs-page">
            <img class="ptt-png" src="assets/images/Dot-Shape.png" alt="png">
            <div class="container">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Detail</li>
                  </ol>
               </nav>
               <h1>Detal Page</h1>
            </div>
         </div>
      </section>
      <!-- Page Breadcrumbs End -->
      <!-- Main Body Content Start -->
      <main id="body-content">
          <!-- Shopping Wide Start -->
        <section class="wide-tb-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery">
                            <div class="outer">
                                <div id="big" class="owl-carousel owl-theme">
                                     <?php 

                                    foreach ($pets_image as $value) 
                                    {
                                        ?>

                                            <!-- Gallery Images Item -->
                                        <div class="item">
                                            <div class="img">
                                                <img src="admin/upload/pets/<?php echo $value; ?>" alt="" style="width: 100%; height: 40vh;">
                                            </div>
                                        </div>
                                        <!-- Gallery Images Item -->

                                        <?php
                                    }
                                  ?>
                                    
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-description">
                       
                            <h2 class="title"><?php echo $pets_name; ?></h2>
                           
                            <p><?php echo $pets_description; ?></p>

                           

                           

                            <a href="adopction_form_detail.php" class="btn-theme bg-orange btn-shadow  text-capitalize btn-shadow ml-4" >Adopction Form Detail</a>
                            
                        </div>
                    </div>
                </div>
                
             
            </div>
        </section>
      
      </main>
      <?php include('include/footer.php'); ?>
      <?php include('include/footerscript.php'); ?>

     
    <script src="assets/js/site-custom.js"></script>
  
    <script src="assets/js/product-slider.js"></script>  
     
   </body>
</html>