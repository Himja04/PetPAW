
<?php
include('connection.php');

  if(isset($_REQUEST['login_btn']))
{ 
    $new_pass =$_REQUEST['new_pass'];
    $re_pass = $_REQUEST['re_pass'];
    $email = $_SESSION['user_email'];

    if ($new_pass == $re_pass) 
    {        
       
       $new_pass = md5($new_pass);

        $update="UPDATE admin SET password='$new_pass' WHERE email = '$email' ";
        $run = mysqli_query($conn,$update);      

        
        if($run)
        {
            unset($_SESSION['user_email']);
            unset($_SESSION['otp']);
            unset($_SESSION['reset']);


             $_SESSION['status']= "New Password Reset Success";
             $_SESSION['code']= "success";
        }
    }
    else
    {
      $_SESSION['status']= "Password Does not Match";
      $_SESSION['code']= "error";
    }
    
        
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Bizehive - Forgot Password</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../img/logo.png">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mt-0 m-b-15">
                        <a href="index.html" class="logo logo-admin"><img src="../img/logo.png" height="80" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <form class="form-horizontal m-t-20" action="" method="post">

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="new_pass" type="text" required="" placeholder="Enter New Password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="re_pass" type="text" required="" placeholder="Enter Confirm Password">
                                </div>
                            </div>

                           
                          
                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" name="login_btn" type="submit">Reset Your Password</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


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

        <!-- App js -->
        <script src="assets/js/app.js"></script>


	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
$status_alert = $_SESSION['status'];

if(isset($_SESSION['status']))
{
    if ($status_alert == "New Password Reset Success") 
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
    else
    {
    ?>
           <script>
              swal({
                title: "<?php echo $_SESSION['status']; ?>",
                text: "",
                icon: "<?php echo $_SESSION['code']; ?>",
                button: "Ok",
              
              }).then(function() {
              window.location = "forgot_reset.php";
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