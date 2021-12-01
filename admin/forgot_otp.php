<?php
include('connection.php');
session_start();

 if (isset($_REQUEST['enter_otp'])) 
{
          $otp=$_REQUEST['otp'];
          $ses_otp=$_SESSION['otp'];

            if($otp == $ses_otp)
            {
              $_SESSION['reset']=$ses_otp;


               $_SESSION['status']= "OTP match Success Now Reset Password";
               $_SESSION['code']= "success";
            
            }
            else
            {


              $_SESSION['status']= "Sorry OTP Not Match ";
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
                                    <input class="form-control" name="otp" type="text" required="" placeholder="Enter OTP">
                                </div>
                            </div>

                           
                          
                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" name="enter_otp" type="submit">Confirm</button>
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
    if ($status_alert == "OTP match Success Now Reset Password") 
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
              window.location = "forgot_otp.php";
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