<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
if(!isset ($_GET['editPostid']) || $_GET['editPostid'] == NULL )
{
header("Location: postlist.php");
}else
{
$id = $_GET['editPostid'];
}
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>
				
			 <?php 
			 if(isset($_POST['submit']))
			{			
				
			
			$title = mysqli_real_escape_string($db->link,$_POST['title']);
			$cat = mysqli_real_escape_string($db->link,$_POST['cat']);
			$body = mysqli_real_escape_string($db->link,$_POST['body']);
			$tags = mysqli_real_escape_string($db->link,$_POST['tags']);
			$authour = mysqli_real_escape_string($db->link,$_POST['authour']);
			$user_id = mysqli_real_escape_string($db->link,$_POST['user_id']);
			
    		$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			
			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;
			
			if($title == '' || $cat == '' || $body == '' || $tags == '' || $authour == '')
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
						$query = " UPDATE `tbl_post`
						SET
						`cat` = '$cat',
						`title` = '$title',
						`body` = '$body',
						`image` = '$uploaded_image',
						`authour` = '$authour',
						`tags` = '$tags',
						`user_id` = '$user_id'  
						WHERE id = '$id'";
						
						$update_rows = $db->Update($query);
						if ($update_rows) {
						echo "<span class='success'>Data Updated Successfully.
						 </span>";
						}else {
						echo "<span class='error'>Data  Not Updated !</span>";
						}
					}
			
			}else{
						$query = " UPDATE `tbl_post`
						SET
						`cat` = '$cat',
						`title` = '$title',
						`body` = '$body',						
						`authour` = '$authour',
						`tags` = '$tags',
						`user_id` = '$user_id'   
						WHERE id = '$id'";
						
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
				
                <div class="block"> 
				<?php 
				$query = "SELECT * FROM `tbl_post` WHERE id = '$id' order by id desc";
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
                            <label>Category</label>
                            </td>
                            <td>
							<select id="select" name="cat">
							<option value="1">Select Category</option>
							<?php 
							$query = "SELECT * FROM `tbl_category`";
							$category = $db->select($query);
							if($category)
							{
								while($result = $category->fetch_assoc())
								{
							?>
								<option
								<?php 
								if($PostResult['cat']==$result['id']){?>
								selected="selected"
								
								<?php } ?> value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
							
							<?php
								}
							}
							?>
							</select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label>Upload Image</label>
                            </td>
                            <td>
							<img src="<?php echo $PostResult['image'];?>" alt="post image" height="100" width="200"/>
							<br />
                            <input type="file"  name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                            </td>
                            <td>
                            <textarea class="tinymce" name="body">
							<?php echo $PostResult['body'];?>
							</textarea>
                            </td>
                        </tr>
						<tr>
							<td>
                            <label>Tags</label>
                            </td>
                            <td>
                            <input type="text" name="tags" value="<?php echo $PostResult['tags'];?>" class="medium" />
                            </td>
                        </tr>		
						 <tr>
							<td>
                            <label>Authors</label>
                            </td>
                            <td>
                              <input type="text" name="authour"   value="<?php echo session::get("username");?>" class="medium" />
							<input type="text" name="user_id"   value="<?php echo session::get("id");?>" class="medium" />
                            </td>
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
            
<?php include 'inc/footer.php';?>

