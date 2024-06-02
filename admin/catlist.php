<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
				<?php 
				if (isset($_GET['delcat']))
				{
				$id =$_GET['delcat'];
								
				$query = "DELETE FROM  `tbl_category` WHERE id =$id";
				$del = $db->delete($query);
					if($del)
					 {
					 echo "<snap class ='sussess'>Catagory Deleted Sussessfully !</snap>";					 
					 }					 
					 else{
					 echo "<snap class ='error'>Catagory Not Deleted !</snap>";
					 }
				}
				?>
				
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No</th>
							<th>Category</th>							
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$query = "SELECT * FROM  `tbl_category` order by ID desc";
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
							<td><a href="editcat.php?catid=<?php echo $result['id'];?>">Edit</a> || <a  onclick="return confirm('Are you sure to Delete!!')"  href="?delcat=<?php echo $result['id'];?>">Delete</a></td>
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