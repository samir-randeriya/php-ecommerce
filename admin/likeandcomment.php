<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
 
<div class="grid_10">
  <div class="box round first grid">
    <h2> Dashbord</h2>
	<div class="grid">
					<?php 
					if (isset($_GET['delUser']))
					{
					$id =$_GET['delUser'];
									
					$query = "DELETE FROM  `tbl_user` WHERE id =$id";
					$del = $db->delete($query);
						if($del)
						 {
						 echo "<snap class ='sussess'>User  Deleted Sussessfully !</snap>";					 
						 }					 
						 else{
						 echo "<snap class ='error'>User Not Deleted !</snap>";
						 }
					}
		
					if (isset($_GET['confirmUser']))
					{
					$id =$_GET['confirmUser'];
									
					$query = "update `tbl_user` set request=0 WHERE id =$id";
					$del = $db->update($query);
						if($del)
						 {
						 echo "<snap class ='sussess'>User Request Aproved Sussessfully !</snap>";					 
						 }					 
						 else{
						 echo "<snap class ='error'>User Not Deleted !</snap>";
						 }
					}

					?>
					
					<div class="block">  
						<table class="data display datatable" id="example">
						<thead>
							<tr>
								<th>Serial No</th>
								<th>Post title</th>
								<th>Image</th>
								<th>User</th>
								<th>Rate</th>
							</tr>
						</thead>
						<tbody>
						
					<?php
						$id=$_SESSION["id"];
						$q="select * from tbl_post";
						$cat=$db->select($q);
						$i=0;
						While($row=$cat->fetch_assoc())
						{$i++;
							//(for $o=0;$o<1;$o++)
							//{
							//	$q1="select * from tbl_rating where pid=$pp";
							//}
					
							 $pp=$row["id"];
							$q1="select * from tbl_rating where pid=$pp";
						
							//$q1="select name, from tbl_rating where pid=$pp";
							if($cat1=$db->select($q1)){
							
							if($cat1->num_rows > 0){
							While($row1=$cat1->fetch_assoc())
						{
							$q2="select name from tbl_user where id=".$row1["uid"]."";
							$cat2=$db->select($q2);
							$dd=$cat2->fetch_assoc();
							?>
							<tr class="odd gradeX">
								 <td><?php echo $i;?></td>
							 <td><b><?php echo $row['title'];?></b></td>
								<td><img src="<?php echo $row['image'];?>" alt="post image" height="120" width="100"/></td>
								
								<td><?php echo $dd['name'];?></td>
								 <td><?php echo $row1['rating'];?></td>
							</tr>
							<?PHP
							
						}}
							}		
						}
						
						
					?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
</div>

<?php include 'inc/footer.php';?>
