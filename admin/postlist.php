<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th width="10%">Post Title</th>
							<th width="20%">Description</th>
							
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">Tags</th>
							<th width="10%">Date</th>
							<th >Action</th>
						</tr>
						
					</thead>
					<tbody>
					<?php 
					
					
					if(session::get("userRole") == '2')
					{
						$query1="select * from tbl_post where user_id=".$_SESSION["id"];
							
							$cat = $db->select($query1);
                                                        
					if($cat)
					{
					$i=0;
					while($result = $cat->fetch_assoc())
					{
					$i++;
					?>
					<!--id from tbl_post where user_id="ureent";-->
						<tr align="center" valign="top" class="odd gradeX">
					
							<td><?php echo $i;?></td>
							<td><?php echo $result['title'];?></td>
							<td><?php echo $fm->textShorten($result['body'],20);?></td>
                                                        
							<td><img src="<?php echo $result['image'];?>" alt="post image" height="120" width="100"/></td>
							
							<td><?php echo $result['authour'];?></td>
							<td><?php echo $result['tags'];?></td>
							<td><?php echo $result['date'];?></td>
							<td>
				
					
					<a href="viewPost.php?viewPostid=<?php echo $result['id'];?>">View</a>
					<?php
					?> 
					|| <a href="editPost.php?editPostid=<?php echo $result['id'];?>">Edit</a>
					|| <a onclick="return confirm('Are you sure to Delete!!')"  href="delPost.php?delPostid=<?php echo $result['id'];?>">Delete</a>
					<?php ?>
					</td>
						
					<?php }}} 
					
					
					
					//$query1=select id,user_id from tbl_post;
					//$query1= "select user_id from tbl_post";
					else
					{
					$query = "SELECT tbl_post.*,tbl_category.name FROM  `tbl_post` INNER JOIN tbl_category ON tbl_post.cat = tbl_category.id ORDER By tbl_post.title DESC "; 
					$cat = $db->select($query);
					if($cat)
					{
					$i=0;
					while($result = $cat->fetch_assoc())
					{
					$i++;
					?>
					<!--id from tbl_post where user_id="ureent";-->
						<tr align="center" valign="top" class="odd gradeX">
					
							<td><?php echo $i;?></td>
							<td><?php echo $result['title'];?></td>
							<td><?php echo $fm->textShorten($result['body'],20);?></td>
						
							<td><img src="<?php echo $result['image'];?>" alt="post image" height="120" width="100"/></td>
							<td><?php echo $result['authour'];?></td>
							<td><?php echo $result['tags'];?></td>
							<td><?php echo $result['date'];?></td>
							<td>
				
					
					<a href="viewPost.php?viewPostid=<?php echo $result['id'];?>">View</a>
					<?php
					
					
					if(session::get("userRole") == $result['user_id'] || session::get("userRole") == '0') 					
					{ 
					?> 
					|| <a href="editPost.php?editPostid=<?php echo $result['id'];?>">Edit</a>
					|| <a onclick="return confirm('Are you sure to Delete!!')"  href="delPost.php?delPostid=<?php echo $result['id'];?>">Delete</a>
					<?php }?>
					</td>
						
					<?php }}} ?>	
					
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