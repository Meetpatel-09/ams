<?php
	$title = "View Attedance";
?>
<?php
	require_once "config.php";
	include ('MasterPage/header.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $branch = $_POST['inputBranch'];
        $semester = $_POST['inputSemester'];
		$division = $_POST['inputDivision'];
        $date1 = $_POST['inputdate1'];
        $date2 = $_POST['inputdate2'];

		session_start();
        $_SESSION["branch"] = $branch;
        $_SESSION["semester"] = $semester;
        $_SESSION["division"] = $division;
        $_SESSION["inputdate1"] = $date1;
        $_SESSION["inputdate2"] = $date2;

        header("location: viewAtt3a.php");
    }
?>

            <div class="col-md-1">
            </div>
            <div class="col-md-10">
               <div class="col-sm-6 col-md-4">
               </div>
               <div class="col-sm-6 col-md-4 thumbnail">
                    <form action="" method="post" enctype="multipart/form-data">
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
                        <div class="col-md-6">
                            <label for="inputdate1">From Date</label>
                            <input class="form-control" type="text" value="2021-08-01" id="inputdate1" name="inputdate1">
                        </div>
                        <div class="col-md-6">
                            <label for="inputdate2">To Date</label>
                            <input class="form-control" type="text" value="2022-04-30" id="inputdate2" name="inputdate2">
                        </div>
                        <div>.</div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary" style="text-align:left">Next</button>
                        </div>
                        <div class="col-md-6"  style="text-align:right">
                            <?php
                                if(isset($_SESSION['adminEmail'])) {
                            ?>
                                <a href="adminHome.php" class="btn btn-primary" style="margin-left: 200px;">Back</a>
                            <?php
                                } else if(isset($_SESSION['staffEmail'])) {
                            ?>
                                <a href="staffHome.php" class="btn btn-primary" style="margin-left: 200px;">Back</a>
                            <?php
                                }  else if(isset($_SESSION['studentEmail'])) { 
                            ?>
                                <a href="studentHome.php" class="btn btn-primary" style="margin-left: 200px;">Back</a>
                                <?php
                            } else { 
                            ?>
                                <a href="index.php" class="btn btn-primary" style="margin-left: 200px;">Back</a>
                            <?php
                                }
                            ?>
                        </div>
                    </form>
                    </div>
               </div>
               <div class="col-sm-6 col-md-4">
               </div>
          </div>
<?php
	include ('MasterPage/footer.php');
?>