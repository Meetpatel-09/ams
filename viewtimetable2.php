<?php
	$title = "View Timetable";
?>
<?php
	require_once "config.php";
	include ('MasterPage/header.php');
?>
	<div style="margin-top: 15px;">
        <h3 style="text-align: center"></h3>
	</div>
    <div class="form-design">
        <div class="container">
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-10">
                    <div style="margin-top: 15px;">
                        <h3 style="text-align: center"> Branch: <?php echo $_SESSION['branch'] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Semester: <?php echo $_SESSION['semester'] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Division: <?php echo $_SESSION['division'] ?></h3>
                    </div>
				</div>
                <div class="col-sm-1">
                </div>
            </div>
        </div>
    </div>
<?php
    include ('viewtimetable.php');
	include ('MasterPage/footer.php');
?>