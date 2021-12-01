
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 include('include/header.php'); 

$contact_id = $_REQUEST['contact_id'];
$select_user_reff = "SELECT * FROM contact WHERE contact_id = '$contact_id'";
$run_user_reff = mysqli_query($conn,$select_user_reff);

while ($data_user_reff = mysqli_fetch_array($run_user_reff)) 
{
    $db_name = $data_user_reff['name'];
    $db_phone = $data_user_reff['phone'];
    $db_email = $data_user_reff['email'];
    $db_subject = $data_user_reff['subject'];
}






    if (isset($_REQUEST['send_mail'])) 
    {
                $to_email = $_REQUEST['to_email'];
                $subject = $_REQUEST['subject'];
                $form_message = $_REQUEST['form_message'];


                include "../phpmailer/vendor/autoload.php";
                                     
                $mail = new PHPMailer(true);
                 
                try {
                    $toid=$to_email;

                    $mail->isSMTP();
                    $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
                    $mail->SMTPAuth = true;
                    $mail->Username = 'vrtechiedemo@gmail.com';   //username
                    $mail->Password = 'VRTECHIE#123';   //password
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;                    //smtp port
                  
                    $mail->setFrom('vrtechiedemo@gmail.com', 'Bizehive');
                    $mail->addAddress($toid);
                 
                  /*  $mail->addAttachment(__DIR__ . '/attachment1.png');
                    $mail->addAttachment(__DIR__ . '/attachment2.png');*/
                 
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                     $mail->Body = $form_message;
                 
                    $mail->send();

                    $_SESSION['status'] = "image_update";
                } 
                catch (Exception $e) 
                {
                    echo 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
                }


                            



        
    }

?>


                    <div class="page-content-wrapper ">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="btn-group float-right">
                                            <ol class="breadcrumb hide-phone p-0 m-0">
                                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                                <li class="breadcrumb-item active">Contact Reply</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Contact Reply</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title end breadcrumb -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
            


                                        <form action="" method="POST">

                                            <div class="form-group row mt-5">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="to_email" value="<?php echo $db_email;?>" readonly>
                                                </div>
                                            </div> 

                                           
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Subject</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="subject" value="<?php echo $db_subject; ?>" readonly >
                                                </div>
                                            </div>

                                    



                                             <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Your Reply</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" id="elm1" name="form_message" required="">
                                                        
                                                    </textarea>
                                                </div>
                                            </div>


                                          
                                                                                  
                                   
                                            


                                               <div class="form-group row mt-5">
                                                <label for="example-text-input-lg" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <input class="form-control btn btn-primary" name="send_mail" type="Submit" value="Send Mail">
                                                </div>
                                            </div>

                                            </form>


                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            
                           

                            

                            
      

                               

                            
                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <?php include('include/footer.php'); ?>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


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


             <!-- Dropzone js -->
        <script src="assets/plugins/dropzone/dist/dropzone.js"></script>
        <script src="assets/plugins/dropify/js/dropify.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>



              <script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>



            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
$status_alert = $_SESSION['status'];

if(isset($_SESSION['status']))
{

if ($status_alert == "image_update") 
{    
?>
       <script>
          swal({
            title: "Email Send Success!",
            text: "",
            icon: "success",
            button: "Ok",
          
          }).then(function() {
          window.location = "contact.php";
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
          window.location = "contact.php";
          });
         </script>
<?php
}
unset($_SESSION['status']);
}
?>

   <!--Wysiwig js-->
        <script src="assets/plugins/tinymce/tinymce.min.js"></script>
        <script>
                $(document).ready(function () {
                    if($("#elm1").length > 0){
                        tinymce.init({
                            selector: "textarea#elm1",
                            theme: "modern",
                            height:300,
                            plugins: [
                                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                                "save table contextmenu directionality emoticons template paste textcolor"
                            ],
                            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                            style_formats: [
                                {title: 'Bold text', inline: 'b'},
                                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                                {title: 'Example 1', inline: 'span', classes: 'example1'},
                                {title: 'Example 2', inline: 'span', classes: 'example2'},
                                {title: 'Table styles'},
                                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                            ]
                        });
                    }
                });
            </script>
    </body>
</html>