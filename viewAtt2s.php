<?php
$title = "View Attedance";
?>
<?php
require_once "config.php";
include('MasterPage/header.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (empty(trim($_POST['exampleInputEnrollment']))) {
        $enr_err = "Please enter email";
    } else {
        $enr = trim($_POST['exampleInputEnrollment']);
        $_SESSION["enrollment"] = $enr;

        $date1 = $_POST['inputdate1'];
        $_SESSION["inputdate1"] = $date1;

        $date2 = $_POST['inputdate2'];
        $_SESSION["inputdate2"] = $date2;


        $sql = "SELECT enrollment FROM attedance WHERE enrollment = {$enr}";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("location: viewAtt3s.php");
        } else {
            header("location: viewAtterr.php");
        }
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
                        <label for="inputBranch">Enrollment</label>
                        <input type="text" class="form-control" id="exampleInputEnrollment" name="exampleInputEnrollment" placeholder="Enter enrollment">
                    </div>
                    <div class="form-group">
                        <label for="inputdate1">From Date</label>
                        <input class="form-control" type="text" value="2021-08-01" id="inputdate1" name="inputdate1">
                    </div>
                    <div class="form-group">
                        <label for="inputdate2">To Date</label>
                        <input class="form-control" type="text" value="2022-04-30" id="inputdate2" name="inputdate2">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary" style="text-align:left">Search</button>
                        </div>
                        <div class="form-group col-md-3" style="text-align:right">
                            <?php
                            if (isset($_SESSION['adminEmail'])) {
                            ?>
                                <a href="adminHome.php" class="btn btn-primary" style="margin-left: 185px;">Back</a>
                            <?php
                            } else if (isset($_SESSION['staffEmail'])) {
                            ?>
                                <a href="staffHome.php" class="btn btn-primary" style="margin-left: 185px;">Back</a>
                            <?php
                            } else if (isset($_SESSION['studentEmail'])) {
                            ?>
                                <a href="studentHome.php" class="btn btn-primary" style="margin-left: 185px;">Back</a>
                            <?php
                            } else {
                            ?>
                                <a href="index.php" class="btn btn-primary" style="margin-left: 185px;">Back</a>
                            <?php
                            }
                            ?>
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
include('MasterPage/footer.php');
?>