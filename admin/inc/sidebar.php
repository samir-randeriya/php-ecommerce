<?php
?>
 <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                       <?php 
	if(session::get("userRole") == '0')
	{ ?>
						
                         <li><a class="menuitem">Page Option</a>
                            <ul class="submenu">
                                 <li><a href="addPage.php">Add New Page</a> </li>
                                <?php 
				$query = "Select * FROM  tbl_page";
				$blog_taitle = $db->select($query);
				if($blog_taitle)
				{
				while($result = $blog_taitle->fetch_assoc())
					{
				?>
				 <li><a href="page.php?pageid=<?php echo $result['id'];?>"> &nbsp;&nbsp;--<?php echo $result['name'];?></a> </li>
				 
				 <?php }}?> 
                            </ul>
                        </li>
                        <li><a class="menuitem">Category Option</a>
                            <ul class="submenu">
                                <li><a href="addcat.php">Add Category</a> </li>
                                <li><a href="catlist.php">Category List</a> </li>
                            </ul>
                        </li>
        <?php }?>
						
                        <li><a class="menuitem">Post Option</a>
                            <ul class="submenu">
                                <li><a href="addpost.php">Add Post</a> </li>
                                <li><a href="postlist.php">Post List</a> </li>
                            </ul>
                        </li>
						<li><a href="product.php">Add product</a><li>
						<li><a href="cat.php">Add category</a><li>

					</ul>
					
                </div>
            </div>
        </div>

