<?php
	$title = "Fill Attedance";
?>
<?php
	require_once "config.php";
	include ('MasterPage/header.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $day = $_POST['inputDay'];
        $slotNumber = $_POST['inputSlotNumber'];
		$slotType = $_POST['inputSlotType'];

        session_start();
        $_SESSION["day"] = $day;
        $_SESSION["slotNumber"] = $slotNumber;
        $_SESSION["slotType"] = $slotType;

        if($slotType == "Th") {
            header("location: att3th.php");
        }
        else {
            header("location: att3pr.php");
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
                    <div class="form-group">
                        <label for="inputSlotNumber">Select Slot Number</label>
                        <select id="inputSlotNumber" name="inputSlotNumber" class="form-control">
                            <option selected>Choose</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputSlotType">Select Slot Type</label>
                        <select id="inputSlotType" name="inputSlotType" class="form-control">
                            <option selected>Choose</option>
                            <option>Th</option>
                            <option>Pr</option>
                            <!-- <option>Tu</option> -->
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary" style="text-align:left">Next</button>
                        </div>
                        <div class="form-group col-md-3"  style="text-align:right">
                            <a href="att1.php" class="btn btn-primary" style="margin-left: 185px;">Back</a>
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