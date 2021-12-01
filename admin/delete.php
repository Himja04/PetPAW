<?php 
include('connection.php');



if ($_REQUEST['booking_id']) 
{
    $booking_id = $_REQUEST['booking_id'];

    $delete = "DELETE FROM booking WHERE booking_id = '$booking_id'";
    $run_delete = mysqli_query($conn,$delete);

    if ($run_delete) 
    {
        $_SESSION['status'] = "blog_delete";
    }
}


if ($_REQUEST['testimonial_id']) 
{
    $testimonial_id = $_REQUEST['testimonial_id'];

    $delete = "DELETE FROM testimonial WHERE testimonial_id = '$testimonial_id'";
    $run_delete = mysqli_query($conn,$delete);

    if ($run_delete) 
    {
        $_SESSION['status'] = "testimonial_delete";
    }
}


if ($_REQUEST['faq_id']) 
{
    $faq_id = $_REQUEST['faq_id'];

    $delete = "DELETE FROM faq WHERE faq_id = '$faq_id'";
    $run_delete = mysqli_query($conn,$delete);

    if ($run_delete) 
    {
        $_SESSION['status'] = "faq_id";
    }
} 


if ($_REQUEST['package_id']) 
{
    $package_id = $_REQUEST['package_id'];

    $delete = "DELETE FROM package WHERE package_id = '$package_id'";
    $run_delete = mysqli_query($conn,$delete);

    if ($run_delete) 
    {
        $delete_in = "DELETE FROM comission WHERE package_id = '$package_id'";
        $run_in = mysqli_query($conn,$delete_in);

        if ($run_in) 
        {
            $_SESSION['status'] = "package_id";
        }
        
    }
} 
?>

<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>




            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
$status_alert = $_SESSION['status'];

if(isset($_SESSION['status']))
{

if ($status_alert == "blog_delete") 
{    
?>
       <script>
          swal({
            title: "Delete Success",
            text: "",
            icon: "success",
            button: "Ok",
          
          }).then(function() {
          window.location = "appoitment.php";
          });
         </script>
<?php
}
elseif ($status_alert == "testimonial_delete") 
{    
?>
       <script>
          swal({
            title: "Delete Success!",
            text: "",
            icon: "success",
            button: "Ok",
          
          }).then(function() {
          window.location = "testimonial.php";
          });
         </script>
<?php
}
elseif ($status_alert == "faq_id") 
{    
?>
       <script>
          swal({
            title: "Delete Success!",
            text: "",
            icon: "success",
            button: "Ok",
          
          }).then(function() {
          window.location = "faq.php";
          });
         </script>
<?php
}

elseif ($status_alert == "package_id") 
{    
?>
       <script>
          swal({
            title: "Delete Success!",
            text: "",
            icon: "success",
            button: "Ok",
          
          }).then(function() {
          window.location = "package.php";
          });
         </script>
<?php
}
else
{    
?>
       <script>
          swal({
            title: "Something Went Wrong!",
            text: "",
            icon: "warning",
            button: "Ok",
          
          }).then(function() {
          window.location = "terms_condition.php";
          });
         </script>
<?php
}
unset($_SESSION['status']);
}
?>

</body>
</html>
                