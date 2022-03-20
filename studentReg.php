<?php

     $title = "Registration";
     include "masterPage/header.php";
     ob_start();
     require_once "config.php";

     function function_alert($message) {
          // Display the alert box 
          echo "<script>alert('$message');</script>";
     }
     // Function call
     // function_alert("Welcome to Geeks for Geeks");

     $fname = $email = $address = $enrollment = $password = $con_password = $p_number =  "";
     $fname_err = $email_err = $enrollment_err = $address_err = $password_err = $con_password_err = $p_number_err = "";
     
     if ($_SERVER['REQUEST_METHOD'] == "POST") {
          // Check if full name is empty
          if (empty(trim($_POST["inputFristName"]))) {
               $fname_err = "Please enter your name";
               function_alert($fname_err);
          } else {
               $fname = trim($_POST['inputFristName']);
          }

          // Check if enrollment is empty
          if (empty(trim($_POST["inputEnrollment"]))) {
               $enrollment_err = "Please enter enrollment";
               function_alert($enrollment_err);
          } else {
               $enrollment = trim($_POST['inputEnrollment']);
          }

          // Check if address is empty
          if (empty(trim($_POST["inputAddress"]))) {
               $address_err = "Please enter your name";
               function_alert($address_err);
          } else {
               $address = trim($_POST['inputAddress']);
          }

          if (empty(trim($_POST["inputPhonenumber"]))) {
               $p_number_err = "Please enter your mobile number";
               function_alert($p_number_err);
          } else {
               $query = "SELECT id FROM students WHERE p_number = ?";
               $stmt = mysqli_prepare($conn, $query);
               if($stmt) {
                    mysqli_stmt_bind_param($stmt, 's', $param_p_number);

                    // Set the variable of param phone number
                    $param_p_number = trim($_POST['inputPhonenumber']);

                    // Try to execute this statement
                    if(mysqli_stmt_execute($stmt)) {
                         mysqli_stmt_store_result($stmt);

                         if(mysqli_stmt_num_rows($stmt) == 1) {
                              $p_number_err = "Your mobile number is already regisered";
                              function_alert($p_number_err);
                         } else {
                              $p_number = trim($_POST['inputPhonenumber']);
                         }
                    } else {
                         function_alert("Someting went wrong");
                    }
               }
               mysqli_stmt_close($stmt);
          }

          // Check if email is empty
          if (empty(trim($_POST["inputEmail4"]))) {
               $email_err = "Please enter your email address";
               function_alert($email_err);
          } else {
               $query = "SELECT id FROM students WHERE email = ?";
               $stmt = mysqli_prepare($conn, $query);
               if($stmt) {
                    mysqli_stmt_bind_param($stmt, 's', $param_email);

                    // Set the variable of param email
                    $param_email = trim($_POST['inputEmail4']);

                    // Try to execute this statement
                    if(mysqli_stmt_execute($stmt)) {
                         mysqli_stmt_store_result($stmt);

                         if(mysqli_stmt_num_rows($stmt) == 1) {
                              $email_err = "You Already have a account";
                              function_alert($email_err);
                         } else {
                              $email = trim($_POST['inputEmail4']);
                         }
                    } else {
                         function_alert("Someting went wrong");
                    }
               }
               mysqli_stmt_close($stmt);
          }
          
          // Check for password
          if(empty(trim($_POST['inputPassword']))) {
               $password_err = "Password cannot be blank";
               function_alert($password_err);
          } elseif(strlen(trim($_POST['inputPassword'])) < 6 ) {
               $password_err = "Password cannot be less than 6 character";
               function_alert($password_err);
          } else {
               $password = trim($_POST['inputPassword']);
          }

          // Check for confirm password
          if(trim($_POST['inputConfirmPassword4']) != trim($_POST['inputPassword'])) {
               $con_password_err = "Password should match";
               function_alert($con_password_err);
          }

          //tpye of faculty
          // if($_POST[''] == "Choose") {
          //     $type_err = "Choose tpye of faculty";
          // } else {
          //     $type = $_POST[''];
          // }
          $branch = $_POST['inputBranch'];
          $division = $_POST['inputDivision'];
          $semester = $_POST['inputSemester'];
          $sbatch = $_POST['inputBatch'];

          // If there were no error insert user details in database
          if(empty($fname_err) && empty($address_err) && empty($email_err) && empty($password_err) && empty($con_password_err) && empty($mobile_err)) {

               $image = $_FILES['exampleFormControlFile1']['name'];
               // image file directory
               $target = "studentPhoto/".basename($image);
               move_uploaded_file($_FILES['exampleFormControlFile1']['tmp_name'], $target);

               $query = "INSERT INTO students(enrollment,f_name,b_name,semester,division,sbatch,email,p_number,address,password,photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
               $stmt = mysqli_prepare($conn, $query);
               if($stmt) {
                    mysqli_stmt_bind_param($stmt, "sssssssssss", $param_enrollment, $param_fname, $param_branch, $param_semester, $param_division, $param_sbatch, $param_email, $param_p_number, $param_address, $param_password, $param_photo);

                    // Set this parameters

                    $param_enrollment = $enrollment;
                    $param_fname = $fname;
                    $param_branch = $branch;
                    $param_semester = $semester;
                    $param_division = $division;
                    $param_sbatch = $sbatch;
                    $param_email = $email;
                    $param_p_number = $p_number;
                    $param_address = $address;
                    $param_password = password_hash($password, PASSWORD_DEFAULT);
                    $param_photo = $image;

                    // Try to execute the query
                    if(mysqli_stmt_execute($stmt)) {
                         header("location: loginStudent.php");
                    } else {
                         function_alert("Something went wrong");
                    }
               } else {
                    function_alert("Something went wrong");
               }
               mysqli_stmt_close($stmt);
          }
          mysqli_close($conn);
     }
