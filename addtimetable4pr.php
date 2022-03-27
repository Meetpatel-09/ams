<?php
	$title = "Add Timetable";
?>
<?php
	require_once "config.php";
	include ('MasterPage/header.php');

	$noOfBatch = $_SESSION['noOfBatch'];

	if(isset($_SESSION["slotNumber"])) {
		$slotNumber = $_SESSION["slotNumber"];
	}
	$b_name = $_SESSION['branch'];
	$semester = $_SESSION['semester'];
	
	$division = $_SESSION['division'];
	$day = $_SESSION['day'];
	$slotType = $_SESSION['slotType'];
	$no_of_batch = $_SESSION['noOfBatch'];

	if(isset($_SESSION["noinslot"])) {
		if($_SESSION['noinslot'] == 1) {
			$inputLectureNumber = 2;
		} else {
			$inputLectureNumber = 1;
		}
	}
	else {
		$inputLectureNumber = 1;
	}

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		$inputBatchNumber = $_POST['inputBatchNumber'];
		$inputSubjects = $_POST['inputSubjects'];
		$inputStaff = $_POST['inputStaff'];

		$query = "INSERT INTO timetable(branch,semester,division,day,slot_type,slot_number,subject,staff,batch,no_in_slot,no_of_batch) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_prepare($conn, $query);
		if($stmt) {
			mysqli_stmt_bind_param($stmt, "sssssssssss", $param_branch, $param_semester, $param_division, $param_day, $param_slot_type, $param_slot_number, $param_subject, $param_staff, $param_inputBatchNumber, $param_no_in_slot, $no_of_batch);

			// Set this parameters

			$param_branch = $b_name;
			$param_semester = $semester;
			$param_division = $division;
			$param_day = $day;
			$param_slot_type = $slotType;
			$param_slot_number = $slotNumber;
			$param_subject = $inputSubjects;
			$param_staff = $inputStaff;
			$param_inputBatchNumber = $inputBatchNumber;
			$param_no_in_slot = $inputLectureNumber;

			// Try to execute the query
			if(mysqli_stmt_execute($stmt)) {
				if ($slotNumber == 1 || $slotNumber == 2) {
					if ($noOfBatch == 4) {
						if ($inputBatchNumber == 1) {
							header("location: addtimetable4pr.php");
						}
						if ($inputBatchNumber == 2) {
							header("location: addtimetable4pr.php");
						}
						if ($inputBatchNumber == 3) {
							header("location: addtimetable4pr.php");
						}
						if ($inputBatchNumber == 4) {
							header("location: addtimetable3.php");
						}
					}
					if ($noOfBatch == 3) {
						if ($inputBatchNumber == 1) {
							header("location: addtimetable4pr.php");
						}
						if ($inputBatchNumber == 2) {
							header("location: addtimetable4pr.php");
						}
						if ($inputBatchNumber == 3) {
							header("location: addtimetable3.php");
						}
					}
					if ($noOfBatch == 2) {
						if ($inputBatchNumber == 1) {
							header("location: addtimetable4pr.php");
						}
						if ($inputBatchNumber == 2) {
							header("location: addtimetable3.php");
						}
					}
					if ($noOfBatch == 1) {
						if ($inputBatchNumber == 1) {
							header("location: addtimetable3.php");
						}
					}
				}
				else {
					if ($noOfBatch == 4) {
						if ($inputBatchNumber == 1) {
							header("location: addtimetable4pr.php");
						}
						if ($inputBatchNumber == 2) {
							header("location: addtimetable4pr.php");
						}
						if ($inputBatchNumber == 3) {
							header("location: addtimetable4pr.php");
						}
						if ($inputBatchNumber == 4) {
							header("location: addtimetable2.php");
						}
					}
					if ($noOfBatch == 3) {
						if ($inputBatchNumber == 1) {
							header("location: addtimetable4pr.php");
						}
						if ($inputBatchNumber == 2) {
							header("location: addtimetable4pr.php");
						}
						if ($inputBatchNumber == 3) {
							header("location: addtimetable2.php");
						}
					}
					if ($noOfBatch == 2) {
						if ($inputBatchNumber == 1) {
							header("location: addtimetable4pr.php");
						}
						if ($inputBatchNumber == 2) {
							header("location: addtimetable2.php");
						}
					}
					if ($noOfBatch == 1) {
						if ($inputBatchNumber == 1) {
							header("location: addtimetable2.php");
						}
					}
				}
			} else {
				$err = "Something went wrong";
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
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
						<label for="inputBatchNumber">Select Batch</label>
						<select id="inputBatchNumber" name="inputBatchNumber" class="form-control">
							<option selected>Choose</option>
							<?php
								if ($noOfBatch == 1 || $noOfBatch == 2 || $noOfBatch == 3 || $noOfBatch == 4) {
							?>
								<option>1</option>
							<?php
								}
								if ($noOfBatch != 1 && $noOfBatch == 2 || $noOfBatch == 3 || $noOfBatch == 4) {
							?>
							<option>2</option>
							<?php
								}
								if ($noOfBatch != 1 && $noOfBatch != 2 && $noOfBatch == 3 || $noOfBatch == 4) {
							?>
							<option>3</option>
							<?php
								}
								if ($noOfBatch != 1 && $noOfBatch != 2 && $noOfBatch != 3 && $noOfBatch == 4) {
							?>
							<option>4</option>
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

					<?php
                        $sql1 = mysqli_query($conn, "SELECT f_name FROM staff WHERE b_name = '$b_name'");
                    ?>
					<div class="form-group">
                        <label for="inputStaff">Select Staff</label>
						<select id="inputStaff" name="inputStaff" class="form-control">
							<option selected>Choose</option>
							<?php
								while($row = mysqli_fetch_array($sql1)) {
							?>
							<option><?php echo $row['f_name'] ?></option>
							<?php } ?>
						</select>
                    </div>
					<div class="form-row">
						<div class="form-group col-md-3">
							<button type="submit" class="btn btn-primary" style="text-align:left">Next</button>
						</div>
						<div class="form-group col-md-3"  style="text-align:right">
							<a href="addtimetable3.php" class="btn btn-primary" style="margin-left: 195px;">Back</a>
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
	include ('viewtimetable.php');
	include ('MasterPage/footer.php');
?>