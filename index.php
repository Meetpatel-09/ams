<?php
     $title = "Home";
     include "masterPage/header.php";
?>

          <div class="col-md-1">
          </div>
          <div class="col-md-10">
               <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                         <img class="img-rounded" src="img/admin.gif" >
                         <div class="caption text-center">
                              <h3>Admin</h3>
                              <p><a href="loginAdmin.php" class="btn btn-primary" role="button">Log In</a></p>
                         </div>
                    </div>
               </div>
               <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                         <img class="img-rounded" src="img/faculty4.gif">
                         <div class="caption text-center">
                              <h3>Staff</h3>
                              <p><a href="loginStaff.php" class="btn btn-primary" role="button">Log In</a> <a href="staffReg.php" class="btn btn-primary" role="button">Register</a></p>
                         </div>
                    </div>
               </div>
               <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                         <img class="img-rounded" src="img/students.gif">
                         <div class="caption text-center">
                              <h3>Student</h3>
                              <p><a href="loginStudent.php" class="btn btn-primary" role="button">Log In</a> <a href="studentReg.php" class="btn btn-primary" role="button">Register</a></p>
                         </div>
                    </div>
               </div>
          </div>
     
<?php
     include "masterPage/footer.php";
?>