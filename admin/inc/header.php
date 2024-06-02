<?php
include '../lib/session.php';
include '../lib/nev.php';
session::ckeckSession();
error_reporting(0);

?>
<?php //include '../config/config.php';?>
<?php include '../lib/database.php';?>
<?php include '../helpers/format.php';?>
<?php $db = new Database();?>
<?php $fm = new format();?>

<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Location" content="http://zsoft.com.bd/">
<link rel="shortcut icon" href="img/favicon.ico">
<title>Admin Panel </title>
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
<link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
<!-- BEGIN: load jquery -->
<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
<script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
<script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
<!-- END: load jquery -->
<script type="text/javascript" src="js/table/table.js"></script>
<script src="js/setup.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>
</head>
<body>
<div class="container_12">
<div class="grid_12 header-repeat">
  <div id="branding">
    <div class="floatleft logo"> <img src="img/logo2.jpg" alt="Logo" /> </div>
    <div class="floatleft middle">
      <h1>Dashboard</h1>
      <p>Do something different</p>
    </div>
    <div class="floatright">
      <div class="floatleft"> <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
	 
      <?php
		if(isset($_GET['action']) && $_GET['action'] == "logout")
		{
		session::destroy();
		}
		?>
      <div class="floatleft marginleft10">
        <ul class="inline-ul floatleft">
          <li>Hello "<?php 
		  $name = session::get("name");
		  echo $name;?>"</li>
          <li><a href="?action=logout">Logout</a></li>
        </ul>
      </div>
    </div>
    <div class="clear"> </div>
  </div>
</div>
<div class="clear"> </div>
<div class="grid_12">
  <ul class="nav main">
    <li class="ic-dashboard"><a href="../index.php"><span>Home</span></a> </li>
    
    <li class="ic-form-style"><a href="profile.php"><span>User Profile</span></a></li>
    <li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
    
	<?php 
	if(session::get("userRole") == '0')
	{ ?>
<li class="ic-charts"><a href="userList.php"><span>User List</span></a></li>
		<li class="ic-dashboard"><a href="likeandcomment.php"><span>Rating</span></a></li>
			<li class="ic-form-style"><a href="comment.php"><span>Comment</span></a></li>
<li class="ic-grid-tables"><a href="inbox.php"><span>Inbox
	<?php
	       $query = "SELECT  * FROM `tbl_contact` WHERE status = 0 order by id desc ";
		   $cat = $db->select($query);
		   if($cat){
		   $count = mysqli_num_rows($cat);
		   echo "(".$count.")";
		   }
	?>
	
	</span></a></li>
	 <li class="ic-charts"><a href="newrequest.php"><span>View Request</span></a></li>
	 <li class="ic-charts"><a href="addUser.php"><span>Add User</span></a></li>
	
<?php  } ?>
   
	
	  </ul>
</div>
<div class="clear"> </div>

