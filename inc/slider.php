<div class="slidersection templete clear">
        <div id="slider">
		<?php 
		$query = "SELECT * FROM  `tbl_slider` order by ID desc";
					$slider = $db->select($query);
					$i=0;
					while($result = $slider->fetch_assoc())
					{
					$i++;					
		?><center>
            <a href="#"><img src= "admin/<?php echo $result['image'];?>" alt="nature 1" title="<?php echo $result['title'];?>" /></a>
			</center>
         <?php }  ?>
        </div>

</div>