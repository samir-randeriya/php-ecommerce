<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
if(!isset ($_GET['editSliderid']) || $_GET['editSliderid'] == NULL )
{
echo "<script>window.location = 'index.php';</script>";
}else
{
$id = $_GET['editSliderid'];
}

if(isset($_POST['back']))
{
echo "<script>window.location = 'sliderlist.php';</script>";

}	
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Slider</h2>
				
			 <?php 
			 if(isset($_POST['submit']))
			{	
			$title = mysqli_real_escape_string($db->link,$_POST['title']);
    		$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			
			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/slider/".$unique_image;
			
			if($title == '')
			{
			 echo "<snap class ='error'>Field must not be empty!</snap>";
			}
			
			if(!empty($file_name))
			{
			
					if ($file_size >1048567) 
					{
					 echo "<span class='error'>Image Size should be less then 1MB! </span>";
					}elseif (in_array($file_ext, $permited) === false)
						{
						 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
						} 
					else
						{
						move_uploaded_file($file_temp, $uploaded_image);
						$query = " UPDATE `tbl_slider`
						SET
						`title` = '$title',					
						`image` = '$uploaded_image'						
						WHERE id = '$id'";
						
						$update_rows = $db->Update($query);
						if ($update_rows) {
						echo "<span class='success'>Slider Updated Successfully.</span>";
						}else {
						echo "<span class='error'>Slider  Not Updated !</span>";
						}
					}
			
			}else{
						$query = " UPDATE `tbl_slider`
						SET
						`title` = '$title'						
						WHERE id = '$id'";
						
						$update_rows = $db->Update($query);
						if ($update_rows) {
						echo "<span class='success'>Slider Updated Successfully.</span>";
						}else {
						echo "<span class='error'>Slider  Not Updated !</span>";
						}
					
			
			
			
				}
			
			}
		
			?>
				
                <div class="block"> 
				<?php 
				$query = "SELECT * FROM `tbl_slider` WHERE id = '$id' ";
				$catSelect = $db->select($query);
				while($PostResult = $catSelect->fetch_assoc())
				{
				
				?>				
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
							<td>
                            <label>Title</label>
                            </td>
                            <td>
                            <input type="text" name="title" value="<?php echo $PostResult['title'];?>" class="medium" />
                            </td>
                        </tr>									                     
                       
                        <tr>
                            <td>
                            <label>Upload New </label>
                            </td>
                            <td>
							<img src="<?php echo $PostResult['image'];?>" alt="post image" height="100" width="200"/>
							<br />
                            <input type="file"  name="image"/>
							<span class='success'>Image Size Width= "960"pixeles . 
							Image Size Height= "280"pixeles .</span>
                            </td>
                        </tr>
                       
					
						
						<tr>
                            <td>
							</td>
                            <td>
                            <input type="submit" name="submit" Value="Update" />
							<input type="submit" name="back" Value="Back" />
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

