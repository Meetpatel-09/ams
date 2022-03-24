<?php
	$title = "Home";
?>
<?php
	require_once "config.php";
	include ('masterPage/header.php');

	if (isset($_SESSION['adminEmail'])) {
?>
	<div style="padding:15px;">
		<div style="margin-top: 15px;">
			<h3 style="text-align: center">Welcome</h3>
		</div>
		<div class="col-md-12" style="margin-top: 15px;">
			<div class="col-sm-6 col-md-3" style="padding:15px;">
				<div class="thumbnail">
                         <img src="img/admin.gif" class="img-rounded" alt="...">
                         <div class="card-body" style="text-align: center">
                              <a href="addAdmin.php" class="btn btn-primary">Add Admin</a>
                              <a href="viewAdmins.php" class="btn btn-primary">View Admins</a>
                         </div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3" style="padding:15px;">
				<div class="thumbnail">
                         <img src="img/faculty4.gif" class="img-rounded" alt="...">
                         <div class="card-body" style="text-align: center">
                              <a href="staffReg.php" class="btn btn-primary">Add Staff</a>
                              <a href="viewStaff.php" class="btn btn-primary">View Staff</a>
                         </div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3" style="padding:15px;">
				<div class="thumbnail">
                         <img src="img/students.gif" class="img-rounded" alt="...">
                         <div class="card-body" style="text-align: center">
                              <a href="studentReg.php" class="btn btn-primary">Add Student</a>
                              <a href="viewStudents1.php" class="btn btn-primary">View Students</a>
                         </div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3" style="padding:15px;">
				<div class="thumbnail">
                         <img src="img/books.gif" class="img-rounded" alt="...">
                         <div class="card-body" style="text-align: center">
                              <a href="addSubject.php" class="btn btn-primary">Add Subject</a>
                              <a href="viewSubject1.php" class="btn btn-primary">View Subjects</a>
                         </div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3" style="padding:15px;">
				<div class="thumbnail">
                         <img src="img/tt.gif" class="img-rounded" alt="...">
                         <div class="card-body" style="text-align: center">
                              <a href="addtimetable1.php" class="btn btn-primary">Add Time-Table</a>
                              <a href="viewtimetable1.php" class="btn btn-primary">View Time-Table</a>
                         </div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3" style="padding:15px;">
				<div class="thumbnail">
                         <div style="margin-top: 23px;"></div>
                         <img src="img/08kPWY5.gif" class="img-rounded" style="padding:45px;" alt="...">
                         <div style="margin-top: 23px;"></div>
                         <div class="card-body" style="text-align: center">
                              <a href="viewAtt2s.php" class="btn btn-primary">View Attedance</a>
                         </div>
				</div>
			</div>
		</div>
	</div>
<?php
	} else {
		header("location: index.php");
	}
	include ('masterPage/footer.php');
?>