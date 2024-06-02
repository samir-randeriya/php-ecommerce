<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Slider List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th>Slider Title</th>							
							<th>Slider Image</th>							
							<th>Action</th>
						</tr>
						
					</thead>
					<tbody>
					<?php 
					$query = "SELECT * FROM tbl_slider";
					$cat = $db->select($query);
					if($cat)
					{
					$i=0;
					while($result = $cat->fetch_assoc())
					{
					$i++;
					?>
						<tr align="center" valign="top" class="odd gradeX">
					
							<td><?php echo $i;?></td>
							<td><?php echo $result['title'];?></td>
							<td><img src="<?php echo $result['image'];?>" alt="post image" height="120" width="300"/></td>							
							<td>
					<?php 
					if(session::get("userRole") == '0') 					
					{ 
					?> 
					<a href="editSlider.php?editSliderid=<?php echo $result['id'];?>">Edit</a>
					|| <a onclick="return confirm('Are you sure to Delete!!')"  href="delslider.php?sliderId=<?php echo $result['id'];?>">Delete</a>
					
					<?php }?>
					</td>
						
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

