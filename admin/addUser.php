<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
if(!session::get("userRole") == '0')
	{ 
	echo "<script>window.location = 'index.php'</script>";
	}
?>
     <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New User</h2>
              
			   <?php 
			 if(isset($_POST['submit']))
			{
			
			$name = $fm ->validation($_POST['name']);
			$userName = $fm ->validation($_POST['userName']);
			$password = $fm ->validation(md5($_POST['password']));
			$email = $fm ->validation($_POST['email']);		
			$role = 2;
			
			$name = mysqli_real_escape_string($db->link,$name);
			$userName = mysqli_real_escape_string($db->link,$userName);
			$password = mysqli_real_escape_string($db->link,$password);
			$email = mysqli_real_escape_string($db->link,$email);			
			$details = mysqli_real_escape_string($db->link,$_POST['details']);
			$role = mysqli_real_escape_string($db->link,$role);
			
             
			 if(empty($name) || empty($userName) || empty($password)  || empty($details) || empty($email))
			 {		 
			 echo "<snap class ='error'>Field must not be empty!!!</snap>";
			 }else{
			 $mailquery = "SELECT * FROM  `tbl_user` WHERE `email` = '$email' LIMIT 1";
			 $malcheck = $db->select($mailquery);
		
				 if($malcheck != false)
				 {
				  echo "<snap class ='error'>Email Already Exist!!!</snap>";
				 }else{
						 $query = "INSERT INTO `tbl_user` (`name`,`username`, `password`, `email`, `details`, `role`) VALUES (
						 '$name',
						 '$userName',
						 '$password',
						 '$email',
						 '$details',
						 '$role'			 
						 )";
						 $catInsert = $db->insert($query);
							 if($catInsert){
							 echo "<snap class ='sussess'>User Created Sussessfully !</snap>";
							 }else{
							 echo "<snap class ='error'>User Not Created !</snap>";
							 }
							 
						 }			
						
				    }
	}		
?>

         <form action="addUser.php" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
							<td>
                               <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" name="userName" placeholder="Enter User Name..." class="medium" />
                            </td>
                        </tr>
						<tr>
							<td>
                               <label>Full Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" placeholder="Enter User Full Name..." class="medium" />
                            </td>
                        </tr>
						
						<tr>
							<td>
                               <label>User Password</label>
                            </td>
                            <td>
                                <input type="text" name="password" placeholder="Enter User Password..." class="medium" />
                            </td>
                        </tr>
						
			
						
						<tr>
							<td>
                               <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" placeholder="Enter User Email..." class="medium" />
                            </td>
                        </tr>
						
						<tr>
							<td>
                               <label>Details</label>
                            </td>
                            <td> 
							<textarea class="tinymce" name="details"></textarea>
                            </td>
                        </tr>
						<tr>
							<td>
                               
                            </td>
                            
                        </tr>
						<tr>
							<td></td> 
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
       
        </div>
	
	  <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>	
<?php include 'inc/footer.php';?>
			$role = mysqli_real_escape_string($db->link,$role);
			
             
			 if(empty($name) || empty($userName) || empty($password)  || empty($details) || empty($email))
			 {		 
			 echo "<snap class ='error'>Field must not be empty!!!</snap>";
			 }else{
			 $mailquery = "SELECT * FROM  `tbl_user` WHERE `email` = '$email' LIMIT 1";
			 $malcheck = $db->select($mailquery);
		
				 if($malcheck != false)
				 {
				  echo "<snap class ='error'>Email Already Exist!!!</snap>";
				 }else{
						 $query = "INSERT INTO `tbl_user` (`name`,`username`, `password`, `email`, `details`, `role`) VALUES (
						 '$name',
						 '$userName',
						 '$password',
						 '$email',
						 '$details',
						 '$role'			 
						 )";
						 $catInsert = $db->insert($query);
							 if($catInsert){
							 echo "<snap class ='sussess'>User Created Sussessfully !</snap>";
							 }else{
							 echo "<snap class ='error'>User Not Created !</snap>";
							 }
							 
						 }			
						
				    }
	}		
?>

         <form action="addUser.php" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
							<td>
                               <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" name="userName" placeholder="Enter User Name..." class="medium" />
                            </td>
                        </tr>
						<tr>
							<td>
                               <label>Full Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" placeholder="Enter User Full Name..." class="medium" />
                            </td>
                        </tr>
						
						<tr>
							<td>
                               <label>User Password</label>
                            </td>
                            <td>
                                <input type="text" name="password" placeholder="Enter User Password..." class="medium" />
                            </td>
                        </tr>
						
			
						
						<tr>
							<td>
                               <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" placeholder="Enter User Email..." class="medium" />
                            </td>
                        </tr>
						
						<tr>
							<td>
                               <label>Details</label>
                            </td>
                            <td> 
							<textarea class="tinymce" name="details"></textarea>
                            </td>
                        </tr>
						<tr>
							<td>
                               <label>User Roll</label>
                            </td>
                            <td>
  							    <select id="select" name="role">
								<option>Select User Role</option>
								<option value="0">Admin</option>
								<option value="1">Author</option>
								<option value="2">Editor</option>
								</select>
                               
                            </td>
                        </tr>
						<tr>
							<td></td> 
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
       
        </div>
	
	  <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>	
<?php include 'inc/footer.php';?>
			$role = mysqli_real_escape_string($db->link,$role);
			
             
			 if(empty($name) || empty($userName) || empty($password)  || empty($details) || empty($email))
			 {		 
			 echo "<snap class ='error'>Field must not be empty!!!</snap>";
			 }else{
			 $mailquery = "SELECT * FROM  `tbl_user` WHERE `email` = '$email' LIMIT 1";
			 $malcheck = $db->select($mailquery);
		
				 if($malcheck != false)
				 {
				  echo "<snap class ='error'>Email Already Exist!!!</snap>";
				 }else{
						 $query = "INSERT INTO `tbl_user` (`name`,`username`, `password`, `email`, `details`, `role`) VALUES (
						 '$name',
						 '$userName',
						 '$password',
						 '$email',
						 '$details',
						 '$role'			 
						 )";
						 $catInsert = $db->insert($query);
							 if($catInsert){
							 echo "<snap class ='sussess'>User Created Sussessfully !</snap>";
							 }else{
							 echo "<snap class ='error'>User Not Created !</snap>";
							 }
							 
						 }			
						
				    }
	}		
?>

         <form action="addUser.php" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
							<td>
                               <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" name="userName" placeholder="Enter User Name..." class="medium" />
                            </td>
                        </tr>
						<tr>
							<td>
                               <label>Full Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" placeholder="Enter User Full Name..." class="medium" />
                            </td>
                        </tr>
						
						<tr>
							<td>
                               <label>User Password</label>
                            </td>
                            <td>
                                <input type="text" name="password" placeholder="Enter User Password..." class="medium" />
                            </td>
                        </tr>
						
			
						
						<tr>
							<td>
                               <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" placeholder="Enter User Email..." class="medium" />
                            </td>
                        </tr>
						
						<tr>
							<td>
                               <label>Details</label>
                            </td>
                            <td> 
							<textarea class="tinymce" name="details"></textarea>
                            </td>
                        </tr>
						<tr>
							<td>
                               <label>User Roll</label>
                            </td>
                            <td>
  							    <select id="select" name="role">
								<option>Select User Role</option>
								<option value="0">Admin</option>
								<option value="1">Author</option>
								<option value="2">Editor</option>
								</select>
                               
                            </td>
                        </tr>
						<tr>
							<td></td> 
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
       
        </div>
	
	  <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>	
<?php include 'inc/footer.php';?>