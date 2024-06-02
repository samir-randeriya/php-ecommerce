<?php
						@$p_id=$_GET['p_id'];	
						//echo $cat_id;
						//$cat_name=$_GET['cat_name'];
						mysql_connect("localhost","root","");
						mysql_select_db("product");
						$q="delete from `images_tbl` where p_id='$p_id'";
						mysql_query($q);
						mysql_close();
						header("Location:product.php");
						
?>