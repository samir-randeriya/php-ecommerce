<?php
include '../lib/session.php';
include '../lib/nev.php';
session::ckeckSession();
?>
<?php include '../config/config.php';?>
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

<?php
if(!isset ($_GET['delPostid']) || $_GET['delPostid'] == NULL )
{
echo "<script>window.location = 'postlist.php';</script>";
}else
{
		$delPostid = $_GET['delPostid'];
		
		$query = "SELECT * FROM `tbl_post` WHERE `id` = '$delPostid'";
		$getData = $db->select($query);
		
				if($getData)
				{
							while($delImag = $getData->fetch_assoc())
							{
							$delLink = $delImag['image'];
							//echo $delLink;
							unlink($delLink);
							}
				
				}
		
				$delquery = "delete FROM `tbl_post` WHERE `id` = '$delPostid'";
				$delData = $db->delete($delquery);
				if($delData)
				{
				echo "<script>alert('Data Deleted Successfully.');</script>";
				echo "<script>window.location = 'postlist.php';</script>";
				}else
				{
				echo "<script>alert('Data Not Deleted.');</script>";
				echo "<script>window.location = 'postlist.php';</script>";
				}
		


}
?>