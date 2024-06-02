<?php ob_start();?>
</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	  <?php 
				$query = "Select * FROM  tbl_footer WHERE id = 1";
				$blog_taitle = $db->select($query);
				if($blog_taitle)
				{
				while($result = $blog_taitle->fetch_assoc())
					{
				?> 
	  <p>&copy; <?php echo $result['note']; echo date('Y');?></p>
	  
	  <?php }}?>
	</div>
	
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>
<?php
ob_flush();
?>