<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">
			   <?php 
			 if(isset($_POST['submit']))
			{
				mysql_connect("localhost","root","");
				mysql_select_db("product");
				$cat_name=$_POST['cat_name'];
				$q="insert into cat_tbl values('','$cat_name')";
				mysql_query($q);
				mysql_close();
			
			}
				 
?>
			    
                 <form action="" method="post">
                    <table class="form">	
						
                        <tr>
                            <td>
                                <input type="text" name="cat_name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>                 
                            <td>
                                <input type="submit" name="delete" Value="Delete" />
                            </td>
                        </tr>
                    </table>
                    </form>
					
                </div>
				<?php 
					/*if(isset($_POST["delete"]))
					{
						$cat_name=$_POST['cat_name'];
						//$cat_name=$_GET['cat_name'];
						mysql_connect("localhost","root","");
						mysql_select_db("product");
						$q="delete from `cat_tbl` where cat_name='$cat_name'";
						mysql_query($q);
						header("location:cat.php");
						mysql_close();
					}*/
					
									?>
				<?php
			mysql_connect("localhost","root","");
			mysql_select_db("product");
			$q="select * from cat_tbl";
			$result=mysql_query($q);
			echo "<table border=1 width=50%>";
			while($row=mysql_fetch_row($result))
			{	
				echo "<tr>";
					echo "<td>".$row[0];
					echo "<td>".$row[1];
					echo "<td><a href=del.php?cat_id=$row[0]>Delete</a>";
					

				echo "</tr>";
			}
			echo "</table>";
			mysql_close();
		?>

            </div>
        </div>
		<?php include 'inc/footer.php';?>