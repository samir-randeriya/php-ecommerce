<?php
ob_start();
include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
$id = session::get("id");
$userRole = session::get("userRole");
				
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>User Profile</h2>
				
			 <?php 
			if(isset($_POST['submit']))
			{			
				
			$name = $fm ->validation($_POST['name']);
			$username = $fm ->validation($_POST['username']);
			$email = $fm ->validation($_POST['email']);
			
			
			
			$name = mysqli_real_escape_string($db->link,$name);
			$username = mysqli_real_escape_string($db->link,$username);
			$email = mysqli_real_escape_string($db->link,$email);		
			$details = mysqli_real_escape_string($db->link,$_POST['details']);
			
			
			
    	
			if($name == '' || $username == '' || $email == '' || $details == '')
			{
			 echo "<snap class ='error'>Field must not be empty!</snap>";
			}else{
				$query = " UPDATE `tbl_user`
				SET
				`name` = '$name',
				`username` = '$username',			
				`email` = '$email',
				`details` = '$details'				
				WHERE id = '$id'";
				
				$update_rows = $db->Update($query);
				if ($update_rows) {
				echo "<span class='success'> User Data Updated Successfully.
				 </span>";
				}else {
				echo "<span class='error'>User Data  Not Updated !</span>";
				}
				}
		
			}
			?>
				
                <div class="block"> 
				<?php 
				$query = "SELECT * FROM `tbl_user` WHERE id = '$id' AND role = '$userRole'";
				$getUser = $db->select($query);
				while($Result = $getUser->fetch_assoc())
				{
				
				?>				
                 <form action="profile.php" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
							<td>
                            <label>Name</label>
                            </td>
                            <td>
                            <input type="text" name="name" value="<?php echo $Result['name'];?>" class="medium" />
                            </td>
                        </tr>
						
						<tr>
							<td>
                            <label>User Name</label>
                            </td>
                            <td>
                            <input type="text" name="username" value="<?php echo $Result['username'];?>" class="medium" />
                            </td>
                        </tr>
						
						<tr>
							<td>
                            <label>Email</label>
                            </td>
                            <td>
                            <input type="text" name="email" value="<?php echo $Result['email'];?>" class="medium" />
                            </td>
                        </tr>
										
													                     
                                              
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                            <label>Details</label>
                            </td>
                            <td>
                            <textarea class="tinymce" name="details">
							<?php echo $Result['details'];?>
							</textarea>
                            </td>
                        </tr>
						
						
                        </tr>
							
						
						<tr>
                            <td>
							</td>
                            <td>
                            <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
					<?php }?>
                </div>
            </div>
        </div>
  <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
            
<?php include 'inc/footer.php';

ob_flush();
?>

