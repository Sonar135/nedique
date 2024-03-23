<?php
    include "header.php";
?>

<?php
    $get=mysqli_query($conn,"SELECT * from students where matric_no='$user_matric'");

    $row=mysqli_fetch_array($get);


    $medication="";

    $get_medication= mysqli_query($conn,"SELECT * from medication where student='$user_matric'");


    while($med_row= mysqli_fetch_array($get_medication)){
        $med=$med_row["medication"];
        $problem=$med_row["problem"];
        $cost=$med_row["cost"];
        $datetimeString=$med_row["date"];
        $dateTime = new DateTime($datetimeString);
        $date = $dateTime->format('Y-m-d');


        $medication.='  <div class="card">
        <h4>'.$date.'</h4>
        <h4>Illness: '.$problem.'</h4>
        <h4>MEDICATION GIVEN:</h4>

        <div class="med_box">
            <h4>'.$med.'</h4>
          
        </div>
        <h4>AMOUNT TO PAY: ₦'.$cost.'</h4>
        <span></span>
    </div>';
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/account.css?v=<?php echo time();?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="img_container">
          <div class="overlay">
            <div class="container">
                <div class="cent">
        
                  <div class="some_text">
  

                    <h1>Profile</h1>

                    <h4></h4>
                  </div>


                  
                </div>
            </div>
            </div>

    </div>


    <div class="container sec1">
        <div class="cent">
            <div class="profile">
                <div class="pna">

                <div class="p">
                    <div class="prof">
                    <i class="fa-solid fa-user"></i>
                    </div>
                </div>

                <div class="na">
                    <h1><?php echo $row["Fname"]?></h1>
                    <i class="fa-solid fa-user"></i> <h4><?php echo $row["matric_no"]?></h4>
                </div>

                </div>


                <div class="tlc">
                    <div class="t">
                    <i class="fa-solid fa-phone"></i>  <h4><?php echo $row["phone"]?></h4>
                    </div>

                    <div class="l">
                    <i class="fa-solid fa-graduation-cap"></i> <h4><?php echo $row["department"]?></h4>
                    </div>

                    <div class="c">
                    <i class="fa-solid fa-building-flag"></i> <h4><?php echo $row["nationality"]?></h4>
                    </div>
                </div>
            </div>


            <div class="data">
                <div class="data_card">
                   <h1> Date of Birth</h1>
                   <h4><?php echo $row["dob"]?></h4>

                   <span></span>
                </div>

                <div class="data_card">
                  <h1> Blood Group</h1>
                    <h4><?php echo $row["blood_group"]?></h4>
                   <span></span>
                    </div>

                    <div class="data_card">
                    <h1>Blood Type</h1>
                    <h4><?php echo $row["blood_type"]?></h4>
                   <span></span>
                    </div>

                  
            </div>
        </div>
    </div>


    <div class="container sec3">
        <div class="cent">
        <h1><div class="left_btn"><i class="fa-solid fa-chevron-left"></i></div> Blood Pressure Over Time <div class="right_btn"><i class="fa-solid fa-angle-right"></i></div></h1>
        <div class="chart-container line">
            <h1>Line Chart</h1>
            <canvas id="lineChart"></canvas>
            <!-- <canvas id="pieChart"></canvas> -->
        
        </div>

        <div class="chart-container bar">
            <h1>Bar Chart</h1>
        
            <!-- <canvas id="pieChart"></canvas> -->
            <canvas id="barChart"></canvas>
        </div>
        </div>
    </div>



    <div class="container sec4">
        <div class="cent">
        <h1>Temperature Over time</h1>
        <div class="chart-container">
            <canvas id="TemplineChart"></canvas>
            <!-- <canvas id="pieChart"></canvas> -->
            <!-- <canvas id="TempbarChart"></canvas> -->
        </div>
        </div>
    </div>

    <div class="container sec5">
        <h1>medication and bills</h1>
        <div class="cent">
          
        <?php echo $medication?>


            
        </div>
    </div>

    <?php
        include "footer.php";
    ?>
</body>
<script src="js\data.js"></script>
<script src="js\temp_data.js"></script>
</html>