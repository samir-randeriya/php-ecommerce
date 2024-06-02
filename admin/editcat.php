<?php 
include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
if(isset($_POST['back']))
{
nev :: go();
}
?>

<?php
if(!isset ($_GET['catid']) || $_GET['catid'] == NULL )
{

echo "<script>window.location = 'catlist.php'</script>";
}else
{
$id = $_GET['catid'];
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Update Category</h2>
	   <div class="block copyblock">
				 <?php 
				if(isset($_POST['submit']))
				{
				
				$name = $fm ->validation($_POST['name']);			
				$name = mysqli_real_escape_string($db->link,$name);
				 
				 if(empty($name)){
				 
				 echo "<snap class ='error'>Field must not be empty!!!</snap>";
				 }else
				 {
				 $query_update = "UPDATE tbl_category
						   SET
						   name = '$name'
						   WHERE id= '$id'";
				 $updaterow = $db->update($query_update);
					 if($updaterow)
					 {
					 echo "<snap class ='sussess'>Catagory Updated Sussessfully !</snap>";					 
					 }					 
					 else{
					 echo "<snap class ='error'>Catagory Not Updated !</snap>";
					 }
					 
				 }			
				
				}
				
				
				
			
?>
	
	
<?php 

$query = "SELECT * FROM `tbl_category` WHERE id = '$id' order by id desc";
$catSelect = $db->select($query);
while($result = $catSelect->fetch_assoc())
{
?>

                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
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
<?php include 'inc/footer.php';?>