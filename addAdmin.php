<?php
	$title = "Add Admin";

    ob_start();
	include ('MasterPage/header.php');

    require_once "config.php";

    $fname = $email = $address = $password = $con_password = $p_number =  "";
    $fname_err = $email_err = $address_err = $password_err = $con_password_err = $p_number_err = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Check if full name is empty
        if (empty(trim($_POST["inputFristName"]))) {
			$fname_err = "Please enter your name";
        } else {
			$fname = trim($_POST['inputFristName']);
        }

        // Check if address is empty
        if (empty(trim($_POST["inputAddress"]))) {
			$address_err = "Please enter your name";
        } else {
			$address = trim($_POST['inputAddress']);
        }

        if (empty(trim($_POST["inputPhonenumber"]))) {
			$p_number_err = "Please enter your mobile number";
        } else {
            $query = "SELECT id FROM admin WHERE p_number = ?";
            $stmt = mysqli_prepare($conn, $query);
            if($stmt) {
                mysqli_stmt_bind_param($stmt, 's', $param_p_number);

                // Set the variable of param email
                $param_p_number = trim($_POST['inputPhonenumber']);

                // Try to execute this statement
                if(mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1) {
                        $p_number_err = "Your mobile number is already regisered";
                    } else {
                        $p_number = trim($_POST['inputPhonenumber']);
                    }
                } else {
                    echo "Something went wrong";
                }
            }
            mysqli_stmt_close($stmt);
        }

        // Check if email is empty
        if (empty(trim($_POST["inputEmail4"]))) {
            $email_err = "Please enter your email address";
        } else {
            $query = "SELECT id FROM admin WHERE email = ?";
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
                    } else {
                        $email = trim($_POST['inputEmail4']);
                    }
                } else {
                    echo "Something went wrong";
                }
            }
            mysqli_stmt_close($stmt);
        }
        
        // Check for password
        if(empty(trim($_POST['inputPassword']))) {
            $password_err = "Password cannot be blank";
        } elseif(strlen(trim($_POST['inputPassword'])) < 6 ) {
            $password_err = "Password cannot be less than 6 character";
        } else {
            $password = trim($_POST['inputPassword']);
        }

        // Check for confirm password
        if(trim($_POST['inputConfirmPassword4']) != trim($_POST['inputPassword'])) {
            $con_password_err = "Password should match";
        }

        // If there were no error insert user details in database
        if(empty($fname_err) && empty($lname_err) && empty($address_err) && empty($email_err) && empty($password_err) && empty($con_password_err) && empty($mobile_err)) {

            $image = $_FILES['exampleFormControlFile1']['name'];
            // image file directory
            $target = "adminPhoto/".basename($image);
            move_uploaded_file($_FILES['exampleFormControlFile1']['tmp_name'], $target);

            $query = "INSERT INTO admin(f_name,email,p_number,address,photo,password) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            if($stmt) {
                mysqli_stmt_bind_param($stmt, "ssssss", $param_fname, $param_email, $param_p_number, $param_address, $param_photo, $param_password);

                // Set this parameters
                $param_fname = $fname;
                $param_email = $email;
                $param_p_number = $p_number;
                $param_address = $address;
                $param_photo = $image;
                $param_password = password_hash($password, PASSWORD_DEFAULT);

                // Try to execute the query
                if(mysqli_stmt_execute($stmt)) {
                    $_SESSION['added'] = "Admin added successfully";
                    header("location: adminHome.php");
                } else {
                    echo "Something went wrong";
                }

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
                    <h4 style="text-align: center">Add New Admin</h4>
                    <div class="col-md-12">
                        <h6>Full Name</h6>
                            <input type="text" class="form-control" id="inputFristName" name="inputFristName" placeholder="Full Name">
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
                        <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                    </div>
               </div>
               <div class="col-sm-6 col-md-4">
               </div>
          </div>
<?php
	include('MasterPage/footer.php');
?>