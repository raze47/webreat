<?php
/*
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(-1);*/
    //You can comment the three blocks above if you want to see errors
    include('connection.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    session_start();

    //Initializing variables

    $user_email = "";

    $user_contact_no = "";
    $user_name = "";
    $user_password = "";
    $user_confirm_password = "";
    $errors = array();

    //connect to db

   // $db = mysqli_connect('localhost', 'root', '', 'webreat') or die("Could not connect to database");

    //Register users
    if(isset($_POST['reg_submit'])){
   
        if(isset($_POST['user_name_reg'])){
            $user_name = mysqli_real_escape_string($db, $_POST['user_name_reg']);
        }
    
        if(isset($_POST['email_reg'])){
            $user_email = mysqli_real_escape_string($db, $_POST['email_reg']);
        }
    
        if(isset($_POST['contact_no_reg'])){
            $user_contact_no = mysqli_real_escape_string($db, $_POST['contact_no_reg']);
        }
    
        if(isset($_POST['password_reg'])){
            $user_password = mysqli_real_escape_string($db, $_POST['password_reg']);
        }
        if(isset($_POST['confirm_password_reg'])){
            $user_confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password_reg']);
        }
       
    
    
    
        //form validation

        if(empty($_POST['user_name_reg'])){
            array_push($errors, "The name of user is required");
        }
        if(empty($_POST['email_reg'])){
            array_push($errors, "email is required");
        }
        if(empty($_POST['contact_no_reg'])){
            array_push($errors, "Contact number is required");
        }
        if(empty($_POST['password_reg'])){
            array_push($errors, "Password is required");
        }
        if(empty($_POST['confirm_password_reg'])){
            array_push($errors, "Confirm the password");
        }
        if($user_password != $user_confirm_password){
            array_push($errors, "Password mismatch!");
        }
    
        //Already existing in the database same username and email
    
        $user_check_query = "SELECT * FROM user_registration WHERE email= '$user_email' LIMIT 1";
        $results = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($results); //outputs bool
    
        if ($user){
            if($user['email'] === $user_email){
                array_push($errors, "Email already exists with a registered account");
            }
        }
    
        
    //register user if no error
    
        if(count($errors) == 0){
            $user_password = md5($user_password);
            
            $query = "INSERT INTO user_registration (user_name, email, contact_no, password)
                      VALUES ('$user_name', '$user_email', '$user_contact_no', '$user_password')";
            mysqli_query($db, $query);
            $_SESSION['email_success'] = $user_email;
            $_SESSION['success'] = "You are now logged in";
           
            unset($errors);
            $errors = array();
    
            
    
            header('location: MainHomepage.html');
            echo $_SESSION['success'];
        }
    
    }
   
    //user log in

 if(isset($_POST['login_submit'])){

    if(isset($_POST['email_in'])){
        $user_email = mysqli_real_escape_string($db, $_POST['email_in']);

    }
    if(isset($_POST['password_in'])){
        $user_password = mysqli_real_escape_string($db, $_POST['password_in']);

    }

    if(empty($user_email) || empty($user_password)){
        array_push($errors, "Incomplete fields");
    }
    
    else{
        unset($errors);
        $errors = array();
    }
   
    if(count($errors) == 0 ){

        $user_password = md5($user_password);
        $query = "SELECT * FROM user_registration WHERE email = '$user_email' AND password='$user_password'";
        $results = mysqli_query($db, $query);

        if(mysqli_num_rows($results)){
            $_SESSION['email_success'] = $user_email;
            $_SESSION['success'] = "Logged in successfully";
        
            echo "Succeed";
            header('location: MainHomepage.html');
        }
        else{

            array_push($errors, "Wrong username/password combination");
           
        }
        
  
    }
  
}


?>