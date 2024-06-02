<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
if(!isset ($_GET['viewPostid']) || $_GET['viewPostid'] == NULL )
{
header("Location: postlist.php");
}else
{
$id = $_GET['viewPostid'];
}
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>
				
			 <?php 
			 if(isset($_POST['submit']))
			{			
echo "<script>window.location = 'postlist.php'</script>";
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
                            <input  readonly type="text" name="title" value="<?php echo $PostResult['title'];?>" class="medium" />
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
							<img src="<?php echo $PostResult['image'];?>" alt="post image" height="200" width="250"/>
							<br />
                            
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
                            <input type="text" viewPostid name="tags" value="<?php echo $PostResult['tags'];?>" class="medium" />
                            </td>
                        </tr>		
						 <tr>
							<td>
                            <label>Authors</label>
                            </td>
                            <td>
                              <input type="text" name="authour"   value="<?php echo session::get("username");?>" class="medium" />
							<input type="hidden" name="user_id"   value="<?php echo session::get("id");?>" class="medium" />
                            </td>
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

