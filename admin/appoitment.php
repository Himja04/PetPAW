<?php 
include('include/header.php'); 

if(isset($_POST['submit']))
{
    $arr = $_POST['chk_id'];

    foreach ($arr as $id) 
    {
        $delete = "DELETE FROM booking WHERE booking_id = '$id'";
        $run33 = mysqli_query($conn,$delete);
    }

}

$_SESSION['total_member'] = 0;
$_SESSION['total_reff_id'] =[];
$res=mysqli_query($conn,"SELECT * FROM user");
$arr=[];
while($row=mysqli_fetch_assoc($res))
{
    $arr[$row['user_id']]['full_name']=$row['full_name'];
    $arr[$row['user_id']]['reff_user_id']=$row['reff_user_id'];
}

 buildTreeView($arr,$user_id);

function buildTreeView($arr,$parent,$level = 0,$prelevel = -1)
{
   

    foreach($arr as $id=>$data)
    {

        if($parent==$data['reff_user_id'])
        {

            $_SESSION['total_member']++;
            
   

            if($level>$prelevel)
            {
                $prelevel=$level;
            }

            $level++;
            buildTreeView($arr,$id,$level,$prelevel);
            $level--;   
            
        }
        $_SESSION['total_reff_id'][] = $data['reff_user_id']; 
    
        
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
                                                <li class="breadcrumb-item"><a href="dashboard.php">Petshop</a></li>
                                                <li class="breadcrumb-item active">Appoitment</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Appoitment</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title end breadcrumb -->

                          

                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="card m-b-30">
                                        <div class="card-body table-responsive">
                                            
                                            <div class="">
                                                <form method="POST">
                    <button class="btn btn-danger btn-sm float-left" type="submit" name="submit">Delete</button>
                                                <table id="datatable2" class="table">
                                                    <thead>
                                                    <tr>
                                                        <th><input id="chk_all" name="chk_all" type="checkbox"  /> </th>
                                                        <th>No</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Mobile</th>
                                                        <th>Appoitment Date</th>
                                                        <th>Message</th>
                                                        <th>Service</th>
                                                        <th>Slote</th>
                                                    </tr>
                                                    </thead>
    
    
                                                    <tbody>

                                     <?php 

                                        

                                                $select_user = "SELECT * FROM booking ORDER BY booking_id DESC";
                                                $run_user = mysqli_query($conn,$select_user);
                                                $i =1;
                                                while ($data_user = mysqli_fetch_array($run_user)) 
                                                {
                                                    ?>
                                                         <tr>
                                                            <td><input name="chk_id[]" class="chkbox" type="checkbox" value="<?php echo $data_user['booking_id']; ?>"/></td>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $data_user['name']; ?></td>
                                                            <td><?php echo $data_user['email']; ?></td>
                                                            <td><?php echo $data_user['phone']; ?></td>
                                                            <td><?php echo $data_user['booking_date']; ?></td>
                                                            <td><?php echo $data_user['message']; ?></td>
                                                            <td><?php echo $data_user['service']; ?></td>
                                                            <td><?php echo $data_user['slote']; ?></td>
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