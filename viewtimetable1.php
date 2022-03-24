<?php
	$title = "View Timetable";
?>
<?php
	require_once "config.php";
	include ('MasterPage/header.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $branch = $_POST['inputBranch'];
        $semester = $_POST['inputSemester'];
		$division = $_POST['inputDivision'];

		session_start();
        $_SESSION["branch"] = $branch;
        $_SESSION["semester"] = $semester;
        $_SESSION["division"] = $division;

        header("location: viewtimetable2.php");
    }
?>
	<div style="margin-top: 15px;">
	</div>
    <div class="form-design">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4 thumbnail">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h4 style="text-align: center">View Time Table</h4>
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
                            <label for="inputDivision">Select Division</label>
                            <select id="inputDivision" name="inputDivision" class="form-control">
                                <option selected>Choose</option>
                                <option>A</option>
                                <option>B</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-primary" style="text-align:left">Next</button>
                            </div>
                            <div class="form-group col-md-3"  style="text-align:right">
                            <?php
                            if (isset($_SESSION['adminEmail'])) {
                            ?>
                                <a href="adminHome.php" class="btn btn-primary" style="margin-left: 195px;">Back</a>
                            <?php
                            } else if (isset($_SESSION['staffEmail'])) {
                            ?>
                                <a href="staffHome.php" class="btn btn-primary" style="margin-left: 195px;">Back</a>
                            <?php
                            } else if (isset($_SESSION['studentEmail'])) {
                            ?>
                                <a href="studentHome.php" class="btn btn-primary" style="margin-left: 195px;">Back</a>
                            <?php
                            } else {
                            ?>
                                <a href="index.php" class="btn btn-primary" style="margin-left: 195px;">Back</a>
                            <?php
                            }
                            ?>
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