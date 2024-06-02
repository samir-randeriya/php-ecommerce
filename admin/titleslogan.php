<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
if(isset($_POST['back']))
{
nev :: go_home();
}

?>
				
        <div class="grid_10">		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
				<?php
		 if(isset($_POST['submit']))
			{			
			
			$title = $fm->validation($_POST['title']);	
			$slogan = $fm->validation($_POST['slogan']);
			
			$title =  mysqli_real_escape_string($db->link,$title);
			$slogan = mysqli_real_escape_string($db->link,$slogan);
		
			
    		$permited  = array('png');
			$file_name = $_FILES['logo']['name'];
			$file_size = $_FILES['logo']['size'];
			$file_temp = $_FILES['logo']['tmp_name'];
			
			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$same_image = 'logo'.'.'.$file_ext;
			$uploaded_image = "upload/".$same_image;
			
			if($title == '' || $slogan == '' )
			{
			 echo "<snap class ='error'>Field must not be empty!</snap>";
			}
			
			if(!empty($file_name))
			{
			
					if ($file_size >1048567) 
					{
					 echo "<span class='error'>Image Size should be less then 1MB!
					 </span>";
					}elseif (in_array($file_ext, $permited) === false)
						{
						 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
						} 
					else
						{
						move_uploaded_file($file_temp, $uploaded_image);
						$query = " UPDATE `title_slogan`
						SET					
						`title` = '$title',
						`slogan` = '$slogan',
						`logo` = '$uploaded_image'						
						WHERE id = '1'";
						
						$update_rows = $db->Update($query);
						if ($update_rows) {
						echo "<span class='success'>Data Updated Successfully.
						 </span>";
						}else {
						echo "<span class='error'>Data  Not Updated !</span>";
						}
					}
			
			}else{
						$query = " UPDATE `title_slogan`
						SET
						`title` = '$title',
						`slogan` = '$slogan'
						WHERE id = '1'";
						
						$update_rows = $db->Update($query);
						if ($update_rows) {
						echo "<span class='success'>Data Updated Successfully.
						 </span>";
						}else {
						echo "<span class='error'>Data  Not Updated !</span>";
						}
					
			
			
			
				}
			
			
			}
?>
			
                <div class="block sloginblock"> 
				<?php 
				$query = "Select * FROM  title_slogan WHERE id = 1";
				$blog_taitle = $db->select($query);
				if($blog_taitle)
				{
				while($result = $blog_taitle->fetch_assoc())
					{
				?> 
				<div class="leftside"> 
                  <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['title'];?>"  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['slogan'];?>" name="slogan" class="medium" />
                            </td>
                        </tr>
						 
						 <tr>
                            <td>
                            <label>Upload Logo</label>
                            </td>
                            <td>
                            <input type="file"  name="logo"/>
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
                </div>			
				<div class="rightside">
				<img src="<?php echo $result['logo'];?>" alt="logo"/>
				</div>
					<?php }}?>
          </div>
      </div>
  <?php include 'inc/footer.php';?>
  <style>
.leftside
{
float:left;
width:70%;
}

.rightside
{
float:right;
width:20%;
}
.rightside img 
{
height:160px;
width:170px;
}
</style>
  