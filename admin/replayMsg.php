<?php require 'mailerClass/PHPMailerAutoload.php';?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
if(!isset ($_GET['msgid']) || $_GET['msgid'] == NULL )
{
echo "<script>window.location = 'inbox.php'</script>";
}else
{
$id = $_GET['msgid'];
}
?>
<?php 
if(isset($_POST['back']))
{						
echo "<script>window.location = 'inbox.php'</script>";
}
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Message</h2>
				
<?php 
if(isset($_POST['back']))
{						
echo "<script>window.location = 'inbox.php'</script>";
}	

if(isset($_POST['submit']))
{						
				$to      = mysqli_real_escape_string($db->link,$_POST['toEmail']);
				$from    = "daily News Service";
				$subject ="Daily News Service";
				$message = mysqli_real_escape_string($db->link,$_POST['message']);
				
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
					   $mail ->AddAddress($to);

					   if(!$mail->Send())
					   {
						   echo "<snap class ='sussess'>Something went Wrong!</snap>";	
							echo "$mail->ErrorInfo";
					   }
					   else
					   {
						   echo "<snap class ='sussess'>Reply Send Sussessfully!</snap>";	
							
					   }
				

				


}



?>
				
				
				
                <div class="block"> 
				
<?php 

$query = "SELECT * FROM `tbl_contact` WHERE id = '$id' order by id desc";
$catSelect = $db->select($query);
while($result = $catSelect->fetch_assoc())
{
?>

                 <form action="" method="post">
                    <table class="form">
						
						 <tr>
							<td>
                            <label>To</label>
                            </td>
                            <td>
                            <input type="text"  readonly name="toEmail" value= "<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                            <label>Message</label>
                            </td>
                            <td>
                            <textarea readonly class="tinymce" name="message"></textarea>
                            </td>
                        </tr>
						<tr>
                            <td>
							</td>
                            <td>
                            <input type="submit" name="submit" Value="Send" />
							 <input type="submit" name="back" Value="Back" />
                            </td>
                        </tr>
                    </table>
                    </form>
					<?php }?>
                </div>
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

