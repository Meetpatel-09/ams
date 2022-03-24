<?php
	$title = "View Attedance";
?>
<?php
	require_once "config.php";
	include ('MasterPage/header.php');

    $branch = $_SESSION["branch"];
    $semester = $_SESSION["semester"];
    $division = $_SESSION["division"];
    $date1 = $_SESSION["inputdate1"];
    $date2 = $_SESSION["inputdate2"];
    $date1 = $_SESSION["inputdate1"];
    $date2 = $_SESSION["inputdate2"];

?>

    <div style="margin-top: 15px;">
        <h3 style="text-align: center"></h3>
	</div>
    <div class="form-design">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8">
                    <div style="margin-top: 15px;">
                    </div>
                    <div>
                    <table border="1" bordercolor="#ffffff">
                    <tbody>
                        <tr>
                            <th class="style3">Enrollment</th>     
                            <th class="style3">Name</th>
                            <th class="style3">Present</th>
                            <th class="style3">Absent</th>
                            <th class="style3">Total</th>
                            <th class="style3">View Single</th>
                        </tr>

<?php


    $sql1 = mysqli_query($conn, "SELECT * FROM students WHERE b_name='$branch' AND semester='$semester' AND division='$division' ORDER BY enrollment");
    while($row = mysqli_fetch_array($sql1)) {
    $enr =  $row['enrollment'];
    $sql3 = "SELECT attedance.*, students.* FROM attedance JOIN students WHERE attedance.enrollment = students.enrollment AND attedance.enrollment = {$enr} AND DATE between '$date1' and '$date2' ORDER BY attedance.enrollment";
    $result3 = mysqli_query($conn, $sql3);
    $present3 = 0;
    $absent3 = 0;
    $total3;

    if (mysqli_num_rows($result3) > 0) {
        while ($row3 = mysqli_fetch_assoc($result3)) {
            if ($row3['att'] == "Present") {
                $present3++;
            }
            if ($row3['att'] == "Absent") {
                $absent3++;
            }
            $fname3 = $row3['f_name'];
            $branch3 = $row3['branch'];
            $semester3 = $row3['semester'];
            $division3 = $row3['division'];
            $batch3 = $row3['batch'];
        }
    }
    $total3 = $present3 + $absent3;

?>

                        <tr>
                            <td class="style3"><?php echo $enr; ?></td>
                            <td class="style3"><?php echo $fname3; ?></td>
                            <td class="style3"><?php echo $present3; ?></td>
                            <td class="style3"><?php echo $absent3; ?></td>
                            <td class="style3"><?php echo $total3; ?></td>
                            <td class="style3">
                                <a href="viewAtt3s.php?enr=<?php echo $enr; ?>" type="submit" class="btn btn-primary">View</a>
                            </td>
                        </tr>
<?php

    }

?>
	                </tbody>
                    </table>
                    </div>
				</div>
                <div class="col-sm-2">
                </div>
            </div>
        </div>
    </div>

<?php
	include ('MasterPage/footer.php');
?>
?>

<?php
	include ('MasterPage/footer.php');
?>