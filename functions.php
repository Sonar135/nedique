<?php
    include 'connect.php';


    
    function create_student($conn, $email, $fname, $phone, $password, $nationality, $dob, $gender, $matric_no, $department, $blood_group, $blood_type){

        $user_type="student";
 
  
        $insert= "INSERT INTO students (Fname,  phone,  email,  password, user_type, nationality, dob, gender, matric_no, department, blood_group, blood_type) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";   
        
      


        $stmt2=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt2, $insert)){
            header("location: new_student.php?error=stmtfailed");
            exit();
        }
    
        
        $hashed_pwd=password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt2, 'ssssssssssss', $fname, $phone,  $email, $hashed_pwd, $user_type, $nationality, $dob, $gender, $matric_no, $department, $blood_group, $blood_type);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);
        
        header("location: new_student.php?error=success");
        exit();
    }



    function emptysignup($email, $fname, $phone, $password, $confirm ){
        $result="";
        if($email=="" or $fname==""  or $phone=="" or $password=="" or $confirm=="" ){
            $result= true;
        }
        else {
            $result=false;
        } 

        return $result;
    }

    function emptylogin($email, $password){
        $result="";
        if($email=="" or $password==""){
            $result= true;
        }
        else {
            $result=false;
        } 

        return $result;
    }


    function invalid_password($password){
        // Check if password contains at least one uppercase letter, one lowercase letter, and one special character
        if (!preg_match('/[A-Z]/', $password) || // Check for at least one uppercase letter
            !preg_match('/[a-z]/', $password) || // Check for at least one lowercase letter
            !preg_match('/[^a-zA-Z0-9]/', $password)) { // Check for at least one special character
            return true; // Password does not meet the criteria
        } else {
            return false; // Password meets the criteria
        }
    }

    function invalid_email($email){
        $result="";
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result= true;
        }

        else{
            $result= false;
        }

        return $result;
    
    }


    function pwd_match($password, $confirm){
        $result="";
        if($password !== $confirm){
            $result= true;
        }
        
        else{
            $result=false;
        }
        return $result;
    }

    function email_exists($conn, $email){
        $result="";
    
        $query="SELECT * FROM students WHERE email=?";
    
        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $query)){
            header("location: new_student.php?error=stmtfailed");
            exit();
        }
    
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result= mysqli_stmt_get_result($stmt);
    
        if($row=mysqli_fetch_assoc($result)){
            return $row;
        }

        else{
            $result= false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }



    function matric_exists($conn, $matric){
        $result="";
    
        $query="SELECT * FROM students WHERE matric_no=?";
    
        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $query)){
            header("location: new_student.php?error=stmtfailed");
            exit();
        }
    
        
        mysqli_stmt_bind_param($stmt, "s", $matric);
        mysqli_stmt_execute($stmt);
        $result= mysqli_stmt_get_result($stmt);
    
        if($row=mysqli_fetch_assoc($result)){
            return $row;
        }

        else{
            $result= false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }







    

    function login($conn, $matric_no, $password){
        $uidexist= matric_exists($conn, $matric_no);

        if($uidexist===false){
            header("location: student_auth.php?error=wrongLogin");
            exit();
        }

        $pwdHashed=$uidexist["password"];
        $checkedpwd=password_verify($password, $pwdHashed);

        if($checkedpwd===false){
            header("location: student_auth.php?error=wrongLogin");
            exit();
        }

        else if($checkedpwd===true){
            session_start();

            $_SESSION["id"]=$uidexist["id"];
            $_SESSION["email"]=$uidexist["email"];
            $_SESSION["name"]=$uidexist["name"];
            $_SESSION['phone']=$uidexist['phone'];
            $_SESSION["Fname"]=$uidexist["Fname"];
            $_SESSION["matric_no"]=$uidexist["matric_no"];
            $_SESSION["user_type"]=$uidexist["user_type"];
          
     
   
         
       

            header("location: student_account.php");
            exit();
        }
    }


    // creating the doctor...............................................................................................................//////////////////////////




   

    function create_doctor($conn, $email, $fname, $phone, $password){

        $user_type="doctor";
  
        $insert= "INSERT INTO doctors (Fname,  phone,  email,  password, user_type) VALUES (?,?,?,?,?)";   
        
      


        $stmt2=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt2, $insert)){
            header("location: doctor_new_student.php?error=stmtfailed");
            exit();
        }
    
        
        $hashed_pwd=password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt2, 'sssss', $fname, $phone,  $email, $hashed_pwd, $user_type);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);
        
        header("location: doctor_new_student.php?error=success");
        exit();
    }



 

 







    function doctor_email_exists($conn, $email){
        $result="";
    
        $query="SELECT * FROM doctors WHERE email=?";
    
        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $query)){
            header("location: new_student.php?error=stmtfailed");
            exit();
        }
    
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result= mysqli_stmt_get_result($stmt);
    
        if($row=mysqli_fetch_assoc($result)){
            return $row;
        }

        else{
            $result= false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }









    

    function login_doctor($conn, $email, $password){
        $uidexist= doctor_email_exists($conn, $email);

        if($uidexist===false){
            header("location: admin.php?error=wrongLogin");
            exit();
        }

        $pwdHashed=$uidexist["password"];
        $checkedpwd=password_verify($password, $pwdHashed);

        if($checkedpwd===false){
            header("location: admin.php?error=wrongLogin");
            exit();
        }

        else if($checkedpwd===true){
            session_start();

            $_SESSION["id"]=$uidexist["id"];
            $_SESSION["email"]=$uidexist["email"];
            $_SESSION["Fname"]=$uidexist["Fname"];
            $_SESSION['phone']=$uidexist['phone'];
            $_SESSION["user_type"]=$uidexist["user_type"];
          
     
   
         
       

            header("location: all_patients.php");
            exit();
        }
    }

