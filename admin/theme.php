<?php 
include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
if(isset($_POST['back']))
{
nev :: go();
}
?>


<div class="grid_10">
	<div class="box round first grid">
		<h2>Themes</h2>
	   <div class="block copyblock">
				 <?php 
				if(isset($_POST['submit']))
				{
				
				
				$theme = mysqli_real_escape_string($db->link,$_POST['theme']);
				 				 
				 $query_update = "UPDATE tbl_them
						   SET
						   theme = '$theme'
						   WHERE id= '1'";
				 $updaterow = $db->update($query_update);
					 if($updaterow)
					 {
					 echo "<snap class ='sussess'>Theme Updated Sussessfully !</snap>";					 
					 }					 
					 else{
					 echo "<snap class ='error'>Theme Not Updated !</snap>";
					 }
					 
				 }			
				

				
				
				
			
?>
	
	
<?php 

$query = "SELECT * FROM `tbl_them` WHERE id = '1' ";
$thems = $db->select($query);
while($result = $thems->fetch_assoc())
{
?>

                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input 
								<?php 
								if($result['theme'] == 'defult')
								{
								echo "checked";
								}
								?>
								 type="radio" name="theme" value="defult"  />Defult
                            </td>
                        </tr>
						<tr>
                            <td>
                                <input 
								<?php 
								if($result['theme'] == 'green')
								{
								echo "checked";
								}
								?>
								type="radio" name="theme" value="green"  />Green
                            </td>
                        </tr>
						<tr>
                            <td>
                                <input 
								<?php 
								if($result['theme'] == 'red')
								{
								echo "checked";
								}
								?>
								type="radio" name="theme" value="red"  />Red
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Change" />
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