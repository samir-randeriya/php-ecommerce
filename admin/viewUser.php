<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if(!isset ($_GET['userid']) || $_GET['userid'] == NULL )
{

echo "<script>window.location = 'userList.php'</script>";
}else
{
$userid = $_GET['userid'];
}
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>User Profile Details</h2>
				
			 <?php 
			if(isset($_POST['submit']))
			{
     		echo "<script>window.location = 'userList.php'</script>";		
			}
			?>
				
                <div class="block"> 
				<?php 
				$query = "SELECT * FROM `tbl_user` WHERE id = '$userid'";
				$getUser = $db->select($query);
				while($Result = $getUser->fetch_assoc())
				{
				
				?>				
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
							<td>
                            <label>Name</label>
                            </td>
                            <td>
                            <input  type="text" name="name" value="<?php echo $Result['name'];?>" class="medium"  readonly/>
                            </td>
                        </tr>
						
						<tr>
							<td>
                            <label>User Name</label>
                            </td>
                            <td>
                            <input type="text" name="username" value="<?php echo $Result['username'];?>" class="medium" readonly />
                            </td>
                        </tr>
						
						<tr>
							<td>
                            <label>Email</label>
                            </td>
                            <td>
                            <input type="text" name="email" value="<?php echo $Result['email'];?>" class="medium"  readonly/>
                            </td>
                        </tr>
										
													                     
                                              
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                            <label>Details</label>
                            </td>
                            <td>
                            <textarea class="tinymce" name="details" readonly>
							<?php echo $Result['details'];?>
							</textarea>
                            </td>
                        </tr>
						
						
                        </tr>
							
						
						<tr>
                            <td>
							</td>
                            <td>
                            <input type="submit" name="submit" Value="Back" />
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
            
<?php include 'inc/footer.php';?>

