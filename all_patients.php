<?php

    include "header.php";
?>




<?php
    $students="";
    $get=mysqli_query($conn, "SELECT * from students");


    while($row=mysqli_fetch_array($get)){
        $name=$row["Fname"];
        $matric=$row["matric_no"];
        $gender=$row["gender"];
        $gender=$row["gender"];
        $dob=$row["dob"];
        $id=$row["id"];
        $birthdate = new DateTime($dob);
        $today = new DateTime();
        $age = $today->diff($birthdate)->y;


        $students.='  <div class="card">
        <div class="profile">
            <div class="circle">
            <i class="fa-solid fa-user"></i>
            </div>

            <div class="data">
                '.$name.'
            </div>

            <div class="data low">
            '.$matric.'
            </div>

            <div class="data low">
            '.$gender.'
            </div>

            <div class="data low">
            '.$age.'
            </div>

           <a href="student_profile.php?r='.$id.'"> <button>See Profile</button></a>
        </div>
    </div>';

    }
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/patients.css?v=<?php echo time();?>">
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
  

                    <h1>Students</h1>

 
</div>
                </div>
            </div>
        </div>

    </div>


    <div class="container sec1">
       <div class="cent">
            <?php echo $students?>
       </div>
    </div>

    <?php
    include "footer.php";
?>
</body>
</html>