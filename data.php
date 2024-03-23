<?php
session_start();
include 'connect.php';

if(isset($_SESSION["id"])){
    $user_matric = $_SESSION['matric_no'];

    $bp = [];
    $get = mysqli_query($conn, "SELECT * from bp where student='$user_matric'");

    while($row = mysqli_fetch_array($get)){
        $date = $row["date"];
        $systolic = $row["systolic"];
        $diastolic = $row["diastolic"];

        $bp[$date] = ["systolic" => $systolic, "diastolic" => $diastolic];
    }

    $bloodPressureData = $bp;

echo json_encode($bloodPressureData);
}

?>

