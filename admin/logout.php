<?php 
session_start();

unset($_SESSION['admin']);

$_SESSION['user_id'] = "logout";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Bizehive</title>
  <link rel="shortcut icon" href="../img/logo.png">
</head>
<body>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <?php 
    if (isset($_SESSION['user_id'])) 
    {
      ?>
      <script>
                    swal({
                      title: "Logout Success",
                      text: "",
                      icon: "success",
                      button: "Ok",
                    }).then(function(){
                      window.location='index.php';
                    });
      </script>
      <?php 
      unset($_SESSION['user_id']);
    }

  ?>

</body>
</html>