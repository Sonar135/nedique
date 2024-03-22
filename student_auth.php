<?php
    include 'header.php';
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/auth.css?v=<?php echo time();?>">
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
  

                    <h1>Student</h1>

 
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

           <form action="" method="post">  <div class="right">
                    <h1>SIGN UP</h1>

                    <div class="n_e">
                        <input type="text" placeholder="full name (surname first)" name="name">
                        <input type="email" placeholder="Email" name="email">
                    </div>

                    <div class="n_e">
                        <input type="text" placeholder="Phone no" name="phone" >
                        <input type="text" placeholder="matric no" name="matric" >
                    </div>

                  

                    <div class="n_e">
                        <input type="password" placeholder="password" name="password">
                        <input type="password" placeholder="confirm password" name="conpass">
                    </div>

                    <h4>password must contain 1 uppercase and 1 special character(#%&!*)</h4>

                    <button name="signup">sign up</button>
                    <h4 class="has_acc">I have an account</h4>
                </div></form>  
            </div>



            <div class="cent login">
                <div class="left stud" >
                    <div class="overlay">

                    </div>
                </div>

           <form action="" method="post">   <div class="right">
                    <h1>LOGIN</h1>

                  

                    <div class="ne_log">
                        <input type="email" placeholder="matric/no" name="matric">
                    </div>

                    <div class="ne_log">
                        <input type="password" placeholder="password" name="password">
                    </div>

                    <button name="login">Login</button>

                    <!-- <h4 class="no_acc">I dont have an account</h4> -->
                </div></form>  
            </div>
        </div>
</body>
</html>