﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
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
			 $query = "INSERT INTO `tbl_category`(name) VALUES ('$name')";
			 $catInsert = $db->insert($query);
				 if($catInsert){
				 echo "<snap class ='sussess'>Catagory Inserted Sussessfully !</snap>";
				 }else{
				 echo "<snap class ='error'>Catagory Not Inserted !</snap>";
				 }
				 
			 }			
			
			}
			
?>
			    
                 <form action="addcat.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>