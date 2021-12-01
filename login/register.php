<?php  

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('../admin/connection.php');

if (isset($_REQUEST['register_btn'])) 
{
	$full_name = $_REQUEST['full_name'];
	$mobile = $_REQUEST['mobile'];
	$email = $_REQUEST['email'];
	$pass = $_REQUEST['pass'];
	$encpass = md5($pass);
	$re_pass = $_REQUEST['re_pass'];






      $checkuserr="SELECT email FROM user WHERE email='$email'";
		$ddd=mysqli_query($conn,$checkuserr);
		while($r = mysqli_fetch_array($ddd))
		{
			$checkuser=$r['email'];
		}



		if (filter_var($email,FILTER_VALIDATE_EMAIL)) 
		{

				if ($email == $checkuser) 
				{

					$_SESSION['status']= "User Alredy exist";
					$_SESSION['code']= "warning";
				}
				else
				{
						if ($password == $repassword) 
						{

								$insert = "INSERT INTO user(email,password,name,phone) VALUES('$email','$encpass','$full_name','$mobile	')";
					$data = mysqli_query($conn,$insert);
					
							$_SESSION['status']= "Register sucessfull";
							$_SESSION['code']= "success";  


						}
						else
						{

						$_SESSION['status']= "Password Does not Match";
						$_SESSION['code']= "error";

						}

				}

	}
	else
	{

	$_SESSION['status']= "Invalid Email";
	$_SESSION['code']= "warning";
	}

	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	 <link rel="shortcut icon" type="image/x-icon" href="../assets/images/logo.png">
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
	
	
	<div class="container-login100" style="background-image: url('../assets/images/adoption.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">

			<!-- <center>
			<img src="demo.png" style="width: 100%; height: 12vh;">
			</center> -->

			<form class="login100-form validate-form mt-5" method="POST">
				<span class="login100-form-title p-b-37">
					Register
				</span>

				<div class="wrap-input100  m-b-20">
					<input class="input100" type="text" name="full_name" placeholder="Full Name" required="">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100  m-b-25" >
					<input class="input100" type="Number" name="mobile" placeholder="Mobile" required="">
					<span class="focus-input100"></span>
				</div>

				
				<div class="wrap-input100  m-b-20">
					<input class="input100" type="email" name="email" placeholder="Email" required="">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100  m-b-25" >
					<input class="input100" type="password" name="pass" placeholder="Password" required="">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100  m-b-25">
					<input class="input100" type="password" name="re_pass" placeholder="Re-Password" required="">
					<span class="focus-input100"></span>
				</div>


				




				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit" name="register_btn">
						Register
					</button>
				</div>

			

				<div class="flex-c p-b-112">
			
				</div>

				<div class="text-center">
					<a href="login.php" class="txt2 hov1">
					 	Already Have Account ??
					</a>
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

if ($status_alert == "User Alredy exist") 
{
  ?>
          <script>
          swal({
            title: "<?php echo $_SESSION['status']; ?>",
            text: "",
            icon: "<?php echo $_SESSION['code']; ?>",
            button: "Ok",
          
          }).then(function() {
          window.location = "register.php";
          });
         </script>
<?php
}
 elseif ($status_alert == "Register sucessfull") 
    {
      ?>
              <script>
              swal({
                title: "Register Success",
                text: "",
                icon: "success",
                button: "Ok",
              
              }).then(function() {
              window.location = "login.php";
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
          
          }).then(function() {
          window.location = "register.php";
          });
         </script>
<?php
}
elseif ($status_alert == "Invalid Email") 
{    
?>
       <script>
          swal({
            title: "<?php echo $_SESSION['status']; ?>",
            text: "",
            icon: "<?php echo $_SESSION['code']; ?>",
            button: "Ok",
          
          }).then(function() {
          window.location = "register.php";
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