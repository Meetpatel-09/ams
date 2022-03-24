<?php
	$title = "Add Subject";

	ob_start();
	include ('MasterPage/header.php');
	require_once "config.php";

	$subject_name = $subject_code =  "";
	$subject_name_err = $subject_code_err = "";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Check subject name is empty
        if (empty(trim($_POST["inputSubjectName"]))) {
			$subject_name_err = "Please enter subject name";
        } else {
			$subject_name = trim($_POST['inputSubjectName']);
        }

		if (empty(trim($_POST["inputSubjectCode"]))) {
			$subject_code_err = "Please enter subject name";
        } else {
			$query = "SELECT s_id FROM subject WHERE s_code = ?";
            $stmt = mysqli_prepare($conn, $query);
            if($stmt) {
                mysqli_stmt_bind_param($stmt, 's', $param_subject_code);

                // Set the variable of param email
                $param_subject_code = trim($_POST['inputSubjectCode']);

                // Try to execute this statement
                if(mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1) {
                        $subject_code_err = "Subject is already entered";
                    } else {
                        $subject_code = trim($_POST['inputSubjectCode']);
                    }
                } else {
                    echo "Something went wrong";
                }
            }
            mysqli_stmt_close($stmt);
        }

		$branch = $_POST['inputBranch'];
        $semester = $_POST['inputSemester'];
		$subject_type = $_POST['inputSubjectType'];

		// If there were no error insert user details in database
		if(empty(trim($subject_code_err)) && empty(trim($subject_name_err))) {

			$query = "INSERT INTO subject(s_name,b_name,semester,s_code,type) VALUES(?, ?, ?, ?, ?)";
			$stmt = mysqli_prepare($conn, $query);
            if($stmt) {
				mysqli_stmt_bind_param($stmt, "sssss", $param_s_name, $param_b_name , $param_semester , $param_s_code , $param_type);

				// Set this parameters

				$param_s_name = $subject_name;
				$param_b_name = $branch;
				$param_semester = $semester;
				$param_s_code = $subject_code;
				$param_type = $subject_type;

				// Try to execute the query
				if(mysqli_stmt_execute($stmt)) {
                    $_SESSION['added'] = "Subject added successfully";
                    header("location: adminHome.php");
                } else {
                    echo "Something went wrong";
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($conn);
    }
?>
    <div style="margin-top: 15px;">
    </div>
    <div class="form-design">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                <div class="thumbnail">
					<form action="" method="post" enctype="multipart/form-data">
                    <h4 style="text-align: center">Add new subject</h4>
						<div class="form-group">
                            <label for="inputBranch">Select Branch</label>
                            <select id="inputBranch" name="inputBranch" class="form-control">
                                <option selected>Choose</option>
                                <option>Civil</option>
                                <option>Computer</option>
                                <option>Electrical</option>
                                <option>Mechinical</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputSemester">Select Semester</label>
                            <select id="inputSemester" name="inputSemester" class="form-control">
                                <option selected>Choose</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                        </div>
						<div class="form-group">
							<label for="inputSubjectName" class="form-label">Subject Name</label>
							<input type="text" class="form-control" id="inputSubjectName" name="inputSubjectName" placeholder="Subject Name">
						</div>
						<div class="form-group">
							<label for="inputSubjectCode" class="form-label">Subject Code</label>
							<input type="text" class="form-control" id="inputSubjectCode" name="inputSubjectCode" placeholder="Subject Code">
						</div>
						<div class="form-group">
                            <label for="inputSubjectType">Subject type</label>
                            <select id="inputSubjectType" name="inputSubjectType" class="form-control">
                                <option selected>Choose</option>
                                <option>Th</option>
                                <option>Pr</option>
                                <option>Th & Pr</option>
                                <option>Tu</option>
                            </select>
                        </div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
                </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div>
    </div>
<?php
	include ('MasterPage/footer.php');
?>