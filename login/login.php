<?php
include('../admin/connection.php');
session_start();



// for login

if (isset($_REQUEST['login_btn'])) 
{
    $form_email = $_REQUEST['username'];
    $form_user_password = $_REQUEST['pass'];
    $form_user_password = md5($form_user_password);


    $select="SELECT * FROM user WHERE email='$form_email'";
    $run= mysqli_query($conn, $select);

    while ($data = mysqli_fetch_array($run)) 
    {
      $email = $data['email'];
       $user_id = $data['user_id'];
      $password = $data['password'];
    } 




    if ($form_email == $email) 
    {

    	if ($form_user_password == $password) 
    	{
		    	$_SESSION['user_id']=$user_id;
		                    
		        $_SESSION['status']= "Login Success";
		        $_SESSION['code']= "success";
    	}
    	else
    	{
    			$_SESSION['status']= "Login Failed";
        		$_SESSION['code']= "error";
    	}

        
        
    }
    else 
    {
    
    	 $_SESSION['status']= "Login Failed";
        $_SESSION['code']= "error";

    }







}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('../assets/images/adoption.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">

			<!-- <center>
			<img src="demo.png" style="width: 100%; height: 12vh;">
			</center> -->

			<form class="login100-form validate-form mt-5" method="POST">
				<span class="login100-form-title p-b-37">
					Login
				</span>

				<div class="wrap-input100 m-b-20">
					<input class="input100" type="text" name="username" placeholder="Email" required="">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 m-b-25">
					<input class="input100" type="password" name="pass" placeholder="Password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit" name="login_btn">
						LogIn
					</button>
				</div>

			

				<div class="flex-c p-b-112">
			
				</div>

				<div class="text-center">
				<!-- 	<a href="forgot_pass.php" class="txt2 hov1">
						Forgot Password
					</a> -->
					<br>
					<a href="register.php" class="txt2 hov1">
						Don't Have Account ??
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

if ($status_alert == "Login Success") 
{    
?>
       <script>
          swal({
            title: "<?php echo $_SESSION['status']; ?>",
            text: "",
            icon: "<?php echo $_SESSION['code']; ?>",
            button: "Ok",
          
          }).then(function() {
          window.location = "../index.php";
          });
         </script>
<?php
}
elseif ($status_alert == "Login Failed") 
{    
?>
       <script>
          swal({
            title: "<?php echo $_SESSION['status']; ?>",
            text: "",
            icon: "<?php echo $_SESSION['code']; ?>",
            button: "Ok",
          
          }).then(function() {
          window.location = "login.php";
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