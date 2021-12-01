<?php
include('../admin/connection.php');

 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

	include "../phpmailer/vendor/autoload.php";
session_start();




if (isset($_REQUEST['send_otp'])) 
{


      $email = $_REQUEST['email'];



      $select="SELECT * FROM user WHERE email ='$email'";
      $run= mysqli_query($conn, $select);
      while ($data = mysqli_fetch_array($run)) 
      {
        $user_id = $data['user_id'];
        $ck_email = $data['email'];
      
      } 

    if($ck_email == $email) // Check email
    {
    
      $user_id=$user_id;      
      $toid=$email;
      
      // generate OTP
      $otp = rand(100000,999999);           
      $_SESSION['otp']=$otp;
      $_SESSION['user_forgot']=$user_id;
      
    
      
          	include "../phpmailer/vendor/autoload.php";
									 
									$mail = new PHPMailer(true);
									 
									
									    $toid=$email;
									    $subject="Bizehive";
									    $message=" Your Forget Password OTP is : ".$_SESSION['otp'];

									    $mail->isSMTP();
									    $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
									    $mail->SMTPAuth = true;
									    $mail->Username = 'vrtechiedemo@gmail.com';   //username
									    $mail->Password = 'VRTECHIE#123';   //password
									    $mail->SMTPSecure = 'tls';
									    $mail->Port = 587;                    //smtp port
									  
									    $mail->setFrom('vrtechiedemo@gmail.com', 'Bizehive Forgot Password');
									    $mail->addAddress($toid);
									 
									    $mail->isHTML(true);
									    $mail->Subject = $subject;
									    $mail->Body = $message;
									 



								          if (!$mail->send()) {
								             $error = "Mailer Error: " . $mail->ErrorInfo;
								            ?><script>alert('<?php echo $error ?>');</script><?php
								          } 
								          else 
								          {
								      
								           $_SESSION['status']= "OTP Sent Success";
								           $_SESSION['code']= "success";
								          }
    }
    else
    {
        

        $_SESSION['status']= "Wrong! Email Address";
        $_SESSION['code']= "error";
    }

}

// for register
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bizehive - Forgot Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">

			<center>
			<img src="demo.png" style="width: 100%; height: 12vh;">
			</center>

			<form class="login100-form validate-form mt-5" method="POST">
				<span class="login100-form-title p-b-37">
					Forgot Password
				</span>

				<div class="wrap-input100  m-b-20" >
					<input class="input100" type="email" name="email" placeholder="Enter Register Email">
					<span class="focus-input100"></span>
				</div>

				

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" name="send_otp" type="submit">
						Send OTP
					</button>
				</div>

			

			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>




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
          window.location = "enter_otp.php";
          });
         </script>
<?php
}
elseif ($status_alert == "Wrong! Email Address") 
{    
?>
       <script>
          swal({
            title: "<?php echo $_SESSION['status']; ?>",
            text: "Please Enter Valid Email",
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