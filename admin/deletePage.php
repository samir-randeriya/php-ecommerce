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
if(!isset ($_GET['pageid']) || $_GET['pageid'] == NULL )
{
echo "<script>window.location = 'index.php';</script>";
}else
{
		$pageid = $_GET['pageid'];
		
		
		
				$delquery = "Delete FROM `tbl_page` WHERE `id` = '$pageid'";
				$delData = $db->delete($delquery);
				if($delData)
				{
				echo "<script>alert('Page Deleted Successfully.');</script>";
				echo "<script>window.location = 'index.php';</script>";
				}else
				{
				echo "<script>alert('Page Not Deleted.');</script>";
				echo "<script>window.location = 'index.php';</script>";
				}
		


}
?>