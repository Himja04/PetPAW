<?php
include('../admin/connection.php');
session_start();


if (isset($_REQUEST['enter_otp'])) 
{
          $otp=$_REQUEST['otp'];
          $ses_otp=$_SESSION['otp'];

	

            if($otp==$ses_otp)
            {


						$_SESSION['status']= "Register sucessfull";
						$_SESSION['code']= "success";
            }
            else
            {


              $_SESSION['status']= "Sorry OTP Not Match ";
               $_SESSION['code']= "error";
            
            }
}

// for register
?>

 <!DOCTYPE html>
<html lang="en">
<head>
	<title>Bizehive - Register OTP</title>
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

<style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
  
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">

			<center>
			<img src="demo.png" style="width: 100%; height: 12vh;">
			</center>

			<form class="login100-form validate-form mt-5" method="POST">
				<span class="login100-form-title p-b-37">
					Register OTP 
				</span>

				
				<div class="wrap-input100  m-b-25" >
					<input class="input100" type="Number" name="otp" placeholder="Enter OTP">
					<span class="focus-input100"></span>
				</div>

				
	
				



				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit" name="enter_otp">
						Confirm
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
    if ($status_alert == "Register sucessfull") 
    {
      ?>
              <script>
              swal({
                title: "Register Success",
                text: "",
                icon: "success",
                button: "Ok",
              
              }).then(function() {
              window.location = "../index.php";
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
              
              });
             </script>
<?php
}
unset($_SESSION['status']);
unset($_SESSION['code']);
unset($_SESSION['otp']);

}
?>


</body>
</html>