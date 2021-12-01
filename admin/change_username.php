
<?php include('include/header.php'); 

$email = $_SESSION['admin'];
if (isset($_REQUEST['change_username'])) 
{

                    $change_username = $_REQUEST['email'];



                                $update = "UPDATE admin SET email='$change_username' WHERE email ='$email' ";
                                $data = mysqli_query($conn,$update); 

                                if($data) 
                                {
                                    $_SESSION['admin'] = $change_username;
                                    $_SESSION['status']= "Your UserName Changed";
                                    $_SESSION['code']= "success";
                                }
                        
}

?>


                    <div class="page-content-wrapper ">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="btn-group float-right">
                                            <ol class="breadcrumb hide-phone p-0 m-0">
                                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                                <li class="breadcrumb-item active">Change Usernmae</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Change username</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title end breadcrumb -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
            
                                          

                                

                                            <form action="" method="POST">
                                             <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="email" type="text">
                                                </div>
                                            </div>

                                                                               


                                               <div class="form-group row mt-5">
                                                <label for="example-text-input-lg" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <input class="form-control btn btn-primary" type="Submit" name="change_username" value="Change Username">
                                                </div>
                                            </div>

                                            </form>


                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            
                           

                            

                            
      

                               

                            
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


             <!-- Dropzone js -->
        <script src="assets/plugins/dropzone/dist/dropzone.js"></script>
        <script src="assets/plugins/dropify/js/dropify.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>



              <script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>



        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
$status_alert = $_SESSION['status'];

if(isset($_SESSION['status']))
{

if ($status_alert == "Your UserName Changed") 
{
  ?>
          <script>
          swal({
            title: "<?php echo $_SESSION['status']; ?>",
            text: "",
            icon: "<?php echo $_SESSION['code']; ?>",
            button: "Ok",
          
          }).then(function() {
          window.location = "dashboard.php";
          });
         </script>
<?php
}
else
{    
?>
       <script>
          swal({
            title: "Something Went Wrong",
            text: "",
            icon: "error",
            button: "Ok",
          
          });
         </script>
<?php
}
unset($_SESSION['status']);
unset($_SESSION['code']);
}
?>

    </body>
</html>