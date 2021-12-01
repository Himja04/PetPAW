<?php
include('connection.php');

// for login
if (isset($_REQUEST['login_btn'])) 
{
    $form_email = $_REQUEST['email'];
    $form_user_password = $_REQUEST['password'];


    $select="SELECT * FROM admin WHERE email='$form_email'";
    $run= mysqli_query($conn, $select);
    while ($data = mysqli_fetch_array($run)) 
    {
      $email = $data['email'];
      $password = $data['password'];
    } 


    if ($form_email == $email && $form_user_password == $password) 
    {

        $_SESSION['admin']=$email;

                    
        $_SESSION['status']= "Login Success";
        $_SESSION['code']= "success";
        
    }
    else 
    {
    
         $_SESSION['status']= "Login Failed";
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
        <title>Pet Shop | Admin</title>
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
                        <a href="../index.php" class="logo logo-admin">Log in</a>
                    </h3>

                    <div class="p-3">
                        <form class="form-horizontal m-t-20" action="" method="post">

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="email" type="email" required="" placeholder="Email Address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                </div>
                            </div>

                          
                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" name="login_btn" type="submit">Log In</button>
                                </div>
                            </div>
                        </form>
                        
                        <center> <a href="forgot_pass.php">Forgot Password</a></center>
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
          window.location = "dashboard.php";
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
          window.location = "index.php";
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