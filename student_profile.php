<?php
    include "header.php";
?>


<?php
    if(isset($_GET["r"])){
        $id=$_GET["r"];
    }


    $get=mysqli_query($conn,"SELECT * from students where id='$id'");

    $row=mysqli_fetch_array($get);
    $matric= $row["matric_no"];
?>






<?php

    if(isset($_POST["bp"])){
        $systolic=$_POST["systolic"];
        $diatolic=$_POST["diastolic"];


        if($systolic=="" or $diatolic== ""){
            echo '  <div class="message" id="message">
            please fill all fields
        </div>';
        }

        else{
            $insert=mysqli_query($conn, "INSERT into bp (systolic, diastolic, student, date) values 
            (' $systolic', '$diatolic', '$matric', NOW() )");

            if($insert){
                header("location: student_profile.php?r=$id");
            }
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/account.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<div class="edit_overlay">
    <div class="container edit">
        <div class="cent">
         
                <div class="form_cont">
                <div class="exit">
                <i class="fa-solid fa-xmark"></i>
                </div>
                <h1>Medication Form</h1>

              <form action="" method="post"> <div class="input">
                    <input type="text"  name="name" placeholder="Problem">
                    <input type="email"  name="email" placeholder="Test Done (leave blank if none)">
                </div>

                <div class="input">
                    <input type="text"  name="phone" placeholder="medication to be taken">
                </div>

                <button name="edit_sup">submit</button></form> 
            </div>
               
       

         


        </div>
    </div>
</div>



<div class="blood_overlay">
    <div class="container edit">
        <div class="cent">
         
                <div class="form_cont">
                <div class="exit">
                <i class="fa-solid fa-xmark"></i>
                </div>
                <h1>Update Blood Pressure</h1>

              <form action="" method="post"> <div class="input">
                    <input type="text"  name="systolic" placeholder="systolic">
               
                </div>

                <div class="input">
                    <input type="text"  name="diastolic" placeholder="diastolic">
                </div>

                <button name="bp">submit</button></form> 
            </div>
               
       

         


        </div>
    </div>
</div>







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

    <div class="container sec2">
        <div class="cent">
            <div class="buttons">
                <button id="blood_toggle">Blood Pressure</button>
                <button id="toggle">Diagnosis and Medication</button>
                <button >Temperature</button>
            </div>
        </div>
    </div>
<?php
    include "footer.php";
?>
</body>
</html>