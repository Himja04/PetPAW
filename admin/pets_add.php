
<?php include('include/header.php'); 


    if (isset($_REQUEST['add_blog'])) 
    {
            $pets_name = $_REQUEST['pets_name'];
             $pets_image_array = $_FILES['pets_image']['name'];            
            $pets_description = $_REQUEST['pets_description'];

            $offer_status = 0;
            $pets_price = 0;
            $pets_offer_price = 0;

            $final_array = implode(",",$pets_image_array);


            foreach ($_FILES['pets_image']['name'] as $key => $value) 
            {
                move_uploaded_file($_FILES['pets_image']['tmp_name'][$key],'upload/pets/'.$value);
            }
                  

            

             $insert = "INSERT INTO pets(pets_name,pets_price,pets_offer_price,pets_description,pets_image,offer_status) VALUES('$pets_name','$pets_price','$pets_offer_price','$pets_description','$final_array','$offer_status')";
            $run_insert = mysqli_query($conn,$insert);


            if ($run_insert) 
            {
                

              $_SESSION['status'] = "blog_insert";
            }
            else
            {
              $_SESSION['status'] = "Wrong";
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
                                                <li class="breadcrumb-item active">Add New Pet</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Add New Pet</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title end breadcrumb -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
            


                                        <form action="" method="POST" enctype="multipart/form-data">

                                            <div class="form-group row mt-5">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Pets Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="pets_name" required="" placeholder="Enter Pet Name">
                                                </div>
                                            </div> 

                                           
                                        <!--     <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Pets Price</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="Number" name="pets_price"  required="">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Pets Offer Price</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="Number" name="pets_offer_price"  required="">
                                                </div>
                                            </div>
 -->

                                           


                                             <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" id="elm1" name="pets_description" required="">
                                                        
                                                    </textarea>
                                                </div>
                                            </div>




                                            
                                             <div class="form-group row">
                                             
                                               <label for="example-text-input" class="col-sm-2 col-form-label">Pet Image <span style="color:red;">( Select Multiple )</span></label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="pets_image[]" class="form-control" multiple required="">

                                                    <span style="color:red;">( First Image is Main Thumbnail )</span>
                                                </div>
                                            </div>     



                                           <!--  <div class="form-group row">
                                             
                                               <label for="example-text-input" class="col-sm-2 col-form-label">Offer Status</label>
                                                <div class="col-sm-10">
                                                    <select name="offer_status" class="form-control">
                                                        <option value="0">Deactive</option>
                                                        <option value="1">Active</option>
                                                    </select>
                                                </div>
                                            </div>      -->

                                          
                                      


                                               <div class="form-group row mt-5">
                                                <label for="example-text-input-lg" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <input class="form-control btn btn-primary" name="add_blog" type="Submit" value="Add New Pet">
                                                </div>
                                            </div>

                                            </form>


                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            
                           

                            

                            <?php   echo $final_array; ?>
      

                               

                            
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

if ($status_alert == "blog_insert") 
{    
?>
       <script>
          swal({
            title: "New Pet Added!",
            text: "",
            icon: "success",
            button: "Ok",
          
          }).then(function() {
          window.location = "pets.php";
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
          window.location = "pets.php";
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