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

    $date = date("Y-m-d");
    $_SESSION["date"] = $date;

    $pagety = "th";
    $_SESSION["page"] = $pagety;

    if (isset($_SESSION["batch"])) {
        $batch = $_SESSION["batch"];
    } else {
        $batch = null;
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {   

        $subjects = $_POST['inputSubjects'];
        $_SESSION["subjects"] = $subjects;
        $inputLectureNumber = $_POST['inputLectureNumber'];
        $_SESSION["inputLectureNumber"] = $inputLectureNumber;
	    
        $sql1 =  mysqli_query($conn, "SELECT f_name FROM staff WHERE id = '$id'"); 

        while($row1 = mysqli_fetch_array($sql1)) { 
            $staff = $row1['f_name'];
        }
        
        $flag = 0;

	    $sql = mysqli_query($conn, "SELECT * FROM timetable WHERE branch = '$b_name' AND semester = '$semester' AND division = '$division' AND day = '$day' AND subject = '$subjects'");
       
        while($row = mysqli_fetch_array($sql)) {
            if($row['slot_number'] == $slotNumber) {
                if($row['no_in_slot'] == $inputLectureNumber) {
                    if ($row['subject'] == $subjects) {
                        if($row['staff'] == $staff) {
                            $err = 1;
                            $att = "Present";
                            $sql1 = mysqli_query($conn, "SELECT enrollment FROM students WHERE b_name='$b_name' AND semester='$semester' AND division='$division'");
                            
                            while($row = mysqli_fetch_array($sql1)) {

                                $enrollment = $row['enrollment'];

                                    $query = "INSERT INTO attedance(enrollment,branch,semester,division,slot_type,slot_number,subject,staff,no_in_slot,date,day,att) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                                    $stmt = mysqli_prepare($conn, $query);
                                    if($stmt) {

                                        echo $enrollment = $row['enrollment'];

                                        mysqli_stmt_bind_param($stmt, "ssssssssssss", $param_enrollment, $param_branch, $param_semester, $param_division, $param_slot_type, $param_slot_number, $param_subject, $param_staff, $param_no_in_slot, $param_date, $param_day, $param_att);

                                        $param_enrollment = $enrollment;
                                        $param_branch = $b_name;
                                        $param_semester = $semester;
                                        $param_division = $division;
                                        $param_slot_type = $slotType;
                                        $param_slot_number = $slotNumber;
                                        $param_subject = $subjects;
                                        $param_staff = $id;
                                        $param_no_in_slot = $inputLectureNumber;
                                        $param_date = $date;
                                        $param_day = $day;
                                        $param_att = $att;

                                    }
                                    // Try to execute the query
                                    if(mysqli_stmt_execute($stmt)) {
                                        header("location: att4th.php");
                                    } else {
                                        echo "error";
                                       // header("location: att4err.php");
                                    }
                                
                                mysqli_stmt_close($stmt);
                            }
                        }
                    }
                }
            }
        }
    }

?>
	<div style="margin-top: 15px;">
        <h3 style="text-align: center"></h3>
    </div>

	<div class="form-design">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4 thumbnail">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputLectureNumber">Select Lecture Number Slot Number</label>
                            <select id="inputLectureNumber" name="inputLectureNumber" class="form-control">
                                <option selected>Choose</option>
                                <option>1</option>
                                <option>2</option>
                                <?php
                                    if ($slotNumber == 1) {
                                ?>
                                <option>3</option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    
						<?php
							$sql = mysqli_query($conn, "SELECT s_name FROM subject WHERE b_name = '$b_name' AND semester = '$semester'");
						?>
						<div class="form-group">
							<label for="inputSubjects">Select Subject</label>
							<select id="inputSubjects" name="inputSubjects" class="form-control">
							<option selected>Choose</option>
							<?php
								while($row = mysqli_fetch_array($sql)) {
							?>
							<option><?php echo $row['s_name'] ?></option>
							<?php } ?>
							<!-- <option></option> -->
							</select>
						</div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-primary" style="text-align:left">Next</button>
                            </div>
                            <div class="form-group col-md-3"  style="text-align:right">
                            <a href="att2.php" class="btn btn-primary" style="margin-left: 185px;">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div>
    </div>
<?php
	include ('MasterPage/footer.php');
?>