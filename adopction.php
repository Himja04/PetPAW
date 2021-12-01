<!doctype html>
<html lang="en">

 <?php include('include/headerscript.php'); ?>
   <body>
   <?php include('include/header.php'); ?>

  
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">        
        <div class="bg-navy-blue bg-fixed pos-rel breadcrumbs-page">
            <img alt="" class="ptt-png" src="assets/images/Dot-Shape.png" alt="png">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Adoption Booking</li>
                    </ol>
                </nav>
                <h1>Adoption Booking</h1>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

    <section class="wide-tb-100" style="background:whitesmoke;">
            <div class="container">               
                <div class="row align-items-center">
                  
                    <div class="col-lg-12 mt-5 mt-lg-0">
                        <h1 class="heading-main wow fadeInDown" data-wow-duration="0" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInDown;">
                            <span>About Adoption </span> 
                        </h1>

                        <p>Making space in your life and in your home for an animal will result in a meaningful relationship that will alter both of you. Nothing compares to the amount of affection you and your pet share. We've been here since the beginning to share in your fantastic trip.</p>
                        <p>Pets which  are available for adoption, will appear on our website.</p>
                        <p>Thank you for thinking about adopting a pet. Many animals in our shelters are in desperate need of a home. Adoptable animals can be found online or by contacting animal shelters.</p>
                     </div>
                     
                </div>
                <div class="row align-items-center">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                        <a href="adopction_form_detail.php" class="btn-theme btn-long-arrow bg-navy-blue mb-3" >
                        Adoption Form Inquiry
                        </a>
                        </div>
                        <div class="col-md-4"></div>
                        
                       
                     </div>
            </div>
        </section>

    <section style="padding-top:20px;padding-bottom:20px;" id="dsfs">
        <div class="container">
    <div class="row">
    


    <?php 
        $select = "SELECT * FROM pets ORDER BY pets_id DESC";
        $run = mysqli_query($conn,$select);

        while ($data = mysqli_fetch_array($run)) 
        {
            $array =  $data['pets_image'];
            $array = explode(",", $array);
            ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="dog_detail.php?pets_id=<?php echo $data['pets_id']; ?>" class="image">

                                    <?php 
                                        $count = 0;

                                        foreach ($array as $value) 
                                        {
                                            if ($count == 0) 
                                            {
                                                ?>
                                                 <img src="admin/upload/pets/<?php echo $value; ?>" style="height: 300px; width: 100%;">
                                                <?php
                                            }

                                            $count++;
                                        }
                                    ?>
                                   

                                </a>                
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="dog_detail.php?pets_id=<?php echo $data['pets_id']; ?>"><?php echo $data['pets_name']; ?></a></h3>

                                <div class="price">
                                   
                                   </div>
                            
                            </div>
                        </div>
                    </div>


            <?php
        }
    ?>
   
   

  
</div>
</div>
    </section>

    </main>

    <?php include('include/footer.php'); ?>
         <?php include('include/footerscript.php'); ?>




         
</body>
</html>