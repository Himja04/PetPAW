
<?php include('include/header.php'); 


if (isset($_REQUEST['change_pass'])) 
{
                    $query = "SELECT * FROM admin WHERE email = '$admin' ";
                    $run2 = mysqli_query($conn,$query);

                    while($result = mysqli_fetch_array($run2)){
                    $user_pass = $result['password'];
                  
                    }

                    $c_pass = $_REQUEST['c_pass'];
                    $new_pass = $_REQUEST['new_pass'];
                    $re_pass = $_REQUEST['re_pass'];

                    $encpass = md5($new_pass);
                    $c_pass = md5($c_pass);


                    if ($user_pass == $c_pass) 
                    {
                            if ($new_pass == $re_pass) 
                            {
                                $update = "UPDATE admin SET password='$encpass' WHERE email ='$admin' ";
                                $data = mysqli_query($conn,$update); 

                                if($data) 
                                {
                                    $_SESSION['status']= "Your Password Changed";
                                    $_SESSION['code']= "success";
                                }
                            }
                            else 
                            {
                                    $_SESSION['status']= "Password Does not Match";
                                    $_SESSION['code']= "warning";
                                    }

                            } 
                    else
                    {
                        $_SESSION['status']= "invalid password";
                        $_SESSION['code']= "error";

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
                                                <li class="breadcrumb-item active">Change Password</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Change Password</h4>
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
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Current Password</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="c_pass" type="text" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="new_pass" type="text" >
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Re - Password</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="re_pass" type="text" >
                                                </div>
                                            </div>


                                                                                  
                                   
                                            


                                               <div class="form-group row mt-5">
                                                <label for="example-text-input-lg" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <input class="form-control btn btn-primary" type="Submit" name="change_pass" value="Change Password">
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

if ($status_alert == "Your Password Changed") 
{
  ?>
          <script>
          swal({
            title: "<?php echo $_SESSION['status']; ?>",
            text: "",
            icon: "<?php echo $_SESSION['code']; ?>",
            button: "Ok",
          
          }).then(function() {
          window.location = "index.php";
          });
         </script>
<?php
}

elseif ($status_alert == "Password Does not Match") 
{    
?>
       <script>
          swal({
            title: "<?php echo $_SESSION['status']; ?>",
            text: "",
            icon: "<?php echo $_SESSION['code']; ?>",
            button: "Ok",
          
          });
         </script>
<?php
}
elseif ($status_alert == "invalid password") 
{    
?>
       <script>
          swal({
            title: "<?php echo $_SESSION['status']; ?>",
            text: "",
            icon: "<?php echo $_SESSION['code']; ?>",
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