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

    $owner_email = "";
    $owner_retreatName = "";
    $owner_city = "";
    $owner_stateProvince = "";
    $owner_zipPostal = "";
    $owner_retreatLicense = "";
    $owner_contact_no = "";
    $owner_name = "";
    $owner_retreatType = "";
    $owner_zipPostal = "";
    $owner_password = "";
    $owner_streetAddress = "";
    $owner_confirm_password = "";
    $errors = array();

    //connect to db

   // $db = mysqli_connect('localhost', 'root', '', 'webreat') or die("Could not connect to database");

    //Register users
    if(isset($_POST['owner_reg_submit'])){
   
        if(isset($_POST['owner_name_reg'])){
            $owner_name = mysqli_real_escape_string($db, $_POST['owner_name_reg']);
        }
    
        if(isset($_POST['owner_email_reg'])){
            $owner_email = mysqli_real_escape_string($db, $_POST['owner_email_reg']);
        }
    
        if(isset($_POST['owner_contactNo_reg'])){
            $owner_contact_no = mysqli_real_escape_string($db, $_POST['owner_contactNo_reg']);
        }
        if(isset($_POST['owner_retreatName_reg'])){
            $owner_retreatName = mysqli_real_escape_string($db, $_POST['owner_retreatName_reg']);
        }
        if(isset($_POST['owner_retreatType_reg'])){
            $owner_retreatType = mysqli_real_escape_string($db, $_POST['owner_retreatType_reg']);
        }

        if(isset($_POST['owner_streetAddress_reg'])){
            $owner_streetAddress = mysqli_real_escape_string($db, $_POST['owner_streetAddress_reg']);
        }
        if(isset($_POST['owner_stateProvince_reg'])){
            $owner_stateProvince = mysqli_real_escape_string($db, $_POST['owner_stateProvince_reg']);
        }

        if(isset($_POST['owner_city_reg'])){
            $owner_city = mysqli_real_escape_string($db, $_POST['owner_stateProvince_reg']);
        }
        if(isset($_POST['owner_license_reg'])){
            $owner_retreatLicense = mysqli_real_escape_string($db, $_POST['owner_license_reg']);
        }

        if(isset($_POST['owner_zipPostal_reg'])){
            $owner_zipPostal= mysqli_real_escape_string($db, $_POST['owner_zipPostal_reg']);
        }
        if(isset($_POST['owner_password_reg'])){
            $owner_password = mysqli_real_escape_string($db, $_POST['owner_password_reg']);
        }
        if(isset($_POST['owner_confirm_password_reg'])){
            $owner_confirm_password = mysqli_real_escape_string($db, $_POST['owner_confirm_password_reg']);
        }
       
    
    
    
        //form validation

        if(empty($_POST['owner_name_reg'])){
            echo "1";
            array_push($errors, "The name of owner is required");
        }
        if(empty($_POST['owner_email_reg'])){
            echo "2";
            array_push($errors, "email is required");
        }
        if(empty($_POST['owner_city_reg'])){
            echo "3";
            array_push($errors, "City is required");
        }
        if(empty($_POST['owner_stateProvince_reg'])){
            echo "4";
            array_push($errors, "State/Province is required");
        }
        if(empty($_POST['owner_zipPostal_reg'])){
            echo "5";
            array_push($errors, "ZIP/Postal is required");
        }
        if(empty($_POST['owner_retreatName_reg'])){
            echo "6";
            array_push($errors, "Retreat Name is required");
        }
        if(empty($_POST['owner_streetAddress_reg'])){
            echo "7";
            array_push($errors, "Street Address is required");
        }
        if(empty($_POST['owner_retreatType_reg'])){
            echo "8";
        
            array_push($errors, "Retreat Type is required");
        }
        if(empty($_POST['owner_contactNo_reg'])){
            echo "9";
            array_push($errors, "Contact number is required");
        }
        if(empty($_POST['owner_license_reg'])){
            echo "10";
            array_push($errors, "Retreat License is required");
        }
        if(empty($_POST['owner_password_reg'])){
            echo "11";
            array_push($errors, "Password is required");
        }
        if(empty($_POST['owner_confirm_password_reg'])){
            echo "12";
            array_push($errors, "Confirm the password");
        }
        if($owner_password != $owner_confirm_password){
            echo "13";
            echo "<br>Password: ";
            echo $owner_password;
            echo "<br>Confirm password: ";
            echo $owner_confirm_password;
            echo "<br>";
            array_push($errors, "Password mismatch!");
        }
    
        //Already existing in the database same username and email
    
        $owner_check_query = "SELECT * FROM owner_listing_registration WHERE email= '$owner_email' LIMIT 1";
        $results = mysqli_query($db, $owner_check_query);
        $owner = mysqli_fetch_assoc($results); //outputs bool
    
        if ($owner){
            if($owner['email'] === $owner_email){
                echo "14";
                array_push($errors, "Email already exists with a registered account");
            }
        }
    
        
    //register user if no error
    
        if(count($errors) == 0){
            $owner_password = md5($owner_password);
            /*		*/
            $query = "INSERT INTO owner_listing_registration (main_contact_name,
            email,password,retreat_name,retreat_type,state_province,street_address,
            zip_postal,city,main_phone_number,license_number)
                      VALUES 
                      ('$owner_name', '$owner_email',  '$owner_password', '$owner_retreatName',
                       '$owner_retreatType', '$owner_stateProvince', '$owner_streetAddress', '$owner_zipPostal',
                       '$owner_city', '$owner_contact_no', '$owner_retreatLicense')";
            mysqli_query($db, $query);
              
            $_SESSION['owner_email_success'] = $owner_email;
            $_SESSION['owner_success'] = "You are now logged in";

            $query = "SELECT * FROM owner_listing_registration WHERE email = '$owner_email' AND password = '$owner_password'";
          //  echo $query;
            $results = mysqli_query($db, $query);
       
           
            if($row = mysqli_fetch_row($results)){
           
                $_SESSION['owner_id'] = $row[0];

                $query = "INSERT INTO retreat_place (retreat_description,
                retreat_image, owner_retreat_id)
                          VALUES 
                          ('','','$row[0]')";
                mysqli_query($db, $query);
     
            }
        
           
            unset($errors);
            $errors = array();

    
            
    
            header('location: OwnerProfile.php');
          
        }
        else{
            
            echo "There is an error";
            echo count($errors);
            
           
        }
    
    }
   

 //user log in

 if(isset($_POST['login_submit'])){

    if(isset($_POST['email_in'])){
        $owner_email = mysqli_real_escape_string($db, $_POST['email_in']);

    }
    if(isset($_POST['password_in'])){
        $owner_password = mysqli_real_escape_string($db, $_POST['password_in']);

    }

    if(empty($owner_email) || empty($owner_password)){
        array_push($errors, "Incomplete fields");
    }
    
    else{
        unset($errors);
        $errors = array();
    }
   
    if(count($errors) == 0 ){
 
        $owner_password = md5($owner_password);
        $query = "SELECT *  FROM owner_listing_registration WHERE email = '$owner_email' AND password = '$owner_password'";
        $results = mysqli_query($db, $query);
       
        if($row = mysqli_fetch_row($results)){
            $_SESSION['owner_email_success'] = $owner_email;
            $_SESSION['owner_id'] = $row[0];
            $_SESSION['owner_success'] = "Logged in successfully";
      
            header('location: OwnerProfile.php');
        }
        else{

            
            array_push($errors, "Wrong email/password combination");
           
        }
        
  
    }
  
}



?>