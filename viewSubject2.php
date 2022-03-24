<?php
	$title = "View Subjects";
?>
<?php
	require_once "config.php";
	include ('MasterPage/header.php');
?>
	<div style="margin-top: 15px;">
        <h3 style="text-align: center">Subjects Details</h3>
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
                                    <th width="26%" scope="col">Subject Name</th>
                                    <th width="24%" scope="col">Subject Code</th>
                                    <th width="24%" scope="col">Remove</th>
                                </tr>
                                <?php
                                    $param_b_name = $_SESSION['branch'];
                                    $param_semester = $_SESSION['semester'];

                                    $sql1 = mysqli_query($conn, "SELECT * FROM subject WHERE b_name='$param_b_name' AND semester='$param_semester'");
                                    while($row = mysqli_fetch_array($sql1)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['s_name'] ?></td>
                                    <td><?php echo $row['s_code'] ?></td>
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
<?php
	include ('MasterPage/footer.php');
?>