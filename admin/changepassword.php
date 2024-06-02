<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
if (isset($_REQUEST['submit'])) {
    $old = $fm->validation($_REQUEST['title']);
    $new = $fm->validation($_REQUEST['slogan']);

    $old = mysqli_real_escape_string($db->link, md5($old));
    $new = mysqli_real_escape_string($db->link, md5($new));
    $username = $_SESSION['username'];
    
    $query = "SELECT * FROM  `tbl_user` WHERE `username` = '$username' AND `password` = '$old'";
    $result = $db->select($query);
    if ($result != false) {
        $query1 = "update `tbl_user` set password='$new' WHERE username='$username'";
        $del = $db->update($query1);
        if ($del) {
            echo "<snap class ='sussess'>Password changed Sussessfully !</snap>";
        } else {
            echo "<snap class ='error'>password is not changed! please try again</snap>";
        }
    }
} else {
    echo "<snap style ='color: red ; font-size:18px;'>make sure your password is relavannt...</snap>";
}
?>
<?php
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Change Password</h2>
        <div class="block">               
            <form>
                <table class="form">					
                    <tr>
                        <td>
                            <label>Old Password</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Enter Old Password..."  name="title" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>New Password</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Enter New Password..." name="slogan" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
