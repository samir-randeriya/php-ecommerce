<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
		   
		    <div class="box round first grid">
			<h2>Update Copyright Text</h2>
				<?php
			if(isset($_POST['submit']))
			{			
			
		    $note = $fm->validation($_POST['note']);				
			$note =  mysqli_real_escape_string($db->link,$note);
			
					if($note == '')
					{
					 echo "<snap class ='error'>Field must not be empty!</snap>";
					}else{
							    $query = " UPDATE `tbl_footer`
								SET
								`note` = '$note'								
								WHERE id = '1'";
								
								$update_rows = $db->Update($query);
								if ($update_rows) {
								echo "<span class='success'>Data Updated Successfully.</span>";
								}else {
								echo "<span class='error'>Data  Not Updated !</span>";
								}
					
			             }
			}
				
			?>
                <div class="block copyblock">
				<?php 
				$query = "Select * FROM  tbl_footer WHERE id = 1";
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
                               <label> Copy Right </label>
                            </td>
                            <td>
                                <input type="note" value="<?php echo $result['note'];?>" name="note" class="large" />
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
                </div>
				<?php }}?>
            </div>
        </div>
        
<?php include 'inc/footer.php';?>