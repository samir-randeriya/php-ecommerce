<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
			
                <h2>Add New Product</h2>
				
				<?php
					$msg="";
					if(isset($_POST['submit']))
					{
						//echo "hello";
						$target="images/".basename($_FILES['image']['name']);
						$db=mysqli_connect("localhost","root","","product");
						$pname=$_POST['pname'];
						$price=$_POST['price'];
						$image=$_FILES['image']['name'];
						$cat=$_POST['cat'];
						$des=$_POST['des'];
						$date=$_POST['date'];
						
						$sql= "INSERT INTO `images_tbl` (`p_id`, `pname`, `image`, `description`, `price`, `category`, `date`) VALUES ('', '$pname', '$image', '$des', '$price', '$cat', '$date')";
						mysqli_query($db,$sql);
						
						if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
						{
							$msg="Image Upload Successfully";
						}
						else
						{
							$msg="There was a problem ..";
						}
						
					}
					
				?>
			    <div class="block"> 
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
							<td>
                            <label>Product Name</label>
                            </td>
                            <td>
                            <input type="text" name="pname" placeholder="Enter Post Title..." class="medium" />
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
									mysql_connect("localhost","root","");
									mysql_select_db("product");
									
									$dd_res=mysql_query("select cat_name from cat_tbl");
									while($r=mysql_fetch_row($dd_res))
									{
										
										echo "<option value='$r[0]'>$r[0] </option>";
									}
								?>
							</select>
                            </td>
                        </tr>
						 <tr>
							<td>
                            <label>Price</label>
                            </td>
                            <td>
                            <input type="text" name="price"  class="medium" />
                            </td>
                        </tr>	
                        <tr>
							<td>
                            <label>Date</label>
                            </td>
							<td>
                            <input type="date" name="date" class="medium" />
                            </td>
                        </tr>	
							
                        <tr>
                            <td>
                            <label>Upload Image</label>
                            </td>
                            <td>
                            <input type="file"  name="image" accept="image/*" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                            </td>
                            <td>
                            <textarea class="tinymce" name="des"></textarea>
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
					if(isset($_POST["delete"]))
					{
						$pname=$_POST['pname'];
						//$cat_name=$_GET['cat_name'];
						mysql_connect("localhost","root","");
						mysql_select_db("product");
						$q="delete from `images_tbl` where pname='$pname'";
						mysql_query($q);
						header("location:product.php");
						mysql_close();
					}
					
									?>
				<?php
			mysql_connect("localhost","root","");
			mysql_select_db("product");
			$q="select * from images_tbl";
			$result=mysql_query($q);
			echo "<table border=1 width=50%>";
			while($row=mysql_fetch_row($result))
			{	
				echo "<tr>";
					echo "<td>".$row[0];
					echo "<td>".$row[1];
					echo "<td>".$row[2];
					echo "<td>".$row[3];
					echo "<td>".$row[4];
					echo "<td>".$row[5];
				
					echo "<td><a href=dele.php?p_id=$row[0]>Delete</a>";
				echo "</tr>";
			}
			echo "</table>";
			mysql_close();
		?>
            </div>
        </div>
            
<?php include 'inc/footer.php';?>

