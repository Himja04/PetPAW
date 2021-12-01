<?php 
include('include/header.php'); 


if(isset($_POST['submit']))
{
    $arr = $_POST['chk_id'];

    foreach ($arr as $id) 
    {
        $delete = "DELETE FROM pets WHERE pets_id = '$id'";
        $run33 = mysqli_query($conn,$delete);
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
                                                <li class="breadcrumb-item"><a href="dashboard.php">Pet Shop</a></li>
                                                <li class="breadcrumb-item active">Pets</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Pets</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title end breadcrumb -->

                          

                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="card m-b-30">
                                        <div class="card-body table-responsive">
                                            <a href="pets_add.php" class="btn btn-primary float-right">Add New Pet</a>
                                            <div class="">
                                                 <form method="POST">
                                                     <button class="btn btn-danger btn-sm float-left" type="submit" name="submit">Delete</button>
                                                     <table id="datatable2" class="table">
                                                    <thead>
                                                    <tr>
                                                        <th><input id="chk_all" name="chk_all" type="checkbox"  /> </th>
                                                        <th>No</th>
                                                        <th>Image</th>
                                                        <th>Pets Name</th>
                                                        <th>Description</th>
                                                        <th>Update</th>
                                                    </tr>
                                                    </thead>
    
    
                                                    <tbody>

                                     <?php 

                                        

                                                $select_user = "SELECT * FROM pets ORDER BY pets_id DESC";
                                                $run_user = mysqli_query($conn,$select_user);

                                                $i = 1; 
                                                while ($data_user = mysqli_fetch_array($run_user)) 
                                                {
                                                    $offer_status = $data_user['offer_status'];

                                                    ?>
                                                         <tr>
                                                            <td><input name="chk_id[]" class="chkbox" type="checkbox" value="<?php echo $data_user['pets_id']; ?>"/></td>
                                                            <td><?php echo $i; ?></td>

                                                            <?php 

                                                                $one_image = explode(",",$data_user['pets_image']);

                                                                $count = 0;

                                                                foreach ($one_image as $value) 
                                                                {
                                                                    if ($count == 0) 
                                                                    {
                                                                    ?>
                                                                        <td><img src="upload/pets/<?php echo $value; ?>" style="width: 100px; height:60px;"></td>
                                                                    <?php
                                                                    }
                                                                $count++;
                                                                }
                                                            ?>
                                                            

                                                            <td><?php echo $data_user['pets_name']; ?></td>
                                                            <td><?php echo $data_user['pets_description']; ?></td>
                                                   
                                                            <td><a href="pets_update.php?pets_id=<?php echo $data_user['pets_id']; ?>" class="btn btn-primary">Update</a></td>
                                                            </tr>
                                                    
                                                    <?php

                                                    $i++;
                                                }
                                            
                                        ?>

                                                   

                                                    </tbody>
                                                </form>
                                                </table>
                                            </div>           
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->


            
                            
                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <?php include 'include/footer.php';?>

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

         <!-- Required datatable js -->
         <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
         <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
         <!-- Buttons examples -->
         <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
         <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
         <script src="assets/plugins/datatables/jszip.min.js"></script>
         <script src="assets/plugins/datatables/pdfmake.min.js"></script>
         <script src="assets/plugins/datatables/vfs_fonts.js"></script>
         <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
         <script src="assets/plugins/datatables/buttons.print.min.js"></script>
         <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
         <!-- Responsive examples -->
         <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
         <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
 
         <!-- Datatable init js -->
         <script src="assets/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable2').DataTable();  
            } );
        </script>



         <script type="text/javascript">
$(document).ready(function(){
    $('#chk_all').click(function(){
        if(this.checked)
            $(".chkbox").prop("checked", true);
        else
            $(".chkbox").prop("checked", false);
    });
});

$(document).ready(function(){
    $('#delete_form').submit(function(e){
        if(!confirm("Confirm Delete?")){
            e.preventDefault();
        }
    });
});
</script>


    </body>
</html>