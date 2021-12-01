<?php 
include('include/header.php');



$run_contact = mysqli_query($conn,"SELECT * FROM contact");
$total_contact = mysqli_num_rows($run_contact);


$run_user = mysqli_query($conn,"SELECT * FROM user");
$total_user = mysqli_num_rows($run_user);


$run_blog = mysqli_query($conn,"SELECT * FROM blog");
$total_blog = mysqli_num_rows($run_blog);
?>


                    <div class="page-content-wrapper ">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="btn-group float-right">
                                            <ol class="breadcrumb hide-phone p-0 m-0">
                                                <li class="breadcrumb-item"><a href="dashboard.php">Pet Shop</a></li>
                                                <li class="breadcrumb-item active">Dashboard</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Dashboard</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title end breadcrumb -->

                                    
                            <div class="row">
   


                            </div>
                           

                            










                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 align-self-center">
                                    <div class="card bg-white m-b-30">
                                        <div class="card-body new-user" style="height:86vh;">
                                            <h5 class="header-title mb-4 mt-0">New Contact Enquiry</h5>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-top-0" style="width:60px;">No</th>
                                                            <th class="border-top-0">First Name</th>
                                                            <th class="border-top-0">Last Name</th>
                                                            <th class="border-top-0">Email</th>
                                                            <th class="border-top-0">Phone</th>
                                                            <th class="border-top-0">Message</th>
                                                            <th class="border-top-0">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  

                                                            $select_contact = "SELECT * FROM contact ORDER BY contact_id DESC LIMIT 6";
                                                            $run_contcat = mysqli_query($conn,$select_contact);
                                                            $i = 1;
                                                            while ($data_contact = mysqli_fetch_array($run_contact)) 
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td><?php echo $data_contact['first_name']; ?></td>
                                                                    <td><?php echo $data_contact['last_name']; ?></td>
                                                                    <td><?php echo $data_contact['email']; ?></td>
                                                                    <td><?php echo $data_contact['phone']; ?></td>
                                                                    <td><?php echo $data_contact['message']; ?></td>
                                                                    <td><a href="contact_reply.php?contact_id=<?php echo $data_contact['contact_id']; ?>" class="btn btn-primary">Reply</a></td>                                   
                                                                    
                                                                </tr>

                                                                <?php
                                                                $i++;
                                                            }
                                                        ?>

                                                        
                                                        
                                                        
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                
                        </div><!-- container -->


                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <?php include('include/footer.php'); ?>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/skycons/skycons.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>
        <script src="assets/plugins/morris/morris.min.js"></script>
        
        <script src="assets/pages/dashborad.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script>
             /* BEGIN SVG WEATHER ICON */
             if (typeof Skycons !== 'undefined'){
            var icons = new Skycons(
                {"color": "#fff"},
                {"resizeClear": true}
                ),
                    list  = [
                        "clear-day", "clear-night", "partly-cloudy-day",
                        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                        "fog"
                    ],
                    i;

                for(i = list.length; i--; )
                icons.set(list[i], list[i]);
                icons.play();
            };

        // scroll

        $(document).ready(function() {
        
        $("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true});
        $("#boxscroll2").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true}); 
        
        });
        </script>

    </body>
</html>