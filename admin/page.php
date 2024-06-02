<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if(!isset ($_GET['pageid']) || $_GET['pageid'] == NULL )
{
echo "<script>window.location = 'index.php'</script>";
}else
{
$pageid = $_GET['pageid'];
}
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit Page</h2>
				
			 <?php 
			 if(isset($_POST['submit']))
			{			
				
			
			$name = mysqli_real_escape_string($db->link,$_POST['name']);
			$body = mysqli_real_escape_string($db->link,$_POST['body']);
		
			
			if($name == '' || $body == '')
			{
			 echo "<snap class ='error'>Field must not be empty!</snap>";
			}else			
			{
			
				$query = "INSERT INTO `tbl_page` (`name`, `body`) VALUES
				(
				'$name',
				'$body'				
				)";
				
				$query = " UPDATE `tbl_page`
						SET
						`name` = '$name',
						`body` = '$body'
						WHERE id = '$pageid'";
				
				
				
				$inserted_rows = $db->insert($query);
				if ($inserted_rows) {
				echo "<span class='success'>Page Updated  Successfully.
				 </span>";
				}else {
				echo "<span class='error'>Page Not Update!</span>";
				}
				
			}
			}
			?>
				
				
				
                <div class="block">
				<?php 
				$query = "Select * FROM  `tbl_page` WHERE id = $pageid";
				$blog_taitle = $db->select($query);
				if($blog_taitle)
				{
				while($result = $blog_taitle->fetch_assoc())
					{
				?> 
                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
							<td>
                            <label>Title</label>
                            </td>
                            <td>
                            <input type="text" name="name" value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>									                     
                        
                       
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                            </td>
                            <td>
                            <textarea class="tinymce" name="body">
							<?php echo $result['body'];?>
							</textarea>
                            </td>
                        </tr>
						<tr>
                            <td>
							</td>
                            <td>
                            <input type="submit" name="submit" Value="Update" />
							<span class="actiondel"><a  onclick="return confirm('Are you sure You want to Delete the Page!!')" href="deletePage.php?pageid=<?php echo $result['id'];?>">Delete</a></span>
                            </td>
                        </tr>
                    </table>
                    </form>					
                </div>
				<?php }}?>
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
<style>
.actiondel{ margin-left:10px;}
.actiondel a{
border: 1px solid #dddddd;
    color: #444;
    cursor: pointer;
    font-size: 20px;
    padding: 4px 10px;
	background:#FOFOFO none repeat scroll 0 0;
	font-weight:normal;
}
</style>

