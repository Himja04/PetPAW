<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include('../phpmailer/vendor/autoload.php');

include('connection.php');
session_start();

 if(isset($_REQUEST['admin_submit']))
  {
    $email = $_REQUEST['admin_email'];
   
    $select="SELECT * FROM admin WHERE email ='$email'";
    $run= mysqli_query($conn, $select);

    $rows = mysqli_num_rows($run);

    if ($rows > 0) 
    {
      
      // generate OTP
      $otp = rand(100000,999999);           
      $_SESSION['otp']=$otp;
      $_SESSION['user_email']=$email;
     
      
          
									 
					$mail = new PHPMailer();
						 
						try {
						    $toid=$email;
						    $subject="Admin | Forgot Password";
						    $mail->isSMTP();
						    $mail->Host = 'mail.bizeprint.com';  //gmail SMTP server
						    $mail->SMTPAuth = true;
						    $mail->Username = 'customer@bizeprint.com';   //username
						    $mail->Password = 'VRTechie@123';   //password
						    $mail->SMTPSecure = 'ssl';
						    $mail->Port = 465;                    //smtp port
						    $mail->setFrom('customer@bizeprint.com', 'Bizehive');
						    $mail->addAddress($toid);
						 
						 
						    $mail->isHTML(true);
						    $mail->Subject = $subject;
						     $mail->Body = '<center> <h1> Your Forgot Password OTP is <br>'.$_SESSION['otp'].' </h1> </center>';
						 
						    $mail->send();

						    $_SESSION['status']= "OTP Sent Success";
		                    $_SESSION['code']= "success";
						} 
						catch (Exception $e) 
						{
						    echo 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
						}
					
    }
    else
    {
        

        $_SESSION['status']= "Email does not Match";
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
                                    <input class="form-control" name="admin_email" type="email" required="" placeholder="Email Address">
                                </div>
                            </div>

                           
                          
                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" name="admin_submit" type="submit">Send OTP</button>
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
if ($status_alert == "OTP Sent Success") 
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
elseif ($status_alert == "Email does not Match") 
{    
?>
       <script>
          swal({
            title: "<?php echo $_SESSION['status']; ?>",
            text: "",
            icon: "<?php echo $_SESSION['code']; ?>",
            button: "Ok",
          
          }).then(function() {
          window.location = "forgot_pass.php";
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