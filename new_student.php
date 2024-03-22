<?php
    include 'header.php';
?>




<?php
 
    include 'functions.php';

    if(isset($_GET['error'])){
        if($_GET['error']=='emptyfield'){
            echo '  <div class="message" id="message">
            please fill all fields
        </div>';
        }
    }

    if(isset($_GET['error'])){
        if($_GET['error']=='pwd_not_match'){
            echo '  <div class="message" id="message">
            passwords do not match
        </div>';
        }
    }

    if(isset($_GET['error'])){
        if($_GET['error']=='invalid_pass'){
            echo '  <div class="message" id="message">
          password too weak
        </div>';
        }
    }

    if(isset($_GET['error'])){
        if($_GET['error']=='email_in_use'){
            echo '  <div class="message" id="message">
            email already used by another account
        </div>';
        }
    }


    if(isset($_GET['error'])){
        if($_GET['error']=='matric_in_use'){
            echo '  <div class="message" id="message">
            account with matric number already exist
        </div>';
        }
    }


    

    if(isset($_GET['error'])){
        if($_GET['error']=='success'){
            echo '  <div class="message" id="message">
            account created
        </div>';
        }
    }

    if(isset($_GET['error'])){
        if($_GET['error']=='invalidemail'){
            echo '  <div class="message" id="message">
            please enter a valid email
        </div>';
        }
    }

    if(isset($_POST['signup'])){
        $email=$_POST['email'];
        $fname=$_POST['name'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $confirm=$_POST['conpass'];
        $nationality=$_POST['nationality'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $records=  htmlentities( $_POST['medical_records']) ;
        $prefix="doc";


        

    

        if(emptysignup($email, $fname, $phone, $password, $confirm, $prefix)!== false){
            
            
            header("location: add_doc.php?error=emptyfield");
            exit();
 
        }

        if(invalid_email($email)!== false){
            header("location: add_doc.php?error=invalidemail");
        //     echo '<div class="message" id="message">
        //     error: INVALID EMAIL
        // </div>';
        exit();
        }

        if (invalid_password($password)) {
            header("location: add_doc.php?error=invalid_pass");
            exit();
 
        }

        if(pwd_match($password, $confirm)!== false){
      
            header("location: add_doc.php?error=pwd_not_match");
            exit();
        }

        if(doc_email_exists($conn, $email)!== false){
            header("location: add_doc.php?error=email_in_use");
      
            exit();
        }

        create_doctor($conn, $email, $fname,  $phone, $password, $confirm, $nationality, $dob, $gender, $prefix );

     

        
    
        
    }
?>


<?php
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];



        

    if(emptylogin($email, $password)){
        header("location: add_doc.php?error=empty_login");
        exit();
    }

    login($conn, $email, $password);
    }


    if(isset($_GET['error'])){
        if($_GET['error']=='wrongLogin'){
            echo '  <div class="message" id="message">
            username or password incorrect
        </div>';
        }
    }

    if(isset($_GET['error'])){
        if($_GET['error']=='empty_login'){
            echo '  <div class="message" id="message">
            enter username and password
        </div>';
        }
    }

    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/add_stud.css?v=<?php echo time();?>">
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
  

                    <h1>NEW STUDENT</h1>

                    <h4></h4>
                  </div>


                  
                </div>
            </div>
            </div>

    </div>



    <div class="container auth">
            <div class="cent signup">
                <div class="left" >
                    <div class="overlay">

                    </div>
                </div>

           <form action="" method="post" >  <div class="right">

                    <div class="phase1">
                    <h1>STUDENT FORM</h1>
                    <div class="n_e">
                        <input type="text" placeholder="full name (surname first)" name="name" id="compulsory">
                        <input type="email" placeholder="Email" name="email" id="compulsory">
                    </div>

                    <div class="n_e">
                        <input type="text" placeholder="Phone no" name="phone" id="sup_phone" id="compulsory">
                    </div>

                  

                    <div class="n_e">
                        <input type="password" placeholder="password" name="password" id="compulsory">
                        <input type="password" placeholder="confirm password" name="conpass" id="compulsory">
                    </div>
                    <h4>Password must inclue 1 uppercase and 1 special character</h4>

                  
                    </div>



                    <div class="phase2">
                    <h1>PERSONAL INFORMATION</h1>
                    <div class="n_e">
                        <input type="text" placeholder="Nationality" name="nationality" id="compulsory">
                      
                       

                        <input type="date" placeholder="Email" name="dob">

                      
                        
                       
                    </div>

                    <div class="n_e">
                        <input type="text" placeholder="gender" name="gender">
                        <input type="text" placeholder="gender" name="gender">
                       
                    </div>

                    <div class="n_e">
                        <input type="text" placeholder="matric no" name="gender">
                        <input type="text" placeholder="department" name="gender">
                       
                    </div>
                 
                    <div class="n_e">
                        <input type="text" placeholder="bloog group" name="gender">
                        <input type="text" placeholder="blood type" name="gender">
                       
                    </div>
                  

                   
         
                  

                  
                    </div>

                    <div class="nav_buttons">
                        <button id="left_btn"><i class="fa-solid fa-arrow-left"></i></button>
                        <button id="nav_btn"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>

                    <button name="signup" id="sign_up_btn">register</button>
                    <!-- <h4 class="has_acc">I have an account</h4> -->

            
                </div></form>  
            </div>



        </div>

        <?php
            include "footer.php";
        ?>
</body>
</html>