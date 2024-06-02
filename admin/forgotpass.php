<?php
 require 'mailerClass/PHPMailerAutoload.php';
include '../lib/session.php';
session :: init();
?>
<?php include '../config/config.php';?>
<?php include '../lib/database.php';?>
<?php include '../helpers/format.php';?>
<?php $db = new Database();?>
<?php $fm = new format();?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Password Recovery</title>
<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
<link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
<div class="container">
<section id="content">
<?php 
if(isset($_POST['submit']))
{

$email = $fm ->validation($_POST['email']);
$email = mysqli_real_escape_string($db->link,$email);
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo  "<snap style ='color: red ; font-size:18px;'>Invalid Email Address</snap>";
}else{


		$mailquery = "SELECT * FROM  `tbl_user` WHERE `email` = '$email' LIMIT 1";
		$malcheck = $db->select($mailquery);

				if($malcheck != false)
				{
				while($value = $malcheck->fetch_assoc()){
				$userid = $value['id'];
					@$usename = $value['username'];
				}
				$text = substr($email,0 ,3 );
				$rand = rand(10000 , 99999);
				$newpass = "$text$rand";
				$password = md5($newpass);
				
				 $query_update = "UPDATE tbl_user
								   SET
								   password = '$password'
								   WHERE id= '$userid'";
					$updaterow = $db->update($query_update);
				
					
				
				$to      = mysqli_real_escape_string($db->link,@$_POST['toEmail']);
				$from    = "daily News Service";
				$subject ="Daily News Service";
				@$message = mysqli_real_escape_string($db->link,$_POST['message']);
				

				
				
					$mail = new PHPMailer();
					$mail ->IsSmtp();
					$mail ->SMTPDebug = 0;
					$mail ->SMTPAuth = true;
					$mail ->SMTPSecure = 'ssl';

					$mail->SMTPOptions = array(
					'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
					)
					);

						$message = 'Your User name is "'.@$usename.'" And Password is "'.$newpass.'" please visit website to login';
					   
					   //$mail ->Host = "tls.gmail.com";
					   $mail->Host = 'smtp.gmail.com';
					   //$mail->Host = 'tls://smtp.gmail.com';
					   $mail ->Port = 465; // or 587
					   $mail ->IsHTML(true);
					   $mail ->Username = "patelpreeta3554@gmail.com";
					   $mail ->Password = "PatelgmaiL5435";
					   $mail ->SetFrom("patelpreeta3554@gmail.com");
					   $mail ->Subject = $subject;
					   $mail ->Body = $message;
					   $mail ->AddAddress($email);

					   if(!$mail->Send())
					   {
							echo "<snap style ='color: green ; font-size:18px;'>Mail Not Send !!!!</snap>";
							echo "$mail->ErrorInfo";
					   }
					   else
					   {
							echo "<snap style ='color: green ; font-size:18px;'>please check your mail for new password !!!</snap>";
							
					   }
		
		
		}else{
		echo "<snap style ='color: red ; font-size:18px;'>Email not Exits !!</snap>";			
		}
		}
}

?>
<?php //echo session::get("login");?>
    <form action="" method="post">
      <h1>Password Recovery</h1>
      <div>
        <input type="text" placeholder="Enter Valid eamil"  name="email"/>
      </div>    
      <div>
        <input type="submit" value="Send" name="submit" />
      </div>
    </form>
    <!-- form -->
    <div class="button"> <a href="login.php">Login</a> </div>
    <!-- button -->
  </section>
  <!-- content -->
</div>
<!-- container  required="" -->
</body>
</html>

