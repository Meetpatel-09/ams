<?php

ob_start();
     $title = "Log In";
     require_once "config.php";
     include "masterPage/header.php";
     
     function function_alert($message) {
          // Display the alert box 
          echo "<script>alert('$message');</script>";
     }
     // Function call
     // function_alert("Welcome to Geeks for Geeks");

     $email = $password = "";
	$email_err = $password_err = "";

      // if request method is post
     if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		if (empty(trim($_POST['exampleInputEmail1']))) {
			$email_err = "Please enter email";
               function_alert($email_err);
		} else {
			$email = trim($_POST['exampleInputEmail1']);
		}

		if (empty(trim($_POST['exampleInputPassword1']))) {
			$password_err = "Please enter password";
               function_alert($password_err);
		} else {
			$password = trim($_POST['exampleInputPassword1']);
		}

          if (empty($email_err) && empty($password_err)) {
			$sql = "SELECT id, email, password FROM staff WHERE email = ?";
			$stmt = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt, "s", $param_email);
			$param_email = $email;
    
			// Try to execute this statement
			if(mysqli_stmt_execute($stmt)){
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) == 1){
					
					mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
					if(mysqli_stmt_fetch($stmt)){
						if (password_verify($password, $hashed_password))
						{
							// this means the password is corrct. Allow user to login
							$_SESSION["staffEmail"] = $email;
							$_SESSION["staffId"] = $id;
							$_SESSION["loggedin"] = true;

							//Redirect user to welcome page
							header("location: staffHome.php");

						} else {
                                   function_alert("Invalid Password");
                              }
					}
				} else {
                         function_alert("Check Email Address");
                    }
			} else {
                    function_alert("Internal server error");
               }
          }
     }
?>

          <div class="col-md-2">
          </div>
          <div class="col-md-8">
               <div class="col-sm-6 col-md-4">
               </div>
               <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                    <form action="" method="post">
                         <div class="caption text-center">
                              <h2>Staff Log In</h2>
                         </div>
                         <h6>Email</h6>
                         <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                         <h6>Password</h6>
                         <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" placeholder="Password">
                         <br />
                         <div class="caption text-center">
                              <p><button type="submit" class="btn btn-primary">Log In</button></p>
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