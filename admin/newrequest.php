<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
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
							<th>Name</th>
							<th>User Name</th>
							<th>Email</th>
							<th>Details</th>
							<th>Role</th>	
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$query = "SELECT * FROM  `tbl_user` where request= 1 order by ID desc ";
					$cat = $db->select($query);
					if($cat)
					{
					$i=0;
					while($result = $cat->fetch_assoc())
					{
					$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td><?php echo $result['username'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textShorten($result['details'],50);?></td>
							<td>
							<?php							 
							if($result['role'] == '0')
							{
							echo 'Admin'; 
							}
							elseif($result['role'] == '1'){
							echo 'Author'; 
							 }elseif($result['role'] == '2'){
							echo 'Editor'; 
							 }else{
							echo ''; 
							 }
							?>
		
							
							</td>
							<td><a href="viewUser.php?userid=<?php echo $result['id'];?>">View</a> 
							
					<?php 
					if(session::get("userRole") == '0')
					{ ?>	 
				 ||<a  onclick=""  href="?confirmUser=<?php echo $result['id'];?>">Confirm  </a><a  onclick="return confirm('Are you sure to Delete!!')"  href="?delUser=<?php echo $result['id'];?>">Delete</a></td>
				 <?php  } ?>
						</tr>
						
					<?php }} ?>	
					</tbody>
				</table>
				</div>
            </div>
        </div>
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
               
<?php include 'inc/footer.php';?>