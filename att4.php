<?php
	$title = "Fill Attedance";
?>
<?php
	require_once "config.php";
	include ('MasterPage/header.php');

    $b_name = $_SESSION['branch'];
    $semester = $_SESSION['semester'];
    $division = $_SESSION['division'];

    $day = $_SESSION["day"];
    $slotNumber = $_SESSION["slotNumber"];
    $slotType = $_SESSION["slotType"];
    $id = $_SESSION["staffId"];

    $date = $_SESSION["date"];

    $subjects = $_SESSION["subjects"];

?>
	<div style="margin-top: 15px;">
        <h3 style="text-align: center"></h3>
	</div>
    <div class="form-design">
        <div class="container">
            <div class="row">
            <div class="col-sm-1">
                </div>
                <div class="col-sm-10">
                    <div style="text-align: center">
                        <form action="" method="post" enctype="multipart/form-data">
                            <table width="100%" border="1">
                            <tbody>
                                <tr>
                                    <th width="9%" scope="col">Photo</th>
                                    <th width="13%" scope="col">Enrollment</th>
                                    <th width="17%" scope="col">Name</th>
                                    <th width="11%" scope="col">Branch</th>
                                    <th width="7%" scope="col">Semester</th>
                                    <th width="6%" scope="col">Division</th>
                                    <!-- <th width="15%" scope="col">Number</th> -->
                                    <th width="11%" scope="col">Present</th>
                                    <th width="11%" scope="col">Change</th>
                                </tr>
                                <?php
                                    $sql1 = mysqli_query($conn, "SELECT DISTINCT attedance.enrollment, attedance.att, attedance.aid, students.* FROM attedance JOIN students WHERE attedance.enrollment = students.enrollment AND students.branch='$b_name' AND students.semester='$semester' AND students.division='$division' AND date='$date' AND subject='$subjects' AND staff='$id' AND slot_type='$slotType' AND slot_number='$slotNumber' ORDER BY attedance.enrollment ");
                                    while($row = mysqli_fetch_array($sql1)) {
                                ?>
                                <tr>
                                    <td height="104"><img src="studentPhoto/<?php echo $row['photo'] ?>" width="100" height="100" alt=""/></td>
                                    <?php $aid = $row['aid']; ?>
                                    <td><?php echo $row['enrollment']; ?></td>
                                    <td><?php echo $row['f_name']; ?></td>
                                    <td><?php echo $row['branch']; ?></td>
                                    <td><?php echo $row['semester']; ?></td>
                                    <td><?php echo $row['division']; ?></td>
                                    <td> <?php echo $row['att']; ?> </td>
                                    <!-- <input type="text" class="form-control" id="atts" name="atts" value=" -->
                                    <td>
                                        <a href="test.php?id=<?php echo $aid ?>" type="submit" class="btn btn-success" style="margin-top: 15px;">P</a> <a href="test2.php?id=<?php echo $aid ?>" type="submit" class="btn btn-danger" style="margin-top: 15px;">A</a>
                                    </td>
                                </tr>
                                <?php
                                }                       
                                ?>
                            </tbody>
                            </table>
                            <a href="staffHome.php" type="submit" class="btn btn-primary" style="margin-top: 15px;">Done</a>
                        </form>
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