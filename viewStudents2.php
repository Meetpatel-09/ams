<?php
	$title = "View Students";
?>
<?php
	require_once "config.php";
	include ('MasterPage/header.php');
?>
	<div style="margin-top: 15px;">
        <h3 style="text-align: center">Student Details</h3>
	</div>
    <div class="form-design">
        <div class="container">
            <div class="row">
                <div class="col-sm-0">
                </div>
                <div class="col-sm-12">
                    <div style="text-align: center">
                        <table width="100%" border="1" bordercolor="#000000">
                        <tbody>
                                <tr>
                                    <th width="9%" scope="col">Photo</th>
                                    <th width="11%" scope="col">Enrollment</th>
                                    <th width="14%" scope="col">Name</th>
                                    <th width="11%" scope="col">Branch</th>
                                    <th width="7%" scope="col">Semester</th>
                                    <th width="6%" scope="col">Division</th>
                                    <th width="6%" scope="col">Batch</th>
                                    <th width="15%" scope="col">Email</th>
                                    <th width="10%" scope="col">Number</th>
                                    <th width="10%" scope="col">Remove</th>
                                </tr>
                                <?php
                                    $param_b_name = $_SESSION['branch'];
                                    $param_semester = $_SESSION['semester'];
                                    $param_division = $_SESSION["division"];  
                                    
                                    $sql1 = mysqli_query($conn, "SELECT * FROM students WHERE b_name='$param_b_name' AND semester='$param_semester' AND division='$param_division' ORDER BY enrollment");
                                    while($row = mysqli_fetch_array($sql1)) {
                                ?>
                                <tr>
                                    <td height="104"><img src="studentPhoto/<?php echo $row['photo'] ?>" width="100" height="100" alt=""/></td>
                                    <td><?php echo $row['enrollment'] ?></td>
                                    <td><?php echo $row['f_name'] ?></td>
                                    <td><?php echo $row['b_name'] ?></td>
                                    <td><?php echo $row['semester'] ?></td>
                                    <td><?php echo $row['division'] ?></td>
                                    <td><?php echo $row['sbatch'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['p_number'] ?></td>
                                    <td><button type="button" class="btn btn-danger">Remove</button></td>
                                </tr>
                                <?php } ?>
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-0">
                </div>
            </div>
        </div>
    </div>
<?php
	include ('MasterPage/footer.php');
?>