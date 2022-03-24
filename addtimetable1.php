<?php
	$title = "Add Timetable";
    
    require_once "config.php";
	include ('MasterPage/header.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $branch = $_POST['inputBranch'];
        $semester = $_POST['inputSemester'];
		$division = $_POST['inputDivision'];
        $noOfBatch = $_POST['inputNumberofBatch'];

		session_start();
        $_SESSION["branch"] = $branch;
        $_SESSION["semester"] = $semester;
        $_SESSION["division"] = $division;
        $_SESSION['noOfBatch'] = $noOfBatch;

        header("location: addtimetable2.php");
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
                    <h4 style="text-align: center">Add Time-Table</h4>
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
                        <div class="form-group">
                            <label for="inputNumberofBatch">Number of Batches</label>
                            <select id="inputNumberofBatch" name="inputNumberofBatch" class="form-control">
                                <option selected>Choose</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-primary" style="text-align:left">Next</button>
                            </div>
                            <div class="form-group col-md-3"  style="text-align:right">
                                <a href="adminHome.php" class="btn btn-primary" style="margin-left: 195px;">Back</a>
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