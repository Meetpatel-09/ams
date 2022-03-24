<?php
	$title = "View Admin";
?>
<?php
	require_once "config.php";
	include ('masterPage/header.php');

	// if (isset($_SESSION['adminEmail'])) {
?>

<div>
	<div style="margin-top: 15px;">
        <h3 style="text-align: center">Staff Details</h3>
	</div>
    <div class="form-design">
        <div class="container">
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-10">
                    <div style="text-align: center">
                        <table width="100%" border="1" bordercolor="#000000">
                        <tbody>
                                <tr>
                                    <th width="9%" scope="col">Photo</th>
                                    <th width="17%" scope="col">Name</th>
                                    <th width="11%" scope="col">Branch</th>
                                    <th width="13%" scope="col">Type</th>
                                    <th width="19%" scope="col">Email</th>
                                    <th width="15%" scope="col">Number</th>
                                    <th width="16%" scope="col">Remove</th>
                                </tr>
                                <?php
                                    $sql1 = mysqli_query($conn, "SELECT * FROM staff");
                                    while($row = mysqli_fetch_array($sql1)) {
                                ?>
                                <tr>
                                    <td height="104"><img src="staffPhoto/<?php echo $row['photo'] ?>" width="100" height="100" alt=""/></td>
                                    <td><?php echo $row['f_name'] ?></td>
                                    <td><?php echo $row['b_name'] ?></td>
                                    <td><?php echo $row['type'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['p_number'] ?></td>
                                    <td><button type="button" class="btn btn-danger">Remove</button></td>
                                </tr>
                                <?php } ?>
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-1">
                </div>
            </div>
        </div>
    </div>
   
</div>
<?php
	// } else {
	// 	header("location: index.php");
	// }
	include ('masterPage/footer.php');
?>