<?php 
include('../admin/connection.php');

if (isset($_REQUEST['reff_name'])) 
{
	$reff_name = $_REQUEST['reff_name'];

	?>
					<select class="input100" name="reff_email" id="reff_email">
						<option hidden="">SELECT EMAIL</option>

						<?php 
							$select_user = "SELECT * FROM user WHERE user_id = '$reff_name'";
							$run_user = mysqli_query($conn,$select_user);

							while ($data_user = mysqli_fetch_array($run_user))  
							{
								?>
									<option value="<?php echo $data_user['user_id']; ?>"> <?php echo $data_user['email']; ?></option>

								<?php
							}
						?>
					</select>
	<?php
}

?>