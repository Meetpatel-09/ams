<?php
	$title = "Add Timetable";
?>

<?php
	require_once "config.php";
	include ('MasterPage/header.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
        $day = $_POST['inputDay'];
       
		session_start();
        $_SESSION["day"] = $day;
        
        if($_SESSION["slotNumber"] != null){
            $_SESSION["slotNumber"] = null;
        }

        header("location: addtimetable3.php");
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
                        <label for="inputDay">Select Day</label>
                        <select id="inputDay" name="inputDay" class="form-control">
                            <option selected>Choose</option>
                            <option>Monday</option>
                            <option>Tuesday</option>
                            <option>Wednesday</option>
                            <option>Thrusday</option>
                            <option>Friday</option>
                            <option>Saturday</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary" style="text-align:left">Next</button>
                        </div>
                        <div class="form-group col-md-3"  style="text-align:right">
                            <a href="addtimetable1.php" class="btn btn-primary" style="margin-left: 195px;">Back</a>
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