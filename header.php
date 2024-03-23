<?php
  ob_start();
  session_start();
  include 'connect.php';
  if(isset($_SESSION["id"])){
    $email=$_SESSION['email'];
    $user_phone=$_SESSION['phone'];
    $user_name=$_SESSION['Fname'];
    $user_type=$_SESSION['user_type'];

   
      if($user_type=='student'){
        $user_matric=$_SESSION['matric_no'];
      }
  
  }

  

?>

<?php
            if(isset($_SESSION["id"])){
                if($user_type==''){
                  
                }
            }
            ?>







<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/b782cf5553.js" crossorigin="anonymous"></script>  
    <link rel="icon" type="image/x-icon" href="images\kisspng-babcock-university-university-of-ibadan-academic-d-5b1c90eb26da71.7889147215285987631592-removebg-preview.png">
    <link rel="stylesheet" href="css/header.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medique</title>
</head>
<body>

<div class="loader">
  <img src="images\8-removebg-preview.png" alt="">
</div>
    <div class="nav">

        <div class="nav_cont">
            <div class="logo_cont">
          <a href="main.php"> <h1>MEDIQUE</h1></a>  
            </div>

            <div class="menu">
                <ul>

                <li>
                    <a href="main.php">  home</a>
                  </li>

               

          
                  
                  
                    
                  <?php
            if(isset($_SESSION["id"])){


                if($user_type=='doctor'){
                  echo ' 

                  <li>
             <a href="all_patients.php">All Students</a>
           </li>

           <li>
           <a href="new_student.php">New student</a>
         </li>

           <li>
           <a href="logout.php">Sign Out</a>
         </li>
           
        
              
              ';
                }


                if($user_type=='student'){
                  echo ' 

                  <li>
             <a href="student_account.php">profile</a>
           </li>

          

           <li>
           <a href="logout.php">Sign Out</a>
         </li>
           
        
              
              ';
                }

         

       
            }


            else{
              echo '   <li>
              <a href="student_auth.php">  Student</a>
            </li>

            <li>
              <a href="doctor_auth.php">Doctor</a>
            </li>';
            }


         
            ?>

                    


                      


                   


                  
                    
               
                 

              

   
                      

          
                </ul>
            </div>
        </div>
        <span id="line"></span>
    </div>
</body>
<script src="js/min.js"></script>
<script src="js/dom.js"></script>

<script>
  $(window).on("load", ()=>{
    $(".loader").fadeOut("slow")
    $("body").css("overflow-y", "scroll");
  });
</script>
</html>