?>

          <div class="col-md-1">
          </div>
          <div class="col-md-10">
               <div class="col-sm-6 col-md-4">
               </div>
               <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                    <form action="" method="post" enctype="multipart/form-data">
                         <div class="caption text-center">
                              <h3>Student Registration</h3>
                         </div>    
                         <div class="col-md-12">
                              <h6>Full Name</h6>
                              <input type="text" class="form-control" id="inputFristName" name="inputFristName" placeholder="Full Name">
                         </div>    
                         <div class="col-md-12">
                              <h6>Enrollment number</h6>
                              <input type="text" class="form-control" id="inputEnrollment" name="inputEnrollment" placeholder="Enrollment">
                         </div>
                         <div class="col-md-6">
                              <h6>Email</h6>
                              <input type="email" class="form-control" id="inputEmail4" name="inputEmail4" placeholder="Email">
                         </div>
                         <div class="col-md-6">
                              <h6>Phone Number</h6>
                              <input type="text" class="form-control" id="inputPhonenumber" name="inputPhonenumber" placeholder="Phone number">
                         </div>
                         <div class="col-md-12">
                              <h6>Address</h6>
                              <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Address">
                         </div>
                         <div class="col-md-6">
                              <h6>Branch</h6>
                              <select id="inputBranch" name="inputBranch" class="selecter_3">
                                   <option selected>Choose</option>
                                   <option>Civil</option>
                                   <option>Computer</option>
                                   <option>Electrical</option>
                                   <option>Mechinical</option>
                              </select>
                         </div>
                         <div class="col-md-6">
                              <h6>Semester</h6>
                              <select id="inputSemester" name="inputSemester" class="selecter_3">
                                   <option selected>Choose</option>
                                   <option>1</option>
                                   <option>2</option>
                                   <option>3</option>
                                   <option>4</option>
                                   <option>5</option>
                                   <option>6</option>
                              </select>
                         </div>
                         <div class="col-md-6">
                              <h6>Division</h6>
                              <select id="inputDivision" name="inputDivision" class="selecter_3">
                                   <option selected>Choose</option>
                                   <option>A</option>
                                   <option>B</option>
                              </select>
                         </div>
                         <div class="col-md-6">
                              <h6>Batch</h6>
                              <select id="inputBatch" name="inputBatch" class="selecter_3">
                                   <option selected>Choose</option>
                                   <option>1</option>
                                   <option>2</option>
                                   <option>3</option>
                                   <option>4</option>
                              </select>
                         </div>
                         <div class="col-md-12">
                              <h6>Profile Picture</h6>
                              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="exampleFormControlFile1">
                         </div>
                         <div class="col-md-6">
                              <h6>Password</h6>
                              <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
                         </div>
                         <div class="col-md-6">
                              <h6>Confirm Password</h6>
                              <input type="password" class="form-control" id="inputConfirmPassword4" name="inputConfirmPassword4" placeholder="Confirm Password">
                         </div>
                         <div>.</div>
                         <div class="caption text-center">
                              <p><button type="submit" class="btn btn-primary">Register</button></p>
                         </div>
                    </form>
                    </div>
               </div>
               <div class="col-sm-6 col-md-4">
               </div>
          </div>

<?php
     include "masterPage/footer.php";
?>