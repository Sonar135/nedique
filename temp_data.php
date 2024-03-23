<?php
// $temperatureData = [
//     '2024-03-23 17:03:10' => 31,
//     'February' => 37,
//     'March' => 37,
//     // Add more data for other months
// ];

// echo json_encode($temperatureData);

session_start();
include 'connect.php';

if(isset($_SESSION["id"])){
    $user_matric = $_SESSION['matric_no'];

    $temp = [];
    $get = mysqli_query($conn, "SELECT * from temp where student='$user_matric'");

    while($row = mysqli_fetch_array($get)){
        $date = $row["date"];
        $temperature = $row["temperature"];
       

        $temp[$date]=$temperature;
    }
}

$temperatureData = $temp;

echo json_encode($temperatureData);
?>





