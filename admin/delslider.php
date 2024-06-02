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
if(!isset ($_GET['sliderId']) || $_GET['sliderId'] == NULL )
{
echo "<script>window.location = 'sliderlist.php';</script>";
}else
{
		$sliderId = $_GET['sliderId'];
		
		$query = "SELECT * FROM `tbl_slider` WHERE `id` = '$sliderId'";
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
		
				$delquery = "delete FROM `tbl_slider` WHERE `id` = '$sliderId'";
				$delData = $db->delete($delquery);
				if($delData)
				{
				echo "<script>alert('Slider Deleted Successfully.');</script>";
				echo "<script>window.location = 'sliderlist.php';</script>";
				}else
				{
				echo "<script>alert('Slider Not Deleted.');</script>";
				echo "<script>window.location = 'sliderlist.php';</script>";
				}
		


}
?>