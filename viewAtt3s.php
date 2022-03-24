<?php
$title = "View Attedance";
?>
<?php
require_once "config.php";
include('MasterPage/header.php');

if (isset($_SESSION['enrollment'])) {
    $enr = $_SESSION['enrollment'];
    $_SESSION['enrollment'] = null;
} else {
    $enr = $_GET['enr'];
}
$date1 = $_SESSION["inputdate1"];
$date2 = $_SESSION["inputdate2"];
$sql3 = "SELECT attedance.*, students.* FROM attedance JOIN students WHERE attedance.enrollment = students.enrollment AND attedance.enrollment = {$enr} AND DATE between '$date1' and '$date2' ORDER BY attedance.enrollment ";
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
<div class="form-design" style="margin-top: 50px;">
    <div style="margin-top: 15px;">
        <h3 style="text-align: center"></h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-10">
                <div>
                    <h4>Enrollment: <?php echo $enr; ?> &nbsp; &nbsp; Name: <?php echo $fname3; ?> &nbsp; &nbsp; Semester: <?php echo $semester3; ?>
                    &nbsp; &nbsp; Division: <?php echo $division3; ?> &nbsp; &nbsp; Batch: <?php echo $batch3; ?></h4>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <table width="100%" border="1" bordercolor="#ffffff">
                        <tbody style="text-align: center">
                            <tr>
                                <th width="35%" scope="col">Subject Name</th>
                                <th width="10%" scope="col">Present</th>
                                <th width="10%" scope="col">Absent</th>
                                <th width="10%" scope="col">Total</th>
                            </tr>
                            <?php
                            $sql2 = "SELECT * FROM subject WHERE semester = '$semester3' AND b_name = '$branch3'";
                            $result2 = mysqli_query($conn, $sql2);
                            $countsub = 0;
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $countsub++;
                                    echo "<br>";
                                    $sub = $row2['s_name'];
                                    $sql1 = "SELECT attedance.*, students.* FROM attedance JOIN students WHERE attedance.enrollment = students.enrollment AND attedance.enrollment = {$enr} AND attedance.subject = '$sub' AND DATE between '$date1' and '$date2' ORDER BY attedance.enrollment ";
                                    $result = mysqli_query($conn, $sql1);
                                    $present = 0;
                                    $absent = 0;
                                    $total;
                                    $ttotal;

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if ($row['att'] == "Present") {
                                                $present++;
                                            }
                                            if ($row['att'] == "Absent") {
                                                $absent++;
                                            }
                                            $fname = $row['f_name'];
                                            $branch = $row['branch'];
                                            $semester = $row['semester'];
                                            $division = $row['division'];
                                            $batch = $row['batch'];
                                        }
                                    }
                                    $total = $present + $absent;
                            ?>
                                    <tr>
                                        <td><?php echo $sub ?></td>
                                        <td><?php echo $present; ?></td>
                                        <td><?php echo $absent; ?></td>
                                        <td><?php echo $total; ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            <tr>
                                <td><?php echo "Total" ?></td>
                                <td><?php echo $present3; ?></td>
                                <td><?php echo $absent3; ?></td>
                                <td><?php echo $total3; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <center>
                        <?php
                            if(isset($_SESSION['adminEmail'])) {
                        ?>
                        <a href="adminHome.php" type="submit" class="btn btn-primary" style="margin-top: 15px;">Done</a>
                        <?php
                            } else if(isset($_SESSION['staffEmail'])) {
                        ?>
                        <a href="staffHome.php" type="submit" class="btn btn-primary" style="margin-top: 15px;">Done</a>
                        <?php
                            }  else if(isset($_SESSION['studentEmail'])) { 
                        ?>
                        <a href="studentHome.php" type="submit" class="btn btn-primary" style="margin-top: 15px;">Done</a>
                        <?php
                            } else { 
                        ?>
                        <a href="index.php" type="submit" class="btn btn-primary" style="margin-top: 15px;">Done</a>
                        <?php
                            }
                        ?>
                    </center>
                </form>
            </div>
            <div class="col-sm-1">
            </div>
        </div>
    </div>
</div>
<?php
include('MasterPage/footer.php');
?>