<?php
	$title = "Home";

	require_once "config.php";
	include ('MasterPage/header.php');
?>
	<div style="padding:15px;">
		<div style="margin-top: 15px;">
			<h3 style="text-align: center">Welcome</h3>
		</div>
		<div class="row row-cols-1 row-cols-md-2 g-4" style="margin-top: 15px;">
			<div class="col-md-3 text-center" style="padding:15px;">
				
			</div>
			<div class="col-md-3 text-center" style="padding:15px;">
				<div class="thumbnail">
					<img src="img/attFill.gif" class="card-img-top" alt="...">
					<a href="att1.php" class="btn btn-primary">Fill Attedance</a>
					<a href="viewAtt1.php" class="btn btn-primary">View Attedance</a>
					<div style="padding:25px;"></div>
				</div>
			</div>
			<div class="col-md-3 text-center" style="padding:15px;">
				<div class="thumbnail">
					<img src="img/tt.gif" class="card-img-top" alt="...">
					<a href="viewtimetable1.php" class="btn btn-primary">View Time-Table</a>
					<div style="padding:25px;"></div>
				</div>
			</div>
		</div>
	</div>
<?php
	include ('MasterPage/footer.php');
?>