<?php 
    require_once "config.php";
    
    $id = $_GET['id'];

    $att = "Absent";

    $sql = "UPDATE attedance SET att = '{$att}' WHERE aid = {$id}";

    $result = mysqli_query($conn, $sql);

    session_start();
    if ($_SESSION['page'] == "th") {
        header("location: att4th.php");
    } else {
        header("location: att4pr.php");
    }

?>