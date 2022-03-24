<?php
	$title = "Add Timetable";
?>
<?php
	require_once "config.php";
	include ('MasterPage/header.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $slotNumber = $_POST['inputSlotNumber'];
		$slotType = $_POST['inputSlotType'];

		session_start();
        $_SESSION["slotNumber"] = $slotNumber;
        $_SESSION["slotType"] = $slotType;

        if($slotType == "Th") {
            
            if($slotNumber == 1) {
                header("location: addtimetable4th.php");
            }
            if($slotNumber == 2) {
                if (isset($_SESSION['noinslot'])) {
                    unset($_SESSION['noinslot']);
                    header("location: addtimetable4th.php");
                }else{
                    header("location: addtimetable4th.php");
                }
                
            }
            if($slotNumber == 3) {
                header("location: addtimetable4th.php");
            }    
        }
        else {
            header("location: addtimetable4pr.php");
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
                            <a href="addtimetable2.php" class="btn btn-primary" style="margin-left: 195px;">Back</a>
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