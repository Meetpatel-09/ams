<?php
	$title = "View Students";

	require_once "config.php";
	include ('MasterPage/header.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $branch = $_POST['inputBranch'];
        $semester = $_POST['inputSemester'];
		$division = $_POST['inputDivision'];

        $_SESSION["branch"] = $branch;
        $_SESSION["semester"] = $semester;
        $_SESSION["division"] = $division;

        header("location: viewStudents2.php");
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
                        <h4 style="text-align: center">View Students</h4>
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
                            <button type="submit" class="btn btn-primary" >Next</button>
                            <a href="adminHome.php" class="btn btn-primary" style="margin-left: 220px;">Cancel</a>  
                        </div> 
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