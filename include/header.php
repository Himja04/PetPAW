<b class="screen-overlay"></b>

     <header class="home-intro">
        <div class="top-bar-right d-flex align-items-center text-md-left">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col d-flex align-items-center contact-info">
                        <div>
                            <i data-feather="map-pin"></i> Street 123 - Scarborough
                        </div>
                        <div>
                            <i data-feather="mail"></i> <a href="mailto:abc@xyz.com">abc@xyz.com</a>
                        </div>
                        <div>
                            <i data-feather="smartphone"></i> <a href="tel:(123)456789">(123) 456-789</a>
                        </div>
                    </div>

                    <div class="col-md-auto">
                        <div class="social-icons">
                            <span></span>
                            <a href="#"><i data-feather="facebook"></i></a>
                            <a href="#"><i data-feather="twitter"></i></a>
                            <a href="#"><i data-feather="instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Navigation Start -->
        <nav class="navbar navbar-expand-lg header-fullpage">
            <div class="container-fluid">
                <div class="d-flex align-items-center logo-brand">
                    <a class="navbar-brand rounded-bottom light-bg" href="index.php">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                </div>
                <!-- Topbar Request Quote Start -->
                <div class="d-inline-flex order-lg-last col-auto p-0 align-items-center">
                    
                    

                    <!-- Toggle Button Start -->
                    <button class="navbar-toggler x collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Toggle Button End -->
                </div>
                <!-- Topbar Request Quote End -->

                <div class="collapse navbar-collapse" id="navbarCollapse" data-hover="dropdown"
                    data-animations="slideInUp slideInUp slideInUp slideInUp">
                    <ul class="navbar-nav mx-auto">
                          <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="aboutus.php">About Us</a>
                        </li>
                
                                 <li class="nav-item">
                                    <a class="nav-link" href="adopction.php">Adoption</a>
                                </li>
                                <!-- <li class="nav-item">
                            <a class="nav-link" href="donation.php">Donation</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="service.php" >Services </i></a>
                           
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="contactus.php">Contact</a>
                        </li>


                        <?php 
                            if (isset($_SESSION['user_id'])) 
                            {
                                ?>
                                 <li class="nav-item">
                                    <a class="btn btn-danger mt-2" href="donate.php">Donate </a>
                                </li>

                                 <li class="nav-item">
                                    <a class="btn btn-warning mt-2" href="logout.php">Logout </a>
                                </li>
                                <?php
                            }
                            else
                            {
                                ?>
                                <li class="nav-item">
                                    <a class="btn btn-warning mt-2" href="login/login.php">Donate </a>
                                </li>
                                <?php
                            }
                        ?>
                         

                         

                    </ul>
                    <!-- Main Navigation End -->
                </div>
            </div>
        </nav>        
        <!-- Main Navigation End -->
        <div class="nav-bottom">    
<a href="https://api.whatsapp.com/send?phone=+15483337457&text=Hi%21%20Thanks%20for%20contacting%20us!%20How%20Can%20we%20help%20you." class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
            <div class="circle-anime"></div>
        </div>
    </header>


