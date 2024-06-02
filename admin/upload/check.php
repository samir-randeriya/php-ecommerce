<?php
include '../lib/session.php';
session :: init();
?>
<?php include '../config/config.php';?>
<?php include '../lib/database.php';?>
<?php include '../helpers/format.php';?>
<?php $db = new Database();?>
<?php $fm = new format();?>

<head>
<meta charset="utf-8">
<title>Login :: Daily News Service</title>
<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
<link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
<div class="container">
<section id="content">
<?php 
if(isset($_POST['submit']))
{
$username = $fm ->validation($_POST['username']);
$password = $fm ->validation($_POST['password']);


$username = mysqli_real_escape_string($db->link,$username);
$password = mysqli_real_escape_string($db->link,md5($password));

$query = "SELECT * FROM  `tbl_user` WHERE 	`username` = '$username' AND `password` = '$password';
$result = $db->select($query);

if($result != false)
{
			
			//$value = mysqli_fetch_array($result);
			$value = $result -> fetch_assoc();
			session::set("login", true);
			session::set("id",$value['id']);
			session::set("username",$value['username']);
			session::set("name",$value['name']);
		    session::set("email",$value['email']);
			session::set("userRole",$value['role']);
			header("Location: ../index.php");
			
			
			}else{
				
echo "<snap style ='color: red ; font-size:18px;'>Username  or Password Not matched</snap>";			
}


}

?>
<?php //echo session::get("login");?>
    <form action="login.php" method="post">
      <h1>Login<br><br>Daily news Service</h1>
	  
      <div>
        <input type="text" placeholder="Username"    name="username"/>
      </div>
      <div>
        <input type="password" placeholder="Password" name="password"/>
      </div>
      <div>
        <input type="submit" value="Log in" name="submit" />
      </div>
    </form>
    <!-- form -->
    <div class="button"> <a href="forgotpass.php">Forgot Password </a> </div>
    <!-- button -->
  </section>
  <!-- content -->
</div>
<!-- container  required="" -->
</body>
</html>