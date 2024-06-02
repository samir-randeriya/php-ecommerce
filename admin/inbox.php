<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Inbox</h2>
				<?php 
			if(isset ($_GET['senid']))
			{
			$id = $_GET['senid'];
			
				 $query_update = "UPDATE tbl_contact
						   SET
						   status = '1'
						   WHERE id= '$id'";
				 $updaterow = $db->update($query_update);
					 if($updaterow)
					 {
					 echo "<snap class ='sussess'>Measseage Send To Seen Box!</snap>";					 
					 }					 
					 else{
					 echo "<snap class ='error'>Measseage Not send to Seen Box!!</snap>";
				}	 }
			?>

    <div class="block">
      <table class="data display datatable" id="example">
        <thead>
          <tr>
            <th>Serial No.</th>
            <th>Name</th>
			<th>Email</th>
			<th>Message</th>
			<th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
		            <?php 
                     $query = "SELECT  * FROM `tbl_contact` WHERE status = 0 order by id desc ";
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
           <td><?php echo $result['firstname'].'  '.$result['lastname'];?></td>			
			<td><?php echo $fm->textShorten($result['email'], 10);?></td>
			<td><?php echo $fm->textShorten($result['body'] , 30);?></td>
			<td><?php echo $fm->formatDate($result['date']);?></td>
			
            <td>
			<a href="viewMsg.php?msgid=<?php echo $result['id'];?>">View</a> ||
			<a href="replayMsg.php?msgid=<?php echo $result['id'];?>">Reply</a> ||
			<a onclick="return confirm('Are You Sure You Want to Move the Message!!')" href="?senid=<?php echo $result['id'];?>">Seen</a>
			</td>			
			<?php }} ?>	
          </tr>
          
     
        </tbody>
      </table>
    </div>
  </div>
  
  
  
  <div class="box round first grid">
    <h2>Seen Box</h2>
			<?php 
				if (isset($_GET['delid']))
				{
				$id =$_GET['delid'];
								
				$query = "DELETE FROM  `tbl_contact` WHERE id =$id";
				$del = $db->delete($query);
					if($del)
					 {
					 echo "<snap class ='sussess'>Message Deleted Sussessfully !</snap>";					 
					 }					 
					 else{
					 echo "<snap class ='error'>Message Not Deleted !</snap>";
					 }
				}
			?>
    <div class="block">
      <table class="data display datatable" id="example">
        <thead>
          <tr>
            <th>Serial No.</th>
            <th>Name</th>
			<th>Email</th>
			<th>Message</th>
			<th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
		
		 <?php 
                    $query = "SELECT  * FROM `tbl_contact` WHERE `status` = 1 order by id desc ";
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
           <td><?php echo $result['firstname'].'  '.$result['lastname']; ?></td>			
			<td><?php echo $fm->textShorten($result['email'], 10); ?></td>
			<td><?php echo $fm->textShorten($result['body'] , 30); ?></td>
			<td><?php echo $fm->formatDate($result['date']); ?></td>
            <td>
			<a href="viewMsg.php?msgid=<?php echo $result['id'];?>">View</a> ||
			<a onclick="return confirm('Are you sure to Delete!!')" href="?delid=<?php echo $result['id'];?>">Delete</a> 
			<?php }} ?>	
			</td>
          </tr>
          
     
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
